<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $orderNumber = trim($_POST['order_number'] ?? '', " №");
    $deliveryDataTime = trim($_POST['delivery_datetime'] ?? '');
    $Address = trim($_POST['address'] ?? '');
    $Client = trim($_POST['client'] ?? '');
    $ClientPhone = trim($_POST['client_phone'] ?? '');
    $ClientEmail = trim($_POST['client_email'] ?? '');
    $Driver = trim($_POST['driver'] ?? '');
    $DriverPhone = trim($_POST['driver_phone'] ?? '');
    $CarNumber = trim($_POST['car_number'] ?? '');

    $csvFile = 'test.csv'; 
    $dataRow = [$orderNumber, $deliveryDataTime, $Address, $Client, $ClientPhone, $ClientEmail, $Driver, $DriverPhone, $CarNumber];

        if (($file = fopen($csvFile, 'a')) !== false) {
            fputcsv($file, $dataRow);
            fclose($file);
            $message = 'Данные успешно сохранены!';
        } else {
            $message = 'Ошибка сохранения данных.';
        }
        header("Location: index.php");
        exit();
      }
?>
