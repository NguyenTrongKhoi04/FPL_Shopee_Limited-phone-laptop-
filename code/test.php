<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    print_r($_POST['selectProduct']);
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
    <form method="post">
        <td> <input type="checkbox" value="1"  name="selectProduct[]" class="selectProduct"> 
        <td> <input type="checkbox" value="2"  name="selectProduct[]" class="selectProduct"> 
        <button type="submit">gửi</button>
</form>
</body>
</html>