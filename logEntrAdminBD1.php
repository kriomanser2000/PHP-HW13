<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $login = $_POST['login'];
    $password = $_POST['password'];
    $db = new PDO('mysql:host=localhost;dbname=EntranceWebDb1', 'root', '');
    $stmt = $db->prepare("SELECT * FROM User WHERE login = :login");
    $stmt->execute([':login' => $login]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if(!$user)
    {
        echo "Login is not found.";
    }
    elseif (!password_verify($password, $user['password']))
    {
        echo "Wrong password.";
    }
    else
    {
        header('Location: mainEntrAdminBD1.php');
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log In</title>
</head>
<body>
<form method="POST" action="logEntrAdminBD1.php">
    <input type="text" name="login" placeholder="Login" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">LogIn</button>
</form>
</body>
</html>