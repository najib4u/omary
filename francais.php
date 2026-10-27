<?php

// Page éducative : Apprendre le Français - CP, CE1, CE2
// Thème: Grammaire, Conjugaison, Orthographe, Compréhension

// Activation des erreurs pour le débogage (à supprimer en production)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

// Initialisation des scores si non existants
if (!isset($_SESSION['scores'])) {
    $_SESSION['scores'] = [
        'grammaire' => 0,
        'conjugaison' => 0,
        'orthographe' => 0,
        'comprehension' => 0
    ];
}

// Données pédagogiques par niveau
$contenus = [
    'cp' => [
        'grammaire' => [
            'titre' => 'Les Phrases',
            'lecons' => [
                'Une phrase commence par une majuscule et finit par un point.',
                'Les mots dans une phrase ont un ordre : Qui ? Fait quoi ?',
                'Exemple : Le chat dort.'
            ],
            'exercice' => [
                'question' => 'Quelle phrase est correcte ?',
                'options' => [
                    'le chien aboie.',
                    'Le chien aboie.',
                    'Le chien aboie'
                ],
                'reponse' => 1
            ]
        ],
        'conjugaison' => [
            'titre' => 'Le Verbe Être',
            'lecons' => [
                'Je suis',
                'Tu es',
                'Il/Elle est',
                'Nous sommes',
                'Vous êtes',
                'Ils/Elles sont'
            ],
            'exercice' => [
                'question' => 'Complète : Je ___ content.',
                'options' => ['sont', 'es', 'suis', 'sommes'],
                'reponse' => 2
            ]
        ],
        'orthographe' => [
            'titre' => 'Les Sons',
            'lecons' => [
                "Le son [o] s'écrit : o, au, eau",
                'Exemples : mot, sauter, beau',
                "Le son [ɛ̃] s'écrit : in, ain, ein"
            ],
            'exercice' => [
                'question' => "Comment s'écrit le mot [so] ?",
                'options' => ['saut', 'sot', 'ceau', 'saux'],
                'reponse' => 1
            ]
        ],
        'comprehension' => [
            'titre' => 'Lire et Comprendre',
            'texte' => "Le petit lapin est dans le jardin. Il mange une carotte. Il est content.",
            'questions' => [
                'Où est le lapin ?' => ['Dans la maison', 'Dans le jardin', 'Dans la forêt'],
                'Que mange le lapin ?' => ['Une pomme', 'Une carotte', 'Du pain'],
                'Le lapin est :' => ['Triste', 'Content', 'Fatigué']
            ],
            'reponses' => [1, 1, 1]
        ]
    ],
    'ce1' => [
        'grammaire' => [
            'titre' => 'Les Types de Phrases',
            'lecons' => [
                'Phrase déclarative : Elle raconte quelque chose. (Le soleil brille.)',
                'Phrase interrogative : Elle pose une question. (Quelle heure est-il ?)',
                'Phrase exclamative : Elle exprime une émotion. (Quel beau jour !)',
                'Phrase impérative : Elle donne un ordre. (Viens ici !)'
            ],
            'exercice' => [
                'question' => 'Quel type de phrase : "Mange ta soupe !" ?',
                'options' => ['Déclarative', 'Interrogative', 'Impérative', 'Exclamative'],
                'reponse' => 2
            ]
        ],
        'conjugaison' => [
            'titre' => 'Le Présent des Verbes en -ER',
            'lecons' => [
                'Je chant-e',
                'Tu chant-es',
                'Il/Elle chant-e',
                'Nous chant-ons',
                'Vous chant-ez',
                'Ils/Elles chant-ent'
            ],
            'exercice' => [
                'question' => 'Conjugue : Nous (danser)',
                'options' => ['dansons', 'dansez', 'dansent', 'danses'],
                'reponse' => 0
            ]
        ],
        'orthographe' => [
            'titre' => 'Le pluriel des noms',
            'lecons' => [
                'Généralement, on ajoute un -s : un chat -> des chats',
                'Les noms en -au, -eu, -ou prennent un -x : un château -> des châteaux',
                'Les noms en -al deviennent -aux : un cheval -> des chevaux'
            ],
            'exercice' => [
                'question' => 'Quel est le pluriel de "un journal" ?',
                'options' => ['des journaux', 'des journals', 'des journails', 'des journas'],
                'reponse' => 0
            ]
        ],
        'comprehension' => [
            'titre' => 'Comprendre un Récit',
            'texte' => "Marie part à l'école. Elle prend son cartable bleu. Sur le chemin, elle rencontre son ami Luc. Ils marchent ensemble. À l'école, la maîtresse les accueille avec le sourire.",
            'questions' => [
                'De quelle couleur est le cartable de Marie ?' => ['Rouge', 'Bleu', 'Vert', 'Jaune'],
                'Qui rencontre Marie ?' => ['Sa mère', 'Sa maîtresse', 'Son ami Luc', 'Son frère'],
                'Comment la maîtresse les accueille ?' => ['En colère', 'Avec le sourire', 'Tristement', 'En courant']
            ],
            'reponses' => [1, 2, 1]
        ]
    ],
    'ce2' => [
        'grammaire' => [
            'titre' => 'Le Groupe Nominal',
            'lecons' => [
                'Le groupe nominal (GN) = déterminant + nom',
                'Exemples : le chat, une maison, des enfants',
                'Le GN peut avoir des expansions : le chat noir, une grande maison',
                'Le GN peut être sujet ou complément'
            ],
            'exercice' => [
                'question' => 'Quel est le groupe nominal sujet : "La petite fille joue dans le jardin." ?',
                'options' => ['joue', 'dans le jardin', 'La petite fille', 'petite'],
                'reponse' => 2
            ]
        ],
        'conjugaison' => [
            'titre' => 'Le Passé Composé',
            'lecons' => [
                'Le passé composé = auxiliaire (avoir/être) + participe passé',
                "Avec l'auxiliaire avoir : J'ai mangé, Tu as fini",
                "Avec l'auxiliaire être : Je suis allé(e), Tu es venu(e)",
                'Accord du participe passé avec être'
            ],
            'exercice' => [
                'question' => 'Conjugue au passé composé : Elle (partir)',
                'options' => ['a parti', 'est parti', 'est partie', 'ont parti'],
                'reponse' => 2
            ]
        ],
        'orthographe' => [
            'titre' => 'Les Homophones',
            'lecons' => [
                'a / à : "a" est le verbe avoir, "à" est une préposition',
                'ou / où : "ou" = conjonction, "où" = lieu/temps',
                'son / sont : "son" = possessif, "sont" = verbe être',
                'ces / ses / c\'est / sait'
            ],
            'exercice' => [
                'question' => 'Complète : Il ___ (avoir) faim ___ (prép) la maison.',
                'options' => ['a / a', 'a / à', 'à / a', 'à / à'],
                'reponse' => 1
            ]
        ],
        'comprehension' => [
            'titre' => 'Analyse de Texte',
            'texte' => "Le vieux pêcheur sortit chaque matin avant l'aube. Son canot usé glissait silencieusement sur l'eau calme du lac. Les roseaux bruissaient doucement. Parfois, un héron solitaire posait son regard curieux sur le vieil homme patient. Les heures passaient, mais le pêcheur ne perdait jamais espoir. Pour lui, chaque jour apportait sa promesse de merveilles.",
            'questions' => [
                'À quelle heure le pêcheur sort-il ?' => ['À midi', 'Avant l\'aube', 'Au coucher du soleil', 'À minuit'],
                'Comment est le canot du pêcheur ?' => ['Neuf', 'Usé', 'Rouge', 'Grand'],
                'Quel oiseau est mentionné ?' => ['Un cygne', 'Un héron', 'Un canard', 'Une mouette'],
                'Quelle est l\'attitude du pêcheur ?' => ['Impatient', 'Colérique', 'Patient et optimiste', 'Triste']
            ],
            'reponses' => [1, 1, 1, 2]
        ]
    ]
];

// Gestion des réponses
$message = '';
$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['niveau']) && isset($_POST['matiere']) && isset($_POST['reponse'])) {
        $niveau = $_POST['niveau'];
        $matiere = $_POST['matiere'];
        $reponse = (int)$_POST['reponse'];

        if ($matiere === 'comprehension') {
            // Pour la compréhension, vérifier toutes les réponses
            $correct = true;
            $reponses_attendues = $contenus[$niveau][$matiere]['reponses'];
            foreach ($reponses_attendues as $index => $attendu) {
                if (!isset($_POST['reponse_' . $index]) || (int)$_POST['reponse_' . $index] !== $attendu) {
                    $correct = false;
                    break;
                }
            }
        } else {
            $correct = ($reponse === $contenus[$niveau][$matiere]['exercice']['reponse']);
        }

        if ($correct) {
            $_SESSION['scores'][$matiere] += 10;
            $message = '🎉 Bravo ! C\'est la bonne réponse ! (+10 points)';
            $success = true;
        } else {
            $message = '😔 Ce n\'est pas la bonne réponse. Réessaie !';
        }
    }
}

$niveau_actuel = $_GET['niveau'] ?? 'cp';
$matiere_actuelle = $_GET['matiere'] ?? 'grammaire';

// Vérification de validité
if (!isset($contenus[$niveau_actuel])) $niveau_actuel = 'cp';
if (!isset($contenus[$niveau_actuel][$matiere_actuelle])) $matiere_actuelle = 'grammaire';

$contenu_actuel = $contenus[$niveau_actuel][$matiere_actuelle];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpg" sizes="32x32" href="uploads/omar.jpg">
    <title>Apprendre le Français - CP CE1 CE2</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Comic Sans MS', 'Chalkboard SE', 'Arial', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            overflow: hidden;
        }

        header {
            background: linear-gradient(90deg, #f093fb 0%, #f5576c 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }

        header h1 {
            font-size: 2.5em;
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
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
            background: #f8f9fa;
            flex-wrap: wrap;
        }

        .score-item {
            background: white;
            padding: 15px 25px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            text-align: center;
            transition: transform 0.3s;
        }

        .score-item:hover {
            transform: translateY(-5px);
        }

        .score-item.grammaire { border-top: 4px solid #e74c3c; }
        .score-item.conjugaison { border-top: 4px solid #3498db; }
        .score-item.orthographe { border-top: 4px solid #2ecc71; }
        .score-item.comprehension { border-top: 4px solid #f39c12; }

        .score-value {
            font-size: 1.8em;
            font-weight: bold;
            color: #2c3e50;
        }

        .score-label {
            font-size: 0.9em;
            color: #7f8c8d;
            text-transform: uppercase;
        }

        nav {
            display: flex;
            justify-content: center;
            gap: 10px;
            padding: 20px;
            background: #ecf0f1;
            flex-wrap: wrap;
        }

        .nav-btn {
            padding: 12px 25px;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            font-size: 1em;
            font-weight: bold;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
        }

        .nav-btn.niveau {
            background: #9b59b6;
            color: white;
        }

        .nav-btn.niveau:hover, .nav-btn.niveau.active {
            background: #8e44ad;
            transform: scale(1.05);
        }

        .nav-btn.matiere {
            background: #34495e;
            color: white;
        }

        .nav-btn.matiere:hover, .nav-btn.matiere.active {
            background: #2c3e50;
            transform: scale(1.05);
        }

        .nav-btn.grammaire.active { background: #e74c3c; }
        .nav-btn.conjugaison.active { background: #3498db; }
        .nav-btn.orthographe.active { background: #2ecc71; }
        .nav-btn.comprehension.active { background: #f39c12; }

        main {
            padding: 40px;
        }

        .section-title {
            font-size: 2em;
            color: #2c3e50;
            margin-bottom: 30px;
            text-align: center;
            position: relative;
            padding-bottom: 15px;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 4px;
            background: linear-gradient(90deg, #f093fb 0%, #f5576c 100%);
            border-radius: 2px;
        }

        .lecon-box {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            border-radius: 20px;
            margin-bottom: 30px;
        }

        .lecon-box h3 {
            font-size: 1.5em;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .lecon-list {
            list-style: none;
        }

        .lecon-list li {
            padding: 12px 0;
            border-bottom: 1px solid rgba(255,255,255,0.2);
            font-size: 1.1em;
            line-height: 1.6;
        }

        .lecon-list li:last-child {
            border-bottom: none;
        }

        .lecon-list li::before {
            content: '📚 ';
        }

        .exercice-box {
            background: #f8f9fa;
            padding: 30px;
            border-radius: 20px;
            border: 3px solid #e0e0e0;
        }

        .exercice-box h3 {
            color: #2c3e50;
            font-size: 1.4em;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .question {
            font-size: 1.3em;
            color: #34495e;
            margin-bottom: 25px;
            font-weight: bold;
        }

        .texte-comprehension {
            background: white;
            padding: 25px;
            border-radius: 15px;
            border-left: 5px solid #f39c12;
            margin-bottom: 25px;
            font-size: 1.1em;
            line-height: 1.8;
            font-style: italic;
        }

        .options {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .option-label {
            display: flex;
            align-items: center;
            padding: 15px 20px;
            background: white;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s;
            border: 2px solid transparent;
            font-size: 1.1em;
        }

        .option-label:hover {
            background: #e3f2fd;
            border-color: #2196f3;
            transform: translateX(10px);
        }

        .option-label input[type="radio"] {
            margin-right: 15px;
            width: 20px;
            height: 20px;
            cursor: pointer;
        }

        .btn-submit {
            margin-top: 25px;
            padding: 15px 40px;
            background: linear-gradient(90deg, #11998e 0%, #38ef7d 100%);
            color: white;
            border: none;
            border-radius: 30px;
            font-size: 1.2em;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
            width: 100%;
        }

        .btn-submit:hover {
            transform: scale(1.02);
            box-shadow: 0 10px 30px rgba(17, 153, 142, 0.3);
        }

        .message {
            padding: 20px;
            border-radius: 15px;
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

        .question-block {
            margin-bottom: 25px;
            padding: 20px;
            background: white;
            border-radius: 12px;
        }

        .question-block h4 {
            color: #2c3e50;
            margin-bottom: 15px;
            font-size: 1.1em;
        }

        .emoji {
            font-size: 1.2em;
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

        @media (max-width: 768px) {
            header h1 { font-size: 1.8em; }
            .section-title { font-size: 1.5em; }
            main { padding: 20px; }
            .score-board { gap: 10px; }
            .score-item { padding: 10px 15px; }
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
            <h1><span class="emoji">📖</span> Apprendre le Français</h1>
            <p>Grammaire, Conjugaison, Orthographe et Compréhension - CP, CE1, CE2</p>
        </header>

        <div class="score-board">
            <div class="score-item grammaire">
                <div class="score-value"><?php echo $_SESSION['scores']['grammaire']; ?> <span class="emoji">📝</span></div>
                <div class="score-label">Grammaire</div>
            </div>
            <div class="score-item conjugaison">
                <div class="score-value"><?php echo $_SESSION['scores']['conjugaison']; ?> <span class="emoji">✍️</span></div>
                <div class="score-label">Conjugaison</div>
            </div>
            <div class="score-item orthographe">
                <div class="score-value"><?php echo $_SESSION['scores']['orthographe']; ?> <span class="emoji">🔤</span></div>
                <div class="score-label">Orthographe</div>
            </div>
            <div class="score-item comprehension">
                <div class="score-value"><?php echo $_SESSION['scores']['comprehension']; ?> <span class="emoji">📚</span></div>
                <div class="score-label">Compréhension</div>
            </div>
        </div>

        <nav>
            <span style="font-weight:bold;color:#7f8c8d;margin-right:10px;">Niveau :</span>
            <a href="?niveau=cp&matiere=<?php echo $matiere_actuelle; ?>" 
               class="nav-btn niveau <?php echo $niveau_actuel === 'cp' ? 'active' : ''; ?>">CP</a>
            <a href="?niveau=ce1&matiere=<?php echo $matiere_actuelle; ?>" 
               class="nav-btn niveau <?php echo $niveau_actuel === 'ce1' ? 'active' : ''; ?>">CE1</a>
            <a href="?niveau=ce2&matiere=<?php echo $matiere_actuelle; ?>" 
               class="nav-btn niveau <?php echo $niveau_actuel === 'ce2' ? 'active' : ''; ?>">CE2</a>
        </nav>

        <nav>
            <span style="font-weight:bold;color:#7f8c8d;margin-right:10px;">Matière :</span>
            <a href="?niveau=<?php echo $niveau_actuel; ?>&matiere=grammaire" 
               class="nav-btn matiere grammaire <?php echo $matiere_actuelle === 'grammaire' ? 'active' : ''; ?>">📝 Grammaire</a>
            <a href="?niveau=<?php echo $niveau_actuel; ?>&matiere=conjugaison" 
               class="nav-btn matiere conjugaison <?php echo $matiere_actuelle === 'conjugaison' ? 'active' : ''; ?>">✍️ Conjugaison</a>
            <a href="?niveau=<?php echo $niveau_actuel; ?>&matiere=orthographe" 
               class="nav-btn matiere orthographe <?php echo $matiere_actuelle === 'orthographe' ? 'active' : ''; ?>">🔤 Orthographe</a>
            <a href="?niveau=<?php echo $niveau_actuel; ?>&matiere=comprehension" 
               class="nav-btn matiere comprehension <?php echo $matiere_actuelle === 'comprehension' ? 'active' : ''; ?>">📚 Compréhension</a>
        </nav>

        <main>
            <h2 class="section-title">
                <?php 
                $emoji = ['grammaire' => '📝', 'conjugaison' => '✍️', 'orthographe' => '🔤', 'comprehension' => '📚'];
                echo $emoji[$matiere_actuelle] . ' ' . $contenu_actuel['titre']; 
                ?>
            </h2>

            <?php if ($message): ?>
                <div class="message <?php echo $success ? 'success' : 'error'; ?>">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>

            <div class="lecon-box">
                <h3><span class="emoji">🎯</span> Leçon</h3>
                <ul class="lecon-list">
                    <?php 
                    if ($matiere_actuelle === 'comprehension') {
                        echo '<li>Cette section te permet de lire un texte et de répondre à des questions pour vérifier ta compréhension.</li>';
                        echo '<li>Lis attentivement le texte avant de répondre.</li>';
                        echo '<li>Les réponses se trouvent toujours dans le texte !</li>';
                    } else {
                        foreach ($contenu_actuel['lecons'] as $lecon) {
                            echo '<li>' . htmlspecialchars($lecon) . '</li>';
                        }
                    }
                    ?>
                </ul>
            </div>

            <div class="exercice-box">
                <h3><span class="emoji">✏️</span> Exercice</h3>

                <form method="POST" action="">
                    <input type="hidden" name="niveau" value="<?php echo $niveau_actuel; ?>">
                    <input type="hidden" name="matiere" value="<?php echo $matiere_actuelle; ?>">

                    <?php if ($matiere_actuelle === 'comprehension'): ?>
                        <div class="texte-comprehension">
                            <?php echo nl2br(htmlspecialchars($contenu_actuel['texte'])); ?>
                        </div>

                        <?php 
                        $questions = $contenu_actuel['questions'];
                        $index = 0;
                        foreach ($questions as $question => $options): 
                        ?>
                            <div class="question-block">
                                <h4><?php echo ($index + 1) . '. ' . htmlspecialchars($question); ?></h4>
                                <div class="options">
                                    <?php foreach ($options as $opt_index => $option): ?>
                                        <label class="option-label">
                                            <input type="radio" name="reponse_<?php echo $index; ?>" value="<?php echo $opt_index; ?>" required>
                                            <?php echo htmlspecialchars($option); ?>
                                        </label>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php 
                            $index++;
                        endforeach; 
                        ?>
                        <input type="hidden" name="reponse" value="0">
                    <?php else: ?>
                        <div class="question">
                            <?php echo htmlspecialchars($contenu_actuel['exercice']['question']); ?>
                        </div>

                        <div class="options">
                            <?php foreach ($contenu_actuel['exercice']['options'] as $index => $option): ?>
                                <label class="option-label">
                                    <input type="radio" name="reponse" value="<?php echo $index; ?>" required>
                                    <?php echo htmlspecialchars($option); ?>
                                </label>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <button type="submit" class="btn-submit">
                        <span class="emoji">✨</span> Vérifier ma réponse
                    </button>
                </form>
            </div>
        </main>

        <footer>
            <p>🌟 Continue à apprendre et à t'améliorer chaque jour ! 🌟</p>
            <p style="margin-top:10px;opacity:0.8;">Page éducative pour les classes primaires CP, CE1, CE2</p>
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