<?php

use App\Manager\PostManager;
use App\Fram\Factories\PDOFactory;

if($id == null) {
    header('Location: /');
}

$post = new PostManager(PDOFactory::getMysqlConnection());
$result = $post->getPost($id);


?>

<div class="mt-40 flex flex-col text-xl">
    <div>
        <h1 class="font-bold my-4 text-2xl"><?= $result->getTitle() ?></h1>
        <p><?= $result->getContent() ?></p>
        <h4>Fait par user - le <?= $result->getDate() ?></h4>
    </div>
    <div class="mt-40">
        <div class="my-8">
            <div class="flex">
                <h4 class="mr-4">UserCommentary</h4>
                <p class="ml-4">Le 11/11/1111</p>
            </div>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam, fuga? Architecto eveniet deleniti,
                ipsam
                tenetur optio voluptas doloremque autem velit neque ipsa dignissimos dolor est. Quaerat rerum omnis
                voluptate vitae.</p>
        </div>
        <div class="my-8">
            <div class="flex">
                <h4 class="mr-4">UserCommentary</h4>
                <p class="ml-4">Le 11/11/1111</p>
            </div>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam, fuga? Architecto eveniet deleniti,
                ipsam
                tenetur optio voluptas doloremque autem velit neque ipsa dignissimos dolor est. Quaerat rerum omnis
                voluptate vitae.</p>
        </div>
    </div>
</div>