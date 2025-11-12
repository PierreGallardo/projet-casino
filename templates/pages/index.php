<?php
$title = 'Accueil';
ob_start();
?>
        
        <!-- Bannière d'accueil -->
        <section class="text-center mb-16">
            <h1 class="text-4xl md:text-6xl font-extrabold mb-4">Votre Aventure Commence Ici</h1>
            <p class="text-lg text-gray-300 mb-8">Recevez 100 SIO points instantanément après votre inscription !</p>
            <a href="index.php?action=create-compte" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-bold py-3 px-8 rounded-full transition text-lg shadow-lg">Créer mon compte</a>
        </section>

        <!-- Grille de jeux populaires -->
        <section>
            <h2 class="text-3xl font-bold text-center mb-10">Nos Jeux Populaires</h2>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

                <!-- Carte de jeu 1 -->
                <div class="bg-gray-800 rounded-lg overflow-hidden group shadow-lg">
                    <img src="https://source.unsplash.com/random/300x400/?slot-machine,gold" alt="Jeu 1" class="w-full h-48 object-cover">
                    <div class="p-4 relative">
                        <h3 class="font-bold">Mystery Black Jack</h3>
                        <a href="#" class="absolute inset-0 bg-black bg-opacity-70 flex items-center justify-center opacity-0 group-hover:opacity-100 transition">
                            <span class="text-white font-bold">Jouer</span>
                        </a>
                    </div>
                </div>

                <!-- Carte de jeu 2 -->
                <div class="bg-gray-800 rounded-lg overflow-hidden group shadow-lg">
                    <img src="https://source.unsplash.com/random/300x400/?slot-machine,diamonds" alt="Jeu 2" class="w-full h-48 object-cover">
                    <div class="p-4 relative">
                        <h3 class="font-bold">Méga Roulette</h3>
                        <a href="#" class="absolute inset-0 bg-black bg-opacity-70 flex items-center justify-center opacity-0 group-hover:opacity-100 transition">
                            <span class="text-white font-bold">Jouer</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>

<?php
$content = ob_get_clean();
include __DIR__ . '/../layout.php';
?>