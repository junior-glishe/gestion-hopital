<?php include __DIR__ . '/../partials/flash.php'; ?>
<?php $titre = "Interpréter ECG - MediTrace"; ob_start(); ?>
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
          <p class="text-xs text-gray-500">Médecin Spécialiste - Cardiologue</p>
        </div>
      </div>

      <nav class="p-4">
        <p class="text-xs text-gray-400 uppercase tracking-wide mb-3 px-3">Menu principal</p>
        <a href="index.php?p=medecin/dashboard" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 mb-1">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M3 9L12 3L21 9L12 15L21 9"/><path d="M5 12V19H19V12"/></svg><span>Tableau de bord</span>
        </a>
        <p class="text-xs text-gray-400 uppercase tracking-wide mb-3 mt-4 px-3">Consultations</p>
        <a href="index.php?p=medecin/consulter_dossier" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 mb-1">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M4 4H20V20H4V4Z"/><path d="M8 7H16"/><path d="M8 11H12"/></svg><span>Consulter dossier</span>
        </a>
        <a href="index.php?p=medecin/poser_diagnostic" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 mb-1">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M9 12H15"/><path d="M12 9V15"/><rect x="3" y="3" width="18" height="18" rx="3"/></svg><span>Poser diagnostic</span>
        </a>
        <a href="index.php?p=medecin/prescrire_traitement" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 mb-1">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M4 4H20V20H4V4Z"/><path d="M8 12H16"/><path d="M12 8V16"/></svg><span>Prescrire traitement</span>
        </a>
        <a href="index.php?p=medecin/demander_examens" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 mb-1">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M20 12V8H4V12M20 12L4 12M20 12L15 17M4 12L9 17"/></svg><span>Demander examens</span>
        </a>
        <p class="text-xs text-gray-400 uppercase tracking-wide mb-3 mt-4 px-3">Hospitalisation</p>
        <a href="index.php?p=medecin/planifier_hospitalisation" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 mb-1">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9H21"/><path d="M9 21V9"/></svg><span>Planifier hospitalisation</span>
        </a>
        <a href="index.php?p=medecin/autoriser_sortie" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 mb-1">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 3L3 8L12 13L21 8L12 3Z"/><path d="M5 13L5 17.5C5 18.7 8 20 12 20C16 20 19 18.7 19 17.5L19 13"/></svg><span>Suivi + autoriser sortie</span>
        </a>
        <p class="text-xs text-gray-400 uppercase tracking-wide mb-3 mt-4 px-3">Documents</p>
        <a href="index.php?p=medecin/compte_rendu" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 mb-1">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M4 4H20V20H4V4Z"/><path d="M8 7H16"/><path d="M8 11H12"/></svg><span>Compte-rendu hospit.</span>
        </a>
        <p class="text-xs text-gray-400 uppercase tracking-wide mb-3 mt-4 px-3">Spécialiste</p>
        <a href="index.php?p=medecin/transfert_patient" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 mb-1">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M15 9L20 12L15 15"/><path d="M20 12H9"/><path d="M12 5H8C6.89543 5 6 5.89543 6 7V17C6 18.1046 6.89543 19 8 19H12"/></svg><span>Transférer patient ★</span>
        </a>
        <a href="index.php?p=medecin/interpreter_ecg" class="sidebar-item active flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 mb-1">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M20 12V8H4V12M20 12L4 12M20 12L15 17M4 12L9 17"/><circle cx="12" cy="12" r="2"/></svg><span>Interpréter ECG ★</span>
        </a>
        <div class="border-t border-gray-100 my-4"></div>
        <a href="index.php?p=connexion/login" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-lg text-red-500 mb-1">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M15 9L20 12L15 15"/><path d="M20 12H9"/><path d="M12 5H8C6.89543 5 6 5.89543 6 7V17C6 18.1046 6.89543 19 8 19H12"/></svg><span>Déconnexion</span>
        </a>
      </nav>
    </aside>

    <!-- Contenu principal -->
    <main class="flex-1">
      <div class="max-w-4xl mx-auto px-4 py-8">
        
        <div class="flex items-center gap-2 text-sm text-gray-500 mb-6">
          <a href="index.php?p=medecin/dashboard" class="hover:text-blue-600">Tableau de bord</a>
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 18l6-6-6-6"/></svg>
          <span class="text-gray-800 font-medium">Interpréter ECG ★</span>
        </div>

        <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8">
          <div class="flex items-center gap-3 mb-6">
            <div class="w-10 h-10 bg-red-100 rounded-xl flex items-center justify-center">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#dc2626" stroke-width="1.8">
                <path d="M20 12V8H4V12M20 12L4 12M20 12L15 17M4 12L9 17"/>
                <circle cx="12" cy="12" r="2"/>
              </svg>
            </div>
            <h1 class="text-xl md:text-2xl font-bold text-gray-800">Interpréter ECG</h1>
            <span class="px-2 py-1 bg-red-100 text-red-700 text-xs rounded-full">Spécialiste</span>
          </div>

          <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-1">Examen à interpréter *</label>
            <select name="examen" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl input-focus transition bg-white">
              <option value="">Sélectionnez un examen ECG à interpréter</option>
              <option value="ecg1">ECG - Jean ADANDE - 15/04/2025</option>
              <option value="ecg2">ECG - Marie ZINSOU - 14/04/2025</option>
            </select>
          </div>

          <!-- Aperçu ECG -->
          <div class="bg-gray-100 rounded-xl p-6 mb-6 text-center">
            <div class="inline-block p-4 bg-white rounded-lg shadow">
              <svg width="500" height="150" viewBox="0 0 500 150" class="mx-auto">
                <polyline points="0,75 50,75 60,40 70,50 80,75 100,75 110,30 120,45 130,75 150,75 160,25 170,60 180,75 200,75 210,35 220,55 230,75 250,75 260,40 270,50 280,75 300,75 310,20 320,70 330,75 350,75 360,45 370,65 380,75 400,75 410,30 420,60 430,75 450,75 460,50 470,70 480,75 500,75" fill="none" stroke="#dc2626" stroke-width="2"/>
                <line x1="0" y1="75" x2="500" y2="75" stroke="#9ca3af" stroke-width="1" stroke-dasharray="4"/>
              </svg>
              <p class="text-xs text-gray-400 mt-2">Signal ECG - Tracé standard (simulé)</p>
            </div>
          </div>

          <form action="" method="POST" class="space-y-5">
<?php /* CSRF */ ?><input type="hidden" name="_csrf" value="<?= htmlspecialchars($csrf_token ?? '', ENT_QUOTES) ?>">
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Interprétation *</label>
              <textarea name="interpretation" rows="5" required class="w-full px-4 py-2.5 border border-gray-200 rounded-xl input-focus transition bg-white" placeholder="Rythme, fréquence, axe, ondes, segments, conclusion..."></textarea>
            </div>

            <div class="grid md:grid-cols-2 gap-4">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Rythme cardiaque</label>
                <select name="rythme" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl input-focus transition bg-white">
                  <option value="">Sélectionnez</option>
                  <option value="sinusal">Rythme sinusal régulier</option>
                  <option value="sinusal_irregulier">Rythme sinusal irrégulier</option>
                  <option value="arythmie">Arythmie</option>
                  <option value="fibrillation">Fibrillation auriculaire</option>
                </select>
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Fréquence cardiaque</label>
                <input type="text" name="frequence" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl input-focus transition bg-white" placeholder="Ex: 75 bpm">
              </div>
            </div>

            <div class="grid md:grid-cols-2 gap-4">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Onde P</label>
                <input type="text" name="onde_p" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl input-focus transition bg-white" placeholder="Normale, absente, etc.">
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Intervalle PR</label>
                <input type="text" name="pr" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl input-focus transition bg-white" placeholder="ms">
              </div>
            </div>

            <div class="grid md:grid-cols-2 gap-4">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Complexe QRS</label>
                <input type="text" name="qrs" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl input-focus transition bg-white" placeholder="ms">
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Segment ST</label>
                <input type="text" name="st" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl input-focus transition bg-white" placeholder="Normal, sous-décalé, sus-décalé">
              </div>
            </div>

            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Conclusion *</label>
              <textarea name="conclusion" rows="3" required class="w-full px-4 py-2.5 border border-gray-200 rounded-xl input-focus transition bg-white" placeholder="Conclusion de l'interprétation ECG..."></textarea>
            </div>

            <div class="flex flex-col sm:flex-row gap-3 pt-4">
              <button type="submit" class="flex-1 py-3 bg-red-600 text-white rounded-xl font-medium hover:bg-red-700 transition">
                Enregistrer l'interprétation
              </button>
              <button type="button" class="flex-1 py-3 border border-gray-300 text-gray-700 rounded-xl font-medium hover:bg-gray-50 transition">
                Aperçu PDF
              </button>
              <a href="index.php?p=medecin/dashboard" class="flex-1 py-3 border border-gray-300 text-gray-700 rounded-xl font-medium hover:bg-gray-50 transition text-center">
                Annuler
              </a>
            </div>
          </form>
        </div>

        <!-- Interprétations récentes -->
        <div class="bg-white rounded-2xl shadow-xl p-6 mt-6">
          <h3 class="font-semibold text-gray-800 mb-4">Interprétations ECG récentes</h3>
          <div class="space-y-3">
            <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
              <div>
                <p class="text-sm font-medium text-gray-800">Patient : .....</p>
                <p class="text-xs text-gray-500">Date : ..... - Conclusion : .....</p>
              </div>
              <a href="#" class="text-red-600 text-xs hover:underline">Voir détail</a>
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
