<?php
require_once('tcpdf/tcpdf.php');

session_start();
$ID = $_SESSION["admin_id"];
include "db_connect.php";

if (!isset($_SESSION["admin_id"])) {
  header("location: adminLogin.php");
  exit;
}

$sql = "SELECT * FROM history ORDER BY booking_id DESC";
$sqlQuery = $mysqli->query($sql);

// Create new PDF document
$pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8');

// Set document information
$pdf->SetCreator('Your Name');
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Reports');
$pdf->SetSubject('Reports');
$pdf->SetKeywords('Reports, PDF, Example');

// Set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// Set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// Set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// Set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// Set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// Set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// Set font
$pdf->SetFont('helvetica', '', 11);

// Add a page
$pdf->AddPage();

// HTML content
$html = '
  <h1>Reports</h1>
  <table cellpadding="5">
    <tr>
      <th>Email</th>
      <th>Departure</th>
      <th>Destination</th>
      <th>Date</th>
      <th>Time</th>
      <th>Booking ID</th>
      <th>Payment Status</th>
    </tr>';

while ($admin = $sqlQuery->fetch_assoc()) {
  $email = $admin["email"];
  $departure = $admin["departure"];
  $destination = $admin["destination"];
  $date = $admin["date"];
  $time = $admin["time"];
  $booking_id = $admin["booking_id"];
  $status = $admin["status"];

  $html .= '
    <tr>
      <td style="padding: 2.5px;">' . $email . '</td>
      <td style="padding: 2.5px;">' . $departure . '</td>
      <td style="padding: 2.5px;">' . $destination . '</td>
      <td style="padding: 2.5px;">' . $date . '</td>
      <td style="padding: 2.5px;">' . $time . '</td>
      <td style="padding: 2.5px;">' . $booking_id . '</td>
      <td style="padding: 2.5px;">' . $status . '</td>
    </tr>';
}

$html .= '</table>';

// Print HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// Close and output PDF document
$pdf->Output('reports.pdf', 'D');
