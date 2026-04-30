<?php include __DIR__ . '/../partials/flash.php'; ?>
<?php /** @var string $contenu */ /** @var string $titre */ ?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($titre ?? 'MediTrace') ?></title>
  <meta name="description" content="MediTrace - Gestion hospitalière">
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: { extend: {
        colors: { primary: "#0d6b4e", accent: "#0891b2" },
        fontFamily: { sans: ["Inter","sans-serif"] }
      }}
    };
  </script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="public/css/app.css">
</head>
<body class="font-sans bg-gray-50 text-gray-800">
<?= $contenu ?>
<script src="public/js/app.js"></script>
</body>
</html>
