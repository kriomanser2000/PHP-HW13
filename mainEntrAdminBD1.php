<?php
$db = new PDO('mysql:host=localhost;dbname=EntranceWebDb1', 'root', '');
$sectorCount = $db->query("SELECT COUNT(*) FROM sector")->fetchColumn();
$categoryCount = $db->query("SELECT COUNT(*) FROM category")->fetchColumn();
$productCount = $db->query("SELECT COUNT(*) FROM product")->fetchColumn();
echo "<script>
    document.getElementById('sectorCount').innerText = $sectorCount;
    document.getElementById('categoryCount').innerText = $categoryCount;
    document.getElementById('productCount').innerText = $productCount;
    if ($sectorCount > 0) 
    {
        document.getElementById('addCategoryBtn').disabled = false;
    }
    if ($categoryCount > 0) 
    {
        document.getElementById('addProductBtn').disabled = false;
    }
</script>";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Main Web</title>
</head>
<body>
<div>
    <button onclick="window.location.href='sector.php'">Add Sector</button>
    <button id="addCategoryBtn" disabled onclick="window.location.href='category.php'">Add Category</button>
    <button id="addProductBtn" disabled onclick="window.location.href='product.php'">Add Product</button>
    <div>
        <p>Number of Sectors: <span id="sectorCount"></span></p>
        <p>Number of Categories: <span id="categoryCount"></span></p>
        <p>Number of Products: <span id="productCount"></span></p>
    </div>
</div>
</body>
</html>