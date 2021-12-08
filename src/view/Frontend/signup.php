<div class="w-4/12 mx-auto mt-20 h-2/6 p-8 bg-gray-300 rounded-lg flex flex-col items-center justify-center">
    <h1>Sign-up</h1>
    <form action="create" method="post" class="m-auto flex flex-col">
        <label for="username" class="m-2">Username</label>
        <input type="text" name="username" id="username" class="m-2" required>
        <label for="password" class="m-2">Password</label>
        <input type="password" name="password" id="password" class="m-2" required>
        <label for="email" class="m-2">Email</label>
        <input type="text" name="email" id="email" class="m-2" pattern="^[a-zA-Z0-9]+[@]+[a-zA-Z0-9]+[.]+[a-z]{2,3}"
            required>
        <input type="submit" value="Sign-up" class="m-2">
    </form>
</div>