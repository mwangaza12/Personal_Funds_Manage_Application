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
  <title>Budget vs Spending Analysis</title>
  <link rel="stylesheet" href="style.css">
  <style>
    table {
      width: 90%;
      margin: 30px auto;
      border-collapse: collapse;
      background: #fff;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 0 10px rgba(0,0,0,0.2);
    }
    th, td {
      padding: 12px 15px;
      text-align: center;
      border-bottom: 1px solid #ddd;
    }
    th {
      background-color: #4CAF50;
      color: white;
    }
    tr:hover { background-color: #f1f1f1; }
    .summary {
      text-align: center;
      background: #f4f4f4;
      padding: 15px;
      border-radius: 8px;
      width: 60%;
      margin: 20px auto;
      box-shadow: 0 0 10px rgba(0,0,0,0.2);
    }
  </style>
</head>
<body>

<h1>Welcome back, <?php echo htmlspecialchars($_SESSION['username']); ?></h1>

<div class="date-picker-container">
  <form method="post" class="report-form">
    <h2>Budget vs Spending Analysis</h2>
    <label>Start Date:</label>
    <input type="date" name="start_date" required>
    <label>End Date:</label>
    <input type="date" name="end_date" required>
    <input type="submit" name="submit" value="Generate">
  </form>
</div>

<?php
if(isset($_POST['submit'])){
  $start_date = $_POST["start_date"];
  $end_date = $_POST["end_date"];

  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  // ✅ Adjust JOIN condition depending on your schema
  $sql = "
    SELECT 
      e.category,
      SUM(e.amount_spent) AS total_spent,
      COALESCE(b.amount, 0) AS budget_amount
    FROM 
      expenditure e
    LEFT JOIN 
      ex_category b ON e.category = b.description
    WHERE 
      e.date BETWEEN '$start_date' AND '$end_date'
    GROUP BY 
      e.category, b.amount
  ";

  $result = $conn->query($sql);

  if ($result && $result->num_rows > 0) {
      echo "<table>";
      echo "<tr><th>Category</th><th>Budget</th><th>Actual Spending</th><th>Variance</th></tr>";

      $totalBudget = 0;
      $totalSpent = 0;

      while($row = $result->fetch_assoc()) {
          $variance = $row['budget_amount'] - $row['total_spent'];
          $totalBudget += $row['budget_amount'];
          $totalSpent += $row['total_spent'];

          $varianceColor = ($variance < 0) ? 'red' : 'green';

          echo "<tr>
                  <td>{$row['category']}</td>
                  <td>{$row['budget_amount']}</td>
                  <td>{$row['total_spent']}</td>
                  <td style='color:$varianceColor;'>$variance</td>
                </tr>";
      }

      $totalVariance = $totalBudget - $totalSpent;

      echo "</table>";

      echo "<div class='summary'>
              <h3>Summary</h3>
              <p><strong>Total Budget:</strong> $totalBudget</p>
              <p><strong>Total Spending:</strong> $totalSpent</p>
              <p><strong>Overall Variance:</strong> <span style='color:" . ($totalVariance < 0 ? "red" : "green") . ";'>$totalVariance</span></p>
            </div>";
  } else {
      echo "<p style='text-align:center;'>No data found for the selected date range.</p>";
  }

  $conn->close();
}
?>

</body>
</html>
