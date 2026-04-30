<?php include __DIR__ . '/../partials/flash.php'; ?>
<?php $titre = "Dashboard Médecin - MediTrace";
ob_start(); ?>
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
</style>


<div class="flex">
  <!-- Sidebar -->
  <aside class="w-72 bg-white shadow-lg min-h-screen sticky top-0">
    <div class="p-6 border-b border-gray-100">
      <div class="flex items-center gap-3">
        <div class="w-10 h-10 bg-green-100 rounded-xl flex items-center justify-center">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#0d6b4e" stroke-width="1.8">
            <path d="M3 21H21" stroke-linecap="round" />
            <path d="M5 21V7C5 5.9 5.9 5 7 5H17C18.1 5 19 5.9 19 7V21" stroke-linecap="round" />
            <path d="M9 21V15H15V21" stroke-linecap="round" />
            <path d="M9 11H10" stroke-linecap="round" />
            <path d="M14 11H15" stroke-linecap="round" />
            <path d="M9 8H10" stroke-linecap="round" />
            <path d="M14 8H15" stroke-linecap="round" />
            <rect x="11" y="2" width="2" height="3" rx="1" />
          </svg>
        </div>
        <span class="text-xl font-bold text-gray-800">Medi<span class="text-green-700">Trace</span></span>
      </div>
      <div class="mt-4 p-3 bg-gray-50 rounded-xl">
        <p class="text-xs text-gray-400">Connecté en tant que</p>
        <p class="text-sm font-medium text-gray-700"><?= htmlspecialchars($nomComplet ?? 'Dr. Médecin') ?></p>
        <p class="text-xs text-gray-500">Médecin - <?= htmlspecialchars($specialite ?? 'Généraliste') ?></p>
      </div>
    </div>

    <nav class="p-4">
      <p class="text-xs text-gray-400 uppercase tracking-wide mb-3 px-3">Menu principal</p>

      <a href="index.php?p=medecin/dashboard" class="sidebar-item active flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 mb-1">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
          <path d="M3 9L12 3L21 9L12 15L21 9" />
          <path d="M5 12V19H19V12" />
        </svg>
        <span>Tableau de bord</span>
      </a>

      <p class="text-xs text-gray-400 uppercase tracking-wide mb-3 mt-4 px-3">Consultations</p>

      <a href="index.php?p=medecin/consulter_dossier" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 mb-1">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
          <path d="M4 4H20V20H4V4Z" />
          <path d="M8 7H16" />
          <path d="M8 11H12" />
        </svg>
        <span>Consulter dossier</span>
      </a>

      <a href="index.php?p=medecin/poser_diagnostic" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 mb-1">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
          <path d="M9 12H15" />
          <path d="M12 9V15" />
          <rect x="3" y="3" width="18" height="18" rx="3" />
        </svg>
        <span>Poser diagnostic</span>
      </a>

      <a href="index.php?p=medecin/prescrire_traitement" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 mb-1">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
          <path d="M4 4H20V20H4V4Z" />
          <path d="M8 12H16" />
          <path d="M12 8V16" />
        </svg>
        <span>Prescrire traitement</span>
      </a>

      <a href="index.php?p=medecin/demander_examens" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 mb-1">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
          <path d="M20 12V8H4V12M20 12L4 12M20 12L15 17M4 12L9 17" />
        </svg>
        <span>Demander examens</span>
      </a>

      <p class="text-xs text-gray-400 uppercase tracking-wide mb-3 mt-4 px-3">Hospitalisation</p>

      <a href="index.php?p=medecin/planifier_hospitalisation" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 mb-1">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
          <rect x="3" y="3" width="18" height="18" rx="2" />
          <path d="M3 9H21" />
          <path d="M9 21V9" />
        </svg>
        <span>Planifier hospitalisation</span>
      </a>

      <a href="index.php?p=medecin/autoriser_sortie" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 mb-1">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
          <path d="M12 3L3 8L12 13L21 8L12 3Z" />
          <path d="M5 13L5 17.5C5 18.7 8 20 12 20C16 20 19 18.7 19 17.5L19 13" />
        </svg>
        <span>Suivi + autoriser sortie</span>
      </a>

      <p class="text-xs text-gray-400 uppercase tracking-wide mb-3 mt-4 px-3">Documents</p>

      <a href="index.php?p=medecin/compte_rendu" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 mb-1">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
          <path d="M4 4H20V20H4V4Z" />
          <path d="M8 7H16" />
          <path d="M8 11H12" />
        </svg>
        <span>Compte-rendu hospit.</span>
      </a>

      <p class="text-xs text-gray-400 uppercase tracking-wide mb-3 mt-4 px-3">Spécialiste</p>

      <a href="index.php?p=medecin/transfert_patient" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 mb-1">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
          <path d="M15 9L20 12L15 15" />
          <path d="M20 12H9" />
          <path d="M12 5H8C6.89543 5 6 5.89543 6 7V17C6 18.1046 6.89543 19 8 19H12" />
        </svg>
        <span>Transférer patient ★</span>
      </a>

      <a href="index.php?p=medecin/interpreter_ecg" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 mb-1">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
          <path d="M20 12V8H4V12M20 12L4 12M20 12L15 17M4 12L9 17" />
          <circle cx="12" cy="12" r="2" />
        </svg>
        <span>Interpréter ECG ★</span>
      </a>

      <div class="border-t border-gray-100 my-4"></div>

      <a href="index.php?p=connexion/login" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-lg text-red-500 mb-1">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
          <path d="M15 9L20 12L15 15" />
          <path d="M20 12H9" />
          <path d="M12 5H8C6.89543 5 6 5.89543 6 7V17C6 18.1046 6.89543 19 8 19H12" />
        </svg>
        <span>Déconnexion</span>
      </a>
    </nav>
  </aside>

  <!-- Contenu principal -->
  <main class="flex-1">
    <div class="max-w-7xl mx-auto px-4 py-8">

      <!-- Section Bienvenue -->
      <div class="bg-gradient-to-r from-blue-700 to-blue-600 rounded-2xl p-6 md:p-8 text-white mb-8 shadow-xl">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
          <div>
            <h1 class="text-2xl md:text-3xl font-bold">Bonjour, <?= htmlspecialchars($nomComplet ?? 'Dr. Médecin') ?></h1>
            <p class="text-blue-100 mt-1">Bienvenue sur votre espace médecin MediTrace</p>
            <p class="text-blue-100/70 text-sm mt-2">Spécialité : <span class="font-medium"><?= htmlspecialchars($specialite ?? 'Médecin généraliste') ?></span></p>
          </div>
          <div class="bg-white/10 backdrop-blur-sm rounded-xl px-4 py-2 text-center">
            <p class="text-xs text-blue-100">Dernière connexion</p>
            <p class="text-sm font-semibold"><?= date('d/m/Y H:i') ?></p>
          </div>
        </div>
      </div>

      <!-- Statistiques -->
      <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
        <div class="bg-white rounded-xl p-4 shadow-sm">
          <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="1.8">
                <path d="M12 12C14.2091 12 16 10.2091 16 8C16 5.79086 14.2091 4 12 4C9.79086 4 8 5.79086 8 8C8 10.2091 9.79086 12 12 12Z" />
                <path d="M5 20V19C5 15.6863 7.68629 13 11 13H13C16.3137 13 19 15.6863 19 19V20" />
              </svg>
            </div>
            <div>
              <p class="text-2xl font-bold text-gray-800"><?= $nbPatients ?? 0 ?></p>
              <p class="text-xs text-gray-500">Patients</p>
            </div>
          </div>
        </div>
        <div class="bg-white rounded-xl p-4 shadow-sm">
          <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#0d6b4e" stroke-width="1.8">
                <circle cx="12" cy="12" r="10" />
                <path d="M12 8v4l3 3" />
              </svg>
            </div>
            <div>
              <p class="text-2xl font-bold text-gray-800"><?= $nbConsultations ?? 0 ?></p>
              <p class="text-xs text-gray-500">Consultations</p>
            </div>
          </div>
        </div>
        <div class="bg-white rounded-xl p-4 shadow-sm">
          <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#7c3aed" stroke-width="1.8">
                <rect x="3" y="3" width="18" height="18" rx="2" />
                <path d="M3 9H21" />
              </svg>
            </div>
            <div>
              <p class="text-2xl font-bold text-gray-800"><?= $nbHospitalisations ?? 0 ?></p>
              <p class="text-xs text-gray-500">Hospitalisations</p>
            </div>
          </div>
        </div>
        <div class="bg-white rounded-xl p-4 shadow-sm">
          <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-yellow-100 rounded-lg flex items-center justify-center">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#ca8a04" stroke-width="1.8">
                <path d="M12 8V12M12 16H12.01" />
                <circle cx="12" cy="12" r="10" />
              </svg>
            </div>
            <div>
              <p class="text-2xl font-bold text-gray-800"><?= $nbUrgences ?? 0 ?></p>
              <p class="text-xs text-gray-500">Alertes</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Patients hospitalisés -->
      <div class="bg-white rounded-xl shadow-sm p-5 mb-8">
        <div class="flex justify-between items-center mb-4">
          <h3 class="font-semibold text-gray-800">Mes patients hospitalisés</h3>
          <a href="#" class="text-xs text-blue-600 hover:underline">Voir tous</a>
        </div>
        <div class="overflow-x-auto">
          <table class="w-full">
            <thead class="bg-gray-50">
              <tr>
                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Patient</th>
                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Chambre</th>
                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Admission</th>
                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
              <tr>
                <td class="px-4 py-3 text-sm text-gray-700">.....<br><span class="text-xs text-gray-400">N° patient: .....</span></td>
                <td class="px-4 py-3 text-sm text-gray-700">.....</td>
                <td class="px-4 py-3 text-sm text-gray-700">.....</td>
                <td class="px-4 py-3">
                  <div class="flex gap-2 flex-wrap">
                    <a href="index.php?p=medecin/consulter_dossier" class="text-blue-600 text-xs hover:underline">Dossier</a>
                    <a href="index.php?p=medecin/poser_diagnostic" class="text-blue-600 text-xs hover:underline">Diagnostic</a>
                    <a href="index.php?p=medecin/prescrire_traitement" class="text-blue-600 text-xs hover:underline">Prescrire</a>
                    <a href="index.php?p=medecin/autoriser_sortie" class="text-blue-600 text-xs hover:underline">Sortie</a>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <!-- Demandes récentes -->
      <div class="grid md:grid-cols-2 gap-6">
        <div class="bg-white rounded-xl shadow-sm p-5">
          <h3 class="font-semibold text-gray-800 mb-4">Demandes de consultation</h3>
          <div class="space-y-3">
            <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
              <div>
                <p class="text-sm font-medium text-gray-800">.....</p>
                <p class="text-xs text-gray-500">Motif : .....</p>
              </div>
              <div class="flex gap-2">
                <button class="px-3 py-1 bg-green-600 text-white text-xs rounded-lg">Accepter</button>
                <button class="px-3 py-1 bg-gray-300 text-gray-700 text-xs rounded-lg">Refuser</button>
              </div>
            </div>
          </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-5">
          <h3 class="font-semibold text-gray-800 mb-4">Examens à interpréter</h3>
          <div class="space-y-3">
            <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
              <div>
                <p class="text-sm font-medium text-gray-800">..... - ECG</p>
                <p class="text-xs text-gray-500">Demandé le : .....</p>
              </div>
              <a href="index.php?p=medecin/interpreter_ecg" class="text-blue-600 text-xs hover:underline">Interpréter</a>
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



<?php $contenu = ob_get_clean();
require __DIR__ . '/../layouts/main.php'; ?>