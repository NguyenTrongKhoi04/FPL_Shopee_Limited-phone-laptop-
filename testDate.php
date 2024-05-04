<?php
$array = array(
    'namesale' => '',
    'datesale' => '2024-06-02',
    'timesale' => '',
    'valueSale' => ''
);

// Lấy ngày hôm nay
$currentDate = time(); // Lấy thời điểm hiện tại dưới dạng Unix timestamp

// Chuyển đổi ngày trong mảng thành dạng Unix timestamp
$dateInArray = strtotime($array['datesale']);

// Kiểm tra xem ngày trong mảng có lớn hơn ngày hôm nay không
if ($dateInArray > $currentDate) {
    echo "Ngày trong mảng lớn hơn ngày hôm nay.";
} else {
    echo "Ngày trong mảng không lớn hơn ngày hôm nay.";
}