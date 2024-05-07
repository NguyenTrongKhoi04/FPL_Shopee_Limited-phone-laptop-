<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

    $arr = [];
    foreach ($_POST as $key => $value) {
        $arr[] = [$value];
    }
    echo "<pre>";
    print_r($arr);
    echo "</pre>";
    die;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="POST">
        <table border="1">
            <thead>
                <tr>
                    <th>ID Pro</th>
                    <th>ID Detail</th>
                    <th>Name</th>
                    <th>Giá</th>
                    <th>size</th>
                    <th>số lượng</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        1
                        <input type="hidden" value="2" name="idpro[]">
                    </td>
                    <td>
                        12
                        <input type="hidden" value="12" name="iddetail[]">
                    </td>
                    <td>Name</td>
                    <td>Giá</td>
                    <td>size</td>
                    <td><input type="number" name="count[]"></td>
                </tr>
                <tr>
                    <td>
                        2
                        <input type="hidden" value="2" name="idpro[]">
                    </td>
                    <td>
                        13
                        <input type="hidden" value="13" name="iddetail[]">
                    </td>
                    <td>Name</td>
                    <td>Giá</td>
                    <td>size</td>
                    <td><input type="number" name="count[]"></td>
                </tr>
            </tbody>
        </table>
        <button type="submit">Gửi</button>
    </form>
</body>

</html>