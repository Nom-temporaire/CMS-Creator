<?php

use App\Manager\PostManager;
use App\Manager\CommentManager;
use App\Fram\Factories\PDOFactory;

if($id == null) {
    header('Location: /');
}

$post = new PostManager(PDOFactory::getMysqlConnection());
$result = $post->getPost($id);

$comment = new CommentManager(PDOFactory::getMysqlConnection());
$comments = $comment->getComments($id);


?>

<div class="mx-auto mt-20 flex flex-col text-xl w-11/12">
    <div>
        <h1 class="font-bold my-4 text-2xl"><?= $result->getTitle() ?></h1>
        <p><?= $result->getContent() ?></p>
        <h4>Fait par user - le <?= $result->getDate() ?></h4>
    </div>
    <div class="w-full mt-20">
        <form action="/createcomment" method="post">
            <div class="mb-6">
                <label for="commentcontent" class="text-sm font-medium text-gray-900 block mb-2">Content</label>
                <textarea id="commentcontent" name="commentcontent"
                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="My amazing comment !" required=""></textarea>
            </div>
            <input type="hidden" name="postid" value="<?= $id ?>">
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Poster</button>
        </form>
    </div>
    <div class="mx-auto mt-20 w-11/12">
        <?php foreach ($comments as $comment) : ?>
        <div class="my-8 w-full">
            <div class="flex">
                <h4 class="mr-4">UserCommentary</h4>
                <p class="ml-4">Le <?= $comment->getDate() ?></p>
            </div>
            <p class="break-all"><?= $comment->getContent() ?></p>
        </div>
        <?php endforeach; ?>
    </div>
</div>