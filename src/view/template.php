<?php
// on va verifier si $_SESSION est vide ou non
if (empty($_SESSION)) {
    // start a session
    session_start();
    $_SESSION['role'] = 'visiteur';
    // header('Location: index');
}
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

<body class="h-screen w-screen">
    <header class="bg-gray-600 w-screen h-20 flex justify-between px-20 items-center">
        <img />
        <div class="h-auto">
            <?php
            if ($_SESSION['role'] == 'visiteur') {
            ?>
                <a href="/signin" class="mx-5 p-2 h-24 bg-gray-800 text-white rounded-lg">Sign-in</a>
                <a href="/signup" class="mx-5 p-2 h-16 bg-indigo-900 text-white rounded-lg">Sign-up</a>
            <?php
            } else {
            ?>
                <p>Bonjour,<a href='account' class="underline text-blue-600 hover:text-blue-800 visited:text-purple-600"><?= $_SESSION['username'] ?></a></p>
                <div>
                    <!-- <a>acceder a mon compte</a> -->
                    <a href="/delog">se deconnecter</a>
                </div>
            <?php
            }
            ?>
        </div>
    </header>



    <div class="container flex m-auto">
        <?= $content; ?>
    </div>
</body>

</html>