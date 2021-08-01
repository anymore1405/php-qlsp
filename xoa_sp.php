<html>
<body>

<?php
            $id = $_REQUEST['id'];
            include 'config.php';
            $connect = mysqli_connect(Config::HOST . ":" . Config::PORT, Config::USERNAME, Config::PASSWORD) or die("Kết nối không thành công!");
            $db = mysqli_select_db($connect, Config::DATABASE) or die("Kết nối table không thành công!");

            $query = "delete from products where id = " . $id;
            $res = mysqli_query($connect, $query);
            echo "Đang xoá";
?>
<?php
header("Location: admin.php");
?>
</body>

</html>