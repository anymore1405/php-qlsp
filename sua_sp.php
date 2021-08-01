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
    $sql_sl = "select * from products where id=$id";
    $kq = mysqli_query($con, $sql_sl);
    $row = mysqli_fetch_object($kq);


    $query_cp = "select * from category_products";
    $res_cp = mysqli_query($con, $query_cp);
    $data_cp = [];
    while ($row_cp = mysqli_fetch_object($res_cp)){
        array_push($data_cp, $row_cp);
    }

    ?>
    <form action="sua_sp_save.php?id=<?php echo $row->id ?>">
        <table border="1" align="center" width="350">
            <tr>
                <th colspan="2" align="center">Sửa hãng sản phẩm</th>
            </tr>
            <input name="id" value="<?php echo $row->id ?>" hidden>
            <tr>
                <th>Tên</th>
                <td><input name="name" type="text" value="<?php echo $row->name ?>"></td>
            </tr>
            <tr>
                <th>Chủng loại</th>
                <td>
                    <select name="category_product_id">
                    <?php
                        foreach ($data_cp as $key => $item){
                    ?>
                        <?php
                            echo '<option ' . 'value='. '"' . $item->id . '"' . ($item->id == $row->category_product_id ? 'selected' : null) .'>' . $item->name . '</option>'
                        ?>
                    <?php }?>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Giá</th>
                <td><input name="price" value="<?php echo $row->price ?>"></td>
            </tr>
            <tr>
                <th>Số lượng</th>
                <td><input name="amount" value="<?php echo $row->amount ?>"></td>
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
