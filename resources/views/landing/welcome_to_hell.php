<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>A Clothing Studio · fresh unisex & boys</title>

  <!-- Fonts & Icons -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;1,400&family=Plus+Jakarta+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <style>
    /* ----- RESET / FRESH BASE ----- */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      background: linear-gradient(145deg, #faf3f0 0%, #f0eae4 100%);
      font-family: 'Plus Jakarta Sans', sans-serif;
      color: #2d2a27;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 1.2rem;
      transition: background 0.2s;
    }

    /* main card — fresh, airy, soft */
    .studio-card {
      max-width: 1300px;
      width: 100%;
      background: rgba(255, 255, 255, 0.85);
      backdrop-filter: blur(12px);
      border-radius: 48px 48px 36px 36px;
      box-shadow: 
        0 35px 55px -25px rgba(140, 100, 80, 0.3),
        0 8px 20px -8px rgba(0,0,0,0.1),
        inset 0 1px 1px #ffffffdd;
      display: flex;
      flex-direction: column;
      overflow: hidden;
      transition: all 0.25s ease;
      border: 1px solid #ffffff60;
    }

    /* ----- HERO WITH ONLINE IMAGE ----- */
    .hero-grid {
      display: flex;
      flex-wrap: wrap;
      min-height: 560px;
    }

    .hero-content {
      flex: 1 1 50%;
      padding: 3.8rem 3rem 3rem 3.8rem;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .pre-title {
      font-family: 'Playfair Display', serif;
      font-size: 0.9rem;
      letter-spacing: 0.45em;
      text-transform: uppercase;
      color: #b98772;    /* soft terracotta */
      margin-bottom: 0.8rem;
      font-weight: 400;
    }

    h1 {
      font-family: 'Playfair Display', serif;
      font-size: clamp(2.8rem, 6vw, 4.5rem);
      font-weight: 600;
      line-height: 1.1;
      color: #25211e;
      margin-bottom: 1rem;
    }

    .accent-text {
      color: #e07f5c;    /* fresh peach */
      font-style: italic;
      font-weight: 400;
      display: inline-block;
    }

    .hero-description {
      font-size: 1.1rem;
      max-width: 500px;
      color: #4a403a;
      font-weight: 300;
      margin-bottom: 2.2rem;
      border-left: 4px solid #f5c1a0;
      padding-left: 1.5rem;
      background: rgba(255,255,240,0.3);
      border-radius: 0 8px 8px 0;
    }

    /* ----- ONLY ONE BUTTON (DOWNLOAD) ----- */
    .btn-group {
      display: flex;
      margin-top: 0.5rem;
    }

    .btn-download {
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-weight: 600;
      font-size: 1.1rem;
      letter-spacing: 0.02em;
      padding: 1.2rem 3.2rem;
      border-radius: 60px;
      background: #e07f5c;
      color: #ffffff;
      border: none;
      box-shadow: 0 12px 22px -12px #e07f5c, 0 3px 0 0 #b14e2e inset;
      transition: all 0.2s ease;
      cursor: pointer;
      display: inline-flex;
      align-items: center;
      gap: 12px;
      text-decoration: none;
      border: 1px solid #ffb08a;
    }

    .btn-download i {
      font-size: 1.3rem;
      transition: transform 0.2s;
    }

    .btn-download:hover {
      background: #d46f4a;
      box-shadow: 0 16px 26px -12px #c06744, 0 2px 0 0 #a04020 inset;
      transform: translateY(-2px);
    }

    .btn-download:hover i {
      transform: translateY(-2px);
    }

    /* --- ONLINE IMAGE (fresh fashion) --- */
    .hero-visual {
      flex: 1 1 45%;
      min-height: 400px;
      background: #e6d9d0;
      position: relative;
      overflow: hidden;
      border-radius: 0 0 0 60px;
    }

    .hero-visual img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
      transition: transform 6s ease;
    }

    .hero-visual:hover img {
      transform: scale(1.03);
    }

    .image-overlay {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      background: linear-gradient(to top, rgba(255,245,235,0.6) 0%, transparent 80%);
      padding: 2.5rem 2rem;
      display: flex;
      justify-content: flex-start;
      pointer-events: none;
    }

    .fancy-quote {
      background: rgba(255, 255, 255, 0.75);
      backdrop-filter: blur(12px);
      padding: 1rem 2rem 1rem 1.8rem;
      border-radius: 50px 50px 50px 10px;
      font-family: 'Playfair Display', serif;
      font-size: 1.2rem;
      color: #2f2621;
      box-shadow: 0 15px 30px -20px #b2a089;
      border: 1px solid #ffffffdd;
      pointer-events: none;
    }

    /* ----- SIGNATURE COLLECTION (original) ----- */
    .collection-section {
      padding: 2.5rem 3rem 2.8rem 3rem;
      background: #fffcf8;
      border-top: 2px solid #ffe7da;
    }

    .section-tag {
      display: flex;
      align-items: center;
      gap: 18px;
      margin-bottom: 2.2rem;
    }
    .section-tag h2 {
      font-family: 'Playfair Display', serif;
      font-weight: 400;
      font-size: 1.9rem;
      color: #5d4a3c;
    }
    .gold-line {
      height: 2px;
      width: 70px;
      background: #f1c8b0;
    }

    .item-grid {
      display: flex;
      gap: 2rem;
      flex-wrap: wrap;
      justify-content: space-between;
    }

    .collection-item {
      flex: 1 1 160px;
      min-width: 140px;
      background: white;
      border-radius: 32px;
      padding: 1.8rem 0.8rem 1.2rem 0.8rem;
      text-align: center;
      box-shadow: 0 18px 30px -18px #cbad94;
      transition: all 0.3s cubic-bezier(0.15,0.75,0.3,1.1);
      border: 1px solid #fdeee5;
      cursor: default;
    }
    .collection-item:hover {
      transform: translateY(-10px);
      border-color: #eebc9e;
      box-shadow: 0 28px 35px -18px #c89371;
    }

    .item-icon {
      font-size: 2.8rem;
      color: #d68d6b;
      margin-bottom: 0.7rem;
    }
    .item-title {
      font-weight: 600;
      color: #433a34;
      margin-bottom: 0.3rem;
      font-size: 1.1rem;
    }
    .item-sub {
      font-size: 0.75rem;
      color: #b2907a;
      text-transform: uppercase;
      letter-spacing: 0.06em;
    }

    /* ----- UNIQUE BOYS' SECTION (asymmetric grid) ----- */
    .boys-section {
      padding: 3rem 3rem 3.5rem 3rem;
      background: #f4ebe5;  /* warm tone for distinction */
      border-top: 2px solid #e7cfbf;
      border-bottom: 2px solid #e7cfbf;
    }

    .boys-grid {
      display: grid;
      grid-template-columns: 1.5fr 1fr 1.3fr;  /* asymmetric columns */
      gap: 1.8rem;
      margin-top: 2rem;
    }

    .boy-card {
      position: relative;
      border-radius: 28px;
      overflow: hidden;
      box-shadow: 0 18px 25px -12px #b68b74;
      transition: all 0.35s ease;
      background: #fff;
      aspect-ratio: 3 / 4;  /* consistent shape */
    }

    /* specific spans for asymmetry */
    .boy-card:nth-child(1) {
      grid-row: span 2;      /* tall left */
      aspect-ratio: 3 / 5;   /* even taller */
    }
    .boy-card:nth-child(2) {
      grid-column: 2;
      grid-row: 1;
    }
    .boy-card:nth-child(3) {
      grid-column: 2;
      grid-row: 2;
    }
    .boy-card:nth-child(4) {
      grid-row: span 2;      /* tall right */
      aspect-ratio: 3 / 5;
    }

    .boy-card img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
      transition: transform 0.6s cubic-bezier(0.2, 0.9, 0.3, 1);
    }

    .boy-card:hover {
      box-shadow: 0 25px 35px -10px #a56544;
    }

    .boy-card:hover img {
      transform: scale(1.07);
    }

    /* overlay with text – appears on hover (unique) */
    .boy-overlay {
      position: absolute;
      inset: 0;
      background: linear-gradient(to top, rgba(30,20,15,0.7) 0%, transparent 50%);
      display: flex;
      flex-direction: column;
      justify-content: flex-end;
      padding: 1.5rem;
      opacity: 0;
      transition: opacity 0.3s ease;
      color: white;
      font-family: 'Playfair Display', serif;
    }

    .boy-card:hover .boy-overlay {
      opacity: 1;
    }

    .boy-overlay h3 {
      font-size: 1.4rem;
      font-weight: 500;
      margin-bottom: 0.2rem;
      transform: translateY(10px);
      transition: transform 0.3s ease 0.05s;
    }

    .boy-overlay p {
      font-size: 0.8rem;
      letter-spacing: 0.1em;
      text-transform: uppercase;
      font-family: 'Plus Jakarta Sans', sans-serif;
      opacity: 0.8;
      transform: translateY(10px);
      transition: transform 0.3s ease 0.1s;
    }

    .boy-card:hover .boy-overlay h3,
    .boy-card:hover .boy-overlay p {
      transform: translateY(0);
    }

    /* small label for boys section */
    .boys-note {
      text-align: right;
      margin-top: 1.8rem;
      font-style: italic;
      color: #8b6f5e;
      font-size: 0.95rem;
      border-bottom: 1px dashed #d6b6a2;
      padding-bottom: 0.3rem;
      display: inline-block;
      float: right;
    }

    /* ----- NEW ABOUT US SECTION (fresh & stylish) ----- */
    .about-section {
      padding: 3.5rem 3rem 3.5rem 3rem;
      background: #faf3ed;  /* soft, welcoming */
      border-top: 2px solid #ffe1cf;
      display: flex;
      flex-wrap: wrap;
      gap: 2rem;
      align-items: center;
    }

    .about-text {
      flex: 2 1 300px;
    }

    .about-text h2 {
      font-family: 'Playfair Display', serif;
      font-size: 2.2rem;
      font-weight: 400;
      color: #362d27;
      margin-bottom: 1rem;
      display: flex;
      align-items: center;
      gap: 12px;
    }

    .about-text h2 i {
      color: #e07f5c;
      font-size: 2rem;
    }

    .about-text p {
      font-size: 1.1rem;
      line-height: 1.6;
      color: #4d4038;
      margin-bottom: 1.5rem;
      max-width: 650px;
    }

    .about-signature {
      font-family: 'Playfair Display', serif;
      font-size: 1.3rem;
      color: #b98772;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .about-signature i {
      font-size: 1.8rem;
      color: #d68d6b;
    }

    .about-stats {
      flex: 1 1 200px;
      display: flex;
      flex-direction: column;
      gap: 1.5rem;
      background: rgba(255,255,255,0.5);
      backdrop-filter: blur(4px);
      padding: 2rem;
      border-radius: 32px;
      box-shadow: 0 15px 25px -12px #c9ad9a;
      border: 1px solid #ffffffb0;
    }

    .stat-item {
      text-align: center;
    }

    .stat-number {
      font-family: 'Playfair Display', serif;
      font-size: 2.4rem;
      font-weight: 600;
      color: #e07f5c;
      line-height: 1;
    }

    .stat-label {
      font-size: 0.9rem;
      letter-spacing: 0.05em;
      color: #6b5343;
      text-transform: uppercase;
    }

    /* ----- FOOTER (enhanced) ----- */
    .studio-footer {
      padding: 2rem 3rem 2rem 3rem;
      background: #e9dbd0;  /* warmer, matches about */
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      align-items: center;
      gap: 1.5rem;
      border-top: 2px solid #dabdac;
      font-size: 0.95rem;
      color: #4f3f36;
    }

    .footer-links {
      display: flex;
      gap: 2rem;
      flex-wrap: wrap;
    }

    .footer-links a {
      color: #5f463a;
      text-decoration: none;
      font-weight: 500;
      transition: 0.15s;
      border-bottom: 1px solid transparent;
    }

    .footer-links a:hover {
      color: #e07f5c;
      border-bottom-color: #e07f5c;
    }

    .social-links a {
      color: #7a5e4e;
      margin-left: 1.2rem;
      font-size: 1.3rem;
      transition: 0.2s;
    }

    .social-links a:hover {
      color: #e07f5c;
      transform: translateY(-2px);
    }

    /* dynamic hint (kept from original) */
    .dynamic-hint {
      margin-top: 2rem;
      font-size: 0.9rem;
      color: #ac8b76;
      display: flex;
      align-items: center;
      gap: 12px;
      border-top: 2px dotted #f0cfbb;
      padding-top: 1.2rem;
    }
    #clickFeedback {
      background: #fae5d9;
      padding: 0.4rem 1.2rem;
      border-radius: 50px;
      font-size: 0.85rem;
      font-weight: 500;
      color: #6c4f3f;
    }
  </style>
</head>
<body>

<div class="studio-card">
  <!-- hero with online fashion image -->
  <div class="hero-grid">
    <div class="hero-content">
      <div class="pre-title">✦ A CLOTHING STUDIO ✦</div>
      <h1>
        style that<br>
        <span class="accent-text">moves with you</span>
      </h1>
      <p class="hero-description">
        Contemporary cuts, natural comfort. From studio to street —<br> 
        fashion that feels as good as it looks.
      </p>
      <!-- ONLY ONE BUTTON: DOWNLOAD GAME (PLAY STORE) -->
      <div class="btn-group">
        <a href="https://play.google.com/store/apps/details?id=com.lasttap13&hl=en_IN" 
           class="btn-download" 
           target="_blank" 
           rel="noopener noreferrer">
          <i class="fa-brands fa-google-play"></i> Download game
        </a>
      </div>
      <!-- dynamic hint remains playful -->
      <div class="dynamic-hint">
        <i class="fa-regular fa-hand-point-right"></i>
        <span id="clickFeedback">tap the button ✦ fresh experience</span>
      </div>
    </div>

    <!-- ONLINE FASHION IMAGE (high quality Unsplash) -->
    <div class="hero-visual">
      <img src="https://images.unsplash.com/photo-1469334031218-e382a71b716b?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" 
           alt="Fashion model in studio — fresh style"
           loading="lazy">
      <div class="image-overlay">
        <div class="fancy-quote">
          <i class="fa-regular fa-heart"></i> fresh edition · spring feel
        </div>
      </div>
    </div>
  </div>

  <!-- SIGNATURE COLLECTION (unisex / women) -->
  <div class="collection-section">
    <div class="section-tag">
      <span class="gold-line"></span>
      <h2>signature collection</h2>
      <span class="gold-line"></span>
    </div>

    <div class="item-grid" id="collectionGrid">
      <div class="collection-item" data-category="jackets">
        <div class="item-icon"><i class="fa-regular fa-sun"></i></div>
        <div class="item-title">lightweight jackets</div>
        <div class="item-sub">linen · cotton</div>
      </div>
      <div class="collection-item" data-category="shirts">
        <div class="item-icon"><i class="fa-regular fa-star"></i></div>
        <div class="item-title">flowy shirts</div>
        <div class="item-sub">silk · eco viscose</div>
      </div>
      <div class="collection-item" data-category="trousers">
        <div class="item-icon"><i class="fa-regular fa-moon"></i></div>
        <div class="item-title">wide-leg trousers</div>
        <div class="item-sub">organic cotton</div>
      </div>
      <div class="collection-item" data-category="accessories">
        <div class="item-icon"><i class="fa-regular fa-gem"></i></div>
        <div class="item-title">natural accessories</div>
        <div class="item-sub">wood · linen</div>
      </div>
    </div>

    <!-- dynamic js message area -->
    <div style="text-align:right; margin-top:1.2rem; font-style:italic; opacity:0.7;" id="dynamicMessage">
      <span id="styleMessage">hand‑finished with fresh air</span>
    </div>
  </div>

  <!-- UNIQUE BOYS' EDIT — asymmetric & overlay hover -->
  <div class="boys-section">
    <div class="section-tag">
      <span class="gold-line"></span>
      <h2>boys' edit · raw edge</h2>
      <span class="gold-line"></span>
    </div>

    <div class="boys-grid">
      <!-- card 1 - tall left -->
      <div class="boy-card">
        <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="urban jacket">
        <div class="boy-overlay">
          <h3>urban jacket</h3>
          <p>cotton · relaxed</p>
        </div>
      </div>
      <!-- card 2 - top right small -->
      <div class="boy-card">
        <img src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="knit sweater">
        <div class="boy-overlay">
          <h3>knit sweater</h3>
          <p>merino · slim</p>
        </div>
      </div>
      <!-- card 3 - bottom right small -->
      <div class="boy-card">
        <img src="https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="linen shirt">
        <div class="boy-overlay">
          <h3>linen shirt</h3>
          <p>natural · breathable</p>
        </div>
      </div>
      <!-- card 4 - tall right -->
      <div class="boy-card">
        <img src="https://images.unsplash.com/photo-1534030347209-467a5b0ad3e6?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="tailored coat">
        <div class="boy-overlay">
          <h3>tailored coat</h3>
          <p>wool · structured</p>
        </div>
      </div>
    </div>

    <div class="boys-note">
      <i class="fa-regular fa-compass"></i>  asymmetric · raw edge · hover to reveal
    </div>
  </div>

  <!-- 🆕 ABOUT US SECTION (with stats) -->
  <div class="about-section">
    <div class="about-text">
      <h2><i class="fa-regular fa-pen-to-square"></i> about the studio</h2>
      <p>Founded in 1989, A Clothing Studio began as a small atelier with a passion for timeless craftsmanship. We blend traditional tailoring with contemporary design, using only the finest natural fabrics. Every piece is hand‑finished in our studio, ensuring uniqueness and durability.</p>
      <p>We believe fashion should move with you — effortlessly from studio to street. Our collections are made for real life, with cuts that flatter and fabrics that breathe.</p>
      <div class="about-signature">
        <i class="fa-regular fa-heart"></i> <span>crafted with care, designed to last</span>
      </div>
    </div>
    <div class="about-stats">
      <div class="stat-item">
        <div class="stat-number">35+</div>
        <div class="stat-label">years of craft</div>
      </div>
      <div class="stat-item">
        <div class="stat-number">100%</div>
        <div class="stat-label">natural fibres</div>
      </div>
      <div class="stat-item">
        <div class="stat-number">∞</div>
        <div class="stat-label">timeless styles</div>
      </div>
    </div>
  </div>

  <!-- FOOTER (enhanced) -->
  <div class="studio-footer">
    <div>© A CLOTHING STUDIO — since 1989</div>
    <div class="footer-links">
      <a href="#">journal</a>
      <a href="#">sustainability</a>
      <a href="#">contact</a>
      <a href="#">faq</a>
    </div>
    <div class="social-links">
      <a href="#"><i class="fa-brands fa-instagram"></i></a>
      <a href="#"><i class="fa-brands fa-pinterest-p"></i></a>
      <a href="#"><i class="fa-regular fa-envelope"></i></a>
      <a href="#"><i class="fa-brands fa-tiktok"></i></a>
    </div>
  </div>
</div>

<!-- ERROR-FREE JAVASCRIPT (updated with about section interactions) -->
<script>
  (function() {
    'use strict';

    // DOM elements
    const downloadBtn = document.querySelector('.btn-download');
    const clickFeedback = document.getElementById('clickFeedback');
    const collectionItems = document.querySelectorAll('.collection-item');
    const boyCards = document.querySelectorAll('.boy-card');
    const dynamicMessageSpan = document.getElementById('styleMessage');
    const heroCard = document.querySelector('.studio-card');

    // 1. Download button feedback (only button)
    if (downloadBtn) {
      downloadBtn.addEventListener('click', (e) => {
        if (clickFeedback) {
          clickFeedback.innerText = '🚀 opening Play Store ...';
          setTimeout(() => {
            clickFeedback.innerText = 'tap the button ✦ fresh experience';
          }, 2500);
        }
        heroCard.style.transform = 'scale(1.005)';
        setTimeout(() => heroCard.style.transform = 'scale(1)', 200);
      });
    }

    // 2. Collection items hover (existing)
    collectionItems.forEach((item) => {
      item.addEventListener('mouseenter', function() {
        const category = this.getAttribute('data-category') || 'piece';
        let displayText = '';
        switch(category) {
          case 'jackets': displayText = '☀️ lightweight jacket — breathable'; break;
          case 'shirts': displayText = '✨ flowy shirt — soft touch'; break;
          case 'trousers': displayText = '🌿 wide‑leg trousers — eco fabric'; break;
          case 'accessories': displayText = '🌸 natural accessories — unique'; break;
          default: displayText = 'fresh collection item';
        }
        if (dynamicMessageSpan) dynamicMessageSpan.innerText = displayText;
        const section = document.querySelector('.collection-section');
        if (section) section.style.backgroundColor = '#fffaf5';
      });

      item.addEventListener('mouseleave', function() {
        if (dynamicMessageSpan) dynamicMessageSpan.innerText = 'hand‑finished with fresh air';
        const section = document.querySelector('.collection-section');
        if (section) section.style.backgroundColor = '#fffcf8';
      });

      item.addEventListener('click', (e) => {
        e.stopPropagation();
        const title = item.querySelector('.item-title')?.innerText || 'style';
        if (clickFeedback) {
          clickFeedback.innerText = `✨ you admired ${title}`;
          setTimeout(() => clickFeedback.innerText = 'tap the button ✦ fresh experience', 2000);
        }
      });
    });

    // 3. Unique boys cards interaction (asymmetric)
    boyCards.forEach((card) => {
      card.addEventListener('mouseenter', function() {
        const boysSection = document.querySelector('.boys-section');
        if (boysSection) boysSection.style.backgroundColor = '#f2e3da';
      });
      card.addEventListener('mouseleave', function() {
        const boysSection = document.querySelector('.boys-section');
        if (boysSection) boysSection.style.backgroundColor = '#f4ebe5';
      });
      card.addEventListener('click', (e) => {
        e.stopPropagation();
        const title = card.querySelector('h3')?.innerText || 'boys item';
        if (clickFeedback) {
          clickFeedback.innerText = `✨ ${title} — raw edge style`;
          setTimeout(() => clickFeedback.innerText = 'tap the button ✦ fresh experience', 2000);
        }
      });
    });

    // 4. subtle parallax effect on hero image
    const heroImg = document.querySelector('.hero-visual img');
    if (heroImg) {
      heroImg.addEventListener('mousemove', (e) => {
        const { offsetX, offsetY, target } = e;
        const { width, height } = target;
        const moveX = (offsetX / width - 0.5) * 10;
        const moveY = (offsetY / height - 0.5) * 6;
        target.style.transform = `scale(1.03) translate(${moveX}px, ${moveY}px)`;
      });
      heroImg.addEventListener('mouseleave', () => {
        heroImg.style.transform = 'scale(1) translate(0,0)';
      });
    }

    // 5. pre-title hover effect
    const preTitle = document.querySelector('.pre-title');
    if (preTitle) {
      preTitle.addEventListener('mouseenter', () => {
        preTitle.style.letterSpacing = '0.6em';
        preTitle.style.color = '#e07f5c';
      });
      preTitle.addEventListener('mouseleave', () => {
        preTitle.style.letterSpacing = '0.45em';
        preTitle.style.color = '#b98772';
      });
    }

    // 6. Social / footer links prevent navigation & show feedback
    document.querySelectorAll('.social-links a, .footer-links a').forEach(link => {
      link.addEventListener('click', (e) => {
        e.preventDefault();
        if (clickFeedback) {
          clickFeedback.innerText = '📸 link (demo)';
          setTimeout(() => clickFeedback.innerText = 'tap the button ✦ fresh experience', 1500);
        }
      });
    });

    // 7. Double-click on heading
    const mainHeading = document.querySelector('h1');
    if (mainHeading) {
      mainHeading.addEventListener('dblclick', () => {
        mainHeading.style.color = '#e07f5c';
        setTimeout(() => mainHeading.style.color = '#25211e', 400);
      });
    }

    console.log('✨ A Clothing Studio — about + footer added');
  })();
</script>

<!-- noscript friendly -->
<noscript>
  <div style="background:#f7e4d5; padding:1rem; text-align:center;">
    ✨ Experience the fresh look best with JavaScript enabled.
  </div>
</noscript>
</body>
</html>