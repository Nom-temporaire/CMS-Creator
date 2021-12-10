<?php
if ($_SESSION['role'] == 'visiteur') {
    header('Location: /');
}
?>

<div class="w-full mt-20">
    <form action="createpost" method="post" enctype="multipart/form-data"
        class="w-10/12 mx-auto mt-20 h-6/6 p-8 bg-gray-900 rounded-lg flex flex-col items-left justify-left">
        <div class="mb-6">
            <label for="titre" class="text-2xl font-medium text-gray-200 block mb-2 ml-5">Titre</label>
            <input type="text" id="titre" name="titre"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="Votre titre" required="">
        </div>

        <div class="mb-6">
            <label for="image" class="text-2xl font-medium text-gray-200 block mb-2 ml-5">Image</label>
            <input type="file" id="file" name="file"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="IMAGE" accept="image/jpg, image/gif, image/jpeg, image/png">
        </div>
        <div class="mb-6">
            <label for="contenu" class="text-2xl font-medium text-gray-200 block mb-2 ml-5">Contenu</label>
            <textarea id="contenu" name="contenu"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="Contenu de votre message" required=""></textarea>
        </div>
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center float-right">Poster</button>
    </form>
</div>