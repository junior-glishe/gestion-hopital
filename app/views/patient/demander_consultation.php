<?php include __DIR__ . '/../partials/flash.php'; ?>
<?php $titre = "Demander hospitalisation - MediTrace"; ob_start(); ?>
<style>
    body {
      font-family: 'Inter', sans-serif;
      background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 50%, #bbf7d0 100%);
    }
    .sidebar-item {
      transition: all 0.3s ease;
    }
    .sidebar-item:hover {
      background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);
      border-left: 3px solid #0d6b4e;
    }
    .sidebar-item.active {
      background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);
      border-left: 3px solid #0d6b4e;
      color: #0d6b4e;
      font-weight: 600;
    }
    .input-focus:focus {
      outline: none;
      border-color: #0d6b4e;
      box-shadow: 0 0 0 3px rgba(13, 107, 78, 0.1);
    }
  </style>


  <div class="flex">
    <!-- Sidebar -->
    <aside class="w-72 bg-white shadow-lg min-h-screen sticky top-0">
      <div class="p-6 border-b border-gray-100">
        <div class="flex items-center gap-3">
          <div class="w-10 h-10 bg-green-100 rounded-xl flex items-center justify-center">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#0d6b4e" stroke-width="1.8">
              <path d="M3 21H21" stroke-linecap="round"/>
              <path d="M5 21V7C5 5.9 5.9 5 7 5H17C18.1 5 19 5.9 19 7V21" stroke-linecap="round"/>
              <path d="M9 21V15H15V21" stroke-linecap="round"/>
              <path d="M9 11H10" stroke-linecap="round"/>
              <path d="M14 11H15" stroke-linecap="round"/>
              <path d="M9 8H10" stroke-linecap="round"/>
              <path d="M14 8H15" stroke-linecap="round"/>
              <rect x="11" y="2" width="2" height="3" rx="1"/>
            </svg>
          </div>
          <span class="text-xl font-bold text-gray-800">Medi<span class="text-green-700">Trace</span></span>
        </div>
        <div class="mt-4 p-3 bg-gray-50 rounded-xl">
          <p class="text-xs text-gray-400">Connecté en tant que</p>
          <p class="text-sm font-medium text-gray-700">.....</p>
          <p class="text-xs text-gray-500">N° patient : .....</p>
        </div>
      </div>

      <nav class="p-4">
        <p class="text-xs text-gray-400 uppercase tracking-wide mb-3 px-3">Menu principal</p>
        
        <a href="index.php" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 mb-1">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
            <path d="M3 9L12 3L21 9L12 15L21 9"/>
            <path d="M5 12V19H19V12"/>
          </svg>
          <span>Tableau de bord</span>
        </a>

        <p class="text-xs text-gray-400 uppercase tracking-wide mb-3 mt-4 px-3">Mes demandes</p>
        
        <a href="index.php?p=patient/demander_consultation" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 mb-1">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
            <circle cx="12" cy="12" r="10"/>
            <path d="M12 8v4l3 3"/>
          </svg>
          <span>Demander consultation</span>
        </a>

        <a href="index.php" class="sidebar-item active flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 mb-1">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
            <rect x="3" y="3" width="18" height="18" rx="2"/>
            <path d="M3 9H21"/>
            <path d="M9 21V9"/>
          </svg>
          <span>Demander hospitalisation</span>
        </a>

        <a href="index.php?p=patient/demander_sortie" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 mb-1">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
            <path d="M12 3L3 8L12 13L21 8L12 3Z"/>
            <path d="M5 13L5 17.5C5 18.7 8 20 12 20C16 20 19 18.7 19 17.5L19 13"/>
          </svg>
          <span>Demander sortie</span>
        </a>

        <p class="text-xs text-gray-400 uppercase tracking-wide mb-3 mt-4 px-3">Mon dossier</p>

        <a href="index.php?p=patient/dossier_medical" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 mb-1">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
            <path d="M4 4H20V20H4V4Z"/>
            <path d="M8 7H16"/>
            <path d="M8 11H12"/>
          </svg>
          <span>Mon dossier médical</span>
        </a>

        <a href="index.php?p=patient/ordonnances" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 mb-1">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
            <path d="M4 4H20V20H4V4Z"/>
            <path d="M8 12H16"/>
            <path d="M12 8V16"/>
          </svg>
          <span>Mes ordonnances</span>
        </a>

        <a href="index.php?p=patient/analyses" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 mb-1">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
            <path d="M20 12V8H4V12M20 12L4 12M20 12L15 17M4 12L9 17"/>
          </svg>
          <span>Résultats analyses</span>
        </a>

        <p class="text-xs text-gray-400 uppercase tracking-wide mb-3 mt-4 px-3">Finances</p>

        <a href="index.php?p=patient/payer_facture" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 mb-1">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
            <rect x="4" y="4" width="16" height="20" rx="2"/>
            <path d="M8 12H16"/>
            <path d="M12 8V16"/>
          </svg>
          <span>Payer facture</span>
        </a>

        <p class="text-xs text-gray-400 uppercase tracking-wide mb-3 mt-4 px-3">Urgence</p>

        <a href="index.php" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 mb-1">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
            <path d="M12 8V12M12 16H12.01"/>
            <circle cx="12" cy="12" r="10"/>
          </svg>
          <span>Signaler urgence</span>
        </a>

        <div class="border-t border-gray-100 my-4"></div>

        <a href="index.php?p=connexion/login" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-lg text-red-500 mb-1">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
            <path d="M15 9L20 12L15 15"/>
            <path d="M20 12H9"/>
            <path d="M12 5H8C6.89543 5 6 5.89543 6 7V17C6 18.1046 6.89543 19 8 19H12"/>
          </svg>
          <span>Déconnexion</span>
        </a>
      </nav>
    </aside>

    <!-- Contenu principal -->
    <main class="flex-1">
      <div class="max-w-3xl mx-auto px-4 py-8">
        
        <!-- Fil d'Ariane -->
        <div class="flex items-center gap-2 text-sm text-gray-500 mb-6">
          <a href="index.php" class="hover:text-green-700">Tableau de bord</a>
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M9 18l6-6-6-6"/>
          </svg>
          <span class="text-gray-800 font-medium">Demander hospitalisation</span>
        </div>

        <!-- Formulaire -->
        <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8">
          <div class="flex items-center gap-3 mb-6">
            <div class="w-10 h-10 bg-teal-100 rounded-xl flex items-center justify-center">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#0d9488" stroke-width="1.8">
                <rect x="3" y="3" width="18" height="18" rx="2"/>
                <path d="M3 9H21"/>
                <path d="M9 21V9"/>
              </svg>
            </div>
            <h1 class="text-xl md:text-2xl font-bold text-gray-800">Demander une hospitalisation</h1>
          </div>

          <form action="" method="POST" class="space-y-5">
<?php /* CSRF */ ?><input type="hidden" name="_csrf" value="<?= htmlspecialchars($csrf_token ?? '', ENT_QUOTES) ?>">
            <!-- Type de chambre -->
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Type de chambre *</label>
              <select name="type_chambre" required class="w-full px-4 py-2.5 border border-gray-200 rounded-xl input-focus transition bg-white">
                <option value="">Sélectionnez un type de chambre</option>
                <option value="standard">Standard - 25 000 FCFA/jour</option>
                <option value="double">Double - 40 000 FCFA/jour</option>
                <option value="vip">VIP - 75 000 FCFA/jour</option>
              </select>
            </div>

            <!-- Service et Médecin -->
            <div class="grid md:grid-cols-2 gap-4">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Service *</label>
                <select name="service" required class="w-full px-4 py-2.5 border border-gray-200 rounded-xl input-focus transition bg-white">
                  <option value="">Sélectionnez un service</option>
                  <option value="cardiologie">Cardiologie</option>
                  <option value="pediatrie">Pédiatrie</option>
                  <option value="gynecologie">Gynécologie</option>
                  <option value="medecine_generale">Médecine générale</option>
                  <option value="chirurgie">Chirurgie</option>
                  <option value="orthopedie">Orthopédie</option>
                </select>
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Médecin traitant *</label>
                <select name="medecin" required class="w-full px-4 py-2.5 border border-gray-200 rounded-xl input-focus transition bg-white">
                  <option value="">Sélectionnez un médecin</option>
                  <option value="dr_kpossou">Dr Kpossou - Cardiologue</option>
                  <option value="dr_adjovi">Dr Adjovi - Généraliste</option>
                  <option value="dr_zinsou">Dr Zinsou - Pédiatre</option>
                  <option value="dr_hounkpe">Dr Hounkpè - Gynécologue</option>
                </select>
              </div>
            </div>

            <!-- Date d'admission et Durée -->
            <div class="grid md:grid-cols-2 gap-4">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Date d'admission souhaitée *</label>
                <input type="date" name="date_admission" required class="w-full px-4 py-2.5 border border-gray-200 rounded-xl input-focus transition bg-white">
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Durée estimée *</label>
                <select name="duree" required class="w-full px-4 py-2.5 border border-gray-200 rounded-xl input-focus transition bg-white">
                  <option value="">Sélectionnez une durée</option>
                  <option value="1">1 jour</option>
                  <option value="2">2 jours</option>
                  <option value="3">3 jours</option>
                  <option value="5">5 jours</option>
                  <option value="7">7 jours</option>
                  <option value="10">10 jours</option>
                  <option value="14">14 jours</option>
                </select>
              </div>
            </div>

            <!-- Motif -->
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Motif de l'hospitalisation *</label>
              <textarea name="motif" rows="4" required class="w-full px-4 py-2.5 border border-gray-200 rounded-xl input-focus transition bg-white" placeholder="Décrivez la raison de votre hospitalisation..."></textarea>
            </div>

            <!-- Antécédents -->
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Antécédents médicaux</label>
              <textarea name="antecedents" rows="3" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl input-focus transition bg-white" placeholder="Diabète, hypertension, allergies, chirurgies antérieures..."></textarea>
            </div>

            <!-- Traitements en cours -->
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Traitements en cours</label>
              <textarea name="traitements" rows="2" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl input-focus transition bg-white" placeholder="Médicaments que vous prenez actuellement..."></textarea>
            </div>

            <!-- Accord -->
            <div class="mt-4">
              <label class="flex items-center gap-3">
                <input type="checkbox" required class="w-4 h-4 rounded border-gray-300 text-green-700">
                <span class="text-sm text-gray-600">Je certifie que les informations fournies sont exactes et j'accepte les conditions d'hospitalisation</span>
              </label>
            </div>

            <!-- Boutons -->
            <div class="flex flex-col sm:flex-row gap-3 pt-4">
              <button type="submit" class="flex-1 py-3 bg-green-700 text-white rounded-xl font-medium hover:bg-green-800 transition">
                Envoyer la demande
              </button>
              <a href="index.php" class="flex-1 py-3 border border-gray-300 text-gray-700 rounded-xl font-medium hover:bg-gray-50 transition text-center">
                Annuler
              </a>
            </div>
          </form>

          <!-- Informations -->
          <div class="mt-6 p-4 bg-teal-50 rounded-xl border border-teal-100">
            <div class="flex items-start gap-3">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#0d9488" stroke-width="1.8">
                <circle cx="12" cy="12" r="10"/>
                <path d="M12 8v4l3 3"/>
              </svg>
              <div>
                <p class="text-sm font-medium text-teal-800">Informations importantes</p>
                <p class="text-xs text-teal-700 mt-1">Une confirmation vous sera envoyée sous 24h après validation par votre médecin.</p>
                <p class="text-xs text-teal-700 mt-1">Pour les urgences, veuillez vous présenter directement aux urgences ou contacter le <strong>.....</strong></p>
                <p class="text-xs text-teal-700 mt-2">Documents à prévoir : carte d'identité, carte d'assurance, ordonnances récentes.</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Footer -->
      <footer class="bg-white border-t border-gray-200 mt-8 py-6">
        <div class="max-w-7xl mx-auto px-4 text-center text-xs text-gray-400">
          <p>© 2025 MediTrace - Tous droits réservés</p>
        </div>
      </footer>
    </main>
  </div>



<?php $contenu = ob_get_clean(); require __DIR__ . '/../layouts/main.php'; ?>
