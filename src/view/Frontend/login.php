<?php
    if (isset($_SESSION['alert'])) {
        echo '<script>alert("' . $_SESSION['alert'] . '");</script>';
        unset($_SESSION['alert']);
    }

?>

<form action="log" method="post" class="w-4/12 mx-auto mt-20 h-2/6 p-8 bg-gray-900 rounded-lg flex flex-col items-left justify-left">
<div class="md:flex md:items-left mb-6">
    <div class="md:w-1/3">
      <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4" for="inline-full-name">
        Username
      </label>
    </div>
    <div class="md:w-2/3">
      <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="username" type="text" required>
    </div>
  </div>
  <div class=" md:flex md:items-left mb-6">
    <div class="md:w-1/3">
      <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4" for="inline-password">
        Password
      </label>
    </div>
    <div class="md:w-2/3">
      <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="password" type="password" placeholder="************" required>
    </div>
  </div>
        <input class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit" value="Login">
    </form>
</div>