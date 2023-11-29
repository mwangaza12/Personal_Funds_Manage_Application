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
	<title>Expenditure Capture</title>
  <link rel="stylesheet" href="style.css">
  <style>
    
  </style>
</head>
<body>
<h1>Welcome back <?php echo $_SESSION['username']; ?></h1>
<form method="post">
        <div class="container">
            <h1>EXPENDITURE CAPTURE</h1>
            <div>
                <label>Particulars</label>
                <input type="text" name="particulars" autocomplete="off" required>
            </div>
            <div>
                <label>Amount Spent</label>
                <input type="number" name="amount" autocomplete="off" required>
            </div>
            <div>
                <label>Category</label>
                <input type="text" name="category" autocomplete="off" required>
            </div>
            <button type="submit" name="submit">Submit</button>
        </div>
    </form>


<?php


if(isset($_POST['submit'])){

  $date = date('Y-m-d');
  $particulars = $_POST['particulars'];
  $amountSpent = $_POST['amount'];
  $category = $_POST['category'] ;
  

    if(empty($particulars)){
      echo "Particulars required";
    }elseif (empty($amountSpent)) {
      echo "Amount Spent required";
    }elseif (empty($category)) {
      echo "Category required";
    }else{
      $sql = "INSERT INTO expenditure(`date`, `particulars`, `amount_spent`, `category`) VALUES('$date','$particulars','$amountSpent','$category');";

      $result = mysqli_query($conn, $sql);

      if($result){
        echo "Inserted succesfully";
      }else{
        echo "Failed to connect";
      }
    }
}
?>
</body>
</html>
