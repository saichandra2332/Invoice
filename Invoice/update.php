<?php

require_once('config.php');

$clientName = $_POST['client_name'];
$invoiceNumber = $_POST['invoice_number'];
$invoiceDate = $_POST['invoice_date'];
$dueDate = $_POST['due_date'];
$invoiceType = $_POST['invoice_type'];
$project = $_POST['project'];
$item = $_POST['item'];
$amount = $_POST['amount'];
$fromAddress = $_POST['from_address'];
$toAddress = $_POST['to_address'];
$note = $_POST['note'];
$hid = $_POST['h_id'];
$holidays =[

    '2024-01-07', '2024-01-14', '2024-01-21', '2024-01-28',
    '2024-02-04', '2024-02-11', '2024-02-18', '2024-02-25',
    '2024-03-03', '2024-03-10', '2024-03-17', '2024-03-24',
    '2024-03-31', '2024-04-07', '2024-04-14', '2024-04-21',
    '2024-04-28', '2024-05-05', '2024-05-12', '2024-05-19',
    '2024-05-26', '2024-06-02', '2024-06-09', '2024-06-16',
    '2024-06-23', '2024-06-30', '2024-07-07', '2024-07-14',
    '2024-07-21', '2024-07-28', '2024-08-04', '2024-08-11',
    '2024-08-18', '2024-08-25', '2024-09-01', '2024-09-08',
    '2024-09-15', '2024-09-22', '2024-09-29', '2024-10-06',
    '2024-10-13', '2024-10-20', '2024-10-27', '2024-11-03',
    '2024-11-10', '2024-11-17', '2024-11-24', '2024-12-01',
    '2024-12-08', '2024-12-15', '2024-12-22', '2024-12-29'
];
// Add your actual holiday dates
// Function to check if a date is a holiday
function isHoliday($date, $holidays) {
    return in_array($date, $holidays);
}
function isWeekend($date) {
    $dayOfWeek = date('N', strtotime($date));
    return $dayOfWeek >= 6; // Saturday (6) or Sunday (7)
}
// Function to check if a date is today
function isToday($date) {
    return date('Y-m-d') === $date;
}


if (isHoliday($invoiceDate, $holidays) || isWeekend($invoiceDate)) {
    echo json_encode(['status' => 'error', 'message' => 'Invoice date cannot be a holiday.']);
    exit;
}

if (isHoliday($dueDate, $holidays) || isWeekend($dueDate) || $dueDate < $invoiceDate) {
    echo json_encode(['status' => 'error', 'message' => 'Due date cannot be a holiday and must be equal to or after the invoice date.']);
    exit;
}


$thirtyDaysAfterInvoice = date('Y-m-d', strtotime($invoiceDate . ' + 30 days'));
if ($dueDate > $thirtyDaysAfterInvoice) {
    echo json_encode(['status' => 'error', 'message' => 'Due date must be within thirty days after the invoice date.']);
    exit;
}


if (!isToday($invoiceDate)) {
    echo json_encode(['status' => 'error', 'message' => 'Invoice date must be today\'s date.']);
    exit;
}



if ($clientName != "") {
    if (!empty($hid)) {
        $stmt = $conn->prepare("UPDATE invoice_table SET client_name=?, invoice_date=?, due_date=?, invoice_type=?, project=?, item=?, amount=?, from_address=?, to_address=?, note=? WHERE invoice_id=?");
        $stmt->bind_param("ssssssssssi", $clientName, $invoiceDate, $dueDate, $invoiceType, $project, $item, $amount, $fromAddress, $toAddress, $note, $hid);
        $stmt->execute();
        $stmt->close();
        echo json_encode(['status' => 'success', 'message' => 'Data updated successfully']);
    } else {
        $stmt = $conn->prepare("INSERT INTO invoice_table (client_name, invoice_number, invoice_date, due_date, invoice_type, project, item, amount, from_address, to_address, note) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssssss", $clientName, $invoiceNumber, $invoiceDate, $dueDate, $invoiceType, $project, $item, $amount, $fromAddress, $toAddress, $note);
        $stmt->execute();
        $stmt->close();
        echo json_encode(['status' => 'success', 'message' => 'Data inserted successfully']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Client name is required.']);
}
?>
