<!DOCTYPE html>

<html lang="ar" dir="rtl">
<link rel="icon" type="image/png" sizes="32x32" href="Med.png">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>السيرة النبوية - نبذة شاملة | Prophetic Biography</title>
    <!-- Font Awesome 6 (free icons) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', 'Tahoma', 'Traditional Arabic', Arial, sans-serif;
            background: linear-gradient(0.5turn, #3f87a6, #1e1c3d, #f69d3c);
            color: #2c3e2f;
            line-height: 1.7;
            padding: 20px;
            transition: all 0.2s ease;
        }

        /* When language is English or French, we set LTR */
        body.lang-en, body.lang-fr {
            direction: ltr;
            text-align: left;
        }
        
        body.lang-en .container, body.lang-fr .container {
            text-align: left;
        }
        
        body.lang-en h1, body.lang-fr h1 {
            border-right: none;
            border-left: 8px solid #2e7d32;
            padding-right: 0;
            padding-left: 20px;
        }

        .container {
            max-width: 1600px;
            margin: 10px auto;
            background: #ffffff;
            border-radius: 28px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            padding: 30px 40px 50px;
            transition: all 0.3s ease;
        }

        h1 {
            font-size: 2.6rem;
            color: #1e4620;
            border-right: 8px solid #2e7d32;
            padding-right: 20px;
            margin-top: 10px;
            margin-bottom: 20px;
            font-weight: 700;
            letter-spacing: -0.5px;
        }

        h2 {
            font-size: 1.9rem;
            color: #1b5e20;
            margin-top: 30px;
            margin-bottom: 15px;
            border-bottom: 2px solid #c8e6c9;
            padding-bottom: 8px;
            font-weight: 600;
        }

        h3 {
            font-size: 1.5rem;
            color: #2e7d32;
            margin-top: 25px;
            margin-bottom: 12px;
            font-weight: 600;
            background: #f1f8e9;
            padding: 8px 15px;
            border-radius: 40px;
            display: inline-block;
        }

        p {
            margin-bottom: 1.2rem;
            font-size: 1.05rem;
            text-align: justify;
        }

        body.lang-en p, body.lang-fr p {
            text-align: left;
        }

        .highlight {
            background: #fef9e4;
            padding: 20px;
            border-radius: 24px;
            border-right: 6px solid #ffb74d;
            margin: 20px 0;
        }

        ul, .custom-list {
            margin: 15px 0 20px 30px;
            padding-right: 10px;
        }

        li {
            margin-bottom: 8px;
            font-size: 1.02rem;
        }

        .image-placeholder {
            background: #f0f2f5;
            border-radius: 24px;
            padding: 15px;
            text-align: center;
            margin: 25px 0;
            border: 1px dashed #a5d6a7;
            color: #4caf50;
            font-style: italic;
        }

        .app-promo {
            background: #e8f0fe;
            border-radius: 28px;
            padding: 20px;
            margin: 30px 0;
            text-align: center;
            border: 1px solid #bbdef5;
        }

        .btn {
            display: inline-block;
            background: #1b5e20;
            color: white;
            padding: 10px 24px;
            border-radius: 40px;
            text-decoration: none;
            margin-top: 12px;
            font-weight: bold;
            transition: 0.2s;
        }

        .btn:hover {
            background: #0a3b0e;
            transform: scale(1.02);
        }

        /* NAVBAR: responsive + reduced height */
.navbar {
    border-radius: 28px;
    background: #009c53;
    padding: 2px 2px;          /* Reduced from 12px 0px */
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    position: sticky;
    top: 0;
    z-index: 100;
}
        
.nav-container {
    max-width: 1200px;
    margin: 0px auto;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 2px 2px;         /* Reduced from 10px */
    flex-wrap: wrap;
    gap: 2px;
}
        
.logo {
    display: flex;
    align-items: center;
    color: white;
    font-size: 1.3rem;         /* Reduced from 1.5rem */
    font-weight: bold;
    text-shadow: 1px 1px 0 #1e3a1e;
    gap: 6px;                  /* Reduced from 8px */
}

.logo i {
    font-size: 1.3rem;         /* Reduced from 1.6rem */
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
    font-size: 0.85rem;        /* Reduced from 0.95rem */
    padding: 4px 10px;         /* Reduced from 6px 14px */
    border-radius: 40px;
    transition: all 0.25s;
    display: flex;
    align-items: center;
    gap: 4px;                  /* Reduced from 6px */
    background: rgba(255,255,255,0.1);
}

        
        .nav-links a i {
            font-size: 0.9rem;
        }
        
        .nav-links a:hover {
            background-color: #ffb74d;
            color: #2c3e2f;
            transform: translateY(-2px);
        }
        
        /* Language selector buttons */
        .lang-selector {
            display: flex;
            gap: 8px;
            align-items: center;
        }
        
.lang-btn {
    background: #ffb347;
    border: none;
    padding: 4px 10px;         /* Reduced from 6px 14px */
    border-radius: 40px;
    font-weight: bold;
    font-size: 0.8rem;         /* Reduced from 0.85rem */
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 4px;                  /* Reduced from 6px */
    transition: 0.2s;
    color: #1e3a1e;
    font-family: inherit;
}
        
        .lang-btn i {
            font-size: 0.9rem;
        }
        
        .lang-btn:hover {
            background: #ff9f1c;
            transform: scale(0.97);
        }
        
        .lang-btn.active {
            background: #1e5a1e;
            color: white;
            box-shadow: 0 0 5px rgba(255,255,255,0.5);
        }

        /* FOOTER: centered + social icons visible */
        footer {
            background: #1e2a1e;
            color: #f5f5f5;
            text-align: center;
            padding: 30px 20px;
            margin-top: 50px;
            border-radius: 30px 30px 20px 20px;
            box-shadow: 0 -4px 12px rgba(0,0,0,0.1);
        }
        
        footer p {
            text-align: center;
            margin-bottom: 12px;
        }
        
        .social-icons {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin: 20px 0;
            flex-wrap: wrap;
        }
        
        .social-icons a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 48px;
            height: 48px;
            background: #3c6e3f;
            color: white;
            border-radius: 50%;
            font-size: 1.6rem;
            transition: all 0.3s ease;
            text-decoration: none;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
        
        .social-icons a:hover {
            transform: translateY(-6px);
            background: #ffb347;
            color: #1e3a1e;
        }
        
        .quote {
            font-style: normal;
            background: #f9f6e0;
            padding: 12px 20px;
            border-radius: 30px;
            margin: 20px 0;
        }
        
        /* Responsive */
        @media (max-width: 780px) {
            .nav-container {
                flex-direction: column;
                gap: 6px;
                padding: 6px 10px;
            }
            .nav-links {
                justify-content: center;
                width: 100%;
                gap: 8px;
            }
            .lang-selector {
                margin-top: 5px;
            }
            .container {
                padding: 20px;
            }
            h1 {
                font-size: 1.9rem;
            }
            h2 {
                font-size: 1.5rem;
            }
            footer {
                padding: 20px 15px;
            }
            .social-icons a {
                width: 42px;
                height: 42px;
                font-size: 1.3rem;
            }
        }
        
            .avatar {
        display: flex;
        justify-content: center;
        align-items: center;
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

<!-- Navigation bar with correct links -->
<nav class="navbar">
    <div class="nav-container">
        <div class="logo">
     <img src="uploads/omarW.png" alt="Site" style="width: 70px; height: 50px;">
    <a href="index.php" class="logo">
    </a>
                <ul class="nav-links">
            <li><a href="index.php" class="nav-link" data-page="home"><i class="fas fa-home"></i> <span class="nav-text">Accueil</span></a></li>
        </ul>
        
        </div>

        <!-- Language buttons: Arabic, French, English -->
        <div class="lang-selector">
            <button class="lang-btn" data-lang="ar"><i class="fas fa-language"></i> عربي</button>
            <button class="lang-btn" data-lang="fr"><i class="fas fa-language"></i> Français</button>
            <button class="lang-btn" data-lang="en"><i class="fas fa-language"></i> English</button>
        </div>
    </div>
</nav>

<div class="container" id="mainContent">
     <div class="avatar">
            <img src="Med.png" alt="Avatar d'Omar" style="width: 30%; height: 30%; object-fit: cover; border-radius: 50%;">
        </div>
        
   <!-- Arabic content (original) with proper punctuation and diacritical marks (tashkeel + tanween) -->
<div id="content-ar">
    <h1>السِّيْرَةُ النَّبَوِيَّةُ الشَّرِيفَةُ</h1>
    <p>كَانَ حَالُ الْعَرَبِ فِي الْجَاهِلِيَّةِ قَبْلَ الْإِسْلَامِ يُرْثَى لَهُ، حَيْثُ انْتَشَرَتِ الْعَدِيدُ مِنَ الْعَادَاتِ الذَّمِيمَةِ وَالْأَعْرَافِ الْقَبِيحَةِ بَيْنَ أَفْرَادِ الْمُجْتَمَعِ، كَتِجَارَةِ الرَّقِيقِ وَالزِّنَا وَالْمُعَامَلَةِ الدُّونِيَّةِ لِلْمَرْأَةِ. فَبُعِثَ الرَّسُولُ مُحَمَّدٌ صَلَّى اللَّهُ عَلَيْهِ وَسَلَّمَ لِنَشْرِ الرِّسَالَةِ الَّتِي أَوْكَلَهَا اللَّهُ إِيَّاهُ، وَكَانَ لَهُ الْفَضْلُ فِي هِدَايَةِ الْأُمَّةِ وَنَقْلِهَا مِنَ الْكُفْرِ وَالْعُبُودِيَّةِ إِلَى الْإِسْلَامِ.</p>
    <p>وَقَدْ مَرَّتِ الدَّعْوَةُ بِالْعَدِيدِ مِنَ الْمَرَاحِلِ السِّرِّيَّةِ وَالْجَهْرِيَّةِ، كَمَا أُوذِيَ الرَّسُولُ صَلَّى اللَّهُ عَلَيْهِ وَسَلَّمَ حَتَّى هَاجَرَ مِنْ مَكَّةَ مَكَانِ وِلَادَتِهِ. لَكِنَّ ذَلِكَ لَمْ يَزِدْهُ صَلَّى اللَّهُ عَلَيْهِ وَسَلَّمَ إِلَّا إِصْرَارًا، فَنَشَرَ الدَّعْوَةَ خَارِجَ مَكَّةَ، وَأَسْلَمَتِ الْكَثِيرُ مِنَ الْقَبَائِلِ الْعَرَبِيَّةِ حِينَئِذٍ. ثُمَّ وَافَتْهُ الْمَنِيَّةُ فِي الْمَدِينَةِ، تَارِكًا سُنَّتَهُ الْعَطِرَةَ لِلْأُمَّةِ الْإِسْلَامِيَّةِ وَوَصَايَا عَظِيمَةً لِلْبَشَرِيَّةِ.</p>

    <h2>وِلَادَةُ الرَّسُولِ مُحَمَّدٍ صَلَّى اللَّهُ عَلَيْهِ وَسَلَّمَ</h2>
    <p>وُلِدَ الرَّسُولُ مُحَمَّدٌ صَلَّى اللَّهُ عَلَيْهِ وَسَلَّمَ، سَيِّدُ الْمُرْسَلِينَ وَخَاتَمُ النَّبِيِّينَ، فِي مَكَّةَ الْمُكَرَّمَةِ فِي شِعْبِ أَبِي طَالِبٍ، يَوْمَ الْإِثْنَيْنِ الثَّانِيَ عَشَرَ مِنْ شَهْرِ رَبِيعٍ الْأَوَّلِ. وَيُوَافِقُ ذَلِكَ فِي التَّارِيخِ الْمِيلَادِيِّ الثَّانِيَ وَالْعِشْرِينَ مِنْ شَهْرِ إِبْرِيلَ لِعَامِ خَمْسِمِائَةٍ وَوَاحِدٍ وَسَبْعِينَ لِلْمِيلَادِ، وَكَانَ ذَلِكَ بَعْدَ خَمْسِينَ يَوْمًا مِنْ عَامِ الْفِيلِ.</p>

    <h2>مَا قَبْلَ بَعْثَةِ النَّبِيِّ مُحَمَّدٍ صَلَّى اللَّهُ عَلَيْهِ وَسَلَّمَ</h2>
    <h3>حَرْبُ الْفِجَارِ</h3>
    <p>حَرْبُ الْفِجَارِ هِيَ إِحْدَى حُرُوبِ الْعَرَبِ فِي الْجَاهِلِيَّةِ، حَصَلَتْ بَيْنَ قَبِيلَةِ كِنَانَةَ وَقَبَائِلِ قَيْسِ عَيْلَانَ. وَقَدْ سُمِّيَتْ بِحَرْبِ الْفِجَارِ لِأَنَّهَا وَقَعَتْ فِي الْأَشْهُرِ الْحُرُمِ (شَهْرِ رَجَبٍ) الَّتِي حَرَّمَ اللَّهُ فِيهَا الْقِتَالَ.</p>
    <h3>حِلْفُ الْفُضُولِ</h3>
    <p>مُعَاهَدَةٌ أَوِ اتِّفَاقٌ نَشَأَ قَبْلَ بَعْثَةِ الرَّسُولِ صَلَّى اللَّهُ عَلَيْهِ وَسَلَّمَ بَيْنَ بَنِي هَاشِمٍ وَبَنِي تَيْمٍ وَبَنِي زُهْرَةَ، تَعَاهَدُوا فِيهِ عَلَى الدِّفَاعِ عَنْ أَيِّ مَظْلُومٍ فِي مَكَّةَ. وَقَدْ شَهِدَ عَلَيْهِ الرَّسُولُ صَلَّى اللَّهُ عَلَيْهِ وَسَلَّمَ وَهُوَ فِي الْعِشْرِينَ مِنْ عُمُرِهِ.</p>
    <h3>تَجْدِيدُ بِنَاءِ الْكَعْبَةِ وَقَضِيَّةُ التَّحْكِيمِ</h3>
    <p>قَرَّرَتْ قُرَيْشٌ إِعَادَةَ بِنَاءِ الْكَعْبَةِ بَعْدَ تَصَدُّعِ جُدْرَانِهَا، وَاتَّفَقُوا عَلَى أَلَّا يُدْخِلُوا فِي بِنَائِهَا إِلَّا مَالًا حَلَالًا. وَأَثْنَاءَ بِنَائِهِمْ لِلْكَعْبَةِ خَصَّصُوا لِكُلِّ قَبِيلَةٍ بِنَاءَ جُزْءٍ مِنْهَا، فَجَمَعَتْ كُلُّ قَبِيلَةٍ الْحِجَارَةَ عَلَى حِدَةٍ وَأَخَذُوا يَبْنُونَهَا مَعًا.</p>
  <p>وَحِينَما وَصَلُوا إِلَى مَرْحَلَةِ وَضْعِ الْحَجَرِ الْأَسْوَدِ، اخْتَلَفُوا فِيمَنْ يَحْظَى بِشَرَفِ وَضْعِ الْحَجَرِ الْأَسْوَدِ فِي مَكَانِهِ، فَوَقَعَ الِاخْتِيَارُ عَلَى الرَّسُولِ صَلَّى اللَّهُ عَلَيْهِ وَسَلَّمَ فِي التَّحْكِيمِ بَيْنَهُمْ، وَبَعْدَهَا طَلَبَ الرَّسُولُ صَلَّى اللَّهُ عَلَيْهِ وَسَلَّمَ رِدَاءً فَوَضَعَ الْحَجَرَ وَسَطَهُ وَطَلَبَ مِنْ رُؤَسَاءِ الْقَبَائِلِ الْمُتَنَازِعِينَ أَنْ يُمْسِكُوا جَمِيعًا بِأَطْرَافِ الرِّدَاءِ، وَأَمَرَهُمْ أَنْ يَرْفَعُوهُ، حَتَّى إِذَا أَوْصَلُوهُ إِلَى مَوْضِعِهِ وَأَخَذَهُ الرَّسُولُ بِيَدِهِ وَوَضَعَهُ فِي مَكَانِهِ، وَبِذَلِكَ تَمَّ حَلُّ النِّزَاعِ الْوَاقِعِ بَيْنَهُمْ.</p>

    <h2>نُزُولُ الْوَحْيِ عَلَى الرَّسُولِ صَلَّى اللَّهُ عَلَيْهِ وَسَلَّمَ</h2>
           <div class="avatar">
            <img src="uploads/hira.png" alt="Avatar d'Omar" style="width: 50%; height: 50%; object-fit: cover; border-radius: 10%;">
        </div>
   
   
    <p>تَعَدَّدَتْ صُوَرُ نُزُولِ الْوَحْيِ عَلَى الرَّسُولِ صَلَّى اللَّهُ عَلَيْهِ وَسَلَّمَ أَثْنَاءَ السِّيْرَةِ النَّبَوِيَّةِ، فِي الْبِدَايَةِ كَانَ الْوَحْيُ يَأْتِي إِلَى الرَّسُولِ فِي مَنَامِهِ، وَبَعْدَهَا بِهَيْئَةِ رَجُلٍ، وَبَعْدَهَا بِصُورَةِ مَلَائِكَةٍ كَمَا حَدَثَ فِي لَيْلَةِ الْإِسْرَاءِ وَالْمِعْرَاجِ.</p>

    <h2>مَرَاحِلُ الدَّعْوَةِ الْإِسْلَامِيَّةِ</h2>
    <h3>الدَّعْوَةُ السِّرِّيَّةُ</h3>
    <p>بَدَأَ الرَّسُولُ صَلَّى اللَّهُ عَلَيْهِ وَسَلَّمَ بِالدَّعْوَةِ السِّرِّيَّةِ الَّتِي أَمَرَهُ اللَّهُ بِهَا، فَبَدَأَ بِدَعْوَةِ أَهْلِ بَيْتِهِ ثُمَّ الْأَقْرَبِينَ فَالْأَقْرَبِينَ. وَكَانَ ذَلِكَ دُونَ عِلْمِ قُرَيْشٍ، وَأَسْلَمَ حِينَئِذٍ أَرْبَعِينَ شَخْصًا.</p>
    
    <p>، وَكَانَ مِنْ أَوَّلِ مَنْ آمَنَ بِهِ زَوْجَتُهُ خَدِيجَةُ بِنْتُ خُوَيْلِدٍ، وَصَدِيقُهُ أَبُو بَكْرٍ الصِّدِّيقُ، وَابْنُ عَمِّهِ عَلِيُّ بْنُ أَبِي طَالِبٍ. وَاسْتَمَرَّ الرَّسُولُ صَلَّى اللَّهُ عَلَيْهِ وَسَلَّمَ فِي الدَّعْوَةِ سِرًّا مَدَةَ ثَلَاثِ سِنِينَ، إِلَى حِينِ أَذِنَ اللَّهُ لَهُ بِالجَهْرِ بِهَا.
    </p>
    <h3>الدَّعْوَةُ الْجَهْرِيَّةُ</h3>
    <p>انْتَقَلَتِ الدَّعْوَةُ مِنَ الْمَرْحَلَةِ السِّرِّيَّةِ إِلَى الْمَرْحَلَةِ الْجَهْرِيَّةِ، وَبَعْدَ عِلْمِ قُرَيْشٍ بِانْتِشَارِ الدَّعْوَةِ تَصَدَّتْ قُرَيْشٌ لَهَا بِكَافَّةِ الْأَسَالِيبِ، مَعَ تَهْدِيدٍ وَإِيذَاءٍ وَضَرْبِ الرَّسُولِ صَلَّى اللَّهُ عَلَيْهِ وَسَلَّمَ  لكن الرسول لم يكترث لأفعالهم واستمر بنشر الدعوة.</p>

<h2>خُرُوجُ الرَّسُولِ إِلَى الطَّائِفِ</h2>
      <p>بَعْدَ وَفَاةِ السَّيِّدَةِ خَدِيجَةَ بِنْتِ خُوَيْلِدٍ زَوْجَةِ الرَّسُولِ، وَأَبِي طَالِبٍ عَمِّ الرَّسُولِ فِي مَكَّةَ، بِدَأَ الرَّسُولُ صَلَّى اللَّهُ عَلَيْهِ وَسَلَّمَ بِنَشْرِ الدَّعْوَةِ خَارِجَ مَكَّةَ، فَذَهَبَ إِلَى الطَّائِفِ بِرِفْقَةِ زَيْدِ بْنِ حَارِثَةَ، فِي شَهْرِ شَوَّالٍ مِنَ السَّنَةِ الْعَاشِرَةِ لِلْبِعْثَةِ، وَعَمِلَ عَلَى نَشْرِ الْإِسْلَامِ هُنَاكَ، إِلَّا أَنَّهُمْ صَدُّوهُ وَرَفَضُوا دَعْوَتَهُ وَرَمَوْهُ بِالْحِجَارَةِ. </p>
   <h2>مَعَانَاةُ الرَّسُولِ فِي تَبْلِيغِ الرِّسَالَةِ</h2>
   <p>عَانَى الرَّسُولُ صَلَّى اللَّهُ عَلَيْهِ وَسَلَّمَ مِنْ قُرَيْشٍ وَإِيذَائِهِمْ أَثْنَاءَ الدَّعْوَةِ إِلَى دِينِ الْإِسْلَامِ، فَقَدْ تَعَرَّضَ لَهُ الْمُشْرِكُونَ بِصُوَرٍ مُتَنَوِّعَةٍ مِنَ الْأَذَى، فَقَدْ خَطَّطَ الْمُشْرِكُونَ لِقَتْلِ الرَّسُولِ صَلَّى اللَّهُ عَلَيْهِ وَسَلَّمَ أَكْثَرَ مِنْ مَرَّةٍ، وَلَٰكِنَّ اللَّهَ كَانَ يُنَجِّيهِ مَعَ كُلِّ مُحَاوَلَةٍ. وَقَدْ رَمَى الْمُشْرِكُونَ أَيْضًا عَلَى الرَّسُولِ الْحِجَارَةَ بِهَدَفِ إِرْغَامِهِ عَلَى التَّوَقُّفِ عَنِ الدَّعْوَةِ. وَرَافَقَ ذَٰلِكَ الِاسْتِهْزَاءُ وَالسُّخْرِيَةُ مِنَ الرَّسُولِ وَتَوْجِيهُ الِاتِّهَامَاتِ الْبَاطِلَةِ لَهُ كَـالسِّحْرِ وَالْكِهَانَةِ، كَمَا قَامُوا بِتَكْذِيبِهِ أَثْنَاءَ دَعْوَتِهِمْ لِلْإِسْلَامِ.</p>
   <h2>لَيْلَةُ الْإِسْرَاءِ وَالْمِعْرَاجِ </h2>
   <p>مُعْجِزَةُ الْإِسْرَاءِ وَالْمِعْرَاجِ مِنْ أَشْهَرِ الْمُعْجِزَاتِ الَّتِي حَدَثَتْ مَعَ الرَّسُولِ مُحَمَّدٍ صَلَّى اللَّهُ عَلَيْهِ وَسَلَّمَ، حَيْثُ أَكْرَمَ اللَّهُ تَعَالَى نَبِيَّهُ فِي تِلْكَ اللَّيْلَةِ بَعْدَ «عَامِ الْحُزْنِ» وَبَعْدَ الْأَذَى الشَّدِيدِ الَّذِي لَاقَاهُ الرَّسُولُ مِنَ الْمُشْرِكِينَ، وَالَّتِي يُرَجِّحُ أَنَّهَا كَانَتْ فِي لَيْلَةِ السَّابِعِ وَالْعِشْرِينَ مِنْ شَهْرِ رَجَبٍ فِي الْعَامِ الْعَاشِرِ مِنَ الْبِعْثَةِ النَّبَوِيَّةِ. أَسْرَى اللَّهُ تَعَالَى بِنَبِيِّهِ مِنَ الْمَسْجِدِ الْحَرَامِ فِي مَكَّةَ إِلَى الْمَسْجِدِ الْأَقْصَى فِي بَيْتِ الْمَقْدِسِ، رَاكِبًا عَلَى دَابَّةٍ تُسَمَّى الْبُرَاقَ، بِصُحْبَةِ جِبْرِيلَ عَلَيْهِ السَّلَامُ. ثُمَّ أُعْرِجَ بِهِ إِلَى السَّمَاءِ السَّابِعَةِ، وَبَعْدَهَا رُفِعَ إِلَى سِدْرَةِ الْمُنْتَهَى وَإِلَى الْبَيْتِ الْمَعْمُورِ.</p>
   
   <h2>الْأَذَى وَالتَّعْذِيبُ الَّذِي تَعَرَّضَ لَهُ الصَّحَابَةُ</h2>
   <p> ظَلَّ الرَّسُولُ صَلَّى اللَّهُ عَلَيْهِ وَسَلَّمَ يَدْعُو النَّاسَ فِي مَكَّةَ سِرًّا وَجَهْرًا، وَكَانَ الرَّسُولُ يُقِيمُ فِي مَكَّةَ فِي حِمَايَةِ عَمِّهِ أَبِي طَالِبٍ. وَلَٰكِنَّ الصَّحَابَةَ تَعَرَّضُوا لِلتَّعْذِيبِ وَالِاضْطِهَادِ الشَّدِيدِ مِنْ قِبَلِ قُرَيْشٍ. وَرُغْمَ كُلِّ الْعَذَابِ الَّذِي تَعَرَّضُوا لَهُ، ظَلُّوا صَابِرِينَ ثَابِتِينَ عَلَى دِينِهِمْ، أَمْثَالَ: بِلَالِ بْنِ رَبَاحٍ، وَالزُّبَيْرِ بْنِ الْعَوَّامِ، وَعَمَّارِ بْنِ يَاسِرٍ وَأُمِّهِ سُمَيَّةَ رَضِيَ اللَّهُ عَنْهُمْ أَجْمَعِينَ.</p>
<h2>الهِجْرَةٌ إِلَى الْحَبَشَةِ</h2>
        <div class="avatar">
            <img src="uploads/habasha.png" alt="Avatar d'Omar" style="width: 50%; height: 50%; object-fit: cover; border-radius: 10%;">
        </div>
   
<h3>أَسْبَابُ هِجْرَةٍ إِلَى الْحَبَشَةِ</h3>
<p> بَذَلَتْ قُرَيْشٌ كُلَّ الْجُهُودِ لِإِيقَافِ انْتِشَارِ دَعْوَةٍ مُحَمَّدِيَّةٍ، وَبِسَبَبِ اسْتِمْرَارِ الرَّسُولِ وَالصَّحَابَةِ رِضْوَانُ اللَّهِ عَلَيْهِمْ فِي نَشْرِ إِسْلَامٍ، بَدَأَتْ قُرَيْشٌ بِتَعْذِيبِ مُسْلِمِينَ أَشَدَّ عَذَابٍ. وَلَٰكِنْ جَاءَ الْإِذْنُ الْإِلَٰهِيُّ بِهِجْرَتِهِمْ مِنْ مَكَّةَ، بِهَدَفِ الْحِفَاظِ عَلَى دِينِهِمْ وَعَلَى الدَّعْوَةِ مِنْ ضَيَاعٍ.
</p>
<h3>هِجْرَةٌ أُولَى إِلَى الْحَبَشَةِ</h3>
<p>هَاجَرَ بَعْضُ مُسْلِمِينَ مِنْ مَكَّةَ إِلَىٰ بِلَادِ حَبَشَةٍ بَعْدَ تَعْذِيبٍ تَعَرَّضُوا لَهُ مِنْ قِبَلِ قُرَيْشٍ فِي مَكَّةَ، بِاقْتِرَاحٍ مِنَ الرَّسُولِ صَلَّى اللَّهُ عَلَيْهِ وَسَلَّمَ فِي سَنَةٍ خَامِسَةٍ مِنَ الْبِعْثَةِ، لِأَنَّ فِيهَا مَلِكًا عَادِلًا لَا يَقْبَلُ ظُلْمًا عَلَىٰ أَحَدٍ. وَكَانَ عَدَدُ مُهَاجِرِينَ فِيهَا عَشَرَةَ رِجَالٍ وَأَرْبَعَ نِسْوَةٍ.</p>
<h3>هِجْرَةٌ ثَانِيَةٌ إِلَى الْحَبَشَةِ</h3>
<p>اقْتَرَحَ الرَّسُولُ صَلَّى اللَّهُ عَلَيْهِ وَسَلَّمَ عَلَىٰ مُؤْمِنِينَ هِجْرَةً مُجَدَّدًا إِلَى الْحَبَشَةِ، بَعْدَ اشْتِدَادِ عَذَابٍ عَلَى الْمُسْلِمِينَ مِنْ قُرَيْشٍ. فَهَاجَرَ حِينَئِذٍ مِنَ الرِّجَالِ ثَلَاثَةٌ وَثَمَانُونَ رَجُلًا، وَمِنَ النِّسَاءِ ثَمَانِي عَشْرَةَ أَوْ تِسْعَ عَشْرَةَ امْرَأَةً.</p>

<h3>نَتَائِجُ هِجْرَةٍ إِلَى الْحَبَشَةِ</h3>
<p>مِنْ أَبْرَزِ نَتَائِجَ هِجْرَةِ مُسْلِمِينَ إِلَى الْحَبَشَةِ كَانَتْ نَشْرَ دِينٍ إِسْلَامِيٍّ فِي مَكَانٍ خَارِجَ مَكَّةَ. كَمَا سَاعَدَتْهُمْ عَلَى الْمُحَافَظَةِ عَلَىٰ دِينِهِمْ وَالِامْتِسَاكِ بِهِ أَكْثَرَ، وَالِابْتِعَادِ عَنْ ظُلْمٍ كَانُوا يُعَانُونَ مِنْهُ فِي مَكَّةَ.</p>

    <h2>الْهِجْرَةُ إِلَى الْمَدِينَةِ الْمُنَوَّرَةِ</h2>
      
        <div class="avatar">
            <img src="uploads/hijra.png" alt="Avatar d'Omar" style="width: 50%; height: 50%; object-fit: cover; border-radius: 10%;">
        </div>
   
   
    <p>قَرَّرَ الرَّسُولُ صَلَّى اللَّهُ عَلَيْهِ وَسَلَّمَ الْهِجْرَةَ مِنْ مَكَّةَ إِلَى الْمَدِينَةِ الْمُنَوَّرَةِ بِرِفْقَةِ أَبِي بَكْرٍ الصِّدِّيقِ. وَاخْتَارَ النَّبِيُّ صَلَّى اللَّهُ عَلَيْهِ وَسَلَّمَ طَرِيقًا مُعَاكِسَةً لِكَيْ لَا يَعْثُرَ عَلَيْهِ الْمُشْرِكُونَ، وَنَزَلَ فِي غَارِ ثَوْرٍ ، وَفِي نَفْسِ الْوَقْتِ خَرَجَ الْمُشْرِكُونَ لِلْبَحْثِ عَنِ الرَّسُولِ، وَوَصَلُوا إِلَى الْغَارِ، فَقَامَتِ عَنْكَبُوتٌ بِنَسْجِ خُيُوطِهَا عَلَى وَاجِهَةِ الْغَارِ بِأَمْرٍ مِنَ اللَّهِ تَعَالَىٰ. وَبِذَٰلِكَ لَمْ يَتَمَكَّنِ الْمُشْرِكُونَ مِنَ الْعُثُورِ عَلَى الرَّسُولِ صَلَّى اللَّهُ عَلَيْهِ وَسَلَّمَ.

وَوَصَلَ الرَّسُولُ صَلَّى اللَّهُ عَلَيْهِ وَسَلَّمَ وَصَاحِبُهُ أَبُو بَكْرٍ الصِّدِّيقُ رَضِيَ اللَّهُ عَنْهُ إِلَى الْمَدِينَةِ الْمُنَوَّرَةِ فِي الثَّانِي عَشَرَ مِنْ رَبِيعٍ الْأَوَّلِ، مِنَ السَّنَةِ الْأُولَىٰ لِلْهِجْرَةِ النَّبَوِيَّةِ، وَاسْتَقْبَلَهُمُ الْأَنْصَارُ بِفَرَحٍ عَظِيمٍ وَتََرْحَابٍ كَبِيرٍ..</p>

<h3>بِنَاءُ مَسَاجِدَ فِي الْمَدِينَةِ الْمُنَوَّرَةِ</h3>


<p>

مَسْجِدُ قُبَاءٍ بَعْدَ هِجْرَةِ الرَّسُولِ إِلَى الْمَدِينَةِ، أَمَرَ بِبِنَاءِ مَسْجِدٍ فِي قُبَاءَ، وَشَارَكَ الرَّسُولُ صَلَّى اللَّهُ عَلَيْهِ وَسَلَّمَ فِي بِنَائِهِ. وَيُعْتَبَرُ أَوَّلَ مَسْجِدٍ بُنِيَ فِي الْإِسْلَامِ. وَقَدْ بُنِيَ عَلَى الْأَرْضِ الَّتِي اسْتَقَرَّتْ عَلَيْهَا نَاقَةُ النَّبِيِّ صَلَّى اللَّهُ عَلَيْهِ وَسَلَّمَ عِنْدَ وُصُولِهِ إِلَى الْمَدِينَةِ قَادِمًا مِنْ مَكَّةَ.
</p>
<p>
الْمَسْجِدُ النَّبَوِيُّ الشَّرِيفُ الْمَسْجِدُ النَّبَوِيُّ ثَانِيَ مَسْجِدٍ بُنِيَ فِي الْإِسْلَامِ، وَهُوَ الْمَسْجِدُ الَّذِي بَنَاهُ الرَّسُولُ مُحَمَّدٌ صَلَّى اللَّهُ عَلَيْهِ وَسَلَّمَ مَعَ أَصْحَابِهِ فِي الْمَدِينَةِ الْمُنَوَّرَةِ بَعْدَ هِجْرَتِهِ إِلَيْهَا، وَبَعْدَ بِنَاءِ مَسْجِدِ قُبَاءَ.
</p>

<p>
مُجْتَمَعُ الْمَدِينَةِ الْمُنَوَّرَةِ كَانَتِ الْمَدِينَةُ قَبْلَ هِجْرَةِ الْمُسْلِمِينَ إِلَيْهَا تَضُمُّ عَدَدًا مِنَ فِئَاتٍ، وَهُمْ: قَبَائِلُ الْأَوْسِ وَالْخَزْرَجِ، وَلُقِّبُوا بِـالْأَنْصَارِ (بَعْدَ الْهِجْرَةِ)، حَيْثُ نَصَرُوا الرَّسُولَ وَأَصْحَابَهُ مِنَ الْمُهَاجِرِينَ. كَمَا ضَمَّتِ الْمَدِينَةُ قَبَائِلَ يَهُودٌ (بَنُو قُرَيْظَةَ - بَنُو قَيْنُقَاعَ - بَنُو النَّضِيرِ - غَيْرُهُمْ). وَبِذَلِكَ ضَمَّ مُجْتَمَعُ الْمَدِينَةِ الْمُنَوَّرَةِ بَعْدَ الْهِجْرَةِ: الْمُسْلِمِينَ (الْأَنْصَارِ وَالْمُهَاجِرِينَ) وَالْيَهُودَ.
</p>
<p>
قِيَادَةُ مُجْتَمَعٍ مُسْلِمٍ فِي الْمَدِينَةِ الْمُنَوَّرَةِ تَمَيَّزَتْ قِيَادَةُ النَّبِيِّ صَلَّى اللَّهُ عَلَيْهِ وَسَلَّمَ لِلْمُجْتَمَعِ الْمُسْلِمِ بِـحِكْمَةٍ وَدِقَّةٍ. وَحَرِصَ عَلَىٰ تَطْبِيقِ مَبْدَأِ شُورَى مَعَ الصَّحَابَةِ فِي مُخْتَلِفِ الْمَوَاقِفِ. وَعُرِفَ الرَّسُولُ بِـأَخْلَاقٍ رَفِيعَةٍ وَحُسْنِ تَعَامُلٍ مَعَ النَّاسِ. وَظَهَرَتْ مَهَارَاتُ الرَّسُولِ فِي قِيَادَةٍ أَثْنَاءَ وُجُودِهِ فِي الْمَدِينَةِ، حَيْثُ عَمِلَ عَلَى مُؤَاخَاةٍ بَيْنَ الْمُهَاجِرِينَ وَالْأَنْصَارِ وَتَقْرِيبٍ بَيْنَهُمْ، وَتَعْلِيمِهِمْ أَخْلَاقٍ وَشَرَائِعَ إِسْلَامٍ، وَالْمُحَافَظَةِ عَلَىٰ حُقُوقِ يَهُودٍ عَبْرَ وِثِيقَةِ الْمَدِينَةِ.
</p>
<p>
مُؤَاخَاةٌ بَيْنَ الْمُهَاجِرِينَ وَالْأَنْصَارِ قَامَ الرَّسُولُ صَلَّى اللَّهُ عَلَيْهِ وَسَلَّمَ بِـمُؤَاخَاةٍ بَيْنَ الْمُهَاجِرِينَ وَالْأَنْصَارِ بَعْدَ هِجْرَتِهِ إِلَى الْمَدِينَةِ. حَيْثُ قَدَّمَ الْأَنْصَارُ سَكَنًا وَطَعَامًا لِلْمُهَاجِرِينَ، وَشَارَكُوهُمْ أَمْوَالًا مِنْ أَجْلِ مُسَاعَدَةٍ لَهُمْ بَعْدَ هِجْرَةٍ. فَآخَىٰ الرَّسُولُ بَيْنَ أَبِي بَكْرٍ وَعُمَرَ، وَبَيْنَ عُثْمَانَ وَعَبْدِ الرَّحْمَنِ بْنِ عَوْفٍ، وَبَيْنَ عُبَيْدَةَ بْنِ الْحَارِثِ وَبِلَالٍ، وَبَيْنَ عَلِيٍّ وَنَفْسِهِ صَلَّى اللَّهُ عَلَيْهِ وَسَلَّمَ، وَغَيْرِهِمْ. وَكَانَ الْقَصْدُ مِنْهَا تَأْسِيسُ نِظَامٍ اجْتِمَاعِيٍّ يُلْغِي فَوَارِقَ بَيْنَ أَفْرَادِ الْمُجْتَمَعِ، وَيَسْتَبْدِلُهَا بِرَوَابِطَ جَدِيدَةٍ تُغَيِّرُ طَرِيقَةَ حَيَاةٍ لِلْمُسْلِمِينَ.
</p>
<p>
وِثِيقَةُ الْمَدِينَةِ الْمُنَوَّرَةِ كَتَبَ الرَّسُولُ صَلَّى اللَّهُ عَلَيْهِ وَسَلَّمَ قَبْلَ مَعْرَكَةِ بَدْرٍ الْكُبْرَىٰ وِثِيقَةً بَيْنَ الْمُهَاجِرِينَ وَالْأَنْصَارِ وَبَيْنَ يَهُودٍ. شَمَلَتِ الِاتِّفَاقِيَّةُ عَدَدًا مِنَ بُنُودٍ تَحْفَظُ حُقُوقًا وَوَاجِبَاتٍ لِلْجَمِيعِ، بِهَدَفِ تَنْظِيمِ عَلَاقَةٍ بَيْنَ سُكَّانِ الْمَدِينَةِ.</p>
    <h2>مُلَخَّصُ أَحْدَاثِ السِّيْرَةِ النَّبَوِيَّةِ بَعْدَ الْهِجْرَةِ</h2>
    <p>أَوْكَلَ اللَّهُ تَعَالَى مَهَمَّةَ هِدَايَةِ الْبَشَرِيَّةِ إِلَى مُحَمَّدٍ صَلَّى اللَّهُ عَلَيْهِ وَسَلَّمَ، وَنَقْلِهَا مِنْ عِبَادَةِ الْحِجَارَةِ وَالْأَصْنَامِ إِلَى التَّوْحِيدِ وَالْإِيمَانِ بِاللَّهِ تَعَالَى. وَعَمِلَ الرَّسُولُ صَلَّى اللَّهُ عَلَيْهِ وَسَلَّمَ عَلَى تَوْحِيدِ وَمُؤَاخَاةِ جَمِيعِ الْمُسْلِمِينَ.</p>

    <h2>وَفَاةُ الرَّسُولِ صَلَّى اللَّهُ عَلَيْهِ وَسَلَّمَ</h2>
    <div class="quote">
        <p>تُوُفِّيَ النَّبِيُّ صَلَّى اللَّهُ عَلَيْهِ وَسَلَّمَ، يَوْمَ الْإِثْنَيْنِ الثَّانِيَ عَشَرَ مِنْ رَبِيعٍ الْأَوَّلِ مِنَ السَّنَةِ الْحَادِيَةَ عَشْرَةَ لِلْهِجْرَةِ، فِي الْمَدِينَةِ الْمُنَوَّرَةِ. وَقَدْ تُوُفِّيَ النَّبِيُّ صَلَّى اللَّهُ عَلَيْهِ وَسَلَّمَ وَعُمْرُهُ ثَلَاثَةٌ وَسِتُّونَ عَامًا، وَقَدْ أَوْصَى الرَّسُولُ قَبْلَ وَفَاتِهِ بِالصَّلَاةِ وَالْإِحْسَانِ.</p>
    </div>
</div>

 <!-- Contenu français (traduction du texte arabe original) -->
<div id="content-fr">
    <h1>La Noble Biographie du Prophète</h1>
    <p>La situation des Arabes à l'époque préislamique (Jahiliyya) avant l'Islam était déplorable, car de nombreuses coutumes blâmables et pratiques odieuses s'étaient répandues parmi les membres de la société, telles que le commerce des esclaves, l'adultère et le traitement dégradant des femmes. C'est alors qu'Allah envoya le Messager Muhammad (paix et bénédictions d'Allah sur lui) pour propager le message dont Allah l'avait chargé. Il eut le mérite de guider la communauté et de la faire passer de la mécréance et de l'asservissement à l'Islam.</p>
    <p>La prédication traversa de nombreuses étapes, secrètes puis publiques. Le Messager (paix et bénédictions d'Allah sur lui) subit des persécutions jusqu'à émigrer de La Mecque, son lieu de naissance. Mais cela ne fit que renforcer sa détermination. Il propagea le message hors de La Mecque, et de nombreuses tribus arabes embrassèrent alors l'Islam. Il rendit ensuite l'âme à Médine, laissant à la communauté islamique sa précieuse Sunna et d'immenses recommandations pour l'humanité.</p>

    <h2>La Naissance du Messager Muhammad (paix et bénédictions d'Allah sur lui)</h2>
    <p>Le Messager Muhammad (paix et bénédictions d'Allah sur lui), le maître des envoyés et le sceau des prophètes, naquit à La Mecque, dans le quartier d'Abu Talib, le lundi douze du mois de Rabi' al-Awwal. Cela correspond au vingt-deux avril de l'an 571 après J.-C., soit cinquante jours après l'année de l'Éléphant.</p>

    <h2>Avant l'envoi du Prophète Muhammad (paix et bénédictions d'Allah sur lui)</h2>
    <h3>La Guerre de Fijar (Guerre impie)</h3>
    <p>La guerre de Fijar fut l'une des guerres des Arabes à l'époque préislamique, opposant la tribu de Kinanah aux tribus de Qays 'Aylan. Elle fut nommée "guerre impie" car elle eut lieu durant les mois sacrés (le mois de Rajab) durant lesquels Allah avait interdit les combats.</p>
    <h3>Le Pacte de Fudul (Pacte des vertueux)</h3>
    <p>Il s'agit d'un traité ou d'un accord conclu avant l'envoi du Prophète (paix et bénédictions d'Allah sur lui) entre les Banu Hashim, les Banu Taym et les Banu Zuhrah, par lequel ils s'engageaient à défendre toute personne opprimée à La Mecque. Le Prophète (paix et bénédictions d'Allah sur lui) y assista à l'âge de vingt ans.</p>
    <h3>La reconstruction de la Kaaba et l'arbitrage</h3>
    <p>Les Quraysh décidèrent de reconstruire la Kaaba après la fissuration de ses murs, et convinrent de n'utiliser que de l'argent licite. Pendant la reconstruction, ils assignèrent à chaque tribu la construction d'une partie. Chaque tribu rassembla ses pierres séparément et ils construisirent ensemble.</p>
    <p>Lorsqu'ils arrivèrent à l'étape de la pose de la Pierre Noire, ils se disputèrent sur qui aurait l'honneur de la placer. Le choix se porta sur le Messager (paix et bénédictions d'Allah sur lui) pour arbitrer le différend. Il demanda un manteau, y plaça la pierre au centre, et demanda aux chefs des tribus en conflit de tenir ensemble les extrémités du manteau et de le soulever. Lorsqu'ils l'eurent amené à son emplacement, le Messager la prit de sa main et la plaça. Ainsi le conflit fut résolu.</p>

    <h2>La descente de la Révélation sur le Messager (paix et bénédictions d'Allah sur lui)</h2>
    <div class="avatar">
        <img src="uploads/hira.png" alt="Avatar" style="width: 50%; height: 50%; object-fit: cover; border-radius: 10%;">
    </div>

    <p>Les formes de descente de la révélation sur le Messager (paix et bénédictions d'Allah sur lui) furent multiples durant la biographie prophétique. Au début, la révélation venait en songe, puis sous l'apparence d'un homme, puis sous celle d'anges, comme cela eut lieu lors de la nuit de l'Isra et du Mi'raj.</p>

    <h2>Les étapes de la prédication islamique</h2>
    <h3>La prédication secrète</h3>
    <p>Le Messager (paix et bénédictions d'Allah sur lui) commença par la prédication secrète qu'Allah lui avait ordonnée. Il commença par inviter les membres de sa famille, puis les plus proches parents. Cela se fit à l'insu des Quraysh, et quarante personnes embrassèrent alors l'Islam.</p>

    <p>Parmi les premiers à croire en lui furent son épouse Khadija bint Khuwaylid, son ami Abu Bakr as-Siddiq, et son cousin Ali ibn Abi Talib. Le Messager (paix et bénédictions d'Allah sur lui) poursuivit la prédication en secret pendant trois ans, jusqu'à ce qu'Allah l'autorise à la rendre publique.</p>
    <h3>La prédication publique</h3>
    <p>La prédication passa de la phase secrète à la phase publique. Lorsque les Quraysh eurent connaissance de sa propagation, ils s'y opposèrent par tous les moyens, avec des menaces, des persécutions et des coups portés au Messager (paix et bénédictions d'Allah sur lui), mais le Messager ne tint pas compte de leurs actes et continua à propager le message.</p>

    <h2>Le départ du Messager pour Taïf</h2>
    <p>Après la mort de Khadija bint Khuwaylid, l'épouse du Messager, et d'Abu Talib, son oncle, à La Mecque, le Messager (paix et bénédictions d'Allah sur lui) commença à propager le message hors de La Mecque. Il se rendit à Taïf en compagnie de Zayd ibn Haritha, au mois de Shawwal de la dixième année de la prophétie, et œuvra à y propager l'Islam, mais ils le repoussèrent, rejetèrent son appel et le lapidèrent.</p>
    <h2>Les souffrances du Messager dans la transmission du message</h2>
    <p>Le Messager (paix et bénédictions d'Allah sur lui) souffrit des Quraysh et de leurs persécutions durant l'appel à la religion de l'Islam. Les associateurs lui infligèrent diverses formes de torts. Ils projetèrent de le tuer à plusieurs reprises, mais Allah le sauva à chaque tentative. Les associateurs le lapidèrent également pour tenter de le contraindre à cesser sa prédication. Cela s'accompagna de moqueries, de sarcasmes et d'accusations mensongères de sorcellerie et de divination. Ils le traitèrent également de menteur lors de leurs appels à l'Islam.</p>
    <h2>La nuit de l'Isra et du Mi'raj</h2>
    <p>Le miracle de l'Isra et du Mi'raj est l'un des miracles les plus célèbres arrivés au Messager Muhammad (paix et bénédictions d'Allah sur lui). Allah Tout-Puissant honora Son prophète cette nuit-là après "l'année de la tristesse" et après les persécutions intenses qu'il avait subies de la part des associateurs. On pense qu'elle eut lieu le vingt-sept du mois de Rajab, la dixième année de la mission prophétique. Allah fit voyager Son prophète de la Mosquée Sacrée de La Mecque à la Mosquée Al-Aqsa à Jérusalem, monté sur une monture appelée Al-Buraq, en compagnie de Gabriel (paix sur lui). Puis il fut élevé jusqu'au septième ciel, puis jusqu'au Lotus de la limite et à la Maison peuplée.</p>

    <h2>Les persécutions et tortures subies par les Compagnons</h2>
    <p>Le Messager (paix et bénédictions d'Allah sur lui) continua d'appeler les gens à La Mecque, en secret et en public, protégé par son oncle Abu Talib. Mais les Compagnons subirent de graves tortures et persécutions de la part des Quraysh. Malgré toutes les souffrances endurées, ils restèrent patients et fermes dans leur religion, comme Bilal ibn Rabah, Az-Zubayr ibn al-'Awwam, 'Ammar ibn Yasir et sa mère Sumayya (qu'Allah soit satisfait d'eux tous).</p>
    <h2>L'Émigration en Abyssinie</h2>
    <div class="avatar">
        <img src="uploads/habasha.png" alt="Avatar" style="width: 50%; height: 50%; object-fit: cover; border-radius: 10%;">
    </div>

    <h3>Les raisons de l'émigration en Abyssinie</h3>
    <p>Les Quraysh déployèrent tous leurs efforts pour arrêter la propagation de l'appel muhammadien. En raison de la persistance du Messager et des Compagnons (qu'Allu soit satisfait d'eux) à propager l'Islam, les Quraysh commencèrent à torturer les musulmans d'une manière atroce. Mais la permission divine vint pour qu'ils émigrent de La Mecque, afin de préserver leur religion et d'éviter que l'appel ne soit perdu.</p>
    <h3>La première émigration en Abyssinie</h3>
    <p>Certains musulmans émigrèrent de La Mecque vers l'Abyssinie après avoir été torturés par les Quraysh, sur proposition du Messager (paix et bénédictions d'Allah sur lui) la cinquième année de la prophétie, car il y régnait un roi juste qui n'acceptait l'injustice envers personne. Le nombre d'émigrés était de dix hommes et quatre femmes.</p>
    <h3>La seconde émigration en Abyssinie</h3>
    <p>Le Messager (paix et bénédictions d'Allah sur lui) proposa aux croyants une nouvelle émigration vers l'Abyssinie, après l'intensification des tortures infligées par les Quraysh aux musulmans. Quatre-vingt-trois hommes et dix-huit ou dix-neuf femmes émigrèrent alors.</p>

    <h3>Les résultats de l'émigration en Abyssinie</h3>
    <p>Parmi les résultats les plus marquants de l'émigration des musulmans en Abyssinie, on trouve la propagation de la religion islamique dans un lieu situé hors de La Mecque. Cela les aida également à mieux préserver leur religion et à s'y attacher davantage, et à s'éloigner de l'injustice dont ils souffraient à La Mecque.</p>

    <h2>L'Émigration vers Médine Al-Munawwara</h2>

    <div class="avatar">
        <img src="uploads/hijra.png" alt="Avatar" style="width: 50%; height: 50%; object-fit: cover; border-radius: 10%;">
    </div>

    <p>Le Messager (paix et bénédictions d'Allah sur lui) décida d'émigrer de La Mecque à Médine Al-Munawwara en compagnie d'Abu Bakr as-Siddiq. Le Prophète (paix et bénédictions d'Allah sur lui) choisit un chemin opposé pour ne pas être découvert par les associateurs, et se rendit à la grotte de Thawr. Pendant ce temps, les associateurs partirent à la recherche du Messager et arrivèrent jusqu'à la grotte. Une araignée tissa sa toile à l'entrée de la grotte par ordre d'Allah Tout-Puissant. Ainsi, les associateurs ne purent trouver le Messager (paix et bénédictions d'Allah sur lui).

Le Messager (paix et bénédictions d'Allah sur lui) et son compagnon Abu Bakr as-Siddiq (qu'Allah soit satisfait de lui) arrivèrent à Médine Al-Munawwara le douze de Rabi' al-Awwal, de la première année de l'Hégire prophétique, et les Ansar les accueillirent avec une grande joie et un immense enthousiasme.</p>

    <h3>La construction de mosquées à Médine Al-Munawwara</h3>

    <p>Mosquée de Quba : Après l'émigration du Messager à Médine, il ordonna la construction d'une mosquée à Quba, et le Messager (paix et bénédictions d'Allah sur lui) participa à sa construction. Elle est considérée comme la première mosquée bâtie en Islam. Elle fut construite sur l'endroit où s'était arrêtée la chamelle du Prophète (paix et bénédictions d'Allah sur lui) à son arrivée à Médine en provenance de La Mecque.</p>
    <p>La Mosquée Prophétique : La Mosquée Prophétique est la deuxième mosquée bâtie en Islam. C'est la mosquée que le Messager Muhammad (paix et bénédictions d'Allah sur lui) construisit avec ses compagnons à Médine Al-Munawwara après son émigration, et après la construction de la mosquée de Quba.</p>

    <p>La société de Médine Al-Munawwara : Avant l'émigration des musulmans, Médine comptait plusieurs groupes : les tribus d'Al-Aws et d'Al-Khazraj, qui furent surnommées les Ansar (les Auxiliaires) après l'Hégire, car ils secoururent le Messager et ses compagnons parmi les Émigrés. Médine comprenait également des tribus juives (Banu Qurayza, Banu Qaynuqa', Banu An-Nadir, et d'autres). Ainsi, la société de Médine Al-Munawwara après l'Hégire comprenait : les musulmans (Ansar et Émigrés) et les juifs.</p>
    <p>La direction de la société musulmane à Médine Al-Munawwara : La direction du Prophète (paix et bénédictions d'Allah sur lui) pour la société musulmane se distingua par sa sagesse et sa précision. Il veilla à appliquer le principe de la consultation (Choura) avec les compagnons dans diverses situations. Le Messager était connu pour sa moralité élevée et sa bonne conduite avec les gens. Ses compétences de leadership apparurent durant son séjour à Médine, où il œuvra à établir une fraternité entre les Émigrés et les Ansar, à les rapprocher, à leur enseigner les règles et les lois de l'Islam, et à préserver les droits des juifs à travers le document appelé "Constitution de Médine".</p>
    <p>La fraternité entre les Émigrés et les Ansar : Le Messager (paix et bénédictions d'Allah sur lui) établit une fraternité entre les Émigrés et les Ansar après son émigration à Médine. Les Ansar offrirent un logement et de la nourriture aux Émigrés, et partagèrent leurs biens pour les aider après l'Hégire. Le Messager établit ainsi une fraternité entre Abu Bakr et 'Umar, entre 'Uthman et 'Abd ar-Rahman ibn 'Awf, entre 'Ubayda ibn al-Harith et Bilal, entre 'Ali et lui-même (paix et bénédictions d'Allah sur lui), et entre d'autres. Le but était d'établir un système social abolissant les différences entre les membres de la société et les remplaçant par de nouveaux liens changeant le mode de vie des musulmans.</p>
    <p>La Constitution de Médine Al-Munawwara : Le Messager (paix et bénédictions d'Allah sur lui) rédigea avant la grande bataille de Badr un document entre les Émigrés, les Ansar et les juifs. L'accord comprenait plusieurs clauses préservant les droits et les devoirs de tous, dans le but d'organiser les relations entre les habitants de Médine.</p>
    <h2>Résumé des événements de la Biographie Prophétique après l'Hégire</h2>
    <p>Allah Tout-Puissant confia à Muhammad (paix et bénédictions d'Allah sur lui) la mission de guider l'humanité et de la faire passer de l'adoration des pierres et des idoles à l'unicité divine et la foi en Allah. Le Messager (paix et bénédictions d'Allah sur lui) œuvra à unifier et à fraterniser tous les musulmans.</p>

    <h2>La mort du Messager (paix et bénédictions d'Allah sur lui)</h2>
    <div class="quote">
        <p>Le Prophète (paix et bénédictions d'Allah sur lui) mourut le lundi douze de Rabi' al-Awwal de la onzième année de l'Hégire, à Médine Al-Munawwara. Il mourut à l'âge de soixante-trois ans, et recommanda avant sa mort la prière et la bienfaisance.</p>
    </div>
</div>

    <!-- English content (hidden by default) -->
 <!-- English content (translated from the original Arabic text) -->
<div id="content-en">
    <h1>The Noble Biography of the Prophet</h1>
    <p>The condition of the Arabs during the pre-Islamic era (Jahiliyyah) before Islam was pitiable, as many blameworthy customs and ugly practices had spread among the members of society, such as the slave trade, adultery, and the demeaning treatment of women. Then Allah sent the Messenger Muhammad (peace and blessings of Allah be upon him) to spread the message with which Allah had entrusted him. He had the merit of guiding the nation and transferring it from disbelief and servitude to Islam.</p>
    <p>The call went through many stages, both secret and public. The Messenger (peace and blessings of Allah be upon him) was harmed until he emigrated from Mecca, his birthplace. But that only increased his determination. He spread the call outside Mecca, and many Arab tribes embraced Islam at that time. Then he passed away in Medina, leaving his fragrant Sunnah to the Islamic nation and great recommendations for humanity.</p>

    <h2>The Birth of the Messenger Muhammad (peace and blessings of Allah be upon him)</h2>
    <p>The Messenger Muhammad (peace and blessings of Allah be upon him), the master of the messengers and the seal of the prophets, was born in Mecca in the district of Abu Talib, on Monday the twelfth of the month of Rabi' al-Awwal. This corresponds to April 22nd, 571 AD, which was fifty days after the Year of the Elephant.</p>

    <h2>Before the Mission of Prophet Muhammad (peace and blessings of Allah be upon him)</h2>
    <h3>The Sacrilegious War (Harb al-Fijar)</h3>
    <p>The Sacrilegious War was one of the Arab wars during the pre-Islamic era, fought between the tribe of Kinanah and the tribes of Qais 'Ailan. It was named the "Sacrilegious War" because it took place during the sacred months (the month of Rajab) in which Allah had forbidden fighting.</p>
    <h3>The Alliance of Al-Fudul (Hilf al-Fudul)</h3>
    <p>This was a treaty or agreement made before the mission of the Messenger (peace and blessings of Allah be upon him) between Banu Hashim, Banu Taym, and Banu Zuhrah, in which they pledged to defend any oppressed person in Mecca. The Messenger (peace and blessings of Allah be upon him) witnessed it at the age of twenty.</p>
    <h3>The Reconstruction of the Kaaba and the Arbitration Issue</h3>
    <p>The Quraysh decided to rebuild the Kaaba after its walls cracked, and they agreed not to use any money except what was lawfully earned. During the reconstruction, they assigned each tribe to build a part. Each tribe gathered its stones separately and they built together.</p>
  <p>When they reached the stage of placing the Black Stone, they disagreed over who would have the honor of placing it in its position. The choice fell upon the Messenger (peace and blessings of Allah be upon him) to arbitrate between them. After that, the Messenger (peace and blessings of Allah be upon him) asked for a garment, placed the stone in its center, and asked the disputing tribal leaders to all hold the edges of the garment. He told them to lift it, and when they brought it to its spot, the Messenger took it with his hand and placed it in its position. Thus, the dispute among them was resolved.</p>

    <h2>The Descent of Revelation upon the Messenger (peace and blessings of Allah be upon him)</h2>
           <div class="avatar">
            <img src="uploads/hira.png" alt="Avatar" style="width: 50%; height: 50%; object-fit: cover; border-radius: 10%;">
        </div>
   
   
    <p>The forms of revelation's descent upon the Messenger (peace and blessings of Allah be upon him) were numerous during the Prophetic biography. Initially, revelation came to the Messenger in his dreams, then in the form of a man, then in the form of angels, as happened on the Night of Isra and Mi'raj.</p>

    <h2>The Stages of the Islamic Call (Da'wah)</h2>
    <h3>The Secret Call</h3>
    <p>The Messenger (peace and blessings of Allah be upon him) began with the secret call that Allah commanded him to undertake. He started by inviting the members of his household, then his closest relatives. This was done without the knowledge of the Quraysh, and forty people embraced Islam at that time.</p>
    
    <p>Among the first to believe in him were his wife Khadijah bint Khuwaylid, his friend Abu Bakr as-Siddiq, and his cousin Ali ibn Abi Talib. The Messenger (peace and blessings of Allah be upon him) continued the secret call for three years, until Allah permitted him to proclaim it openly.
    </p>
    <h3>The Public Call</h3>
    <p>The call moved from the secret stage to the public stage. After the Quraysh learned that the call was spreading, they confronted it with every means, including threats, harm, and beating the Messenger (peace and blessings of Allah be upon him), but the Messenger did not heed their actions and continued to spread the call.</p>

<h2>The Messenger's Departure to Ta'if</h2>
      <p>After the death of Lady Khadijah bint Khuwaylid, the wife of the Messenger, and Abu Talib, the Messenger's uncle, in Mecca, the Messenger (peace and blessings of Allah be upon him) began spreading the call outside Mecca. He went to Ta'if accompanied by Zayd ibn Harithah, in the month of Shawwal of the tenth year of the Prophetic mission, and worked to spread Islam there. However, they rejected him, refused his call, and stoned him. </p>
   <h2>The Suffering of the Messenger in Conveying the Message</h2>
   <p>The Messenger (peace and blessings of Allah be upon him) suffered from the Quraysh and their harm during the call to the religion of Islam. The polytheists subjected him to various forms of harm. They plotted to kill the Messenger (peace and blessings of Allah be upon him) more than once, but Allah saved him from every attempt. The polytheists also threw stones at the Messenger to force him to stop his call. This was accompanied by mockery, ridicule of the Messenger, and false accusations of sorcery and soothsaying. They also called him a liar while he was inviting them to Islam.</p>
   <h2>The Night of Isra and Mi'raj</h2>
   <p>The miracle of Isra and Mi'raj is one of the most famous miracles that occurred with the Messenger Muhammad (peace and blessings of Allah be upon him), by which Allah Almighty honored His Prophet on that night after the "Year of Sorrow" and after the severe harm the Messenger had faced from the polytheists. It is thought to have been on the twenty-seventh night of Rajab in the tenth year of the Prophetic mission. Allah Almighty made His Prophet travel from the Sacred Mosque in Mecca to the Al-Aqsa Mosque in Jerusalem, riding on a creature called Al-Buraq, accompanied by Gabriel (peace be upon him). Then he was ascended through the seven heavens, then raised to the Lote Tree of the Utmost Boundary and to the Much-Frequented House.</p>
   
   <h2>The Harm and Torture Endured by the Companions</h2>
   <p> The Messenger (peace and blessings of Allah be upon him) continued to call people in Mecca, secretly and publicly, and he remained in Mecca under the protection of his uncle Abu Talib. However, the Companions were subjected to severe torture and persecution by the Quraysh. Despite all the suffering they endured, they remained patient and steadfast in their religion, such as Bilal ibn Rabah, Az-Zubayr ibn al-'Awwam, 'Ammar ibn Yasir, and his mother Sumayyah (may Allah be pleased with them all).</p>
<h2>The Emigration to Abyssinia (Ethiopia)</h2>
        <div class="avatar">
            <img src="uploads/habasha.png" alt="Avatar" style="width: 50%; height: 50%; object-fit: cover; border-radius: 10%;">
        </div>
   
<h3>Reasons for the Emigration to Abyssinia</h3>
<p> The Quraysh exerted every effort to stop the spread of the Muhammadan call. Because the Messenger and the Companions (may Allah be pleased with them) continued to spread Islam, the Quraysh began to torture the Muslims with severe torment. Then divine permission came for them to emigrate from Mecca, in order to preserve their religion and protect the call from being lost.
</p>
<h3>The First Emigration to Abyssinia</h3>
<p>Some Muslims emigrated from Mecca to Abyssinia after suffering torture from the Quraysh in Mecca, on a suggestion from the Messenger (peace and blessings of Allah be upon him) in the fifth year of the Prophetic mission, because there was a just king there who would not accept injustice against anyone. The number of emigrants was ten men and four women.</p>
<h3>The Second Emigration to Abyssinia</h3>
<p>The Messenger (peace and blessings of Allah be upon him) suggested to the believers a renewed emigration to Abyssinia, after the torture of the Muslims by the Quraysh intensified. So eighty-three men and eighteen or nineteen women emigrated at that time.</p>

<h3>Results of the Emigration to Abyssinia</h3>
<p>Among the most prominent results of the emigration of the Muslims to Abyssinia was the spread of the Islamic religion in a place outside Mecca. It also helped them preserve their religion and adhere to it more strongly, and to distance themselves from the oppression they had been suffering in Mecca.</p>

    <h2>The Emigration to Medina Al-Munawwarah</h2>
      
        <div class="avatar">
            <img src="uploads/hijra.png" alt="Avatar" style="width: 50%; height: 50%; object-fit: cover; border-radius: 10%;">
        </div>
   
   
    <p>The Messenger (peace and blessings of Allah be upon him) decided to emigrate from Mecca to Medina Al-Munawwarah accompanied by Abu Bakr as-Siddiq. The Prophet (peace and blessings of Allah be upon him) chose an opposite route so that the polytheists would not find him, and he went into the Cave of Thawr. At the same time, the polytheists went out searching for the Messenger and reached the cave. A spider spun its web at the entrance of the cave by the command of Allah Almighty. Thus, the polytheists could not find the Messenger (peace and blessings of Allah be upon him).

The Messenger (peace and blessings of Allah be upon him) and his companion Abu Bakr as-Siddiq (may Allah be pleased with him) arrived in Medina Al-Munawwarah on the twelfth of Rabi' al-Awwal, of the first year of the Prophetic Hijrah, and the Ansar (Helpers) received them with great joy and a warm welcome.</p>

<h3>Construction of Mosques in Medina Al-Munawwarah</h3>


<p>

Masjid Quba': After the Messenger's emigration to Medina, he ordered the construction of a mosque in Quba', and the Messenger (peace and blessings of Allah be upon him) participated in its construction. It is considered the first mosque built in Islam. It was built on the land where the Prophet's she-camel had stopped when he arrived in Medina coming from Mecca.
</p>
<p>
The Prophetic Mosque: The Prophetic Mosque is the second mosque built in Islam. It is the mosque that the Messenger Muhammad (peace and blessings of Allah be upon him) built with his companions in Medina Al-Munawwarah after his emigration there, and after the construction of Masjid Quba'.
</p>

<p>
Society of Medina Al-Munawwarah: Before the emigration of the Muslims to it, Medina comprised several groups: the tribes of Al-Aws and Al-Khazraj, who were called the Ansar (Helpers) after the Hijrah, because they supported the Messenger and his fellow Emigrants. Medina also included Jewish tribes (Banu Qurayzah - Banu Qaynuqa' - Banu an-Nadir - and others). Thus, the society of Medina Al-Munawwarah after the Hijrah included: the Muslims (the Ansar and the Emigrants) and the Jews.
</p>
<p>
Leadership of the Muslim Society in Medina Al-Munawwarah: The leadership of the Prophet (peace and blessings of Allah be upon him) over the Muslim society was distinguished by wisdom and precision. He was keen to apply the principle of consultation (Shura) with the Companions in various situations. The Messenger was known for his high morals and good dealings with people. The Messenger's leadership skills became evident during his time in Medina, as he worked to establish brotherhood between the Emigrants and the Ansar, to bring them closer together, to teach them the morals and laws of Islam, and to preserve the rights of the Jews through the document known as the Constitution of Medina.
</p>
<p>
Brotherhood between the Emigrants and the Ansar: The Messenger (peace and blessings of Allah be upon him) established a bond of brotherhood between the Emigrants and the Ansar after his emigration to Medina. The Ansar provided shelter and food for the Emigrants and shared their wealth with them to help them after the Hijrah. He established brotherhood between Abu Bakr and 'Umar, between 'Uthman and 'Abd ar-Rahman ibn 'Awf, between 'Ubaydah ibn al-Harith and Bilal, between 'Ali and himself (peace and blessings of Allah be upon him), and between others. The aim was to establish a social system that eliminates differences between members of society and replaces them with new bonds that change the way of life for Muslims.
</p>
<p>
The Constitution of Medina Al-Munawwarah: The Messenger (peace and blessings of Allah be upon him) wrote, before the great Battle of Badr, a document between the Emigrants, the Ansar, and the Jews. The agreement included a number of clauses preserving the rights and duties of all, with the aim of organizing the relationship between the inhabitants of Medina.</p>
    <h2>Summary of Events of the Prophetic Biography after the Hijrah</h2>
    <p>Allah Almighty entrusted Muhammad (peace and blessings of Allah be upon him) with the mission of guiding humanity and transferring it from the worship of stones and idols to monotheism and faith in Allah Almighty. The Messenger (peace and blessings of Allah be upon him) worked to unify and establish brotherhood among all Muslims.</p>

    <h2>The Death of the Messenger (peace and blessings of Allah be upon him)</h2>
    <div class="quote">
        <p>The Prophet (peace and blessings of Allah be upon him) passed away on Monday, the twelfth of Rabi' al-Awwal, of the eleventh year of the Hijrah, in Medina Al-Munawwarah. The Prophet (peace and blessings of Allah be upon him) died at the age of sixty-three, and before his death, he advised adherence to prayer and good conduct.</p>
    </div>
</div>
    

<footer>
    <p id="footerCreditAr">السيرة النبوية الشريفة - إعداد وتوثيق</p>
    <p id="footerSourceAr">🔗 المصدر: موقع الدكتور طارق السويدان</p>
    <div class="social-icons">
            <a href="https://simplsofts.com" target="_blank" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
            <a href="https://wa.me/212773370700" target="_blank" aria-label="Whatsapp"><i class="fab fa-whatsapp"></i></a>
            <a href="https://www.youtube.com/@OmarLetete" target="_blank" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
    </div>
    <p id="footerRightsAr">© 2026 Omary.SimplSofts.com - Designed with ❤️</p>
    <p id="footerKidAr">Site adapté aux enfants de 8 ans - Niveau CE2</p>
</footer>

<script>
    // Get content divs
    const contentAr = document.getElementById('content-ar');
    const contentFr = document.getElementById('content-fr');
    const contentEn = document.getElementById('content-en');
    
    // Get nav text spans
    const navTexts = document.querySelectorAll('.nav-text');
    
    // Footer elements
    const footerCredit = document.getElementById('footerCreditAr');
    const footerSource = document.getElementById('footerSourceAr');
    const footerRights = document.getElementById('footerRightsAr');
    const footerKid = document.getElementById('footerKidAr');
    
    // Navigation translations (for the text inside spans)
    const navTranslations = {
        ar: ['الرئيسية', 'التعلم', 'ألعاب', 'معرض', 'عني'],
        fr: ['Accueil', 'Apprentissage', 'Jeux', 'Galerie', 'À Propos'],
        en: ['Home', 'Learning', 'Games', 'Gallery', 'About']
    };
    
    // Footer translations
    const footerTranslations = {
        ar: {
            credit: 'السيرة النبوية الشريفة - إعداد وتوثيق',
            source: '🔗 المصدر: موقع الدكتور طارق السويدان',
            rights: '© 2025 Omary.SimplSofts.com - Designed with ❤️',
            kid: 'Site adapté aux enfants de 8 ans - Niveau CE2'
        },
        fr: {
            credit: 'La biographie du Prophète - Compilation et documentation',
            source: '🔗 Source: Site du Dr. Tariq Suwaidan',
            rights: '© 2025 Omary.SimplSofts.com - Conçu avec ❤️',
            kid: 'Site adapté aux enfants de 8 ans - Niveau CE2'
        },
        en: {
            credit: 'Prophetic Biography - Compilation & Documentation',
            source: '🔗 Source: Dr. Tariq Suwaidan\'s Website',
            rights: '© 2025 Omary.SimplSofts.com - Designed with ❤️',
            kid: 'Kid-friendly website - Age 8+ (CE2 Level)'
        }
    };
    
    // Set active language button style
    function setActiveLangButton(lang) {
        document.querySelectorAll('.lang-btn').forEach(btn => {
            if (btn.getAttribute('data-lang') === lang) {
                btn.classList.add('active');
            } else {
                btn.classList.remove('active');
            }
        });
    }
    
    // Change body direction based on language
    function setBodyDirection(lang) {
        const body = document.body;
        if (lang === 'ar') {
            body.dir = 'rtl';
            body.classList.remove('lang-en', 'lang-fr');
            body.classList.add('lang-ar');
        } else if (lang === 'fr') {
            body.dir = 'ltr';
            body.classList.remove('lang-ar', 'lang-en');
            body.classList.add('lang-fr');
        } else if (lang === 'en') {
            body.dir = 'ltr';
            body.classList.remove('lang-ar', 'lang-fr');
            body.classList.add('lang-en');
        }
    }
    
    // Switch language
    function switchLanguage(lang) {
        // Hide all content divs
        contentAr.style.display = 'none';
        contentFr.style.display = 'none';
        contentEn.style.display = 'none';
        
        // Show selected language content
        if (lang === 'ar') {
            contentAr.style.display = 'block';
        } else if (lang === 'fr') {
            contentFr.style.display = 'block';
        } else if (lang === 'en') {
            contentEn.style.display = 'block';
        }
        
        // Update navigation text (keep hrefs unchanged, just update span text)
        const navTextArray = navTranslations[lang];
        if (navTextArray) {
            navTexts.forEach((span, index) => {
                if (index < navTextArray.length) {
                    span.textContent = navTextArray[index];
                }
            });
        }
        
        // Update footer
        const footerTexts = footerTranslations[lang];
        if (footerTexts) {
            footerCredit.textContent = footerTexts.credit;
            footerSource.textContent = footerTexts.source;
            footerRights.textContent = footerTexts.rights;
            footerKid.textContent = footerTexts.kid;
        }
        
        // Update body direction
        setBodyDirection(lang);
        
        // Update active button
        setActiveLangButton(lang);
        
        // Store current language
        localStorage.setItem('preferredLanguage', lang);
    }
    
    // Add event listeners to language buttons
    document.querySelectorAll('.lang-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            const lang = btn.getAttribute('data-lang');
            switchLanguage(lang);
        });
    });
    
    // Check for saved language preference or default to Arabic
    const savedLang = localStorage.getItem('preferredLanguage');
    if (savedLang && (savedLang === 'ar' || savedLang === 'fr' || savedLang === 'en')) {
        switchLanguage(savedLang);
    } else {
        switchLanguage('ar'); // Default to Arabic
    }
</script>
</body>
</html>