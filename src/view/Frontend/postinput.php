<?php
if($_SESSION['role'] == 'visiteur'){
    header('Location: /');
}
?>

<div class="w-full mt-20">
    <form action="createpost" method="post">
        <div class="mb-6">
            <label for="titre" class="text-sm font-medium text-gray-900 block mb-2">Title</label>
            <input type="text" id="titre" name="titre"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="My amazing title" required="">
        </div>
        <div class="mb-6">
            <label for="contenu" class="text-sm font-medium text-gray-900 block mb-2">Content</label>
            <textarea id="contenu" name="contenu"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="My amazing post !" required=""></textarea>
        </div>
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Poster</button>
    </form>
</div>