<div class="w-4/12 mx-auto mt-20 h-2/6 p-8 bg-gray-300 rounded-lg flex flex-col items-center justify-center">
    =======
    <?php
    if (isset($_SESSION['alert'])) {
        echo '<script>alert("' . $_SESSION['alert'] . '");</script>';
        unset($_SESSION['alert']);
    }

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