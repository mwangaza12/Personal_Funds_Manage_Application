<?php
include_once ("dbconn.php");
include "layout.php";
check_session();
$query = "SELECT * FROM income";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FINANCE APP</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .container div {
            width: 100%; /* Adjust the width as needed */
            background-color: #fff;
            padding: 20px;
            margin-top: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
        }

        p {
            color: #555;
        }
</style>
</head>
<body>
<h1>Welcome back <?php echo $_SESSION['username'];?></h1>
<div class="container">
    <div>
        <h1>About</h1>
        <p>
            The Personal Management Funds Application is a powerful tool designed to help you manage your finances
            efficiently. Whether you're tracking expenses, setting budget goals, or planning for the future, our
            application provides the features you need for effective personal financial management.
        </p>
    </div>
    <div>
        <h1>Key Features</h1>
        <ul>
            <li><b>Expense Tracking: </b> record and categorize your expenses to gain insights into your spending habits.</li>
            <li><b>Budgeting: </b> realistic budgets for various categories and monitor your progress over time.</li>
            <li><b>Financial Goals: </b> and track your financial goals, whether it's saving for a vacation or paying off debt.</li>
            <li><b>Reports and Insights: </b> detailed reports and gain valuable insights into your financial activity.</li>
        </ul>
    </div>
</div>
</body>
</html>
