<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>Admin Login</title>
</head>

<body>
    <h1>Admin Login</h1>
    <form action="includes/adminLogin.inc.php" method="POST">
        <div>
            <label for="email">Email: </label>
            <input type="text" name="email" id="email" required>
        </div>
        <div>
            <label for="pwd">Password: </label>
            <input type="password" name="pwd" id="pwd" required>
        </div>
        <button type="submit" name="submit">Submit</button>

    </form>
</body>

</html>