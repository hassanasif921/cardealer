<?php
require_once("conn.php");


if(!empty($_POST["username"])) {
  $query = "SELECT * FROM cardetails WHERE Stock_id ='" . $_POST["username"] . "'";
  $result=mysqli_query($conn,$query);
  $user_count = mysqli_num_rows($result);
  if($user_count>0) {
      echo "<span class='Stock-id-not-available'> Username Not Available.</span>";
  }else{
      echo "<span class='Stock id-available'> Username Available.</span>";
  }
}
?>