<?php include __DIR__ . '/../partials/flash.php'; ?>
<?php $titre = "Résultats analyses - MediTrace"; ob_start(); ?>
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

        <a href="index.php" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 mb-1">
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

        <a href="index.php?p=patient/analyses" class="sidebar-item active flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 mb-1">
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
      <div class="max-w-5xl mx-auto px-4 py-8">
        
        <!-- Fil d'Ariane -->
        <div class="flex items-center gap-2 text-sm text-gray-500 mb-6">
          <a href="index.php" class="hover:text-green-700">Tableau de bord</a>
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M9 18l6-6-6-6"/>
          </svg>
          <span class="text-gray-800 font-medium">Résultats analyses</span>
        </div>

        <!-- Titre -->
        <div class="flex items-center gap-3 mb-6">
          <div class="w-10 h-10 bg-yellow-100 rounded-xl flex items-center justify-center">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#ca8a04" stroke-width="1.8">
              <path d="M20 12V8H4V12M20 12L4 12M20 12L15 17M4 12L9 17"/>
            </svg>
          </div>
          <h1 class="text-xl md:text-2xl font-bold text-gray-800">Résultats d'analyses</h1>
        </div>

        <!-- Liste des analyses -->
        <div class="space-y-4">
          
          <!-- Analyse 1 -->
          <div class="bg-white rounded-xl shadow-sm overflow-hidden">
            <div class="bg-gradient-to-r from-yellow-50 to-amber-50 p-4 border-b border-yellow-100">
              <div class="flex justify-between items-center flex-wrap gap-3">
                <div>
                  <p class="text-sm text-gray-500">Date de l'analyse</p>
                  <p class="font-semibold text-gray-800">.....</p>
                </div>
                <div>
                  <p class="text-sm text-gray-500">Type d'analyse</p>
                  <p class="font-semibold text-gray-800">.....</p>
                </div>
                <div>
                  <p class="text-sm text-gray-500">Médecin prescripteur</p>
                  <p class="font-semibold text-gray-800">.....</p>
                </div>
                <span class="px-3 py-1 bg-green-100 text-green-700 text-xs rounded-full font-medium">Disponible</span>
              </div>
            </div>
            <div class="p-4">
              <div class="grid md:grid-cols-2 gap-4">
                <div>
                  <p class="text-xs text-gray-500 mb-2">Résultat</p>
                  <div class="bg-gray-50 rounded-lg p-3">
                    <p class="text-sm text-gray-700">.....</p>
                  </div>
                </div>
                <div>
                  <p class="text-xs text-gray-500 mb-2">Interprétation</p>
                  <div class="bg-gray-50 rounded-lg p-3">
                    <p class="text-sm text-gray-700">.....</p>
                  </div>
                </div>
              </div>
              <div class="mt-4 pt-3 border-t border-gray-100 flex justify-between items-center">
                <div>
                  <p class="text-xs text-gray-500">Date de rendu</p>
                  <p class="text-sm text-gray-700">.....</p>
                </div>
                <div class="flex gap-2">
                  <a href="#" class="flex items-center gap-2 px-4 py-2 bg-green-50 rounded-lg text-sm text-green-700 hover:bg-green-100 transition">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                      <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                      <polyline points="7 10 12 15 17 10"/>
                      <line x1="12" y1="15" x2="12" y2="3"/>
                    </svg>
                    Télécharger PDF
                  </a>
                  <a href="#" class="flex items-center gap-2 px-4 py-2 bg-gray-50 rounded-lg text-sm text-gray-600 hover:bg-gray-100 transition">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                      <circle cx="12" cy="12" r="3"/>
                      <path d="M22 12A10 10 0 0 0 12 2A10 10 0 0 0 2 12"/>
                      <path d="M22 12H18M6 12H2"/>
                    </svg>
                    Voir détail
                  </a>
                </div>
              </div>
            </div>
          </div>

          <!-- Analyse 2 -->
          <div class="bg-white rounded-xl shadow-sm overflow-hidden">
            <div class="bg-gradient-to-r from-yellow-50 to-amber-50 p-4 border-b border-yellow-100">
              <div class="flex justify-between items-center flex-wrap gap-3">
                <div>
                  <p class="text-sm text-gray-500">Date de l'analyse</p>
                  <p class="font-semibold text-gray-800">.....</p>
                </div>
                <div>
                  <p class="text-sm text-gray-500">Type d'analyse</p>
                  <p class="font-semibold text-gray-800">.....</p>
                </div>
                <div>
                  <p class="text-sm text-gray-500">Médecin prescripteur</p>
                  <p class="font-semibold text-gray-800">.....</p>
                </div>
                <span class="px-3 py-1 bg-green-100 text-green-700 text-xs rounded-full font-medium">Disponible</span>
              </div>
            </div>
            <div class="p-4">
              <div class="grid md:grid-cols-2 gap-4">
                <div>
                  <p class="text-xs text-gray-500 mb-2">Résultat</p>
                  <div class="bg-gray-50 rounded-lg p-3">
                    <p class="text-sm text-gray-700">.....</p>
                  </div>
                </div>
                <div>
                  <p class="text-xs text-gray-500 mb-2">Interprétation</p>
                  <div class="bg-gray-50 rounded-lg p-3">
                    <p class="text-sm text-gray-700">.....</p>
                  </div>
                </div>
              </div>
              <div class="mt-4 pt-3 border-t border-gray-100 flex justify-between items-center">
                <div>
                  <p class="text-xs text-gray-500">Date de rendu</p>
                  <p class="text-sm text-gray-700">.....</p>
                </div>
                <div class="flex gap-2">
                  <a href="#" class="flex items-center gap-2 px-4 py-2 bg-green-50 rounded-lg text-sm text-green-700 hover:bg-green-100 transition">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                      <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                      <polyline points="7 10 12 15 17 10"/>
                      <line x1="12" y1="15" x2="12" y2="3"/>
                    </svg>
                    Télécharger PDF
                  </a>
                  <a href="#" class="flex items-center gap-2 px-4 py-2 bg-gray-50 rounded-lg text-sm text-gray-600 hover:bg-gray-100 transition">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                      <circle cx="12" cy="12" r="3"/>
                      <path d="M22 12A10 10 0 0 0 12 2A10 10 0 0 0 2 12"/>
                      <path d="M22 12H18M6 12H2"/>
                    </svg>
                    Voir détail
                  </a>
                </div>
              </div>
            </div>
          </div>

          <!-- Analyse 3 - En attente -->
          <div class="bg-white rounded-xl shadow-sm overflow-hidden opacity-80">
            <div class="bg-gradient-to-r from-gray-50 to-gray-100 p-4 border-b border-gray-200">
              <div class="flex justify-between items-center flex-wrap gap-3">
                <div>
                  <p class="text-sm text-gray-500">Date de l'analyse</p>
                  <p class="font-semibold text-gray-800">.....</p>
                </div>
                <div>
                  <p class="text-sm text-gray-500">Type d'analyse</p>
                  <p class="font-semibold text-gray-800">.....</p>
                </div>
                <div>
                  <p class="text-sm text-gray-500">Médecin prescripteur</p>
                  <p class="font-semibold text-gray-800">.....</p>
                </div>
                <span class="px-3 py-1 bg-yellow-100 text-yellow-700 text-xs rounded-full font-medium">En attente</span>
              </div>
            </div>
            <div class="p-4 text-center py-6">
              <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#9ca3af" stroke-width="1.5" class="mx-auto mb-2">
                <circle cx="12" cy="12" r="10"/>
                <path d="M12 6v6l4 2"/>
              </svg>
              <p class="text-sm text-gray-500">Résultats en cours de traitement</p>
              <p class="text-xs text-gray-400 mt-1">Les résultats seront disponibles sous 48h</p>
            </div>
          </div>

        </div>

        <!-- Message si aucune analyse -->
        <div class="bg-white rounded-xl shadow-sm p-8 text-center mt-4">
          <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#9ca3af" stroke-width="1.5" class="mx-auto mb-3">
            <path d="M20 12V8H4V12M20 12L4 12M20 12L15 17M4 12L9 17"/>
          </svg>
          <p class="text-gray-500">Aucune analyse disponible</p>
          <p class="text-xs text-gray-400 mt-1">Les résultats d'analyses apparaîtront ici</p>
        </div>

      </div>

      <!-- Footer -->
      <footer class="bg-white border-t border-gray-200 mt-8 py-6">
        <div class="max-w-7xl mx-auto px-4 text-center text-xs text-gray-400">
          <p>© 2026 MediTrace - Tous droits réservés</p>
        </div>
      </footer>
    </main>
  </div>



<?php $contenu = ob_get_clean(); require __DIR__ . '/../layouts/main.php'; ?>
