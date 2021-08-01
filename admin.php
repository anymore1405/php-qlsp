<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>QLSP</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
            table, th, td {
                border: 1px solid black;
            }
            td {
                width: 100px;
            }
        </style>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <body>
        <?php
            include 'config.php';
            $connect = mysqli_connect(Config::HOST . ":" . Config::PORT, Config::USERNAME, Config::PASSWORD) or die("Kết nối không thành công!");
            $db = mysqli_select_db($connect, Config::DATABASE) or die("Kết nối table không thành công!");

            $query = "select products.*, category_products.name as category_product_name from products inner join category_products on category_products.id = products.category_product_id order by category_products.id";
            $res = mysqli_query($connect, $query);
            $total = mysqli_num_rows($res);

            $data = [];
            while ($row = mysqli_fetch_object($res)){
                array_push($data, $row);
            }

            $query_cp = "select * from category_products";
            $res_cp = mysqli_query($connect, $query_cp);
            $total_cp = mysqli_num_rows($res_cp);

            $data_cp = [];
            while ($row_cp = mysqli_fetch_object($res_cp)){
                array_push($data_cp, $row_cp);
            }
        ?>

        <div>Danh mục chủng loại sản phẩm</div>
        <a href="them_chungloai.php">Thêm mới chủng loại sản phẩm</a>
        <table>
            <tr>
                <td>STT</td>
                <td>Tên chủng loại sản phẩm</td>
                <td>Chức năng</td>
            </tr>
            <?php
                foreach ($data_cp as $key => $item){
            ?>
            <tr>
                    <td><?php echo $key+1 ?></td>
                    <td><?php echo $item->name ?></td>
                    <td>
                        <a href="sua_clsp.php?id=<?php echo $item->id ?>">Sửa</a>
                        <a href="xoa_clsp.php?id=<?php echo $item->id ?>">Xoá</a>
                    </td>
            </tr>
            <?php } echo "Tổng = " . $total_cp; ?>
        </table>

        <div>Danh mục sản phẩm</div>
        <a href="them_sp.php">Thêm mới sản phẩm</a>
        <table>
            <tr>
                <td>STT</td>
                <td>Tên sản phẩm</td>
                <td>Chủng loại</td>
                <td>Giá</td>
                <td>Số lượng</td>
                <td>Chức năng</td>
            </tr>
            <?php
                foreach ($data as $key => $item){
            ?>
            <tr>
                    <td><?php echo $key+1 ?></td>
                    <td><?php echo $item->name ?></td>
                    <td><?php echo $item->category_product_name ?></td>
                    <td><?php echo $item->price ?></td>
                    <td><?php echo $item->amount ?></td>
                    <td>
                        <a href="sua_sp.php?id=<?php echo $item->id ?>">Sửa</a>
                        <a href="xoa_sp.php?id=<?php echo $item->id ?>">Xoá</a>
                    </td>
            </tr>
            <?php } echo "Tổng = " . $total; ?>
        </table>
    </body>
</html>
