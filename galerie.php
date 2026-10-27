<?php
require_once __DIR__ . '/includes/functions.php';

/* LOGOUT */
if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    redirect('galerie.php');
}

/* ADMIN LOGIN */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    if (!verifyCsrfToken($_POST['csrf_token'] ?? '')) {
        $_SESSION['login_error'] = 'Session invalide. Recharge la page.';
        redirect('galerie.php');
    }

    $password = trim($_POST['password'] ?? '');
    if (hash_equals(ADMIN_PASSWORD, $password)) {
        $_SESSION['admin_logged_in'] = true;
        redirect('galerie.php');
    }

    $_SESSION['login_error'] = 'Mot de passe incorrect.';
    redirect('galerie.php');
}

/* AJAX UPLOAD IMAGE */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
    if (!isAdmin()) {
        jsonResponse(['success' => false, 'error' => 'Accès refusé.'], 403);
    }

    if (!verifyCsrfToken($_POST['csrf_token'] ?? '')) {
        jsonResponse(['success' => false, 'error' => 'Jeton CSRF invalide.'], 419);
    }

    $validation = validateUploadedImage($_FILES['image']);
    if (!$validation['valid']) {
        jsonResponse(['success' => false, 'error' => $validation['error']], 422);
    }

    $saved = saveUploadedImageToGallery($_FILES['image'], $validation['extension']);
    if (!$saved['success']) {
        jsonResponse(['success' => false, 'error' => $saved['error']], 500);
    }

    jsonResponse([
        'success' => true,
        'filename' => $saved['filename'],
        'filepath' => $saved['filepath'],
        'type' => 'image'
    ]);
}

/* AJAX UPLOAD VIDEO LINK */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['video_link'])) {
    if (!isAdmin()) {
        jsonResponse(['success' => false, 'error' => 'Accès refusé.'], 403);
    }

    if (!verifyCsrfToken($_POST['csrf_token'] ?? '')) {
        jsonResponse(['success' => false, 'error' => 'Jeton CSRF invalide.'], 419);
    }

    $videoUrl = trim($_POST['video_link']);
    
    // Nettoyer l'URL Facebook
    $videoUrl = str_replace('web.facebook.com', 'facebook.com', $videoUrl);
    $videoUrl = str_replace('mbasic.facebook.com', 'facebook.com', $videoUrl);
    
    $result = getPlatformEmbed($videoUrl);
    
    if (!$result) {
        jsonResponse(['success' => false, 'error' => 'Lien vidéo non supporté.'], 422);
    }

    $saved = saveVideoLinkToFile($result['embedUrl'], $videoUrl, $result['platform'], $result['width'], $result['height']);
    if (!$saved['success']) {
        jsonResponse(['success' => false, 'error' => $saved['error']], 500);
    }

    jsonResponse([
        'success' => true,
        'id' => $saved['id'],
        'embedUrl' => $result['embedUrl'],
        'originalUrl' => $videoUrl,
        'platform' => $result['platform'],
        'width' => $result['width'],
        'height' => $result['height'],
        'type' => 'video'
    ]);
}

/* AJAX DELETE */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_media'])) {
    if (!isAdmin()) {
        jsonResponse(['success' => false, 'error' => 'Accès refusé.'], 403);
    }

    if (!verifyCsrfToken($_POST['csrf_token'] ?? '')) {
        jsonResponse(['success' => false, 'error' => 'Jeton CSRF invalide.'], 419);
    }

    $type = $_POST['type'] ?? '';
    $filename = $_POST['filename'] ?? '';
    
    if ($type === 'image') {
        $deleted = deleteGalleryImage($filename);
    } else if ($type === 'video') {
        $deleted = deleteVideoLink($filename);
    } else {
        $deleted = false;
    }

    jsonResponse(['success' => $deleted]);
}

// Fonction qui retourne l'embed adapté à chaque plateforme
function getPlatformEmbed($url) {
    $url = trim($url);
    
    // ============ YOUTUBE ============
    if (preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/|youtube\.com\/shorts\/)([a-zA-Z0-9_-]{11})/', $url, $matches)) {
        $videoId = $matches[1];
        return [
            'platform' => 'youtube',
            'embedUrl' => 'https://www.youtube.com/embed/' . $videoId,
            'width' => '800',
            'height' => '450'
        ];
    }
    
    // ============ FACEBOOK ============
    if (strpos($url, 'facebook.com') !== false) {
        // Extraire l'ID vidéo
        $videoId = null;
        if (preg_match('/share\/v\/([a-zA-Z0-9]+)/', $url, $matches)) {
            $videoId = $matches[1];
        } elseif (preg_match('/videos\/(\d+)/', $url, $matches)) {
            $videoId = $matches[1];
        } elseif (preg_match('/watch\/\?v=(\d+)/', $url, $matches)) {
            $videoId = $matches[1];
        } elseif (preg_match('/reel\/(\d+)/', $url, $matches)) {
            $videoId = $matches[1];
        } elseif (preg_match('/(\d{10,})/', $url, $matches)) {
            $videoId = $matches[1];
        }
        
        if ($videoId) {
            return [
                'platform' => 'facebook',
                'embedUrl' => 'https://www.facebook.com/plugins/video.php?href=https://www.facebook.com/watch/?v=' . $videoId . '&show_text=0&width=560&autoplay=0',
                'width' => '560',
                'height' => '315'
            ];
        }
    }
    
    // ============ TIKTOK ============
    if (strpos($url, 'tiktok.com') !== false) {
        $videoId = null;
        if (preg_match('/@[\w.]+\/video\/(\d+)/', $url, $matches)) {
            $videoId = $matches[1];
        } elseif (preg_match('/t\/([a-zA-Z0-9]+)/', $url, $matches)) {
            $videoId = $matches[1];
        }
        
        if ($videoId) {
            return [
                'platform' => 'tiktok',
                'embedUrl' => 'https://www.tiktok.com/embed/v2/' . $videoId,
                'width' => '575',
                'height' => '700'
            ];
        }
    }
    
    // ============ INSTAGRAM ============
    if (strpos($url, 'instagram.com') !== false) {
        if (preg_match('/(?:p|reel)\/([a-zA-Z0-9_-]+)/', $url, $matches)) {
            $postId = $matches[1];
            return [
                'platform' => 'instagram',
                'embedUrl' => 'https://www.instagram.com/p/' . $postId . '/embed/',
                'width' => '400',
                'height' => '580'
            ];
        }
    }
    
    // ============ VIMEO ============
    if (strpos($url, 'vimeo.com') !== false) {
        if (preg_match('/vimeo\.com\/(\d+)/', $url, $matches)) {
            $videoId = $matches[1];
            return [
                'platform' => 'vimeo',
                'embedUrl' => 'https://player.vimeo.com/video/' . $videoId,
                'width' => '800',
                'height' => '450'
            ];
        }
    }
    
    // ============ DAILYMOTION ============
    if (strpos($url, 'dailymotion.com') !== false) {
        if (preg_match('/video\/([a-zA-Z0-9]+)/', $url, $matches)) {
            $videoId = $matches[1];
            return [
                'platform' => 'dailymotion',
                'embedUrl' => 'https://www.dailymotion.com/embed/video/' . $videoId,
                'width' => '800',
                'height' => '450'
            ];
        }
    }
    
    // ============ TWITCH ============
    if (strpos($url, 'twitch.tv') !== false) {
        // Clip
        if (preg_match('/clip\/(\w+)/', $url, $matches)) {
            $clipId = $matches[1];
            return [
                'platform' => 'twitch',
                'embedUrl' => 'https://clips.twitch.tv/embed?clip=' . $clipId,
                'width' => '800',
                'height' => '450'
            ];
        }
        // VOD
        if (preg_match('/videos\/(\d+)/', $url, $matches)) {
            $vodId = $matches[1];
            return [
                'platform' => 'twitch',
                'embedUrl' => 'https://player.twitch.tv/?video=' . $vodId,
                'width' => '800',
                'height' => '450'
            ];
        }
        // Channel live
        if (preg_match('/twitch\.tv\/(\w+)(?:\/)?$/', $url, $matches)) {
            $channel = $matches[1];
            return [
                'platform' => 'twitch',
                'embedUrl' => 'https://player.twitch.tv/?channel=' . $channel,
                'width' => '800',
                'height' => '450'
            ];
        }
    }
    
    // ============ TWITTER/X ============
    if (strpos($url, 'twitter.com') !== false || strpos($url, 'x.com') !== false) {
        if (preg_match('/status\/(\d+)/', $url, $matches)) {
            $tweetId = $matches[1];
            return [
                'platform' => 'twitter',
                'embedUrl' => 'https://twitframe.com/show?url=' . urlencode($url),
                'width' => '550',
                'height' => '400'
            ];
        }
    }
    
    return false;
}

function saveUploadedImageToGallery($file, $extension) {
    $uploadDir = __DIR__ . '/uploads/gallery/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }
    
    $filename = uniqid() . '.' . $extension;
    $targetPath = $uploadDir . $filename;
    
    if (!move_uploaded_file($file['tmp_name'], $targetPath)) {
        return ['success' => false, 'error' => 'Erreur lors de l\'enregistrement.'];
    }
    
    return [
        'success' => true,
        'filename' => $filename,
        'filepath' => 'uploads/gallery/' . $filename
    ];
}

function saveVideoLinkToFile($embedUrl, $originalUrl, $platform, $width, $height) {
    $videoLinksFile = __DIR__ . '/uploads/gallery/video_links.txt';
    
    $galleryDir = __DIR__ . '/uploads/gallery/';
    if (!is_dir($galleryDir)) {
        mkdir($galleryDir, 0755, true);
    }
    
    $id = uniqid('vid_');
    $line = $id . '|' . $embedUrl . '|' . $originalUrl . '|' . time() . '|' . $platform . '|' . $width . '|' . $height . "\n";
    
    if (file_put_contents($videoLinksFile, $line, FILE_APPEND | LOCK_EX)) {
        return ['success' => true, 'id' => $id];
    }
    
    return ['success' => false, 'error' => 'Erreur lors de l\'enregistrement du lien.'];
}

function deleteGalleryImage($filename) {
    $filePath = __DIR__ . '/uploads/gallery/' . $filename;
    if (file_exists($filePath)) {
        return unlink($filePath);
    }
    return false;
}

function deleteVideoLink($id) {
    $videoLinksFile = __DIR__ . '/uploads/gallery/video_links.txt';
    if (!file_exists($videoLinksFile)) {
        return false;
    }
    
    $lines = file($videoLinksFile, FILE_IGNORE_NEW_LINES);
    $newLines = [];
    $deleted = false;
    
    foreach ($lines as $line) {
        if (strpos($line, $id . '|') !== 0) {
            $newLines[] = $line;
        } else {
            $deleted = true;
        }
    }
    
    if ($deleted) {
        file_put_contents($videoLinksFile, implode("\n", $newLines) . ($newLines ? "\n" : ""));
    }
    
    return $deleted;
}

function getAllGalleryMedia() {
    $media = [];
    
    // Récupérer toutes les images
    $galleryDir = __DIR__ . '/uploads/gallery/';
    if (is_dir($galleryDir)) {
        $files = scandir($galleryDir);
        $imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'bmp'];
        
        foreach ($files as $file) {
            $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
            if (in_array($extension, $imageExtensions)) {
                $media[] = [
                    'type' => 'image',
                    'filename' => $file,
                    'path' => 'uploads/gallery/' . $file,
                    'date' => filemtime($galleryDir . $file),
                    'platform' => null,
                    'width' => null,
                    'height' => null
                ];
            }
        }
    }
    
    // Récupérer les liens vidéo
    $videoLinksFile = __DIR__ . '/uploads/gallery/video_links.txt';
    if (file_exists($videoLinksFile)) {
        $lines = file($videoLinksFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            $parts = explode('|', $line);
            if (count($parts) >= 5) {
                $media[] = [
                    'type' => 'video',
                    'id' => $parts[0],
                    'embedUrl' => $parts[1],
                    'originalUrl' => $parts[2],
                    'date' => intval($parts[3] ?? time()),
                    'platform' => $parts[4] ?? 'video',
                    'width' => $parts[5] ?? '800',
                    'height' => $parts[6] ?? '450'
                ];
            }
        }
    }
    
    // Trier par date (plus récent en premier)
    usort($media, function($a, $b) {
        return ($b['date'] ?? 0) - ($a['date'] ?? 0);
    });
    
    return $media;
}

$galleryMedia = getAllGalleryMedia();
$loginError = $_SESSION['login_error'] ?? null;
unset($_SESSION['login_error']);

$pageTitle = 'Galerie';
$activePage = 'galerie';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($pageTitle) ?> | <?= e(SITE_NAME) ?></title>
    <meta name="description" content="Site éducatif et créatif pour enfants.">
    <link rel="icon" type="image/jpg" sizes="32x32" href="uploads/omar.jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Comic Sans MS', 'Chilanka', cursive, sans-serif;
        }

        :root {
            --primary: #6ecbf5;
            --secondary: #ff6b6b;
            --accent1: #a29bfe;
            --accent2: #fd79a8;
            --accent3: #26de81;
            --dark: #2d3436;
            --light: #ffffff;
        }

        body {
            background: linear-gradient(135deg, var(--primary) 0%, #059ee3 100%);
            color: var(--dark);
            min-height: 100vh;
            overflow-x: hidden;
        }

        .navbar {
            background-color: var(--secondary);
            padding: 15px 0;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
            position: relative;
        }

        .logo img {
            width: 70px;
            height: 50px;
            object-fit: contain;
        }

        .nav-links {
            display: flex;
            list-style: none;
            gap: 1rem;
        }

        .nav-links li a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            font-size: 1.05rem;
            padding: 8px 15px;
            border-radius: 20px;
            transition: all 0.3s;
            display: flex;
            align-items: center;
        }

        .nav-links li a:hover,
        .nav-links li a.active {
            background-color: rgba(255, 255, 255, 0.2);
            transform: translateY(-3px);
        }

        .menu-toggle {
            display: none;
            background: none;
            border: none;
            color: white;
            font-size: 1.8rem;
            cursor: pointer;
            min-width: 44px;
            min-height: 44px;
        }

        @media (max-width: 768px) {
            .menu-toggle {
                display: flex;
                align-items: center;
                justify-content: center;
            }
            .nav-links {
                display: none;
                width: 100%;
                flex-direction: column;
                position: absolute;
                top: 100%;
                left: 0;
                background: var(--secondary);
                padding: 1rem 0;
                gap: 0;
                box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            }
            .nav-links.active {
                display: flex;
            }
            .nav-links li {
                width: 100%;
                text-align: center;
            }
            .nav-links li a {
                display: block;
                padding: 12px 20px;
                border-radius: 0;
            }
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .page-header {
            text-align: center;
            padding: 10px 5px;
            color: white;
        }

        .page-header h1 {
            font-size: 3rem;
            text-shadow: 3px 3px 0 var(--accent2);
            margin-bottom: 15px;
            animation: bounce 2s infinite;
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        
        .page-header .subtitle {
            font-size: 1.8rem;
            color: #ffeaa7;
            text-shadow: 1px 1px 0 #e17055;
        }
        
        .carousel-container {
            background: rgba(0,0,0,0.3);
            border-radius: 30px;
            padding: 20px;
            margin: 20px 0;
            backdrop-filter: blur(5px);
        }

        .media-viewer {
            position: relative;
            background: rgba(0,0,0,0.5);
            border-radius: 20px;
            overflow: hidden;
            min-height: 500px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        .media-content {
            width: 100%;
            min-height: 500px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .media-content img {
            max-width: 100%;
            max-height: 500px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        }

        .media-content iframe {
            max-width: 100%;
            border-radius: 15px;
            border: none;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        }

        /* Styles spécifiques par plateforme */
        .media-content.youtube iframe {
            aspect-ratio: 16/9;
            width: 100%;
            max-width: 800px;
        }

        .media-content.facebook iframe {
            aspect-ratio: 16/9;
            width: 100%;
            max-width: 560px;
        }

        .media-content.tiktok iframe {
            aspect-ratio: 9/16;
            width: 100%;
            max-width: 325px;
            height: auto;
        }

        .media-content.instagram iframe {
            aspect-ratio: 4/5;
            width: 100%;
            max-width: 400px;
        }

        .media-content.vimeo iframe,
        .media-content.dailymotion iframe,
        .media-content.twitch iframe {
            aspect-ratio: 16/9;
            width: 100%;
            max-width: 800px;
        }

        .media-content.twitter iframe {
            aspect-ratio: 1/1;
            width: 100%;
            max-width: 550px;
        }

        .media-viewer.fullscreen {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 1000;
            background: rgba(0,0,0,0.95);
            border-radius: 0;
            cursor: default;
        }

        .media-viewer.fullscreen .media-content {
            width: 100vw;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .media-viewer.fullscreen .media-content iframe,
        .media-viewer.fullscreen .media-content img {
            max-width: 95vw;
            max-height: 95vh;
            width: auto;
            height: auto;
        }

        .close-fullscreen {
            position: absolute;
            top: 20px;
            right: 20px;
            background: rgba(255,0,0,0.8);
            color: white;
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
            font-size: 20px;
            z-index: 1001;
            transition: all 0.3s;
        }

        .close-fullscreen:hover {
            background: rgba(255,0,0,1);
            transform: scale(1.1);
        }

        .nav-arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(255,255,255,0.3);
            color: white;
            border: none;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            cursor: pointer;
            font-size: 24px;
            transition: background 0.3s;
            z-index: 10;
        }

        .nav-arrow:hover {
            background: rgba(255,255,255,0.5);
        }

        .nav-arrow.prev { left: 10px; }
        .nav-arrow.next { right: 10px; }

        .carousel-progress {
            display: flex;
            justify-content: center;
            gap: 8px;
            margin-top: 20px;
        }

        .progress-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: rgba(255,255,255,0.5);
            transition: all 0.3s;
            cursor: pointer;
        }

        .progress-dot.active {
            background: var(--accent2);
            transform: scale(1.2);
        }

        .delete-media-btn {
            position: absolute;
            top: 10px;
            right: 70px;
            background: rgba(255,0,0,0.8);
            color: white;
            border: none;
            border-radius: 50%;
            width: 35px;
            height: 35px;
            cursor: pointer;
            font-size: 16px;
            z-index: 10;
            transition: all 0.3s;
        }

        .delete-media-btn:hover {
            background: rgba(255,0,0,1);
            transform: scale(1.1);
        }

        .platform-badge {
            position: absolute;
            bottom: 10px;
            left: 10px;
            background: rgba(0,0,0,0.7);
            color: white;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            z-index: 10;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .platform-badge i {
            font-size: 14px;
        }

        .empty-gallery {
            text-align: center;
            padding: 60px;
            color: white;
            font-size: 1.2rem;
        }

        .empty-gallery i {
            font-size: 4rem;
            margin-bottom: 20px;
        }

        .panel {
            background: white;
            border-radius: 20px;
            padding: 25px;
            margin-top: 30px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }

        .login-form {
            max-width: 300px;
            margin: 0 auto;
        }

        .login-form input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 2px solid #ddd;
            border-radius: 25px;
            font-size: 1rem;
        }

        .btn {
            display: inline-block;
            background: var(--primary);
            color: white;
            padding: 12px 25px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: bold;
            transition: all 0.3s;
            border: none;
            cursor: pointer;
            font-size: 1rem;
            box-shadow: 0 4px 0 #059ee3;
        }

        .btn:hover {
            background: #059ee3;
            transform: translateY(-3px);
            box-shadow: 0 6px 0 #037bb8;
        }

        .btn-danger {
            background: #ff4444;
            box-shadow: 0 4px 0 #cc0000;
        }

        .btn-danger:hover {
            background: #cc0000;
        }

        .upload-area {
            border: 3px dashed var(--primary);
            border-radius: 15px;
            padding: 30px;
            text-align: center;
            cursor: pointer;
            transition: background 0.3s;
            margin-top: 20px;
        }

        .upload-area:hover {
            background: rgba(110,203,245,0.1);
        }

        .upload-area i {
            font-size: 3rem;
            color: var(--primary);
            margin-bottom: 10px;
        }

        .video-link-form {
            margin-top: 20px;
            padding-top: 20px;
            border-top: 2px solid #e0e0e0;
        }

        .video-link-form input {
            width: 100%;
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 25px;
            margin: 10px 0;
            font-size: 1rem;
        }

        .supported-platforms {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin: 15px 0;
            justify-content: center;
        }

        .supported-platforms span {
            background: #f0f0f0;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .progress-bar {
            width: 100%;
            height: 8px;
            background: #e0e0e0;
            border-radius: 4px;
            overflow: hidden;
            margin-top: 15px;
            display: none;
        }

        .progress-fill {
            height: 100%;
            background: var(--accent3);
            width: 0%;
            transition: width 0.3s;
        }

        .notification {
            position: fixed;
            bottom: 20px;
            right: 20px;
            padding: 12px 20px;
            border-radius: 10px;
            z-index: 1000;
            font-weight: bold;
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
            animation: slideIn 0.3s ease;
        }

        @keyframes slideIn {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }

        .notification.success { background: var(--accent3); color: white; }
        .notification.error { background: #f44336; color: white; }

         /* Footer */
        footer {
            background: var(--dark);
            color: white;
            text-align: center;
            padding: 30px 20px;
            margin-top: 50px;
        }

        .social-icons {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 15px;
            margin: 20px 0;
        }

        .social-icons a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 50px;
            height: 50px;
            background: var(--primary);
            color: white;
            border-radius: 50%;
            font-size: 1.5rem;
            transition: all 0.3s;
            text-decoration: none;
        }
        
        .social-icons a:hover {
            transform: translateY(-5px);
            background: var(--accent2);
        }

        @media (max-width: 768px) {
            .page-header h1 { font-size: 2rem; }
            .page-header .subtitle { font-size: 1.2rem; }
            .nav-arrow {
                width: 35px;
                height: 35px;
                font-size: 18px;
            }
            .delete-media-btn {
                right: 50px;
                width: 30px;
                height: 30px;
                font-size: 12px;
            }
            .platform-badge { font-size: 10px; }
        }
    </style>
</head>
<body>

<nav class="navbar">
    <div class="nav-container">
        <a href="index.php" class="logo">
            <img src="uploads/omarW.png" alt="Site">
        </a>
        <button class="menu-toggle" id="menuToggle">
            <i class="fas fa-bars"></i>
        </button>
        <ul class="nav-links" id="navLinks">
            <li><a href="index.php">Accueil</a></li>
            <li><a href="apprentissage.php">Apprentissage</a></li>
            <li><a href="jeux.php">Jeux</a></li>
            <li><a href="galerie.php" class="active">Galerie</a></li>
            <li><a href="apropos.php">À propos</a></li>
        </ul>
    </div>
</nav>

<div class="container">
    <header class="page-header">
        <h1><i class="fas fa-images"></i> Galerie créative</h1>
        <p class="subtitle">Voir et partager mes créations</p>
    </header>

    <?php if (empty($galleryMedia)): ?>
        <div class="empty-gallery">
            <i class="fas fa-camera"></i>
            <p>Aucun média dans la galerie pour le moment.</p>
            <?php if (isAdmin()): ?>
                <p style="margin-top: 20px;">Connectez-vous pour ajouter des images ou des vidéos !</p>
            <?php endif; ?>
        </div>
    <?php else: ?>
        <div class="carousel-container">
            <div class="media-viewer" id="mediaViewer">
                <button class="nav-arrow prev" id="prevMedia">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <div class="media-content" id="mediaContent"></div>
                <button class="nav-arrow next" id="nextMedia">
                    <i class="fas fa-chevron-right"></i>
                </button>
                <?php if (isAdmin()): ?>
                    <button class="delete-media-btn" id="deleteMediaBtn"></button>
                <?php endif; ?>
            </div>
            <div class="carousel-progress" id="carouselProgress"></div>
        </div>
    <?php endif; ?>

    <section class="panel">
        <?php if (!isAdmin()): ?>
            <h2 style="text-align:center; margin-bottom:20px;"><i class="fas fa-lock"></i> Espace admin</h2>
            <?php if ($loginError): ?>
                <div class="notification error" style="position:static; margin-bottom:18px;">
                    <?= e($loginError) ?>
                </div>
            <?php endif; ?>
            <form method="POST" class="login-form" autocomplete="off">
                <input type="hidden" name="csrf_token" value="<?= e(csrfToken()) ?>">
                <input type="password" name="password" placeholder="Mot de passe admin" required>
                <button type="submit" name="login" class="btn" style="width:100%;">Se connecter</button>
            </form>
        <?php else: ?>
            <h2 style="margin-bottom:16px;"><i class="fas fa-crown"></i> Administration</h2>
            <a href="galerie.php?logout=1" class="btn btn-danger">Se déconnecter</a>

            <div class="upload-area" id="uploadArea">
                <i class="fas fa-cloud-upload-alt"></i>
                <p><strong>Ajoute une image</strong></p>
                <p>Clique ou glisse une image ici</p>
                <small>Formats autorisés : JPG, PNG, GIF, WEBP - max 5 Mo</small>
                <input type="file" id="imageInput" accept="image/jpeg,image/png,image/gif,image/webp" hidden>
            </div>

            <div class="progress-bar" id="progressBar">
                <div class="progress-fill" id="progressFill"></div>
            </div>

            <div class="video-link-form">
                <p><strong><i class="fas fa-link"></i> Ajouter un lien vidéo</strong></p>
                <div class="supported-platforms">
                    <span><i class="fab fa-youtube"></i> YouTube</span>
                    <span><i class="fab fa-facebook"></i> Facebook</span>
                    <span><i class="fab fa-tiktok"></i> TikTok</span>
                    <span><i class="fab fa-instagram"></i> Instagram</span>
                    <span><i class="fab fa-vimeo"></i> Vimeo</span>
                    <span><i class="fab fa-twitch"></i> Twitch</span>
                    <span><i class="fab fa-twitter"></i> Twitter/X</span>
                </div>
                <input type="url" id="videoLinkInput" placeholder="Collez le lien de la vidéo ici..." />
                <button class="btn" id="addVideoLinkBtn">
                    <i class="fas fa-plus-circle"></i> Ajouter la vidéo
                </button>
            </div>
        <?php endif; ?>
    </section>
</div>

<?php include __DIR__ . '/includes/footer.php'; ?>

<script>
let mediaItems = <?= json_encode($galleryMedia, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?>;
let currentIndex = 0;
let isFullscreen = false;
let autoPlayInterval = null;
let isAutoPlaying = true;
const isAdmin = <?= isAdmin() ? 'true' : 'false' ?>;
const csrfToken = <?= json_encode(csrfToken()) ?>;

// Fonction pour obtenir l'icône de la plateforme
function getPlatformIcon(platform) {
    const icons = {
        'youtube': '<i class="fab fa-youtube"></i>',
        'facebook': '<i class="fab fa-facebook"></i>',
        'tiktok': '<i class="fab fa-tiktok"></i>',
        'instagram': '<i class="fab fa-instagram"></i>',
        'vimeo': '<i class="fab fa-vimeo"></i>',
        'twitch': '<i class="fab fa-twitch"></i>',
        'twitter': '<i class="fab fa-twitter"></i>',
        'dailymotion': '<i class="fab fa-dailymotion"></i>'
    };
    return icons[platform] || '<i class="fas fa-video"></i>';
}

// Fonction pour obtenir le nom de la plateforme
function getPlatformName(platform) {
    const names = {
        'youtube': 'YouTube',
        'facebook': 'Facebook',
        'tiktok': 'TikTok',
        'instagram': 'Instagram',
        'vimeo': 'Vimeo',
        'twitch': 'Twitch',
        'twitter': 'Twitter',
        'dailymotion': 'Dailymotion'
    };
    return names[platform] || 'Vidéo';
}

// Rendu du média avec les dimensions adaptées
function renderMediaContent(media) {
    const container = document.getElementById('mediaContent');
    if (!container) return;
    
    if (media.type === 'video') {
        const platform = media.platform || 'video';
        const width = media.width || '800';
        const height = media.height || '450';
        
        let style = '';
        if (platform === 'tiktok') {
            style = 'max-width: 325px; aspect-ratio: 9/16;';
        } else if (platform === 'instagram') {
            style = 'max-width: 400px; aspect-ratio: 4/5;';
        } else if (platform === 'twitter') {
            style = 'max-width: 550px; aspect-ratio: 1/1;';
        } else {
            style = 'max-width: 800px; aspect-ratio: 16/9;';
        }
        
        container.innerHTML = `
            <div style="position: relative; width: 100%; display: flex; justify-content: center;">
                <iframe src="${media.embedUrl}" 
                        frameborder="0" 
                        allowfullscreen
                        style="${style} width: 100%; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.3);">
                </iframe>
                <div class="platform-badge">
                    ${getPlatformIcon(platform)} ${getPlatformName(platform)}
                </div>
            </div>
        `;
        container.className = `media-content ${platform}`;
    } else {
        container.innerHTML = `<img src="${media.path}?v=${Date.now()}" alt="Média galerie">`;
        container.className = 'media-content';
    }
}

function startAutoPlay() {
    if (autoPlayInterval) clearInterval(autoPlayInterval);
    autoPlayInterval = setInterval(() => {
        if (isAutoPlaying && !isFullscreen && mediaItems.length > 0) {
            nextMedia();
        }
    }, 4000);
}

function stopAutoPlay() {
    if (autoPlayInterval) {
        clearInterval(autoPlayInterval);
        autoPlayInterval = null;
    }
}

function updateMediaDisplay() {
    if (!mediaItems.length) return;
    const media = mediaItems[currentIndex];
    renderMediaContent(media);
    
    if (isAdmin) {
        const deleteBtn = document.getElementById('deleteMediaBtn');
        if (deleteBtn) {
            deleteBtn.innerHTML = '<i class="fas fa-trash"></i>';
            deleteBtn.dataset.type = media.type;
            deleteBtn.dataset.filename = media.filename || media.id || '';
        }
    }
    
    document.querySelectorAll('.progress-dot').forEach((dot, idx) => {
        dot.classList.toggle('active', idx === currentIndex);
    });
}

function nextMedia() {
    if (mediaItems.length) {
        currentIndex = (currentIndex + 1) % mediaItems.length;
        updateMediaDisplay();
    }
}

function prevMedia() {
    if (mediaItems.length) {
        currentIndex = (currentIndex - 1 + mediaItems.length) % mediaItems.length;
        updateMediaDisplay();
    }
}

function toggleFullscreen() {
    const viewer = document.getElementById('mediaViewer');
    isFullscreen = !isFullscreen;
    
    if (isFullscreen) {
        viewer.classList.add('fullscreen');
        const closeBtn = document.createElement('button');
        closeBtn.innerHTML = '<i class="fas fa-times"></i>';
        closeBtn.className = 'close-fullscreen';
        closeBtn.onclick = () => toggleFullscreen();
        viewer.appendChild(closeBtn);
        stopAutoPlay();
    } else {
        viewer.classList.remove('fullscreen');
        const closeBtn = viewer.querySelector('.close-fullscreen');
        if (closeBtn) closeBtn.remove();
        startAutoPlay();
    }
}

async function uploadImage(file) {
    const formData = new FormData();
    formData.append('image', file);
    formData.append('csrf_token', csrfToken);
    
    const progressBar = document.getElementById('progressBar');
    const progressFill = document.getElementById('progressFill');
    if (progressBar) progressBar.style.display = 'block';
    if (progressFill) progressFill.style.width = '45%';
    
    try {
        const response = await fetch('galerie.php', { method: 'POST', body: formData });
        const data = await response.json();
        
        if (!data.success) throw new Error(data.error);
        
        mediaItems.unshift({
            type: 'image',
            filename: data.filename,
            path: data.filepath,
            date: Date.now()
        });
        currentIndex = 0;
        rebuildGallery();
        showNotification('Image ajoutée avec succès!', 'success');
    } catch (error) {
        showNotification(error.message || 'Erreur lors de l\'envoi.', 'error');
    } finally {
        if (progressFill) progressFill.style.width = '100%';
        setTimeout(() => {
            if (progressBar) progressBar.style.display = 'none';
            if (progressFill) progressFill.style.width = '0%';
        }, 500);
    }
}

async function addVideoLink(url) {
    const formData = new FormData();
    formData.append('video_link', url);
    formData.append('csrf_token', csrfToken);
    
    try {
        const response = await fetch('galerie.php', { method: 'POST', body: formData });
        const data = await response.json();
        
        if (!data.success) throw new Error(data.error);
        
        mediaItems.unshift({
            type: 'video',
            id: data.id,
            embedUrl: data.embedUrl,
            originalUrl: data.originalUrl,
            platform: data.platform,
            width: data.width,
            height: data.height,
            date: Date.now()
        });
        currentIndex = 0;
        rebuildGallery();
        showNotification('Vidéo ajoutée avec succès!', 'success');
    } catch (error) {
        showNotification(error.message || 'Lien vidéo invalide ou non supporté.', 'error');
    }
}

async function deleteMedia(type, filename) {
    if (!confirm('Supprimer ce média ?')) return;
    
    const formData = new FormData();
    formData.append('delete_media', '1');
    formData.append('type', type);
    formData.append('filename', filename);
    formData.append('csrf_token', csrfToken);
    
    try {
        const response = await fetch('galerie.php', { method: 'POST', body: formData });
        const data = await response.json();
        
        if (!data.success) throw new Error('Erreur suppression');
        
        const index = mediaItems.findIndex(m => (m.filename || m.id) === filename);
        if (index !== -1) mediaItems.splice(index, 1);
        if (currentIndex >= mediaItems.length) currentIndex = Math.max(0, mediaItems.length - 1);
        rebuildGallery();
        showNotification('Média supprimé.', 'success');
    } catch (error) {
        showNotification('Erreur suppression.', 'error');
    }
}

function rebuildGallery() {
    const container = document.querySelector('.carousel-container');
    const emptyGallery = document.querySelector('.empty-gallery');
    
    if (!mediaItems.length) {
        if (container) container.remove();
        if (!emptyGallery) {
            const panel = document.querySelector('.panel');
            panel.insertAdjacentHTML('beforebegin', '<div class="empty-gallery"><i class="fas fa-camera"></i><p>Aucun média dans la galerie.</p></div>');
            if (container) container.remove();
        }
        return;
    }
    
    if (emptyGallery) emptyGallery.remove();
    
    const progressDots = mediaItems.map((_, idx) => 
        `<div class="progress-dot ${idx === currentIndex ? 'active' : ''}" data-index="${idx}"></div>`
    ).join('');
    
    const carouselHtml = `
        <div class="carousel-container">
            <div class="media-viewer" id="mediaViewer">
                <button class="nav-arrow prev" id="prevMedia"><i class="fas fa-chevron-left"></i></button>
                <div class="media-content" id="mediaContent"></div>
                <button class="nav-arrow next" id="nextMedia"><i class="fas fa-chevron-right"></i></button>
                ${isAdmin ? `<button class="delete-media-btn" id="deleteMediaBtn"></button>` : ''}
            </div>
            <div class="carousel-progress" id="carouselProgress">${progressDots}</div>
        </div>
    `;
    
    const panel = document.querySelector('.panel');
    const oldCarousel = document.querySelector('.carousel-container');
    if (oldCarousel) oldCarousel.remove();
    panel.insertAdjacentHTML('beforebegin', carouselHtml);
    renderMediaContent(mediaItems[currentIndex]);
    bindCarouselEvents();
}

function bindCarouselEvents() {
    document.getElementById('prevMedia')?.addEventListener('click', () => { stopAutoPlay(); prevMedia(); startAutoPlay(); });
    document.getElementById('nextMedia')?.addEventListener('click', () => { stopAutoPlay(); nextMedia(); startAutoPlay(); });
    document.getElementById('mediaViewer')?.addEventListener('click', (e) => {
        if (e.target === e.currentTarget || e.target.closest('.media-content')) {
            toggleFullscreen();
        }
    });
    document.getElementById('deleteMediaBtn')?.addEventListener('click', () => {
        const btn = document.getElementById('deleteMediaBtn');
        deleteMedia(btn.dataset.type, btn.dataset.filename);
    });
    document.querySelectorAll('.progress-dot').forEach(dot => {
        dot.addEventListener('click', () => {
            stopAutoPlay();
            currentIndex = parseInt(dot.dataset.index);
            updateMediaDisplay();
            startAutoPlay();
        });
    });
}

function showNotification(message, type) {
    const existing = document.querySelector('.notification');
    if (existing) existing.remove();
    
    const notification = document.createElement('div');
    notification.className = `notification ${type}`;
    notification.textContent = message;
    document.body.appendChild(notification);
    setTimeout(() => notification.remove(), 3000);
}

// Menu mobile
document.getElementById('menuToggle')?.addEventListener('click', () => {
    document.getElementById('navLinks')?.classList.toggle('active');
});

// Initialisation
if (mediaItems.length) {
    bindCarouselEvents();
    startAutoPlay();
    document.getElementById('mediaViewer')?.addEventListener('mouseenter', () => isAutoPlaying = false);
    document.getElementById('mediaViewer')?.addEventListener('mouseleave', () => isAutoPlaying = true);
}

// Upload handlers
const uploadArea = document.getElementById('uploadArea');
const imageInput = document.getElementById('imageInput');
if (uploadArea && imageInput) {
    uploadArea.addEventListener('click', () => imageInput.click());
    uploadArea.addEventListener('dragover', (e) => {
        e.preventDefault();
        uploadArea.style.background = 'rgba(110,203,245,0.2)';
    });
    uploadArea.addEventListener('dragleave', () => {
        uploadArea.style.background = '';
    });
    uploadArea.addEventListener('drop', (e) => {
        e.preventDefault();
        uploadArea.style.background = '';
        const file = e.dataTransfer.files[0];
        if (file && file.type.startsWith('image/')) {
            uploadImage(file);
        } else {
            showNotification('Déposez une image valide.', 'error');
        }
    });
    imageInput.addEventListener('change', (e) => {
        if (e.target.files[0]) uploadImage(e.target.files[0]);
        imageInput.value = '';
    });
}

// Video link handler
document.getElementById('addVideoLinkBtn')?.addEventListener('click', () => {
    const url = document.getElementById('videoLinkInput').value.trim();
    if (url) {
        addVideoLink(url);
        document.getElementById('videoLinkInput').value = '';
    } else {
        showNotification('Entrez un lien vidéo valide.', 'error');
    }
});

// Navigation clavier
document.addEventListener('keydown', (e) => {
    if (!mediaItems.length) return;
    if (e.key === 'ArrowLeft') { stopAutoPlay(); prevMedia(); startAutoPlay(); }
    if (e.key === 'ArrowRight') { stopAutoPlay(); nextMedia(); startAutoPlay(); }
    if (e.key === 'Escape' && isFullscreen) toggleFullscreen();
});
</script>
</body>
</html>