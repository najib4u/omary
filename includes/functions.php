<?php
declare(strict_types=1);

require_once __DIR__ . '/../config.php';

function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function redirect(string $url): void
{
    header('Location: ' . $url);
    exit;
}

function isAdmin(): bool
{
    return !empty($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true;
}

function csrfToken(): string
{
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function verifyCsrfToken(?string $token): bool
{
    return !empty($token) && !empty($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

function ensureGalleryDirectory(): void
{
    if (!is_dir(GALLERY_DIR)) {
        mkdir(GALLERY_DIR, 0775, true);
    }
}

function getGalleryPhotos(): array
{
    ensureGalleryDirectory();

    $photos = [];
    $files = scandir(GALLERY_DIR);

    foreach ($files as $file) {
        if ($file === '.' || $file === '..') {
            continue;
        }

        $fullPath = GALLERY_DIR . $file;
        if (!is_file($fullPath)) {
            continue;
        }

        $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
        if (!in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp'], true)) {
            continue;
        }

        $photos[] = [
            'filename' => $file,
            'path' => GALLERY_URL . $file,
            'mtime' => filemtime($fullPath),
        ];
    }

    usort($photos, fn($a, $b) => $b['mtime'] <=> $a['mtime']);

    return $photos;
}

function jsonResponse(array $data, int $status = 200): void
{
    http_response_code($status);
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    exit;
}

function validateUploadedImage(array $file): array
{
    if (($file['error'] ?? UPLOAD_ERR_NO_FILE) !== UPLOAD_ERR_OK) {
        return ['valid' => false, 'error' => 'Erreur pendant le téléchargement.'];
    }

    if (($file['size'] ?? 0) > MAX_UPLOAD_SIZE) {
        return ['valid' => false, 'error' => 'Image trop volumineuse (max 5 Mo).'];
    }

    if (!is_uploaded_file($file['tmp_name'])) {
        return ['valid' => false, 'error' => 'Fichier invalide.'];
    }

    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime = finfo_file($finfo, $file['tmp_name']);
    finfo_close($finfo);

    if (!$mime || !array_key_exists($mime, ALLOWED_IMAGE_TYPES)) {
        return ['valid' => false, 'error' => 'Format non supporté. Utilise JPG, PNG, GIF ou WEBP.'];
    }

    $imageInfo = @getimagesize($file['tmp_name']);
    if ($imageInfo === false) {
        return ['valid' => false, 'error' => "Le fichier n'est pas une image valide."];
    }

    return [
        'valid' => true,
        'mime' => $mime,
        'extension' => ALLOWED_IMAGE_TYPES[$mime],
    ];
}

function saveUploadedImage(array $file, string $extension): array
{
    ensureGalleryDirectory();

    $safeName = bin2hex(random_bytes(12)) . '.' . $extension;
    $target = GALLERY_DIR . $safeName;

    if (!move_uploaded_file($file['tmp_name'], $target)) {
        return ['success' => false, 'error' => "Impossible d'enregistrer l'image."];
    }

    return [
        'success' => true,
        'filename' => $safeName,
        'filepath' => GALLERY_URL . $safeName,
    ];
}

function deleteGalleryPhoto(string $filename): bool
{
    $safeFile = basename($filename);
    $fullPath = GALLERY_DIR . $safeFile;

    return is_file($fullPath) ? unlink($fullPath) : false;
}
