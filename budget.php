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
	<title>Budjet Capture</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Welcome back <?php echo $_SESSION['username']; ?></h1>
<form method="post">
        <div class="container">
            <h1>BUDJET CAPTURE</h1>
            <div>
                <label>Description</label>
                <input type="text" name="description" id="source" autocomplete="off" required>
            </div>
            <div>
                <label for="amount">Amount</label>
                <input type="number" name="amount" id="amount" autocomplete="off" required>
            </div>
            <button type="submit" name="submit">Submit</button>
        </div>
    </form>
<?php

if(isset($_POST['submit'])){

  $description = $_POST['description'];
  $amount = $_POST['amount'];
  
      $sql = "INSERT INTO ex_category(description,amount) VALUES('$description','$amount')";

      $result = mysqli_query($conn, $sql);

      if($result){
        echo "Inserted successfully";
        //header("Location: home.php");
      }else{
        echo "Failed to connect";
      }
    }
?>
</body>
</html>

