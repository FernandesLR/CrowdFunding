<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Selecione o Método de Pagamento</title>
  <link rel="stylesheet" href="styles.css">

  <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        }

        body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        }

        .container {
        background: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        text-align: center;
        width: 90%;
        max-width: 400px;
        }

        h1 {
        margin-bottom: 20px;
        font-size: 1.5rem;
        color: green;
        }

        .payment-methods {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 15px;
        margin-bottom: 20px;
        }

        .payment-card {
        background: #f9f9f9;
        border: 2px solid transparent;
        border-radius: 8px;
        padding: 15px;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s ease;
        }

        .payment-card img {
        max-width: 50px;
        margin-bottom: 10px;
        }

        .payment-card span {
        display: block;
        font-size: 0.9rem;
        color: #333;
        }

        .payment-card:hover {
        border-color: #007bff;
        background: #eef6ff;
        }

        #proceed-btn {
        padding: 10px 20px;
        background: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: all 0.3s ease;
        }

        #proceed-btn:hover {
        background: #0056b3;
        }

  </style>
</head>
<body>

  <div style="display: flex;">
    <span class="title" style="display: flex;">
        <h2>Geek</h2>
        <h1>Funders</h1>
    </span>

  </div>
  
  <div class="container">
    <h1>Selecione o Método de Pagamento</h1>
    <div class="payment-methods">
      <!-- Cartão de Crédito -->
      <div class="payment-card" onclick="selectPayment('cartao')">
        <img src="https://via.placeholder.com/50" alt="Cartão de Crédito">
        <span>Cartão de Crédito</span>
      </div>

      <!-- PIX -->
      <div class="payment-card" onclick="selectPayment('pix')">
        <img src="https://via.placeholder.com/50" alt="PIX">
        <span>PIX</span>
      </div>

      <!-- Boleto -->
      <div class="payment-card" onclick="selectPayment('boleto')">
        <img src="https://via.placeholder.com/50" alt="Boleto">
        <span>Boleto</span>
      </div>

      <!-- Paypal -->
      <div class="payment-card" onclick="selectPayment('paypal')">
        <img src="https://via.placeholder.com/50" alt="PayPal">
        <span>PayPal</span>
      </div>
    </div>
    <button id="proceed-btn" onclick="proceedPayment()">Continuar</button>
  </div>

  <script src="script.js"></script>
</body>
</html>
