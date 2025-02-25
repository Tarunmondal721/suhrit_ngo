<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thank You for Your Donation</title>
    <style>
        /* Google Font */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

        /* Base Styles */
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            text-align: center;
            margin: 0;
            padding: 0;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            animation: fadeIn 1s ease-in-out;
        }

        .container {
            background: rgba(255, 255, 255, 0.95);
            width: 90%;
            max-width: 600px;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.2);
            animation: slideIn 1s ease-out;
        }

        h2 {
            color: #2ecc71;
            font-size: 26px;
            font-weight: 600;
            animation: fadeIn 1.5s ease-in-out;
        }

        p {
            font-size: 16px;
            color: #555;
            line-height: 1.6;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        ul li {
            background: #f9f9f9;
            padding: 12px;
            margin: 8px 0;
            border-radius: 6px;
            font-size: 18px;
            color: #333;
            transition: transform 0.3s ease;
        }

        ul li:hover {
            transform: scale(1.05);
            background: #e3f2fd;
        }

        strong {
            color: #222;
        }

        .footer {
            margin-top: 20px;
            font-size: 14px;
            color: #ddd;
        }

        .footer a {
            color: #ffeb3b;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease-in-out;
        }

        .footer a:hover {
            color: #ff9800;
        }

        .logo {
            width: 100px;
            margin-bottom: 15px;
            animation: bounce 1.5s infinite;
        }

        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes slideIn {
            from { transform: translateY(-30px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-5px); }
        }
    </style>
</head>
<body>

    <div class="container">
        <img src="{{ asset('assets/images/logo3.png') }}" alt="NGO Logo" class="logo">
        <h2>Thank You, {{ $donation->name }}! 🎉</h2>
        <p>Your generosity is making a real impact! Here are your details:</p>

        <ul>
            <li><strong>Donation Amount:</strong> ₹{{ $donation->amount }}</li>
            <li><strong>Transaction ID:</strong> {{ $donation->upi_transaction_id }}</li>
        </ul>

        <p>We truly appreciate your support in making a difference. 💖</p>

        <div class="footer">
            <p><strong>SERPUR SUHRIT WELFARE ORGANISATION</strong></p>
            <p>Visit our website: <a href="https://suhrit-organization.onrender.com/">www.suhrit-organisation.com</a></p>
        </div>
    </div>

</body>
</html>
