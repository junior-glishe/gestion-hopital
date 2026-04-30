<?php include __DIR__ . '/../partials/flash.php'; ?>
<?php $titre = "Dashboard Administrateur - MediTrace";
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
  <!-- Sidebar Admin -->
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
        <p class="text-sm font-medium text-gray-700"><?= htmlspecialchars($nomComplet ?? 'Admin') ?></p>
        <p class="text-xs text-gray-500">Administrateur</p>
      </div>
    </div>

    <nav class="p-4">
      <p class="text-xs text-gray-400 uppercase tracking-wide mb-3 px-3">Menu principal</p>

      <a href="index.php?p=administrateur/dashboard" class="sidebar-item active flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 mb-1">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
          <path d="M3 9L12 3L21 9L12 15L21 9" />
          <path d="M5 12V19H19V12" />
        </svg>
        <span>Tableau de bord</span>
      </a>

      <p class="text-xs text-gray-400 uppercase tracking-wide mb-3 mt-4 px-3">Gestion des patients</p>

      <a href="index.php?p=administrateur/enregistrer_patient" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 mb-1">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
          <path d="M12 12C14.2091 12 16 10.2091 16 8C16 5.79086 14.2091 4 12 4C9.79086 4 8 5.79086 8 8C8 10.2091 9.79086 12 12 12Z" />
          <path d="M5 20V19C5 15.6863 7.68629 13 11 13H13C16.3137 13 19 15.6863 19 19V20" />
        </svg>
        <span>Enregistrer patient</span>
      </a>

      <p class="text-xs text-gray-400 uppercase tracking-wide mb-3 mt-4 px-3">Gestion des chambres</p>

      <a href="index.php?p=administrateur/affecter_chambre" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 mb-1">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
          <rect x="3" y="3" width="18" height="18" rx="2" />
          <path d="M3 9H21" />
          <path d="M9 21V9" />
        </svg>
        <span>Affecter chambre</span>
      </a>

      <p class="text-xs text-gray-400 uppercase tracking-wide mb-3 mt-4 px-3">Gestion financière</p>

      <a href="index.php?p=administrateur/generer_facture" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 mb-1">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
          <rect x="4" y="4" width="16" height="20" rx="2" />
          <path d="M8 12H16" />
          <path d="M12 8V16" />
        </svg>
        <span>Générer facture</span>
      </a>

      <a href="index.php?p=administrateur/enregistrer_paiement" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 mb-1">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
          <circle cx="12" cy="12" r="3" />
          <path d="M3 12H7M17 12H21" />
        </svg>
        <span>Enregistrer paiement</span>
      </a>

      <p class="text-xs text-gray-400 uppercase tracking-wide mb-3 mt-4 px-3">Gestion du personnel</p>

      <a href="index.php?p=administrateur/gerer_personnel" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 mb-1">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
          <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
          <circle cx="9" cy="7" r="4" />
          <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
          <path d="M16 3.13a4 4 0 0 1 0 7.75" />
        </svg>
        <span>Gérer personnel</span>
      </a>

      <p class="text-xs text-gray-400 uppercase tracking-wide mb-3 mt-4 px-3">Administration</p>

      <a href="index.php?p=administrateur/gerer_acces" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 mb-1">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
          <path d="M12 12C14.2091 12 16 10.2091 16 8C16 5.79086 14.2091 4 12 4C9.79086 4 8 5.79086 8 8C8 10.2091 9.79086 12 12 12Z" />
          <path d="M3 21V19C3 15.6863 5.68629 13 9 13H15C18.3137 13 21 15.6863 21 19V21" />
        </svg>
        <span>Gérer accès</span>
      </a>

      <p class="text-xs text-gray-400 uppercase tracking-wide mb-3 mt-4 px-3">Planification</p>

      <a href="index.php?p=administrateur/planifier_rendezvous" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 mb-1">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
          <circle cx="12" cy="12" r="10" />
          <path d="M12 8v4l3 3" />
        </svg>
        <span>Planifier rendez-vous</span>
      </a>

      <p class="text-xs text-gray-400 uppercase tracking-wide mb-3 mt-4 px-3">Statistiques</p>

      <a href="index.php?p=administrateur/statistiques" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 mb-1">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
          <path d="M21 12v3a4 4 0 0 1-4 4H7a4 4 0 0 1-4-4v-3" />
          <path d="M12 16V2" />
          <path d="M8 6L12 2L16 6" />
        </svg>
        <span>Statistiques</span>
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

      <!-- Fil d'Ariane -->
      <div class="flex items-center gap-2 text-sm text-gray-500 mb-6">
        <span class="text-gray-800 font-medium">Tableau de bord</span>
      </div>

      <!-- Section Bienvenue -->
      <div class="bg-gradient-to-r from-green-700 to-green-600 rounded-2xl p-6 md:p-8 text-white mb-8 shadow-xl">
        <div>
          <h1 class="text-2xl md:text-3xl font-bold">Bonjour, <?= htmlspecialchars($nomComplet ?? 'Admin') ?></h1>
          <p class="text-green-100 mt-1">Bienvenue sur votre espace administrateur MediTrace</p>
          <p class="text-green-100/70 text-sm mt-2">Rôle : Administrateur</p>
        </div>
      </div>

      <!-- Cartes de statistiques -->
      <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
        <div class="bg-white rounded-xl p-4 shadow-sm card-hover">
          <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="1.8">
                <path d="M12 12C14.2091 12 16 10.2091 16 8C16 5.79086 14.2091 4 12 4C9.79086 4 8 5.79086 8 8C8 10.2091 9.79086 12 12 12Z" />
                <path d="M5 20V19C5 15.6863 7.68629 13 11 13H13C16.3137 13 19 15.6863 19 19V20" />
              </svg>
            </div>
            <div>
              <p class="text-2xl font-bold text-gray-800"><?= $patients ?? 0 ?></p>
              <p class="text-xs text-gray-500">Patients</p>
            </div>
          </div>
        </div>
        <div class="bg-white rounded-xl p-4 shadow-sm card-hover">
          <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#0d6b4e" stroke-width="1.8">
                <path d="M22 11.08V12C21.9988 14.1564 21.3005 16.2547 20.0093 17.9818C18.7182 19.709 16.9033 20.9725 14.8354 21.5839C12.7674 22.1953 10.5573 22.1219 8.53447 21.3746C6.51168 20.6273 4.78465 19.2461 3.61096 17.4371C2.43727 15.628 1.87979 13.4881 2.02168 11.3363C2.16356 9.18455 2.99721 7.13631 4.39828 5.49706C5.79935 3.85781 7.69279 2.71537 9.79619 2.24013C11.8996 1.7649 14.1003 1.98232 16.07 2.85999" />
                <polyline points="22 4 12 14.01 9 11.01" />
              </svg>
            </div>
            <div>
              <p class="text-2xl font-bold text-gray-800"><?= $personnels ?? 0 ?></p>
              <p class="text-xs text-gray-500">Médecins</p>
            </div>
          </div>
        </div>
        <div class="bg-white rounded-xl p-4 shadow-sm card-hover">
          <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#7c3aed" stroke-width="1.8">
                <rect x="3" y="3" width="18" height="18" rx="2" />
                <path d="M3 9H21" />
                <path d="M9 21V9" />
              </svg>
            </div>
            <div>
              <p class="text-2xl font-bold text-gray-800"><?= $chambres ?? 0 ?></p>
              <p class="text-xs text-gray-500">Chambres</p>
            </div>
          </div>
        </div>
        <div class="bg-white rounded-xl p-4 shadow-sm card-hover">
          <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-yellow-100 rounded-lg flex items-center justify-center">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#ca8a04" stroke-width="1.8">
                <rect x="4" y="4" width="16" height="20" rx="2" />
                <path d="M8 12H16" />
              </svg>
            </div>
            <div>
              <p class="text-2xl font-bold text-gray-800"><?= $factures ?? 0 ?></p>
              <p class="text-xs text-gray-500">Factures impayées</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Graphiques rapides et activités récentes -->
      <div class="grid md:grid-cols-2 gap-6">
        <!-- Derniers patients inscrits -->
        <div class="bg-white rounded-xl shadow-sm p-5">
          <div class="flex justify-between items-center mb-4">
            <h3 class="font-semibold text-gray-800">Derniers patients inscrits</h3>
            <a href="index.php?p=administrateur/enregistrer_patient" class="text-xs text-green-700 hover:underline">Voir tout</a>
          </div>
          <div class="overflow-x-auto">
            <table class="w-full text-sm">
              <thead class="bg-gray-50">
                <tr>
                  <th class="px-3 py-2 text-left">Nom</th>
                  <th class="px-3 py-2 text-left">Date</th>
                  <th class="px-3 py-2 text-left">Statut</th>
                </tr>
              </thead>
              <tbody class="divide-y">
                <tr>
                  <td class="px-3 py-2">.....</td>
                  <td class="px-3 py-2">.....</td>
                  <td class="px-3 py-2"><span class="px-2 py-1 bg-green-100 text-green-700 rounded-full text-xs">Actif</span></td>
                </tr>
                <tr>
                  <td class="px-3 py-2">.....</td>
                  <td class="px-3 py-2">.....</td>
                  <td class="px-3 py-2"><span class="px-2 py-1 bg-green-100 text-green-700 rounded-full text-xs">Actif</span></td>
                </tr>
                <tr>
                  <td class="px-3 py-2">.....</td>
                  <td class="px-3 py-2">.....</td>
                  <td class="px-3 py-2"><span class="px-2 py-1 bg-green-100 text-green-700 rounded-full text-xs">Actif</span></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- Chambres disponibles / occupées -->
        <div class="bg-white rounded-xl shadow-sm p-5">
          <div class="flex justify-between items-center mb-4">
            <h3 class="font-semibold text-gray-800">Occupation des chambres</h3>
            <a href="index.php?p=administrateur/affecter_chambre" class="text-xs text-green-700 hover:underline">Gérer</a>
          </div>
          <?php
          $totalChbres = $chambres ?? 0;
          $chbrOccupees = $totalChbres - ($chambresLibres ?? 0);
          $pctOccupe = $totalChbres > 0 ? round($chbrOccupees / $totalChbres * 100) : 0;
          $pctLibre = $totalChbres > 0 ? round(($chambresLibres ?? 0) / $totalChbres * 100) : 0;
          ?>
          <div class="space-y-3">
            <div>
              <div class="flex justify-between text-sm mb-1"><span>Chambres occupées</span><span><?= $chbrOccupees ?></span></div>
              <div class="w-full bg-gray-200 rounded-full h-2">
                <div class="bg-green-600 h-2 rounded-full" style="width: <?= $pctOccupe ?>%"></div>
              </div>
            </div>
            <div>
              <div class="flex justify-between text-sm mb-1"><span>Chambres disponibles</span><span><?= $chambresLibres ?? 0 ?></span></div>
              <div class="w-full bg-gray-200 rounded-full h-2">
                <div class="bg-blue-600 h-2 rounded-full" style="width: <?= $pctLibre ?>%"></div>
              </div>
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