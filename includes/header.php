<?php
if (!isset($pageTitle)) {
    $pageTitle = SITE_NAME;
}
if (!isset($activePage)) {
    $activePage = '';
}
?>

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

        /* ========== NAVBAR ========== */
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

        /* Desktop Navigation */
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

        /* Mobile Menu Toggle */
        .menu-toggle {
            display: none;
            background: none;
            border: none;
            color: white;
            font-size: 1.8rem;
            cursor: pointer;
            padding: 0.5rem;
            min-width: 44px;
            min-height: 44px;
        }

        /* ========== RESPONSIVE NAVBAR ========== */
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
                min-height: 44px;
            }

            .nav-links li a:hover,
            .nav-links li a.active {
                transform: none;
                background-color: rgba(255, 255, 255, 0.3);
            }
        }

        /* ========== MAIN CONTENT ========== */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .page-header {
            text-align: center;
            padding: 30px 20px;
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
            font-size: 1.5rem;
            color: #ffeaa7;
            text-shadow: 1px 1px 0 #e17055;
        }
        
        /* Gallery */
        .gallery-big-view {
            background: rgba(0,0,0,0.8);
            border-radius: 20px;
            margin: 20px 0;
            padding: 20px;
            text-align: center;
            min-height: 500px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .big-image-container {
            position: relative;
            display: inline-block;
            max-width: 100%;
        }

        .big-image {
            max-width: 100%;
            max-height: 500px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
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
        }

        .nav-arrow:hover {
            background: rgba(255,255,255,0.5);
        }

        .nav-arrow.prev { left: 10px; }
        .nav-arrow.next { right: 10px; }

        .gallery-thumbnails {
            display: flex;
            gap: 15px;
            overflow-x: auto;
            padding: 20px 0;
            justify-content: center;
            flex-wrap: wrap;
        }

        .thumbnail {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 10px;
            cursor: pointer;
            border: 3px solid transparent;
            transition: transform 0.2s;
        }

        .thumbnail:hover {
            transform: scale(1.05);
        }

        .thumbnail.active {
            border-color: var(--accent2);
            box-shadow: 0 0 0 3px rgba(253,121,168,0.3);
        }

        .delete-photo-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            background: rgba(255,0,0,0.8);
            color: white;
            border: none;
            border-radius: 50%;
            width: 35px;
            height: 35px;
            cursor: pointer;
            font-size: 18px;
            transition: background 0.3s;
        }

        .delete-photo-btn:hover {
            background: rgba(255,0,0,1);
        }

        .empty-gallery {
            text-align: center;
            padding: 60px;
            color: white;
            font-size: 1.2rem;
        }
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
    margin: 0 10px;
    font-size: 1.5rem;
    transition: all 0.3s;
    text-decoration: none;
}

.social-icons a:hover {
    transform: translateY(-5px);
    background: var(--accent2);
}

        /* Admin Panel */
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

        /* Notification */
        .notification {
            position: fixed;
            bottom: 20px;
            right: 20px;
            padding: 12px 20px;
            border-radius: 10px;
            z-index: 1000;
            font-weight: bold;
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
        }

        .notification.success {
            background: var(--accent3);
            color: white;
        }

        .notification.error {
            background: #f44336;
            color: white;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .page-header h1 {
                font-size: 2rem;
            }

            .page-header .subtitle {
                font-size: 1.2rem;
            }

            .thumbnail {
                width: 70px;
                height: 70px;
            }

            .nav-arrow {
                width: 35px;
                height: 35px;
                font-size: 18px;
            }

            .big-image {
                max-height: 350px;
            }
        }

        @media (max-width: 480px) {
            .container {
                padding: 10px;
            }

            .thumbnail {
                width: 60px;
                height: 60px;
            }
        }
        
        </style>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($pageTitle) ?> | <?= e(SITE_NAME) ?></title>
    <meta name="description" content="Site éducatif et créatif pour enfants.">
    <link rel="icon" type="image/jpg" sizes="32x32" href="uploads/omar.jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>
<body>

<nav class="navbar">
    <div class="nav-container">
        <a href="index.php" class="logo">
            <img src="uploads/omarW.png" alt="Site">
        </a>

        <button class="menu-toggle" id="menuToggle" aria-label="Menu">
            <i class="fas fa-bars"></i>
        </button>

        <ul class="nav-links" id="navLinks">
            <li><a href="index.php" class="<?= $activePage === 'index' ? 'active' : '' ?>">Accueil</a></li>
            <li><a href="apprentissage.php" class="<?= $activePage === 'apprentissage' ? 'active' : '' ?>">Apprentissage</a></li>
            <li><a href="jeux.php" class="<?= $activePage === 'jeux' ? 'active' : '' ?>">Jeux</a></li>
            <li><a href="galerie.php" class="<?= $activePage === 'galerie' ? 'active' : '' ?>">Galerie</a></li>
            <li><a href="apropos.php" class="<?= $activePage === 'apropos' ? 'active' : '' ?>">À propos</a></li>
        </ul>
    </div>
</nav>

