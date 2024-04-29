<?php
$obj = [

    [2, 'https://picsum.photos/100', '22$'],
    [3, 'https://picsum.photos/200', '345$'],
]
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <img id="product-image" src="<?= $obj[0][1] ?>" alt="">
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
</body>

</html>