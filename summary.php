<!--Analysing the actual spending Vs the Budget-->
<?php
include 'dbconn.php';
include 'layout.php';
check_session();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Budget and Spending Analysis</title>
    <link rel="stylesheet" href="style.css">
    <style>
    .totals {
        position: absolute;
        top: 85%;
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
        <h2>Budget and Spending Analysis</h2>
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


// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to retrieve data
$sql = "SELECT
    e.date,
    e.amount_spent AS actual_spending,
    ec.description,
    ec.amount
FROM
    expenditure e
JOIN
    ex_category ec ON e.id = ec.id
WHERE
    e.date BETWEEN '$start_date' AND '$end_date'";


// Execute the query
$result = $conn->query($sql);

// Check if the query was successful
if ($result === false) {
    echo "Error: " . $conn->error;
} else {
    
    // Fetch the results as an associative array
    //$data = $result->fetch_all(MYSQLI_ASSOC);

    // Process and analyze the data as needed
    while ($row = $result->fetch_assoc()) {
            echo "<div class='totals'>";
            echo "<h2>Budjet Vs Spending Analysis</h2>";
            echo "<p>Transaction Date:" .$row['date']. "</p>";
            echo "<p>Transaction Date:" .$row['description']. "</p>";
            echo "<p>Transaction Date:" .$row['amount']. "</p>";
            echo "<p>Transaction Date:" .$row['actual_spending']. "</p>";
            echo "</div>";
    }
}

// Close the connection
$conn->close();
}
?>
</body>
</html>



