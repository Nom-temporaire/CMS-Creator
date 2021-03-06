<?php
// Si le role dans session est visiteur alors on redirige vers la page d'accueil
if ($_SESSION['role'] == 'visiteur') {
  header('Location: /');
}
//On verifie si dans la session il y a alerte
// Si oui on l'affiche dans une alerte JS
if (isset($_SESSION['alert'])) {
  echo '<script>alert("' . $_SESSION['alert'] . '");</script>';
  unset($_SESSION['alert']);
}

?>

<form action="accountchange" method="post" class="w-4/12 mx-auto mt-20 h-2/6 p-8 bg-gray-900 rounded-lg flex flex-col items-left justify-left">
  <div class="md:flex md:items-left mb-6">
    <div class="md:w-1/3">
      <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4" for="inline-full-name">
        Username
      </label>
    </div>
    <div class="md:w-2/3">
      <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="username" type="text">
    </div>
  </div>
  <div class="md:flex md:items-left mb-6">
    <div class="md:w-1/3">
      <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4" for="inline-password">
        Mail
      </label>
    </div>
    <div class="md:w-2/3">
      <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="mail" type="text" pattern="^[a-zA-Z0-9]+[@]+[a-zA-Z0-9]+[.]+[a-z]{2,3}">
    </div>
  </div>
  <div class=" md:flex md:items-left mb-6">
    <div class="md:w-1/3">
      <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4" for="inline-password">
        Password
      </label>
    </div>
    <div class="md:w-2/3">
      <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="password" type="password" placeholder="************">
    </div>
  </div>
  <div class="md:flex md:items-left mb-6">
    <div class="md:w-1/3"></div>
    <label for="isAdmin" class="md:w-2/3 block text-gray-500 font-bold">
      <!-- On verifier le role dans $_SESSION -->
      <!-- Si c'est admin alors c'est checked -->
      <!-- sinon ce n'est pas check -->
      <input class="mr-2 leading-tight" type="checkbox" name="isAdmin" value="1" <?php if ($_SESSION['role'] == 'admin') {
                                                                                    echo 'checked';
                                                                                  } ?>>
      <span class="text-sm">
        is Admin ?
      </span>
    </label>
  </div>
        <input class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit" value="Valider">
</form>