<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

// Validate email input
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])) {
    $to = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);

    if (!$to) {
        http_response_code(400);
        die(json_encode(['success' => false, 'message' => 'Invalid email address']));
    }

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // Server settings for Gmail
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'emmanuelmichaelpk3@gmail.com';
        $mail->Password = 'pxcxnyzgjtxwtpux';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Debugging (optional)
        $mail->SMTPDebug = 0;
        $mail->Debugoutput = function ($str, $level) {
            file_put_contents('smtp.log', gmdate('Y-m-d H:i:s') . "\t$level\t$str\n", FILE_APPEND);
        };

        // Recipients
        $mail->setFrom('no-reply@yourdomain.com', 'The Anchor Devotional');
        $mail->addAddress($to);

        // Email content
        $mail->isHTML(true);
        $thankYouMessage = "Thank you for subscribing to The Anchor Devotional.";
        $mail->Subject = 'Welcome to The Anchor Devotional';
        $mail->Body = "<p>$thankYouMessage</p>";
        $mail->AltBody = $thankYouMessage;

        // Send email
        if ($mail->send()) {
            error_log("Email sent to $to at " . date('Y-m-d H:i:s'));

            // For AJAX requests, return JSON
            if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
                header('Content-Type: application/json');
                echo json_encode([
                    'success' => true,
                    'message' => "Email sent successfully to $to",
                    'redirect' => 'dashboard.php'  // Tell frontend to redirect
                ]);
            } else {
                // For regular form submissions, direct redirect
                header('Location: dashboard.php');
                exit();
            }
        }
    } catch (Exception $e) {
        error_log("Email failed to $to: " . $mail->ErrorInfo);

        http_response_code(500);
        header('Content-Type: application/json');
        echo json_encode([
            'success' => false,
            'message' => 'Failed to send email. Please try again later.',
            'error' => $mail->ErrorInfo
        ]);
    }
} else {
    http_response_code(400);
    header('Content-Type: application/json');
    echo json_encode([
        'success' => false,
        'message' => 'Invalid request method or missing email'
    ]);
}