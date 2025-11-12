<?php
$title = 'Se connecter';
ob_start();
?>
<div class = "flex justify-center">
<div class="bg-gray-900 p-8 rounded-lg shadow-2xl w-full max-w-md">
            
            <!-- Titre du formulaire -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-extrabold text-yellow-400">Accédez à Votre Compte</h1>
                <p class="text-gray-400 mt-2">Heureux de vous revoir !</p>
            </div>

            <!-- Formulaire -->
            <form action="#" method="POST" class="space-y-6">

                <!-- Champ Email -->
                <div>
                    <label for="email" class="text-sm font-bold text-gray-300 block mb-2">Adresse e-mail</label>
                    <input type="email" id="email" name="email" class="w-full p-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400 transition" placeholder="votre.email@exemple.com" required>
                </div>

                <!-- Champ Mot de passe -->
                <div>
                    <label for="password" class="text-sm font-bold text-gray-300 block mb-2">Mot de passe</label>
                    <input type="password" id="password" name="password" class="w-full p-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400 transition" required>
                </div>
                
                <!-- Options supplémentaires -->
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input type="checkbox" id="remember" name="remember" class="h-4 w-4 bg-gray-700 border-gray-600 rounded text-yellow-400 focus:ring-yellow-500">
                        <label for="remember" class="ml-2 block text-sm text-gray-400">
                            Se souvenir de moi
                        </label>
                    </div>
                    <div class="text-sm">
                        <a href="#" class="font-medium text-yellow-400 hover:underline">Mot de passe oublié ?</a>
                    </div>
                </div>


                <!-- Bouton de connexion -->
                <div>
                    <button type="submit" class="w-full bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-bold py-3 px-4 rounded-full transition text-lg shadow-lg mt-4">
                        Se connecter
                    </button>
                </div>
            </form>
            
            <!-- Lien vers l'inscription -->
            <p class="text-center text-gray-400 text-sm mt-8">
                Pas encore de compte ? <a href="index.php?action=create-compte" class="font-medium text-yellow-400 hover:underline">Inscrivez-vous</a>
            </p>

        </div>
    </div>
<?php
$content = ob_get_clean();
include __DIR__ . '/../layout.php';
?>