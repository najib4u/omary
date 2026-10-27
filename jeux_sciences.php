<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpg" sizes="32x32" href="uploads/omar.jpg">
    <title>Memory Scientifique - Omary</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Comic Sans MS', 'Arial Rounded MT Bold', sans-serif;
            background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
            min-height: 100vh;
            color: #333;
        }

        /* Navigation bar */
        .navbar {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            padding: 15px 0;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 1.5rem;
            font-weight: bold;
            color: #11998e;
        }

        .logo i {
            font-size: 1.8rem;
            color: #38ef7d;
        }

        .nav-links {
            display: flex;
            list-style: none;
            gap: 30px;
        }

        .nav-link {
            text-decoration: none;
            color: #555;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 10px 15px;
            border-radius: 25px;
            transition: all 0.3s ease;
        }

        .nav-link:hover {
            background: #11998e;
            color: white;
            transform: translateY(-2px);
        }

        /* Main content */
        .main-container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 0 20px;
        }

        .game-header {
            text-align: center;
            color: white;
            margin-bottom: 30px;
        }

        .game-header h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
        }

        .game-header p {
            font-size: 1.2rem;
            opacity: 0.9;
        }

        .score-board {
            background: white;
            border-radius: 20px;
            padding: 15px 30px;
            display: inline-flex;
            gap: 30px;
            margin-top: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            flex-wrap: wrap;
            justify-content: center;
        }

        .score-item {
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: bold;
            color: #555;
        }

        .score-item i {
            font-size: 1.5rem;
            color: #11998e;
        }

        /* Level selector */
        .level-selector {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 30px;
            flex-wrap: wrap;
        }

        .level-btn {
            padding: 12px 25px;
            border: none;
            border-radius: 25px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            background: white;
            color: #11998e;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        .level-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(0,0,0,0.2);
        }

        .level-btn.active {
            background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
            color: white;
        }

        /* Game board */
        .game-board {
            background: white;
            border-radius: 30px;
            padding: 30px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
            margin-bottom: 30px;
        }

        .cards-grid {
            display: grid;
            gap: 15px;
            justify-content: center;
            margin: 0 auto;
        }

        .cards-grid.easy {
            grid-template-columns: repeat(4, 1fr);
            max-width: 500px;
        }

        .cards-grid.medium {
            grid-template-columns: repeat(4, 1fr);
            max-width: 600px;
        }

        .cards-grid.hard {
            grid-template-columns: repeat(6, 1fr);
            max-width: 800px;
        }

        .card {
            aspect-ratio: 1;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 15px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            transition: all 0.6s ease;
            transform-style: preserve-3d;
            position: relative;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            min-height: 100px;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 20px rgba(0,0,0,0.3);
        }

        .card.flipped {
            transform: rotateY(180deg);
        }

        .card.matched {
            animation: matchPulse 0.6s ease;
            background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
        }

        .card-face {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 15px;
        }

        .card-front {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .card-front i {
            font-size: 2rem;
        }

        .card-back {
            background: white;
            transform: rotateY(180deg);
            border: 3px solid #11998e;
        }

        .card-back img {
            width: 80%;
            height: 80%;
            object-fit: contain;
        }

        .card-back .emoji {
            font-size: 3rem;
        }

        /* Buttons */
        .btn-container {
            display: flex;
            gap: 15px;
            justify-content: center;
            margin: 30px 0;
            flex-wrap: wrap;
        }

        .btn {
            padding: 15px 30px;
            border: none;
            border-radius: 30px;
            font-size: 1.1rem;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .btn-primary {
            background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(17, 153, 142, 0.4);
        }

        .btn-secondary {
            background: white;
            color: #11998e;
            border: 2px solid #11998e;
        }

        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(0,0,0,0.2);
        }

        /* Category badges */
        .categories {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .category-badge {
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: bold;
            color: white;
        }

        .category-physics { background: #e74c3c; }
        .category-biology { background: #27ae60; }
        .category-chemistry { background: #f39c12; }
        .category-astronomy { background: #9b59b6; }
        .category-geology { background: #e67e22; }

        /* Message */
        .message {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: white;
            padding: 40px;
            border-radius: 30px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            text-align: center;
            z-index: 2000;
            display: none;
            max-width: 90%;
            width: 400px;
        }

        .message.show {
            display: block;
            animation: popIn 0.5s ease;
        }

        @keyframes popIn {
            0% { transform: translate(-50%, -50%) scale(0); }
            100% { transform: translate(-50%, -50%) scale(1); }
        }

        @keyframes matchPulse {
            0% { transform: rotateY(180deg) scale(1); }
            50% { transform: rotateY(180deg) scale(1.1); }
            100% { transform: rotateY(180deg) scale(1); }
        }

        .message i {
            font-size: 4rem;
            color: #11998e;
            margin-bottom: 20px;
        }

        .message h2 {
            color: #11998e;
            margin-bottom: 15px;
        }

        .message p {
            color: #666;
            margin-bottom: 10px;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            margin: 20px 0;
        }

        .stat-item {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 15px;
        }

        .stat-value {
            font-size: 1.5rem;
            font-weight: bold;
            color: #11998e;
        }

        .stat-label {
            font-size: 0.8rem;
            color: #666;
        }

        /* Footer */
        footer {
            background: rgba(255, 255, 255, 0.95);
            padding: 30px;
            text-align: center;
            margin-top: 50px;
        }

        footer p {
            color: #666;
            margin: 10px 0;
            font-size: 0.95rem;
        }

        .social-icons {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin: 20px 0;
        }

        .social-icons a {
            width: 45px;
            height: 45px;
            background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 1.2rem;
        }

        .social-icons a:hover {
            transform: translateY(-5px) rotate(10deg);
            box-shadow: 0 5px 15px rgba(17, 153, 142, 0.4);
        }

        /* Confetti */
        .confetti {
            position: fixed;
            width: 10px;
            height: 10px;
            background: #f0f;
            position: absolute;
            animation: fall linear forwards;
            z-index: 3000;
        }

        @keyframes fall {
            to {
                transform: translateY(100vh) rotate(360deg);
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .cards-grid.hard {
                grid-template-columns: repeat(4, 1fr);
            }
            
            .card {
                min-height: 80px;
                font-size: 2rem;
            }
            
            .card-back .emoji {
                font-size: 2rem;
            }
            
            .game-header h1 {
                font-size: 1.8rem;
            }
            
            .nav-text {
                display: none;
            }
        }

        @media (max-width: 480px) {
            .cards-grid.easy,
            .cards-grid.medium,
            .cards-grid.hard {
                grid-template-columns: repeat(3, 1fr);
                gap: 10px;
            }
            
            .card {
                min-height: 70px;
            }
        }

        /* Loading animation */
        .loading {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid rgba(255,255,255,.3);
            border-radius: 50%;
            border-top-color: white;
            animation: spin 1s ease-in-out infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* Hint button */
        .hint-btn {
            position: relative;
        }

        .hint-count {
            position: absolute;
            top: -5px;
            right: -5px;
            background: #e74c3c;
            color: white;
            width: 25px;
            height: 25px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
        }
    </style>
</head>
<body>

    <!-- Navigation bar -->
    <nav class="navbar">
        <div class="nav-container">
            <div class="logo">
               <a href="index.php" class="logo">
    <img src="uploads/omaralfarouq.png" alt="Site" style="width: 70px; height: 50px;">
    <a href="index.php" class="logo">
</a>
            </div>
            <ul class="nav-links">
                <li><a href="index.php" class="nav-link" data-page="home"><i class="fas fa-home"></i> <span class="nav-text">Accueil</span></a></li>

            </ul>
        </div>
    </nav>

    <div class="main-container">
        <div class="game-header">
            <h1><i class="fas fa-brain"></i> Memory Scientifique</h1>
            <p>Retrouve les paires d'images liées aux sciences !</p>
            
            <div class="score-board">
                <div class="score-item">
                    <i class="fas fa-clock"></i>
                    <span>Temps: <span id="timer">0:00</span></span>
                </div>
                <div class="score-item">
                    <i class="fas fa-hand-pointer"></i>
                    <span>Coups: <span id="moves">0</span></span>
                </div>
                <div class="score-item">
                    <i class="fas fa-check-circle"></i>
                    <span>Paires: <span id="pairs">0</span>/<span id="total-pairs">8</span></span>
                </div>
            </div>
        </div>

        <!-- Level selector -->
        <div class="level-selector">
            <button class="level-btn active" onclick="setLevel('easy')">
                <i class="fas fa-star"></i> Facile (4x2)
            </button>
            <button class="level-btn" onclick="setLevel('medium')">
                <i class="fas fa-star-half-alt"></i> Moyen (4x3)
            </button>
            <button class="level-btn" onclick="setLevel('hard')">
                <i class="fas fa-star"></i> Difficile (6x4)
            </button>
        </div>

        <!-- Categories -->
        <div class="categories">
            <span class="category-badge category-physics"><i class="fas fa-atom"></i> Physique</span>
            <span class="category-badge category-biology"><i class="fas fa-dna"></i> Biologie</span>
            <span class="category-badge category-chemistry"><i class="fas fa-flask"></i> Chimie</span>
            <span class="category-badge category-astronomy"><i class="fas fa-rocket"></i> Astronomie</span>
        </div>

        <div class="btn-container">
            <button class="btn btn-primary" onclick="startGame()">
                <i class="fas fa-play"></i> Nouvelle Partie
            </button>
            <button class="btn btn-secondary hint-btn" onclick="useHint()" id="hintBtn">
                <i class="fas fa-lightbulb"></i> Indice
                <span class="hint-count" id="hintCount">3</span>
            </button>
            <button class="btn btn-secondary" onclick="showHelp()">
                <i class="fas fa-question-circle"></i> Règles
            </button>
        </div>

        <!-- Game board -->
        <div class="game-board">
            <div class="cards-grid easy" id="gameGrid">
                <!-- Cards will be generated by JavaScript -->
            </div>
        </div>
    </div>

    <!-- Success Message -->
    <div class="message" id="successMessage">
        <i class="fas fa-trophy"></i>
        <h2>Félicitations ! 🎉</h2>
        <p>Tu as trouvé toutes les paires !</p>
        <div class="stats-grid">
            <div class="stat-item">
                <div class="stat-value" id="finalTime">0:00</div>
                <div class="stat-label">Temps</div>
            </div>
            <div class="stat-item">
                <div class="stat-value" id="finalMoves">0</div>
                <div class="stat-label">Coups</div>
            </div>
            <div class="stat-item">
                <div class="stat-value" id="finalScore">0</div>
                <div class="stat-label">Score</div>
            </div>
        </div>
        <button class="btn btn-primary" onclick="startGame()" style="margin-top: 20px;">
            <i class="fas fa-redo"></i> Rejouer
        </button>
    </div>

    <!-- Help Message -->
    <div class="message" id="helpMessage">
        <i class="fas fa-lightbulb" style="color: #f39c12;"></i>
        <h2>Comment jouer ?</h2>
        <p style="margin: 15px 0; line-height: 1.6; text-align: left;">
            1. <strong>Retourne</strong> les cartes pour voir les images<br>
            2. <strong>Mémorise</strong> leur emplacement<br>
            3. <strong>Trouve</strong> les paires identiques<br>
            4. Utilise les <strong>indices</strong> si tu es bloqué !
        </p>
        <div style="background: #f8f9fa; padding: 15px; border-radius: 10px; margin: 15px 0;">
            <strong>Catégories scientifiques :</strong><br>
            🔬 Atome, ADN, Planète, Microscope...<br>
            🧪 Découvre le monde des sciences !
        </div>
        <button class="btn btn-primary" onclick="closeHelp()" style="margin-top: 20px;">
            <i class="fas fa-check"></i> C'est parti !
        </button>
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

    <script>
        // Scientific cards data
        const scienceCards = [
            { id: 1, name: 'atome', emoji: '⚛️', category: 'physics', color: '#e74c3c' },
            { id: 2, name: 'adn', emoji: '🧬', category: 'biology', color: '#27ae60' },
            { id: 3, name: 'microscope', emoji: '🔬', category: 'biology', color: '#27ae60' },
            { id: 4, name: 'fusee', emoji: '🚀', category: 'astronomy', color: '#9b59b6' },
            { id: 5, name: 'planete', emoji: '🪐', category: 'astronomy', color: '#9b59b6' },
            { id: 6, name: 'flacon', emoji: '🧪', category: 'chemistry', color: '#f39c12' },
            { id: 7, name: 'lampe', emoji: '💡', category: 'physics', color: '#e74c3c' },
            { id: 8, name: 'magnifying', emoji: '🔍', category: 'science', color: '#3498db' },
            { id: 9, name: 'globe', emoji: '🌍', category: 'geology', color: '#e67e22' },
            { id: 10, name: 'thermometer', emoji: '🌡️', category: 'physics', color: '#e74c3c' },
            { id: 11, name: 'bacteria', emoji: '🦠', category: 'biology', color: '#27ae60' },
            { id: 12, name: 'comet', emoji: '☄️', category: 'astronomy', color: '#9b59b6' }
        ];

        let currentLevel = 'easy';
        let cards = [];
        let flippedCards = [];
        let matchedPairs = 0;
        let moves = 0;
        let timerInterval;
        let seconds = 0;
        let gameActive = false;
        let hints = 3;
        let canFlip = true;

        const levels = {
            easy: { pairs: 4, cols: 4, class: 'easy' },
            medium: { pairs: 6, cols: 4, class: 'medium' },
            hard: { pairs: 12, cols: 6, class: 'hard' }
        };

        function setLevel(level) {
            currentLevel = level;
            document.querySelectorAll('.level-btn').forEach(btn => {
                btn.classList.remove('active');
            });
            event.target.closest('.level-btn').classList.add('active');
            startGame();
        }

        function shuffle(array) {
            for (let i = array.length - 1; i > 0; i--) {
                const j = Math.floor(Math.random() * (i + 1));
                [array[i], array[j]] = [array[j], array[i]];
            }
            return array;
        }

        function createCards() {
            const level = levels[currentLevel];
            const selectedCards = scienceCards.slice(0, level.pairs);
            const cardPairs = [...selectedCards, ...selectedCards];
            return shuffle(cardPairs);
        }

        function renderGrid() {
            const grid = document.getElementById('gameGrid');
            const level = levels[currentLevel];
            
            grid.className = `cards-grid ${level.class}`;
            grid.innerHTML = '';
            
            cards.forEach((card, index) => {
                const cardElement = document.createElement('div');
                cardElement.className = 'card';
                cardElement.dataset.index = index;
                cardElement.dataset.name = card.name;
                cardElement.innerHTML = `
                    <div class="card-face card-front">
                        <i class="fas fa-atom"></i>
                    </div>
                    <div class="card-face card-back">
                        <span class="emoji">${card.emoji}</span>
                    </div>
                `;
                cardElement.addEventListener('click', () => flipCard(index));
                grid.appendChild(cardElement);
            });
            
            document.getElementById('total-pairs').textContent = level.pairs;
        }

        function flipCard(index) {
            if (!gameActive || !canFlip) return;
            
            const card = document.querySelector(`[data-index="${index}"]`);
            
            if (card.classList.contains('flipped') || card.classList.contains('matched')) return;
            
            card.classList.add('flipped');
            flippedCards.push({ index, name: cards[index].name, element: card });
            
            if (flippedCards.length === 2) {
                moves++;
                document.getElementById('moves').textContent = moves;
                canFlip = false;
                checkMatch();
            }
        }

        function checkMatch() {
            const [card1, card2] = flippedCards;
            
            if (card1.name === card2.name) {
                // Match found
                setTimeout(() => {
                    card1.element.classList.add('matched');
                    card2.element.classList.add('matched');
                    matchedPairs++;
                    document.getElementById('pairs').textContent = matchedPairs;
                    createConfetti(card1.element);
                    createConfetti(card2.element);
                    
                    flippedCards = [];
                    canFlip = true;
                    
                    if (matchedPairs === levels[currentLevel].pairs) {
                        endGame();
                    }
                }, 600);
            } else {
                // No match
                setTimeout(() => {
                    card1.element.classList.remove('flipped');
                    card2.element.classList.remove('flipped');
                    flippedCards = [];
                    canFlip = true;
                }, 1000);
            }
        }

        function startTimer() {
            clearInterval(timerInterval);
            seconds = 0;
            updateTimer();
            timerInterval = setInterval(() => {
                seconds++;
                updateTimer();
            }, 1000);
        }

        function updateTimer() {
            const mins = Math.floor(seconds / 60);
            const secs = seconds % 60;
            document.getElementById('timer').textContent = 
                `${mins}:${secs.toString().padStart(2, '0')}`;
        }

        function startGame() {
            gameActive = true;
            canFlip = true;
            matchedPairs = 0;
            moves = 0;
            flippedCards = [];
            hints = 3;
            
            document.getElementById('pairs').textContent = '0';
            document.getElementById('moves').textContent = '0';
            document.getElementById('hintCount').textContent = hints;
            
            cards = createCards();
            renderGrid();
            startTimer();
            
            // Hide messages
            document.getElementById('successMessage').classList.remove('show');
            document.getElementById('helpMessage').classList.remove('show');
        }

        function useHint() {
            if (hints <= 0 || !gameActive || !canFlip) return;
            
            const unmatched = document.querySelectorAll('.card:not(.matched):not(.flipped)');
            if (unmatched.length < 2) return;
            
            hints--;
            document.getElementById('hintCount').textContent = hints;
            
            // Find a matching pair
            const cardArray = Array.from(unmatched);
            let pair = null;
            
            for (let i = 0; i < cardArray.length; i++) {
                for (let j = i + 1; j < cardArray.length; j++) {
                    if (cardArray[i].dataset.name === cardArray[j].dataset.name) {
                        pair = [cardArray[i], cardArray[j]];
                        break;
                    }
                }
                if (pair) break;
            }
            
            if (pair) {
                pair.forEach(card => {
                    card.style.boxShadow = '0 0 20px #f39c12';
                    setTimeout(() => {
                        card.style.boxShadow = '';
                    }, 1500);
                });
            }
        }

        function endGame() {
            clearInterval(timerInterval);
            gameActive = false;
            
            const score = calculateScore();
            document.getElementById('finalTime').textContent = document.getElementById('timer').textContent;
            document.getElementById('finalMoves').textContent = moves;
            document.getElementById('finalScore').textContent = score;
            
            setTimeout(() => {
                document.getElementById('successMessage').classList.add('show');
                createConfetti(document.body, 100);
            }, 500);
        }

        function calculateScore() {
            const level = levels[currentLevel];
            const baseScore = level.pairs * 100;
            const timeBonus = Math.max(0, 300 - seconds);
            const movesBonus = Math.max(0, (level.pairs * 2) - moves) * 10;
            return baseScore + timeBonus + movesBonus;
        }

        function showHelp() {
            document.getElementById('helpMessage').classList.add('show');
        }

        function closeHelp() {
            document.getElementById('helpMessage').classList.remove('show');
        }

        function createConfetti(element, count = 20) {
            const colors = ['#11998e', '#38ef7d', '#667eea', '#764ba2', '#f39c12', '#e74c3c'];
            const rect = element.getBoundingClientRect();
            
            for (let i = 0; i < count; i++) {
                const confetti = document.createElement('div');
                confetti.className = 'confetti';
                confetti.style.left = (rect.left + rect.width / 2) + 'px';
                confetti.style.top = (rect.top + rect.height / 2) + 'px';
                confetti.style.background = colors[Math.floor(Math.random() * colors.length)];
                confetti.style.animationDuration = (Math.random() * 2 + 1) + 's';
                document.body.appendChild(confetti);
                
                setTimeout(() => confetti.remove(), 3000);
            }
        }

        // Close message when clicking outside
        document.addEventListener('click', (e) => {
            if (e.target.classList.contains('message') && e.target.classList.add('show')) {
                e.target.classList.remove('show');
            }
        });

        // Initialize game on load
        window.onload = () => {
            startGame();
        };
    </script>

</body>
</html>