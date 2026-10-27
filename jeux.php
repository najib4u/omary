<?php
require_once __DIR__ . '/includes/functions.php';

$pageTitle = 'Jeux';
$activePage = 'jeux';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($pageTitle) ?> | <?= e(SITE_NAME) ?></title>
    <meta name="description" content="Jeux éducatifs amusants pour enfants - Site éducatif et créatif.">
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

        /* Header */
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

        /* Game Grid - FIXED: Added missing CSS */
        .game-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin: 30px 0;
        }

        .game-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
            transition: all 0.3s;
        }

        .game-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.15);
        }

        .game-image {
            height: 120px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 5rem;
            color: white;
            transition: transform 0.3s;
        }

        .game-card:hover .game-image {
            transform: scale(1.05);
        }

        .game-image i {
            font-size: 5rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
        }

        .game-content {
            padding: 25px;
            text-align: center;
        }

        .game-content h3 {
            margin-bottom: 15px;
            color: var(--dark);
            font-size: 1.5rem;
        }

        .game-content p {
            margin-bottom: 20px;
            line-height: 1.6;
            color: #555;
        }

        /* Difficulty Stars */
        .difficulty {
            display: flex;
            justify-content: center;
            gap: 5px;
            margin-bottom: 20px;
        }

        .star {
            color: #fdcb6e;
            font-size: 1.2rem;
        }

        .star.far {
            color: #ddd;
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

        /* Responsive */
        @media (max-width: 768px) {
            .page-header h1 {
                font-size: 2rem;
            }

            .page-header .subtitle {
                font-size: 1.2rem;
            }

            .game-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .game-image {
                height: 150px;
                font-size: 4rem;
            }

            .game-image i {
                font-size: 4rem;
            }

            .game-content {
                padding: 20px;
            }

            .game-content h3 {
                font-size: 1.3rem;
            }
        }

        @media (max-width: 480px) {
            .container {
                padding: 15px;
            }

            .game-content {
                padding: 15px;
            }

            .btn {
                padding: 10px 20px;
                font-size: 0.9rem;
            }

            .difficulty {
                gap: 3px;
            }

            .star {
                font-size: 1rem;
            }
        }
    </style>
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

<header class="page-header">
    <h1>Espace Jeux</h1>
    <p class="subtitle">Apprends en t'amusant !</p>
</header>

<div class="container">
    <div class="game-grid">
        <!-- Game 1: Course aux Nombres -->
        <div class="game-card">
            <div class="game-image" style="background-color: #fd9644;">
                <i class="fas fa-sort-numeric-down-alt">🧮</i>
            </div>
            <div class="game-content">
                <h3>Course aux Nombres</h3>
                <p>Résous des calculs le plus vite possible pour gagner la course !</p>
                <div class="difficulty">
                    <i class="fas fa-star star"></i>
                    <i class="fas fa-star star"></i>
                    <i class="far fa-star star"></i>
                </div>
                <a href="jeux_maths.php" class="btn">Jouer</a>
            </div>
        </div>

        <!-- Game 2: Spelling Bee -->
        <div class="game-card">
            <div class="game-image" style="background-color: #fd9644;">
                <i>🐝 ..Buzz</i>
            </div>
            <div class="game-content">
                <h3>Spelling Bee</h3>
                <p>A real competition in spelling words in english!</p>
                <div class="difficulty">
                    <i class="fas fa-star star"></i>
                    <i class="fas fa-star star"></i>
                    <i class="fas fa-star star"></i>
                    <i class="fas fa-star star"></i>
                    <i class="fas fa-star star"></i>
                </div>
                <a href="spell.php" class="btn">Let's spell 🐝</a>
            </div>
        </div>

        <!-- Game 3: Mots Mélangés -->
        <div class="game-card">
            <div class="game-image" style="background-color: #26de81;">
                <i class="fas fa-font">🔠</i>
            </div>
            <div class="game-content">
                <h3>Mots Mélangés</h3>
                <p>Reconstitue les mots à partir de lettres mélangées.</p>
                <div class="difficulty">
                    <i class="fas fa-star star"></i>
                    <i class="far fa-star star"></i>
                    <i class="far fa-star star"></i>
                </div>
                <a href="jeux_abc.php" class="btn">Jouer</a>
            </div>
        </div>

        <!-- Game 4: Puzzle Géographique -->
        <div class="game-card">
            <div class="game-image" style="background-color: #a55eea;">
                <i class="fas fa-map-marked-alt"></i>
            </div>
            <div class="game-content">
                <h3>Puzzle Géographique</h3>
                <p>Replace les pays et les continents au bon endroit sur la carte.</p>
                <div class="difficulty">
                    <i class="fas fa-star star"></i>
                    <i class="fas fa-star star"></i>
                    <i class="fas fa-star star"></i>
                </div>
                <a href="jeux_puzzle.php" class="btn">Jouer</a>
            </div>
        </div>

        <!-- Game 5: Memory Scientifique -->
        <div class="game-card">
            <div class="game-image" style="background-color: #00cec9;">
                <i class="fas fa-brain"></i>
            </div>
            <div class="game-content">
                <h3>Memory Scientifique</h3>
                <p>Retrouve les paires d'images liées aux sciences.</p>
                <div class="difficulty">
                    <i class="fas fa-star star"></i>
                    <i class="fas fa-star star"></i>
                    <i class="far fa-star star"></i>
                </div>
                <a href="jeux_sciences.php" class="btn">Jouer</a>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/includes/footer.php'; ?>

<script>
// Mobile menu toggle
const menuToggle = document.getElementById('menuToggle');
const navLinks = document.getElementById('navLinks');

if (menuToggle && navLinks) {
    menuToggle.addEventListener('click', () => {
        navLinks.classList.toggle('active');
    });

    // Close menu when clicking a link (better UX)
    navLinks.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', () => {
            navLinks.classList.remove('active');
        });
    });
}
</script>

</body>
</html>