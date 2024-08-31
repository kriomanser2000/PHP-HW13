<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $name = $_POST["name"];
    $db = new PDO("mysql:host=localhost;dbname=EntranceWebDb1", "root", "");
    $stmt = $db->prepare("INSERT INTO Sector (name) VALUES (:name)");
    $stmt->execute([':name' => $name]);
    header('Location: mainEntrAdminBD1.php');
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sector Add</title>
</head>
<body>
<form method="POST" action="sectrEntrAdminBD1.php">
    <input type="text" name="name" id="sectorName" placeholder="Sector Name" required>
    <button type="submit" id="addBtn" disabled>Add</button>
</form>
<script>
    document.getElementById('sectorName').addEventListener('input', function()
    {
        document.getElementById('addBtn').disabled = this.value.trim() === '';
    });
</script>
</body>
</html>