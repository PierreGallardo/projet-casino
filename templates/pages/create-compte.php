<?php
$title = 'Creer un compte';
ob_start();
?>

<div class = "flex justify-center">

<div class="bg-gray-900 p-8 rounded-lg shadow-2xl w-full max-w-md">
            
            <!-- Titre du formulaire -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-extrabold text-yellow-400">Créez Votre Compte</h1>
                <p class="text-gray-400 mt-2">Rejoignez-nous et recevez 100 SIO points de bienvenue !</p>
            </div>

            <!-- Formulaire -->
            <form action="#" method="POST" class="space-y-6">
                <!-- Champ Nom d'utilisateur -->
                <div>
                    <label for="nom_User" class="text-sm font-bold text-gray-300 block mb-2">Nom d'utilisateur</label>
                    <input type="text" id="nom_User" name="nom_User" class="w-full p-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400 transition" placeholder="Ex: Joueur777" required>
                </div>

                <!-- Champ Email -->
                <div>
                    <label for="mail_User" class="text-sm font-bold text-gray-300 block mb-2">Adresse e-mail</label>
                    <input type="email" id="mail_User" name="mail_User" class="w-full p-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400 transition" placeholder="votre.email@exemple.com" required>
                </div>

                <!-- Champ Mot de passe -->
                <div>
                    <label for="mdp_User" class="text-sm font-bold text-gray-300 block mb-2">Mot de passe</label>
                    <input type="password" id="mdp_User" name="mdp_User" class="w-full p-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400 transition" required>
                </div>
                
                <!-- Champ Confirmation du mot de passe -->
                <div>
                    <label for="password_confirm" class="text-sm font-bold text-gray-300 block mb-2">Confirmez le mot de passe</label>
                    <input type="password" id="password_confirm" name="password_confirm" class="w-full p-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400 transition" required>
                </div>

                <!-- Case à cocher - Termes et conditions -->
                <div class="flex items-center">
                    <input type="checkbox" id="terms" name="terms" class="h-4 w-4 bg-gray-700 border-gray-600 rounded text-yellow-400 focus:ring-yellow-500">
                    <label for="terms" class="ml-2 block text-sm text-gray-400">
                        J'accepte les <a href="#" class="font-medium text-yellow-400 hover:underline">Termes & Conditions</a>
                    </label>
                </div>

                <!-- Bouton d'inscription -->
                <div>
                    <button type="submit" class="w-full bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-bold py-3 px-4 rounded-full transition text-lg shadow-lg mt-4">
                        Créer mon compte
                    </button>
                </div>
            </form>
            
            <!-- Lien vers la connexion -->
            <p class="text-center text-gray-400 text-sm mt-8">
                Vous avez déjà un compte ? <a href="#" class="font-medium text-yellow-400 hover:underline">Connectez-vous</a>
            </p>

</div>
</div>

<?php
$content = ob_get_clean();
include __DIR__ . '/../layout.php';
?>