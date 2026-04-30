<?php include __DIR__ . '/../partials/flash.php'; ?>
<?php $titre = "Planifier rendez-vous - MediTrace"; ob_start(); ?>
<style>
    body { font-family: 'Inter', sans-serif; background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 50%, #bbf7d0 100%); }
    .sidebar-item { transition: all 0.3s ease; }
    .sidebar-item:hover { background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%); border-left: 3px solid #0d6b4e; }
    .sidebar-item.active { background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%); border-left: 3px solid #0d6b4e; color: #0d6b4e; font-weight: 600; }
    .input-focus:focus { outline: none; border-color: #0d6b4e; box-shadow: 0 0 0 3px rgba(13, 107, 78, 0.1); }
  </style>

<div class="flex">
<aside class="w-72 bg-white shadow-lg min-h-screen sticky top-0">
  <div class="p-6 border-b border-gray-100"><div class="flex items-center gap-3"><div class="w-10 h-10 bg-green-100 rounded-xl flex items-center justify-center"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#0d6b4e" stroke-width="1.8"><path d="M3 21H21" stroke-linecap="round"/><path d="M5 21V7C5 5.9 5.9 5 7 5H17C18.1 5 19 5.9 19 7V21" stroke-linecap="round"/><path d="M9 21V15H15V21" stroke-linecap="round"/><path d="M9 11H10" stroke-linecap="round"/><path d="M14 11H15" stroke-linecap="round"/><path d="M9 8H10" stroke-linecap="round"/><path d="M14 8H15" stroke-linecap="round"/><rect x="11" y="2" width="2" height="3" rx="1"/></svg></div><span class="text-xl font-bold text-gray-800">Medi<span class="text-green-700">Trace</span></span></div><div class="mt-4 p-3 bg-gray-50 rounded-xl"><p class="text-xs text-gray-400">Connecté en tant que</p><p class="text-sm font-medium text-gray-700">.....</p><p class="text-xs text-gray-500">Administrateur</p></div></div>
  <nav class="p-4">
    <p class="text-xs text-gray-400 uppercase tracking-wide mb-3 px-3">Menu principal</p>
    <a href="index.php?p=administrateur/dashboard" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 mb-1"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M3 9L12 3L21 9L12 15L21 9"/><path d="M5 12V19H19V12"/></svg><span>Tableau de bord</span></a>
    <p class="text-xs text-gray-400 uppercase tracking-wide mb-3 mt-4 px-3">Gestion des patients</p>
    <a href="index.php?p=administrateur/enregistrer_patient" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 mb-1"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 12C14.2091 12 16 10.2091 16 8C16 5.79086 14.2091 4 12 4C9.79086 4 8 5.79086 8 8C8 10.2091 9.79086 12 12 12Z"/><path d="M5 20V19C5 15.6863 7.68629 13 11 13H13C16.3137 13 19 15.6863 19 19V20"/></svg><span>Enregistrer patient</span></a>
    <p class="text-xs text-gray-400 uppercase tracking-wide mb-3 mt-4 px-3">Gestion des chambres</p>
    <a href="index.php?p=administrateur/affecter_chambre" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 mb-1"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9H21"/><path d="M9 21V9"/></svg><span>Affecter chambre</span></a>
    <p class="text-xs text-gray-400 uppercase tracking-wide mb-3 mt-4 px-3">Gestion financière</p>
    <a href="index.php?p=administrateur/generer_facture" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 mb-1"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="4" y="4" width="16" height="20" rx="2"/><path d="M8 12H16"/><path d="M12 8V16"/></svg><span>Générer facture</span></a>
    <a href="index.php?p=administrateur/enregistrer_paiement" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 mb-1"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="12" r="3"/><path d="M3 12H7M17 12H21"/></svg><span>Enregistrer paiement</span></a>
    <p class="text-xs text-gray-400 uppercase tracking-wide mb-3 mt-4 px-3">Gestion du personnel</p>
    <a href="index.php?p=administrateur/gerer_personnel" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 mb-1"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg><span>Gérer personnel</span></a>
    <p class="text-xs text-gray-400 uppercase tracking-wide mb-3 mt-4 px-3">Planification</p>
    <a href="index.php?p=administrateur/planifier_rendezvous" class="sidebar-item active flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 mb-1"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="12" r="10"/><path d="M12 8v4l3 3"/></svg><span>Planifier rendez-vous</span></a>
    <p class="text-xs text-gray-400 uppercase tracking-wide mb-3 mt-4 px-3">Statistiques</p>
    <a href="index.php?p=administrateur/statistiques" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 mb-1"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M21 12v3a4 4 0 0 1-4 4H7a4 4 0 0 1-4-4v-3"/><path d="M12 16V2"/><path d="M8 6L12 2L16 6"/></svg><span>Statistiques</span></a>
    <div class="border-t border-gray-100 my-4"></div>
    <a href="index.php?p=connexion/login" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-lg text-red-500 mb-1"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M15 9L20 12L15 15"/><path d="M20 12H9"/><path d="M12 5H8C6.89543 5 6 5.89543 6 7V17C6 18.1046 6.89543 19 8 19H12"/></svg><span>Déconnexion</span></a>
  </nav>
</aside>

<main class="flex-1">
  <div class="max-w-3xl mx-auto px-4 py-8">
    <div class="flex items-center gap-2 text-sm text-gray-500 mb-6"><a href="index.php?p=administrateur/dashboard" class="hover:text-green-700">Tableau de bord</a><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 18l6-6-6-6"/></svg><span class="text-gray-800 font-medium">Planifier rendez-vous</span></div>
    <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8">
      <div class="flex items-center gap-3 mb-6"><div class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="1.8"><circle cx="12" cy="12" r="10"/><path d="M12 8v4l3 3"/></svg></div><h1 class="text-xl md:text-2xl font-bold text-gray-800">Planifier un rendez-vous</h1></div>
      <form action="" method="POST" class="space-y-5">
<?php /* CSRF */ ?><input type="hidden" name="_csrf" value="<?= htmlspecialchars($csrf_token ?? '', ENT_QUOTES) ?>">
        <div class="grid md:grid-cols-2 gap-4"><div><label class="block text-sm font-medium text-gray-700 mb-1">Patient *</label><select name="patient" required class="w-full px-4 py-2.5 border border-gray-200 rounded-xl input-focus transition"><option value="">Sélectionnez un patient</option><option value=".....">..... - .....</option></select></div><div><label class="block text-sm font-medium text-gray-700 mb-1">Médecin *</label><select name="medecin" required class="w-full px-4 py-2.5 border border-gray-200 rounded-xl input-focus transition"><option value="">Sélectionnez un médecin</option><option value=".....">Dr ..... - Cardiologie</option><option value=".....">Dr ..... - Généraliste</option></select></div></div>
        <div class="grid md:grid-cols-2 gap-4"><div><label class="block text-sm font-medium text-gray-700 mb-1">Date *</label><input type="date" name="date" required class="w-full px-4 py-2.5 border border-gray-200 rounded-xl input-focus transition"></div><div><label class="block text-sm font-medium text-gray-700 mb-1">Heure *</label><select name="heure" required class="w-full px-4 py-2.5 border border-gray-200 rounded-xl input-focus transition"><option value="">Sélectionnez</option><option value="09:00">09:00</option><option value="10:00">10:00</option><option value="11:00">11:00</option><option value="14:00">14:00</option><option value="15:00">15:00</option></select></div></div>
        <div><label class="block text-sm font-medium text-gray-700 mb-1">Motif</label><textarea name="motif" rows="3" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl input-focus transition" placeholder="Motif de la consultation..."></textarea></div>
        <div class="flex gap-3"><button type="submit" class="flex-1 py-3 bg-green-700 text-white rounded-xl font-medium hover:bg-green-800 transition">Planifier</button><a href="index.php?p=administrateur/dashboard" class="flex-1 py-3 border border-gray-300 text-gray-700 rounded-xl font-medium hover:bg-gray-50 transition text-center">Annuler</a></div>
      </form>
      <div class="mt-6"><h3 class="font-semibold text-gray-800 mb-3">Rendez-vous à venir</h3><div class="space-y-2"><div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg"><div><p class="text-sm font-medium">..... - Dr .....</p><p class="text-xs text-gray-500">..... à .....</p></div><span class="text-xs text-yellow-600">Confirmé</span></div><div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg"><div><p class="text-sm font-medium">..... - Dr .....</p><p class="text-xs text-gray-500">..... à .....</p></div><span class="text-xs text-yellow-600">En attente</span></div></div></div>
    </div>
  </div>
  <footer class="bg-white border-t border-gray-200 mt-8 py-6"><div class="max-w-7xl mx-auto px-4 text-center text-xs text-gray-400"><p>© 2025 MediTrace - Tous droits réservés</p></div></footer>
</main>
</div>


<?php $contenu = ob_get_clean(); require __DIR__ . '/../layouts/main.php'; ?>
