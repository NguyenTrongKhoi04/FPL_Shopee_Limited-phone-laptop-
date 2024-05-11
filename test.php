<?php
$obj = [
    [1, 'https://picsum.photos/50', '1$'],
    [2, 'https://picsum.photos/100', '22$'],
    [3, 'https://picsum.photos/200', '345$'],
];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<<<<<<< HEAD
    <<<<<<< HEAD <img id="product-image" src="<?= $obj[0][1] ?>" alt="">
=======
    <<<<<<< HEAD <form method="POST">
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
        =======
        <img id="product-image" src="<?= $obj[0][1] ?>" alt="">
>>>>>>> a4066fd1cedfc9d8cc0806965d6e33b435a16676
        <input type="text" id="product-price" value="<?= $obj[0][2] ?>" name="size">
        <select id="product-select" onchange="changeProduct()">
            <?php
        foreach ($obj as $index => $product) {
            echo "<option value='{$index}' data-image='{$product[1]}' data-price='{$product[2]}'" . ($index == 0 ? " selected" : "") . ">Product {$product[0]}</option>";
        }
        ?>
        </select>

        <script>
        window.onload = function() {
            // Trigger change event to update image and price based on default selection
            changeProduct();
        };

        function changeProduct() {
            var selectBox = document.getElementById("product-select");
            var selectedIndex = selectBox.selectedIndex;
            var selectedOption = selectBox.options[selectedIndex];
            var imageSrc = selectedOption.getAttribute("data-image");
            var priceValue = selectedOption.getAttribute("data-price");

            document.getElementById("product-image").src = imageSrc;
            document.getElementById("product-price").value = priceValue;
        }
        </script>
<<<<<<< HEAD
        =======
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
        >>>>>>> BuiDucNinh
=======
        >>>>>>> origin/NguyenTrongKhoi
>>>>>>> a4066fd1cedfc9d8cc0806965d6e33b435a16676
</body>

</html>