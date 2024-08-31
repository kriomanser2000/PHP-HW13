<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $login = $_POST['login'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $db = new PDO('mysql:host=localhost;dbname=phpStormProj', 'root', '');
    $stmt = $db->prepare("SELECT * FROM User WHERE login = :login");
    $stmt->execute([':login' => $login]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if($user)
    {
        echo "User already exists.";
    }
    else
    {
        $stmt = $db->prepare("INSERT INTO User (login, password, name, surname, country, city) VALUES (:login, :password, :name, :surname, :country, :city)");
        $stmt->execute([
            ':login' => $login,
            ':password' => $password,
            ':name' => $name,
            ':surname' => $surname,
            ':country' => $country,
            ':city' => $city
        ]);
        echo 'Reg successful!';
        header('Location: logEntrAdminBD1.php');
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
    <title>Document</title>
</head>
<body>
<form method="POST" action="regEntrAdminBD1.php" id="registerForm">
    <input type="text" name="login" id="login" placeholder="Login" required>
    <span id="loginError" class="error"></span>
    <input type="password" name="password" id="password" placeholder="Password" required>
    <span id="passwordError" class="error"></span>
    <input type="text" name="name" id="name" placeholder="Name" required>
    <span id="nameError" class="error"></span>
    <input type="text" name="surname" id="surname" placeholder="Surname" required>
    <span id="surnameError" class="error"></span>
    <input type="text" name="country" id="country" placeholder="Country" required>
    <span id="countryError" class="error"></span>
    <input type="text" name="city" id="city" placeholder="City" required>
    <span id="cityError" class="error"></span>
    <button type="submit" id="submitBtn" disabled>Submit</button>
</form>
<script>
    document.getElementById('registerForm').addEventListener('input', function()
    {
        let login = document.getElementById('login').value;
        let password = document.getElementById('password').value;
        let name = document.getElementById('name').value;
        let surname = document.getElementById('surname').value;
        let country = document.getElementById('country').value;
        let city = document.getElementById('city').value;
        let loginValid = /^[a-zA-Z0-9]{3,20}$/.test(login);
        let passwordValid = password.length >= 6;
        document.getElementById('loginError').innerText = loginValid ? '' : 'Username is too short / long';
        document.getElementById('passwordError').innerText = passwordValid ? '' : 'Password is too short';
        document.getElementById('submitBtn').disabled = !(loginValid && passwordValid && name && surname && country && city);
    });
</script>
</body>
</html>