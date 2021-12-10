<?php

use App\Manager\PostManager;
use App\Manager\CommentManager;
use App\Fram\Factories\PDOFactory;

if ($id == null) {
    header('Location: /');
}

$post = new PostManager(PDOFactory::getMysqlConnection());
$result = $post->getPost($id);

$comment = new CommentManager(PDOFactory::getMysqlConnection());
$comments = $comment->getComments($id);

?>

<div class="mx-auto mt-20 flex flex-col text-xl w-11/12">
    <div>
        <h1 class="font-bold my-6 text-2xl"><?= $result->getTitle() ?> <p class="float-right text-xs">Par
                <?= $result->getUsername() ?> - le <?= $result->getDate() ?></p>
        </h1>
        <?php if($urlimage != null){ ?>
        <img class="w-1/3 mb-5" src="<?= $urlimage ?>" alt="<?= $result->getTitle() ?>">
        <?php } ?>
        <p class="mb-10"><?= $result->getContent() ?></p>
        <? if (($result->getIdUser()) == $_SESSION["idUser"] || $_SESSION['role'] == 'admin') { ?>
        <a href="/deletepost/<?= $result->getIdPost() ?>"
            class="flex-no-shrink bg-red-500 px-5 py-2 text-sm shadow-sm hover:shadow-lg font-medium tracking-wider border-2 border-red-500 text-white rounded-lg float-right">SUPPRIMER</a>
        <? } ?>
    </div>
    <div class="mx-auto mt-20 w-11/12">
        <?php foreach ($comments as $comment) : ?>
        <div class="my-8 w-full">
            <div class="flex">
                <h4>
                    <p class="font-bold">> <?= $comment->getUsername() ?></p>
                    <p class="text-xs">Le <?= $comment->getDate() ?></p>
                </h4>
            </div>
            <p class="ml-10 break-all"><?= $comment->getContent() ?></p>
            <? if (($comment->getIdUser()) == $_SESSION["idUser"] || $_SESSION['role'] == 'admin') { ?>
            <a href="/deletecomment/<?= $comment->getId() ?>"
                class="flex-no-shrink bg-red-500 px-5 py-2 text-sm shadow-sm hover:shadow-lg font-medium tracking-wider border-2 border-red-500 text-white rounded-lg float-right">SUPPRIMER</a>
            <?php } ?>
        </div>
        <p class="break-all"><?= $comment->getContent() ?></p>
        <? if (($comment->getIdUser()) == $_SESSION["idUser"] || $_SESSION['role'] == 'admin') { ?>
        <a href="/deletecomment/<?= $comment->getId() ?>"
            class="flex-no-shrink bg-red-500 px-5 py-2 text-sm shadow-sm hover:shadow-lg font-medium tracking-wider border-2 border-red-500 text-white rounded-lg">SUPPRIMER</a>
        <?php } ?>
    </div>
    <?php endforeach; ?>
</div>
<?php if ($_SESSION['role'] == 'user' || $_SESSION['role'] == 'admin') { ?>
<div class="w-full mt-20">
    <form action="/createcomment" method="post">
        <div class="mb-6">
            <label for="commentcontent" class="text-sm font-medium text-gray-200 block mb-2">Commenter</label>
            <textarea id="commentcontent" name="commentcontent"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="Votre commentaire..." required=""></textarea>
        </div>
        <input type="hidden" name="postid" value="<?= $id ?>">
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center float-right">Poster</button>
    </form>
</div>
<?php } ?>
</div>