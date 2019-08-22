<?php

include 'include.php';

$check=$_POST['submit'];

if($check==3)
{




    $email =$_POST['email'];

    $hashed_password = md5($_POST['password']);
$password = $hashed_password;


    $sql2 = "SELECT id FROM details WHERE email= ? AND password = ?";

  if($stmt = mysqli_prepare($link, $sql2)) {


       mysqli_stmt_bind_param($stmt, "ss", $email, $password);


      mysqli_stmt_execute($stmt);

      mysqli_stmt_store_result($stmt);
      mysqli_stmt_bind_result($stmt, $id);


  }
print_r($stmt->affected_rows);
    if($stmt->affected_rows === 0)
//if(($res_e->num_rows) == 0)
{

    $php_errormsg= 'Invalid login details';
    header("Location: login.php?error_message=$php_errormsg");

}
else{
    $sql5 = "Select id from details where email='$email'and password='$password'";
    $result=mysqli_query($link,$sql5);



      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
print_r($row);

        $id = $row['id'];}


    $_SESSION["id"]=$id;
print_r($_SESSION["id"]);


    header("Location: dashboard.php");


}
else
    {
    header("Location:loginclass.php");
}
?>

