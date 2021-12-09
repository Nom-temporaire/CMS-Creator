<?php

use App\Manager\PostManager;
use App\Fram\Factories\PDOFactory;

$post = new PostManager(PDOFactory::getMysqlConnection());
$result = $post->getAllPosts();

?>

<div class="w-full mt-20 flex flex-col">
    <?php foreach ($result as $post) : ?>
    <div class="m-6 p-2 border-2 border-black">
        <h3 class="font-bold"><?= $post["nom"] ?></h3>
        <p class="my-2"><?= $post["contenu"] ?></p>
        <div class="w-full flex justify-between">
            <p><?= $post["date"] ?></p>
            <a class="text-right">Voir plus ...</a>
        </div>
    </div>
    <?php endforeach; ?>
</div>