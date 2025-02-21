<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification OTP</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        table {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            border-collapse: collapse;
        }
        .email-container {
            padding: 20px;
        }

        /* Header Styles */
        .email-header {
            background-color: #4CAF50;
            color: white;
            padding: 20px;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
            text-align: center;
        }

        /* Body Styles */
        .email-body {
            padding: 20px;
            color: #333;
            font-size: 16px;
            line-height: 1.5;
        }
        .otp-box {
            background-color: #f2f2f2;
            padding: 10px;
            border-radius: 5px;
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            margin: 20px 0;
        }
        .otp-text {
            font-size: 14px;
            color: #888;
            margin-top: 10px;
        }

        /* Footer Styles */
        .email-footer {
            background-color: #f4f4f4;
            text-align: center;
            padding: 10px;
            color: #888;
            font-size: 12px;
        }
        .footer-link {
            color: #4CAF50;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <td>
                <div class="email-container">
                    <!-- Header Section -->
                    <div class="email-header">
                        <h2>Email Verification</h2>
                    </div>

                    <!-- Body Section -->
                    <div class="email-body">
                        <p>Hello,</p>
                        <p>Thank you for registering with us. Please use the following OTP to verify your email address:</p>

                        <div class="otp-box">
                            {{ $otp }}
                        </div>

                        <p class="otp-text">
                            Note: This OTP will expire in <strong>5</strong> minutes. If you didn't request this, please ignore this email.
                        </p>
                    </div>

                    <!-- Footer Section -->
                    <div class="email-footer">
                        <p>If you have any questions, feel free to <a href="mailto:suhritorganization@gmail.com" class="footer-link">contact us</a>.</p>
                    </div>
                </div>
            </td>
        </tr>
    </table>
</body>
</html>
