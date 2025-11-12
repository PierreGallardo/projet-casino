<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casino Royal SIO - <?=$title ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        /* Un fond sombre pour une ambiance casino */
        body {
            background-color: #121212; /* Un noir un peu plus doux */
        }
    </style>
</head>
<body class="text-white">

    <!-- Header Simple -->
    <header class="bg-gray-900">
        <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
            <!-- Logo -->
            <a href="index.php?action=index" class="text-2xl font-bold text-yellow-400">
                <i class="fas fa-crown mr-2"></i>Casino Royal SIO
            </a>
            <!-- Boutons d'action -->
            <div class="flex items-center space-x-3">
                <a href="index.php?action=connexionUser" class="bg-gray-700 hover:bg-gray-600 text-white py-2 px-4 rounded-full text-sm transition">Connexion</a>
                <a href="index.php?action=create-compte" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-bold py-2 px-4 rounded-full text-sm transition">Inscription</a>
            </div>
        </nav>
    </header>

    <!-- Section Principale -->
    <main class="container mx-auto px-6 py-12">

        <?php if (isset($error)): ?>
            <div class="alert alert-error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <?php if (isset($success)): ?>
            <div class="alert alert-success"><?= htmlspecialchars($success) ?></div>
        <?php endif; ?>

        <?= $content ?? '' ?>
    </main>


    <!-- Footer Simple -->
    <footer class="bg-gray-900 mt-16">
        <div class="container mx-auto px-6 py-6 text-center text-gray-400">
            <div class="flex justify-center space-x-6 mb-4">
                <a href="#" class="hover:text-yellow-400">Termes & Conditions</a>
                <a href="#" class="hover:text-yellow-400">Jeu Responsable</a>
                <a href="#" class="hover:text-yellow-400">Contact</a>
            </div>
            <p class="text-sm">&copy; 2025 Casino Royal SIO. Tous droits réservés.</p>
            <p class="text-xs mt-2">Le jeu comporte des risques. Jouez de manière responsable.</p>
        </div>
    </footer>

</body>
</html>