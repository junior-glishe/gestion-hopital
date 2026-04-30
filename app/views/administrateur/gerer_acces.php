<?php include __DIR__ . '/../partials/flash.php'; ?>
<?php $titre = "Gérer accès - MediTrace";
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

    .input-focus:focus {
        outline: none;
        border-color: #0d6b4e;
        box-shadow: 0 0 0 3px rgba(13, 107, 78, 0.1);
    }
</style>

<div class="flex">
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

            <a href="index.php?p=administrateur/dashboard" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 mb-1">
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

            <p class="text-xs text-gray-400 uppercase tracking-wide mb-3 mt-4 px-3">Planification</p>

            <a href="index.php?p=administrateur/planifier_rendezvous" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 mb-1">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                    <circle cx="12" cy="12" r="10" />
                    <path d="M12 8v4l3 3" />
                </svg>
                <span>Planifier rendez-vous</span>
            </a>

            <p class="text-xs text-gray-400 uppercase tracking-wide mb-3 px-3">Administration</p>

            <a href="index.php?p=administrateur/gerer_acces" class="sidebar-item active flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 mb-1">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                    <path d="M12 12C14.2091 12 16 10.2091 16 8C16 5.79086 14.2091 4 12 4C9.79086 4 8 5.79086 8 8C8 10.2091 9.79086 12 12 12Z" />
                    <path d="M3 21V19C3 15.6863 5.68629 13 9 13H15C18.3137 13 21 15.6863 21 19V21" />
                </svg>
                <span>Gérer accès</span>
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

            <a href="index.php?p=connexion/logout" class="sidebar-item flex items-center gap-3 px-3 py-2.5 rounded-lg text-red-500 mb-1">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                    <path d="M15 9L20 12L15 15" />
                    <path d="M20 12H9" />
                    <path d="M12 5H8C6.89543 5 6 5.89543 6 7V17C6 18.1046 6.89543 19 8 19H12" />
                </svg>
                <span>Déconnexion</span>
            </a>
        </nav>
    </aside>

    <main class="flex-1">
        <div class="max-w-4xl mx-auto px-4 py-8">
            <div class="flex items-center gap-2 text-sm text-gray-500 mb-6">
                <a href="index.php?p=administrateur/dashboard" class="hover:text-green-700">Tableau de bord</a>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M9 18l6-6-6-6" />
                </svg>
                <span class="text-gray-800 font-medium">Gérer accès</span>
            </div>

            <div class="bg-white rounded-2xl shadow-sm p-6 md:p-8">
                <h2 class="text-xl font-bold text-gray-900 mb-5">Comptes & rôles</h2>

                <div class="mb-8">
                    <h3 class="font-semibold text-gray-800 mb-3">Ajouter un compte</h3>

                    <form method="POST" action="index.php?p=administrateur/gerer_acces" class="space-y-4">
                        <?php /* CSRF */ ?><input type="hidden" name="_csrf" value="<?= htmlspecialchars($csrf_token ?? '', ENT_QUOTES) ?>">

                        <div class="grid md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Nom</label>
                                <input type="text" name="nom" required class="w-full px-4 py-2.5 border border-gray-200 rounded-xl input-focus transition">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                                <input type="email" name="email" required class="w-full px-4 py-2.5 border border-gray-200 rounded-xl input-focus transition">
                            </div>
                        </div>

                        <div class="grid md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Mot de passe</label>
                                <input type="password" name="mot_de_passe" required class="w-full px-4 py-2.5 border border-gray-200 rounded-xl input-focus transition">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Rôle</label>
                                <select name="role" required class="w-full px-4 py-2.5 border border-gray-200 rounded-xl input-focus transition">
                                    <option value="patient">patient</option>
                                    <option value="medecin">medecin</option>
                                    <option value="infirmier">infirmier</option>
                                    <option value="administrateur">administrateur</option>
                                </select>
                            </div>
                        </div>

                        <div class="flex gap-3">
                            <button type="submit" class="flex-1 py-3 bg-green-700 text-white rounded-xl font-medium hover:bg-green-800 transition">
                                Ajouter
                            </button>
                            <a href="index.php?p=administrateur/dashboard" class="flex-1 py-3 border border-gray-300 text-gray-700 rounded-xl font-medium hover:bg-gray-50 transition text-center">
                                Retour
                            </a>
                        </div>
                    </form>
                </div>

                <div>
                    <h3 class="font-semibold text-gray-800 mb-3">Liste des comptes</h3>

                    <div class="overflow-x-auto rounded-xl border border-gray-100">
                        <table class="w-full text-sm bg-white rounded-xl">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-4 py-3 text-left">ID</th>
                                    <th class="px-4 py-3 text-left">Nom</th>
                                    <th class="px-4 py-3 text-left">Email</th>
                                    <th class="px-4 py-3 text-left">Rôle</th>
                                    <th class="px-4 py-3 text-left">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y">
                                <?php foreach (($utilisateurs ?? []) as $u): ?>
                                    <?php $idU = (int)($u['id'] ?? 0); ?>
                                    <tr>
                                        <td class="px-4 py-3"><?= $idU ?></td>
                                        <td class="px-4 py-3"><?= htmlspecialchars($u['nom'] ?? '') ?></td>
                                        <td class="px-4 py-3"><?= htmlspecialchars($u['email'] ?? '') ?></td>
                                        <td class="px-4 py-3">
                                            <span class="px-2 py-1 bg-green-100 text-green-700 rounded-full text-xs">
                                                <?= htmlspecialchars($u['role'] ?? '') ?>
                                            </span>
                                        </td>
                                        <td class="px-4 py-3">
                                            <?php if (!empty($currentUserId) && $idU === (int)$currentUserId): ?>
                                                <span class="text-xs text-gray-400">Vous</span>
                                            <?php else: ?>
                                                <form method="POST" action="index.php?p=administrateur/gerer_acces" onsubmit="return confirm('Supprimer ce compte utilisateur ?');" class="inline">
                                                    <?php /* CSRF */ ?><input type="hidden" name="_csrf" value="<?= htmlspecialchars($csrf_token ?? '', ENT_QUOTES) ?>">
                                                    <input type="hidden" name="_delete" value="<?= $idU ?>">
                                                    <button type="submit" class="text-red-600 hover:text-red-700 text-xs font-medium">
                                                        Supprimer
                                                    </button>
                                                </form>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>

                                <?php if (empty($utilisateurs ?? [])): ?>
                                    <tr>
                                        <td colspan="5" class="px-4 py-6 text-center text-gray-500">
                                            Aucun compte utilisateur trouvé.
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                    <p class="text-xs text-gray-500 mt-4">
                        Note : la suppression supprime directement l’utilisateur de la table <code>utilisateurs</code>.
                    </p>
                </div>
            </div>
        </div>

    </main>
</div>

<?php $contenu = ob_get_clean();
require __DIR__ . '/../layouts/main.php'; ?>