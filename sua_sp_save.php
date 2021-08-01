<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $id = $_REQUEST["id"];
    $name = $_REQUEST["name"];
    $category_product_id = $_REQUEST["category_product_id"];
    $price = $_REQUEST["price"];
    $amount = $_REQUEST["amount"];

    include 'config.php';
    $con = mysqli_connect(Config::HOST . ":" . Config::PORT, Config::USERNAME, Config::PASSWORD) or die("Kết nối không thành công!");
    $db = mysqli_select_db($con, Config::DATABASE) or die("Kết nối table không thành công!");

    $sql_insert = "UPDATE products SET name='$name', price='$price', amount='$amount', category_product_id='$category_product_id' WHERE id=$id";
    $x = mysqli_query($con, $sql_insert);

    header("Location: admin.php");
    ?>
</body>

</html>
