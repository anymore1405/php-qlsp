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
        include 'config.php';
        $connect = mysqli_connect(Config::HOST . ":" . Config::PORT, Config::USERNAME, Config::PASSWORD) or die("Kết nối không thành công!");
        $db = mysqli_select_db($connect, Config::DATABASE) or die("Kết nối table không thành công!");

        $query = "select * from category_products";
        $res = mysqli_query($connect, $query);
        $total = mysqli_num_rows($res);
        $data = [];
        while ($row = mysqli_fetch_object($res)){
            array_push($data, $row);
        }
    ?>
    <form action="them_sp_save.php">
        <table border="1" align="center" width="350">
            <tr>
                <th colspan="2" align="center">Thêm sản phẩm mới</th>
            </tr>
            <tr>
                <th>Tên sản phẩm</th>
                <td><input name="name" type="text"></td>
            </tr>
            <tr>
                <th>Chủng loại</th>
                <td>
                    <select name="category_product_id">
                    <?php
                        foreach ($data as $key => $item){
                    ?>
                        <?php
                            echo '<option ' . 'value='. $item->id .'>' . $item->name . '</option>'
                        ?>
                    <?php }?>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Giá</th>
                <td><input name="price"></td>
            </tr>
            <tr>
                <th>Số lượng</th>
                <td><input name="amount"></td>
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
