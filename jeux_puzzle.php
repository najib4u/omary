<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpg" sizes="32x32" href="uploads/omar.jpg">
    <title>Puzzle Géographique - Omary</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Comic Sans MS', 'Arial Rounded MT Bold', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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
            color: #667eea;
        }

        .logo i {
            font-size: 1.8rem;
            color: #764ba2;
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
            background: #667eea;
            color: white;
            transform: translateY(-2px);
        }

        /* Main content */
        .main-container {
            max-width: 1400px;
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
            color: #667eea;
        }

        .game-area {
            display: grid;
            grid-template-columns: 1fr 300px;
            gap: 30px;
            margin-bottom: 30px;
        }

        /* Map container */
        .map-container {
            background: white;
            border-radius: 30px;
            padding: 30px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
            position: relative;
        }

        .map-wrapper {
            position: relative;
            width: 100%;
            height: 500px;
            background: linear-gradient(180deg, #87CEEB 0%, #E0F6FF 50%, #87CEEB 100%);
            border-radius: 20px;
            overflow: hidden;
            border: 4px solid #667eea;
        }

        /* Continent drop zones */
        .drop-zone {
            position: absolute;
            border: 3px dashed rgba(102, 126, 234, 0.4);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: rgba(102, 126, 234, 0.3);
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .drop-zone:hover {
            border-color: rgba(102, 126, 234, 0.6);
            background: rgba(102, 126, 234, 0.05);
        }

        .drop-zone.correct {
            border-color: #4CAF50;
            background: rgba(76, 175, 80, 0.1);
            color: #4CAF50;
        }

        /* Continent positions */
        .zone-afrique { top: 35%; left: 42%; width: 18%; height: 30%; }
        .zone-europe { top: 15%; left: 45%; width: 12%; height: 15%; }
        .zone-asie { top: 10%; left: 58%; width: 25%; height: 35%; }
        .zone-amerique-nord { top: 5%; left: 5%; width: 22%; height: 30%; }
        .zone-amerique-sud { top: 40%; left: 12%; width: 15%; height: 35%; }
        .zone-oceanie { top: 55%; left: 75%; width: 12%; height: 15%; }
        .zone-antarctique { top: 82%; left: 20%; width: 60%; height: 12%; }

        /* Pieces sidebar */
        .pieces-sidebar {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .pieces-container {
            background: white;
            border-radius: 30px;
            padding: 25px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
        }

        .pieces-container h3 {
            color: #667eea;
            margin-bottom: 20px;
            text-align: center;
            font-size: 1.3rem;
        }

        .piece {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 15px 20px;
            margin-bottom: 12px;
            border-radius: 15px;
            cursor: grab;
            display: flex;
            align-items: center;
            gap: 12px;
            font-weight: bold;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
            transition: all 0.3s ease;
            user-select: none;
        }

        .piece:hover {
            transform: translateX(-5px) scale(1.02);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
        }

        .piece:active {
            cursor: grabbing;
        }

        .piece.placed {
            opacity: 0.5;
            pointer-events: none;
            background: #ccc;
        }

        .piece i {
            font-size: 1.3rem;
        }

        /* Countries section */
        .countries-section {
            background: white;
            border-radius: 30px;
            padding: 25px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
            margin-top: 20px;
        }

        .countries-section h3 {
            color: #764ba2;
            margin-bottom: 20px;
            text-align: center;
            font-size: 1.3rem;
        }

        .countries-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
        }

        .country-piece {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
            padding: 10px 15px;
            border-radius: 12px;
            cursor: grab;
            text-align: center;
            font-size: 0.9rem;
            font-weight: bold;
            box-shadow: 0 3px 10px rgba(245, 87, 108, 0.3);
            transition: all 0.3s ease;
        }

        .country-piece:hover {
            transform: scale(1.05);
        }

        .country-piece.placed {
            opacity: 0.5;
            pointer-events: none;
            background: #ccc;
        }

        /* Success animation */
        @keyframes success {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }

        .success-animation {
            animation: success 0.5s ease;
        }

        /* Buttons */
        .btn-container {
            display: flex;
            gap: 15px;
            justify-content: center;
            margin: 30px 0;
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
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }

        .btn-secondary {
            background: white;
            color: #667eea;
            border: 2px solid #667eea;
        }

        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(0,0,0,0.2);
        }

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
        }

        .message.show {
            display: block;
            animation: popIn 0.5s ease;
        }

        @keyframes popIn {
            0% { transform: translate(-50%, -50%) scale(0); }
            100% { transform: translate(-50%, -50%) scale(1); }
        }

        .message i {
            font-size: 4rem;
            color: #4CAF50;
            margin-bottom: 20px;
        }

        .message h2 {
            color: #667eea;
            margin-bottom: 15px;
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
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        /* Responsive */
        @media (max-width: 968px) {
            .game-area {
                grid-template-columns: 1fr;
            }
            
            .pieces-sidebar {
                flex-direction: row;
                flex-wrap: wrap;
            }
            
            .pieces-container, .countries-section {
                flex: 1;
                min-width: 250px;
            }
        }

        @media (max-width: 600px) {
            .nav-links {
                gap: 15px;
            }
            
            .nav-text {
                display: none;
            }
            
            .game-header h1 {
                font-size: 1.8rem;
            }
        }

        /* Confetti */
        .confetti {
            position: fixed;
            width: 10px;
            height: 10px;
            background: #f0f;
            position: absolute;
            animation: fall linear forwards;
        }

        @keyframes fall {
            to {
                transform: translateY(100vh) rotate(360deg);
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
            <h1><i class="fas fa-globe-americas"></i> Puzzle Géographique</h1>
            <p>Replace les pays et les continents au bon endroit sur la carte !</p>
            
            <div class="score-board">
                <div class="score-item">
                    <i class="fas fa-check-circle"></i>
                    <span>Score: <span id="score">0</span>/13</span>
                </div>
                <div class="score-item">
                    <i class="fas fa-clock"></i>
                    <span>Temps: <span id="timer">0:00</span></span>
                </div>
            </div>
        </div>

        <div class="btn-container">
            <button class="btn btn-primary" onclick="startGame()">
                <i class="fas fa-play"></i> Nouvelle Partie
            </button>
            <button class="btn btn-secondary" onclick="showHelp()">
                <i class="fas fa-question-circle"></i> Aide
            </button>
        </div>

        <div class="game-area">
            <div class="map-container">
                <div class="map-wrapper" id="map">
                    <!-- Drop zones for continents -->
                    <div class="drop-zone zone-afrique" data-continent="afrique">Afrique</div>
                    <div class="drop-zone zone-europe" data-continent="europe">Europe</div>
                    <div class="drop-zone zone-asie" data-continent="asie">Asie</div>
                    <div class="drop-zone zone-amerique-nord" data-continent="amerique-nord">Amérique du Nord</div>
                    <div class="drop-zone zone-amerique-sud" data-continent="amerique-sud">Amérique du Sud</div>
                    <div class="drop-zone zone-oceanie" data-continent="oceanie">Océanie</div>
                    <div class="drop-zone zone-antarctique" data-continent="antarctique">Antarctique</div>
                    
                    <!-- Decorative elements -->
                    <div style="position: absolute; top: 10%; left: 30%; font-size: 2rem; opacity: 0.3;">🌊</div>
                    <div style="position: absolute; top: 20%; left: 80%; font-size: 2rem; opacity: 0.3;">🌊</div>
                    <div style="position: absolute; top: 60%; left: 35%; font-size: 2rem; opacity: 0.3;">🌊</div>
                    <div style="position: absolute; top: 70%; left: 60%; font-size: 2rem; opacity: 0.3;">🌊</div>
                </div>
            </div>

            <div class="pieces-sidebar">
                <div class="pieces-container">
                    <h3><i class="fas fa-globe"></i> Les Continents</h3>
                    <div id="continents-pieces">
                        <div class="piece" draggable="true" data-continent="afrique">
                            <i class="fas fa-globe-africa"></i> Afrique
                        </div>
                        <div class="piece" draggable="true" data-continent="europe">
                            <i class="fas fa-landmark"></i> Europe
                        </div>
                        <div class="piece" draggable="true" data-continent="asie">
                            <i class="fas fa-torii-gate"></i> Asie
                        </div>
                        <div class="piece" draggable="true" data-continent="amerique-nord">
                            <i class="fas fa-flag-usa"></i> Amérique du Nord
                        </div>
                        <div class="piece" draggable="true" data-continent="amerique-sud">
                            <i class="fas fa-mountain"></i> Amérique du Sud
                        </div>
                        <div class="piece" draggable="true" data-continent="oceanie">
                            <i class="fas fa-water"></i> Océanie
                        </div>
                        <div class="piece" draggable="true" data-continent="antarctique">
                            <i class="fas fa-icicles"></i> Antarctique
                        </div>
                    </div>
                </div>

                <div class="countries-section">
                    <h3><i class="fas fa-flag"></i> Les Pays</h3>
                    <div class="countries-grid" id="countries-pieces">
                        <div class="country-piece" draggable="true" data-country="france" data-continent="europe">🇫🇷 France</div>
                        <div class="country-piece" draggable="true" data-country="bresil" data-continent="amerique-sud">🇧🇷 Brésil</div>
                        <div class="country-piece" draggable="true" data-country="chine" data-continent="asie">🇨🇳 Chine</div>
                        <div class="country-piece" draggable="true" data-country="egypte" data-continent="afrique">🇪🇬 Égypte</div>
                        <div class="country-piece" draggable="true" data-country="australie" data-continent="oceanie">🇦🇺 Australie</div>
                        <div class="country-piece" draggable="true" data-country="canada" data-continent="amerique-nord">🇨🇦 Canada</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Success Message -->
    <div class="message" id="successMessage">
        <i class="fas fa-trophy"></i>
        <h2>Félicitations ! 🎉</h2>
        <p>Tu as placé tous les éléments correctement !</p>
        <button class="btn btn-primary" onclick="startGame()" style="margin-top: 20px;">
            <i class="fas fa-redo"></i> Rejouer
        </button>
    </div>

    <!-- Help Message -->
    <div class="message" id="helpMessage">
        <i class="fas fa-lightbulb" style="color: #FFC107;"></i>
        <h2>Comment jouer ?</h2>
        <p style="margin: 15px 0; line-height: 1.6;">
            1. <strong>Glisse</strong> les continents sur les zones pointillées<br>
            2. <strong>Place</strong> les pays dans leur continent<br>
            3. <strong>Gagne</strong> des points pour chaque bonne réponse !
        </p>
        <button class="btn btn-primary" onclick="closeHelp()" style="margin-top: 20px;">
            <i class="fas fa-check"></i> J'ai compris !
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
        let score = 0;
        let totalItems = 13; // 7 continents + 6 pays
        let timerInterval;
        let seconds = 0;
        let gameStarted = false;

        // Drag and drop functionality
        const pieces = document.querySelectorAll('.piece, .country-piece');
        const dropZones = document.querySelectorAll('.drop-zone');

        pieces.forEach(piece => {
            piece.addEventListener('dragstart', dragStart);
            piece.addEventListener('dragend', dragEnd);
        });

        dropZones.forEach(zone => {
            zone.addEventListener('dragover', dragOver);
            zone.addEventListener('drop', drop);
            zone.addEventListener('dragenter', dragEnter);
            zone.addEventListener('dragleave', dragLeave);
        });

        let draggedElement = null;

        function dragStart(e) {
            draggedElement = this;
            this.style.opacity = '0.5';
            e.dataTransfer.effectAllowed = 'move';
            e.dataTransfer.setData('text/html', this.innerHTML);
        }

        function dragEnd(e) {
            this.style.opacity = '1';
            draggedElement = null;
        }

        function dragOver(e) {
            e.preventDefault();
            e.dataTransfer.dropEffect = 'move';
        }

        function dragEnter(e) {
            e.preventDefault();
            this.style.borderColor = '#667eea';
            this.style.background = 'rgba(102, 126, 234, 0.1)';
        }

        function dragLeave(e) {
            if (!this.classList.contains('correct')) {
                this.style.borderColor = 'rgba(102, 126, 234, 0.4)';
                this.style.background = 'transparent';
            }
        }

        function drop(e) {
            e.preventDefault();
            
            if (!gameStarted) {
                startGame();
            }

            const zoneContinent = this.getAttribute('data-continent');
            const pieceContinent = draggedElement.getAttribute('data-continent');
            const isCountry = draggedElement.hasAttribute('data-country');

            // Check if match is correct
            if (pieceContinent === zoneContinent && !this.classList.contains('correct')) {
                // Correct placement
                this.classList.add('correct');
                this.classList.add('success-animation');
                this.innerHTML = draggedElement.innerHTML;
                
                draggedElement.classList.add('placed');
                
                score++;
                updateScore();
                
                // Play success sound (visual feedback)
                createConfetti(this);
                
                // Check if game is complete
                if (score === totalItems) {
                    setTimeout(showSuccess, 500);
                }
            } else {
                // Wrong placement - shake effect
                this.style.animation = 'shake 0.5s';
                setTimeout(() => {
                    this.style.animation = '';
                }, 500);
            }
            
            if (!this.classList.contains('correct')) {
                this.style.borderColor = 'rgba(102, 126, 234, 0.4)';
                this.style.background = 'transparent';
            }
        }

        function updateScore() {
            document.getElementById('score').textContent = score;
        }

        function startTimer() {
            clearInterval(timerInterval);
            seconds = 0;
            timerInterval = setInterval(() => {
                seconds++;
                const mins = Math.floor(seconds / 60);
                const secs = seconds % 60;
                document.getElementById('timer').textContent = 
                    `${mins}:${secs.toString().padStart(2, '0')}`;
            }, 1000);
        }

        function startGame() {
            gameStarted = true;
            score = 0;
            updateScore();
            startTimer();
            
            // Reset all pieces
            document.querySelectorAll('.piece, .country-piece').forEach(piece => {
                piece.classList.remove('placed');
                piece.style.opacity = '1';
            });
            
            // Reset all zones
            document.querySelectorAll('.drop-zone').forEach(zone => {
                zone.classList.remove('correct');
                zone.style.borderColor = 'rgba(102, 126, 234, 0.4)';
                zone.style.background = 'transparent';
                
                // Reset text
                const continent = zone.getAttribute('data-continent');
                const names = {
                    'afrique': 'Afrique',
                    'europe': 'Europe',
                    'asie': 'Asie',
                    'amerique-nord': 'Amérique du Nord',
                    'amerique-sud': 'Amérique du Sud',
                    'oceanie': 'Océanie',
                    'antarctique': 'Antarctique'
                };
                zone.textContent = names[continent];
            });
            
            // Hide messages
            document.getElementById('successMessage').classList.remove('show');
            document.getElementById('helpMessage').classList.remove('show');
        }

        function showSuccess() {
            clearInterval(timerInterval);
            document.getElementById('successMessage').classList.add('show');
            createConfetti(document.body, 50);
        }

        function showHelp() {
            document.getElementById('helpMessage').classList.add('show');
        }

        function closeHelp() {
            document.getElementById('helpMessage').classList.remove('show');
        }

        function createConfetti(element, count = 20) {
            const colors = ['#667eea', '#764ba2', '#f093fb', '#f5576c', '#4CAF50', '#FFC107'];
            const rect = element.getBoundingClientRect();
            
            for (let i = 0; i < count; i++) {
                const confetti = document.createElement('div');
                confetti.className = 'confetti';
                confetti.style.left = rect.left + rect.width / 2 + 'px';
                confetti.style.top = rect.top + rect.height / 2 + 'px';
                confetti.style.background = colors[Math.floor(Math.random() * colors.length)];
                confetti.style.animationDuration = (Math.random() * 2 + 1) + 's';
                document.body.appendChild(confetti);
                
                setTimeout(() => confetti.remove(), 3000);
            }
        }

        // Add shake animation
        const style = document.createElement('style');
        style.textContent = `
            @keyframes shake {
                0%, 100% { transform: translateX(0); }
                25% { transform: translateX(-10px); }
                75% { transform: translateX(10px); }
            }
        `;
        document.head.appendChild(style);

        // Close message when clicking outside
        document.addEventListener('click', (e) => {
            if (e.target.classList.contains('message') && e.target.classList.contains('show')) {
                e.target.classList.remove('show');
            }
        });
    </script>

</body>
</html>