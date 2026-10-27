<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes, viewport-fit=cover">
    <link rel="icon" type="image/jpg" sizes="32x32" href="uploads/omar.jpg">
    <title> Spelling Bee - Drifting Clouds & Voice Spelling</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', 'Poppins', system-ui, -apple-system, BlinkMacSystemFont, sans-serif;
        }
        
        body {
             background:linear-gradient(180deg, black, #c8e8ff, #b0d4ee,black);
            min-height: 100vh;
            padding: 12px;
            position: relative;
            overflow-x: hidden;
        }
        
        /* ========= CLOUDS LAYER - SLOW HORIZONTAL MOTION (PERFECT FOR PHONE) ========= */
        .cloud-layer {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 0;
            overflow: hidden;
        }
        .cloud {
            position: absolute;
            color: rgba(255, 255, 245, 0.85);
            text-shadow: 0 8px 20px rgba(0,0,0,0.1);
            white-space: nowrap;
            user-select: none;
            pointer-events: none;
            will-change: transform;
            z-index: 1;
            filter: drop-shadow(0 6px 12px rgba(0,0,0,0.08));
            transition: none;
        }
        /* responsive cloud sizes - scale down on mobile */
        .cloud-1 { font-size: clamp(55px, 12vw, 90px); opacity: 0.5; }
        .cloud-2 { font-size: clamp(75px, 16vw, 130px); opacity: 0.35; }
        .cloud-3 { font-size: clamp(45px, 10vw, 70px); opacity: 0.6; }
        .cloud-4 { font-size: clamp(65px, 14vw, 110px); opacity: 0.4; }
        .cloud-5 { font-size: clamp(40px, 8vw, 55px); opacity: 0.7; }
        
        /* main content - sits above clouds */
        .main-content {
            position: relative;
            z-index: 10;
            max-width: 100%;
        }
        
        .navbar {
            background: rgba(255,255,245,0.12);
            backdrop-filter: blur(12px);
            border-radius: 80px;
            padding: 8px 18px;
            margin: 0 auto 16px auto;
            box-shadow: 0 10px 28px rgba(0,0,0,0.2);
        }
        .nav-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 8px;
        }
        .logo {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #FFE8C5;
            font-size: clamp(1.2rem, 5vw, 1.7rem);
            font-weight: 800;
        }
        .logo i { font-size: clamp(1.4rem, 6vw, 2rem); color: #FFC857; }
        .nav-links a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            background: rgba(255,200,100,0.2);
            padding: 5px 16px;
            border-radius: 40px;
            font-size: clamp(0.8rem, 3.5vw, 1rem);
        }
        
        .container {
            max-width: 1000px;
            margin: 0 auto;
           
            border-radius: 50px;
            box-shadow: 0 30px 50px rgba(1,0,1,0.5);
            overflow: hidden;
            padding: 20px 18px;
        }
        
        h2 {
            text-align: center;
            background: linear-gradient(135deg, #ffd966, #ffb347);
            -webkit-background-clip: text;
            background-clip: text;
            color:orange;
            font-size: clamp(1.3rem, 6vw, 1.8rem);
            letter-spacing: -0.5px;
            margin: 12px 0 8px;
            padding: 0 8px;
        }
        
        .login-section { text-align: center; padding: 15px 0; }
        .login-section input {
            padding: 12px 20px;
            font-size: clamp(0.9rem, 4vw, 1.1rem);
            border-radius: 60px;
            border: 2px solid #ddd;
            width: min(250px, 70%);
            margin-right: 8px;
            margin-bottom: 12px;
        }
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 50px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.2s ease;
            font-size: clamp(0.8rem, 3.5vw, 0.95rem);
        }
        .btn-primary { background: linear-gradient(95deg, #6366f1, #a855f7); color: white; box-shadow: 0 6px 14px rgba(99,102,241,0.4); }
        .btn-primary:hover { transform: scale(1.02); opacity: 0.95; }
        .btn-success { background: #10b981; color: white; }
        .btn-secondary { background: #eef2ff; color: #1f2937; }
        
        .game-section { display: none; }
        .player-info {
            background: #f1f5f9;
            padding: 12px 18px;
            border-radius: 60px;
            display: flex;
            justify-content: space-between;
            font-weight: bold;
            margin-bottom: 16px;
            flex-wrap: wrap;
            gap: 8px;
            font-size: clamp(0.85rem, 4vw, 1rem);
        }
        .score { font-size: clamp(1.2rem, 5vw, 1.6rem); color: #8b5cf6; }
        
        .settings-panel {
            background: #f8f4ff;
            border-radius: 40px;
            padding: 10px 15px;
            margin-bottom: 16px;
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            justify-content: center;
        }
        .setting-item {
            display: flex;
            align-items: center;
            gap: 8px;
            background: white;
            padding: 4px 12px;
            border-radius: 40px;
            font-size: clamp(0.7rem, 3.5vw, 0.85rem);
        }
        .btn-toggle {
            background: #10b981;
            color: white;
            padding: 3px 12px;
            border-radius: 30px;
            font-weight: bold;
            border: none;
            cursor: pointer;
            font-size: clamp(0.7rem, 3vw, 0.8rem);
        }
        .btn-toggle.off { background: #6c757d; }
        
        .wordlist-section {
            background: #fef7e0;
            border-radius: 32px;
            margin-bottom: 20px;
            overflow: hidden;
        }
        .wordlist-header {
            background: #ffd966;
            padding: 12px 20px;
            font-weight: bold;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            font-size: clamp(0.85rem, 4vw, 1rem);
        }
        .wordlist-content { padding: 16px; display: none; }
        .wordlist-content.show { display: block; }
        .word-input-group {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 15px;
        }
        .word-input-group input, .difficulty-select {
            padding: 10px 14px;
            border-radius: 40px;
            border: 1px solid #ccc;
            flex: 1;
            font-size: clamp(0.8rem, 3.5vw, 0.9rem);
        }
        .word-list-container {
            max-height: 200px;
            overflow-y: auto;
            background: white;
            border-radius: 28px;
        }
        .word-list-item {
            display: flex;
            justify-content: space-between;
            padding: 8px 14px;
            border-bottom: 1px solid #eee;
            font-size: clamp(0.8rem, 3.5vw, 0.9rem);
        }
        .difficulty-badge {
            padding: 2px 10px;
            border-radius: 30px;
            font-size: 0.7rem;
            font-weight: bold;
            color: white;
            display: inline-block;
        }
        
        .word-container {
            background: linear-gradient(120deg, #ffffff, #faf5ff);
            border-radius: 40px;
            padding: 20px 15px;
            text-align: center;
            box-shadow: 0 8px 20px rgba(0,0,0,0.05);
            margin: 15px 0;
        }
        .word-display {
            font-size: clamp(1.8rem, 7vw, 3.2rem);
            font-weight: 800;
            background: linear-gradient(145deg, #2c3e66, #b43b6e);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            word-break: break-word;
        }
        .spelling-input {
            width: 100%;
            padding: 14px;
            font-size: clamp(1.2rem, 5vw, 1.6rem);
            text-align: center;
            border-radius: 60px;
            border: 2px solid #e2e8f0;
            margin: 12px 0;
            font-weight: 500;
            letter-spacing: 1px;
        }
        .controls {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 10px;
            margin: 15px 0 10px;
        }
        .controls .btn {
            padding: 8px 14px;
            font-size: clamp(0.7rem, 3.5vw, 0.85rem);
        }
        .btn-voice {
            background: #3b82f6;
            color: white;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }
        .btn-voice.listening {
            background: #dc2626;
            animation: pulseMic 1s infinite;
        }
        .voice-status {
            background: #f1f3f4;
            border-radius: 50px;
            padding: 10px;
            margin: 8px 0;
            display: none;
            font-weight: 500;
            font-size: clamp(0.75rem, 3.5vw, 0.85rem);
        }
        .message {
            padding: 12px;
            border-radius: 50px;
            margin: 10px 0;
            font-weight: 500;
            display: none;
            font-size: clamp(0.8rem, 3.5vw, 0.9rem);
        }
        .message.success { background: #d1fae5; color: #065f46; display: block; }
        .message.error { background: #ffe4e6; color: #9f1239; display: block; }
        
        .leaderboard {
            background: #f1f0fa;
            border-radius: 36px;
            padding: 15px;
            margin-top: 15px;
        }
        .leaderboard h3 { font-size: clamp(1rem, 4.5vw, 1.3rem); margin-bottom: 10px; }
        .leaderboard-list li {
            font-size: clamp(0.8rem, 3.8vw, 0.9rem);
        }
        
        @keyframes pulseMic {
            0% { transform: scale(1); background: #dc2626; box-shadow: 0 0 0 0 rgba(220,38,38,0.5);}
            70% { transform: scale(1.03); box-shadow: 0 0 0 10px rgba(220,38,38,0);}
            100% { transform: scale(1); }
        }
        
        .great-job-message {
            position: fixed; top: 35%; left: 50%; transform: translate(-50%,-50%);
            background: linear-gradient(145deg, #fbbf24, #f97316);
            color: #1e1b2f; padding: 14px 28px; border-radius: 80px;
            font-size: clamp(1.2rem, 6vw, 1.8rem); font-weight: bold; z-index: 9999;
            white-space: nowrap; animation: messageGlow 1.2s forwards; pointer-events: none;
        }
        @keyframes messageGlow {
            0% { opacity: 0; transform: translate(-50%,-50%) scale(0.6);}
            30% { opacity: 1; transform: translate(-50%,-50%) scale(1.1);}
            100% { opacity: 0; transform: translate(-50%,-90%) scale(1); visibility: hidden;}
        }
        .floating-points {
            position: fixed; font-size: clamp(1.5rem, 7vw, 2rem); font-weight: bold; color: #facc15;
            text-shadow: 2px 2px 0 #00000080; z-index: 10000; pointer-events: none;
            animation: floatPop 1s ease-out forwards;
        }
        @keyframes floatPop {
            0% { transform: translateY(0) scale(0.8); opacity: 1; }
            100% { transform: translateY(-130px) scale(1.4); opacity: 0; }
        }
        .confetti-particle {
            position: absolute; width: 8px; height: 8px; background: #facc15;
            animation: fallConfetti 2s linear forwards;
        }
        @keyframes fallConfetti {
            0% { transform: translateY(-80px) rotate(0deg); opacity: 1; }
            100% { transform: translateY(100vh) rotate(380deg); opacity: 0; }
        }
        
        /* SCENE - fully responsive */
        .scene {
            position: relative;
            width: 100%;
            height: clamp(200px, 40vw, 280px);
            margin: 15px 0 10px;
            overflow: hidden;

        }
        .tree-container {
            position: absolute;
            top: 55%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: clamp(100px, 25vw, 200px);
            height: auto;
            pointer-events: none;
            z-index: 5;
            filter: drop-shadow(8px 12px 12px rgba(0,0,0,0.2));
        }
        .tree-emoji {
            font-size: clamp(180px, 22vw, 140px);
            text-align: center;
            line-height: 3;
            display: block;
        }
        .ground {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 25%;
            background: linear-gradient(0deg, #5f8b4c, #7ca55c);
            border-radius: 30px 30px 0 0;
            z-index: 1;
        }
                .ground::before {
            content: "🌿 🍃 🌱🌸🌼";
            position: absolute;
            bottom: 12px;
            left: 20px;
            font-size: 32px;
            opacity: 0.6;
            letter-spacing: 12px;
            white-space: nowrap;
        }

        .ground::after {
            content: "🌻🌺 🍂 🍁";
            position: absolute;
            bottom: 25px;
            right: 30px;
            font-size: 28px;
            opacity: 0.5;
        }
        .bee {
            position: absolute;
            z-index: 20;
            font-size: clamp(28px, 8vw, 44px);
            filter: drop-shadow(2px 4px 8px rgba(0,0,0,0.25));
            pointer-events: none;
            will-change: left, top;
        }
        .bee.mirrored { transform: scaleX(-1); }
        @keyframes gentleBuzz {
            0% { transform: translateY(0px) rotate(0deg); }
            25% { transform: translateY(-3px) rotate(2deg); }
            50% { transform: translateY(0px) rotate(0deg); }
            75% { transform: translateY(3px) rotate(-2deg); }
            100% { transform: translateY(0px) rotate(0deg); }
        }
        @keyframes gentleBuzzMirrored {
            0% { transform: scaleX(-1) translateY(0px) rotate(0deg); }
            25% { transform: scaleX(-1) translateY(-3px) rotate(-2deg); }
            50% { transform: scaleX(-1) translateY(0px) rotate(0deg); }
            75% { transform: scaleX(-1) translateY(3px) rotate(2deg); }
            100% { transform: scaleX(-1) translateY(0px) rotate(0deg); }
        }
        .bee:not(.mirrored) { animation: gentleBuzz 0.5s infinite ease-in-out; }
        .bee.mirrored { animation: gentleBuzzMirrored 0.5s infinite ease-in-out; }
        .sun {
            position: absolute;
            top: 8px;
            left: 20px;
            font-size: clamp(3px, 30vw, 100px);
            opacity: 0.9;
            pointer-events: none;
            z-index: 0;
        }
        .info {
            position: absolute;
            bottom: 6px;
            right: 8px;
            background: rgba(255,250,210,0.85);
            backdrop-filter: blur(6px);
            padding: 4px 12px;
            border-radius: 50px;
            font-size: clamp(8px, 3vw, 12px);
            font-weight: 600;
            color: #2c4b1e;
            z-index: 25;
            pointer-events: none;
        }
        
        footer {
            background: rgba(0,0,0,0.5);
            backdrop-filter: blur(8px);
            color: white;
            text-align: center;
            padding: 16px 10px;
            margin-top: 20px;
            border-radius: 40px;
        }
        .social-icons {
            display: flex;
            justify-content: center;
            margin: 12px 0;
            flex-wrap: wrap;
            gap: 12px;
        }
        .social-icons a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: clamp(38px, 10vw, 45px);
            height: clamp(38px, 10vw, 45px);
            background: #2c5e2e;
            color: #ffcd7e;
            border-radius: 50%;
            font-size: clamp(1.2rem, 5vw, 1.6rem);
            transition: all 0.3s;
            text-decoration: none;
        }
        footer p {
            font-size: clamp(0.7rem, 3.5vw, 0.85rem);
            margin: 5px 0;
        }
        
        @media (max-width: 550px) {
            body { padding: 8px; }
            .container { padding: 15px; }
            .controls .btn { padding: 6px 12px; }
            .setting-item { padding: 3px 10px; }
        }
    </style>
</head>
<body>

<!-- CLOUDS LAYER - SLOW HORIZONTAL DRIFT -->
<div class="cloud-layer" id="cloudLayer">
    <div class="cloud cloud-1" id="cloud1">☁️</div>
    <div class="cloud cloud-2" id="cloud2">☁️</div>
    <div class="cloud cloud-3" id="cloud3"></div>
    <div class="cloud cloud-4" id="cloud4">☁️</div>
    <div class="cloud cloud-5" id="cloud5">☁️☁️</div>
</div>

<div class="main-content">
    <nav class="navbar">
        <div class="nav-container">
            <div class="logo"><i class="fas fa-microphone-alt"></i><span>Omary Spelling Bee</span></div>
            <div class="nav-links"><a href="index.php"><i class="fas fa-home"></i> Accueil</a></div>
        </div>
    </nav>
    
    <h2> 🐝 ... SPELLING BEE ...🐝 </h2>
    <div class="container">
        <div id="loginSection" class="login-section">
            <input type="text" id="playerName" placeholder="Your name" maxlength="20">
            <button onclick="login()" class="btn btn-primary"><i class="fas fa-bee"></i> Start Spelling</button>
        </div>
    </div>
    
    <div class="scene">
        <div class="sun">☀️</div>
        <div class="tree-container"><div class="tree-emoji">🌳</div></div>
        <div class="ground"></div>
        <div id="bee1" class="bee">🐝</div>
        <div id="bee2" class="bee mirrored">🐝</div>
        <div id="bee3" class="bee">🐝</div>

    </div>
    
    <div id="gameSection" class="game-section" style="max-width:1000px; margin:0 auto;">
        <div class="player-info"><span id="displayName"></span><span class="score" id="score">Score: 0</span></div>
        <div class="settings-panel">
            <div class="setting-item"><span>🔡 Guide</span><button id="spellingVoiceToggle" onclick="toggleSpellingVoice()" class="btn-toggle">ON</button></div>
            <div class="setting-item"><span>🎤 Voice</span><button id="voiceRecognitionToggle" onclick="toggleVoiceRecognition()" class="btn-toggle">ON</button></div>
            <div class="setting-item"><span>✨ Effects</span><button id="celebrationToggle" onclick="toggleCelebrations()" class="btn-toggle">ON</button></div>
            <div class="setting-item"><span>🗣️ Voice</span><select id="voiceSelect" onchange="changeVoice()"></select></div>
        </div>
        <div class="wordlist-section">
            <div class="wordlist-header" onclick="toggleWordList()"><span>📚 Custom Word Vault</span><span id="wordListToggle">▼</span></div>
            <div id="wordListContent" class="wordlist-content">
                <div class="word-input-group">
                    <input type="text" id="newWord" placeholder="New word, e.g., 'BUTTERFLY'">
                    <select id="wordDifficulty"><option value="1">Easy</option><option value="2">Medium</option><option value="3">Hard</option><option value="4">Expert</option></select>
                    <button onclick="addWord()" class="btn btn-success">➕ Add</button>
                </div>
                <div id="customWordList" class="word-list-container"></div>
                <div style="display:flex; justify-content:space-between; margin-top:12px; flex-wrap:wrap; gap:8px;"><span>📖 Total: <span id="totalWordsCount">0</span></span><button onclick="resetToDefaultWords()" class="btn-secondary" style="padding:4px 12px;">Reset Defaults</button></div>
            </div>
        </div>
        <div class="word-container">
            <div class="word-display" id="wordDisplay">🎤 READY</div>
            <div id="currentWordHint" style="margin:10px 0; opacity:0.7; font-size:clamp(0.7rem,3.5vw,0.85rem);">✨ Press 🔊 to hear word ✨</div>
            <div id="voiceStatus" class="voice-status"></div>
            <input type="text" id="spellingInput" class="spelling-input" placeholder="Speak or type spelling..." autocomplete="off">
            <div class="controls">
                <button onclick="speakWord()" class="btn btn-secondary"><i class="fas fa-headphones"></i> Hear</button>
                <button onclick="startVoiceInput()" id="voiceInputButton" class="btn btn-voice"><i class="fas fa-microphone"></i> Voice</button>
                <button onclick="checkSpelling()" id="submitButton" class="btn btn-primary"><i class="fas fa-check"></i> Submit</button>
                <button onclick="nextWord()" class="btn btn-secondary"><i class="fas fa-skip-forward"></i> Skip</button>
            </div>
            <div id="message" class="message"></div>
        </div>
        <div class="leaderboard"><h3>🏆 Leaderboard 🏆</h3><ul id="leaderboardList" class="leaderboard-list" style="list-style:none;"></ul></div>
    </div>
    
    <footer>
        <div class="social-icons">
            <a href="https://simplsofts.com" target="_blank"><i class="fab fa-facebook-f"></i></a>
            <a href="https://wa.me/212773370700" target="_blank"><i class="fab fa-whatsapp"></i></a>
            <a href="https://www.youtube.com/@OmarLetete" target="_blank"><i class="fab fa-youtube"></i></a>
        </div>
        <p>© 2026 SimplSofts.com - Conçu avec ❤️ pour Omary</p>
        <p>Site adapté aux enfants de 8 ans - Niveau CE2</p>
    </footer>
</div>

<script>
    // ===================== SLOW HORIZONTAL CLOUD MOTION (RESPONSIVE) =====================
    const clouds = [
        { element: document.getElementById('cloud1'), speed: 0.032, amplitude: 300, phase: 0, baseY: 25 },
        { element: document.getElementById('cloud2'), speed: 0.020, amplitude: 450, phase: 1.7, baseY: 60 },
        { element: document.getElementById('cloud3'), speed: 0.042, amplitude: 230, phase: 2.3, baseY: 105 },
        { element: document.getElementById('cloud4'), speed: 0.016, amplitude: 520, phase: 3.0, baseY: 145 },
        { element: document.getElementById('cloud5'), speed: 0.025, amplitude: 380, phase: 0.8, baseY: 185 }
    ];
    
    let cloudStartTime = performance.now();
    let cloudAnimFrame;
    
    function getWindowWidth() { return window.innerWidth; }
    
    function updateClouds(timestamp) {
        const now = timestamp / 1000;
        const winWidth = getWindowWidth();
        clouds.forEach(cloud => {
            if (!cloud.element) return;
            const t = now * cloud.speed;
            const offset = Math.sin(t + cloud.phase) * cloud.amplitude;
            let leftPos = (winWidth / 2) - 50 + offset;
            leftPos = Math.min(winWidth - 30, Math.max(-70, leftPos));
            cloud.element.style.left = leftPos + 'px';
            cloud.element.style.top = cloud.baseY + 'px';
        });
        cloudAnimFrame = requestAnimationFrame(updateClouds);
    }
    
    function initClouds() {
        const winWidth = getWindowWidth();
        clouds.forEach((cloud, idx) => {
            const initOffset = Math.sin(cloud.phase) * cloud.amplitude;
            let leftPos = (winWidth / 2) - 50 + initOffset;
            leftPos = Math.min(winWidth - 30, Math.max(-70, leftPos));
            cloud.element.style.left = leftPos + 'px';
            cloud.element.style.top = cloud.baseY + 'px';
        });
        cloudAnimFrame = requestAnimationFrame(updateClouds);
    }
    
    // Bee flight (responsive within scene)
    const bee1 = document.getElementById('bee1'), bee2 = document.getElementById('bee2'), bee3 = document.getElementById('bee3');
    const sceneEl = document.querySelector('.scene');
    let beeAnimFrame;
    let beeStartTime = performance.now();
    
    function getSceneRect() {
        if (!sceneEl) return { width: Math.min(window.innerWidth - 24, 600), height: 260 };
        return sceneEl.getBoundingClientRect();
    }
    
    function updateBees(now) {
        const rect = getSceneRect();
        if (rect.width === 0) return;
        const t = (now - beeStartTime) / 1000;
        const centerX = rect.width / 2;
        const centerY = rect.height * 0.55;
        const x1 = centerX + Math.cos(t * 0.65) * Math.min(130, rect.width * 0.22) + Math.sin(t * 0.3) * 18;
        const y1 = centerY + Math.sin(t * 0.8) * Math.min(70, rect.height * 0.25) + Math.cos(t * 0.5) * 10;
        const x2 = centerX + Math.sin(t * 0.55) * Math.min(115, rect.width * 0.2) + Math.cos(t * 0.45) * 20;
        const y2 = centerY + Math.cos(t * 0.7) * Math.min(75, rect.height * 0.27) + Math.sin(t * 0.9) * 12;
        const x3 = centerX + Math.cos(t * 0.9) * Math.min(100, rect.width * 0.18) + Math.sin(t * 0.6) * 15;
        const y3 = centerY + Math.sin(t * 1.0) * Math.min(60, rect.height * 0.22) + Math.cos(t * 0.4) * 8;
        const marginX = 15, marginY = 15;
        bee1.style.left = Math.min(rect.width - marginX, Math.max(marginX, x1)) + 'px';
        bee1.style.top = Math.min(rect.height - marginY, Math.max(marginY, y1)) + 'px';
        bee2.style.left = Math.min(rect.width - marginX, Math.max(marginX, x2)) + 'px';
        bee2.style.top = Math.min(rect.height - marginY, Math.max(marginY, y2)) + 'px';
        bee3.style.left = Math.min(rect.width - marginX, Math.max(marginX, x3)) + 'px';
        bee3.style.top = Math.min(rect.height - marginY, Math.max(marginY, y3)) + 'px';
        beeAnimFrame = requestAnimationFrame(updateBees);
    }
    
    function initBees() { beeStartTime = performance.now(); beeAnimFrame = requestAnimationFrame(updateBees); }
    
    // ===================== SPELLING BEE GAME (full logic) =====================
    let currentPlayer = null, currentWordObj = null;
    let players = JSON.parse(localStorage.getItem('spellingBeePlayers')) || [];
    let customWords = JSON.parse(localStorage.getItem('customWords')) || [];
    const defaultRaw = [
        { word: "ENGLISH", difficulty: 3 },{ word: "MATHS", difficulty: 2 },{ word: "SCIENCE", difficulty: 3 },
        { word: "ART", difficulty: 1 },{ word: "SPANISH", difficulty: 2 },
        { word: "MONDAY", difficulty: 2 },{ word: "SOMETIMES", difficulty: 3 },
        { word: "MUSIC", difficulty: 1 },{ word: "SCHOOL", difficulty: 3 },{ word: "TEACHER", difficulty: 3 },
        { word: "COFFEE", difficulty: 2 },{ word: "NOODLES", difficulty: 4 },{ word: "SANDWICH", difficulty: 4 },
        { word: "FRUIT", difficulty: 2 },{ word: "TEA", difficulty: 1 },{ word: "MILK", difficulty: 1 },
        { word: "BOX", difficulty: 1 },{ word: "CUP", difficulty: 1 },{ word: "LAKE", difficulty: 1 },
        { word: "CITY", difficulty: 1 },{ word: "DEEP", difficulty: 1 },{ word: "HILL", difficulty: 2 },
        { word: "WIDE", difficulty: 2 },{ word: "HIGH", difficulty: 2 },{ word: "FARMER", difficulty: 2 },
        { word: "GLASS", difficulty: 2 },{ word: "RIVER", difficulty: 3 },{ word: "FOREST", difficulty: 3 },
        { word: "ISLAND", difficulty: 4 },{ word: "FIREFIGHTER", difficulty: 4 },{ word: "POLICE", difficulty: 4 },
        { word: "ACTOR", difficulty: 2 },{ word: "CHEF", difficulty: 2 },{ word: "VET", difficulty: 1 },
        { word: "SINGER", difficulty: 3 },{ word: "WAITER", difficulty: 3 },{ word: "DRIVER", difficulty: 3 },
        { word: "HOBBIES", difficulty: 2 },{ word: "CHESS", difficulty: 2 },{ word: "FISHING", difficulty: 3 },
        { word: "SAILING", difficulty: 3 },{ word: "SKIP", difficulty: 2 },{ word: "ROBOT", difficulty: 2 },
        { word: "KNIT", difficulty: 4 },{ word: "SEW", difficulty: 3 },
        { word: "MECHANIC", difficulty: 4 },{ word: "FOOTBALL", difficulty: 4 },{ word: "TENNIS", difficulty: 4 }
    ];
    let words = [...defaultRaw, ...customWords];
    let spellingVoiceEnabled = true, voiceRecognitionEnabled = true, celebrationsEnabled = true;
    let synth = window.speechSynthesis, voices = [], selectedVoice = null, recognition = null, isListening = false;
    
    if ('SpeechRecognition' in window || 'webkitSpeechRecognition' in window) {
        const SpeechRec = window.SpeechRecognition || window.webkitSpeechRecognition;
        recognition = new SpeechRec(); recognition.continuous = false; recognition.interimResults = false; recognition.lang = 'en-US';
        recognition.onstart = () => { isListening = true; updateVoiceButtonUI(true); showVoiceStatus("🎙️ Listening... spaces removed", "listening"); };
        recognition.onerror = () => { stopVoiceInput(); showVoiceStatus("❌ Voice error", "error"); };
        recognition.onend = () => { stopVoiceInput(); };
        recognition.onresult = (event) => {
            let raw = event.results[0][0].transcript.trim();
            let cleaned = raw.replace(/\s+/g, '').toUpperCase().replace(/[^A-Z]/g, '');
            if (!cleaned) { showVoiceStatus("⚠️ No letters", "error"); return; }
            document.getElementById('spellingInput').value = cleaned;
            showVoiceStatus(`✅ "${cleaned}"`, "success");
            stopVoiceInput();
            document.getElementById('submitButton').focus();
        };
    }
    function updateVoiceButtonUI(listening) { let btn = document.getElementById('voiceInputButton'); if(!btn) return; if(listening) { btn.classList.add('listening'); btn.innerHTML = '<i class="fas fa-stop-circle"></i> Listening'; } else { btn.classList.remove('listening'); btn.innerHTML = '<i class="fas fa-microphone"></i> Voice'; } }
    function showVoiceStatus(msg, type) { let sd = document.getElementById('voiceStatus'); if(!sd) return; sd.style.display='block'; sd.className=`voice-status ${type}`; sd.innerHTML=msg; if(type!=='listening') setTimeout(()=>{ if(sd) sd.style.display='none'; }, 2200); }
    function stopVoiceInput() { if(recognition && isListening) try{ recognition.stop(); }catch(e){} isListening=false; updateVoiceButtonUI(false); }
    function startVoiceInput() { if(!voiceRecognitionEnabled){ alert("Voice OFF"); return; } if(!recognition){ alert("Not supported"); return; } if(!currentWordObj){ alert("Get a word first"); return; } try{ recognition.start(); }catch(e){ alert("Microphone needed"); } }
    
    function loadEnglishVoices() { voices = synth.getVoices(); let ev = voices.filter(v=>v.lang.includes('en')); let sel=document.getElementById('voiceSelect'); if(!sel) return; sel.innerHTML=''; ev.forEach(v=>{ let opt=document.createElement('option'); opt.value=v.name; opt.textContent=`${v.name}`; sel.appendChild(opt); }); if(ev.length) selectedVoice=ev[0]; if(selectedVoice && sel) sel.value=selectedVoice.name; }
    function changeVoice() { let sel=document.getElementById('voiceSelect'); if(sel && sel.value) selectedVoice=voices.find(v=>v.name===sel.value)||null; }
    if(synth.onvoiceschanged!==undefined) synth.onvoiceschanged=()=>loadEnglishVoices(); setTimeout(loadEnglishVoices,300);
    
    function speakWord() { if(!currentWordObj){ nextWord(); return; } synth.cancel(); let utter=new SpeechSynthesisUtterance(currentWordObj.word); if(selectedVoice) utter.voice=selectedVoice; utter.rate=0.7; utter.onend=()=>{ if(spellingVoiceEnabled && currentWordObj) spellLettersSlowly(); }; synth.speak(utter); }
    function spellLettersSlowly() { if(!spellingVoiceEnabled||!currentWordObj) return; let letters=currentWordObj.word.split(''); let idx=0; function nextLetter(){ if(idx>=letters.length) return; let lu=new SpeechSynthesisUtterance(letters[idx]); if(selectedVoice) lu.voice=selectedVoice; lu.rate=0.55; lu.onend=()=>{ idx++; setTimeout(nextLetter,300); }; synth.speak(lu); } nextLetter(); }
    
    function updateWordListDisplay() { let container=document.getElementById('customWordList'); let totalSpan=document.getElementById('totalWordsCount'); if(!container) return; let all=[...defaultRaw,...customWords]; container.innerHTML=''; all.forEach(w=>{ let isCustom=customWords.some(c=>c.word===w.word); let div=document.createElement('div'); div.className='word-list-item'; div.innerHTML=`<div><strong>${w.word}</strong> <span class="difficulty-badge difficulty-${w.difficulty}">Lvl${w.difficulty}</span> ${isCustom?'✨':''}</div>${isCustom?`<button onclick="removeWord('${w.word}')" style="background:none; border:none; font-size:1.2rem; cursor:pointer;">🗑️</button>`:''}`; container.appendChild(div); }); if(totalSpan) totalSpan.innerText=all.length; }
    window.removeWord=function(word){ if(confirm(`Delete "${word}"?`)){ customWords=customWords.filter(w=>w.word!==word); localStorage.setItem('customWords',JSON.stringify(customWords)); words=[...defaultRaw,...customWords]; updateWordListDisplay(); } };
    function addWord(){ let wi=document.getElementById('newWord'); let diff=document.getElementById('wordDifficulty'); let newWord=wi.value.trim().toUpperCase(); if(!newWord){ alert("Enter word"); return; } if([...defaultRaw,...customWords].some(w=>w.word===newWord)){ alert("Exists!"); return; } customWords.push({word:newWord, difficulty:parseInt(diff.value)}); localStorage.setItem('customWords',JSON.stringify(customWords)); words=[...defaultRaw,...customWords]; updateWordListDisplay(); wi.value=''; alert(`✅ "${newWord}" added`); }
    function resetToDefaultWords(){ if(confirm("Remove custom words?")){ customWords=[]; localStorage.setItem('customWords',JSON.stringify(customWords)); words=[...defaultRaw]; updateWordListDisplay(); } }
    function toggleWordList(){ let c=document.getElementById('wordListContent'); let t=document.getElementById('wordListToggle'); if(c.classList.contains('show')){ c.classList.remove('show'); t.innerHTML='▼'; }else{ c.classList.add('show'); t.innerHTML='▲'; updateWordListDisplay(); } }
    function getRandomWord(){ if(words.length===0) words=[...defaultRaw]; return words[Math.floor(Math.random()*words.length)]; }
    function playCelebration(points){ if(!celebrationsEnabled) return; let gm=document.createElement('div'); gm.className='great-job-message'; gm.innerText=`✨ PERFECT! +${points} ✨`; document.body.appendChild(gm); setTimeout(()=>gm.remove(),1400); let ir=document.getElementById('spellingInput').getBoundingClientRect(); let fp=document.createElement('div'); fp.className='floating-points'; fp.innerText=`+${points}`; fp.style.left=ir.left+ir.width/2-30+'px'; fp.style.top=ir.top-20+'px'; document.body.appendChild(fp); setTimeout(()=>fp.remove(),1000); let od=document.getElementById('celebrationOverlay')||(()=>{let d=document.createElement('div'); d.id='celebrationOverlay'; d.style.position='fixed'; d.style.top='0'; d.style.left='0'; d.style.width='100%'; d.style.height='100%'; d.style.pointerEvents='none'; d.style.zIndex='9990'; document.body.appendChild(d); return d;})(); for(let i=0;i<45;i++){ let conf=document.createElement('div'); conf.className='confetti-particle'; conf.style.left=Math.random()*window.innerWidth+'px'; conf.style.backgroundColor=`hsl(${Math.random()*360},80%,60%)`; conf.style.width=Math.random()*8+4+'px'; conf.style.height=Math.random()*8+4+'px'; conf.style.animationDuration=Math.random()*1.2+1+'s'; od.appendChild(conf); setTimeout(()=>conf.remove(),2000); } }
    function login(){ let name=document.getElementById('playerName').value.trim(); if(!name){ alert("Enter name!"); return; } let existing=players.find(p=>p.name.toLowerCase()===name.toLowerCase()); if(!existing){ existing={id:Date.now(),name:name,score:0,wordsSpelled:[]}; players.push(existing); savePlayers(); } currentPlayer=existing; document.getElementById('loginSection').style.display='none'; document.getElementById('gameSection').style.display='block'; document.getElementById('displayName').innerHTML=`<i class="fas fa-crown"></i> ${currentPlayer.name}`; updateScoreUI(); updateLeaderboard(); nextWord(); }
    function savePlayers(){ localStorage.setItem('spellingBeePlayers',JSON.stringify(players)); }
    function updateScoreUI(){ if(currentPlayer) document.getElementById('score').innerText=`Score: ${currentPlayer.score}`; }
    function nextWord(){ if(!currentPlayer) return; currentWordObj=getRandomWord(); document.getElementById('currentWordHint').innerHTML='🎧 Click "Hear" to listen'; document.getElementById('wordDisplay').innerHTML='🐝 NEW WORD'; document.getElementById('spellingInput').value=''; document.getElementById('message').style.display='none'; document.getElementById('voiceStatus').style.display='none'; synth.cancel(); document.getElementById('spellingInput').focus(); }
    function checkSpelling(){ if(!currentPlayer||!currentWordObj) return; let user=document.getElementById('spellingInput').value.trim().toUpperCase(); let msgDiv=document.getElementById('message'); if(!user){ msgDiv.className='message error'; msgDiv.innerHTML='📢 Type or speak!'; return; } if(currentPlayer.wordsSpelled.includes(currentWordObj.word)){ msgDiv.className='message error'; msgDiv.innerHTML=`⚠️ Already spelled "${currentWordObj.word}".`; return; } if(user===currentWordObj.word){ let earned=currentWordObj.difficulty*10; currentPlayer.score+=earned; currentPlayer.wordsSpelled.push(currentWordObj.word); savePlayers(); updateScoreUI(); updateLeaderboard(); msgDiv.className='message success'; msgDiv.innerHTML=`🎉 CORRECT! +${earned} pts! 🎉`; playCelebration(earned); setTimeout(()=>{ nextWord(); },1500); } else { msgDiv.className='message error'; msgDiv.innerHTML=`❌ "${user}" wrong. Correct: "${currentWordObj.word}".`; document.getElementById('wordDisplay').innerHTML='😓 INCORRECT'; setTimeout(()=>{ if(currentWordObj) document.getElementById('wordDisplay').innerHTML='🎯 TRY AGAIN'; },1200); } }
    function updateLeaderboard(){ let sorted=[...players].sort((a,b)=>b.score-a.score); let ul=document.getElementById('leaderboardList'); if(!ul) return; ul.innerHTML=''; sorted.slice(0,7).forEach((p,idx)=>{ let li=document.createElement('li'); li.style.display='flex'; li.style.justifyContent='space-between'; li.style.padding='8px 10px'; li.style.borderRadius='30px'; li.style.margin='4px 0'; li.style.background=idx===0?'#fef3c7':'#ffffff'; li.innerHTML=`<span><b>${idx+1}</b> ${p.name}</span><span>${p.score} pts</span>`; ul.appendChild(li); }); }
    function toggleSpellingVoice(){ spellingVoiceEnabled=!spellingVoiceEnabled; let btn=document.getElementById('spellingVoiceToggle'); btn.innerText=spellingVoiceEnabled?"ON":"OFF"; btn.className=spellingVoiceEnabled?"btn-toggle":"btn-toggle off"; if(!spellingVoiceEnabled) synth.cancel(); }
    function toggleVoiceRecognition(){ voiceRecognitionEnabled=!voiceRecognitionEnabled; let btn=document.getElementById('voiceRecognitionToggle'); btn.innerText=voiceRecognitionEnabled?"ON":"OFF"; btn.className=voiceRecognitionEnabled?"btn-toggle":"btn-toggle off"; let micBtn=document.getElementById('voiceInputButton'); if(micBtn) micBtn.disabled=!voiceRecognitionEnabled; }
    function toggleCelebrations(){ celebrationsEnabled=!celebrationsEnabled; let btn=document.getElementById('celebrationToggle'); btn.innerText=celebrationsEnabled?"ON":"OFF"; btn.className=celebrationsEnabled?"btn-toggle":"btn-toggle off"; }
    
    document.getElementById('spellingInput')?.addEventListener('keypress',(e)=>{ if(e.key==='Enter') checkSpelling(); });
    window.login=login; window.nextWord=nextWord; window.checkSpelling=checkSpelling; window.speakWord=speakWord;
    window.startVoiceInput=startVoiceInput; window.toggleSpellingVoice=toggleSpellingVoice; window.toggleVoiceRecognition=toggleVoiceRecognition;
    window.toggleCelebrations=toggleCelebrations; window.changeVoice=changeVoice; window.addWord=addWord;
    window.resetToDefaultWords=resetToDefaultWords; window.toggleWordList=toggleWordList; window.removeWord=removeWord;
    
    initClouds(); initBees(); updateWordListDisplay(); if(players.length) updateLeaderboard();
</script>
</body>
</html>