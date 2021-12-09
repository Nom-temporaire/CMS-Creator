<?php
// Si le role dans session est visiteur alors on redirige vers la page d'accueil
if ($_SESSION['role'] == 'visiteur') {
  header('Location: /');
}
?>


<form action="accountchange" method="post" class="w-full max-w-sm">
  <div class="md:flex md:items-center mb-6">
    <div class="md:w-1/3">
      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
        Username
      </label>
    </div>
    <div class="md:w-2/3">
      <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="username" type="text">
    </div>
  </div>
  <div class="md:flex md:items-center mb-6">
    <div class="md:w-1/3">
      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-password">
        Mail
      </label>
    </div>
    <div class="md:w-2/3">
      <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="mail" type="text" pattern="^[a-zA-Z0-9]+[@]+[a-zA-Z0-9]+[.]+[a-z]{2,3}">
    </div>
  </div>
  <div class=" md:flex md:items-center mb-6">
    <div class="md:w-1/3">
      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-password">
        Password
      </label>
    </div>
    <div class="md:w-2/3">
      <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="password" type="password" placeholder="************">
    </div>
  </div>
  <div class="md:flex md:items-center mb-6">
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
  <div class="md:flex md:items-center">
    <div class="md:w-1/3"></div>
    <div class="md:w-2/3">
      <input class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit" value="Valider">
    </div>
  </div>
</form>