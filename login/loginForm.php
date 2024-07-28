<div class="center">
    <div class="form">
        <div class="header">
            <img src="../source/image/register.png" id="icon">
            <h2>Login</h2>

            <a href="../register/register.php" id="relative-link">Don't have an acount?</a>
        </div>
        <form method="post" class="register">

            <input type="hidden" name="superPopcorn">
            <input type="hidden" name="deadMeat">
            <input type="hidden" name="fatHat">
            <input type="hidden" name="grandGoo">
            <input type="hidden" name="infiniteCard">

            <input type="text" name="username" placeholder="Username" id="formInput">
            <input type="password" name="password" placeholder="Password" id="formInput">
            <input type="password" name="passwordRep" placeholder="Repeat your password" id="formInput">

            <input type="checkbox" name="remember" id="checkbox">
            <label for="checkbox">Remember me</label>

            <br>
            
            <input type="submit" value="Login" class="button" id="submit">
        </form>
    </div>
</div>