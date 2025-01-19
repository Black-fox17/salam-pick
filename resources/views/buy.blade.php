@extends('layouts.whole')

@section('title')
    Payment
@endsection

@section('content')
<div style="font-family: Arial, sans-serif;">
    <a href="{{ url()->previous() }}">
        <div class="back-btn" style="margin: 20px;">
            <img src="{{ asset('icons/back.svg')}}" alt="Back" style="width: 30px; cursor: pointer;">
        </div>
    </a>
    <div class="payment-container" style="max-width: 400px; margin: auto; padding: 20px; border: 1px solid #ccc; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
        <div class="header" style="text-align: center; margin-bottom: 20px;">
            <h1 style="font-size: 24px; color: #333;">Buy Now</h1>
        </div>
        <form id="paymentForm" action="#" method="POST" style="display: flex; flex-direction: column;">
            @csrf
            <div class="form-gro" style="margin-bottom: 15px;">
                <label for="card_number" style="display: block; margin-bottom: 5px; font-weight: bold;">Card Number</label>
                <input type="text" id="card_number" name="card_number" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            </div>
            <div class="form-gro" style="margin-bottom: 15px;">
                <label for="expiry_date" style="display: block; margin-bottom: 5px; font-weight: bold;">Expiry Date</label>
                <input type="text" id="expiry_date" name="expiry_date" required placeholder="MM/YY" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            </div>
            <div class="form-gro" style="margin-bottom: 15px;">
                <label for="cvv" style="display: block; margin-bottom: 5px; font-weight: bold;">CVV</label>
                <input type="text" id="cvv" name="cvv" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            </div>
            <div class="form-gro" style="margin-bottom: 15px;">
                <label for="name_on_card" style="display: block; margin-bottom: 5px; font-weight: bold;">Name on Card</label>
                <input type="text" id="name_on_card" name="name_on_card" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            </div>
            <div class="form-gro" style="margin-bottom: 20px;">
                <label for="amount" style="display: block; margin-bottom: 5px; font-weight: bold;">Amount</label>
                <input type="text" id="amount" name="amount" value="{{ $amount }}" readonly style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; background-color: #f9f9f9;">
            </div>
            <button type="button" class="btn" id="payNowButton" style="background-color: #007BFF; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer;">Pay Now</button>
        </form>
    </div>
</div>

<script>
    document.getElementById('payNowButton').addEventListener('click', function() {
        const cardNumber = document.getElementById('card_number').value;
        const expiryDate = document.getElementById('expiry_date').value;
        const cvv = document.getElementById('cvv').value;
        const nameOnCard = document.getElementById('name_on_card').value;
        const amount = document.getElementById('amount').value;

        if (!cardNumber || !expiryDate || !cvv || !nameOnCard || !amount) {
            alert("Please fill out all fields!");
            return;
        }

        const receiptWindow = window.open('', '', 'width=600,height=400');
        receiptWindow.document.write(`
            <html>
            <head>
                <title>Payment Receipt</title>
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        padding: 20px;
                        line-height: 1.6;
                    }
                    .receipt-container {
                        border: 1px solid #ccc;
                        padding: 20px;
                        border-radius: 8px;
                        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                        max-width: 500px;
                        margin: auto;
                    }
                    h1 {
                        text-align: center;
                        color: #333;
                    }
                    p {
                        margin: 5px 0;
                    }
                </style>
            </head>
            <body>
                <div class="receipt-container">
                    <h1>Payment Receipt</h1>
                    <p><strong>Name on Card:</strong> ${nameOnCard}</p>
                    <p><strong>Card Number:</strong> ${cardNumber.replace(/\d(?=\d{4})/g, '*')}</p>
                    <p><strong>Expiry Date:</strong> ${expiryDate}</p>
                    <p><strong>Amount:</strong> $${amount}</p>
                    <p><strong>Date:</strong> ${new Date().toLocaleString()}</p>
                </div>
                <button onclick="window.print()" style="display: block; margin: 20px auto; padding: 10px 20px; background-color: #007BFF; color: white; border: none; border-radius: 4px; cursor: pointer;">Download Receipt</button>
            </body>
            </html>
        `);
        receiptWindow.document.close();
    });
</script>
@endsection
