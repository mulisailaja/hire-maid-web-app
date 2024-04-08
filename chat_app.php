<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Maid Hiring Form</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 600px;
      margin: 50px auto;
      background-color: #fff;
      padding: 20px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      border-radius: 5px;
    }

    label {
      display: block;
      margin-bottom: 10px;
    }

    input[type="number"] {
      width: 100%;
      padding: 8px;
      margin-bottom: 15px;
      box-sizing: border-box;
    }

    button {
      background-color: #4caf50;
      color: #fff;
      padding: 10px;
      border: none;
      border-radius: 3px;
      cursor: pointer;
    }
  </style>
</head>
<body>

  <div class="container">
    <h2>Maid Hiring Form</h2>
    <form id="maidForm">
      <label for="hours">Hours:</label>
      <input type="number" id="hours" name="hours" min="1">

      <label for="dailyRate">Daily Rate:</label>
      <input type="number" id="dailyRate" name="dailyRate" min="1">

      <label for="monthlyRate">Monthly Rate:</label>
      <input type="number" id="monthlyRate" name="monthlyRate" min="1">

      <button type="button" onclick="calculatePayment()">Calculate Payment</button>

      <h3>Payment Result:</h3>
      <p id="paymentResult"></p>
    </form>
  </div>

  <script>
    function calculatePayment() {
      const hours = parseFloat(document.getElementById('hours').value) || 0;
      const dailyRate = parseFloat(document.getElementById('dailyRate').value) || 0;
      const monthlyRate = parseFloat(document.getElementById('monthlyRate').value) || 0;

      const hourlyPayment = hours * (dailyRate / 8);
      const dailyPayment = dailyRate * 1;
      const monthlyPayment = monthlyRate / 30;

      const totalPayment = `Hourly: $${hourlyPayment.toFixed(2)} | Daily: $${dailyPayment.toFixed(2)} | Monthly: $${monthlyPayment.toFixed(2)}`;

      document.getElementById('paymentResult').innerText = totalPayment;
    }
  </script>

</body>
</html>
