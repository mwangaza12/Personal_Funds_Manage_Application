<?php
  include 'dbconn.php';
  include 'layout.php';
  check_session();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Income Capture</title>
  <link rel="stylesheet" href="style.css">
  <style>
    
  </style>
</head>
<body>
	<h1>Welcome back <?php echo $_SESSION['username']; ?></h1>
<form method="post">
        <div class="container">
            <h1>INCOME CAPTURE</h1>
            <div>
                <label>Source</label>
                <input type="text" name="source" autocomplete="off" required>
            </div>
            <div>
                <label>Amount</label>
                <input type="number" name="amount" autocomplete="off" required>
            </div>
            <div>
                <label>Description</label>
                <input type="text" name="description" autocomplete="off" required>
            </div>
            <button type="submit" name="submit">Submit</button>
        </div>
    </form>

</body>
</html>
<?php
if(isset($_POST['submit'])){
  $source = $_POST['source'];
  $date = date('Y-m-d');
  $amount = $_POST['amount'];
  $details = $_POST['description'];

  $sql = "INSERT INTO income(source, date, amount, details) VALUES('$source', '$date', '$amount', '$details')";

  $result = $conn->query($sql);

  if($result){
    echo "Inserted successfully";
  }else{
    echo "Error: " . $conn->error;
  }
}

?>