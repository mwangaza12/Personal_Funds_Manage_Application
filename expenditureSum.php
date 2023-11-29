<!--Funds Spent between range of Dates -->
<?php
include_once 'dbconn.php';
include 'layout.php';
check_session();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expenditure Report</title>
    <link rel="stylesheet" href="style.css">
    <style>
    .totals {
        position: absolute;
        top: 80%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #f4f4f4;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }

    @media screen and (max-width: 500px) {
        .totals{
            top: 80%;
            margin-bottom: 10px;
        }
}
</style>
</head>
<body>
<h1>Welcome back <?php echo $_SESSION['username']; ?></h1>
<div class="date-picker-container">
    <form action="" method="post" class="report-form">
        <h2>Expenditure Report</h2>
    <label class="date-picker-label">Start Date:</label>
    <input type="date" id="datepicker" class="date-picker" name="start_date" required>
    <label class="date-picker-label">End Date:</label>
    <input type="date" id="datepicker" class="date-picker" name="end_date" required>
    <input type="submit" name="submit" value="Generate">
    </form>
</div>

<?php

if(isset($_POST['submit'])){
    $start_date = isset($_POST["start_date"]) ? $_POST["start_date"] : '';
    $end_date = isset($_POST["end_date"]) ? $_POST["end_date"] : '';

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT SUM(amount_spent) as total_amount FROM expenditure WHERE `date` BETWEEN '$start_date' AND '$end_date'";
    $result = $conn->query($sql);

    if (!$result) {
        die("Query failed: " . $conn->error);
    }

    $row = $result->fetch_assoc();
    $total_amount = $row['total_amount'];

    echo "<div class='totals'>";
    echo "<h2>Expenditure Report</h2>";
    echo "<p>Total Amount Spent between: <strong>$start_date and $end_date: $total_amount</strong></p>";
    echo "</div>";

    $conn->close();
}
?>
</body>
</html>