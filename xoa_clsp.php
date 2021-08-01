<html>
<body>

<?php
            $id = $_REQUEST['id'];
            include 'config.php';
            $connect = mysqli_connect(Config::HOST . ":" . Config::PORT, Config::USERNAME, Config::PASSWORD) or die("Kết nối không thành công!");
            $db = mysqli_select_db($connect, Config::DATABASE) or die("Kết nối table không thành công!");
            $query_delete_product = "delete from products where category_product_id = " . $id;
            $query = "delete from category_products where id = " . $id;
            $res_delete_product = mysqli_query($connect, $query_delete_product);
            $res = mysqli_query($connect, $query);
            echo "Đang xoá";
?>
<?php
header("Location: admin.php");
?>
</body>

</html>