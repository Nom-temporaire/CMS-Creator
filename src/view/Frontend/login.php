<div class="w-4/12 mx-auto mt-20 h-2/6 p-8 bg-gray-300 rounded-lg flex flex-col items-center justify-center">
    =======
    <?php
    // Verifier si $_POST est vide ou non
    // Si $_POST est vide, on affiche le formulaire
    // Sinon, on affiche une alerte

    ?>
    <h1>Login</h1>
    <form action="log" method="post" class="m-auto flex flex-col">
        <label for="username" class="m-2">Username</label>
        <input type="text" name="username" id="username" class="m-2" required>
        <label for="password" class="m-2">Password</label>
        <input type="password" name="password" id="password" class="m-2" required>
        <input type="submit" value="Login" class="m-2">
    </form>
</div>