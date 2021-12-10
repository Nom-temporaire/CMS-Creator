<?php
// on va verifier si $_SESSION est vide ou non
if (empty($_SESSION)) {
    // start a session
    session_start();
    $_SESSION['role'] = 'visiteur';
    // header('Location: index');
}
if (empty($_SESSION['json'])) :
?>

    <!doctype html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?= $title ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    </head>

    <body class="h-screen w-screen overflow-x-hidden">
        <header class="px-6 py-4">
        <div class="container flex flex-col mx-auto md:flex-row md:items-center md:justify-between">
            <div class="flex items-center justify-between">
                <div>
                    <a class="text-xl font-bold text-gray-800 md:text-2xl">Bonjour <?=$_SESSION['username']?></a>
                </div>
                <div>
                    <button type="button" class="block text-gray-800 hover:text-gray-600 focus:text-gray-600 focus:outline-none md:hidden">
                        <svg viewBox="0 0 24 24" class="w-6 h-6 fill-current">
                            <path d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z">
                            </path>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="flex-col hidden md:flex md:flex-row md:-mx-4">
                <a href="/" class="mx-5 p-2 h-1/2 bg-indigo-900 text-white rounded-lg">Home</a>
            <?php
                if ($_SESSION['role'] == 'admin') {
                ?>
                <a href="#" class="mx-5 p-2 h-1/2 bg-indigo-800 text-white rounded-lg">Créer un post</a>
                <a href="/userlist" class="mx-5 p-2 h-1/2 bg-indigo-700 text-white rounded-lg">Liste des Utilisateurs</a>
                <a href="/account" class="mx-5 p-2 h-1/2 bg-indigo-600 text-white rounded-lg">Mon compte</a>
                <a href="/delog" class="mx-5 p-2 h-1/2 bg-indigo-500 text-white rounded-lg">Log Out</a>
                <?php
                }
                elseif ($_SESSION['role'] == 'user') {
                ?>
                <a href="#" class="mx-5 p-2 h-1/2 bg-indigo-800 text-white rounded-lg">Créer un post</a>
                <a href="/account" class="mx-5 p-2 h-1/2 bg-indigo-600 text-white rounded-lg">Mon compte</a>
                <a href="/delog" class="mx-5 p-2 h-1/2 bg-indigo-500 text-white rounded-lg">Log Out</a>
                <?php
                }
                else {
                ?>
                <a href="/signin" class="mx-5 p-2 h-1/2 bg-gray-800 text-white rounded-lg">Log In</a>
                <a href="/signup" class="mx-5 p-2 h-1/2 bg-gray-900 text-white rounded-lg">Sign Up</a>
                <?php
                }
                ?>
            </div>
        </div>
        </header>



        <div class="container flex m-auto">
            <?= $content; ?>
        </div>
    </body>

    </html>
<?php
// sinon afficher le contenu de $_SESSION['json']
else :
    header('Content-Type: application/json');
    echo $_SESSION['json'];
    unset($_SESSION['json']);

endif;
?>