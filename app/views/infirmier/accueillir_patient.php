<?php include __DIR__ . '/../partials/flash.php'; ?>
<?php $titre = "Accueillir patient - MediTrace"; ob_start(); ?>
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
    <!-- Sidebar (identique à celle du dashboard) -->
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
          <p class="text-xs text-gray-500">Infirmier</p>
        </div>
      </div>

      <nav class="p-4">
        <p class="text-xs text-gray-400 uppercase tracking-wide mb-3 px-3">Menu principal</p>
        
        <a href="index.php?p=infirmier/dashboard" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 mb-1">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
            <path d="M3 9L12 3L21 9L12 15L21 9"/>
            <path d="M5 12V19H19V12"/>
          </svg>
          <span>Tableau de bord</span>
        </a>

        <p class="text-xs text-gray-400 uppercase tracking-wide mb-3 mt-4 px-3">Prise en charge</p>
        
        <a href="index.php?p=infirmier/accueillir_patient" class="sidebar-item active flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 mb-1">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
            <path d="M12 12C14.2091 12 16 10.2091 16 8C16 5.79086 14.2091 4 12 4C9.79086 4 8 5.79086 8 8C8 10.2091 9.79086 12 12 12Z"/>
            <path d="M5 20V19C5 15.6863 7.68629 13 11 13H13C16.3137 13 19 15.6863 19 19V20"/>
          </svg>
          <span>Accueillir patient</span>
        </a>

        <a href="index.php?p=infirmier/constantes_vitales" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 mb-1">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
            <circle cx="12" cy="12" r="10"/>
            <path d="M12 8v4l3 3"/>
          </svg>
          <span>Constantes vitales</span>
        </a>

        <a href="index.php?p=infirmier/soins_surveillance" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 mb-1">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
            <rect x="3" y="3" width="18" height="18" rx="2"/>
            <path d="M3 9H21"/>
            <path d="M9 21V9"/>
          </svg>
          <span>Soins et surveillance</span>
        </a>

        <p class="text-xs text-gray-400 uppercase tracking-wide mb-3 mt-4 px-3">Urgence</p>

        <a href="index.php?p=infirmier/signalement_urgence" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 mb-1">
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
          <a href="index.php?p=infirmier/dashboard" class="hover:text-teal-600">Tableau de bord</a>
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M9 18l6-6-6-6"/>
          </svg>
          <span class="text-gray-800 font-medium">Accueillir patient</span>
        </div>

        <!-- Formulaire d'admission -->
        <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8">
          <div class="flex items-center gap-3 mb-6">
            <div class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="1.8">
                <path d="M12 12C14.2091 12 16 10.2091 16 8C16 5.79086 14.2091 4 12 4C9.79086 4 8 5.79086 8 8C8 10.2091 9.79086 12 12 12Z"/>
                <path d="M5 20V19C5 15.6863 7.68629 13 11 13H13C16.3137 13 19 15.6863 19 19V20"/>
              </svg>
            </div>
            <h1 class="text-xl md:text-2xl font-bold text-gray-800">Accueillir un patient</h1>
          </div>

          <form action="" method="POST" class="space-y-5">
<?php /* CSRF */ ?><input type="hidden" name="_csrf" value="<?= htmlspecialchars($csrf_token ?? '', ENT_QUOTES) ?>">
            <!-- Recherche patient -->
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Rechercher un patient *</label>
              <input type="text" name="recherche" required class="w-full px-4 py-2.5 border border-gray-200 rounded-xl input-focus transition bg-white" placeholder="Nom, prénom ou numéro patient">
              <p class="text-xs text-gray-400 mt-1">Commencez à taper pour rechercher un patient existant</p>
            </div>

            <!-- Informations patient (à pré-remplir) -->
            <div class="bg-gray-50 rounded-xl p-4">
              <p class="text-xs text-gray-500 mb-3">Informations patient</p>
              <div class="grid md:grid-cols-2 gap-3 text-sm">
                <div class="flex justify-between">
                  <span class="text-gray-500">Nom complet :</span>
                  <span class="text-gray-800 font-medium">.....</span>
                </div>
                <div class="flex justify-between">
                  <span class="text-gray-500">Date naissance :</span>
                  <span class="text-gray-800 font-medium">.....</span>
                </div>
                <div class="flex justify-between">
                  <span class="text-gray-500">Contact :</span>
                  <span class="text-gray-800 font-medium">.....</span>
                </div>
                <div class="flex justify-between">
                  <span class="text-gray-500">Assurance :</span>
                  <span class="text-gray-800 font-medium">.....</span>
                </div>
              </div>
            </div>

            <!-- Admission -->
            <div class="grid md:grid-cols-2 gap-4">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Date d'admission *</label>
                <input type="date" name="date_admission" required class="w-full px-4 py-2.5 border border-gray-200 rounded-xl input-focus transition bg-white">
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Chambre *</label>
                <select name="chambre" required class="w-full px-4 py-2.5 border border-gray-200 rounded-xl input-focus transition bg-white">
                  <option value="">Sélectionnez une chambre</option>
                  <option value="101">101 - Standard</option>
                  <option value="102">102 - Standard</option>
                  <option value="201">201 - Double</option>
                  <option value="301">301 - VIP</option>
                </select>
              </div>
            </div>

            <!-- Médecin référent -->
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Médecin référent *</label>
              <select name="medecin" required class="w-full px-4 py-2.5 border border-gray-200 rounded-xl input-focus transition bg-white">
                <option value="">Sélectionnez un médecin</option>
                <option value="dr_kpossou">Dr Kpossou - Cardiologue</option>
                <option value="dr_adjovi">Dr Adjovi - Généraliste</option>
                <option value="dr_zinsou">Dr Zinsou - Pédiatre</option>
              </select>
            </div>

            <!-- Motif -->
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Motif d'admission *</label>
              <textarea name="motif" rows="3" required class="w-full px-4 py-2.5 border border-gray-200 rounded-xl input-focus transition bg-white" placeholder="Raison médicale de l'hospitalisation..."></textarea>
            </div>

            <!-- Notes -->
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Notes (optionnel)</label>
              <textarea name="notes" rows="2" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl input-focus transition bg-white" placeholder="Informations complémentaires..."></textarea>
            </div>

            <!-- Boutons -->
            <div class="flex flex-col sm:flex-row gap-3 pt-4">
              <button type="submit" class="flex-1 py-3 bg-teal-600 text-white rounded-xl font-medium hover:bg-teal-700 transition">
                Valider l'admission
              </button>
              <a href="index.php?p=infirmier/dashboard" class="flex-1 py-3 border border-gray-300 text-gray-700 rounded-xl font-medium hover:bg-gray-50 transition text-center">
                Annuler
              </a>
            </div>
          </form>
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
