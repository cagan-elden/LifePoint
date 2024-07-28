<div class="center">
    <div class="form">
        <div class="header">
            <img src="../source/image/register.png" id="icon">
            <h2>Register</h2>

            <a href="../login/login.php" id="relative-link">Already have an acount?</a>
        </div>
        <form method="post" class="register">

            <input type="hidden" name="superPopcorn">

            <input type="text" name="displayname" placeholder="Display name" id="formInput">
            <input type="text" name="username" placeholder="Username" id="formInput">
            <input type="email" name="email" placeholder="E-mail" id="formInput">
            <input type="password" name="password" placeholder="Password" id="formInput">
            <input type="password" name="passwordrep" placeholder="Repeat your password" id="formInput">

            <input type="checkbox" name="remember" id="checkbox">
            <label for="checkbox">Remember me</label>

            <br>
            
            <input type="submit" value="Register" class="button" id="submit">
        </form>
    </div>
</div>