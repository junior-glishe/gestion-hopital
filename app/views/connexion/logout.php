<?php include __DIR__ . '/../partials/flash.php'; ?>
<?php $titre = "Inscription Patient - MediTrace"; ob_start(); ?>
<style>
    body { font-family: 'Inter', sans-serif; }
    .input-focus:focus {
      outline: none;
      border-color: #0d6b4e;
      box-shadow: 0 0 0 3px rgba(13, 107, 78, 0.1);
    }
  </style>


  <div class="max-w-2xl mx-auto px-4">
    <div class="bg-white rounded-2xl shadow-xl p-8">
      <div class="text-center mb-8">
        <div class="flex justify-center mb-3">
          <div class="w-14 h-14 bg-green-100 rounded-2xl flex items-center justify-center">
            <!-- Icône HÔPITAL -->
            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#0d6b4e" stroke-width="1.8">
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
        </div>
        <h1 class="text-2xl font-bold text-gray-800">Inscription <span class="text-green-700">Patient</span></h1>
        <p class="text-gray-500 text-sm mt-1">Créez votre espace patient MediTrace</p>
      </div>

      <form action="" method="POST">
<?php /* CSRF */ ?><input type="hidden" name="_csrf" value="<?= htmlspecialchars($csrf_token ?? '', ENT_QUOTES) ?>">
        <div class="grid md:grid-cols-2 gap-5">
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Nom *</label>
            <input type="text" name="nom" required class="w-full px-4 py-2.5 border border-gray-200 rounded-xl input-focus transition">
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Prénom *</label>
            <input type="text" name="prenom" required class="w-full px-4 py-2.5 border border-gray-200 rounded-xl input-focus transition">
          </div>
        </div>

        <div class="grid md:grid-cols-2 gap-5 mt-4">
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Date de naissance *</label>
            <input type="date" name="date_naissance" required class="w-full px-4 py-2.5 border border-gray-200 rounded-xl input-focus transition">
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Téléphone *</label>
            <input type="tel" name="telephone" required class="w-full px-4 py-2.5 border border-gray-200 rounded-xl input-focus transition">
          </div>
        </div>

        <div class="mt-4">
          <label class="block text-sm font-medium text-gray-700 mb-1">Email *</label>
          <input type="email" name="email" required class="w-full px-4 py-2.5 border border-gray-200 rounded-xl input-focus transition">
        </div>

        <div class="mt-4">
          <label class="block text-sm font-medium text-gray-700 mb-1">Adresse</label>
          <input type="text" name="adresse" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl input-focus transition">
        </div>

        <div class="grid md:grid-cols-2 gap-5 mt-4">
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Groupe sanguin</label>
            <select name="groupe_sanguin" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl input-focus transition">
              <option value="">Non renseigné</option>
              <option value="A+">A+</option>
              <option value="A-">A-</option>
              <option value="B+">B+</option>
              <option value="B-">B-</option>
              <option value="O+">O+</option>
              <option value="O-">O-</option>
            </select>
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Personne à contacter (urgence)</label>
            <input type="text" name="contact_urgence" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl input-focus transition" placeholder="Nom et téléphone">
          </div>
        </div>

        <div class="grid md:grid-cols-2 gap-5 mt-4">
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Mot de passe *</label>
            <input type="password" name="mot_de_passe" required class="w-full px-4 py-2.5 border border-gray-200 rounded-xl input-focus transition">
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Confirmer le mot de passe *</label>
            <input type="password" name="confirm_password" required class="w-full px-4 py-2.5 border border-gray-200 rounded-xl input-focus transition">
          </div>
        </div>

        <div class="mt-8">
          <button type="submit" class="w-full py-3 bg-green-700 text-white rounded-xl font-medium hover:bg-green-800 transition cursor-pointer">
            S'inscrire
          </button>
        </div>
      </form>

      <div class="text-center mt-6">
        <p class="text-sm text-gray-500">
          Déjà inscrit ? <a href="index.php?p=connexion/login" class="text-green-700 hover:underline">Se connecter</a>
        </p>
        <p class="text-sm text-gray-500 mt-2">
          <a href="index.php" class="text-gray-400 hover:text-green-700 transition">← Choisir un autre rôle</a>
        </p>
      </div>
    </div>
  </div>


<?php $contenu = ob_get_clean(); require __DIR__ . '/../layouts/main.php'; ?>
