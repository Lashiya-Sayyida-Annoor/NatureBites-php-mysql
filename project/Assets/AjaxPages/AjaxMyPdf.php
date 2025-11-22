<?php
session_start();
include("../Connection/Connection.php");

require '../phpMail/src/Exception.php';
require '../phpMail/src/PHPMailer.php';
require '../phpMail/src/SMTP.php';
require '../dompdf/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Print the request method for debugging

$selQry = "select * from tbl_user where user_id = ".$_SESSION['uid'];
$result = $con->query($selQry);
$row = $result->fetch_assoc();


// Check if any data was received
if (isset($_POST["printContents"])) {
    // Decode the JSON data


    // Now you have the JSON data as an associative array
    $htmlContent = $_POST["printContents"];




  

    // Replace the <img> tag in your HTML content with the base64-encoded image
    $htmlContent = str_replace(
        '<img style="width: 100px; height: 100px; border-radius: 50%; overflow: hidden;" src="../Assets/File/Admin/A.png" alt="logo">',
       '',
        $htmlContent
    );
    $html = $htmlContent;


    // Create a PDF object
    $pdf = new Dompdf\Dompdf();

    // Load HTML content
    $pdf->loadHtml($html);

    // Render the PDF (optional: set paper size, orientation, etc.)
    $pdf->setPaper('A3', 'portrait');

    // Render the PDF
    $pdf->render();

    // Get the PDF content
    $pdfContent = $pdf->output();

    $pdfFilename = sys_get_temp_dir() . '/bill.pdf'; // Specify the filename directly
    file_put_contents($pdfFilename, $pdfContent);

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'demo@gmail.com'; // Your Gmail email address
    $mail->Password = 'XXXXXXX'; // Your Gmail app password
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 111;

    $mail->setFrom('naturebites003@gmail.com'); // Your Gmail email address
    $mail->addAddress($row['user_email']);

    $mail->addAttachment($pdfFilename);

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'Invoice';
    $mail->Body = 'Your invoice is attached here. 😊';

    if ($mail->send()) {
        echo "Email sent successfully!";
    } else {
        echo "Email sending failed. Error: " . $mail->ErrorInfo;
    }

    unlink($pdfFilename);

} else {
    // Handle the case where no data was received in the POST request
    echo "No data received.";
}

?>
