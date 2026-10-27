<?php
// No backend logic needed for this static page, but .php extension allows future expansion
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <link rel="icon" type="image/jpg" sizes="32x32" href="uploads/omar.jpg">
    <title>Mots Mélangés - MathMagie</title>
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
            background: linear-gradient(135deg, #43c6ac 0%, #191654 100%);
            color: #333;
            min-height: 100vh;
            padding: 12px;
        }
        
        /* ===== CONTAINER ===== */
        .container {
            max-width: 1100px;
            margin: 0 auto;
            background-color: rgba(255, 255, 255, 0.95);
            border-radius: 32px;
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
        
        /* ===== HEADER ===== */
        .game-header {
            text-align: center;
            padding: 20px;
            background: linear-gradient(135deg, #f5af19 0%, #f12711 100%);
            border-radius: 30px;
            margin-bottom: 25px;
            color: white;
        }
        
        .game-header h1 {
            font-size: 1.2rem;
            margin-bottom: 2px;
        }
        
        .game-header p {
            font-size: 0.7rem;
            opacity: 0.95;
        }
        
        /* ===== ZONE DE JEU ===== */
        .game-area {
            background: #fff5e6;
            border-radius: 40px;
            padding: 30px;
            margin-bottom: 25px;
            text-align: center;
        }
        
        .letters-container {
            background: white;
            border-radius: 60px;
            padding: 25px;
            margin-bottom: 30px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }
        
        .mixed-letters {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 15px;
            margin: 20px 0;
        }
        
        .letter-tile {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            font-size: 2.2rem;
            font-weight: bold;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 20px;
            box-shadow: 0 8px 0 #3a2a5e;
            cursor: pointer;
            transition: all 0.1s ease;
            text-transform: uppercase;
        }
        
        .letter-tile:active {
            transform: translateY(4px);
            box-shadow: 0 4px 0 #3a2a5e;
        }
        
        .letter-tile.disabled {
            opacity: 0.4;
            transform: translateY(0);
            cursor: not-allowed;
        }
        
        .answer-area {
            background: #e8f0fe;
            border-radius: 50px;
            padding: 20px;
            margin: 20px 0;
        }
        
        .user-word {
            font-size: 2.5rem;
            letter-spacing: 12px;
            font-weight: bold;
            color: #2c3e50;
            background: white;
            padding: 15px;
            border-radius: 50px;
            margin-bottom: 15px;
            word-break: break-word;
            text-transform: uppercase;
        }
        
        .action-buttons {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 15px;
            margin: 20px 0;
        }
        
        .btn {
            padding: 12px 28px;
            font-size: 1.1rem;
            border: none;
            border-radius: 50px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }
        
        .btn-primary {
            background-color: #4CAF50;
            color: white;
            box-shadow: 0 4px 0 #2e6b2f;
        }
        
        .btn-primary:active {
            transform: translateY(2px);
            box-shadow: 0 2px 0 #2e6b2f;
        }
        
        .btn-danger {
            background-color: #ff6b6b;
            color: white;
            box-shadow: 0 4px 0 #c0392b;
        }
        
        .btn-warning {
            background-color: #ffb347;
            color: white;
            box-shadow: 0 4px 0 #c66900;
        }
        
        .btn-info {
            background-color: #2196F3;
            color: white;
            box-shadow: 0 4px 0 #0b5e9e;
        }
        
        .feedback {
            font-size: 1.2rem;
            padding: 12px;
            border-radius: 50px;
            margin: 15px auto;
            background: #fff3cd;
            color: #856404;
            display: inline-block;
        }
        
        /* ===== STATS ===== */
        .stats {
            display: flex;
            justify-content: space-around;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            border-radius: 50px;
            padding: 18px;
            margin-top: 20px;
            flex-wrap: wrap;
            gap: 15px;
        }
        
        .stat-card {
            text-align: center;
            background: white;
            border-radius: 35px;
            padding: 12px 24px;
            min-width: 120px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        
        .stat-value {
            font-size: 2rem;
            font-weight: bold;
            color: #f12711;
        }
        
        .hint-box {
            background: #e3f2fd;
            border-radius: 30px;
            padding: 15px;
            margin-top: 20px;
            font-size: 1rem;
            color: #1565c0;
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
            .letter-tile {
                width: 55px;
                height: 55px;
                font-size: 1.8rem;
            }
            .user-word {
                font-size: 1.6rem;
                letter-spacing: 6px;
            }
            .btn {
                padding: 10px 18px;
                font-size: 0.9rem;
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
            
        </ul>
    </div>
</nav>

<div class="container">
    <div class="game-header">
        <h1><i class="fas fa-puzzle-piece"></i> Mots Mélangés</h1>
        <p>Reconstitue les mots à partir des lettres mélangées ! Clique sur les lettres dans le bon ordre.</p>
    </div>
    
    <div class="game-area">
        <div class="letters-container">
            <h3><i class="fas fa-random"></i> Lettres mélangées :</h3>
            <div class="mixed-letters" id="lettersContainer">
                <!-- Les lettres seront générées ici -->
            </div>
        </div>
        
        <div class="answer-area">
            <h3><i class="fas fa-pen"></i> Ton mot :</h3>
            <div class="user-word" id="userWordDisplay"></div>
            <div class="action-buttons">
                <button class="btn btn-primary" id="validateBtn"><i class="fas fa-check-circle"></i> Valider</button>
                <button class="btn btn-danger" id="clearBtn"><i class="fas fa-trash-alt"></i> Effacer</button>
                <button class="btn btn-warning" id="shuffleBtn"><i class="fas fa-random"></i> Mélanger</button>
                <button class="btn btn-info" id="nextBtn"><i class="fas fa-forward"></i> Mot suivant</button>
            </div>
            <div id="feedbackMsg" class="feedback">✨ Clique sur les lettres pour construire le mot !</div>
        </div>
        
        <div class="hint-box" id="hintBox">
            <i class="fas fa-lightbulb"></i> <strong>Indice :</strong> <span id="hintText">Clique sur "Indice" pour un peu d'aide</span>
            <button class="btn" id="hintBtn" style="background:#ffc107; margin-left:10px; padding:5px 15px;">Afficher indice</button>
        </div>
        
        <div class="stats">
            <div class="stat-card">
                <div>🎯 Score</div>
                <div class="stat-value" id="scoreValue">0</div>
            </div>
            <div class="stat-card">
                <div>✅ Mots trouvés</div>
                <div class="stat-value" id="wordsFound">0</div>
            </div>
            <div class="stat-card">
                <div>📝 Essais</div>
                <div class="stat-value" id="attemptsCount">0</div>
            </div>
        </div>
    </div>
    
    <footer>
        <p>Les mots sont adaptés pour les enfants de 8 à 12 ans ! Amuse-toi bien !</p>
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
    // ========== LISTE DE MOTS AVEC INDICES (pour enfants 8-12 ans) ==========
    const wordsList = [
        { word: "CHAT", hint: "Animal domestique qui miaule" },
        { word: "CHIEN", hint: "Meilleur ami de l'homme, il aboie" },
        { word: "SOLEIL", hint: "Astre qui brille dans le ciel le jour" },
        { word: "LUNE", hint: "Satellite naturel de la Terre, visible la nuit" },
        { word: "ECOLE", hint: "Lieu où l'on apprend avec des maîtresses" },
        { word: "CARTABLE", hint: "Sac pour transporter ses affaires d'école" },
        { word: "PIZZA", hint: "Plat italien rond avec de la sauce tomate et du fromage" },
        { word: "BATEAU", hint: "Véhicule qui flotte sur l'eau" },
        { word: "AVION", hint: "Moyen de transport qui vole dans le ciel" },
        { word: "DRAPEAU", hint: "Morceau de tissu coloré qui représente un pays" },
        { word: "POISSON", hint: "Animal qui vit dans l'eau et respire avec des branchies" },
        { word: "MONTAGNE", hint: "Grande élévation naturelle du terrain" },
        { word: "JARDIN", hint: "Espace avec des fleurs, des arbres et parfois des légumes" },
        { word: "CADEAU", hint: "Ce qu'on offre pour un anniversaire" }
    ];
    
    let currentWordObj = null;       // { word, hint }
    let currentMixedLetters = [];     // tableau des lettres mélangées (objets {letter, used})
    let selectedLetters = [];          // lettres choisies par l'utilisateur (dans l'ordre)
    let currentScore = 0;
    let wordsFoundCount = 0;
    let totalAttempts = 0;
    let currentWordSolved = false;     // empêche de revalider le même mot
    
    // Éléments DOM
    const lettersContainer = document.getElementById('lettersContainer');
    const userWordDisplay = document.getElementById('userWordDisplay');
    const validateBtn = document.getElementById('validateBtn');
    const clearBtn = document.getElementById('clearBtn');
    const shuffleBtn = document.getElementById('shuffleBtn');
    const nextBtn = document.getElementById('nextBtn');
    const hintBtn = document.getElementById('hintBtn');
    const hintTextSpan = document.getElementById('hintText');
    const feedbackMsg = document.getElementById('feedbackMsg');
    const scoreValueSpan = document.getElementById('scoreValue');
    const wordsFoundSpan = document.getElementById('wordsFound');
    const attemptsCountSpan = document.getElementById('attemptsCount');
    
    // Fonction pour mélanger un tableau (algorithme de Fisher-Yates)
    function shuffleArray(array) {
        for (let i = array.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [array[i], array[j]] = [array[j], array[i]];
        }
        return array;
    }
    
    // Initialiser ou mélanger les lettres d'un mot
    function initMixedLetters(word) {
        const letters = word.split('');
        let mixed = letters.map(letter => ({ letter: letter.toUpperCase(), used: false }));
        mixed = shuffleArray(mixed);
        return mixed;
    }
    
    // Choisir un mot aléatoire différent du précédent si possible
    function pickRandomWord() {
        let newIndex = Math.floor(Math.random() * wordsList.length);
        if (currentWordObj) {
            while (wordsList[newIndex].word === currentWordObj.word && wordsList.length > 1) {
                newIndex = Math.floor(Math.random() * wordsList.length);
            }
        }
        return { ...wordsList[newIndex] };
    }
    
    // Charger un nouveau mot
    function loadNewWord() {
        currentWordObj = pickRandomWord();
        currentMixedLetters = initMixedLetters(currentWordObj.word);
        selectedLetters = [];
        currentWordSolved = false;
        updateLettersDisplay();
        updateUserWordDisplay();
        hintTextSpan.textContent = "🔍 Clique sur 'Afficher indice' pour un coup de pouce !";
        feedbackMsg.innerHTML = "✨ Nouveau mot ! Clique sur les lettres dans l'ordre pour le reconstituer.";
        feedbackMsg.style.background = "#fff3cd";
        feedbackMsg.style.color = "#856404";
    }
    
    // Mettre à jour l'affichage des lettres (actives / inactives)
    function updateLettersDisplay() {
        lettersContainer.innerHTML = '';
        currentMixedLetters.forEach((item, idx) => {
            const tile = document.createElement('div');
            tile.className = 'letter-tile';
            if (item.used) {
                tile.classList.add('disabled');
                tile.style.opacity = '0.4';
                tile.style.cursor = 'default';
            } else {
                tile.style.cursor = 'pointer';
            }
            tile.textContent = item.letter;
            if (!item.used) {
                tile.addEventListener('click', () => selectLetter(idx));
            }
            lettersContainer.appendChild(tile);
        });
    }
    
    // Sélectionner une lettre (si non utilisée)
    function selectLetter(index) {
        if (currentWordSolved) {
            feedbackMsg.innerHTML = "🎉 Ce mot est déjà trouvé ! Clique sur 'Mot suivant' pour continuer.";
            return;
        }
        if (currentMixedLetters[index].used) return;
        
        // Marquer comme utilisée et ajouter à selectedLetters
        currentMixedLetters[index].used = true;
        selectedLetters.push(currentMixedLetters[index].letter);
        updateLettersDisplay();
        updateUserWordDisplay();
        
        // Vérifier si la longueur atteint la taille du mot (autovérification optionnelle)
        if (selectedLetters.length === currentWordObj.word.length) {
            // on pourrait valider automatiquement, mais on laisse l'enfant valider
            feedbackMsg.innerHTML = "✅ Tu as sélectionné toutes les lettres ! Appuie sur 'Valider' pour voir si c'est correct.";
        }
    }
    
    // Mettre à jour l'affichage du mot en construction
    function updateUserWordDisplay() {
        if (selectedLetters.length === 0) {
            userWordDisplay.textContent = "___";
        } else {
            userWordDisplay.textContent = selectedLetters.join('');
        }
    }
    
    // Effacer la dernière lettre sélectionnée
    function clearLastLetter() {
        if (currentWordSolved) {
            feedbackMsg.innerHTML = "Le mot est déjà résolu, passe au suivant !";
            return;
        }
        if (selectedLetters.length === 0) return;
        
        // Récupérer la dernière lettre et la réactiver dans le tableau mixedLetters
        const lastLetter = selectedLetters.pop();
        // Trouver la première occurrence non utilisée correspondante dans l'ordre inverse (on prend la dernière qui correspond)
        for (let i = currentMixedLetters.length - 1; i >= 0; i--) {
            if (currentMixedLetters[i].letter === lastLetter && currentMixedLetters[i].used === true) {
                currentMixedLetters[i].used = false;
                break;
            }
        }
        updateLettersDisplay();
        updateUserWordDisplay();
        feedbackMsg.innerHTML = "🗑️ Lettre enlevée ! Continue à construire le mot.";
    }
    
    // Mélanger les lettres restantes (non utilisées)
    function shuffleRemainingLetters() {
        if (currentWordSolved) {
            feedbackMsg.innerHTML = "Mot déjà trouvé, passe au suivant !";
            return;
        }
        // Extraire les lettres non utilisées
        const unusedLetters = [];
        const newMixed = [];
        for (let item of currentMixedLetters) {
            if (item.used) {
                newMixed.push(item); // garder utilisées telles quelles
            } else {
                unusedLetters.push(item.letter);
            }
        }
        // Mélanger les lettres non utilisées
        const shuffledUnused = shuffleArray([...unusedLetters]);
        for (let letter of shuffledUnused) {
            newMixed.push({ letter: letter, used: false });
        }
        currentMixedLetters = newMixed;
        updateLettersDisplay();
        feedbackMsg.innerHTML = "🃏 Les lettres restantes ont été mélangées !";
    }
    
    // Valider le mot proposé
    function validateWord() {
        if (currentWordSolved) {
            feedbackMsg.innerHTML = "🏆 Tu as déjà trouvé ce mot ! Essaie le suivant.";
            return;
        }
        const proposedWord = selectedLetters.join('');
        const targetWord = currentWordObj.word.toUpperCase();
        
        totalAttempts++;
        attemptsCountSpan.textContent = totalAttempts;
        
        if (proposedWord === targetWord) {
            // Succès
            const points = 10;
            currentScore += points;
            wordsFoundCount++;
            currentWordSolved = true;
            
            scoreValueSpan.textContent = currentScore;
            wordsFoundSpan.textContent = wordsFoundCount;
            
            feedbackMsg.innerHTML = `🎉 BRAVO ! C'est bien "${currentWordObj.word}" ! +${points} points ! 🎉`;
            feedbackMsg.style.background = "#d4edda";
            feedbackMsg.style.color = "#155724";
            
            // Désactiver toutes les lettres restantes
            for (let i = 0; i < currentMixedLetters.length; i++) {
                currentMixedLetters[i].used = true;
            }
            updateLettersDisplay();
        } else {
            // Mauvaise réponse
            feedbackMsg.innerHTML = `😓 Oops ! "${proposedWord}" n'est pas le bon mot. Réessaie avec les lettres restantes !`;
            feedbackMsg.style.background = "#f8d7da";
            feedbackMsg.style.color = "#721c24";
        }
    }
    
    // Afficher l'indice
    function showHint() {
        if (currentWordObj) {
            hintTextSpan.textContent = currentWordObj.hint;
            feedbackMsg.innerHTML = "💡 Un indice t'a été donné ! Regarde en haut.";
        }
    }
    
    // Réinitialiser le mot en cours (sans changer de mot)
    function resetCurrentWord() {
        if (currentWordSolved) {
            loadNewWord();
            return;
        }
        // Remettre à zéro les sélections sans changer le mot
        selectedLetters = [];
        currentMixedLetters = initMixedLetters(currentWordObj.word);
        updateLettersDisplay();
        updateUserWordDisplay();
        feedbackMsg.innerHTML = "🔄 Le mot a été réinitialisé ! Recompose-le avec les lettres mélangées.";
        feedbackMsg.style.background = "#fff3cd";
    }
    
    // Événements
    validateBtn.addEventListener('click', validateWord);
    clearBtn.addEventListener('click', clearLastLetter);
    shuffleBtn.addEventListener('click', shuffleRemainingLetters);
    nextBtn.addEventListener('click', () => {
        loadNewWord();
    });
    hintBtn.addEventListener('click', showHint);
    
    // Initialisation
    function initGame() {
        loadNewWord();
    }
    
    initGame();
</script>
</body>
</html>