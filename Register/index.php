<title>Register</title>
<div>
    <form action="includes/register.inc.php" method="POST">
        <div>
            <label for="email">Email: </label>
            <input type="text" name="email" id="email" required>
        </div>
        <div>
            <label for="pwd">Password: </label>
            <input type="password" name="pwd" id="pwd" required>
        </div>
        <div>
            <label for="paswrodRpt">Repeat Password: </label>
            <input type="password" name="pwdrepeat" id="pwdrepeat" required>
        </div>
        <button type="submit" name="submit">submit</button>
    </form>
</div>