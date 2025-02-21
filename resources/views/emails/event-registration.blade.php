<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Registration Confirmation</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .container {
            max-width: 600px;
            margin: 30px auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .header {
            background: #28a745;
            color: #fff;
            text-align: center;
            padding: 20px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .header img {
            max-width: 120px;
            margin-bottom: 10px;
        }

        .content {
            padding: 20px;
            font-size: 16px;
        }

        .content h2 {
            color: #28a745;
        }

        .content ul {
            list-style-type: none;
            padding: 0;
        }

        .content ul li {
            padding: 8px 0;
            font-size: 15px;
        }

        .footer {
            text-align: center;
            background: #f7f9fc;
            padding: 20px;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
        }

        .footer p {
            margin: 8px 0;
            font-size: 14px;
        }

        .footer a {
            text-decoration: none;
            font-weight: bold;
            color: #28a745;
        }

        /* Social Media Icons */
        .social-icons {
            margin: 10px 0;
        }

        .social-icons a {
            display: inline-block;
            margin: 0 5px;
            text-decoration: none;
        }

        .social-icons img {
            width: 32px;
            height: 32px;
            transition: transform 0.3s ease;
        }

        .social-icons img:hover {
            transform: scale(1.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <img src="{{ asset('assets/images/logo.png') }}" alt="Company Logo">
            <h1>Event Registration Confirmation</h1>
        </div>

        <!-- Email Content -->
        <div class="content">
            <p>Hi <strong>{{ $name }}</strong>,</p>
            <p>Thank you for registering for the event: <strong>{{ $event->title }}</strong>.</p>

            <h2>Event Details</h2>
            <ul>
                <li><strong>📅 Date:</strong> {{ $event->date }}</li>
                <li><strong>⏰ Time:</strong> {{ date('h:i A', strtotime($event->time)) }}</li>
                <li><strong>📍 Location:</strong> {{ $event->location }}</li>
            </ul>

            <p>We look forward to seeing you at the event!</p>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p><strong>Suhrit Organisation</strong></p>
            <p>Contai, Purba Medinipur, 721401, West Bengal</p>
            <p>Email: <a href="mailto:suhritorganization@gmail.com">suhritorganization@gmail.com</a> | Phone: <a href="tel:+918653681154">+91 865 368 1154</a></p>

            <!-- Social Media Links -->
            <div class="social-icons">

                    <a href="#"><i class="fab fa-facebook-f facebook-bg"></i></a>
                    <a href="#"><i class="fab fa-twitter twitter-bg"></i></a>
                    <a href="#"><i class="fab fa-google-plus-g google-bg"></i></a>
            </div>

            <p>Visit our <a href="{{ url('/') }}">website</a> for more events.</p>
        </div>
    </div>
</body>
</html>
