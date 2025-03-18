<?php
session_start();
require_once('tcpdf/tcpdf.php'); // Ensure TCPDF is installed

// Database Connection
$conn = new mysqli("localhost", "root", "", "e_waste_management");

// Check connection
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// Initialize variables
$customer_name = $collected_items = $payment_method = "";
$total_amount = 0;

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize inputs
    $customer_name = trim($_POST['customerName'] ?? '');
    $collected_items = trim($_POST['collectedItems'] ?? '');
    $total_amount = floatval($_POST['totalAmount'] ?? 0);
    $payment_method = trim($_POST['paymentMethod'] ?? '');

    // Validate required fields
    if (!empty($customer_name) && !empty($collected_items) && $total_amount > 0 && !empty($payment_method)) {
        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO receipts (customer_name, collected_items, total_amount, payment_method) VALUES (?, ?, ?, ?)");

        if ($stmt) {
            $stmt->bind_param("ssds", $customer_name, $collected_items, $total_amount, $payment_method);

            if ($stmt->execute()) {
                $_SESSION['message'] = "Data inserted successfully!";
            } else {
                $_SESSION['message'] = "Error: " . $stmt->error;
            }
            $stmt->close();
        } else {
            $_SESSION['message'] = "Database query failed!";
        }
    } else {
        $_SESSION['message'] = "All fields are required!";
    }

    // Close connection
    $conn->close();
}

// Create new PDF document
$pdf = new TCPDF();
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('E-Waste Collection');
$pdf->SetTitle('E-Waste Collection Receipt');
$pdf->SetFont('dejavusans', '', 12);
$pdf->AddPage();

// Get date
$date = date("d-m-Y");

// Receipt HTML content
$html = "
<h2>E-Waste Collection Receipt</h2>
<p>Generated on: <strong>{$date}</strong></p>
<hr>
<p><strong>Customer Name:</strong> " . htmlspecialchars($customer_name) . "</p>
<p><strong>Items Collected:</strong> " . htmlspecialchars($collected_items) . "</p>
<p><strong>Total Amount:</strong> ₹" . htmlspecialchars($total_amount) . "</p>
<p><strong>Payment Method:</strong> " . htmlspecialchars($payment_method) . "</p>
<hr>
<p>Thank you for choosing our e-waste management service!</p>";

// Write the HTML content to the PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Output PDF file for download
$pdf->Output('receipt.pdf', 'D'); // 'D' forces download
exit(); // Stop further execution after PDF download
?>
