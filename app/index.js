// Ввод автоматического № в поле номера
const orderInput = document.getElementById("order_number");
orderInput.addEventListener("focus", () => {
  if (!orderInput.value.startsWith("№")) {
    orderInput.value = "№";
  }
});

// Ограничиваем ввод только цифрами после "№"
orderInput.addEventListener("input", () => {
  const prefix = "№";
  if (!orderInput.value.startsWith(prefix)) {
    orderInput.value = prefix; // Восстанавливаем префикс
  }
  const numbersOnly = orderInput.value.slice(prefix.length).replace(/[^0-9]/g, "");
  orderInput.value = prefix + numbersOnly; // Оставляем только цифры после "№"
});

// Убираем "№", если пользователь стер все содержимое
orderInput.addEventListener("blur", () => {
  if (orderInput.value === "№") {
    orderInput.value = "";
  }
});

//Ввод ФИО 
document.addEventListener("DOMContentLoaded", function () {
  const clientInput = document.getElementById("client");

  clientInput.addEventListener("input", function () {
      this.value = this.value.replace(/[^А-Яа-яЁё\s-]/g, '');
  });
});


//Ввод ФИО водителя
document.addEventListener("DOMContentLoaded", function () {
  const driverInput = document.getElementById("driver");

  driverInput.addEventListener("input", function () {
      this.value = this.value.replace(/[^А-Яа-яЁё\s-]/g, '');
  });
  const emailInput = document.getElementById("client_email");

  emailInput.addEventListener("input", function () {
      this.value = this.value.replace(/[^a-zA-Z0-9.@]/g, "");
  });
});

//Ввод номера телефона
document.addEventListener("DOMContentLoaded", function () {
  function formatPhoneNumber(input) {
      input.addEventListener("input", function () {
          let value = input.value.replace(/\D/g, ""); // Удаляем все нецифровые символы
          
          if (value.length > 11) {
              value = value.slice(0, 11);
          }

          let formattedValue = "";
          if (value.length > 0) {
              formattedValue = "+" + value[0];
          }
          if (value.length > 1) {
              formattedValue += " (" + value.slice(1, 4);
          }
          if (value.length > 4) {
              formattedValue += ") " + value.slice(4, 7);
          }
          if (value.length > 7) {
              formattedValue += "-" + value.slice(7, 9);
          }
          if (value.length > 9) {
              formattedValue += "-" + value.slice(9, 11);
          }
          
          input.value = formattedValue;
      });
  }

  const clientPhoneInput = document.getElementById("client_phone");
  const driverPhoneInput = document.getElementById("driver_phone");
  
  if (clientPhoneInput) {
      formatPhoneNumber(clientPhoneInput);
  }
  if (driverPhoneInput) {
      formatPhoneNumber(driverPhoneInput);
  }
});


//Ввод номера машины
document.addEventListener("DOMContentLoaded", function () {
  const carNumberInput = document.getElementById("car_number");

  carNumberInput.addEventListener("input", function () {
      let value = carNumberInput.value.toUpperCase().replace(/[^А-Я0-9]/g, ""); // Убираем всё, кроме букв и цифр
      
      let formattedValue = "";
      
      if (value.length > 0) {
          formattedValue = value[0].replace(/[^А-Я]/g, ""); // Первая буква только заглавная
      }
      if (value.length > 1) {
          formattedValue += value.slice(1, 4).replace(/\D/g, ""); // Следующие три символа — только цифры
      }
      if (value.length > 4) {
          formattedValue += value.slice(4, 6).replace(/[^А-Я]/g, ""); // Последние два символа — только заглавные буквы
      }
      
      carNumberInput.value = formattedValue;
  });
});





