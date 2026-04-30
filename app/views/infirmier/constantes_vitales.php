<?php include __DIR__ . '/../partials/flash.php'; ?>
<?php $titre = "Constantes vitales - MediTrace"; ob_start(); ?>
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
    <!-- Sidebar (identique) -->
    <aside class="w-72 bg-white shadow-lg min-h-screen sticky top-0">
      <!-- Même sidebar que précédemment -->
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
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M3 9L12 3L21 9L12 15L21 9"/><path d="M5 12V19H19V12"/></svg>
          <span>Tableau de bord</span>
        </a>
        <p class="text-xs text-gray-400 uppercase tracking-wide mb-3 mt-4 px-3">Prise en charge</p>
        <a href="index.php?p=infirmier/accueillir_patient" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 mb-1">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 12C14.2091 12 16 10.2091 16 8C16 5.79086 14.2091 4 12 4C9.79086 4 8 5.79086 8 8C8 10.2091 9.79086 12 12 12Z"/><path d="M5 20V19C5 15.6863 7.68629 13 11 13H13C16.3137 13 19 15.6863 19 19V20"/></svg>
          <span>Accueillir patient</span>
        </a>
        <a href="index.php?p=infirmier/constantes_vitales" class="sidebar-item active flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 mb-1">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="12" r="10"/><path d="M12 8v4l3 3"/></svg>
          <span>Constantes vitales</span>
        </a>
        <a href="index.php?p=infirmier/soins_surveillance" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 mb-1">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9H21"/><path d="M9 21V9"/></svg>
          <span>Soins et surveillance</span>
        </a>
        <p class="text-xs text-gray-400 uppercase tracking-wide mb-3 mt-4 px-3">Urgence</p>
        <a href="index.php?p=infirmier/signalement_urgence" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 mb-1">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 8V12M12 16H12.01"/><circle cx="12" cy="12" r="10"/></svg>
          <span>Signaler urgence</span>
        </a>
        <div class="border-t border-gray-100 my-4"></div>
        <a href="index.php?p=connexion/login" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-lg text-red-500 mb-1">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M15 9L20 12L15 15"/><path d="M20 12H9"/><path d="M12 5H8C6.89543 5 6 5.89543 6 7V17C6 18.1046 6.89543 19 8 19H12"/></svg>
          <span>Déconnexion</span>
        </a>
      </nav>
    </aside>

    <!-- Contenu principal -->
    <main class="flex-1">
      <div class="max-w-3xl mx-auto px-4 py-8">
        
        <div class="flex items-center gap-2 text-sm text-gray-500 mb-6">
          <a href="index.php?p=infirmier/dashboard" class="hover:text-teal-600">Tableau de bord</a>
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 18l6-6-6-6"/></svg>
          <span class="text-gray-800 font-medium">Constantes vitales</span>
        </div>

        <!-- Sélection patient -->
        <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8">
          <div class="flex items-center gap-3 mb-6">
            <div class="w-10 h-10 bg-green-100 rounded-xl flex items-center justify-center">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#0d6b4e" stroke-width="1.8"><circle cx="12" cy="12" r="10"/><path d="M12 8v4l3 3"/></svg>
            </div>
            <h1 class="text-xl md:text-2xl font-bold text-gray-800">Constantes vitales</h1>
          </div>

          <!-- Recherche patient -->
          <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-1">Patient *</label>
            <select name="patient" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl input-focus transition bg-white">
              <option value="">Sélectionnez un patient</option>
              <option value="patient1">Jean ADANDE - Chambre 301</option>
              <option value="patient2">Marie ZINSOU - Chambre 102</option>
              <option value="patient3">Paul KOUASSI - Chambre 201</option>
            </select>
          </div>

          <!-- Formulaire constantes -->
          <form action="" method="POST" class="space-y-5">
<?php /* CSRF */ ?><input type="hidden" name="_csrf" value="<?= htmlspecialchars($csrf_token ?? '', ENT_QUOTES) ?>">
            <div class="grid md:grid-cols-2 gap-4">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Tension artérielle (mmHg)</label>
                <div class="flex gap-2">
                  <input type="number" name="tension_systole" placeholder="Systole" class="w-1/2 px-4 py-2.5 border border-gray-200 rounded-xl input-focus transition bg-white">
                  <span class="self-center">/</span>
                  <input type="number" name="tension_diastole" placeholder="Diastole" class="w-1/2 px-4 py-2.5 border border-gray-200 rounded-xl input-focus transition bg-white">
                </div>
                <p class="text-xs text-gray-400 mt-1">Normale: 120/80</p>
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Température (°C)</label>
                <input type="number" step="0.1" name="temperature" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl input-focus transition bg-white" placeholder="37.0">
                <p class="text-xs text-gray-400 mt-1">Normale: 36.5 - 37.5</p>
              </div>
            </div>

            <div class="grid md:grid-cols-2 gap-4">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Pouls (bpm)</label>
                <input type="number" name="pouls" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl input-focus transition bg-white" placeholder="60-100">
                <p class="text-xs text-gray-400 mt-1">Normale: 60 - 100 bpm</p>
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Saturation O2 (%)</label>
                <input type="number" name="saturation" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl input-focus transition bg-white" placeholder="95-100">
                <p class="text-xs text-gray-400 mt-1">Normale: > 95%</p>
              </div>
            </div>

            <div class="grid md:grid-cols-2 gap-4">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Fréquence respiratoire</label>
                <input type="number" name="respiratoire" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl input-focus transition bg-white" placeholder="12-20">
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Poids (kg)</label>
                <input type="number" step="0.1" name="poids" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl input-focus transition bg-white">
              </div>
            </div>

            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Glycémie (g/L)</label>
              <input type="number" step="0.1" name="glycemie" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl input-focus transition bg-white">
            </div>

            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Observations</label>
              <textarea name="observations" rows="2" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl input-focus transition bg-white" placeholder="Remarques particulières..."></textarea>
            </div>

            <div class="flex flex-col sm:flex-row gap-3 pt-4">
              <button type="submit" class="flex-1 py-3 bg-teal-600 text-white rounded-xl font-medium hover:bg-teal-700 transition">
                Enregistrer
              </button>
              <a href="index.php?p=infirmier/dashboard" class="flex-1 py-3 border border-gray-300 text-gray-700 rounded-xl font-medium hover:bg-gray-50 transition text-center">
                Annuler
              </a>
            </div>
          </form>
        </div>

        <!-- Historique constantes récentes -->
        <div class="bg-white rounded-2xl shadow-xl p-6 mt-6">
          <h3 class="font-semibold text-gray-800 mb-4">Dernières constantes enregistrées</h3>
          <div class="space-y-3">
            <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
              <div>
                <p class="text-sm font-medium text-gray-800">.....</p>
                <p class="text-xs text-gray-500">TA: ...../..... | Temp: ..... | Pouls: ..... | Sat: ....%</p>
              </div>
              <p class="text-xs text-gray-400">.....</p>
            </div>
          </div>
        </div>
      </div>

      <footer class="bg-white border-t border-gray-200 mt-8 py-6">
        <div class="max-w-7xl mx-auto px-4 text-center text-xs text-gray-400">
          <p>© 2025 MediTrace - Tous droits réservés</p>
        </div>
      </footer>
    </main>
  </div>



<?php $contenu = ob_get_clean(); require __DIR__ . '/../layouts/main.php'; ?>
