<?php
// No PHP logic needed for this static page, but file extension .php allows for future backend features
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <link rel="icon" type="image/jpg" sizes="32x32" href="uploads/omar.jpg">
    <title>MathMagie - Apprends les maths en t'amusant !</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* ===== RESET & BASE ===== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Comic Sans MS', 'Chalkboard SE', 'Segoe UI', sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #6ecbf5 0%, #059ee3 100%);
            color: #333;
            min-height: 100vh;
            padding: 12px;
        }
        
        /* ===== CONTAINER ===== */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: rgba(255, 255, 255, 0.95);
            border-radius: 24px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            padding: 16px;
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
        
        /* ===== HEADER ===== */
        header {
            text-align: center;
            padding: 20px 16px;
            background: linear-gradient(to right, #ff9966, #ff5e62);
            color: white;
            border-radius: 20px;
            margin-bottom: 20px;
        }
        
        h1 {
            font-size: 2rem;
            margin-bottom: 8px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            word-break: break-word;
        }
        
        .subtitle {
            font-size: 1rem;
            opacity: 0.95;
        }
        
        /* ===== MAIN CONTENT (FLEX RESPONSIVE) ===== */
        .main-content {
            display: flex;
            flex-wrap: wrap;
            gap: 24px;
        }
        
        .operations {
            flex: 2;
            min-width: 260px;
            background-color: #f9f9f9;
            border-radius: 20px;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }
        
        .operation-selector {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-bottom: 25px;
            justify-content: center;
        }
        
        .operation-btn {
            padding: 10px 16px;
            font-size: 1rem;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: bold;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            flex: 1 0 auto;
            justify-content: center;
        }
        
        .operation-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .addition-btn { background-color: #4CAF50; color: white; }
        .soustraction-btn { background-color: #2196F3; color: white; }
        .multiplication-btn { background-color: #FF9800; color: white; }
        .division-btn { background-color: #9C27B0; color: white; }
        
        .active {
            transform: scale(1.03);
            box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.8), 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        
        .exercise-area {
            background-color: white;
            border-radius: 20px;
            padding: 20px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.05);
            margin-bottom: 20px;
        }
        
        .exercise {
            font-size: 2.5rem;
            text-align: center;
            margin: 15px 0;
            color: #333;
            word-break: break-word;
        }
        
        .answer-input {
            width: 100%;
            padding: 14px;
            font-size: 1.8rem;
            text-align: center;
            border: 3px solid #ddd;
            border-radius: 60px;
            margin: 15px 0;
            transition: border-color 0.3s;
        }
        
        .answer-input:focus {
            border-color: #6ecbf5;
            outline: none;
        }
        
        .buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
            gap: 12px;
            flex-wrap: wrap;
        }
        
        .action-btn {
            padding: 12px 16px;
            font-size: 1rem;
            border: none;
            border-radius: 60px;
            cursor: pointer;
            transition: all 0.3s;
            font-weight: bold;
            flex: 1;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            min-width: 100px;
        }
        
        .validate-btn { background-color: #4CAF50; color: white; }
        .next-btn { background-color: #2196F3; color: white; }
        .hint-btn { background-color: #FFC107; color: #333; }
        
        /* ===== ASTUCE SECTION ===== */
        .astuce {
            flex: 1.2;
            min-width: 260px;
            background-color: #e8f4fc;
            border-radius: 20px;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }
        
        .astuce h3 {
            color: #2196F3;
            margin-bottom: 15px;
            font-size: 1.3rem;
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
        }
        
        .astuce-content {
            font-size: 1rem;
            line-height: 1.5;
            padding: 12px;
            background-color: white;
            border-radius: 16px;
            min-height: 160px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        
        .visual-aid {
            margin-top: 12px;
            padding: 10px;
            background-color: #f9f9f9;
            border-radius: 12px;
            overflow-x: auto;
        }
        
        .visual-title {
            font-weight: bold;
            margin-bottom: 8px;
            color: #2196F3;
            font-size: 0.9rem;
        }
        
        .visual-container {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
            justify-content: center;
            align-items: center;
            min-height: 60px;
            padding: 8px;
        }
        
        /* ===== CARRÉS COLORÉS ===== */
        .square {
            width: 32px;
            height: 32px;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 0.8rem;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
            transition: transform 0.1s ease;
        }
        
        .square-addition { background-color: #4CAF50; }
        .square-soustraction { background-color: #2196F3; }
        .square-multiplication { background-color: #FF9800; }
        .square-division { background-color: #9C27B0; }
        .square-number { background-color: #666; }
        
        .operator {
            font-size: 1.4rem;
            font-weight: bold;
            margin: 0 6px;
        }
        
        .group-container {
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
            margin: 5px;
            padding: 6px;
            border: 2px dashed #ccc;
            border-radius: 12px;
            background: #fff9e0;
        }
        
        /* ===== PROGRESSION & STATS ===== */
        .progress {
            background-color: #f0f0f0;
            border-radius: 16px;
            padding: 15px;
            margin-top: 20px;
            text-align: center;
        }
        
        .progress-bar {
            height: 22px;
            background-color: #ddd;
            border-radius: 30px;
            margin-top: 10px;
            overflow: hidden;
        }
        
        .progress-fill {
            height: 100%;
            background: linear-gradient(to right, #4CAF50, #8BC34A);
            width: 0%;
            transition: width 0.4s ease;
        }
        
        .feedback {
            text-align: center;
            font-size: 1.2rem;
            font-weight: bold;
            padding: 12px;
            border-radius: 60px;
            margin-top: 15px;
            display: none;
        }
        
        .success {
            background-color: #d4edda;
            color: #155724;
            border: 2px solid #c3e6cb;
        }
        
        .error {
            background-color: #f8d7da;
            color: #721c24;
            border: 2px solid #f5c6cb;
        }
        
        .results {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
            font-size: 1rem;
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 20px;
            flex-wrap: wrap;
            gap: 12px;
        }
        
        .result-item {
            text-align: center;
            flex: 1;
            min-width: 80px;
        }
        
        .result-value {
            font-size: 1.8rem;
            font-weight: bold;
            color: #2196F3;
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
        
        /* ===== RESPONSIVITÉ AMÉLIORÉE ===== */
        @media (max-width: 768px) {
            body {
                padding: 8px;
            }
            .container {
                padding: 12px;
            }
            .main-content {
                flex-direction: column;
                gap: 18px;
            }
            .exercise {
                font-size: 2rem;
            }
            h1 {
                font-size: 1.6rem;
            }
            .square {
                width: 28px;
                height: 28px;
                font-size: 0.7rem;
            }
            .operator {
                font-size: 1.2rem;
                margin: 0 3px;
            }
            .action-btn {
                padding: 10px 12px;
                font-size: 0.9rem;
            }
            .operation-btn {
                font-size: 0.85rem;
                padding: 8px 12px;
            }
            .nav-text {
                font-size: 0.85rem;
            }
            .logo span {
                font-size: 1.2rem;
            }
        }
        
        @media (max-width: 480px) {
            .operation-selector {
                flex-direction: column;
            }
            .operation-btn {
                width: 100%;
            }
            .buttons {
                flex-direction: column;
            }
            .action-btn {
                width: 100%;
            }
            .answer-input {
                font-size: 1.4rem;
                padding: 12px;
            }
            .exercise {
                font-size: 1.8rem;
            }
            .result-value {
                font-size: 1.4rem;
            }
            .square {
                width: 24px;
                height: 24px;
                font-size: 0.65rem;
            }
        }
        
        /* petits ajustements pour les grands écrans */
        @media (min-width: 1400px) {
            .container {
                max-width: 1300px;
            }
            .square {
                width: 38px;
                height: 38px;
                font-size: 0.95rem;
            }
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
            <li><a href="jeux_maths.php" class="nav-link" data-page="maths"><i class="fas fa-calculator"></i> <span class="nav-text">Maths</span></a></li>
        </ul>
    </div>
</nav>

<div class="container">
    <header>
        <h1><i class="fas fa-calculator"></i> MathMagie</h1>
        <p class="subtitle">Apprends les additions, soustractions, multiplications et divisions en t'amusant !</p>
    </header>
    
    <div class="main-content">
        <div class="operations">
            <div class="operation-selector">
                <button class="operation-btn addition-btn active" data-operation="addition">
                    <i class="fas fa-plus"></i> Addition
                </button>
                <button class="operation-btn soustraction-btn" data-operation="soustraction">
                    <i class="fas fa-minus"></i> Soustraction
                </button>
                <button class="operation-btn multiplication-btn" data-operation="multiplication">
                    <i class="fas fa-times"></i> Multiplication
                </button>
                <button class="operation-btn division-btn" data-operation="division">
                    <i class="fas fa-divide"></i> Division
                </button>
            </div>
            
            <div class="exercise-area">
                <div class="exercise" id="exercise">5 + 3 = ?</div>
                <input type="number" class="answer-input" id="answer-input" placeholder="Entre ta réponse" inputmode="numeric">
                
                <div class="feedback" id="feedback"></div>
                
                <div class="buttons">
                    <button class="action-btn hint-btn" id="hint-btn">
                        <i class="fas fa-lightbulb"></i> Astuce
                    </button>
                    <button class="action-btn validate-btn" id="validate-btn">
                        <i class="fas fa-check"></i> Valider
                    </button>
                    <button class="action-btn next-btn" id="next-btn">
                        <i class="fas fa-forward"></i> Suivant
                    </button>
                </div>
            </div>
            
            <div class="progress">
                <p>Progression de l'apprentissage</p>
                <div class="progress-bar">
                    <div class="progress-fill" id="progress-fill"></div>
                </div>
            </div>
            
            <div class="results">
                <div class="result-item">
                    <p>Réponses justes</p>
                    <div class="result-value" id="correct-count">0</div>
                </div>
                <div class="result-item">
                    <p>Exercices faits</p>
                    <div class="result-value" id="total-count">0</div>
                </div>
                <div class="result-item">
                    <p>Score</p>
                    <div class="result-value" id="score">0%</div>
                </div>
            </div>
        </div>
        
        <div class="astuce">
            <h3><i class="fas fa-magic"></i> Astuce avec carrés colorés</h3>
            <div class="astuce-content" id="astuce-content">
                <div class="astuce-text" id="astuce-text">
                    <p><strong>Addition :</strong> Pour ajouter 9 à un nombre, tu peux ajouter 10 et enlever 1.</p>
                    <p>Exemple : 7 + 9 = 7 + 10 - 1 = 16</p>
                </div>
                <div class="visual-aid" id="visual-aid">
                    <div class="visual-title">Représentation avec des carrés :</div>
                    <div class="visual-container" id="visual-container">
                        <!-- Les carrés colorés seront ajoutés ici par JavaScript -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <footer>
        <p>Conçu par un professeur de CE2 pour des bases solides en mathématiques • © 2025 MathMagie</p>
        <p>Les carrés colorés aident à visualiser les nombres et les opérations !</p>
        <div class="social-icons">
            <a href="https://simplsofts.com" target="_blank" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
            <a href="https://wa.me/212773370700" target="_blank" aria-label="Whatsapp"><i class="fab fa-whatsapp"></i></a>
            <a href="https://www.youtube.com/@OmarLetete" target="_blank" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
        </div>
        <p>© 2026 Omary.SimplSofts.com - Designed with ❤️</p>
        <p>Site adapté aux enfants de 8 ans - Niveau CE2</p>
    </footer>
</div>

<script>
    // ========== VARIABLES GLOBALES ==========
    let currentOperation = 'addition';
    let currentExercise = { num1: 5, num2: 3, result: 8 };
    let correctAnswers = 0;
    let totalExercises = 0;
    let progress = 0;
    
    // Astuces par opération
    const astuces = {
        addition: [
            "Pour additionner deux nombres, tu peux décomposer : 8 + 7 = 8 + 2 + 5 = 10 + 5 = 15",
            "Quand tu additionnes avec 10, c'est facile : il suffit d'ajouter un 0 (ex: 10 + 5 = 15)",
            "Pour ajouter 9 à un nombre, tu peux ajouter 10 et enlever 1 (ex: 7 + 9 = 7 + 10 - 1 = 16)",
            "Les doubles sont faciles à retenir : 5+5=10, 6+6=12, 7+7=14, etc.",
            "Pour additionner de tête, ajoute d'abord les dizaines, puis les unités : 23 + 45 = (20+40) + (3+5) = 60 + 8 = 68"
        ],
        soustraction: [
            "Pour soustraire 9, tu peux soustraire 10 et ajouter 1 (ex: 15 - 9 = 15 - 10 + 1 = 6)",
            "Pour vérifier une soustraction, additionne le résultat avec le deuxième nombre : 15 - 7 = 8 car 8 + 7 = 15",
            "Quand tu soustrais avec 10, c'est facile : il suffit d'enlever un 0 (ex: 15 - 10 = 5)",
            "Pour soustraire de tête, enlève d'abord les dizaines, puis les unités : 45 - 23 = (40-20) + (5-3) = 20 + 2 = 22",
            "Les soustractions avec des nombres ronds sont plus simples : 17 - 10 = 7, 25 - 20 = 5"
        ],
        multiplication: [
            "Pour multiplier par 10, ajoute un zéro à la fin : 5 × 10 = 50",
            "Pour multiplier par 5, tu peux multiplier par 10 et diviser par 2 : 6 × 5 = (6 × 10) ÷ 2 = 60 ÷ 2 = 30",
            "Les doubles sont des multiplications par 2 : 7 × 2 = 7 + 7 = 14",
            "Pour multiplier par 4, double deux fois : 6 × 4 = (6 × 2) × 2 = 12 × 2 = 24",
            "La table de 9 a une astuce avec les doigts : baisse le doigt correspondant au multiplicateur pour voir le résultat"
        ],
        division: [
            "Diviser c'est partager en parts égales : 12 ÷ 3 = 4 car on peut faire 4 groupes de 3 avec 12 objets",
            "Pour diviser par 10, enlève un zéro à la fin : 50 ÷ 10 = 5",
            "La division est l'inverse de la multiplication : si 6 × 4 = 24, alors 24 ÷ 4 = 6 et 24 ÷ 6 = 4",
            "Diviser par 2 c'est prendre la moitié : 14 ÷ 2 = 7",
            "Pour diviser par 5, tu peux diviser par 10 et multiplier par 2 : 30 ÷ 5 = (30 ÷ 10) × 2 = 3 × 2 = 6"
        ]
    };
    
    // Éléments DOM
    const operationButtons = document.querySelectorAll('.operation-btn');
    const exerciseElement = document.getElementById('exercise');
    const answerInput = document.getElementById('answer-input');
    const feedbackElement = document.getElementById('feedback');
    const validateButton = document.getElementById('validate-btn');
    const nextButton = document.getElementById('next-btn');
    const hintButton = document.getElementById('hint-btn');
    const astuceText = document.getElementById('astuce-text');
    const visualContainer = document.getElementById('visual-container');
    const correctCountElement = document.getElementById('correct-count');
    const totalCountElement = document.getElementById('total-count');
    const scoreElement = document.getElementById('score');
    const progressFill = document.getElementById('progress-fill');
    
    // ========== FONCTIONS PRINCIPALES ==========
    function generateExercise() {
        let num1, num2, result;
        
        switch(currentOperation) {
            case 'addition':
                num1 = Math.floor(Math.random() * 15) + 1;
                num2 = Math.floor(Math.random() * 15) + 1;
                result = num1 + num2;
                exerciseElement.textContent = `${num1} + ${num2} = ?`;
                break;
            case 'soustraction':
                num2 = Math.floor(Math.random() * 15) + 1;
                result = Math.floor(Math.random() * 15) + 1;
                num1 = num2 + result;
                exerciseElement.textContent = `${num1} - ${num2} = ?`;
                break;
            case 'multiplication':
                num1 = Math.floor(Math.random() * 10) + 1;
                num2 = Math.floor(Math.random() * 10) + 1;
                result = num1 * num2;
                exerciseElement.textContent = `${num1} × ${num2} = ?`;
                break;
            case 'division':
                num2 = Math.floor(Math.random() * 9) + 1;
                result = Math.floor(Math.random() * 9) + 1;
                num1 = num2 * result;
                exerciseElement.textContent = `${num1} ÷ ${num2} = ?`;
                break;
        }
        
        currentExercise = { num1, num2, result };
        updateProgressBar();
    }
    
    function validateAnswer() {
        const userAnswer = parseInt(answerInput.value);
        
        if (isNaN(userAnswer)) {
            feedbackElement.textContent = "Entre un nombre s'il te plaît !";
            feedbackElement.className = "feedback error";
            feedbackElement.style.display = 'block';
            return;
        }
        
        totalExercises++;
        
        if (userAnswer === currentExercise.result) {
            feedbackElement.textContent = "Bravo ! Excellente réponse ! 🎉";
            feedbackElement.className = "feedback success";
            correctAnswers++;
            progress = Math.min(progress + 5, 100);
        } else {
            feedbackElement.textContent = `Presque ! La bonne réponse était ${currentExercise.result}. Essaye encore !`;
            feedbackElement.className = "feedback error";
            progress = Math.min(progress + 1, 100);
        }
        
        feedbackElement.style.display = 'block';
        updateResults();
        updateProgressBar();
        nextButton.focus();
    }
    
    function updateAstuce() {
        const astucesList = astuces[currentOperation];
        const randomIndex = Math.floor(Math.random() * astucesList.length);
        astuceText.innerHTML = `<p><strong>${currentOperation.charAt(0).toUpperCase() + currentOperation.slice(1)} :</strong> ${astucesList[randomIndex]}</p>`;
    }
    
    function updateVisualAid() {
        visualContainer.innerHTML = '';
        const { num1, num2, result } = currentExercise;
        
        switch(currentOperation) {
            case 'addition': createAdditionVisual(num1, num2, result); break;
            case 'soustraction': createSoustractionVisual(num1, num2, result); break;
            case 'multiplication': createMultiplicationVisual(num1, num2, result); break;
            case 'division': createDivisionVisual(num1, num2, result); break;
        }
    }
    
    // Représentations visuelles (adaptées responsive)
    function createAdditionVisual(num1, num2, result) {
        for (let i = 0; i < num1; i++) {
            const square = document.createElement('div');
            square.className = 'square square-addition';
            square.textContent = i + 1;
            visualContainer.appendChild(square);
        }
        const plusSign = document.createElement('div');
        plusSign.className = 'operator'; plusSign.textContent = '+';
        visualContainer.appendChild(plusSign);
        
        for (let i = 0; i < num2; i++) {
            const square = document.createElement('div');
            square.className = 'square square-addition';
            square.textContent = i + 1;
            visualContainer.appendChild(square);
        }
        const equalSign = document.createElement('div');
        equalSign.className = 'operator'; equalSign.textContent = '=';
        visualContainer.appendChild(equalSign);
        
        for (let i = 0; i < result; i++) {
            const square = document.createElement('div');
            square.className = 'square square-addition';
            square.textContent = i + 1;
            visualContainer.appendChild(square);
        }
    }
    
    function createSoustractionVisual(num1, num2, result) {
        for (let i = 0; i < num1; i++) {
            const square = document.createElement('div');
            square.className = 'square square-soustraction';
            square.textContent = i + 1;
            visualContainer.appendChild(square);
        }
        const minusSign = document.createElement('div');
        minusSign.className = 'operator'; minusSign.textContent = '-';
        visualContainer.appendChild(minusSign);
        
        for (let i = 0; i < num2; i++) {
            const square = document.createElement('div');
            square.className = 'square square-number';
            square.textContent = i + 1;
            square.style.opacity = '0.6';
            visualContainer.appendChild(square);
        }
        const equalSign = document.createElement('div');
        equalSign.className = 'operator'; equalSign.textContent = '=';
        visualContainer.appendChild(equalSign);
        
        for (let i = 0; i < result; i++) {
            const square = document.createElement('div');
            square.className = 'square square-soustraction';
            square.textContent = i + 1;
            visualContainer.appendChild(square);
        }
    }
    
    function createMultiplicationVisual(num1, num2, result) {
        const explanation = document.createElement('div');
        explanation.style.width = '100%';
        explanation.style.textAlign = 'center';
        explanation.style.marginBottom = '10px';
        explanation.style.fontSize = '0.85rem';
        explanation.textContent = `${num1} groupes de ${num2} carrés`;
        visualContainer.appendChild(explanation);
        
        for (let group = 0; group < num1; group++) {
            const groupContainer = document.createElement('div');
            groupContainer.className = 'group-container';
            for (let i = 0; i < num2; i++) {
                const square = document.createElement('div');
                square.className = 'square square-multiplication';
                square.textContent = i + 1;
                groupContainer.appendChild(square);
            }
            visualContainer.appendChild(groupContainer);
            if (group < num1 - 1) {
                const plusSign = document.createElement('div');
                plusSign.className = 'operator';
                plusSign.textContent = '+';
                visualContainer.appendChild(plusSign);
            }
        }
        const equalSign = document.createElement('div');
        equalSign.className = 'operator'; equalSign.textContent = '=';
        visualContainer.appendChild(equalSign);
        
        for (let i = 0; i < result; i++) {
            const square = document.createElement('div');
            square.className = 'square square-multiplication';
            square.textContent = i + 1;
            visualContainer.appendChild(square);
        }
    }
    
    function createDivisionVisual(num1, num2, result) {
        const explanation = document.createElement('div');
        explanation.style.width = '100%';
        explanation.style.textAlign = 'center';
        explanation.style.marginBottom = '10px';
        explanation.style.fontSize = '0.85rem';
        explanation.textContent = `Partager ${num1} carrés en ${num2} groupes égaux`;
        visualContainer.appendChild(explanation);
        
        for (let i = 0; i < num1; i++) {
            const square = document.createElement('div');
            square.className = 'square square-division';
            square.textContent = i + 1;
            visualContainer.appendChild(square);
        }
        const divideSign = document.createElement('div');
        divideSign.className = 'operator'; divideSign.textContent = '÷';
        visualContainer.appendChild(divideSign);
        
        for (let i = 0; i < num2; i++) {
            const square = document.createElement('div');
            square.className = 'square square-number';
            square.textContent = i + 1;
            square.style.backgroundColor = '#9C27B0';
            visualContainer.appendChild(square);
        }
        const equalSign = document.createElement('div');
        equalSign.className = 'operator'; equalSign.textContent = '=';
        visualContainer.appendChild(equalSign);
        
        for (let i = 0; i < result; i++) {
            const square = document.createElement('div');
            square.className = 'square square-division';
            square.textContent = i + 1;
            visualContainer.appendChild(square);
        }
        
        const groupExplanation = document.createElement('div');
        groupExplanation.style.width = '100%';
        groupExplanation.style.textAlign = 'center';
        groupExplanation.style.marginTop = '10px';
        groupExplanation.style.fontSize = '0.75rem';
        groupExplanation.textContent = `Chaque groupe a ${result} carrés`;
        visualContainer.appendChild(groupExplanation);
    }
    
    function updateResults() {
        correctCountElement.textContent = correctAnswers;
        totalCountElement.textContent = totalExercises;
        const score = totalExercises > 0 ? Math.round((correctAnswers / totalExercises) * 100) : 0;
        scoreElement.textContent = `${score}%`;
    }
    
    function updateProgressBar() {
        progressFill.style.width = `${progress}%`;
    }
    
    function refreshExerciseAndHints() {
        generateExercise();
        updateAstuce();
        updateVisualAid();
        feedbackElement.style.display = 'none';
        answerInput.value = '';
        answerInput.focus();
    }
    
    // ========== ÉVÉNEMENTS ==========
    document.addEventListener('DOMContentLoaded', () => {
        generateExercise();
        updateAstuce();
        updateVisualAid();
        updateResults();
        answerInput.focus();
    });
    
    operationButtons.forEach(button => {
        button.addEventListener('click', function() {
            operationButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            currentOperation = this.getAttribute('data-operation');
            refreshExerciseAndHints();
        });
    });
    
    validateButton.addEventListener('click', validateAnswer);
    nextButton.addEventListener('click', refreshExerciseAndHints);
    hintButton.addEventListener('click', () => {
        updateAstuce();
        updateVisualAid();
    });
    answerInput.addEventListener('keyup', (e) => { if (e.key === 'Enter') validateAnswer(); });
</script>
</body>
</html>