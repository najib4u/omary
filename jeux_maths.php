<?php
// No backend logic needed for this static page, but .php extension allows future expansion
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
     <link rel="icon" type="image/jpg" sizes="32x32" href="uploads/omar.jpg">
    <title>Course aux Nombres - MathMagie</title>
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
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            color: #333;
            min-height: 100vh;
            padding: 12px;
        }
        
        /* ===== CONTAINER ===== */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: rgba(255, 255, 255, 0.95);
            border-radius: 28px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.25);
            overflow: hidden;
            padding: 20px;
        }
        
        /* ===== NAVIGATION ===== */
        .navbar {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 12px 0;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
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
            flex-wrap: wrap;
            gap: 12px;
        }
        
        .logo {
            display: flex;
            align-items: center;
            color: white;
            font-size: 1.6rem;
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
            font-size: 1rem;
            padding: 8px 18px;
            border-radius: 40px;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .nav-links a:hover {
            background-color: rgba(255, 255, 255, 0.25);
            transform: translateY(-3px);
        }
        
        /* ===== HEADER COURSE ===== */
        .race-header {
            text-align: center;
            padding: 20px;
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            border-radius: 30px;
            margin-bottom: 25px;
            color: white;
        }
        
        .race-header h1 {
            font-size: 2.2rem;
            margin-bottom: 8px;
        }
        
        .race-header p {
            font-size: 1.1rem;
            opacity: 0.95;
        }
        
        /* ===== PISTE DE COURSE ===== */
        .race-track {
            background: #2d5a2c;
            border-radius: 40px;
            padding: 20px;
            margin-bottom: 30px;
            box-shadow: inset 0 0 10px rgba(0,0,0,0.3), 0 8px 20px rgba(0,0,0,0.2);
        }
        
        .track-lane {
            background: #4a7c3f;
            border-radius: 50px;
            margin-bottom: 15px;
            padding: 8px 12px;
            display: flex;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
            box-shadow: inset 0 1px 4px rgba(0,0,0,0.2), 0 2px 5px rgba(255,255,255,0.2);
        }
        
        .racer-icon {
            font-size: 2rem;
            width: 55px;
            text-align: center;
            background: rgba(0,0,0,0.2);
            border-radius: 50px;
            padding: 5px;
        }
        
        .progress-container {
            flex: 1;
            background-color: #e0cba0;
            border-radius: 40px;
            height: 38px;
            overflow: hidden;
            box-shadow: inset 0 2px 5px rgba(0,0,0,0.2);
        }
        
        .progress-fill {
            height: 100%;
            width: 0%;
            background: linear-gradient(90deg, #ffd966, #ffb347);
            border-radius: 40px;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            padding-right: 12px;
            color: #2c3e2b;
            font-weight: bold;
            transition: width 0.25s ease-out;
        }
        
        .racer-name {
            font-weight: bold;
            min-width: 90px;
            color: white;
            text-shadow: 1px 1px 0 #1f3a1d;
        }
        
        /* zone de jeu */
        .game-zone {
            background: #fef7e0;
            border-radius: 40px;
            padding: 25px;
            margin: 20px 0;
            text-align: center;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        
        .question-card {
            background: white;
            border-radius: 50px;
            padding: 25px;
            margin-bottom: 20px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .big-equation {
            font-size: 3rem;
            font-weight: bold;
            text-align: center;
            color: #2c3e50;
            letter-spacing: 8px;
            word-break: break-word;
        }
        
        .answer-area {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 15px;
            margin: 20px 0;
        }
        
        .answer-input {
            font-size: 2rem;
            width: 200px;
            text-align: center;
            padding: 12px;
            border: 4px solid #ffb347;
            border-radius: 60px;
            font-weight: bold;
        }
        
        .action-btn {
            padding: 12px 28px;
            font-size: 1.2rem;
            border: none;
            border-radius: 60px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 12px;
        }
        
        .validate-btn {
            background-color: #4CAF50;
            color: white;
            box-shadow: 0 4px 0 #2e6b2f;
        }
        
        .validate-btn:active {
            transform: translateY(2px);
            box-shadow: 0 2px 0 #2e6b2f;
        }
        
        .next-btn {
            background-color: #2196F3;
            color: white;
            box-shadow: 0 4px 0 #0b5e9e;
        }
        
        .reset-btn {
            background-color: #ff9800;
            color: white;
            box-shadow: 0 4px 0 #c66900;
        }
        
        .feedback {
            font-size: 1.3rem;
            font-weight: bold;
            padding: 12px;
            border-radius: 40px;
            margin: 15px auto;
            display: inline-block;
            width: auto;
            background: #e9ecef;
        }
        
        .scoreboard {
            display: flex;
            justify-content: space-around;
            background: #ffefcf;
            border-radius: 50px;
            padding: 15px;
            margin-top: 20px;
            flex-wrap: wrap;
            gap: 15px;
        }
        
        .score-card {
            text-align: center;
            background: white;
            border-radius: 35px;
            padding: 10px 20px;
            min-width: 120px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.05);
        }
        
        .score-number {
            font-size: 2rem;
            font-weight: bold;
            color: #f5576c;
        }
        
        /* victoire */
        .victory-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.8);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
            visibility: hidden;
            backdrop-filter: blur(3px);
        }
        
        .victory-card {
            background: gold;
            border-radius: 60px;
            padding: 30px;
            text-align: center;
            max-width: 400px;
            animation: bounce 0.5s;
        }
        
        @keyframes bounce {
            0% { transform: scale(0.5); opacity: 0; }
            80% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }
        
        .victory-card h2 {
            font-size: 2.5rem;
            margin: 15px 0;
        }
        
        .restart-victory {
            background: #2e7d32;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 40px;
            font-size: 1.2rem;
            margin-top: 20px;
            cursor: pointer;
        }
        
        /* ===== FOOTER ===== */
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
        }
        
        .social-icons a:hover {
            transform: translateY(-6px);
            background: #ffb347;
        }
        
        @media (max-width: 680px) {
            .big-equation { font-size: 2rem; letter-spacing: 4px; }
            .answer-input { font-size: 1.5rem; width: 150px; }
            .racer-icon { font-size: 1.5rem; width: 45px; }
            .racer-name { font-size: 0.8rem; min-width: 70px; }
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
            <li><a href="maths.php" class="nav-link" data-page="maths"><i class="fas fa-calculator"></i> <span class="nav-text">Maths</span></a></li>
        </ul
    </div>
</nav>

<div class="container">
    <div class="race-header">
        <h1><i class="fas fa-flag-checkered"></i> Course aux Nombres</h1>
        <p>Résous des calculs le plus vite possible pour faire avancer ton personnage et gagner la course !</p>
    </div>
    
    <!-- Piste de course -->
    <div class="race-track">
        <div class="track-lane">
            <div class="racer-icon"><i class="fas fa-child"></i></div>
            <div class="racer-name">⭐ Toi</div>
            <div class="progress-container">
                <div class="progress-fill" id="player-progress">0%</div>
            </div>
        </div>
        <div class="track-lane">
            <div class="racer-icon"><i class="fas fa-robot"></i></div>
            <div class="racer-name">🤖 Robot Mathix</div>
            <div class="progress-container">
                <div class="progress-fill" id="bot-progress">0%</div>
            </div>
        </div>
    </div>
    
    <!-- Zone de jeu -->
    <div class="game-zone">
        <div class="question-card">
            <div class="big-equation" id="equation">5 + 3 = ?</div>
            <div class="answer-area">
                <input type="number" id="answerInput" class="answer-input" placeholder="?" inputmode="numeric">
                <button class="action-btn validate-btn" id="validateBtn"><i class="fas fa-check-circle"></i> Valider</button>
                <button class="action-btn reset-btn" id="resetBtn"><i class="fas fa-undo-alt"></i> Rejouer</button>
            </div>
            <div id="feedbackMsg" class="feedback">⚡ Réponds vite pour avancer !</div>
        </div>
        
        <div class="scoreboard">
            <div class="score-card">🏆 Victoires <span id="victoryCount" class="score-number">0</span></div>
            <div class="score-card">✅ Bonnes réponses <span id="correctStreak" class="score-number">0</span></div>
            <div class="score-card">⚡ Réponses totales <span id="totalAnswers" class="score-number">0</span></div>
        </div>
    </div>
    
    <footer>
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

<!-- Overlay victoire -->
<div id="victoryOverlay" class="victory-overlay">
    <div class="victory-card">
        <i class="fas fa-trophy" style="font-size: 4rem; color: #ffd700;"></i>
        <h2>🏁 GAGNÉ ! 🏁</h2>
        <p>Tu as battu Robot Mathix !</p>
        <button id="victoryRestartBtn" class="restart-victory">Nouvelle course 🚀</button>
    </div>
</div>

<script>
    // ========== JEU DE COURSE ==========
    // Variables
    let playerProgress = 0;      // 0 à 100%
    let botProgress = 0;
    let currentQuestion = { text: "5 + 3", answer: 8 };
    let correctStreak = 0;
    let totalAnswered = 0;
    let victories = 0;
    let raceActive = true;        // si false, la course est terminée (victoire ou défaite)
    let botInterval = null;
    let waitingForNext = false;    // bloquer les réponses après bonne réponse en attendant la nouvelle question
    
    // Éléments DOM
    const equationEl = document.getElementById('equation');
    const answerInput = document.getElementById('answerInput');
    const validateBtn = document.getElementById('validateBtn');
    const resetBtn = document.getElementById('resetBtn');
    const playerProgressFill = document.getElementById('player-progress');
    const botProgressFill = document.getElementById('bot-progress');
    const feedbackMsg = document.getElementById('feedbackMsg');
    const victoryOverlay = document.getElementById('victoryOverlay');
    const victoryRestartBtn = document.getElementById('victoryRestartBtn');
    const victoryCountSpan = document.getElementById('victoryCount');
    const correctStreakSpan = document.getElementById('correctStreak');
    const totalAnswersSpan = document.getElementById('totalAnswers');
    
    // Générer une question aléatoire (adaptée 8-12 ans)
    function generateRandomQuestion() {
        const operation = Math.floor(Math.random() * 4); // 0:+,1:-,2:*,3:/
        let num1, num2, answer, text;
        
        switch(operation) {
            case 0: // addition
                num1 = Math.floor(Math.random() * 40) + 1;
                num2 = Math.floor(Math.random() * 40) + 1;
                answer = num1 + num2;
                text = `${num1} + ${num2}`;
                break;
            case 1: // soustraction (positif)
                num1 = Math.floor(Math.random() * 50) + 10;
                num2 = Math.floor(Math.random() * (num1 - 1)) + 1;
                answer = num1 - num2;
                text = `${num1} - ${num2}`;
                break;
            case 2: // multiplication (tables jusqu'à 12)
                num1 = Math.floor(Math.random() * 12) + 1;
                num2 = Math.floor(Math.random() * 12) + 1;
                answer = num1 * num2;
                text = `${num1} × ${num2}`;
                break;
            case 3: // division exacte
                num2 = Math.floor(Math.random() * 12) + 1;
                answer = Math.floor(Math.random() * 12) + 1;
                num1 = num2 * answer;
                text = `${num1} ÷ ${num2}`;
                break;
        }
        // Limiter les résultats trop grands pour enfants (max ~ 144)
        if(answer > 144) return generateRandomQuestion();
        return { text: text, answer: answer };
    }
    
    // Mettre à jour l'affichage des progressions
    function updateProgressBars() {
        let playerPercent = Math.min(100, Math.max(0, playerProgress));
        let botPercent = Math.min(100, Math.max(0, botProgress));
        playerProgressFill.style.width = `${playerPercent}%`;
        playerProgressFill.textContent = `${Math.floor(playerPercent)}%`;
        botProgressFill.style.width = `${botPercent}%`;
        botProgressFill.textContent = `${Math.floor(botPercent)}%`;
        
        // Vérifier fin de course
        if (raceActive) {
            if (playerPercent >= 100) {
                raceActive = false;
                if (botInterval) clearInterval(botInterval);
                victories++;
                victoryCountSpan.textContent = victories;
                victoryOverlay.style.visibility = "visible";
                feedbackMsg.innerHTML = "🎉🎉 VICTOIRE ! Tu as gagné la course ! 🎉🎉";
            } else if (botPercent >= 100 && raceActive) {
                raceActive = false;
                if (botInterval) clearInterval(botInterval);
                feedbackMsg.innerHTML = "😢 Robot Mathix a gagné... Réessaie encore ! Clique sur 'Rejouer' pour une revanche !";
                disableGame(true);
            }
        }
    }
    
    // Désactiver/réactiver les inputs
    function disableGame(disabled) {
        if(disabled) {
            validateBtn.disabled = true;
            answerInput.disabled = true;
        } else {
            validateBtn.disabled = false;
            answerInput.disabled = false;
            answerInput.focus();
        }
    }
    
    // Avancer le bot aléatoirement toutes les 2.5 secondes (si course active)
    function startBotAdvancement() {
        if (botInterval) clearInterval(botInterval);
        botInterval = setInterval(() => {
            if (!raceActive) return;
            if (waitingForNext) return; // attend que joueur passe à la question suivante
            // Avancement aléatoire du bot entre 5 et 18%
            let increment = Math.floor(Math.random() * 14) + 5;
            botProgress = Math.min(100, botProgress + increment);
            updateProgressBars();
        }, 4000);
    }
    
    // Nouvelle question (sans avancer le bot automatiquement)
    function loadNewQuestion() {
        if (!raceActive) return;
        const newQ = generateRandomQuestion();
        currentQuestion = newQ;
        equationEl.textContent = `${newQ.text} = ?`;
        answerInput.value = '';
        waitingForNext = false;
        disableGame(false);
        feedbackMsg.innerHTML = "⚡ Tape ta réponse et valide vite ! Le robot avance aussi !";
        answerInput.focus();
    }
    
    // Vérifier la réponse du joueur
    function checkAnswer() {
        if (!raceActive) {
            feedbackMsg.innerHTML = "🏁 La course est terminée, clique sur Rejouer pour une nouvelle partie !";
            return;
        }
        if (waitingForNext) {
            feedbackMsg.innerHTML = "Appuie d'abord sur 'Nouvelle question' (ou la partie va reprendre)";
            return;
        }
        
        const userAnswer = parseInt(answerInput.value);
        if (isNaN(userAnswer)) {
            feedbackMsg.innerHTML = "📝 Entre un nombre dans la case magique !";
            return;
        }
        
        totalAnswered++;
        totalAnswersSpan.textContent = totalAnswered;
        
        if (userAnswer === currentQuestion.answer) {
            // Bonne réponse : le joueur avance
            let increment = 0;
            if (playerProgress < 70) increment = 15;
            else if (playerProgress < 90) increment = 12;
            else increment = 8;
            playerProgress = Math.min(100, playerProgress + increment);
            correctStreak++;
            correctStreakSpan.textContent = correctStreak;
            feedbackMsg.innerHTML = `✅ Bravo ! +${increment}% sur la piste ! 🏃‍♂️💨`;
            updateProgressBars();
            
            // Passer à la question suivante après un court délai
            waitingForNext = true;
            disableGame(true);
            setTimeout(() => {
                if (raceActive) {
                    loadNewQuestion();
                } else if (playerProgress >= 100) {
                    // déjà gagné
                } else {
                    disableGame(true);
                }
            }, 800);
        } else {
            // Mauvaise réponse : le joueur stagne, bot avance un peu
            let botBoost = Math.floor(Math.random() * 12) + 4;
            botProgress = Math.min(100, botProgress + botBoost);
            correctStreak = 0;
            correctStreakSpan.textContent = correctStreak;
            feedbackMsg.innerHTML = `❌ Oops ! La bonne réponse était ${currentQuestion.answer}. Le robot avance de ${botBoost}% !`;
            updateProgressBars();
            answerInput.value = '';
            answerInput.focus();
            // on reste sur la même question, ne pas avancer
        }
    }
    
    // Réinitialiser complètement la partie
    function resetRace() {
        // stopper tout
        if (botInterval) clearInterval(botInterval);
        raceActive = true;
        playerProgress = 0;
        botProgress = 0;
        correctStreak = 0;
        // On garde les victoires cumulées (on ne remet pas victories à 0)
        totalAnswered = 0;
        totalAnswersSpan.textContent = totalAnswered;
        correctStreakSpan.textContent = correctStreak;
        waitingForNext = false;
        
        updateProgressBars();
        
        // Nouvelle question aléatoire
        const newQ = generateRandomQuestion();
        currentQuestion = newQ;
        equationEl.textContent = `${newQ.text} = ?`;
        answerInput.value = '';
        feedbackMsg.innerHTML = "🏁 Nouvelle course ! Réponds vite pour battre Robot Mathix !";
        disableGame(false);
        victoryOverlay.style.visibility = "hidden";
        
        // relancer le bot
        startBotAdvancement();
        answerInput.focus();
    }
    
    // Reset depuis overlay victoire (ne remet pas les victoires à zéro)
    function resetFromVictory() {
        resetRace();
    }
    
    // Événements
    validateBtn.addEventListener('click', checkAnswer);
    resetBtn.addEventListener('click', () => {
        resetRace();
    });
    victoryRestartBtn.addEventListener('click', () => {
        resetRace();
    });
    answerInput.addEventListener('keypress', (e) => {
        if (e.key === 'Enter') checkAnswer();
    });
    
    // Initialisation
    function initGame() {
        resetRace(); // démarre le jeu proprement
    }
    
    initGame();
</script>
</body>
</html>