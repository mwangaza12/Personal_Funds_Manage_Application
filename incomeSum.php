<?php
include "dbconn.php";
include 'layout.php';
check_session();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funds Report</title>
   <link rel="stylesheet" href="style.css">
   <style>
    .totals {
        position: absolute;
        top: 80%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        background-color: #f4f4f4;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }
</style>

</head>
<body>
<h1>Welcome back <?php echo $_SESSION['username']; ?></h1>
<div class="date-picker-container">
    <form action="" method="post" class="report-form">
        <h2>Income Report</h2>
    <label class="date-picker-label">Start Date:</label>
    <input type="date" class="date-picker" name="start_date" required>
    <label class="date-picker-label">End Date:</label>
    <input type="date" class="date-picker" name="end_date" required>
    <input type="submit" name="submit" value="Generate">
    </form>
</div>

<?php
    if(isset($_POST['submit'])){
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT SUM(amount) as total_amount FROM income WHERE date BETWEEN '$start_date' AND '$end_date'";

        $result = $conn->query($sql);

        if (!$result) {
            die("Query failed: " . $conn->error);
        }else{
        $row = $result->fetch_assoc();
        $total_amount = $row['total_amount'];

        echo "<div class='totals'>";
        echo "<h2 >Funds Report</h2>";
        echo "<p>Total Amount Received between: <strong>$start_date and $end_date: $total_amount</strong></p>";
        echo "</div>";
        }

        $conn->close();
    }
    ?>
</body>
</html>
