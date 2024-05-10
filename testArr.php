<?php
$arrMax = [
    "id" => [1, 2, 3],
    "name" => ['a', 'b', 'c'],
    "address" => ['x', 'y', 'z']
];

$arr = [];

// Lấy số lượng phần tử trong mỗi mảng con
$count = count($arrMax['id']);

// Duyệt qua mỗi chỉ mục của mảng con
for ($i = 0; $i < $count; $i++) {
    // Tạo một mảng con mới từ các phần tử tương ứng của các mảng con
    $subArray = [];
    foreach ($arrMax as $key => $value) {
        $subArray[] = $arrMax[$key][$i];
    }
    // Thêm mảng con mới vào mảng chính
    $arr[] = $subArray;
}

// Hiển thị kết quả
echo "<pre>";
print_r($arr);