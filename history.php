<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpg" sizes="32x32" href="uploads/omar.jpg">
    <title>Histoire-Géographie - Voyage dans le temps et l'espace</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Comic Sans MS', 'Chalkboard SE', 'Segoe UI', sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #2c3e50 0%, #3498db 100%);
            color: #333;
            min-height: 100vh;
            padding: 12px;
        }
        
        .container {
            max-width: 1300px;
            margin: 0 auto;
            background-color: rgba(255, 255, 255, 0.95);
            border-radius: 32px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.25);
            overflow: hidden;
            padding: 20px;
        }
        
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
        
        .geo-header {
            text-align: center;
            padding: 20px;
            background: linear-gradient(135deg, #f39c12 0%, #e67e22 100%);
            border-radius: 30px;
            margin-bottom: 25px;
            color: white;
        }
        
        .geo-header h1 {
            font-size: 1.8rem;
            margin-bottom: 8px;
        }
        
        /* Style pour les drapeaux en image */
        .info-flag img {
            width: 80px;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
        
        .country-selector {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .country-card {
            flex: 1 1 200px;
            min-width: 180px;
            
            border-radius: 30px;
            padding: 20px 15px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 4px solid transparent;
            box-shadow: 0 8px 16px rgba(0,0,0,0.1);
            min-height: 250px;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
        }
        
        /* Drapeaux dans les cartes de sélection */
        .country-card[data-country="saudi"] {
            background: url('https://flagcdn.com/sa.svg');
            background-size: cover;
            background-position: center;
        }
        
        .country-card[data-country="morocco"] {
            background: url('https://flagcdn.com/ma.svg');
            background-size: cover;
            background-position: center;
        }
        
        .country-card[data-country="usa"] {
            background: url('https://flagcdn.com/us.svg');
            background-size: cover;
            background-position: center;
        }
        
        .country-name {
            font-size: 1.3rem;
            font-weight: bold;
            color: white;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.8);
            padding: 2px 4px;
            border-radius: 40px;

        }
        
        .country-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 24px rgba(0,0,0,0.2);
        }
        
        .country-card.active {
            border-color: #f39c12;
            transform: scale(1.02);
        }
        
        .content-area {
            background: linear-gradient(135deg, #f5f7fa 0%, #e9ecef 100%);
            border-radius: 40px;
            padding: 25px;
            margin-bottom: 25px;
        }
        
        .country-info {
            display: none;
            animation: fadeIn 0.5s ease;
        }
        
        .country-info.active-country {
            display: block;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .info-header {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            align-items: center;
            margin-bottom: 25px;
            padding-bottom: 20px;
            border-bottom: 3px dashed #f39c12;
        }
        
        .info-flag {
            font-size: 4rem;
        }
        
        .info-title h2 {
            font-size: 2rem;
            color: #2c3e50;
        }
        
        .info-title p {
            color: #7f8c8d;
            font-size: 1rem;
        }
        
        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
            margin-bottom: 25px;
        }
        
        .info-card {
            background: white;
            border-radius: 25px;
            padding: 18px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        }
        
        .info-card h3 {
            color: #e67e22;
            margin-bottom: 12px;
            font-size: 1.3rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .info-card p {
            line-height: 1.5;
            color: #555;
        }
        
        .fun-fact {
            background: #ffeaa7;
            border-radius: 20px;
            padding: 15px;
            margin-top: 15px;
            border-left: 5px solid #f39c12;
        }
        
        .quiz-section {
            background: white;
            border-radius: 30px;
            padding: 20px;
            margin-top: 20px;
        }
        
        .quiz-question {
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 15px;
            color: #2c3e50;
        }
        
        .quiz-options {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-bottom: 15px;
        }
        
        .quiz-option {
            background: #ecf0f1;
            padding: 10px 20px;
            border-radius: 40px;
            cursor: pointer;
            transition: all 0.2s;
            font-size: 0.95rem;
        }
        
        .quiz-option:hover {
            background: #f39c12;
            color: white;
            transform: scale(1.02);
        }
        
        .quiz-feedback {
            margin-top: 10px;
            padding: 10px;
            border-radius: 20px;
            font-size: 0.95rem;
        }
        
        .quiz-success {
            background: #d4edda;
            color: #155724;
        }
        
        .quiz-error {
            background: #f8d7da;
            color: #721c24;
        }
        
        .stats {
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
            margin-top: 20px;
            padding: 15px;
            background: #2c3e50;
            border-radius: 50px;
            color: white;
        }
        
        .stat-item {
            text-align: center;
        }
        
        .stat-value {
            font-size: 1.8rem;
            font-weight: bold;
            color: #f39c12;
        }
        
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
        
        @media (max-width: 768px) {
            .country-card {
                min-height: 180px;
            }
            
            .country-name {
                font-size: 1rem;
            }
            
            .info-header {
                flex-direction: column;
                text-align: center;
            }
            
            .info-flag img {
                width: 60px;
            }
            
            .info-title h2 {
                font-size: 1.6rem;
            }
            
            .info-grid {
                grid-template-columns: 1fr;
            }
            
            .quiz-options {
                flex-direction: column;
            }
            
            .quiz-option {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>
<body>

<nav class="navbar">
    <div class="nav-container">
        <div class="logo">
               <a href="index.php" class="logo">
    <img src="uploads/omarW.png" alt="Site" style="width: 70px; height: 50px;">
    <a href="index.php" class="logo">
</a>
        </div>
        <ul class="nav-links">
            <li><a href="index.php"><i class="fas fa-home"></i> Accueil</a></li>
        </ul>
    </div>
</nav>

<div class="container">
    <div class="geo-header">
        <h1><i class="fas fa-globe-africa"></i> Histoire-Géographie</h1>
        <p>Voyage dans le temps et exploration des pays du monde !</p>
    </div>
    
    <div class="country-selector">
        <div class="country-card" data-country="saudi">
            <div class="country-name">Arabie Saoudite 🇸🇦</div>
        </div>
        <div class="country-card" data-country="morocco">
            <div class="country-name">MAROC 🇲🇦</div>
        </div>
        <div class="country-card" data-country="usa">
            <div class="country-name">États-Unis 🇺🇸</div>
        </div>
    </div>
    
    <div class="content-area">
        <div id="saudi" class="country-info">
            <div class="info-header">
                <div class="info-flag">
                    <img src="https://flagcdn.com/sa.svg" alt="Drapeau Arabie Saoudite" data-country="saudi">
                </div>
                <div class="info-title">
                    <h2>Arabie Saoudite</h2>
                    <p>Le berceau de l'Islam et des déserts dorés</p>
                </div>
            </div>
            <div class="info-grid">
                <div class="info-card">
                    <h3><i class="fas fa-city"></i> Capitale</h3>
                    <p><strong>Riyad</strong> - Une ville moderne au cœur du désert</p>
                </div>
                <div class="info-card">
                    <h3><i class="fas fa-language"></i> Langue officielle</h3>
                    <p><strong>Arabe</strong> - L'écriture se lit de droite à gauche !</p>
                </div>
                <div class="info-card">
                    <h3><i class="fas fa-mosque"></i> Lieu saint</h3>
                    <p><strong>La Mecque et Médine</strong> - Les deux villes les plus saintes de l'Islam</p>
                </div>
            </div>
            <div class="fun-fact">
                <i class="fas fa-star-of-life"></i> <strong>Le savais-tu ?</strong> L'Arabie Saoudite possède les plus grandes réserves de pétrole du monde !
            </div>
            <div class="quiz-section">
                <div class="quiz-question">📚 Quelle est la capitale de l'Arabie Saoudite ?</div>
                <div class="quiz-options">
                    <div class="quiz-option" data-answer="riyad">Riyad</div>
                    <div class="quiz-option" data-answer="jedda">Jeddah</div>
                    <div class="quiz-option" data-answer="la mecque">La Mecque</div>
                </div>
                <div class="quiz-feedback" id="quiz-feedback-saudi"></div>
            </div>
        </div>
        
        <div id="morocco" class="country-info">
            <div class="info-header">
                <div class="info-flag">
                    <img src="https://flagcdn.com/ma.svg" alt="Drapeau Maroc" data-country="morocco">
                </div>
                <div class="info-title">
                    <h2>Maroc</h2>
                    <p>Le pays des couleurs, des souks et de l'océan</p>
                </div>
            </div>
            <div class="info-grid">
                <div class="info-card">
                    <h3><i class="fas fa-city"></i> Capitale</h3>
                    <p><strong>Rabat</strong> - Une ville élégante entre océan et jardins</p>
                </div>
                <div class="info-card">
                    <h3><i class="fas fa-language"></i> Langues officielles</h3>
                    <p><strong>Arabe et Amazigh (berbère)</strong></p>
                </div>
                <div class="info-card">
                    <h3><i class="fas fa-utensils"></i> Spécialités</h3>
                    <p><strong>Tajine, couscous, thé à la menthe</strong></p>
                </div>
            </div>
            <div class="fun-fact">
                <i class="fas fa-camel"></i> <strong>Le savais-tu ?</strong> Au Maroc, on sert le thé à la menthe très sucré pour accueillir les invités.
            </div>
            <div class="quiz-section">
                <div class="quiz-question">📚 Quel est le plat traditionnel marocain cuit dans un pot en terre cuite ?</div>
                <div class="quiz-options">
                    <div class="quiz-option" data-answer="tajine">Tajine</div>
                    <div class="quiz-option" data-answer="couscous">Couscous</div>
                    <div class="quiz-option" data-answer="pastilla">Pastilla</div>
                </div>
                <div class="quiz-feedback" id="quiz-feedback-morocco"></div>
            </div>
        </div>
        
        <div id="usa" class="country-info">
            <div class="info-header">
                <div class="info-flag">
                    <img src="https://flagcdn.com/us.svg" alt="Drapeau États-Unis" data-country="usa">
                </div>
                <div class="info-title">
                    <h2>États-Unis</h2>
                    <p>Le pays des grands espaces et des légendes</p>
                </div>
            </div>
            <div class="info-grid">
                <div class="info-card">
                    <h3><i class="fas fa-city"></i> Capitale</h3>
                    <p><strong>Washington, D.C.</strong> - La Maison Blanche</p>
                </div>
                <div class="info-card">
                    <h3><i class="fas fa-language"></i> Langue</h3>
                    <p><strong>Anglais</strong></p>
                </div>
                <div class="info-card">
                    <h3><i class="fas fa-landmark"></i> Monuments célèbres</h3>
                    <p><strong>Statue de la Liberté, Grand Canyon, Disneyland</strong></p>
                </div>
            </div>
            <div class="fun-fact">
                <i class="fas fa-hotdog"></i> <strong>Le savais-tu ?</strong> Les États-Unis comptent 50 états !
            </div>
            <div class="quiz-section">
                <div class="quiz-question">📚 Quelle statue géante se trouve à New York, offerte par la France ?</div>
                <div class="quiz-options">
                    <div class="quiz-option" data-answer="statue de la liberté">Statue de la Liberté</div>
                    <div class="quiz-option" data-answer="mont rushmore">Mont Rushmore</div>
                    <div class="quiz-option" data-answer="golden gate bridge">Golden Gate Bridge</div>
                </div>
                <div class="quiz-feedback" id="quiz-feedback-usa"></div>
            </div>
        </div>
    </div>
    
    <div class="stats">
        <div class="stat-item">
            <div>🌍 Pays découverts</div>
            <div class="stat-value" id="countriesVisited">0</div>
        </div>
        <div class="stat-item">
            <div>⭐ Points Quiz</div>
            <div class="stat-value" id="quizPoints">0</div>
        </div>
    </div>
    
    <footer>
        <p>© 2026 Omary.SimplSofts.com - Designed with ❤️</p>
        <div class="social-icons">
            <a href="https://simplsofts.com" target="_blank"><i class="fab fa-facebook-f"></i></a>
            <a href="https://wa.me/212773370700" target="_blank"><i class="fab fa-whatsapp"></i></a>
            <a href="https://www.youtube.com/@OmarLetete" target="_blank"><i class="fab fa-youtube"></i></a>
        </div>
    </footer>
</div>

<script>
    let countriesVisited = 0;
    let quizPoints = 0;
    const countryAnswered = { saudi: false, morocco: false, usa: false };
    const countriesVisitedMap = { saudi: false, morocco: false, usa: false };
    
    const countryCards = document.querySelectorAll('.country-card');
    const countryInfos = document.querySelectorAll('.country-info');
    const flagImages = document.querySelectorAll('.info-flag img');
    
    // Fonction pour faire défiler vers les informations du pays
    function scrollToCountryInfo(countryId) {
        const countryElement = document.getElementById(countryId);
        if (countryElement) {
            // Ajouter un effet de surbrillance temporaire
            countryElement.classList.add('highlight');
            setTimeout(() => {
                countryElement.classList.remove('highlight');
            }, 1000);
            
            // Défilement fluide
            countryElement.scrollIntoView({
                behavior: 'smooth',
                block: 'start',
                inline: 'nearest'
            });
        }
    }
    
    // Fonction pour afficher un pays
    function showCountry(countryId, shouldScroll = true) {
        // Afficher le pays
        countryInfos.forEach(info => info.classList.remove('active-country'));
        const targetInfo = document.getElementById(countryId);
        if (targetInfo) {
            targetInfo.classList.add('active-country');
        }
        
        // Mettre à jour les cartes actives
        countryCards.forEach(card => {
            card.classList.remove('active');
            if (card.getAttribute('data-country') === countryId) {
                card.classList.add('active');
            }
        });
        
        // Mettre à jour les pays visités
        if (!countriesVisitedMap[countryId]) {
            countriesVisitedMap[countryId] = true;
            countriesVisited++;
            document.getElementById('countriesVisited').textContent = countriesVisited;
        }
        
        // Défiler vers les informations (sauf si désactivé)
        if (shouldScroll) {
            // Petit délai pour que l'affichage soit complet
            setTimeout(() => {
                scrollToCountryInfo(countryId);
            }, 100);
        }
    }
    
    // Gestionnaire pour les cartes pays
    countryCards.forEach(card => {
        card.addEventListener('click', function(e) {
            e.stopPropagation();
            const countryId = this.getAttribute('data-country');
            showCountry(countryId, true);
        });
    });
    
    // Gestionnaire pour les images de drapeau (quand on clique sur le drapeau)
    flagImages.forEach(flag => {
        flag.addEventListener('click', function(e) {
            e.stopPropagation();
            const countryId = this.getAttribute('data-country');
            // Vérifier si le pays est déjà actif
            const isActive = document.getElementById(countryId).classList.contains('active-country');
            
            if (isActive) {
                // Si déjà actif, juste défiler
                scrollToCountryInfo(countryId);
            } else {
                // Sinon, afficher et défiler
                showCountry(countryId, true);
            }
        });
    });
    
    // Configuration des quiz
    function setupQuiz(countryId, correctAnswer, feedbackId) {
        const quizDiv = document.querySelector(`#${countryId} .quiz-section`);
        if (!quizDiv) return;
        
        const options = quizDiv.querySelectorAll('.quiz-option');
        const feedbackDiv = document.getElementById(feedbackId);
        
        options.forEach(option => {
            option.addEventListener('click', function() {
                if (countryAnswered[countryId]) {
                    feedbackDiv.innerHTML = '✅ Points déjà gagnés pour ce pays !';
                    feedbackDiv.className = 'quiz-feedback quiz-success';
                    return;
                }
                
                const selectedAnswer = this.getAttribute('data-answer');
                if (selectedAnswer === correctAnswer) {
                    quizPoints += 10;
                    document.getElementById('quizPoints').textContent = quizPoints;
                    countryAnswered[countryId] = true;
                    feedbackDiv.innerHTML = '🎉 Bravo ! +10 points ! 🎉';
                    feedbackDiv.className = 'quiz-feedback quiz-success';
                    
                    // Désactiver les options
                    const allOptions = quizDiv.querySelectorAll('.quiz-option');
                    allOptions.forEach(opt => {
                        opt.style.opacity = '0.6';
                        opt.style.pointerEvents = 'none';
                    });
                } else {
                    feedbackDiv.innerHTML = '❌ Ce n\'est pas la bonne réponse. Réessaie ! ❌';
                    feedbackDiv.className = 'quiz-feedback quiz-error';
                }
            });
        });
    }
    
    // Initialiser les quiz
    setupQuiz('saudi', 'riyad', 'quiz-feedback-saudi');
    setupQuiz('morocco', 'tajine', 'quiz-feedback-morocco');
    setupQuiz('usa', 'statue de la liberté', 'quiz-feedback-usa');
    
    // Activer le premier pays (Maroc) sans défilement automatique au chargement
    showCountry('morocco', false);
</script>
</body>
</html>