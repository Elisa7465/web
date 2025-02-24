<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="./index.css">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
      <title>Document</title>
</head>
<body>
<div class="blank">
<h1>Оформление доставки</h1>
    <form action="form.php" method="POST">

      <div class="section">
            <label>Номер заказа</label>
            <input type="text" name="order_number" id="order_number" required>
      </div>

      <div class="section">
            <label>Дата и время</label>
            <input type="datetime-local" name="delivery_datetime" required>
      </div>

      <div class="section">
            <label>Адрес доставки</label>
            <input type="text" name="address" id="address" required>
      </div>

      <div class="section">
            <label>ФИО клиента</label>
            <input type="text" name="client" id="client" required>
      </div>

      <div class="section">
            <label>Номер телефона клиента</label>
            <input type="text" name="client_phone" id="client_phone" required>
      </div>

      <div class="section">
            <label>Email клиента</label>
            <input type="email" name="client_email" id="client_email" required>
      </div>

      <div class="section">
            <label>ФИО водителя</label>
            <input type="text" name="driver" id="driver" required>
      </div>

      <div class="section">
            <label>Номер телефона водителя</label>
            <input type="text" name="driver_phone" id="driver_phone" required>
      </div>

      <div class="section">
            <label>Номер транспортного средства</label>
            <input type="text" name="car_number" id="car_number" required>
      </div>

        <input type="submit" value="Отправить" id="submit">
    </form>
    </div>
    <script src="index.js"></script>
</body>
</html>