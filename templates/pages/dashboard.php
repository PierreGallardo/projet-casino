<?php
$title = 'Dashboard';
ob_start();
?>

<div class="text-center">
            <!-- Message de bienvenue -->
            <h1 class="text-4xl md:text-5xl font-extrabold">Votre Espace de Jeu</h1>
            <p class="text-gray-400 mt-2 text-lg">Prêt à relever de nouveaux défis ?</p>

            <!-- Affichage du solde principal -->
            <div class="my-12">
                <div class="bg-gray-900 inline-block p-8 rounded-lg shadow-2xl border border-gray-800">
                    <h2 class="text-sm font-bold text-gray-400 tracking-widest uppercase">Solde disponible</h2>
                    <p class="text-6xl font-bold text-yellow-400 mt-2">1,234.56 €</p>
                </div>
            </div>

            <!-- Boutons d'action principaux -->
            <div class="flex flex-col sm:flex-row justify-center items-center space-y-4 sm:space-y-0 sm:space-x-4">
                <a href="#" class="w-full sm:w-auto bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-bold py-4 px-8 rounded-full text-lg transition shadow-lg">
                    <i class="fas fa-play mr-2"></i>Accéder aux jeux
                </a>
                <a href="#" class="w-full sm:w-auto bg-gray-700 hover:bg-gray-600 text-white font-bold py-4 px-8 rounded-full text-lg transition">
                    Effectuer un dépôt
                </a>
            </div>
        </div>
        
        <!-- NOUVELLE SECTION : Gestion des données personnelles -->
        <div class="max-w-2xl mx-auto mt-20">
             <div class="bg-gray-900 p-8 rounded-lg shadow-2xl border border-gray-800 text-center">
                <h3 class="text-2xl font-bold text-yellow-400">Gérez Votre Compte</h3>
                <p class="text-gray-400 mt-2 mb-6">Mettez à jour vos informations personnelles, changez votre mot de passe ou consultez vos préférences.</p>
                <a href="#" class="bg-gray-700 hover:bg-gray-600 text-white font-bold py-3 px-6 rounded-full transition">
                    Gérer mes informations
                </a>
            </div>
        </div>

        <!-- Section "Vos jeux de table" -->
        <div class="mt-20">
            <h3 class="text-2xl font-bold text-center mb-8">Accès Rapide aux Jeux de Table</h3>
            <div class="max-w-4xl mx-auto grid grid-cols-1 sm:grid-cols-2 gap-8">
                
                <!-- Carte Jeu 1 : Blackjack -->
                <div class="bg-gray-800 rounded-lg overflow-hidden group shadow-lg hover:shadow-yellow-400/20 transition-shadow duration-300">
                    <img src="https://placehold.co/600x400/1a202c/fbbf24?text=Blackjack" alt="Jeu Blackjack" class="w-full h-48 object-cover">
                    <div class="p-5">
                        <h4 class="font-bold text-xl">Blackjack Live</h4>
                        <p class="text-sm text-gray-400 mb-4">Jeu de Table</p>
                         <button class="w-full bg-gray-700 group-hover:bg-yellow-400 group-hover:text-gray-900 text-white font-semibold py-3 rounded-lg transition-colors">
                            Jouer
                        </button>
                    </div>
                </div>

                <!-- Carte Jeu 2 : Roulette -->
                <div class="bg-gray-800 rounded-lg overflow-hidden group shadow-lg hover:shadow-yellow-400/20 transition-shadow duration-300">
                    <img src="https://placehold.co/600x400/1a202c/fbbf24?text=Roulette" alt="Jeu Roulette" class="w-full h-48 object-cover">
                    <div class="p-5">
                        <h4 class="font-bold text-xl">Roulette Pro</h4>
                        <p class="text-sm text-gray-400 mb-4">Jeu de Table</p>
                         <button class="w-full bg-gray-700 group-hover:bg-yellow-400 group-hover:text-gray-900 text-white font-semibold py-3 rounded-lg transition-colors">
                            Jouer
                        </button>
                    </div>
                </div>

            </div>
        </div>

<?php
$content = ob_get_clean();
include __DIR__ . '/../layout.php';
?>