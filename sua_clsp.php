<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    textarea {
        overflow-y: scroll;
        /* height: 100px; */
        resize: none;
        /* Remove this if you want the user to resize the textarea */
    }
</style>

<body>
    <?php
    $id = $_REQUEST["id"];
    include 'config.php';
    $con = mysqli_connect(Config::HOST . ":" . Config::PORT, Config::USERNAME, Config::PASSWORD) or die("Kết nối không thành công!");
    $db = mysqli_select_db($con, Config::DATABASE) or die("Kết nối table không thành công!");
    $sql_sl = "select * from category_products where id=$id";
    $kq = mysqli_query($con, $sql_sl);
    $row = mysqli_fetch_object($kq);

    ?>
    <form action="sua_clsp_save.php?id=<?php echo $row->id ?>">
        <table border="1" align="center" width="350">
            <tr>
                <th colspan="2" align="center">Sửa chủng loại sản phẩm</th>
            </tr>
            <input name="id" value="<?php echo $row->id ?>" hidden>
            <tr>
                <th>Tên</th>
                <td><input name="name" type="text" value="<?php echo $row->name ?>"></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="Submit"></input>
                    <button>Reset</button>
                </td>
            </tr>
        </table>
    </form>
</body>

</html>
