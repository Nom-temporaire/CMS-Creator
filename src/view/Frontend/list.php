<?php

use App\Manager\PostManager;
use App\Fram\Factories\PDOFactory;

$post = new PostManager(PDOFactory::getMysqlConnection());
$result = $post->getAllPosts();

?>

<div class="w-full mt-20 flex flex-col text-gray-200">
    <?php foreach ($result as $post) : ?>
    <div class="m-6 p-2 border-2 border-gray">
        <h3 class="font-bold"><?= $post->getTitle() ?></h3>
        <p class="my-2"><?= $post->getContent() ?></p>
        <div class="w-full flex justify-between">
            <p><?= $post->getDate() ?></p>
            <a class="text-right" <?= 'href="/post/' . $post->getIdPost() .'"' ?>>Voir plus ...</a>
        </div>
    </div>
    <?php endforeach; ?>
</div>