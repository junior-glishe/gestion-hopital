<?php include __DIR__ . '/../partials/flash.php'; ?>
<?php $titre = "Page introuvable"; ob_start(); ?>
<div class="min-h-screen flex items-center justify-center px-4">
  <div class="text-center">
    <h1 class="text-6xl font-bold text-primary">404</h1>
    <p class="mt-3 text-gray-600">Page introuvable.</p>
    <?php if (!empty($message)) : ?>
      <p class="mt-2 text-sm text-gray-400"><?= htmlspecialchars($message) ?></p>
    <?php endif; ?>
    <a href="index.php" class="inline-block mt-6 px-5 py-2 bg-primary text-white rounded-xl">Retour à l'accueil</a>
  </div>
</div>
<?php $contenu = ob_get_clean(); require __DIR__ . '/../layouts/main.php'; ?>
