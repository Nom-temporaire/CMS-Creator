<?php
if ($_SESSION['role'] == 'visiteur') {
    header('Location: /');
  }
use App\Manager\UserManager;
use App\Fram\Factories\PDOFactory;

$users = new UserManager(PDOFactory::getMysqlConnection());
$result = $users->getAllUsers();

?>




<section class="container mx-auto p-6 font-mono">
  <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
    <div class="w-full overflow-x-auto">
      <table class="w-full">
        <thead>
          <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
            <th class="px-4 py-3">Userame</th>
            <th class="px-4 py-3">Mail</th>
            <th class="px-4 py-3">Date</th>
            <th class="px-4 py-3">Action</th>
          </tr>
        </thead>
        <tbody class="bg-white">
    <?php foreach ($result as $users) : ?>
          <tr class="text-gray-700">
            <td class="px-4 py-3 border">
              <div class="flex items-center text-sm">
                <div class="relative w-8 h-8 mr-3 rounded-full md:block">
                  <img class="object-cover w-full h-full rounded-full" src="https://www.vhv.rs/dpng/d/436-4363443_view-user-icon-png-font-awesome-user-circle.png" alt="" loading="lazy" />
                  <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                </div>
                <div>
                  <p class="font-semibold text-black"><?= $users->getUsername() ?></p>
                  <p class="text-xs text-gray-600"><?php if ($users->getIsAdmin() == 1) {echo('Admin');} else {echo('User');}?></p>
                </div>
              </div>
            </td>
            <td class="px-4 py-3 text-ms font-semibold border"><?= $users->getMail() ?></td>
            <td class="px-4 py-3 text-xs border">
              <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"><?= $users->getDate() ?></span>
            </td>
            <td class="px-4 py-3 text-sm border">SUPPRIMER</td>
          </tr>
    <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</section>