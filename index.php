<?php
require_once __DIR__ . '/includes/functions.php';

$pageTitle = 'Accueil';
$activePage = 'index';
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
            font-family: 'Comic Sans MS', 'Kalam', cursive, sans-serif;
        
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
            text-shadow: 1px 1px 0 black;
        }

        /* Cards */
        .card-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
            margin: 30px 0;
        }

        .card {
            background: white;
            border-radius: 20px;
            padding: 25px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
            text-align: center;
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.15);
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            height: 5px;
            width: 100%;
            background: linear-gradient(90deg, var(--accent1), var(--accent2), var(--accent3));
        }

        .math-card { border-top: 8px solid #fd9644; }
        .reading-card { border-top: 8px solid #26de81; }
        .games-card { border-top: 8px solid #a55eea; }

        .card-icon {
            font-size: 4rem;
            margin-bottom: 20px;
            color: var(--primary);
        }

        .card-icon img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
        }

        .card h3 {
            margin-bottom: 15px;
            color: var(--dark);
        }

        .card p {
            margin-bottom: 20px;
            line-height: 1.6;
            color: #555;
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

        /* Welcome Section */
        .welcome-section {
            background: white;
            border-radius: 20px;
            padding: 30px;
            text-align: center;
            margin: 30px 0;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }

        .avatar {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            background: var(--accent2);
            margin: 0 auto 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .welcome-section h2 {
            margin-bottom: 15px;
            color: var(--secondary);
        }

        .welcome-section p {
            margin-bottom: 10px;
            line-height: 1.6;
        }

        /* Info Section */
        .info-section {
            background: #ffeaa7;
            border-radius: 20px;
            padding: 30px;
            margin: 30px 0;
        }

        .info-section h2 {
            color: #e17055;
            text-align: center;
            margin-bottom: 20px;
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
                font-size: 2.2rem;
            }

            .page-header .subtitle {
                font-size: 1.6rem;
            }

            .card-container {
                grid-template-columns: 1fr;
                gap: 10px;
            }

            .welcome-section, .info-section {
                padding: 10px;
            }

            .avatar {
                width: 120px;
                height: 120px;
            }
        }

        @media (max-width: 480px) {
            .container {
                padding: 15px;
            }

            .card {
                padding: 20px;
            }

            .btn {
                padding: 10px 20px;
                font-size: 0.9rem;
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
    <h1>Bienvenue Omary !</h1>
    <p class="subtitle">Apprendre en s'amusant - Niveau CE2</p>
</header>

<div class="container">
    <div class="card-container">
        <div class="card math-card">
            <div class="card-icon">
                <i class="fas fa-calculator"></i>
            </div>
            <h3>Mathématiques</h3>
            <p>Apprends les tables de multiplication, les additions et les soustractions avec des jeux amusants !</p>
            <a href="maths.php" class="btn">Commencer</a>
        </div>

        <div class="card reading-card">
            <div class="card-icon">
                <img src="Med.png" alt="Avatar d'Omar">
            </div>
            <h3>Lecture</h3>
            <p>Découvre des histoires captivantes du prophète Mohammed, que la paix et les bénédictions soient sur lui.</p>
            <a href="Med.php" class="btn">Le Prophète</a>
        </div>

        <div class="card games-card">
            <div class="card-icon">
                <i class="fas fa-puzzle-piece"></i>
            </div>
            <h3>Jeux Éducatifs</h3>
            <p>Des jeux amusants pour apprendre le français, les sciences et la géographie sans s'en rendre compte !</p>
            <a href="spell.php" class="btn">Jeux favoris</a>
        </div>
    </div>

    <section class="welcome-section">
        <div class="avatar">
            <img src="uploads/omar.jpg" alt="Avatar d'Omar">
        </div>
        <h2>Salut, je suis Omar !</h2>
        <p>J'ai <span id="age"></span> ans et je suis en <span id="classLevel"></span>.</p>
        <p>Sur ce site, tu trouveras plein d'activités intéressantes pour apprendre tout en t'amusant !</p>
        <p><small>🎂 Né(e) le 24 mars 2018</small></p>
    </section>

    <section class="info-section">
        <h2><i class="fas fa-lightbulb"></i> Le Savais-Tu ?</h2>
        <div class="card-container">
            <div class="card">
                <h3><i class="fas fa-kiwi-bird"></i> Les Autruches</h3>
                <p>Les autruches ont des yeux plus grands que leur cerveau !</p>
            </div>
            <div class="card">
                <h3><i class="fas fa-globe-europe"></i> Notre Planète</h3>
                <p>La Terre est la seule planète du système solaire qui possède de l'eau liquide en surface.</p>
            </div>
            <div class="card">
                <h3><i class="fas fa-bolt"></i> L'Électricité</h3>
                <p>La foudre est cinq fois plus chaude que la surface du soleil !</p>
            </div>
        </div>
    </section>
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

// Age calculation
function calculateAge(birthDay, birthMonth, birthYear) {
    const today = new Date();
    const birthDate = new Date(birthYear, birthMonth - 1, birthDay);
    let age = today.getFullYear() - birthDate.getFullYear();
    const monthDiff = today.getMonth() - birthDate.getMonth();
    if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }
    return age;
}

function getClassLevel(age) {
    const classes = {
        3: "Petite Section (PS)", 4: "Moyenne Section (MS)", 5: "Grande Section (GS)",
        6: "CP (Cours Préparatoire)", 7: "CE1 (Cours Élémentaire 1)", 8: "CE2 (Cours Élémentaire 2)",
        9: "CM1 (Cours Moyen 1)", 10: "CM2 (Cours Moyen 2)", 11: "6ème", 12: "5ème",
        13: "4ème", 14: "3ème", 15: "Seconde", 16: "Première", 17: "Terminale"
    };
    return classes[age] || `Classe de niveau ${age} ans`;
}

const age = calculateAge(24, 3, 2018);
const ageElement = document.getElementById('age');
const classElement = document.getElementById('classLevel');

if (ageElement) ageElement.textContent = age;
if (classElement) classElement.textContent = getClassLevel(age);
</script>

</body>
</html>