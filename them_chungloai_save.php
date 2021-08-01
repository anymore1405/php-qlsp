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
    $name = $_REQUEST["name"];
    $xuat_su = $_REQUEST["xuat_su"];
    $ghi_chu = $_REQUEST["ghi_chu"];

    include 'config.php';
    $con = mysqli_connect(Config::HOST . ":" . Config::PORT, Config::USERNAME, Config::PASSWORD) or die("Kết nối không thành công!");
    $db = mysqli_select_db($con, Config::DATABASE) or die("Kết nối table không thành công!");

    $exits = false;
    $sql_check_name = "SELECT * FROM category_products WHERE name='$name'";
    $b = mysqli_query($con, $sql_check_name);
    if ($b->num_rows > 0) {
        echo "Trùng tên chủng loại sản phẩm";
    } else{

        $sql_insert = "INSERT INTO `category_products` (`name`) VALUES ('$name')";
        mysqli_query($con, $sql_insert);
        echo "Thêm mới thành công";
        header("Location: admin.php");
    }
    ?>
</body>

</html>
