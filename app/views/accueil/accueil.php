<?php include __DIR__ . '/../partials/flash.php'; ?>
<?php $titre = "MediTrace | Gestion des Hospitalisations"; ob_start(); ?>

<!-- Font Awesome 6 (icônes) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    
    body {
      font-family: 'Inter', sans-serif;
    }
    
    .fade-in {
      opacity: 0;
      transform: translateY(20px);
      transition: opacity 0.6s ease, transform 0.6s ease;
    }
    
    .fade-in.is-visible {
      opacity: 1;
      transform: translateY(0);
    }
    
    .hero-gradient {
      background: linear-gradient(135deg, #f0fdf4 0%, #e6f7f0 50%, #d1fae5 100%);
    }
    
    .card-hover {
      transition: all 0.3s ease;
    }
    
    .card-hover:hover {
      transform: translateY(-4px);
      box-shadow: 0 20px 30px -12px rgba(13, 107, 78, 0.12);
    }
    
    .nav-link {
      position: relative;
    }
    
    .nav-link::after {
      content: '';
      position: absolute;
      bottom: -4px;
      left: 0;
      width: 0;
      height: 2px;
      background: #0d6b4e;
      transition: width 0.3s ease;
    }
    
    .nav-link:hover::after {
      width: 100%;
    }
    
    /* Style pour l'accordéon FAQ */
    .faq-item {
      transition: all 0.3s ease;
    }
    .faq-question {
      cursor: pointer;
    }
    .faq-answer {
      display: none;
    }
    .faq-item.active .faq-answer {
      display: block;
    }
    .faq-item.active .faq-icon {
      transform: rotate(45deg);
    }
    .faq-icon {
      transition: transform 0.3s ease;
    }
</style>

<!-- HEADER -->
<header class="fixed top-0 left-0 right-0 bg-white/90 backdrop-blur-md border-b border-gray-100 z-50">
  <nav class="max-w-7xl mx-auto px-4 py-3 flex items-center justify-between">
    <a href="index.php" class="flex items-center gap-2">
      <div class="w-9 h-9 bg-primary/10 rounded-xl flex items-center justify-center">
        <i class="fas fa-hospital text-primary text-lg"></i>
      </div>
      <span class="text-xl font-bold text-gray-800">Medi<span class="text-primary">Trace</span></span>
    </a>

    <div class="hidden md:flex items-center gap-8">
      <a href="#features" class="nav-link text-sm text-gray-600 hover:text-primary">Services</a>
      <a href="#whom" class="nav-link text-sm text-gray-600 hover:text-primary">Acteurs</a>
      <a href="#stats" class="nav-link text-sm text-gray-600 hover:text-primary">Chiffres</a>
      <a href="#testimonies" class="nav-link text-sm text-gray-600 hover:text-primary">Témoignages</a>
      <a href="#faq" class="nav-link text-sm text-gray-600 hover:text-primary">FAQ</a>
    </div>

    <div class="hidden md:flex items-center gap-3">
      <a href="index.php?p=connexion/login" class="flex items-center gap-2 px-5 py-2 rounded-full border border-primary/30 text-sm font-medium text-primary hover:bg-primary hover:text-white transition">
        <i class="fas fa-sign-in-alt text-sm"></i>
        Connexion
      </a>
      <a href="index.php?p=connexion/inscription" class="flex items-center gap-2 px-5 py-2 rounded-full bg-primary text-sm font-medium text-white hover:bg-primary/80 transition shadow-md">
        <i class="fas fa-user-plus text-sm"></i>
        S'inscrire
      </a>
    </div>

    <button id="menuBtn" class="md:hidden p-2">
      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <line x1="3" y1="12" x2="21" y2="12"/>
        <line x1="3" y1="6" x2="21" y2="6"/>
        <line x1="3" y1="18" x2="21" y2="18"/>
      </svg>
    </button>
  </nav>

  <div id="mobileMenu" class="hidden md:hidden bg-white border-t border-gray-100 px-4 py-4 flex flex-col gap-3">
    <a href="#features" class="text-gray-600 py-2">Services</a>
    <a href="#whom" class="text-gray-600 py-2">Acteurs</a>
    <a href="#stats" class="text-gray-600 py-2">Chiffres</a>
    <a href="#testimonies" class="text-gray-600 py-2">Témoignages</a>
    <a href="#faq" class="text-gray-600 py-2">FAQ</a>
    <a href="index.php?p=connexion/login" class="inline-flex items-center justify-center gap-2 px-5 py-2 rounded-full border border-primary text-primary mt-2">
      <i class="fas fa-sign-in-alt text-sm"></i> Connexion
    </a>
    <a href="index.php?p=connexion/inscription" class="inline-flex items-center justify-center gap-2 px-5 py-2 rounded-full bg-primary text-white mt-1">
      <i class="fas fa-user-plus text-sm"></i> S'inscrire
    </a>
  </div>
</header>

<main>
  <!-- HERO -->
  <section class="hero-gradient pt-28 pb-16 md:pt-32 md:pb-20">
    <div class="max-w-7xl mx-auto px-4">
      <div class="flex flex-col lg:flex-row items-center gap-10">
        <div class="flex-1 text-center lg:text-left">
          <span class="inline-block bg-white/60 backdrop-blur-sm rounded-full px-4 py-1.5 text-sm font-medium text-primary mb-5">
            <i class="fas fa-heartbeat mr-2"></i> Gestion hospitalière simplifiée
          </span>
          <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 leading-tight mb-5">
            Simplifiez la gestion<br>de votre établissement
          </h1>
          <p class="text-gray-600 text-lg max-w-lg mx-auto lg:mx-0 mb-8">
            MediTrace centralise dossiers patients, prescriptions, constantes vitales et facturation. Une solution intuitive pour les professionnels de santé.
          </p>
          <div class="flex flex-col sm:flex-row gap-3 justify-center lg:justify-start">
            <a href="index.php?p=connexion/login" class="px-6 py-3 bg-primary text-white rounded-xl font-medium hover:bg-primary/90 transition text-center inline-flex items-center gap-2 justify-center">
              <i class="fas fa-arrow-right-to-bracket"></i> Accès au système
            </a>
            <a href="index.php?p=connexion/inscription" class="px-6 py-3 border border-primary/30 rounded-xl font-medium text-primary hover:bg-primary hover:text-white transition text-center inline-flex items-center gap-2 justify-center">
              <i class="fas fa-user-plus"></i> Créer un compte
            </a>
          </div>
        </div>

        <div class="flex-1 flex justify-center">
          <script src="https://unpkg.com/@lottiefiles/dotlottie-wc@0.9.10/dist/dotlottie-wc.js" type="module"></script>
          <dotlottie-wc
            src="https://lottie.host/c4fc1627-08c1-4362-8ef3-ff8c9e321b18/MUlviOLbJs.lottie"
            style="width: 450px; height: 450px; max-width: 100%;"
            autoplay
            loop
          ></dotlottie-wc>
        </div>
      </div>
    </div>
  </section>

  <!-- SERVICES -->
  <section id="features" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4">
      <div class="text-center max-w-2xl mx-auto mb-12">
        <span class="text-primary font-semibold text-sm uppercase tracking-wide bg-primary/10 px-4 py-1.5 rounded-full"><i class="fas fa-star mr-1"></i> Nos services</span>
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mt-4 mb-3">Une solution complète</h2>
        <p class="text-gray-500">Pour une gestion optimale de votre établissement de santé</p>
      </div>

      <div class="grid md:grid-cols-3 gap-6">
        <div class="bg-white border border-gray-100 rounded-2xl p-6 card-hover fade-in">
          <div class="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center mb-4">
            <i class="fas fa-users text-primary text-xl"></i>
          </div>
          <h3 class="text-xl font-bold text-gray-800 mb-2">Gestion des patients</h3>
          <p class="text-gray-500 text-sm leading-relaxed">Dossiers numériques, historique médical, consultations et hospitalisations centralisées.</p>
        </div>

        <div class="bg-white border border-gray-100 rounded-2xl p-6 card-hover fade-in">
          <div class="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center mb-4">
            <i class="fas fa-chart-line text-primary text-xl"></i>
          </div>
          <h3 class="text-xl font-bold text-gray-800 mb-2">Suivi médical</h3>
          <p class="text-gray-500 text-sm leading-relaxed">Diagnostics, prescriptions, examens, constantes vitales et évolution des patients.</p>
        </div>

        <div class="bg-white border border-gray-100 rounded-2xl p-6 card-hover fade-in">
          <div class="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center mb-4">
            <i class="fas fa-file-invoice-dollar text-primary text-xl"></i>
          </div>
          <h3 class="text-xl font-bold text-gray-800 mb-2">Facturation</h3>
          <p class="text-gray-500 text-sm leading-relaxed">Factures automatisées, gestion des assurances et suivi des paiements.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ACTEURS -->
  <section id="whom" class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
      <div class="text-center max-w-2xl mx-auto mb-12">
        <span class="text-primary font-semibold text-sm uppercase tracking-wide bg-primary/10 px-4 py-1.5 rounded-full"><i class="fas fa-users mr-1"></i> Acteurs</span>
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mt-4 mb-3">Des interfaces adaptées</h2>
        <p class="text-gray-500">Chaque métier a son espace dédié</p>
      </div>

      <div class="grid md:grid-cols-4 gap-5">
        <div class="bg-white rounded-xl p-5 border border-gray-100 card-hover">
          <div class="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center mb-3">
            <i class="fas fa-user-injured text-primary text-xl"></i>
          </div>
          <h3 class="font-bold text-gray-800 mb-1">Patients</h3>
          <p class="text-gray-500 text-xs">Dossier médical, consultations, factures, urgences</p>
        </div>

        <div class="bg-white rounded-xl p-5 border border-gray-100 card-hover">
          <div class="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center mb-3">
            <i class="fas fa-user-md text-primary text-xl"></i>
          </div>
          <h3 class="font-bold text-gray-800 mb-1">Médecins</h3>
          <p class="text-gray-500 text-xs">Diagnostics, prescriptions, examens, sorties</p>
        </div>

        <div class="bg-white rounded-xl p-5 border border-gray-100 card-hover">
          <div class="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center mb-3">
            <i class="fas fa-user-nurse text-primary text-xl"></i>
          </div>
          <h3 class="font-bold text-gray-800 mb-1">Infirmiers</h3>
          <p class="text-gray-500 text-xs">Accueil, constantes, soins, urgences</p>
        </div>

        <div class="bg-white rounded-xl p-5 border border-gray-100 card-hover">
          <div class="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center mb-3">
            <i class="fas fa-user-cog text-primary text-xl"></i>
          </div>
          <h3 class="font-bold text-gray-800 mb-1">Administrateurs</h3>
          <p class="text-gray-500 text-xs">Patients, chambres, factures, statistiques</p>
        </div>
      </div>
    </div>
  </section>

  <!-- STATISTIQUES -->
  <section id="stats" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4">
      <div class="text-center mb-16">
        <span class="text-primary font-semibold text-sm uppercase tracking-wide bg-primary/10 px-4 py-1.5 rounded-full inline-block mb-4"><i class="fas fa-chart-simple mr-1"></i> Chiffres clés</span>
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900">MediTrace en quelques chiffres</h2>
        <div class="w-20 h-1 bg-primary mx-auto mt-4 rounded-full"></div>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
        <div class="text-center">
          <div class="w-16 h-16 bg-primary/10 rounded-2xl flex items-center justify-center mx-auto mb-4">
            <i class="fas fa-users text-primary text-2xl"></i>
          </div>
          <p class="text-4xl font-bold text-gray-900 mb-1" data-counter data-target="25000" data-suffix="+">0</p>
          <p class="text-gray-500">Patients suivis</p>
        </div>

        <div class="text-center">
          <div class="w-16 h-16 bg-primary/10 rounded-2xl flex items-center justify-center mx-auto mb-4">
            <i class="fas fa-bed text-primary text-2xl"></i>
          </div>
          <p class="text-4xl font-bold text-gray-900 mb-1" data-counter data-target="150" data-suffix="">0</p>
          <p class="text-gray-500">Lits disponibles</p>
        </div>

        <div class="text-center">
          <div class="w-16 h-16 bg-primary/10 rounded-2xl flex items-center justify-center mx-auto mb-4">
            <i class="fas fa-user-md text-primary text-2xl"></i>
          </div>
          <p class="text-4xl font-bold text-gray-900 mb-1" data-counter data-target="48" data-suffix="">0</p>
          <p class="text-gray-500">Professionnels</p>
        </div>

        <div class="text-center">
          <div class="w-16 h-16 bg-primary/10 rounded-2xl flex items-center justify-center mx-auto mb-4">
            <i class="fas fa-star text-primary text-2xl"></i>
          </div>
          <p class="text-4xl font-bold text-gray-900 mb-1" data-counter data-target="98" data-suffix="%">0</p>
          <p class="text-gray-500">Satisfaction</p>
        </div>
      </div>
    </div>
  </section>

  <!-- TÉMOIGNAGES -->
  <section id="testimonies" class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
      <div class="text-center max-w-2xl mx-auto mb-12">
        <span class="text-primary font-semibold text-sm uppercase tracking-wide bg-primary/10 px-4 py-1.5 rounded-full"><i class="fas fa-comment-dots mr-1"></i> Ils nous font confiance</span>
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mt-4 mb-3">Témoignages</h2>
        <p class="text-gray-500">Ce que nos utilisateurs pensent de MediTrace</p>
      </div>

      <div class="grid md:grid-cols-3 gap-8">
        <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
          <div class="flex gap-1 mb-4">
            <i class="fas fa-star text-yellow-400 text-sm"></i>
            <i class="fas fa-star text-yellow-400 text-sm"></i>
            <i class="fas fa-star text-yellow-400 text-sm"></i>
            <i class="fas fa-star text-yellow-400 text-sm"></i>
            <i class="fas fa-star text-yellow-400 text-sm"></i>
          </div>
          <p class="text-gray-600 italic mb-4">"Un gain de temps considérable. Les dossiers sont accessibles en un clic."</p>
          <div class="border-t border-gray-100 pt-4">
            <p class="font-semibold text-gray-800">Dr. Kpossou</p>
            <p class="text-xs text-gray-400">Cardiologue</p>
          </div>
        </div>

        <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
          <div class="flex gap-1 mb-4">
            <i class="fas fa-star text-yellow-400 text-sm"></i>
            <i class="fas fa-star text-yellow-400 text-sm"></i>
            <i class="fas fa-star text-yellow-400 text-sm"></i>
            <i class="fas fa-star text-yellow-400 text-sm"></i>
            <i class="fas fa-star text-yellow-400 text-sm"></i>
          </div>
          <p class="text-gray-600 italic mb-4">"La saisie des constantes est rapide. Les alertes nous aident à réagir vite."</p>
          <div class="border-t border-gray-100 pt-4">
            <p class="font-semibold text-gray-800">Inf. Glèlè</p>
            <p class="text-xs text-gray-400">Infirmière</p>
          </div>
        </div>

        <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
          <div class="flex gap-1 mb-4">
            <i class="fas fa-star text-yellow-400 text-sm"></i>
            <i class="fas fa-star text-yellow-400 text-sm"></i>
            <i class="fas fa-star text-yellow-400 text-sm"></i>
            <i class="fas fa-star text-yellow-400 text-sm"></i>
            <i class="far fa-star text-yellow-400 text-sm"></i>
          </div>
          <p class="text-gray-600 italic mb-4">"Mon dossier médical en ligne et le paiement à distance, très pratique."</p>
          <div class="border-t border-gray-100 pt-4">
            <p class="font-semibold text-gray-800">Jean Adandé</p>
            <p class="text-xs text-gray-400">Patient</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- SECTION FAQ (4 questions) -->
  <section id="faq" class="py-20 bg-white">
    <div class="max-w-4xl mx-auto px-4">
      <div class="text-center max-w-2xl mx-auto mb-12">
        <span class="text-primary font-semibold text-sm uppercase tracking-wide bg-primary/10 px-4 py-1.5 rounded-full"><i class="fas fa-circle-question mr-1"></i> FAQ</span>
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mt-4 mb-3">Foire aux questions</h2>
        <p class="text-gray-500">Tout ce que vous devez savoir sur MediTrace</p>
        <div class="w-20 h-1 bg-primary mx-auto mt-4 rounded-full"></div>
      </div>

      <div class="space-y-4">
        <!-- FAQ 1 -->
        <div class="faq-item bg-gray-50 rounded-xl overflow-hidden border border-gray-100">
          <button class="faq-question w-full text-left p-5 flex justify-between items-center hover:bg-gray-100 transition">
            <span class="font-semibold text-gray-800"><i class="fas fa-laptop-medical text-primary mr-3"></i>Comment créer un compte patient ?</span>
            <i class="fas fa-plus text-gray-400 faq-icon transition-transform"></i>
          </button>
          <div class="faq-answer px-5 pb-5 text-gray-600 text-sm leading-relaxed">
            Pour créer un compte patient, cliquez sur le bouton "S'inscrire" en haut à droite, choisissez le rôle "Patient", remplissez le formulaire d'inscription avec vos informations personnelles, puis validez. Vous recevrez un email de confirmation.
          </div>
        </div>

        <!-- FAQ 2 -->
        <div class="faq-item bg-gray-50 rounded-xl overflow-hidden border border-gray-100">
          <button class="faq-question w-full text-left p-5 flex justify-between items-center hover:bg-gray-100 transition">
            <span class="font-semibold text-gray-800"><i class="fas fa-calendar-check text-primary mr-3"></i>Comment prendre un rendez-vous avec un médecin ?</span>
            <i class="fas fa-plus text-gray-400 faq-icon transition-transform"></i>
          </button>
          <div class="faq-answer px-5 pb-5 text-gray-600 text-sm leading-relaxed">
            Une fois connecté à votre espace patient, rendez-vous dans la section "Demander consultation". Sélectionnez le service, le médecin, la date et l'heure souhaitées, puis décrivez brièvement le motif de votre consultation. Vous recevrez une confirmation par email.
          </div>
        </div>

        <!-- FAQ 3 -->
        <div class="faq-item bg-gray-50 rounded-xl overflow-hidden border border-gray-100">
          <button class="faq-question w-full text-left p-5 flex justify-between items-center hover:bg-gray-100 transition">
            <span class="font-semibold text-gray-800"><i class="fas fa-file-invoice text-primary mr-3"></i>Comment consulter mes factures et les payer ?</span>
            <i class="fas fa-plus text-gray-400 faq-icon transition-transform"></i>
          </button>
          <div class="faq-answer px-5 pb-5 text-gray-600 text-sm leading-relaxed">
            Dans votre espace patient, accédez à la section "Payer facture". Vous y trouverez la liste de toutes vos factures avec leur statut (payée/impayée). Cliquez sur "Payer maintenant" pour effectuer le règlement en ligne.
          </div>
        </div>

        <!-- FAQ 4 -->
        <div class="faq-item bg-gray-50 rounded-xl overflow-hidden border border-gray-100">
          <button class="faq-question w-full text-left p-5 flex justify-between items-center hover:bg-gray-100 transition">
            <span class="font-semibold text-gray-800"><i class="fas fa-shield-alt text-primary mr-3"></i>Mes données médicales sont-elles sécurisées ?</span>
            <i class="fas fa-plus text-gray-400 faq-icon transition-transform"></i>
          </button>
          <div class="faq-answer px-5 pb-5 text-gray-600 text-sm leading-relaxed">
            Oui, la sécurité de vos données est notre priorité. MediTrace utilise un chiffrement avancé (SSL/TLS) pour protéger toutes les données échangées. Vos informations médicales sont strictement confidentielles.
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA FINAL -->
  <div class="max-w-6xl mx-auto px-4 py-16">
    <div class="bg-gradient-to-r from-primary to-primary/80 rounded-3xl p-12 text-center">
      <h2 class="text-2xl md:text-3xl font-bold text-white mb-4">Prêt à moderniser votre établissement de santé ?</h2>
      <p class="text-emerald-100 mb-8 max-w-lg mx-auto">Rejoignez les établissements qui nous font confiance et optimisez votre gestion des hospitalisations.</p>
      <div class="flex flex-col sm:flex-row gap-4 justify-center">
        <a href="register.php" class="inline-flex items-center gap-2 bg-white text-primary px-6 py-3 rounded-full font-semibold hover:bg-gray-100 transition">
          <i class="fas fa-user-plus"></i> Créer un compte
        </a>
        <a href="#features" class="inline-flex items-center gap-2 border border-white/30 text-white px-6 py-3 rounded-full font-medium hover:bg-white/10 transition">
          <i class="fas fa-play"></i> Découvrir les services
        </a>
      </div>
    </div>
  </div>
</main>

<!-- FOOTER -->
<footer class="bg-gray-900 pt-12 pb-6">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-5">
      <div class="lg:col-span-2">
        <div class="flex items-center gap-2 mb-4">
          <i class="fas fa-hospital text-primary text-xl"></i>
          <span class="text-xl font-bold tracking-tight text-white">Medi<span class="text-primary">Trace</span></span>
        </div>
        <p class="text-gray-400 text-sm leading-relaxed mb-4 max-w-sm">
          Solution moderne de gestion des hospitalisations pour les centres de santé du monde entier.
        </p>
        <div class="flex gap-4">
          <a href="register.php" class="text-sm text-primary hover:text-primary/80 font-medium">S'inscrire →</a>
          <a href="login.php" class="text-sm text-gray-400 hover:text-white transition">Connexion</a>
        </div>
      </div>

      <div>
        <h3 class="font-semibold text-white mb-4">Services</h3>
        <ul class="space-y-2 text-sm">
          <li><a href="#features" class="text-gray-400 hover:text-primary transition">Gestion des patients</a></li>
          <li><a href="#features" class="text-gray-400 hover:text-primary transition">Suivi médical</a></li>
          <li><a href="#features" class="text-gray-400 hover:text-primary transition">Facturation</a></li>
        </ul>
      </div>

      <div>
        <h3 class="font-semibold text-white mb-4">Support</h3>
        <ul class="space-y-2 text-sm">
          <li><a href="#" class="text-gray-400 hover:text-primary transition">Centre d'aide</a></li>
          <li><a href="#" class="text-gray-400 hover:text-primary transition">Documentation</a></li>
          <li><a href="#faq" class="text-gray-400 hover:text-primary transition">FAQ</a></li>
        </ul>
      </div>

      <div>
        <h3 class="font-semibold text-white mb-4">Légal</h3>
        <ul class="space-y-2 text-sm">
          <li><a href="#" class="text-gray-400 hover:text-primary transition">Conditions générales</a></li>
          <li><a href="#" class="text-gray-400 hover:text-primary transition">Politique de confidentialité</a></li>
          <li><a href="#" class="text-gray-400 hover:text-primary transition">Mentions légales</a></li>
        </ul>
      </div>
    </div>

    <div class="border-t border-gray-800 my-8"></div>

    <div class="text-center text-xs text-gray-500">
      <span>&copy; 2026 MediTrace. Tous droits réservés. | Solution de gestion hospitalière</span>
    </div>  
  </div>
</footer>

<!-- Scripts -->
<script>
  // Menu mobile
  const menuBtn = document.getElementById('menuBtn');
  const mobileMenu = document.getElementById('mobileMenu');
  if (menuBtn && mobileMenu) {
    menuBtn.addEventListener('click', () => {
      mobileMenu.classList.toggle('hidden');
    });
  }

  // FAQ Accordéon
  const faqQuestions = document.querySelectorAll('.faq-question');
  faqQuestions.forEach(button => {
    button.addEventListener('click', () => {
      const faqItem = button.closest('.faq-item');
      const icon = button.querySelector('.faq-icon');
      
      if (faqItem.classList.contains('active')) {
        faqItem.classList.remove('active');
        icon.classList.remove('fa-minus');
        icon.classList.add('fa-plus');
      } else {
        faqItem.classList.add('active');
        icon.classList.remove('fa-plus');
        icon.classList.add('fa-minus');
      }
    });
  });

  // Animation fade-in
  const fadeElements = document.querySelectorAll('.fade-in');
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('is-visible');
      }
    });
  }, { threshold: 0.1 });
  fadeElements.forEach(el => observer.observe(el));

  // Compteurs
  const counters = document.querySelectorAll('[data-counter]');
  const counterObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const el = entry.target;
        const target = parseInt(el.dataset.target);
        const suffix = el.dataset.suffix || '';
        let current = 0;
        const duration = 1500;
        const step = target / (duration / 16);
        const timer = setInterval(() => {
          current += step;
          if (current >= target) {
            el.textContent = target.toLocaleString('fr-FR') + suffix;
            clearInterval(timer);
          } else {
            el.textContent = Math.floor(current).toLocaleString('fr-FR') + suffix;
          }
        }, 16);
        counterObserver.unobserve(el);
      }
    });
  }, { threshold: 0.5 });
  counters.forEach(counter => counterObserver.observe(counter));
</script>

<?php $contenu = ob_get_clean(); require __DIR__ . '/../layouts/main.php'; ?>
