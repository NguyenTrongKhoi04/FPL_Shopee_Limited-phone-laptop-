<?php
$arrPro = [1, 2, 3];

$arrPro = [
    '1' => ['a', 'b', 'c'],
    '2' => [],
    '3' => []
];
$a = 4;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <script>
    // console.log(document.querySelector('option[value = 1]'));
    // const onchange = function() {}

    // const submit = function() {
    //     tr.innerHTML = view();
    // }
    let arr = <?= $arrPro['1']['a'] ?>;
    console.log(arr);

    const view = function(name, count, price) {
        return `<tr>
            <th> ${name} </th> 
            <th> ${count} </th> 
        </tr>`
    }
    </script>

    <span>Chọn sản phẩm</span>
    <select name="" id="khoi">
        <option value="1">pro 1</option>
        <option value="">pro 2</option>
        <option value="">pro 3</option>
        <option value="">pro 4</option>
        <input type="text" name="arr[]">
    </select>
    <br>
    <span>Chọn biến thể sẩn phẩm đó</span>
    <select name="" id="" data-set=" 2">
        <option value="">biến thể 1</option>
        <option value="">biến thể 2</option>
        <option value="">biến thể 3</option>
    </select>
    <button>chọn</button>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </tfoot>
        <tbody>
            <tr>
                <td>Tiger Nixon</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td>61</td>
                <td>2011/04/25</td>
                <td>$320,800</td>
            </tr>
            <tr>
                <td>Garrett Winters</td>
                <td>Accountant</td>
                <td>Tokyo</td>
                <td>63</td>
                <td>2011/07/25</td>
                <td>$170,750</td>
            </tr>
            <tr>
                <td>Ashton Cox</td>
                <td>Junior Technical Author</td>
                <td>San Francisco</td>
                <td>66</td>
                <td>2009/01/12</td>
                <td>$86,000</td>
            </tr>
            <tr>
                <td>Cedric Kelly</td>
                <td>Senior Javascript Developer</td>
                <td>Edinburgh</td>
                <td>22</td>
                <td>2012/03/29</td>
                <td><button>UP</button></td>
            </tr>
        </tbody>
</body>

</html>