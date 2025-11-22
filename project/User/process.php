<?php
require('C:\xampp\htdocs\OrganicVeggeies\project\Assets\fpdf.php');
include("../Assets/Connection/Connection.php");
session_start();



// Create a PDF object
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->SetLineWidth(0.5);
$pdf->Rect(10, 10, 190, 275, 'D');

$pdf->Cell(190, 10, 'Bill no:'.date('mY0001'),0, 1);


// Header
$pdf->SetFillColor(0, 102, 204); // Background color for the header
$pdf->SetTextColor(255); // Text color for the header
$pdf->Cell(190, 10, 'Payment Bill', 0, 1, 'C', true);
//$pdf->Image('dphoto2.jpg', 100, 20, 30);


if (isset($_GET['booking_id2'])) {
    $n = $_GET['booking_id2'];
    $select = "SELECT * FROM tbl_booking where booking_id = '" . $n . "' and user_id = '" . $_SESSION['uid'] . "'";
    $rst = $con->query($select);

    while ($rn = $rst->fetch_assoc()) {
        $booking_id = $rn["booking_id"];
        $sel = "SELECT * FROM tbl_booking b 
        INNER JOIN tbl_cart c ON b.booking_id = c.booking_id 
        INNER JOIN tbl_vegetables v ON v.veg_id = c.veg_id  where user_id=  '" . $_SESSION['uid'] . "' and b. booking_id = '" . $n . "'";
        $rs = $con->query($sel);

        // Initialize a variable to keep track of the total amount
        $totalAmount = 0;

        // Create a table for the bill
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->SetFillColor(192, 192, 192); // Background color for the table header
        $pdf->SetTextColor(0); // Text color for the table header
        $pdf->Cell(40, 10, 'Vegetable', 1, 0, 'C', true);
        $pdf->Cell(30, 10, 'Quantity', 1, 0, 'C', true);
        $pdf->Cell(40, 10, 'Rate', 1, 0, 'C', true);
        $pdf->Cell(40, 10, 'Total Amount', 1, 1, 'C', true);

        $pdf->SetFillColor(255); // Reset background color for the table content
        $pdf->SetTextColor(0); // Reset text color for the table content

        while ($rss = $rs->fetch_assoc()) {
            // Calculate the total amount for this item
            $itemTotal = $rss["cart_quantity"] * $rss["veg_rate"];
            $totalAmount += $itemTotal;

            // Add a row to the table
            $pdf->Cell(40, 10, $rss["veg_name"], 1);
            $pdf->Cell(30, 10, $rss["cart_quantity"], 1);
            $pdf->Cell(40, 10, '$' . number_format($rss["veg_rate"], 2), 1);
            $pdf->Cell(40, 10, '$' . number_format($itemTotal, 2), 1);
            $pdf->Ln();
        }

        // Display the total amount for all items
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->SetFillColor(0, 102, 204); // Background color for the total row
        $pdf->SetTextColor(255); // Text color for the total row
        $pdf->Cell(150, 10, 'Total Amount for All Items:', 1, 0, 'C', true);
        $pdf->Cell(40, 10, '$' . number_format($totalAmount, 2), 1, 1, 'C', true);

        // Output the PDF
        $pdf->Output('PaymentBill.pdf', 'I');
    }
}


?>






