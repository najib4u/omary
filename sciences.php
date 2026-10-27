<?php
// Page éducative : Sciences Découverte - CP, CE1, CE2
// Thème: Corps Humain, Animaux, Plantes, Phénomènes Naturels

// Activation des erreurs pour le débogage (à supprimer en production)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

// Initialisation des scores si non existants
if (!isset($_SESSION['scores_sciences'])) {
    $_SESSION['scores_sciences'] = [
        'corps' => 0,
        'animaux' => 0,
        'plantes' => 0,
        'phenomenes' => 0
    ];
}

// Données pédagogiques par niveau et par thème
$contenus = [
    'cp' => [
        'corps' => [
            'titre' => 'Les Parties du Corps',
            'description' => 'Découvre les différentes parties de ton corps !',
            'lecons' => [
                'La tête : yeux, nez, bouche, oreilles',
                'Le tronc : ventre, poitrine, dos',
                'Les membres : bras, mains, jambes, pieds',
                'Le cœur pompe le sang dans tout le corps',
                'Les poumons nous aident à respirer'
            ],
            'quiz' => [
                'question' => 'Avec quoi entends-tu les sons ?',
                'options' => ['Les yeux', 'Les oreilles', 'Le nez', 'La bouche'],
                'reponse' => 1,
                'explication' => 'Les oreilles te permettent d\'entendre les sons !'
            ]
        ],
        'animaux' => [
            'titre' => 'Les Animaux de la Ferme',
            'description' => 'Apprends à connaître les animaux de la ferme !',
            'lecons' => [
                'La vache donne du lait',
                'La poule pond des œufs',
                'Le cochon aime se rouler dans la boue',
                'Le mouton donne de la laine pour faire des pulls',
                'Le cheval est un ami de l\'homme'
            ],
            'quiz' => [
                'question' => 'Quel animal donne du lait ?',
                'options' => ['La poule', 'Le cochon', 'La vache', 'Le mouton'],
                'reponse' => 2,
                'explication' => 'La vache donne du lait délicieux !'
            ]
        ],
        'plantes' => [
            'titre' => 'Les Parties d\'une Plante',
            'description' => 'Découvre comment poussent les plantes !',
            'lecons' => [
                'La racine : elle boit l\'eau dans la terre',
                'La tige : elle porte les feuilles et les fleurs',
                'Les feuilles : elles respirent et fabriquent la nourriture',
                'La fleur : elle donne les fruits',
                'Pour pousser, une plante a besoin d\'eau, de soleil et d\'air'
            ],
            'quiz' => [
                'question' => 'Quelle partie de la plante boit l\'eau dans la terre ?',
                'options' => ['La tige', 'La feuille', 'La racine', 'La fleur'],
                'reponse' => 2,
                'explication' => 'La racine boit l\'eau et les nutriments dans la terre !'
            ]
        ],
        'phenomenes' => [
            'titre' => 'La Météo',
            'description' => 'Observe les phénomènes météo !',
            'lecons' => [
                'Le soleil : il réchauffe la Terre',
                'La pluie : elle arrose les plantes',
                'Le vent : il fait voler les feuilles',
                'La neige : elle tombe quand il fait froid',
                'L\'arc-en-ciel : il apparaît après la pluie et le soleil'
            ],
            'quiz' => [
                'question' => 'Quand voit-on un arc-en-ciel ?',
                'options' => ['Quand il pleut seulement', 'Quand il y a du vent', 'Après la pluie et le soleil', 'Quand il neige'],
                'reponse' => 2,
                'explication' => 'L\'arc-en-ciel apparaît quand le soleil revient après la pluie !'
            ]
        ]
    ],
    'ce1' => [
        'corps' => [
            'titre' => 'Les 5 Sens',
            'description' => 'Découvre tes 5 sens extraordinaires !',
            'lecons' => [
                'La vue : les yeux te permettent de voir les couleurs et les formes',
                'L\'ouïe : les oreilles captent les sons',
                'L\'odorat : le nez sent les odeurs',
                'Le goût : la langue goûte : sucré, salé, acide, amer',
                'Le toucher : la peau sent le chaud, le froid, le doux, le rugueux'
            ],
            'quiz' => [
                'question' => 'Avec quel sens goûtes-tu une glace ?',
                'options' => ['La vue', 'L\'odorat', 'Le goût', 'Le toucher'],
                'reponse' => 2,
                'explication' => 'Le goût, avec ta langue, te permet de savourer la glace !'
            ]
        ],
        'animaux' => [
            'titre' => 'Les Animaux Sauvages',
            'description' => 'Pars à la découverte des animaux sauvages !',
            'lecons' => [
                'Le lion : le roi de la savane',
                'L\'éléphant : le plus grand animal terrestre',
                'La girafe : son long cou lui permet d\'atteindre les feuilles',
                'Le singe : il adore grimper aux arbres',
                'Le zèbre : ses rayures noires et blanches le camouflent'
            ],
            'quiz' => [
                'question' => 'Quel animal a un très long cou ?',
                'options' => ['L\'éléphant', 'Le lion', 'La girafe', 'Le zèbre'],
                'reponse' => 2,
                'explication' => 'La girafe a un long cou pour manger les feuilles en hauteur !'
            ]
        ],
        'plantes' => [
            'titre' => 'Le Cycle de Vie d\'une Plante',
            'description' => 'Comment une graine devient une grande plante ?',
            'lecons' => [
                'La graine : elle contient une petite plante qui attend',
                'La germination : la graine boit l\'eau et se réveille',
                'La pousse : la tige sort de terre vers la lumière',
                'La plante adulte : elle fait des fleurs',
                'La pollinisation : les abeilles transportent le pollen'
            ],
            'quiz' => [
                'question' => 'Que fait la graine quand elle boit de l\'eau ?',
                'options' => ['Elle meurt', 'Elle germe', 'Elle dort', 'Elle vole'],
                'reponse' => 1,
                'explication' => 'La graine germe et se réveille pour devenir une plante !'
            ]
        ],
        'phenomenes' => [
            'titre' => 'L\'Eau dans la Nature',
            'description' => 'Suis le voyage de l\'eau !',
            'lecons' => [
                'L\'évaporation : le soleil chauffe l\'eau, elle monte dans le ciel',
                'La condensation : l\'eau forme des nuages',
                'Les précipitations : la pluie, la neige ou la grêle tombent',
                'La rivière : l\'eau retourne à la mer',
                'Le cycle de l\'eau recommence toujours !'
            ],
            'quiz' => [
                'question' => 'Quand l\'eau monte dans le ciel à cause du soleil, on appelle ça ?',
                'options' => ['La pluie', 'La condensation', 'L\'évaporation', 'La glace'],
                'reponse' => 2,
                'explication' => 'L\'évaporation, c\'est quand l\'eau se transforme en vapeur et monte au ciel !'
            ]
        ]
    ],
    'ce2' => [
        'corps' => [
            'titre' => 'Les Organes du Corps Humain',
            'description' => 'Découvre les organes qui font fonctionner ton corps !',
            'lecons' => [
                'Le cerveau : il commande tout le corps',
                'Le cœur : il pompe le sang dans tout le corps',
                'Les poumons : ils respirent l\'air',
                'L\'estomac : il digère les aliments',
                'Les os : le squelette soutient le corps'
            ],
            'quiz' => [
                'question' => 'Quel organe commande tout ton corps ?',
                'options' => ['Le cœur', 'Le cerveau', 'L\'estomac', 'Les poumons'],
                'reponse' => 1,
                'explication' => 'Le cerveau est le chef d\'orchestre de ton corps !'
            ]
        ],
        'animaux' => [
            'titre' => 'La Classification des Animaux',
            'description' => 'Comment classe-t-on les animaux ?',
            'lecons' => [
                'Les mammifères : ils ont des poils et allaitent leurs petits (chat, chien, humain)',
                'Les oiseaux : ils ont des plumes et pondent des œufs (aigle, poule)',
                'Les poissons : ils vivent dans l\'eau et respirent avec des branchies',
                'Les reptiles : ils ont des écailles et sont à sang froid (serpent, lézard)',
                'Les insectes : ils ont 6 pattes et souvent des ailes (abeille, fourmi)'
            ],
            'quiz' => [
                'question' => 'Les mammifères allaitent leurs petits. Lequel est un mammifère ?',
                'options' => ['Le serpent', 'La poule', 'Le dauphin', 'La grenouille'],
                'reponse' => 2,
                'explication' => 'Le dauphin est un mammifère marin, il allaite ses petits !'
            ]
        ],
        'plantes' => [
            'titre' => 'La Photosynthèse',
            'description' => 'Comment les plantes fabriquent-elles leur nourriture ?',
            'lecons' => [
                'La chlorophylle : c\'est ce qui donne la couleur verte aux plantes',
                'La photosynthèse : les plantes fabriquent leur nourriture avec :',
                ' - De l\'eau (par les racines)',
                ' - Du soleil (par les feuilles)',
                ' - De l\'air (CO2)',
                'Les plantes rejettent de l\'oxygène, essentiel pour les humains !'
            ],
            'quiz' => [
                'question' => 'De quoi les plantes ont-elles besoin pour fabriquer leur nourriture ?',
                'options' => ['Seulement d\'eau', 'Seulement de soleil', 'D\'eau, de soleil et d\'air', 'De terre seulement'],
                'reponse' => 2,
                'explication' => 'Les plantes ont besoin d\'eau, de soleil et d\'air (CO2) pour faire la photosynthèse !'
            ]
        ],
        'phenomenes' => [
            'titre' => 'Les Catastrophes Naturelles',
            'description' => 'Comprendre les phénomènes naturels impressionnants',
            'lecons' => [
                'Les volcans : quand la lave sort de la terre',
                'Les tremblements de terre : la terre qui bouge',
                'Les tornades : des vents très forts en spirale',
                'Les inondations : quand l\'eau recouvre le sol',
                'Les sécheresses : quand il ne pleut pas pendant longtemps'
            ],
            'quiz' => [
                'question' => 'Qu\'est-ce qui sort d\'un volcan en éruption ?',
                'options' => ['De l\'eau', 'De la lave', 'De la glace', 'Du sable'],
                'reponse' => 1,
                'explication' => 'La lave, de la roche en fusion très chaude, sort du volcan !'
            ]
        ]
    ]
];

// Gestion des réponses
$message = '';
$success = false;
$explication = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['niveau']) && isset($_POST['theme']) && isset($_POST['reponse'])) {
        $niveau = $_POST['niveau'];
        $theme = $_POST['theme'];
        $reponse = (int)$_POST['reponse'];

        $correct = ($reponse === $contenus[$niveau][$theme]['quiz']['reponse']);

        if ($correct) {
            $_SESSION['scores_sciences'][$theme] += 10;
            $message = '🎉 Bravo ! C\'est la bonne réponse ! (+10 points)';
            $success = true;
            $explication = $contenus[$niveau][$theme]['quiz']['explication'];
        } else {
            $message = '😔 Ce n\'est pas la bonne réponse. Réessaie !';
            $explication = $contenus[$niveau][$theme]['quiz']['explication'];
        }
    }
}

$niveau_actuel = $_GET['niveau'] ?? 'cp';
$theme_actuel = $_GET['theme'] ?? 'corps';

// Vérification de validité
if (!isset($contenus[$niveau_actuel])) $niveau_actuel = 'cp';
if (!isset($contenus[$niveau_actuel][$theme_actuel])) $theme_actuel = 'corps';

$contenu_actuel = $contenus[$niveau_actuel][$theme_actuel];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpg" sizes="32x32" href="uploads/omar.jpg">
    <title>Sciences Découverte - CP CE1 CE2 | Corps, Animaux, Plantes, Nature</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Comic Sans MS', 'Chalkboard SE', 'Poppins', 'Arial', sans-serif;
            background: linear-gradient(135deg, #2193b0 0%, #6dd5ed 100%);
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            border-radius: 30px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            overflow: hidden;
        }

        header {
            background: linear-gradient(90deg, #f7971e 0%, #ffd200 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }

        header h1 {
            font-size: 2.5em;
            margin-bottom: 10px;
            text-shadow: 3px 3px 0 rgba(0,0,0,0.2);
        }

        header p {
            font-size: 1.2em;
            opacity: 0.95;
        }

        .score-board {
            display: flex;
            justify-content: center;
            gap: 20px;
            padding: 20px;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            flex-wrap: wrap;
        }

        .score-item {
            background: white;
            padding: 15px 25px;
            border-radius: 20px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            text-align: center;
            transition: transform 0.3s;
            cursor: pointer;
        }

        .score-item:hover {
            transform: translateY(-5px);
        }

        .score-item.corps { border-top: 4px solid #e74c3c; background: linear-gradient(135deg, #fff5f5, white); }
        .score-item.animaux { border-top: 4px solid #e67e22; background: linear-gradient(135deg, #fffaf0, white); }
        .score-item.plantes { border-top: 4px solid #27ae60; background: linear-gradient(135deg, #f0fff4, white); }
        .score-item.phenomenes { border-top: 4px solid #3498db; background: linear-gradient(135deg, #f0f9ff, white); }

        .score-value {
            font-size: 2em;
            font-weight: bold;
            color: #2c3e50;
        }

        .score-label {
            font-size: 0.85em;
            color: #7f8c8d;
            text-transform: uppercase;
            font-weight: bold;
        }

        nav {
            display: flex;
            justify-content: center;
            gap: 15px;
            padding: 20px;
            background: #ecf0f1;
            flex-wrap: wrap;
        }

        .nav-btn {
            padding: 12px 25px;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            font-size: 1em;
            font-weight: bold;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
            font-family: inherit;
        }

        .nav-btn.niveau {
            background: linear-gradient(135deg, #8e44ad, #9b59b6);
            color: white;
        }

        .nav-btn.niveau:hover, .nav-btn.niveau.active {
            background: linear-gradient(135deg, #6c3483, #7d3c98);
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        .nav-btn.theme {
            background: #34495e;
            color: white;
        }

        .nav-btn.theme:hover, .nav-btn.theme.active {
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        .nav-btn.corps.active { background: #e74c3c; }
        .nav-btn.animaux.active { background: #e67e22; }
        .nav-btn.plantes.active { background: #27ae60; }
        .nav-btn.phenomenes.active { background: #3498db; }

        main {
            padding: 40px;
        }

        .section-title {
            font-size: 2em;
            color: #2c3e50;
            margin-bottom: 15px;
            text-align: center;
        }

        .section-desc {
            text-align: center;
            color: #7f8c8d;
            margin-bottom: 30px;
            font-size: 1.1em;
        }

        .lecon-box {
            background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
            color: white;
            padding: 30px;
            border-radius: 25px;
            margin-bottom: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }

        .lecon-box h3 {
            font-size: 1.8em;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .lecon-list {
            list-style: none;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 15px;
        }

        .lecon-list li {
            padding: 12px 15px;
            background: rgba(255,255,255,0.2);
            border-radius: 15px;
            font-size: 1em;
            line-height: 1.5;
            backdrop-filter: blur(5px);
        }

        .lecon-list li::before {
            content: '🔬 ';
        }

        .quiz-box {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 30px;
            border-radius: 25px;
            color: white;
        }

        .quiz-box h3 {
            font-size: 1.8em;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .question {
            font-size: 1.5em;
            margin-bottom: 25px;
            font-weight: bold;
            background: rgba(255,255,255,0.2);
            padding: 20px;
            border-radius: 20px;
            text-align: center;
        }

        .options {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-bottom: 25px;
        }

        .option-label {
            display: flex;
            align-items: center;
            padding: 15px 25px;
            background: rgba(255,255,255,0.15);
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.3s;
            border: 2px solid transparent;
            font-size: 1.1em;
        }

        .option-label:hover {
            background: rgba(255,255,255,0.3);
            transform: translateX(10px);
        }

        .option-label input[type="radio"] {
            margin-right: 15px;
            width: 22px;
            height: 22px;
            cursor: pointer;
            accent-color: #f39c12;
        }

        .btn-submit {
            margin-top: 25px;
            padding: 15px 40px;
            background: linear-gradient(90deg, #f7971e, #ffd200);
            color: #2c3e50;
            border: none;
            border-radius: 50px;
            font-size: 1.2em;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
            width: 100%;
            font-family: inherit;
        }

        .btn-submit:hover {
            transform: scale(1.02);
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }

        .message {
            padding: 20px;
            border-radius: 20px;
            margin-bottom: 25px;
            text-align: center;
            font-size: 1.2em;
            font-weight: bold;
            animation: slideIn 0.5s ease;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .message.success {
            background: #d4edda;
            color: #155724;
            border: 2px solid #c3e6cb;
        }

        .message.error {
            background: #f8d7da;
            color: #721c24;
            border: 2px solid #f5c6cb;
        }

        .explication {
            margin-top: 20px;
            padding: 15px;
            background: rgba(255,255,255,0.2);
            border-radius: 15px;
            font-size: 1.1em;
            text-align: center;
            border-left: 4px solid #f39c12;
        }

        .fun-fact {
            margin-top: 30px;
            padding: 20px;
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            border-radius: 20px;
            text-align: center;
            color: white;
        }

        .fun-fact h4 {
            font-size: 1.3em;
            margin-bottom: 10px;
        }
              /* ===== FOOTER & SOCIAL ===== */
        footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 2px dashed #ccc;
            color: #666;
            font-size: 0.85rem;
        }
        
        .social-icons {
            display: flex;
            justify-content: center;
            gap: 16px;
            margin: 20px 0 16px;
            flex-wrap: wrap;
        }
        
        .social-icons a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 44px;
            height: 44px;
            background: #3c6e3f;
            color: white;
            border-radius: 50%;
            font-size: 1.4rem;
            transition: all 0.3s ease;
            text-decoration: none;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
        
        .social-icons a:hover {
            transform: translateY(-6px);
            background: #ffb347;
            color: #1e3a1e;
        }

        .emoji {
            font-size: 1.3em;
        }

        @media (max-width: 768px) {
            header h1 { font-size: 1.5em; }
            .section-title { font-size: 1.5em; }
            main { padding: 20px; }
            .score-board { gap: 10px; }
            .score-item { padding: 10px 15px; }
            .question { font-size: 1.2em; }
            .lecon-list { grid-template-columns: 1fr; }
        }
                      /* ===== NAVIGATION ===== */
        .navbar {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 12px 0;
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
            padding: 0 16px;
            flex-wrap: wrap;
            gap: 12px;
        }
        
        .logo {
            display: flex;
            align-items: center;
            color: white;
            font-size: 1.5rem;
            font-weight: bold;
            text-shadow: 2px 2px 0 #ff4757;
        }
        
        .logo i {
            margin-right: 10px;
            font-size: 1.8rem;
        }
        
        .nav-links {
            display: flex;
            list-style: none;
            flex-wrap: wrap;
            gap: 8px;
        }
        
        .nav-links li {
            margin: 0;
        }
        
        .nav-links a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            font-size: 0.95rem;
            padding: 8px 14px;
            border-radius: 30px;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 6px;
        }
        
        .nav-links a i {
            font-size: 1rem;
        }
        
        .nav-links a:hover {
            background-color: rgba(255, 255, 255, 0.2);
            transform: translateY(-3px);
        }
    </style>
</head>
<body>
     <!-- Navigation bar -->
<nav class="navbar">
    <div class="nav-container">
        <div class="logo">
               <a href="index.php" class="logo">
    <img src="uploads/omarW.png" alt="Site" style="width: 70px; height: 50px;">
    <a href="index.php" class="logo">
</a>
        </div>
        <ul class="nav-links">
            <li><a href="index.php" class="nav-link" data-page="home"><i class="fas fa-home"></i> <span class="nav-text">Accueil</span></a></li>
           
        </ul>
    </div>
</nav>
    
    <div class="container">
        <header>
            <h1><span class="emoji">🔬</span> Sciences Découverte <span class="emoji">🌍</span></h1>
            <p>Le corps humain | Les animaux | Les plantes | Les phénomènes naturels</p>
            <p style="font-size: 0.9em; margin-top: 10px;">CP - CE1 - CE2</p>
        </header>

        <div class="score-board">
            <div class="score-item corps" onclick="window.location.href='?theme=corps&niveau=<?php echo $niveau_actuel; ?>'">
                <div class="score-value"><?php echo $_SESSION['scores_sciences']['corps']; ?> <span class="emoji">🧠</span></div>
                <div class="score-label">Corps Humain</div>
            </div>
            <div class="score-item animaux" onclick="window.location.href='?theme=animaux&niveau=<?php echo $niveau_actuel; ?>'">
                <div class="score-value"><?php echo $_SESSION['scores_sciences']['animaux']; ?> <span class="emoji">🦁</span></div>
                <div class="score-label">Animaux</div>
            </div>
            <div class="score-item plantes" onclick="window.location.href='?theme=plantes&niveau=<?php echo $niveau_actuel; ?>'">
                <div class="score-value"><?php echo $_SESSION['scores_sciences']['plantes']; ?> <span class="emoji">🌱</span></div>
                <div class="score-label">Plantes</div>
            </div>
            <div class="score-item phenomenes" onclick="window.location.href='?theme=phenomenes&niveau=<?php echo $niveau_actuel; ?>'">
                <div class="score-value"><?php echo $_SESSION['scores_sciences']['phenomenes']; ?> <span class="emoji">🌋</span></div>
                <div class="score-label">Phénomènes</div>
            </div>
        </div>

        <nav>
            <span style="font-weight:bold;color:#7f8c8d;margin-right:10px;">📚 Niveau :</span>
            <a href="?niveau=cp&theme=<?php echo $theme_actuel; ?>" 
               class="nav-btn niveau <?php echo $niveau_actuel === 'cp' ? 'active' : ''; ?>">🎒 CP</a>
            <a href="?niveau=ce1&theme=<?php echo $theme_actuel; ?>" 
               class="nav-btn niveau <?php echo $niveau_actuel === 'ce1' ? 'active' : ''; ?>">📘 CE1</a>
            <a href="?niveau=ce2&theme=<?php echo $theme_actuel; ?>" 
               class="nav-btn niveau <?php echo $niveau_actuel === 'ce2' ? 'active' : ''; ?>">📙 CE2</a>
        </nav>

        <nav>
            <span style="font-weight:bold;color:#7f8c8d;margin-right:10px;">🔬 Thème :</span>
            <a href="?niveau=<?php echo $niveau_actuel; ?>&theme=corps" 
               class="nav-btn theme corps <?php echo $theme_actuel === 'corps' ? 'active' : ''; ?>">🧠 Corps Humain</a>
            <a href="?niveau=<?php echo $niveau_actuel; ?>&theme=animaux" 
               class="nav-btn theme animaux <?php echo $theme_actuel === 'animaux' ? 'active' : ''; ?>">🦁 Animaux</a>
            <a href="?niveau=<?php echo $niveau_actuel; ?>&theme=plantes" 
               class="nav-btn theme plantes <?php echo $theme_actuel === 'plantes' ? 'active' : ''; ?>">🌱 Plantes</a>
            <a href="?niveau=<?php echo $niveau_actuel; ?>&theme=phenomenes" 
               class="nav-btn theme phenomenes <?php echo $theme_actuel === 'phenomenes' ? 'active' : ''; ?>">🌍 Phénomènes</a>
        </nav>

        <main>
            <h2 class="section-title">
                <?php 
                $icons = ['corps' => '🧠', 'animaux' => '🦁', 'plantes' => '🌱', 'phenomenes' => '🌋'];
                echo $icons[$theme_actuel] . ' ' . $contenu_actuel['titre']; 
                ?>
            </h2>
            <p class="section-desc"><?php echo $contenu_actuel['description']; ?></p>

            <?php if ($message): ?>
                <div class="message <?php echo $success ? 'success' : 'error'; ?>">
                    <?php echo $message; ?>
                </div>
                <?php if ($explication): ?>
                    <div class="explication">
                        💡 <strong>Le savais-tu ?</strong> <?php echo $explication; ?>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

            <div class="lecon-box">
                <h3><span class="emoji">📖</span> Leçon à découvrir</h3>
                <ul class="lecon-list">
                    <?php foreach ($contenu_actuel['lecons'] as $lecon): ?>
                        <li><?php echo htmlspecialchars($lecon); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="quiz-box">
                <h3><span class="emoji">🎯</span> Quiz - Teste tes connaissances !</h3>

                <form method="POST" action="">
                    <input type="hidden" name="niveau" value="<?php echo $niveau_actuel; ?>">
                    <input type="hidden" name="theme" value="<?php echo $theme_actuel; ?>">

                    <div class="question">
                        🤔 <?php echo htmlspecialchars($contenu_actuel['quiz']['question']); ?>
                    </div>

                    <div class="options">
                        <?php foreach ($contenu_actuel['quiz']['options'] as $index => $option): ?>
                            <label class="option-label">
                                <input type="radio" name="reponse" value="<?php echo $index; ?>" required>
                                <span><?php echo chr(65 + $index) . '. ' . htmlspecialchars($option); ?></span>
                            </label>
                        <?php endforeach; ?>
                    </div>

                    <button type="submit" class="btn-submit">
                        <span class="emoji">✨</span> Vérifier ma réponse
                    </button>
                </form>
            </div>

            <div class="fun-fact">
                <h4><span class="emoji">🌟</span> Le savais-tu ? <span class="emoji">🌟</span></h4>
                <?php
                $funFacts = [
                    'Le cœur humain bat environ 100 000 fois par jour !',
                    'Un éléphant peut sentir l\'eau à 5 km de distance !',
                    'Les plantes communiquent entre elles par leurs racines !',
                    'Un arc-en-ciel est en fait un cercle complet, mais on ne voit que la moitié !',
                    'Les os sont plus solides que le béton !',
                    'Les abeilles dansent pour indiquer où se trouvent les fleurs !',
                    'Les arbres peuvent communiquer et s\'entraider !',
                    'La foudre peut chauffer l\'air jusqu\'à 30 000°C !'
                ];
                echo '<p>' . $funFacts[array_rand($funFacts)] . '</p>';
                ?>
            </div>
        </main>

        <footer>
            <p>🌟 La science est amusante - Continue à explorer et à apprendre ! 🌟</p>
            <p style="margin-top:10px;opacity:0.8;">🔬 Chaque bonne réponse te rapporte 10 points 🔬</p>
                                <div class="social-icons">
            <a href="https://simplsofts.com" target="_blank" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
            <a href="https://wa.me/212773370700" target="_blank" aria-label="Whatsapp"><i class="fab fa-whatsapp"></i></a>
            <a href="https://www.youtube.com/@OmarLetete" target="_blank" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
        </div>
        <p>© 2026 Omary.SimplSofts.com - Designed with ❤️</p>
        <p>Site adapté aux enfants de 8 ans - Niveau CE2</p>
        </footer>
    </div>
</body>
</html>