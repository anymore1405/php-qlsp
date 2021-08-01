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
    <form action="them_chungloai_save.php">
        <table border="1" align="center" width="350">
            <tr>
                <th colspan="2" align="center">Thêm chủng loại phẩm mới</th>
            </tr>
            <tr>
                <th>Tên chủng loại sản phẩm</th>
                <td><input name="name" type="text"></td>
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
