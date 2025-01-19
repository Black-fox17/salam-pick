<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Successful</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f3f0eb;
            font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
            font-size: 1rem;
            font-weight: 400;
            color: #5b5a57;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .success-container {
            background-color: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 400px;
            width: 90%;
        }

        .success-icon {
            color: #5b5a57;
            font-size: 4rem;
            margin-bottom: 1rem;
        }

        h1 {
            color: #5b5a57;
            margin-bottom: 1rem;
            font-size: 1.8rem;
        }

        p {
            color: #5b5a57;
            margin-bottom: 1.5rem;
            line-height: 1.5;
        }

        .order-id {
            background-color: #f3f0eb;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            font-family: monospace;
            color: #5b5a57;
        }

        .back-button {
            display: inline-block;
            background-color: #5b5a57;
            color: white;
            text-decoration: none;
            padding: 0.8rem 1.5rem;
            border-radius: 5px;
            margin-top: 1rem;
            transition: background-color 0.3s ease;
        }

        .back-button:hover {
            background-color: #4a4947;
        }
    </style>
</head>
<body>
    <div class="success-container">
        <div class="success-icon">✓</div>
        <h1>Payment Successful!</h1>
        <p>Thank you for your purchase. Your transaction has been completed successfully.</p>
        <p>Order ID: <span class="order-id" id="orderId"></span></p>
        <p>A confirmation email has been sent to your registered email address.</p>
        <a href="{{route('main')}}" class="back-button">Return to Home</a>
    </div>

    <script>
        // Generate a random order ID with format: ORD-YYYYMMDD-XXXX
        const date = new Date();
        const year = date.getFullYear();
        const month = String(date.getMonth() + 1).padStart(2, '0');
        const day = String(date.getDate()).padStart(2, '0');
        const random = Math.floor(Math.random() * 10000).toString().padStart(4, '0');
        const orderId = `ORD-${year}${month}${day}-${random}`;
        document.getElementById('orderId').textContent = orderId;
    </script>
</body>
</html>