<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ليه الرياض؟ - اكتشف جوهر العاصمة السعودية</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@100;200;300;400;500;600;700&family=Tajawal:wght@200;300;400;500;700;800;900&display=swap');

        :root {
            --color1: #fff4e3;
            --color2: #fdf4e4;
            --color3: #fce7cc;
            --color4: #AB7E50;
            --color7: #C8A06E;
            /* Kept for reference, but not used for backgrounds */
            --color5: #aea56d;
            /* Kept for reference, but not used for backgrounds */
            --color6: #255c46;
            /* Kept for reference, but not used for backgrounds */
            --dark-bg: var(--color1);
            /* Light background */
            --dark-text: #333333;
            /* Dark text for readability */
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'IBM Plex Sans Arabic', sans-serif;
        }

        body {
            background-color: var(--dark-bg);
            color: var(--dark-text);
            line-height: 1.6;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        /* رأس الموقع */
        header {
            background: linear-gradient(to right, var(--color6), var(--color5));
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease;
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--color3);
            text-decoration: none;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .logo span {
            color: var(--color4);
        }

        /* قائمة البرجر */
        .hamburger {
            display: none;
            flex-direction: column;
            cursor: pointer;
            padding: 5px;
            z-index: 1001;
        }

        .hamburger span {
            width: 25px;
            height: 3px;
            background-color: var(--color2);
            margin: 3px 0;
            transition: 0.3s;
            border-radius: 2px;
        }

        .hamburger.active span:nth-child(1) {
            transform: rotate(-45deg) translate(-5px, 6px);
        }

        .hamburger.active span:nth-child(2) {
            opacity: 0;
        }

        .hamburger.active span:nth-child(3) {
            transform: rotate(45deg) translate(-5px, -6px);
        }

        nav {
            transition: all 0.3s ease;
        }

        nav ul {
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        nav ul li {
            position: relative;
            text-align: center;
        }

        nav ul li a {
            color: var(--color2);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            padding: 8px 12px;
            border-radius: 4px;
            position: relative;
            overflow: hidden;
        }

        nav ul li a::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .dictionary-item p {
            color: var(--color1);
        }

        nav ul li a:hover::before {
            left: 100%;
        }

        nav ul li a:hover {
            color: var(--color4);
            background-color: rgba(255, 255, 255, 0.1);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .language-switcher {
            display: flex;
            align-items: center;
        }

        .language-switcher select {
            background-color: var(--color6);
            color: var(--color2);
            border: 1px solid var(--color5);
            padding: 5px 10px;
            border-radius: 4px;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .language-switcher select:hover {
            background-color: var(--color5);
            transform: scale(1.05);
        }

        /* قسم البطل */
        .hero {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('https://i.pinimg.com/originals/b9/17/9e/b9179e2d7edeca5f1d962d75bf6a15b8.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            height: 70vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: var(--color2);
            margin-bottom: 40px;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, rgba(37, 92, 70, 0.3), rgba(174, 165, 109, 0.3));
            animation: heroShimmer 3s ease-in-out infinite;
        }

        @keyframes heroShimmer {

            0%,
            100% {
                opacity: 0.3;
            }

            50% {
                opacity: 0.6;
            }
        }

        .hero-content {
            position: relative;
            z-index: 2;
            animation: fadeInUp 1s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .hero-content h1 {
            font-size: 3.5rem;
            margin-bottom: 20px;
            color: var(--color4);
        }

        .hero-content p {
            font-size: 1.2rem;
            max-width: 800px;
            margin: 0 auto 30px;
            animation: fadeInUp 1s ease-out 0.5s both;
        }

        .btn {
            display: inline-block;
            background: linear-gradient(45deg, var(--color4), var(--color5));
            color: var(--dark-bg);
            padding: 12px 30px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: bold;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            animation: fadeInUp 1s ease-out 1s both;
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.5s;
        }

        .btn:hover::before {
            left: 100%;
        }

        .btn:hover {
            background: linear-gradient(45deg, var(--color5), var(--color4));
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.4);
        }

        /* الأقسام الرئيسية */
        .section {
            padding: 60px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            opacity: 0;
            transform: translateY(50px);
            animation: sectionFadeIn 0.8s ease-out forwards;
        }

        .section:nth-child(1) {
            animation-delay: 0.1s;
        }

        .section:nth-child(2) {
            animation-delay: 0.2s;
        }

        .section:nth-child(3) {
            animation-delay: 0.3s;
        }

        .section:nth-child(4) {
            animation-delay: 0.4s;
        }

        .section:nth-child(5) {
            animation-delay: 0.5s;
        }

        .section:nth-child(6) {
            animation-delay: 0.6s;
        }

        @keyframes sectionFadeIn {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .section-title {
            text-align: center;
            margin-bottom: 40px;
            position: relative;
            animation: titleSlideIn 1s ease-out;
        }

        @keyframes titleSlideIn {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .section-title h2 {
            font-size: 2.5rem;
            color: var(--color4);
            display: inline-block;
            padding-bottom: 10px;
            position: relative;
        }

        .section-title h2::after {
            content: '';
            position: absolute;
            width: 100px;
            height: 3px;
            background: linear-gradient(90deg, var(--color5), var(--color4));
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            animation: lineExpand 1s ease-out 0.5s both;
        }

        @keyframes lineExpand {
            from {
                width: 0;
            }

            to {
                width: 100px;
            }
        }

        /* الشبكة */
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .section-title p {
            margin-top: 20px;
        }

        .card {
            background: linear-gradient(135deg, rgba(37, 92, 70, 0.3), rgba(174, 165, 109, 0.2));
            border-radius: 15px;
            overflow: hidden;
            transition: all 0.4s ease;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
            position: relative;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            opacity: 0;
            transition: opacity 0.3s;
        }

        .card:hover::before {
            opacity: 1;
        }

        .card-img {
            height: 200px;
            overflow: hidden;
            position: relative;
        }

        .card-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: all 0.5s ease;
            filter: brightness(0.8);
        }

        .card:hover .card-img img {
            transform: scale(1.05);
            filter: brightness(1);
        }

        .card-content {
            padding: 25px;
            position: relative;
            z-index: 2;
        }

        .card-content h3 {
            color: var(--color4);
            margin-bottom: 15px;
            font-size: 1.5rem;
            transition: all 0.3s ease;
        }

        .card-content p {
            color: var(--dark-text);
            font-size: 1rem;
            line-height: 1.6;
            margin-top: 10px;
        }

        .card:hover .card-content h3 {
            color: var(--color3);
        }

        /* الخريطة التفاعلية */
        .map-container {
            height: 600px;
            border-radius: 10px;
            overflow: hidden;
            margin-top: 30px;
            position: relative;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
        }

        #riyadhMap {
            width: 100%;
            height: 100%;
        }

        .leaflet-popup-content {
            text-align: right;
            direction: rtl;
        }

        .popup-cafe-img {
            width: 200px;
            height: 150px;
            object-fit: cover;
            border-radius: 8px;
            margin: 10px 0;
        }

        .popup-cafe-desc {
            margin: 10px 0;
            font-size: 0.9rem;
            line-height: 1.6;
        }

        .popup-cafe-link {
            display: inline-block;
            background: linear-gradient(45deg, var(--color4), var(--color5));
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            text-decoration: none;
            font-weight: bold;
            margin-top: 10px;
            transition: all 0.3s ease;
        }

        .popup-cafe-link:hover {
            background: linear-gradient(45deg, var(--color5), var(--color4));
            transform: scale(1.05);
        }

        /* قاموس نجد */
        .dictionary {
            background-color: rgba(37, 92, 70, 0.3);
            padding: 30px;
            border-radius: 10px;
            margin-top: 40px;
        }

        .dictionary-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
        }

        .dictionary-item {
            background-color: rgba(0, 0, 0, 0.3);
            padding: 15px;
            border-radius: 8px;
            border-right: 3px solid var(--color4);
        }

        .dictionary-item h4 {
            color: var(--color7);
            margin-bottom: 8px;
        }

        /* نموذج الاتصال */
        .contact-form {
            background-color: rgba(37, 92, 70, 0.3);
            padding: 30px;
            border-radius: 10px;
            margin-top: 40px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: var(--color4);
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 12px;
            background-color: rgba(0, 0, 0, 0.3);
            border: 1px solid var(--color5);
            border-radius: 5px;
            color: var(--dark-text);
            font-size: 1rem;
        }

        .form-group textarea {
            height: 150px;
            resize: vertical;
        }

        /* التذييل */
        footer {
            background-color: rgba(0, 0, 0, 0.5);
            padding: 40px 0 20px;
            margin-top: 60px;
        }

        footer p,
        footer li {
            color: var(--color1);
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin-bottom: 30px;
        }

        .footer-column h3 {
            color: var(--color4);
            margin-bottom: 20px;
            font-size: 1.3rem;
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 10px;
        }

        .footer-links a {
            color: var(--color1);
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-links a:hover {
            color: var(--color4);
        }

        .copyright {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: var(--color5);
        }

        /* قسم التعليقات */
        .comments-section {
            background-color: rgba(37, 92, 70, 0.1);
            padding: 40px;
            border-radius: 15px;
            margin-top: 40px;
        }

        .interview-video-container {
            background: linear-gradient(135deg, rgba(37, 92, 70, 0.1), rgba(174, 165, 109, 0.1));
            border-radius: 15px;
            padding: 30px;
            margin: 30px 0;
            text-align: center;
            border-right: 4px solid var(--color4);
        }

        .interview-video-container h3 {
            color: var(--color4);
            font-size: 1.5rem;
            margin-bottom: 20px;
        }

        .interview-video-container video {
            width: 100%;
            max-width: 500px;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        @media (max-width: 768px) {
            .interview-video-container {
                padding: 20px;
            }

            .interview-video-container video {
                max-width: 100%;
            }
        }

        .comment-form {
            background-color: rgba(37, 92, 70, 0.2);
            padding: 30px;
            border-radius: 10px;
            margin-bottom: 40px;
        }

        .comments-list {
            margin-top: 40px;
        }

        .comment-item {
            background: linear-gradient(135deg, rgba(37, 92, 70, 0.2), rgba(174, 165, 109, 0.15));
            padding: 25px;
            border-radius: 10px;
            margin-bottom: 20px;
            border-right: 4px solid var(--color4);
            transition: all 0.3s ease;
        }

        .comment-item:hover {
            transform: translateX(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .comment-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .comment-author {
            font-weight: bold;
            color: var(--color4);
            font-size: 1.1rem;
        }

        .comment-date {
            color: var(--color5);
            font-size: 0.9rem;
        }

        .comment-text {
            color: var(--dark-text);
            line-height: 1.8;
            font-size: 1rem;
        }

        /* التصميم المتجاوب */
        @media (max-width: 768px) {
            .hamburger {
                display: flex;
            }

            nav {
                position: fixed;
                top: 0;
                right: -100%;
                width: 80%;
                height: 100vh;
                background: linear-gradient(135deg, var(--color6), var(--color5));
                transition: right 0.3s ease;
                z-index: 1000;
                padding-top: 80px;
            }

            nav.active {
                right: 0;
            }

            nav ul {
                flex-direction: column;
                align-items: center;
                padding: 20px;
            }

            nav ul li {
                margin: 15px 0;
                width: 100%;
                text-align: center;
            }

            nav ul li a {
                display: block;
                padding: 15px;
                font-size: 1.2rem;
                border-radius: 10px;
                background: rgba(255, 255, 255, 0.1);
                margin: 5px 0;
            }

            .header-container {
                justify-content: space-between;
            }

            .language-switcher {
                margin-left: auto;
                margin-right: 20px;
            }

            .hero-content h1 {
                font-size: 2.5rem;
            }

            .section-title h2 {
                font-size: 2rem;
            }

            .grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .card {
                margin: 0 10px;
            }
        }

        @media (min-width: 769px) {
            .hamburger {
                display: none !important;
            }

            nav {
                position: static !important;
                width: auto !important;
                height: auto !important;
                background: none !important;
                padding-top: 0 !important;
            }

            nav ul {
                flex-direction: row !important;
                align-items: center !important;
                padding: 0 !important;
            }

            nav ul li {
                width: auto !important;
                margin: 2px;
            }

            nav ul li a {
                display: inline-block !important;
                padding: 8px !important;
                font-size: 1.3rem !important;
                border-radius: 4px !important;
                background: none !important;
                margin: 0 !important;
            }
        }

        @media (max-width: 480px) {
            .hero-content h1 {
                font-size: 2rem;
            }

            .hero-content p {
                font-size: 1rem;
            }

            .section-title h2 {
                font-size: 1.8rem;
            }

            .container {
                padding: 10px;
            }
        }
    </style>
</head>

<body>
    <!-- رأس الموقع -->
    <header>
        <div class="container header-container">
            <a data-en="Why Riyadh?" href="#" class="logo"><img src="assets/images/Logo.png" alt="الشعار"
                    style="height: auto; width: 100px;"></a>

            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>

            <nav>
                <ul>
                    <li><a href="#about" data-ar="عن الرياض" data-en="About Riyadh">عن الرياض</a></li>
                    <li><a href="#tourist" data-ar="الأماكن السياحية" data-en="Tourist Places">الأماكن السياحية</a></li>
                    <li><a href="#culture" data-ar="الثقافة والتقاليد" data-en="Culture & Traditions">الثقافة
                            والتقاليد</a></li>
                    <li><a href="#events" data-ar="الفعاليات" data-en="Events">الفعاليات</a></li>
                    <li><a href="#shopping" data-ar="التسوق والترفيه" data-en="Shopping & Entertainment">التسوق
                            والترفيه</a></li>
                    <li><a href="#guide" data-ar="دليل الزائر" data-en="Visitor Guide">دليل الزائر</a></li>
                    <li><a href="#what-they-said" data-ar="وش قالوا عن الرياض" data-en="What They Said About Riyadh">وش قالوا عن الرياض</a></li>
                    <li><a href="#comments" data-ar="كلمنا عن الرياض" data-en="Tell Us About Riyadh">كلمنا عن الرياض</a>
                    </li>
                    <li><a href="#contact" data-ar="اتصل بنا" data-en="Contact Us">اتصل بنا</a></li>
                </ul>
            </nav>

            <div class="language-switcher">
                <select id="languageSelect" title="اختر اللغة / Choose Language"
                    aria-label="اختر اللغة / Choose Language">
                    <option value="ar">العربية</option>
                    <option value="en">English</option>
                </select>
            </div>
        </div>
    </header>

    <!-- قسم البطل -->
    <section class="hero">
        <div class="container hero-content">
            <h1 data-ar="ليه الرياض؟" data-en="Why Riyadh?">ليه الرياض؟</h1>
            <p data-ar="اكتشف جوهر العاصمة السعودية، حيث يلتقي التراث الأصيل بالحداثة المتجددة في مدينة تجمع بين عمق التاريخ وروح العصر"
                data-en="Discover the essence of the Saudi capital, where authentic heritage meets modern renewal in a city that combines historical depth with contemporary spirit">
                اكتشف جوهر العاصمة السعودية، حيث يلتقي التراث الأصيل بالحداثة المتجددة في مدينة تجمع بين عمق التاريخ
                وروح العصر</p>
            <a href="#about" class="btn" data-ar="اكتشف المزيد" data-en="Discover More">اكتشف المزيد</a>
        </div>
    </section>

    <!-- قسم لمحة عن الرياض -->
    <section id="about" class="section">
        <div class="container">
            <div class="section-title">
                <h2 data-ar="عن الرياض" data-en="About Riyadh">عن الرياض</h2>
            </div>

            <div class="grid">
                <div class="card">
                    <a href="about/history/index.html" style="text-decoration: none; color: inherit; display: block;">
                        <div class="card-img">
                            <img src="https://blog.wasalt.sa/wp-content/uploads/2022/03/%D8%A7%D9%84%D9%85%D9%85%D9%84%D9%83%D8%A9-%D9%84%D9%84%D8%AA%D8%B7%D9%88%D9%8A%D8%B1-%D8%A7%D9%84%D8%B9%D9%82%D8%A7%D8%B1%D9%8A.jpg"
                                alt="لمحة عن الرياض">
                        </div>
                        <div class="card-content">
                            <h3 data-ar="لمحة عن الرياض" data-en="Overview of Riyadh">لمحة عن الرياض</h3>
                        </div>
                    </a>
                </div>
                <div class="card">
                    <a href="about/why-riyadh/index.html" style="text-decoration: none; color: inherit; display: block;">
                        <div class="card-img">
                            <img src="https://also3odyah.com/wp-content/uploads/2024/06/download.jpeg"
                                alt="الرياض للجميع">
                        </div>
                        <div class="card-content">
                            <h3 data-ar="ليه الرياض؟" data-en="Why Riyadh?">ليه الرياض؟</h3>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </section>

    <!-- قسم الأماكن السياحية -->
    <section id="tourist" class="section">
        <div class="container">
            <div class="section-title">
                <h2 data-ar="الأماكن السياحية" data-en="Tourist Places">الأماكن السياحية</h2>
            </div>

            <div class="grid">
                <div class="card">
                    <a href="tourist/historical-landmarks/index.html" style="text-decoration: none; color: inherit; display: block;">
                        <div class="card-img">
                            <img src="https://th.bing.com/th/id/R.ae1a030fa7b67164a32377e11b2b9b05?rik=BqpqzRn2dVINtg&pid=ImgRaw&r=0"
                                alt="المصمك">
                        </div>
                        <div class="card-content">
                            <h3 data-ar="معالم تاريخية" data-en="Historical Landmarks">معالم تاريخية</h3>
                            <!--<p data-ar="قلعة المصمك، حي الطريف في الدرعية، قصر المربع، وقصر الحكم. مواقع تروي قصة تأسيس المملكة وتطورها."-->
                            <!--    data-en="Al Masmak Fortress, At-Turaif District in Diriyah, Al Murabba Palace, and Al Hukm Palace. Sites that tell the story of the Kingdom's founding and development.">-->
                            <!--    قلعة المصمك، حي الطريف في الدرعية، قصر المربع، وقصر الحكم. مواقع تروي قصة تأسيس المملكة-->
                            <!--    وتطورها.</p>-->
                            <p></p>
                        </div>
                    </a>
                </div>

                <div class="card">
                    <a href="tourist/modern-landmarks/index.html" style="text-decoration: none; color: inherit; display: block;">
                        <div class="card-img">
                            <img src="https://tse2.mm.bing.net/th/id/OIP.4zj59O0x-5DK5bLLC1zxagHaE8?rs=1&pid=ImgDetMain&o=7&rm=3"
                                alt="برج المملكة">
                        </div>
                        <div class="card-content">
                            <h3 data-ar="معالم حديثة" data-en="Modern Landmarks">معالم حديثة</h3>
                        </div>
                    </a>
                </div>

                <div class="card">
                    <a href="tourist/natural-landmarks/index.html" style="text-decoration: none; color: inherit; display: block;">
                        <div class="card-img">
                            <img src="https://th.bing.com/th/id/R.2c2c167cec9e2067a0aec735ed5f5418?rik=rDGoPe10Xcmvfg&pid=ImgRaw&r=0"
                                alt="وادي حنيفة">
                        </div>
                        <div class="card-content">
                            <h3 data-ar="معالم طبيعية" data-en="Natural Landmarks">معالم طبيعية</h3>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- قسم الثقافة والتقاليد -->
    <section id="culture" class="section">
        <div class="container">
            <div class="section-title">
                <h2 data-ar="الثقافة والتقاليد" data-en="Culture & Traditions">الثقافة والتقاليد</h2>
            </div>

            <div class="grid">
                <div class="card">
                    <a href="culture/cuisine/index.html" style="text-decoration: none; color: inherit; display: block;">
                        <div class="card-img">
                            <img src="https://tse3.mm.bing.net/th/id/OIP.1FeQoqwZycBbZItbgr6w9gHaFj?rs=1&pid=ImgDetMain&o=7&rm=3"
                                alt="مطبخ الرياض">
                        </div>
                        <div class="card-content">
                            <h3 data-ar="مطبخ الرياض" data-en="Riyadh Cuisine">مطبخ الرياض</h3>
                        </div>
                    </a>
                </div>

                <div class="card">
                    <a href="culture/traditional-clothing/index.html" style="text-decoration: none; color: inherit; display: block;">
                        <div class="card-img">
                            <img src="https://tse3.mm.bing.net/th/id/OIP.RVpw2lLFCaS_Q0rc-kTelAHaEo?rs=1&pid=ImgDetMain&o=7&rm=3"
                                alt="أزياء من تراثنا">
                        </div>
                        <div class="card-content">
                            <h3 data-ar="أزياء من تراثنا" data-en="Traditional Clothing">أزياء من تراثنا</h3>
                        </div>
                    </a>
                </div>

                <div class="card">
                    <a href="culture/traditional-arts/index.html" style="text-decoration: none; color: inherit; display: block;">
                        <div class="card-img">
                            <img src="https://tse4.mm.bing.net/th/id/OIP.R3BtfD-Nl93lcnynP60I4QHaFJ?rs=1&pid=ImgDetMain&o=7&rm=3"
                                alt="فنونا">
                        </div>
                        <div class="card-content">
                            <h3 data-ar="فنونا" data-en="Traditional Arts">فنونا</h3>
                            <p data-ar="فنونا… مساحة تعرفك على روح نجد، وفرحها وأصالتها" data-en="Funoona... a space that introduces you to the spirit of Najd, its joy and authenticity">فنونا… مساحة تعرفك على روح نجد، وفرحها وأصالتها</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- قسم الفعاليات والمهرجانات -->
    <section id="events" class="section">
        <div class="container">
            <div class="section-title">
                <h2 data-ar="الفعاليات والمهرجانات" data-en="Events & Festivals">الفعاليات والمهرجانات</h2>
                <p data-ar="تحولت الرياض إلى أيقونة عالمية للترفيه والفعاليات حيث تزهو المدينة على مدار العام بجدول حافل من المهرجانات والحفلات والمعارض التي تلبي كافة الأذواق والاهتمامات إنها المدينة التي تَعِد زوارها بتجربة ترفيهية متكاملة لا تُنسى."
                    data-en="Riyadh has transformed into a global icon for entertainment and events, as the city shines throughout the year with a packed schedule of festivals, concerts, and exhibitions that cater to all tastes and interests. It is the city that promises its visitors an unforgettable integrated entertainment experience.">
                    تحولت الرياض إلى أيقونة عالمية للترفيه والفعاليات حيث تزهو المدينة على مدار العام بجدول حافل من
                    المهرجانات والحفلات والمعارض التي تلبي كافة الأذواق والاهتمامات إنها المدينة التي تَعِد زوارها
                    بتجربة ترفيهية متكاملة لا تُنسى.</p>
            </div>

            <div class="grid">
                <div class="card">
                    <a href="events/riyadh-season/index.html" style="text-decoration: none; color: inherit; display: block;">
                        <div class="card-img">
                            <img src="assets/images/60369c46-bd9a-488c-9278-a623720ae466.jpg" alt="موسم الرياض">
                        </div>
                        <div class="card-content">
                            <h3 data-ar="موسم الرياض" data-en="Riyadh Season">موسم الرياض</h3>
                        </div>
                    </a>
                </div>

                <div class="card">
                    <a href="events/musical-concerts/index.html" style="text-decoration: none; color: inherit; display: block;">
                        <div class="card-img">
                            <img src="https://tse1.mm.bing.net/th/id/OIP.Kh2wHTENmr_BafFddP7JGgHaE7?rs=1&pid=ImgDetMain&o=7&rm=3"
                                alt="الحفلات الغنائية">
                        </div>
                        <div class="card-content">
                            <h3 data-ar="الحفلات الغنائية" data-en="Musical Concerts">الحفلات الغنائية</h3>
                        </div>
                    </a>
                </div>

                <div class="card">
                    <a href="events/sports-events/index.html" style="text-decoration: none; color: inherit; display: block;">
                        <div class="card-img">
                            <img src="https://www.almowaten.net/wp-content/uploads/2021/12/FFxTgh1XMAAJrLl-799x533.jpg"
                                alt="الأحداث الرياضية">
                        </div>
                        <div class="card-content">
                            <h3 data-ar="الأحداث الرياضية" data-en="Sports Events">الأحداث الرياضية</h3>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- قسم التسوق والترفيه -->
    <section id="shopping" class="section">
        <div class="container">
            <div class="section-title">
                <h2 data-ar="التسوق والترفيه" data-en="Shopping & Entertainment">التسوق والترفيه</h2>
            </div>

            <div class="grid">
                <div class="card">
                    <a href="shopping/traditional-markets/index.html" style="text-decoration: none; color: inherit; display: block;">
                        <div class="card-img">
                            <img src="https://tse4.mm.bing.net/th/id/OIP.jK5VBJ4O0k_FygHyqpqArgHaEK?rs=1&pid=ImgDetMain&o=7&rm=3"
                                alt="الأسواق الشعبية">
                        </div>
                        <div class="card-content">
                            <h3 data-ar="الأسواق الشعبية" data-en="Traditional Markets">الأسواق الشعبية</h3>
                        </div>
                    </a>
                </div>

                <div class="card">
                    <a href="shopping/modern-malls/index.html" style="text-decoration: none; color: inherit; display: block;">
                        <div class="card-img">
                            <img src="https://siaha.net/wp-content/uploads/2021/05/%D9%85%D9%88%D9%84-%D8%A7%D9%84%D8%B1%D9%8A%D8%A7%D8%B6-%D8%A8%D8%A7%D8%B1%D9%83-768x512.jpg"
                                alt="المولات الحديثة">
                        </div>
                        <div class="card-content">
                            <h3 data-ar="المولات الحديثة" data-en="Modern Malls">المولات الحديثة</h3>
                        </div>
                    </a>
                </div>

                <div class="card">
                    <a href="shopping/cafes-restaurants/index.html" style="text-decoration: none; color: inherit; display: block;">
                        <div class="card-img">
                            <img src="https://i0.wp.com/dleel.hayaak.com/wp-content/uploads/2022/11/WJD5848.webp"
                                alt="المقاهي والمطاعم">
                        </div>
                        <div class="card-content">
                            <h3 data-ar="المقاهي والمطاعم" data-en="Cafes & Restaurants">المقاهي والمطاعم</h3>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- قسم دليل الزائر -->
    <section id="guide" class="section">
        <div class="container">
            <div class="section-title">
                <h2 data-ar="دليل الزائر" data-en="Visitor Guide">دليل الزائر</h2>
            </div>

            <div class="grid">
                <div class="card">
                    <a href="guide/hotels-accommodations/index.html" style="text-decoration: none; color: inherit; display: block;">
                        <div class="card-img">
                            <img src="https://lh6.googleusercontent.com/W9cxVV_WsMVEgafU-CVRD75YkNdnvZJ-FFsc-iI5hvJixebEXKydgqiboc1sllo_njVCQCmq7hv_RFOxqS9CLdipS07m3kOcXfvPecktsPP363wnCHaFAogH5z5TNM3qtvWmeusBOHVFJdR9aV3Q2bg"
                                alt="الفنادق والإقامات">
                        </div>
                        <div class="card-content">
                            <h3 data-ar="الفنادق والإقامات" data-en="Hotels & Accommodations">الفنادق والإقامات</h3>
                        </div>
                    </a>
                </div>

                <div class="card">
                    <a href="guide/transportation/index.html" style="text-decoration: none; color: inherit; display: block;">
                        <div class="card-img">
                            <img src="https://alsaudieconomy.com/images/2024/11/%D9%82%D8%B7%D8%A7%D8%B1-%D8%A7%D9%84%D8%B1%D9%8A%D8%A7%D8%B6-1732733239-1.jpg"
                                alt="المواصلات">
                        </div>
                        <div class="card-content">
                            <h3 data-ar="المواصلات" data-en="Transportation">المواصلات</h3>
                            <!--<p data-ar="كل ما تحتاج معرفته عن وسائل النقل في الرياض: المترو، الحافلات، التاكسي، وتطبيقات النقل."-->
                            <!--    data-en="Everything you need to know about transportation in Riyadh: Metro, buses, taxis, and ride-sharing apps.">-->
                            <!--    كل ما تحتاج معرفته عن وسائل النقل في الرياض: المترو، الحافلات، التاكسي، وتطبيقات النقل.-->
                            <!--</p>-->
                            <p></p>
                        </div>
                    </a>
                </div>

                <!-- <div class="card">
                    <a href="#" style="text-decoration: none; color: inherit; display: block;">
                        <div class="card-img">
                            <img src="https://static.srpcdigital.com/styles/1037xauto/public/2025-04/1040517.jpeg.webp"
                                alt="الخدمات المساعدة">
                        </div>
                        <div class="card-content">
                            <h3 data-ar="الخدمات المساعدة" data-en="Support Services">الخدمات المساعدة</h3>
                            <p data-ar="خدمات مساعدة للسياح تشمل المرشدين السياحيين، الترجمة، والمساعدة في حالات الطوارئ."
                               data-en="Support services for tourists including tour guides, translation services, and emergency assistance.">
                                خدمات مساعدة للسياح تشمل المرشدين السياحيين، الترجمة، والمساعدة في حالات الطوارئ.
                            <p>.</p>
                        </div>
                    </a>
                </div> -->
            </div>
        </div>
    </section>

    <!-- الخريطة التفاعلية -->
    <section class="section">
        <div class="container">
            <div class="section-title">
                <h2 data-ar="خريطة الرياض التفاعلية" data-en="Interactive Riyadh Map">خريطة الرياض التفاعلية</h2>
            </div>

            <div style="text-align: center; margin: 20px 0; padding: 20px; background: rgba(37, 92, 70, 0.1); border-radius: 10px; border-right: 4px solid var(--color4);">
                <h3 style="font-size: 1.3rem; color: var(--color4); margin-bottom: 15px;" data-ar="الخريطة الآن تعرض :" data-en="The map now displays :">الخريطة الآن تعرض :</h3>
                <ul style="list-style: none; padding: 0; margin: 0; text-align: right; direction: rtl; display: inline-block;">
                    <li style="margin: 10px 0; font-size: 1.1rem; line-height: 1.8;" data-ar="13 مقهى (علامات زرقاء)" data-en="13 cafes (blue markers)">
                        <strong style="color: var(--color4);">13 مقهى</strong> <span style="color: var(--dark-text);">(علامات زرقاء)</span>
                    </li>
                    <li style="margin: 10px 0; font-size: 1.1rem; line-height: 1.8;" data-ar="12 مطاعم شعبية (علامات حمراء)" data-en="10 traditional restaurants (red markers)">
                        <strong style="color: #dc3545;">10 مطاعم شعبية</strong> <span style="color: var(--dark-text);">(علامات حمراء)</span>
                    </li>
                    <li style="margin: 10px 0; font-size: 1.1rem; line-height: 1.8;" data-ar="8 مطاعم عالمية (علامات خضراء)" data-en="8 international restaurants (green markers)">
                        <strong style="color: #28a745;">11 مطاعم عالمية</strong> <span style="color: var(--dark-text);">(علامات خضراء)</span>
                    </li>
                    <li style="margin: 10px 0; font-size: 1.1rem; line-height: 1.8;" data-ar="5 معالم تاريخية (علامات برتقالية)" data-en="5 historical landmarks (orange markers)">
                        <strong style="color: #ff9800;">5 معالم تاريخية</strong> <span style="color: var(--dark-text);">(علامات برتقالية)</span>
                    </li>
                    <li style="margin: 10px 0; font-size: 1.1rem; line-height: 1.8;" data-ar="3 معالم سياحية (علامات بنفسجية)" data-en="3 tourist landmarks (purple markers)">
                        <strong style="color: #9c27b0;">3 معالم سياحية</strong> <span style="color: var(--dark-text);">(علامات بنفسجية)</span>
                    </li>
                </ul>
            </div>

            <div class="map-container">
                <div id="riyadhMap"></div>
            </div>
        </div>
    </section>

    <!-- قاموس نجد -->
    <section class="section">
        <div class="container">
            <div class="section-title">
                <h2 data-ar="قاموس نجد" data-en="Najd Dictionary">قاموس نجد</h2>
            </div>

            <div class="dictionary">
                <div class="dictionary-grid">
                    <div class="dictionary-item">
                        <h4 data-ar="احتريك" data-en="Ahtarik">احتريك</h4>
                        <p data-ar="انتظرك" data-en="I'll wait for you">انتظرك</p>
                    </div>

                    <div class="dictionary-item">
                        <h4 data-ar="بصرك" data-en="Bisrak">بصرك</h4>
                        <p data-ar="افعل ما يحلو لك" data-en="Do as you please">افعل ما يحلو لك</p>
                    </div>

                    <div class="dictionary-item">
                        <h4 data-ar="جسور" data-en="Jasoor">جسور</h4>
                        <p data-ar="شجاع" data-en="Brave">شجاع</p>
                    </div>

                    <div class="dictionary-item">
                        <h4 data-ar="تولم" data-en="Tawlam">تولم</h4>
                        <p data-ar="تجهز" data-en="Get ready">تجهز</p>
                    </div>

                    <div class="dictionary-item">
                        <h4 data-ar="مختب" data-en="Mukhtab">مختب</h4>
                        <p data-ar="مضطرب" data-en="Anxious, disturbed">مضطرب</p>
                    </div>

                    <div class="dictionary-item">
                        <h4 data-ar="يملص" data-en="Yamlas">يملص</h4>
                        <p data-ar="يزلق" data-en="Slips, slides">يزلق</p>
                    </div>

                    <div class="dictionary-item">
                        <h4 data-ar="يومي" data-en="Yawmi">يومي</h4>
                        <p data-ar="يأشر" data-en="Points, signals">يأشر</p>
                    </div>

                    <div class="dictionary-item">
                        <h4 data-ar="صال" data-en="Sal">صال</h4>
                        <p data-ar="عصب" data-en="Angry, upset">عصب</p>
                    </div>

                    <div class="dictionary-item">
                        <h4 data-ar="يدبي" data-en="Yadbi">يدبي</h4>
                        <p data-ar="يمشي بشويش" data-en="Walks slowly, quietly">يمشي بشويش</p>
                    </div>

                    <div class="dictionary-item">
                        <h4 data-ar="ابخص" data-en="Abkhas">ابخص</h4>
                        <p data-ar="أدرى وأعلم" data-en="More knowledgeable, knows better">أدرى وأعلم</p>
                    </div>

                    <div class="dictionary-item">
                        <h4 data-ar="يلفز" data-en="Yalfaz">يلفز</h4>
                        <p data-ar="يخبئ" data-en="Hides, conceals">يخبئ</p>
                    </div>

                    <div class="dictionary-item">
                        <h4 data-ar="حسّربه" data-en="Hassarbo">حسّربه</h4>
                        <p data-ar="عذبه" data-en="Tortured him">عذبه</p>
                    </div>

                    <div class="dictionary-item">
                        <h4 data-ar="الهقوه" data-en="Al-Haqwa">الهقوه</h4>
                        <p data-ar="الظن" data-en="Suspicion, assumption">الظن</p>
                    </div>

                    <div class="dictionary-item">
                        <h4 data-ar="يويق" data-en="Yawik">يويق</h4>
                        <p data-ar="ينظر بحذر خشية أن يراه أحد"
                            data-en="Looks cautiously, afraid someone might see him">ينظر بحذر خشية أن يراه أحد</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- قسم وش قالوا عن الرياض -->
    <section id="what-they-said" class="section">
        <div class="container">
            <div class="section-title">
                <h2 data-ar="وش قالوا عن الرياض" data-en="What They Said About Riyadh">وش قالوا عن الرياض</h2>
            </div>

            <div class="interview-video-container">
                <h3 data-ar="مقابلات مع زوار الرياض" data-en="Interviews with Riyadh Visitors">مقابلات مع زوار الرياض</h3>
                <video controls>
                    <source src="assets/videos/المقابلات.MP4" type="video/mp4">
                    متصفحك لا يدعم تشغيل الفيديو.
                </video>
            </div>
        </div>
    </section>

    <!-- قسم كلمنا عن الرياض -->
    <section id="comments" class="section">
        <div class="container">
            <div class="section-title">
                <h2 data-ar="كلمنا عن الرياض" data-en="Tell Us About Riyadh">كلمنا عن الرياض</h2>
                <p data-ar="شاركنا تجربتك وآراءك عن مدينة الرياض"
                    data-en="Share your experience and opinions about Riyadh city">شاركنا تجربتك وآراءك عن مدينة الرياض
                </p>
            </div>

            <div class="comments-section">
                <?php
                // عرض رسائل النجاح/الخطأ
                if (isset($_GET['success']) && $_GET['success'] === 'comment_added') {
                    echo '<div style="background-color: rgba(37, 92, 70, 0.3); padding: 15px; border-radius: 5px; margin-bottom: 20px; color: var(--color4); text-align: center;">';
                    echo '<strong>تم إضافة تعليقك بنجاح! شكراً لك.</strong>';
                    echo '</div>';
                }
                if (isset($_GET['error'])) {
                    $error_msg = '';
                    switch ($_GET['error']) {
                        case 'empty_fields':
                            $error_msg = 'يرجى ملء جميع الحقول';
                            break;
                        case 'name_too_long':
                            $error_msg = 'الاسم طويل جداً';
                            break;
                        case 'message_too_long':
                            $error_msg = 'التعليق طويل جداً';
                            break;
                        case 'database_error':
                            $error_msg = 'حدث خطأ في قاعدة البيانات';
                            break;
                        default:
                            $error_msg = 'حدث خطأ';
                    }
                    echo '<div style="background-color: rgba(255, 0, 0, 0.2); padding: 15px; border-radius: 5px; margin-bottom: 20px; color: red; text-align: center;">';
                    echo '<strong>' . $error_msg . '</strong>';
                    echo '</div>';
                }
                ?>
                <div class="comment-form">
                    <form id="commentForm" method="POST" action="add_comment.php">
                        <div class="form-group">
                            <label for="comment_name" data-ar="الاسم" data-en="Name">الاسم</label>
                            <input type="text" id="comment_name" name="name" required maxlength="255">
                        </div>

                        <div class="form-group">
                            <label for="comment_message" data-ar="تعليقك" data-en="Your Comment">تعليقك</label>
                            <textarea id="comment_message" name="message" rows="5" required maxlength="5000"></textarea>
                        </div>

                        <button type="submit" class="btn" data-ar="أضف تعليق" data-en="Add Comment">أضف تعليق</button>
                    </form>
                </div>

                <div class="comments-list" id="commentsList">
                    <!-- سيتم تحميل التعليقات من PHP -->
                    <?php include 'get_comments.php'; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- نموذج الاتصال -->
    <section id="contact" class="section">
        <div class="container">
            <div class="section-title">
                <h2 data-ar="اتصل بنا" data-en="Contact Us">اتصل بنا</h2>
            </div>

            <div class="contact-form">
                <form>
                    <div class="form-group">
                        <label for="name" data-ar="الاسم" data-en="Name">الاسم</label>
                        <input type="text" id="name" required>
                    </div>

                    <div class="form-group">
                        <label for="email" data-ar="البريد الإلكتروني" data-en="Email">البريد الإلكتروني</label>
                        <input type="email" id="email" required>
                    </div>

                    <div class="form-group">
                        <label for="phone" data-ar="رقم الهاتف" data-en="Phone Number">رقم الهاتف</label>
                        <input type="tel" id="phone">
                    </div>

                    <div class="form-group">
                        <label for="message" data-ar="الاستفسار" data-en="Inquiry">الاستفسار</label>
                        <textarea id="message" required></textarea>
                    </div>

                    <button type="submit" class="btn" data-ar="إرسال الاستفسار" data-en="Send Inquiry">إرسال
                        الاستفسار</button>
                </form>
            </div>
        </div>
    </section>

    <!-- التذييل -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <h3 data-ar="ليه الرياض؟" data-en="Why Riyadh?">ليه الرياض؟</h3>
                    <p data-ar="منصة شاملة للتعريف بمدينة الرياض وجذب السياح والمقيمين لاكتشاف عاصمة المملكة العربية السعودية."
                        data-en="A comprehensive platform to introduce Riyadh city and attract tourists and residents to discover the capital of Saudi Arabia.">
                        منصة شاملة للتعريف بمدينة الرياض وجذب السياح والمقيمين لاكتشاف عاصمة المملكة العربية السعودية.
                    </p>
                </div>

                <div class="footer-column">
                    <h3 data-ar="روابط سريعة" data-en="Quick Links">روابط سريعة</h3>
                    <ul class="footer-links">
                        <li><a href="#about" data-ar="عن الرياض" data-en="About Riyadh">عن الرياض</a></li>
                        <li><a href="#tourist" data-ar="الأماكن السياحية" data-en="Tourist Places">الأماكن السياحية</a>
                        </li>
                        <li><a href="#culture" data-ar="الثقافة والتقاليد" data-en="Culture & Traditions">الثقافة
                                والتقاليد</a></li>
                        <li><a href="#events" data-ar="الفعاليات" data-en="Events">الفعاليات</a></li>
                        <li><a href="#shopping" data-ar="التسوق والترفيه" data-en="Shopping & Entertainment">التسوق
                                والترفيه</a></li>
                        <li><a href="#what-they-said" data-ar="وش قالوا عن الرياض" data-en="What They Said About Riyadh">وش قالوا عن الرياض</a></li>
                        <li><a href="#comments" data-ar="كلمنا عن الرياض" data-en="Tell Us About Riyadh">كلمنا عن
                                الرياض</a></li>
                    </ul>
                </div>

                <div class="footer-column">
                    <h3 data-ar="معلومات الاتصال" data-en="Contact Information">معلومات الاتصال</h3>
                    <ul class="footer-links">
                        <li data-ar="الهاتف: 011 123 4567" data-en="Phone: 011 123 4567">الهاتف: 011 123 4567</li>
                        <li data-ar="البريد الإلكتروني: info@riyadhwhy.com" data-en="Email: info@riyadhwhy.com">البريد
                            الإلكتروني: info@whyriyadh.com</li>
                        <li data-ar="العنوان: الرياض، المملكة العربية السعودية" data-en="Address: Riyadh, Saudi Arabia">
                            العنوان: الرياض، المملكة العربية السعودية</li>
                    </ul>
                </div>

                <div class="footer-column">
                    <h3 data-ar="تابعنا" data-en="Follow Us">تابعنا</h3>
                    <ul class="footer-links">
                        <li><a href="#" data-ar="تويتر" data-en="Twitter">تويتر</a></li>
                        <li><a href="#" data-ar="انستغرام" data-en="Instagram">انستغرام</a></li>
                        <li><a href="#" data-ar="فيسبوك" data-en="Facebook">فيسبوك</a></li>
                        <li><a href="#" data-ar="يوتيوب" data-en="YouTube">يوتيوب</a></li>
                    </ul>
                </div>
            </div>

            <div class="copyright">
                <p data-ar="جميع الحقوق محفوظة &copy;2025 ليه الرياض؟"
                    data-en="All rights reserved &copy;2025 Why Riyadh?">جميع الحقوق محفوظة &copy;2025 ليه الرياض؟</p>
            </div>
        </div>
    </footer>

    <script>
        // متغيرات الترجمة
        let currentLanguage = 'ar';

        // قاموس الترجمة
        const translations = {
            ar: {
                'ليه الرياض؟': 'ليه الرياض؟',
                'اكتشف جوهر العاصمة السعودية، حيث يلتقي التراث الأصيل بالحداثة المتجددة في مدينة تجمع بين عمق التاريخ وروح العصر': 'اكتشف جوهر العاصمة السعودية، حيث يلتقي التراث الأصيل بالحداثة المتجددة في مدينة تجمع بين عمق التاريخ وروح العصر',
                'اكتشف المزيد': 'اكتشف المزيد',
                'عن الرياض': 'عن الرياض',
                'الأماكن السياحية': 'الأماكن السياحية',
                'الثقافة والتقاليد': 'الثقافة والتقاليد',
                'الفعاليات': 'الفعاليات',
                'التسوق والترفيه': 'التسوق والترفيه',
                'دليل الزائر': 'دليل الزائر',
                'اتصل بنا': 'اتصل بنا'
            },
            en: {
                'ليه الرياض؟': 'Why Riyadh?',
                'اكتشف جوهر العاصمة السعودية، حيث يلتقي التراث الأصيل بالحداثة المتجددة في مدينة تجمع بين عمق التاريخ وروح العصر': 'Discover the essence of the Saudi capital, where authentic heritage meets modern renewal in a city that combines historical depth with contemporary spirit',
                'اكتشف المزيد': 'Discover More',
                'عن الرياض': 'About Riyadh',
                'الأماكن السياحية': 'Tourist Places',
                'الثقافة والتقاليد': 'Culture & Traditions',
                'الفعاليات': 'Events',
                'التسوق والترفيه': 'Shopping & Entertainment',
                'دليل الزائر': 'Visitor Guide',
                'اتصل بنا': 'Contact Us'
            }
        };

        // وظيفة تغيير اللغة
        function changeLanguage(lang) {
            currentLanguage = lang;
            document.documentElement.lang = lang;
            document.documentElement.dir = lang === 'ar' ? 'rtl' : 'ltr';

            // ترجمة جميع العناصر
            document.querySelectorAll('[data-ar][data-en]').forEach(element => {
                const text = element.getAttribute(`data-${lang}`);
                if (text) {
                    // التحقق من وجود وسوم HTML في النص (مثل <br>)
                    // إذا كان النص يحتوي على HTML، نستخدم innerHTML
                    // وإلا نستخدم textContent للأمان
                    if (text.includes('<br') || text.includes('<BR')) {
                        element.innerHTML = text;
                    } else {
                        element.textContent = text;
                    }
                }
            });

            // ترجمة الروابط
            document.querySelectorAll('nav a[data-ar][data-en]').forEach(link => {
                const text = link.getAttribute(`data-${lang}`);
                if (text) {
                    link.textContent = text;
                }
            });

            // ترجمة روابط الفوتر
            document.querySelectorAll('.footer-links a[data-ar][data-en]').forEach(link => {
                const text = link.getAttribute(`data-${lang}`);
                if (text) {
                    link.textContent = text;
                }
            });

            // ترجمة عناصر الفوتر
            document.querySelectorAll('.footer-links li[data-ar][data-en]').forEach(item => {
                const text = item.getAttribute(`data-${lang}`);
                if (text) {
                    item.textContent = text;
                }
            });
        }

        // مستمع تغيير اللغة
        document.getElementById('languageSelect').addEventListener('change', function() {
            changeLanguage(this.value);
        });

        // قائمة البرجر
        const hamburger = document.querySelector('.hamburger');
        const nav = document.querySelector('nav');

        hamburger.addEventListener('click', function() {
            this.classList.toggle('active');
            nav.classList.toggle('active');
        });

        // إغلاق القائمة عند النقر على رابط
        document.querySelectorAll('nav a').forEach(link => {
            link.addEventListener('click', function() {
                hamburger.classList.remove('active');
                nav.classList.remove('active');
            });
        });

        // التنقل السلس
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();

                const targetId = this.getAttribute('href');
                if (targetId === '#') return;

                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 80,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // تأثير التمرير على الرأس
        window.addEventListener('scroll', function() {
            const header = document.querySelector('header');
            if (window.scrollY > 100) {
                header.style.background = 'rgba(37, 92, 70, 0.95)';
                header.style.backdropFilter = 'blur(10px)';
            } else {
                header.style.background = 'linear-gradient(to right, var(--color6), var(--color5))';
                header.style.backdropFilter = 'none';
            }
        });

        // انيميشن العناصر عند الظهور
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // مراقبة جميع الأقسام
        document.querySelectorAll('.section').forEach(section => {
            observer.observe(section);
        });


        // تأثير الكتابة على العنوان الرئيسي
        function typeWriter(element, text, speed = 100) {
            let i = 0;
            element.innerHTML = '';

            function type() {
                if (i < text.length) {
                    element.innerHTML += text.charAt(i);
                    i++;
                    setTimeout(type, speed);
                }
            }

            type();
        }

        // تطبيق تأثير الكتابة عند تحميل الصفحة
        window.addEventListener('load', function() {
            const mainTitle = document.querySelector('.hero-content h1');
            if (mainTitle) {
                const originalText = mainTitle.textContent;
                setTimeout(() => {
                    typeWriter(mainTitle, originalText, 150);
                }, 1000);
            }
        });

        // تحسين الأداء - إزالة انيميشن البطاقات المفرط
        document.querySelectorAll('.card').forEach(card => {
            card.style.animation = 'none';
        });

        // تحسين تأثيرات الهوفر
        document.querySelectorAll('.card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-10px)';
                this.style.transition = 'transform 0.3s ease';
            });

            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });

        // بيانات المقاهي
        const cafes = [{
                name: {
                    ar: "Shots Café (شوتس كافية)",
                    en: "Shots Café"
                },
                coords: [24.757525618516457, 46.61492717180084],
                desc: {
                    ar: "يعد من أجمل المقاهي في الرياض، متخصص في تقديم القهوة المختصة بطريقة مميزة، حيث يقدمون لكل كوب قهوة رسمة فنية جميلة، مع إمكانية طلب رسومات خاصة على الأكواب. الكافيه مناسب للعوائل.",
                    en: "One of the most beautiful cafes in Riyadh, specializing in serving specialty coffee in a unique way, where they create beautiful artistic designs on each cup, with the possibility of ordering custom designs on cups. The cafe is suitable for families."
                },
                img: "assets/images/Riyadh Cafes/image-000.png",
                link: "https://share.google/PCLJd5Q6kx53KugNX"
            },
            {
                name: {
                    ar: "BK كافية",
                    en: "BK Café"
                },
                coords: [24.784055396771922, 46.59156385767111],
                desc: {
                    ar: "كافية مختص بتقديم تشكيلة متنوعة من الحلا والمخبوزات إلى جانب القهوة. يتميز بطريقة تقديم الحلويات الفريدة، ومساحته متوسطة ومناسبة للعوائل.",
                    en: "A cafe specializing in serving a variety of sweets and pastries alongside coffee. It features a unique way of presenting desserts, with a medium-sized space suitable for families."
                },
                img: "assets/images/Riyadh Cafes/image-002.png",
                link: "https://maps.app.goo.gl/vMGdPc62rQ6XwAme7"
            },
            {
                name: {
                    ar: "Dyar Bakery (ديار كافية)",
                    en: "Dyar Bakery"
                },
                coords: [24.752500300905666, 46.61225763846469],
                desc: {
                    ar: "الوجهة الأولى للعوائل بفضل مساحته الكبيرة وتعدد الجلسات. يقدم قائمة واسعة من الحلويات والقهوة والمشروبات الأخرى، ومناسب للاحتفالات، إذ يوفر أحجامًا كبيرة من الكيك وأماكن مخصصة للتجمعات والاحتفال مع الأصدقاء والعائلة.",
                    en: "The first destination for families thanks to its large space and multiple seating areas. It offers a wide menu of sweets, coffee, and other beverages, and is suitable for celebrations, as it provides large-sized cakes and dedicated spaces for gatherings and celebrations with friends and family."
                },
                img: "assets/images/Riyadh Cafes/image-004.png",
                link: "https://dyarbakery.com/"
            },
            {
                name: {
                    ar: "Ashjar Café (أشجار كافية)",
                    en: "Ashjar Café"
                },
                coords: [24.78628334047303, 46.658670228835554],
                desc: {
                    ar: "يتميز بتصميم داخلي جميل يحتوي على أشجار تمنح الزائر إحساسًا بأنه في حديقة، مما يجعل تجربة احتساء القهوة فريدة ومريحة.",
                    en: "Features a beautiful interior design containing trees that give visitors a feeling of being in a garden, making the coffee experience unique and comfortable."
                },
                img: "assets/images/Riyadh Cafes/image-008.png",
                link: "https://ashjarcafe.com/"
            },
            {
                name: {
                    ar: "Ashjar Café (أشجار كافية)",
                    en: "Ashjar Café"
                },
                coords: [24.771709324852722, 46.63477007116443],
                desc: {
                    ar: "يتميز بتصميم داخلي جميل يحتوي على أشجار تمنح الزائر إحساسًا بأنه في حديقة، مما يجعل تجربة احتساء القهوة فريدة ومريحة.",
                    en: "Features a beautiful interior design containing trees that give visitors a feeling of being in a garden, making the coffee experience unique and comfortable."
                },
                img: "assets/images/Riyadh Cafes/image-009.png",
                link: "https://ashjarcafe.com/"
            },
            {
                name: {
                    ar: "Ashjar Café (أشجار كافية)",
                    en: "Ashjar Café"
                },
                coords: [27.466857558376688, 41.65845651534223],
                desc: {
                    ar: "يتميز بتصميم داخلي جميل يحتوي على أشجار تمنح الزائر إحساسًا بأنه في حديقة، مما يجعل تجربة احتساء القهوة فريدة ومريحة.",
                    en: "Features a beautiful interior design containing trees that give visitors a feeling of being in a garden, making the coffee experience unique and comfortable."
                },
                img: "assets/images/Riyadh Cafes/image-008.png",
                link: "https://ashjarcafe.com/"
            },
            {
                name: {
                    ar: "Ashjar Café (أشجار كافية)",
                    en: "Ashjar Café"
                },
                coords: [24.828747948551545, 46.59273815767109],
                desc: {
                    ar: "يتميز بتصميم داخلي جميل يحتوي على أشجار تمنح الزائر إحساسًا بأنه في حديقة، مما يجعل تجربة احتساء القهوة فريدة ومريحة.",
                    en: "Features a beautiful interior design containing trees that give visitors a feeling of being in a garden, making the coffee experience unique and comfortable."
                },
                img: "assets/images/Riyadh Cafes/image-008.png",
                link: "https://ashjarcafe.com/"
            },
            {
                name: {
                    ar: "VEO كافية",
                    en: "VEO Café"
                },
                coords: [24.772728366225717, 46.607714859402236],
                desc: {
                    ar: "من أشهر المقاهي المتخصصة في القهوة المختصة، يقدمون ألذ أنواع القهوة والحلويات في أجواء مريحة وهادئة مع إطلالة رائعة. مساحة الكافيه كبيرة ومناسبة للعوائل.",
                    en: "One of the most famous cafes specializing in specialty coffee, they serve the most delicious types of coffee and desserts in a comfortable and quiet atmosphere with a wonderful view. The cafe space is large and suitable for families."
                },
                img: "assets/images/Riyadh Cafes/image-010.png",
                link: "https://share.google/PSj12RBap5FElEebv"
            },
            {
                name: {
                    ar: "Okawa Café (أوكاوا كافية)",
                    en: "Okawa Café"
                },
                coords: [24.73841453268472, 46.66755127301334],
                desc: {
                    ar: "كافيه ياباني يقدم تجربة فريدة من نوعها من خلال الحلويات اليابانية والقهوة المختصة. يتميز بطاقم يقدم الخدمة بالزي الياباني، ما يمنح الزائر تجربة مميزة. الكافيه مناسب للعوائل.",
                    en: "A Japanese cafe offering a unique experience through Japanese desserts and specialty coffee. It features a staff serving in Japanese attire, giving visitors a distinctive experience. The cafe is suitable for families."
                },
                img: "assets/images/Riyadh Cafes/image-012.png",
                link: "https://goo.gl/maps/PyzNUWnsvzvUm3Ka7"
            },
            {
                name: {
                    ar: "Ralph Lauren Café (رالف لورين كافيه)",
                    en: "Ralph Lauren Café"
                },
                coords: [24.763032638401157, 46.638984713493336],
                desc: {
                    ar: "من أشهر الكافيهات العالمية في الرياض، يتميز بإطلالة جميلة على أبراج مركز الملك عبدالله المالي. يقدم أنواعًا متعددة من القهوة والحلويات، ويعرف بتصميمه الأنيق وبيع تشكيلة من الأكواب المميزة. مساحة الكافيه صغيرة نوعًا ما، لذا لا يناسب العوائل.",
                    en: "One of the most famous international cafes in Riyadh, featuring a beautiful view of the King Abdullah Financial Center towers. It offers various types of coffee and desserts, and is known for its elegant design and selling a collection of distinctive cups. The cafe space is somewhat small, so it is not suitable for families."
                },
                img: "assets/images/Riyadh Cafes/image-015.png",
                link: "https://share.google/KxtrRaEN4aew2Jvrw"
            },
            {
                name: {
                    ar: "NAC كافية",
                    en: "NAC Café"
                },
                coords: [24.693173569121676, 46.632076117263544],
                desc: {
                    ar: "كافيه يتميز بأجواء هادئة ومناسبة لاحتساء القهوة والاسترخاء. يقدم مجموعة متنوعة من الحلويات والقهوة المختصة، ويعد مناسباً للعوائل والاحتفالات.",
                    en: "A cafe characterized by a quiet atmosphere suitable for enjoying coffee and relaxation. It offers a variety of desserts and specialty coffee, and is suitable for families and celebrations."
                },
                img: "assets/images/Riyadh Cafes/image-016.png",
                link: "https://nacriyadh.com/menu"
            },
            {
                name: {
                    ar: "Sugar Hive Café (شوقر هايف)",
                    en: "Sugar Hive Café"
                },
                coords: [24.80862560339811, 46.619393057671104],
                desc: {
                    ar: "يتميز بتقديم الفرنش توست بجميع النكهات، إلى جانب القهوة المختصة من محاصيل مختلفة. يعرف بتصميمه الداخلي المستوحى من التراث النجدي، ما يمنحه طابعاً فريداً ومميزاً.",
                    en: "Known for serving French toast with all flavors, alongside specialty coffee from different crops. It is known for its interior design inspired by Najdi heritage, giving it a unique and distinctive character."
                },
                img: "assets/images/Riyadh Cafes/image-018.png",
                link: "https://share.google/vBN5UBomazjqiBFsl"
            },
            {
                name: {
                    ar: "Salera Café (ساليرا كافيه)",
                    en: "Salera Café"
                },
                coords: [24.82451467795281, 46.72993610376652],
                desc: {
                    ar: "يقدم القهوة المختصة بإطلالة رائعة على برج المملكة. يتميز المكان بتصميمه الداخلي الجميل ومساحته الواسعة المناسبة للعوائل.",
                    en: "Serves specialty coffee with a wonderful view of the Kingdom Tower. The place is characterized by its beautiful interior design and spacious area suitable for families."
                },
                img: "assets/images/Riyadh Cafes/image-020.png",
                link: "https://salera.sa/"
            }
        ];

        // بيانات المطاعم الشعبية
        const traditionalRestaurants = [{
                name: {
                    ar: "مطعم عسيب",
                    en: "Aseeb Restaurant"
                },
                coords: [24.816419434133163, 46.62399250022625],
                desc: {
                    ar: "يعُتبر من أشهر المطاعم الشعبية في الرياض، ويُقدّم الأكلات السعودية الأصيلة بطريقة ممتازة. التصميم الداخلي جميل والخدمة سريعة.",
                    en: "Considered one of the most famous traditional restaurants in Riyadh, serving authentic Saudi dishes in an excellent way. Beautiful interior design and fast service."
                },
                img: "assets/images/Riyadh Restaurants/img22.png.png",
                link: "https://www.aseeb.sa/"
            },
            {
                name: {
                    ar: "مطعم فريج صويلح",
                    en: "Freej Swailah Restaurant"
                },
                coords: [24.821483312864185, 46.63177005930038],
                desc: {
                    ar: "من أكبر المطاعم الشعبية المتخصصة في تقديم الأكلات الكويتية بالنكهة الخليجية. جلسات واسعة ومناسبة للعائلات.",
                    en: "One of the largest traditional restaurants specializing in serving Kuwaiti dishes with Gulf flavors. Spacious seating suitable for families."
                },
                img: "assets/images/Riyadh Restaurants/img27.png",
                link: "https://saudirestaurantsguide.com/freej-swaileh-menu/"
            },
            {
                name: {
                    ar: "مطعم مقلط الفريج",
                    en: "Maqalat Al-Fareej Restaurant"
                },
                coords: [24.784615606495176, 46.63589280452079],
                desc: {
                    ar: "يتميز بالديكور الداخلي والخارجي، ويقدم الإفطار والأطباق الرئيسية الشعبية. له عدة فروع في الرياض.",
                    en: "Features beautiful interior and exterior decoration, serving breakfast and traditional main dishes. Has several branches in Riyadh."
                },
                img: "assets/images/Riyadh Restaurants/img29.png",
                link: "https://saudirestaurantsguide.com/maqalat-alfareej-menu/"
            },
            {
                name: {
                    ar: "مطعم الرومانسية",
                    en: "Al-Romansiah Restaurant"
                },
                coords: [24.57170627309427, 46.667684566311884],
                desc: {
                    ar: "من أشهر مطاعم الأرز والأكلات السعودية. جلساته مناسبة للعوائل والمجموعات.",
                    en: "One of the most famous restaurants for rice and Saudi dishes. Its seating is suitable for families and groups."
                },
                img: "assets/images/Riyadh Restaurants/img32.png",
                link: "https://www.alromansiah.com/"
            },
            {
                name: {
                    ar: "مطعم الرومانسية",
                    en: "Al-Romansiah Restaurant"
                },
                coords: [24.76329775185745, 46.67780160343162],
                desc: {
                    ar: "من أشهر مطاعم الأرز والأكلات السعودية. جلساته مناسبة للعوائل والمجموعات.",
                    en: "One of the most famous restaurants for rice and Saudi dishes. Its seating is suitable for families and groups."
                },
                img: "assets/images/Riyadh Restaurants/img33.png",
                link: "https://www.alromansiah.com/"
            },
            {
                name: {
                    ar: "مطعم الرومانسية",
                    en: "Al-Romansiah Restaurant"
                },
                coords: [24.689765936914696, 46.85088219621859],
                desc: {
                    ar: "من أشهر مطاعم الأرز والأكلات السعودية. جلساته مناسبة للعوائل والمجموعات.",
                    en: "One of the most famous restaurants for rice and Saudi dishes. Its seating is suitable for families and groups."
                },
                img: "assets/images/Riyadh Restaurants/img34.png",
                link: "https://www.alromansiah.com/"
            },
            {
                name: {
                    ar: "مطعم طوفرية",
                    en: "Tofareya Restaurant"
                },
                coords: [24.80117798954222, 46.60079484398846],
                desc: {
                    ar: "يقدم أكلات حجازية أصيلة، وأجواؤه الداخلية مميزة لكل طاولة.",
                    en: "Serves authentic Hijazi dishes, with distinctive interior atmospheres for each table."
                },
                img: "assets/images/Riyadh Restaurants/img35.png",
                link: "https://ananinja.com/sa/ar/restaurants/tofareya-10522"
            },
            {
                name: {
                    ar: "مطعم تميسة",
                    en: "Tameesa Restaurant"
                },
                coords: [24.828492952264508, 46.63935730376618],
                desc: {
                    ar: "مطعم إفطار شعبي مميز يقدم الفطور السعودي التقليدي. الموظفون يرتدون أزياء شعبية تضيف طابعاً خاصاً.",
                    en: "A distinctive traditional breakfast restaurant serving traditional Saudi breakfast. Staff wear traditional costumes that add a special character."
                },
                img: "assets/images/Riyadh Restaurants/img39.png",
                link: "https://tameesa.sa/"
            },
            {
                name: {
                    ar: "مطعم خبز ونواشف",
                    en: "Khubz wa Nawashef Restaurant"
                },
                coords: [24.811915301061536, 46.64634583445119],
                desc: {
                    ar: "يقدم مجموعة متنوعة من أطباق الإفطار الشعبي في الرياض.",
                    en: "Serves a variety of traditional breakfast dishes in Riyadh."
                },
                img: "assets/images/Riyadh Restaurants/img42.png",
                link: "https://yallaqrcodes.com/"
            },
            {
                name: {
                    ar: "مطعم القرية النجدية",
                    en: "Najd Village Restaurant"
                },
                coords: [24.702695489946137, 46.67070975611749],
                desc: {
                    ar: "من أشهر المطاعم التي تقدم الأكلات السعودية الأصيلة بطابع نجدي وتراثي. يوفر جلسات أرضية شعبية وتصميماً فريداً.",
                    en: "One of the most famous restaurants serving authentic Saudi dishes with a Najdi and heritage character. Offers traditional floor seating and unique design."
                },
                img: "assets/images/Riyadh Restaurants/img45.png",
                link: "https://www.najdvillage.com/"
            },
            {
                name: {
                    ar: "مطعم القرية النجدية",
                    en: "Najd Village Restaurant"
                },
                coords: [24.74884883836028, 46.70675864358484],
                desc: {
                    ar: "من أشهر المطاعم التي تقدم الأكلات السعودية الأصيلة بطابع نجدي وتراثي. يوفر جلسات أرضية شعبية وتصميماً فريداً.",
                    en: "One of the most famous restaurants serving authentic Saudi dishes with a Najdi and heritage character. Offers traditional floor seating and unique design."
                },
                img: "assets/images/Riyadh Restaurants/img46.png",
                link: "https://www.najdvillage.com/"
            },
            {
                name: {
                    ar: "مطعم القرية النجدية",
                    en: "Najd Village Restaurant"
                },
                coords: [24.81555378389249, 46.647020487210376],
                desc: {
                    ar: "من أشهر المطاعم التي تقدم الأكلات السعودية الأصيلة بطابع نجدي وتراثي. يوفر جلسات أرضية شعبية وتصميماً فريداً.",
                    en: "One of the most famous restaurants serving authentic Saudi dishes with a Najdi and heritage character. Offers traditional floor seating and unique design."
                },
                img: "assets/images/Riyadh Restaurants/img47.png",
                link: "https://www.najdvillage.com/"
            }
        ];

        // بيانات المطاعم العالمية
        const internationalRestaurants = [{
                name: {
                    ar: "Pantera Riyadh",
                    en: "Pantera Riyadh"
                },
                coords: [24.701694229612713, 46.70156199665365],
                desc: {
                    ar: "يتميز بقائمة عالمية بطريقة مميزة ومساحات واسعة وجلسات تناسب العوائل.",
                    en: "Features an international menu in a distinctive way with spacious areas and seating suitable for families."
                },
                img: "assets/images/Riyadh Restaurants/img49.png",
                link: "https://pantera.sa/"
            },
            {
                name: {
                    ar: "Tashas",
                    en: "Tashas"
                },
                coords: [24.76391151063063, 46.63819717870999],
                desc: {
                    ar: "يقدم أطباق إفطار متنوعة، ويتميز بإطلالة على أبراج الملك عبدالله.",
                    en: "Serves a variety of breakfast dishes, featuring a view of King Abdullah towers."
                },
                img: "assets/images/Riyadh Restaurants/img51.png",
                link: "https://tashas.com/"
            },
            {
                name: {
                    ar: "Jon & Vinny's",
                    en: "Jon & Vinny's"
                },
                coords: [24.804168883337947, 46.65190692989592],
                desc: {
                    ar: "مطعم إيطالي يقدم قائمة مناسبة للعائلات والأصدقاء بأجواء هادئة.",
                    en: "An Italian restaurant offering a menu suitable for families and friends in a quiet atmosphere."
                },
                img: "assets/images/Riyadh Restaurants/img53.png",
                link: "https://jonandvinnys.com/"
            },
            {
                name: {
                    ar: "Jon & Vinny's",
                    en: "Jon & Vinny's"
                },
                coords: [24.709746545536806, 46.71667948484882],
                desc: {
                    ar: "مطعم إيطالي يقدم قائمة مناسبة للعائلات والأصدقاء بأجواء هادئة.",
                    en: "An Italian restaurant offering a menu suitable for families and friends in a quiet atmosphere."
                },
                img: "assets/images/Riyadh Restaurants/img54.png",
                link: "https://jonandvinnys.com/"
            },
            {
                name: {
                    ar: "Memos",
                    en: "Memos"
                },
                coords: [24.788545821267775, 46.647977146096316],
                desc: {
                    ar: "من أشهر المطاعم الإيطالية التي تقدم البيتزا بطريقة مميزة وبأجواء هادئة.",
                    en: "One of the most famous Italian restaurants serving pizza in a distinctive way and quiet atmosphere."
                },
                img: "assets/images/Riyadh Restaurants/img56.png",
                link: "https://memos.sa/"
            },
            {
                name: {
                    ar: "Cipriani",
                    en: "Cipriani"
                },
                coords: [24.75694537691473, 46.60772554609723],
                desc: {
                    ar: "من أقدم وأشهر المطاعم العالمية! متخصص في تقديم السيتيك بطريقة فاخرة بأجواء مناسبة للقاءات.",
                    en: "One of the oldest and most famous international restaurants! Specializes in serving steak in a luxurious way with an atmosphere suitable for meetings."
                },
                img: "assets/images/Riyadh Restaurants/img59.png",
                link: "https://cipriani.com/"
            },
            {
                name: {
                    ar: "Café de Paris Entrecôte",
                    en: "Café de Paris Entrecôte"
                },
                coords: [24.763600092425545, 46.6036310586542],
                desc: {
                    ar: "مطعم عالمي متخصص في تقديم السيتيك بصلصة المنتريكو.",
                    en: "An international restaurant specializing in serving steak with Entrecôte sauce."
                },
                img: "assets/images/Riyadh Restaurants/img62.png",
                link: "https://cafedeparis.com/"
            },
            {
                name: {
                    ar: "Café de Paris Entrecôte",
                    en: "Café de Paris Entrecôte"
                },
                coords: [24.694718559038712, 46.68621039810929],
                desc: {
                    ar: "مطعم عالمي متخصص في تقديم السيتيك بصلصة المنتريكو.",
                    en: "An international restaurant specializing in serving steak with Entrecôte sauce."
                },
                img: "assets/images/Riyadh Restaurants/img63.png",
                link: "https://cafedeparis.com/"
            },
            {
                name: {
                    ar: "Café de Paris Entrecôte",
                    en: "Café de Paris Entrecôte"
                },
                coords: [24.695030483394575, 46.63402534196606],
                desc: {
                    ar: "مطعم عالمي متخصص في تقديم السيتيك بصلصة المنتريكو.",
                    en: "An international restaurant specializing in serving steak with Entrecôte sauce."
                },
                img: "assets/images/Riyadh Restaurants/img64.png",
                link: "https://cafedeparis.com/"
            },
            {
                name: {
                    ar: "Oulu",
                    en: "Oulu"
                },
                coords: [24.706888196783005, 46.70676702204065],
                desc: {
                    ar: "مطعم إيطالي يقدم البيتزا والمقبلات الإيطالية بأجواء راقية.",
                    en: "An Italian restaurant serving pizza and Italian appetizers in an elegant atmosphere."
                },
                img: "assets/images/Riyadh Restaurants/img66.png",
                link: "https://oulu.sa/"
            },
            {
                name: {
                    ar: "Parker's",
                    en: "Parker's"
                },
                coords: [24.69246312875866, 46.622682308509454],
                desc: {
                    ar: "يقدم أطباق إفطار متنوعة ويتميز بأجواء جميلة وتصميم مميز.",
                    en: "Serves a variety of breakfast dishes and features beautiful atmosphere and distinctive design."
                },
                img: "assets/images/Riyadh Restaurants/img68.png",
                link: "https://parkers.sa/"
            }
        ];

        // بيانات المعالم التاريخية
        const historicalLandmarks = [{
                name: {
                    ar: "ميدان العدل - قصر المصمك",
                    en: "Justice Square - Al Masmak Palace"
                },
                coords: [24.630873983362203, 46.71182204877646],
                desc: {
                    ar: "ميدان العدل من أبرز المعالم التاريخية، ميدان العدل ميدان قديم محاط بمباني حكومية وأسواق تقليدية ومقاهي، وكان مقرًا للدوائر العدلية سابقاً، بينما قصر المصمك حصن تاريخي من عام 1865 اشتهر باستعادة الرياض على يد الملك عبد العزيز عام 1902، ويعمل اليوم متحفًا يعرض تاريخ المدينة والمملكة",
                    en: "Justice Square is one of the most prominent historical landmarks. Justice Square is an old square surrounded by government buildings, traditional markets, and cafes, and was previously the headquarters of judicial departments. Meanwhile, Al Masmak Palace is a historical fortress from 1865, famous for the recapture of Riyadh by King Abdulaziz in 1902, and today operates as a museum displaying the history of the city and the Kingdom"
                },
                district: {
                    ar: "الديرة",
                    en: "Al-Dira"
                },
                link: "https://maps.app.goo.gl/EesVPK2jchxvH6q59?g_st=ipc"
            },
            {
                name: {
                    ar: "مطل البجيري",
                    en: "Bujairi Terrace"
                },
                coords: [24.73745969831128, 46.574840819111145],
                desc: {
                    ar: "مطل البجيري هو منطقة سياحية بطراز نجدي يجمع بين العراقة والحداثة، يضم مطاعم ومقاهي فاخرة حاصلة على تقييمات عالية، ويطل على حي الطريف التاريخي المدرج ضمن التراث العالمي لليونسكو، وقد أُعيد افتتاحه في ديسمبر 2022 ليصبح وجهة بارزة للزوار والسياح",
                    en: "Bujairi Terrace is a tourist area with a Najdi style that combines authenticity and modernity. It includes luxury restaurants and cafes with high ratings, overlooking the historic At-Turaif district, which is listed as a UNESCO World Heritage site. It was reopened in December 2022 to become a prominent destination for visitors and tourists"
                },
                district: {
                    ar: "الدرعية",
                    en: "Diriyah"
                },
                link: "https://maps.app.goo.gl/UQ233pbJJNx2ssBf8?g_st=ipc"
            },
            {
                name: {
                    ar: "السمحانية",
                    en: "Al-Samhaniyah"
                },
                coords: [24.741468381909346, 46.571562503768774],
                desc: {
                    ar: "السمحانية حي تراثي يعكس الطراز المعماري النجدي القديم، يتميز بتصميمه التقليدي ومبانيه القديمة، وقد جُهز حديثًا ليصبح وجهة سياحية تشمل مقاهي ومطاعم ومتاجر محافظًا على أصالته التاريخية، يعتبر مكان مناسب للتجول، التصوير، والاستمتاع بأجواء التراث السعودي",
                    en: "Al-Samhaniyah is a heritage district that reflects the old Najdi architectural style. It is characterized by its traditional design and old buildings, and has recently been prepared to become a tourist destination including cafes, restaurants, and shops while preserving its historical authenticity. It is considered a suitable place for strolling, photography, and enjoying the atmosphere of Saudi heritage"
                },
                district: {
                    ar: "الدرعية",
                    en: "Diriyah"
                },
                link: "https://maps.app.goo.gl/pTWkFZBd1vDAAWMf8?g_st=ipc"
            },
            {
                name: {
                    ar: "الزلال",
                    en: "Al-Zalal"
                },
                coords: [24.73840585303478, 46.577365888426655],
                desc: {
                    ar: "الزلال مشروع سياحي وثقافي وتجاري متعدد الاستخدامات في منطقة البجيري، يضم مساحات مكتبية وتجارية ومطاعم ومقاهي، ويهدف لأن يكون وجهة حيوية تجمع بين الثقافة والإبداع والترفيه بطراز معماري نجدي، وتم افتتاحه مؤخراً عام 2025",
                    en: "Al-Zalal is a multi-purpose tourist, cultural, and commercial project in the Bujairi area. It includes office and commercial spaces, restaurants, and cafes, and aims to be a vibrant destination that combines culture, creativity, and entertainment with a Najdi architectural style. It was recently opened in 2025"
                },
                district: {
                    ar: "الدرعية",
                    en: "Diriyah"
                },
                link: "https://maps.app.goo.gl/qKnsLyk43aAr6omBA?g_st=ipc"
            },
            {
                name: {
                    ar: "محطة قصر الحكم",
                    en: "Qasr Al-Hukm Station"
                },
                coords: [24.628609785962684, 46.71624410377225],
                desc: {
                    ar: "محطة قصر الحكم هي محطة رئيسية لمترو الرياض على المسارين الأزرق والبرتقالي، افتتحت عام 2025، وتصميمها يمزج الحداثة بالأصالة مع مرافق حديثة وحديقة للراحة، وتتميز بتصميمها المستوحى من مبادئ «العمارة السلمانية»، تقع بالقرب من الأسواق التاريخية وتعد نقطة نقل مهمة للزوار والمقيمين",
                    en: "Qasr Al-Hukm Station is a main station for the Riyadh Metro on the Blue and Orange lines. It opened in 2025, and its design blends modernity with authenticity with modern facilities and a rest garden. It is distinguished by its design inspired by the principles of 'Salmani Architecture'. It is located near historical markets and is an important transportation point for visitors and residents"
                },
                district: {
                    ar: "القري، الرياض",
                    en: "Al-Qura, Riyadh"
                },
                link: "https://maps.app.goo.gl/7GevbasXVXLT9Air7?g_st=ipc"
            }
        ];

        // بيانات المعالم السياحية
        const touristLandmarks = [{
                name: {
                    ar: "البوليفارد سيتي",
                    en: "Boulevard City"
                },
                coords: [24.769552231219095, 46.60470986901164],
                desc: {
                    ar: "البوليفارد سيتي هو مشروع ترفيهي وتجاري ضخم يقع في قلب الرياض بحي حطين، يضم مجموعة متنوعة من المطاعم والمقاهي والمتاجر والأنشطة الترفيهية. يتميز بتصميمه العصري والحديث الذي يجمع بين الفخامة والترفيه، ويوفر تجربة تسوق وترفيه متكاملة للزوار والعائلات.",
                    en: "Boulevard City is a massive entertainment and commercial project located in the heart of Riyadh in Hittin District, featuring a variety of restaurants, cafes, shops, and entertainment activities. It is distinguished by its modern and contemporary design that combines luxury and entertainment, providing an integrated shopping and entertainment experience for visitors and families."
                },
                district: {
                    ar: "حي حطين",
                    en: "Hittin District"
                },
                img: "assets/boulevard city/img1.png",
                link: "events/riyadh-season/index.html"
            },
            {
                name: {
                    ar: "وندر جاردن",
                    en: "Wander Garden"
                },
                coords: [24.80475544145044, 46.579320588424864],
                desc: {
                    ar: "وندر جاردن هو وجهة ترفيهية مميزة ضمن فعاليات موسم الرياض، يجمع بين الطبيعة الخلابة والأنشطة الترفيهية المتنوعة. يتميز بتصميمه الفريد الذي يدمج بين الحدائق الطبيعية والمساحات المفتوحة، ويوفر تجربة استرخاء وترفيه فريدة للزوار والعائلات في أجواء طبيعية ساحرة.",
                    en: "Wander Garden is a distinctive entertainment destination within Riyadh Season activities, combining stunning nature with diverse entertainment activities. It is distinguished by its unique design that integrates natural gardens and open spaces, providing a unique relaxation and entertainment experience for visitors and families in charming natural settings."
                },
                district: {
                    ar: "حي الملقا",
                    en: "Al-Malqa District"
                },
                img: "assets/wander garden/wg_img1.png",
                link: "events/riyadh-season/index.html#wander-garden"
            },
            {
                name: {
                    ar: "البوليفارد وورد",
                    en: "Boulevard World"
                },
                coords: [24.774134933719196, 46.59978173260336],
                desc: {
                    ar: "هو المكان الذي يمكنك فيه التعرف على عدة حضارات والتجول بين ثقافاتها المختلفة وهذا العام يمنحكم تجربة خيالية بتوسع نوعي يضيف ثلاث مناطق جديدة إلى جانب تطوير عدد من المناطق المفضلة لدى الزوار في المواسم السابقة بما يمنحهم تجربة أعمق في استكشاف ثقافات العالم.",
                    en: "is the place where you can discover multiple civilizations and explore their different cultures. This year offers you a fantastic experience with a qualitative expansion that adds three new areas alongside the development of a number of visitor-favorite areas from previous seasons, giving them a deeper experience in exploring world cultures."
                },
                district: {
                    ar: "الرياض",
                    en: "Riyadh"
                },
                img: "assets/images/Boulevard World/img1.png",
                link: "events/riyadh-season/index.html#boulevard-world"
            }
        ];

        let riyadhMap;
        let cafeMarkers = [];
        let restaurantMarkers = [];
        let landmarkMarkers = [];
        let touristMarkers = [];

        // تهيئة الخريطة
        function initRiyadhMap() {
            try {
                const mapElement = document.getElementById('riyadhMap');
                if (!mapElement) {
                    console.error('Map element not found');
                    return;
                }

                if (riyadhMap) {
                    riyadhMap.remove();
                    riyadhMap = null;
                }

                // إنشاء الخريطة
                riyadhMap = L.map('riyadhMap', {
                    center: [24.7136, 46.6753],
                    zoom: 12,
                    zoomControl: true
                });

                // إضافة طبقة الخريطة من OpenStreetMap
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 18,
                    minZoom: 10,
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(riyadhMap);

                // إضافة علامات للمقاهي
                cafeMarkers = [];
                cafes.forEach((cafe, index) => {
                    const marker = L.marker(cafe.coords, {
                        icon: L.icon({
                            iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-blue.png',
                            shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
                            iconSize: [25, 41],
                            iconAnchor: [12, 41],
                            popupAnchor: [1, -34],
                            shadowSize: [41, 41]
                        })
                    }).addTo(riyadhMap);
                    cafeMarkers.push(marker);

                    updateCafeMarkerPopup(marker, cafe);
                });

                // إضافة علامات للمطاعم الشعبية
                traditionalRestaurants.forEach((restaurant, index) => {
                    const marker = L.marker(restaurant.coords, {
                        icon: L.icon({
                            iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-red.png',
                            shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
                            iconSize: [25, 41],
                            iconAnchor: [12, 41],
                            popupAnchor: [1, -34],
                            shadowSize: [41, 41]
                        })
                    }).addTo(riyadhMap);
                    restaurantMarkers.push(marker);

                    updateRestaurantMarkerPopup(marker, restaurant);
                });

                // إضافة علامات للمطاعم العالمية
                internationalRestaurants.forEach((restaurant, index) => {
                    const marker = L.marker(restaurant.coords, {
                        icon: L.icon({
                            iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-green.png',
                            shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
                            iconSize: [25, 41],
                            iconAnchor: [12, 41],
                            popupAnchor: [1, -34],
                            shadowSize: [41, 41]
                        })
                    }).addTo(riyadhMap);
                    restaurantMarkers.push(marker);

                    updateRestaurantMarkerPopup(marker, restaurant);
                });

                // إضافة علامات للمعالم التاريخية
                landmarkMarkers = [];
                historicalLandmarks.forEach((landmark, index) => {
                    const marker = L.marker(landmark.coords, {
                        icon: L.icon({
                            iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-orange.png',
                            shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
                            iconSize: [25, 41],
                            iconAnchor: [12, 41],
                            popupAnchor: [1, -34],
                            shadowSize: [41, 41]
                        })
                    }).addTo(riyadhMap);
                    landmarkMarkers.push(marker);

                    updateLandmarkMarkerPopup(marker, landmark);
                });

                // إضافة علامات للمعالم السياحية
                touristMarkers = [];
                touristLandmarks.forEach((landmark, index) => {
                    const marker = L.marker(landmark.coords, {
                        icon: L.icon({
                            iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-violet.png',
                            shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
                            iconSize: [25, 41],
                            iconAnchor: [12, 41],
                            popupAnchor: [1, -34],
                            shadowSize: [41, 41]
                        })
                    }).addTo(riyadhMap);
                    touristMarkers.push(marker);

                    updateTouristMarkerPopup(marker, landmark);
                });

                // إعادة رسم الخريطة بعد تحميلها
                setTimeout(function() {
                    if (riyadhMap) {
                        riyadhMap.invalidateSize();
                    }
                }, 100);

                console.log('Riyadh map initialized successfully with', cafes.length, 'cafes,', (traditionalRestaurants.length + internationalRestaurants.length), 'restaurants,', historicalLandmarks.length, 'historical landmarks, and', touristLandmarks.length, 'tourist landmarks');
            } catch (error) {
                console.error('Error in initRiyadhMap:', error);
            }
        }

        // تحديث محتوى النافذة المنبثقة للعلامة
        function updateCafeMarkerPopup(marker, cafe) {
            const lang = currentLanguage || 'ar';
            const popupContent = `
                <div style="text-align: right; direction: rtl; min-width: 250px;">
                    <h3 style="color: var(--color4); margin-bottom: 10px; font-size: 1.2rem;">${cafe.name[lang]}</h3>
                    <img src="${cafe.img}" alt="${cafe.name[lang]}" style="width: 200px; height: 150px; object-fit: cover; border-radius: 8px; margin: 10px 0;">
                    <p style="margin: 10px 0; font-size: 0.9rem; line-height: 1.6;">${cafe.desc[lang]}</p>
                    <a href="${cafe.link}" target="_blank" style="display: inline-block; background: linear-gradient(45deg, var(--color4), var(--color5)); color: white; padding: 8px 16px; border-radius: 20px; text-decoration: none; font-weight: bold; margin-top: 10px;">${lang === 'ar' ? 'زيارة الموقع' : 'Visit Website'}</a>
                </div>
            `;

            marker.bindPopup(popupContent);
        }

        // تحديث محتوى النافذة المنبثقة للمطعم
        function updateRestaurantMarkerPopup(marker, restaurant) {
            const lang = currentLanguage || 'ar';
            const popupContent = `
                <div style="text-align: right; direction: rtl; min-width: 250px;">
                    <h3 style="color: var(--color4); margin-bottom: 10px; font-size: 1.2rem;">${restaurant.name[lang]}</h3>
                    <img src="${restaurant.img}" alt="${restaurant.name[lang]}" style="width: 200px; height: 150px; object-fit: cover; border-radius: 8px; margin: 10px 0;">
                    <p style="margin: 10px 0; font-size: 0.9rem; line-height: 1.6;">${restaurant.desc[lang]}</p>
                    <a href="${restaurant.link}" target="_blank" style="display: inline-block; background: linear-gradient(45deg, var(--color4), var(--color5)); color: white; padding: 8px 16px; border-radius: 20px; text-decoration: none; font-weight: bold; margin-top: 10px;">${lang === 'ar' ? 'قائمة الطعام' : 'Menu'}</a>
                </div>
            `;

            marker.bindPopup(popupContent);
        }

        // تحديث محتوى النافذة المنبثقة للمعلم التاريخي
        function updateLandmarkMarkerPopup(marker, landmark) {
            const lang = currentLanguage || 'ar';
            const popupContent = `
                <div style="text-align: right; direction: rtl; min-width: 250px;">
                    <h3 style="color: var(--color4); margin-bottom: 10px; font-size: 1.2rem;">${landmark.name[lang]}</h3>
                    <p style="margin: 10px 0; font-size: 0.9rem; line-height: 1.6;">${landmark.desc[lang]}</p>
                    <p style="margin: 5px 0; font-size: 0.85rem; color: #666;"><strong>${lang === 'ar' ? 'الحي:' : 'District:'}</strong> ${landmark.district[lang]}</p>
                    <a href="${landmark.link}" target="_blank" style="display: inline-block; background: linear-gradient(45deg, var(--color4), var(--color5)); color: white; padding: 8px 16px; border-radius: 20px; text-decoration: none; font-weight: bold; margin-top: 10px;">${lang === 'ar' ? 'الموقع على الخريطة' : 'View on Map'}</a>
                </div>
            `;

            marker.bindPopup(popupContent);
        }

        // تحديث محتوى النافذة المنبثقة للمعلم السياحي
        function updateTouristMarkerPopup(marker, landmark) {
            const lang = currentLanguage || 'ar';
            const imageHtml = landmark.img ? `<img src="${landmark.img}" alt="${landmark.name[lang]}" style="width: 200px; height: 150px; object-fit: cover; border-radius: 8px; margin: 10px 0;">` : '';
            const popupContent = `
                <div style="text-align: right; direction: rtl; min-width: 250px;">
                    <h3 style="color: var(--color4); margin-bottom: 10px; font-size: 1.2rem;">${landmark.name[lang]}</h3>
                    ${imageHtml}
                    <p style="margin: 10px 0; font-size: 0.9rem; line-height: 1.6;">${landmark.desc[lang]}</p>
                    <p style="margin: 5px 0; font-size: 0.85rem; color: #666;"><strong>${lang === 'ar' ? 'الحي:' : 'District:'}</strong> ${landmark.district[lang]}</p>
                    <a href="${landmark.link}" style="display: inline-block; background: linear-gradient(45deg, var(--color4), var(--color5)); color: white; padding: 8px 16px; border-radius: 20px; text-decoration: none; font-weight: bold; margin-top: 10px;">${lang === 'ar' ? 'زيارة الصفحة' : 'Visit Page'}</a>
                </div>
            `;

            marker.bindPopup(popupContent);
        }

        // تحديث الخريطة عند تغيير اللغة
        function updateMapLanguage() {
            if (riyadhMap && cafeMarkers.length > 0) {
                cafes.forEach((cafe, index) => {
                    if (cafeMarkers[index]) {
                        updateCafeMarkerPopup(cafeMarkers[index], cafe);
                    }
                });
            }
            if (riyadhMap && restaurantMarkers.length > 0) {
                let restaurantIndex = 0;
                traditionalRestaurants.forEach((restaurant, index) => {
                    if (restaurantMarkers[restaurantIndex]) {
                        updateRestaurantMarkerPopup(restaurantMarkers[restaurantIndex], restaurant);
                    }
                    restaurantIndex++;
                });
                internationalRestaurants.forEach((restaurant, index) => {
                    if (restaurantMarkers[restaurantIndex]) {
                        updateRestaurantMarkerPopup(restaurantMarkers[restaurantIndex], restaurant);
                    }
                    restaurantIndex++;
                });
            }
            if (riyadhMap && landmarkMarkers.length > 0) {
                historicalLandmarks.forEach((landmark, index) => {
                    if (landmarkMarkers[index]) {
                        updateLandmarkMarkerPopup(landmarkMarkers[index], landmark);
                    }
                });
            }
            if (riyadhMap && touristMarkers.length > 0) {
                touristLandmarks.forEach((landmark, index) => {
                    if (touristMarkers[index]) {
                        updateTouristMarkerPopup(touristMarkers[index], landmark);
                    }
                });
            }
        }

        // تعديل دالة changeLanguage لتحديث الخريطة
        const originalChangeLanguage = changeLanguage;
        changeLanguage = function(lang) {
            originalChangeLanguage(lang);
            if (riyadhMap) {
                updateMapLanguage();
            }
        };

        // تهيئة الخريطة بعد تحميل الصفحة
        function initializeMapWhenReady() {
            const mapElement = document.getElementById('riyadhMap');
            if (typeof L !== 'undefined' && mapElement) {
                setTimeout(function() {
                    try {
                        initRiyadhMap();
                    } catch (error) {
                        console.error('Error initializing map:', error);
                        setTimeout(initializeMapWhenReady, 1000);
                    }
                }, 500);
            } else {
                setTimeout(initializeMapWhenReady, 100);
            }
        }

        // محاولة التهيئة عند تحميل DOM
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', function() {
                setTimeout(initializeMapWhenReady, 500);
            });
        } else {
            setTimeout(initializeMapWhenReady, 500);
        }

        // أيضاً عند تحميل الصفحة بالكامل
        window.addEventListener('load', function() {
            if (!riyadhMap) {
                setTimeout(initializeMapWhenReady, 500);
            }
        });
    </script>
</body>

</html>