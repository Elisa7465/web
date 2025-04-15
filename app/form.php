<?php
function sanitize_input($value) {
    $value = strip_tags($value);     // удаляет теги
    $value = trim($value); 
    return $value;
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $errors = [];

    // Валидация номера заказа
    if (!isset($_POST['order_number']) || !preg_match('/^№[0-9]+$/', $_POST['order_number'])) {
        $errors[] = "Номер заказа должен начинаться с '№' и содержать только цифры после него.";
    }

    // Валидация ФИО клиента
    if (!isset($_POST['client']) || !preg_match('/^[А-Яа-яЁё\s-]+$/u', $_POST['client'])) {
        $errors[] = "ФИО клиента должно содержать только русские буквы, пробелы и дефисы.";
    }

    // Валидация номера телефона клиента 
    if (!isset($_POST['client_phone']) || !preg_match('/^\+\d{1} \(\d{3}\) \d{3}-\d{2}-\d{2}$/', $_POST['client_phone'])) {
        $errors[] = "Номер телефона клиента должен содержать 11 цифр.";
    }

    // Валидация email клиента
    if (!isset($_POST['client_email']) || !filter_var($_POST['client_email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Некорректный email клиента.";
    }

    // Валидация ФИО водителя
    if (!isset($_POST['driver']) || !preg_match('/^[А-Яа-яЁё\s-]+$/u', $_POST['driver'])) {
        $errors[] = "ФИО водителя должно содержать только русские буквы, пробелы и дефисы.";
    }

    if(!preg_match('/^[А-Яа-яЁё\s-]+$/u', $_POST['driver'])){
        $errors[]="hdjfhsjf";
     }

    // Валидация номера телефона водителя 
    if (!isset($_POST['driver_phone']) || !preg_match('/^\+\d{1} \(\d{3}\) \d{3}-\d{2}-\d{2}$/', $_POST['driver_phone'])) {
        $errors[] = "Номер телефона водителя должен содержать 11 цифр.";
    }

    // Валидация номера транспортного средства
    if (!isset($_POST['car_number']) || !preg_match('/^[А-Я]{1}[0-9]{3}[А-Я]{2}$/u', $_POST['car_number'])) {
        $errors[] = "Номер транспортного средства должен быть в формате А111АА (русские буквы и цифры).";
    }

    if (empty($errors)) {
        $orderNumber = trim($_POST['order_number'] ?? '', " №");
        $deliveryDataTime = sanitize_input($_POST['delivery_datetime'] ?? '');
        $Address = sanitize_input($_POST['address'] ?? '');
        $Client = sanitize_input($_POST['client'] ?? '');
        $ClientPhone = sanitize_input($_POST['client_phone'] ?? '');
        $ClientEmail = sanitize_input($_POST['client_email'] ?? '');
        $Driver = sanitize_input($_POST['driver'] ?? '');
        $DriverPhone = sanitize_input($_POST['driver_phone'] ?? '');
        $CarNumber = sanitize_input($_POST['car_number'] ?? '');

        $csvFile = 'test.csv'; 
        $dataRow = [$orderNumber, $deliveryDataTime, $Address, $Client, $ClientPhone, $ClientEmail, $Driver, $DriverPhone, $CarNumber];

        if (($file = fopen($csvFile, 'a')) !== false) {
            fputcsv($file, $dataRow);
            fclose($file);
        } 
        
        header("Location: index.php");
        exit();
    } else {
        echo "<ul><li>" . implode("</li><li>", $errors) . "</li></ul>";
    }
}
?>

