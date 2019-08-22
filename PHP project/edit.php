<?php
include 'include.php';

if(isset($_POST['check'])) {
    $error = $_GET['error_message'];
    echo $error;
}
$z=$_GET['id'];
$sql5="Select * from details ";

$result2=mysqli_query($link,$sql5);

$row2=mysqli_fetch_row($result2);
if(isset($z)) {

    $sql2 = "SELECT id,fname, lname, email, password,ph_no, gender FROM details WHERE id=?";
    if ($stmt = mysqli_prepare($link, $sql2)) {


        mysqli_stmt_bind_param($stmt, "s", $z);
 $password = $row['password'];
        $z = $_GET['id'];


        mysqli_stmt_execute($stmt);

        mysqli_stmt_store_result($stmt);
        mysqli_stmt_bind_result($stmt, $id, $fname, $lname, $email, $password,$number, $gender);

    }


    if ($stmt->affected_rows ==1 ) {
        $sql4 = "SELECT * from details where id='$z' ";

        $result = mysqli_query($link, $sql4) or die(mysqli_error($link));

        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
        {

            $fname = $row['fname'];
            $lname = $row['lname'];
            $email = $row['email'];
            $password = $row['password'];
            $number = $row['ph_no'];
            $gender = $row['gender'];



    }
        $male ='' ;
        $female='';
        if($gender=='male')
        {$male=$gender;}
        else
            $female=$gender;
    } else {

            header("Location: registration.php");

        }

}


?>

<form
    method="POST"
    action = "editing.php">
    <div class="container">
        <h1>EDIT RECORD</h1>


        <label for="first_name"><b>first name</b></label>
        <input type="hidden"  name="id" value="<?=($_GET['id']);?>"  required>

        <input type="text" value="<?=$fname;?>" name="firstname" required>
        <br><br>
        <label for="last_name"><b>last name</b></label>
        <input type="text" value="<?=$lname;?>" name="lastname" required>
        <br><br>

        <label for="email"><b>Email</b></label>

        <input type="email" value="<?=$email;?>" name="email" pattern=".+@.+.com" size="30" required>

        <br><br>
        <label for="password"><b>Password</b></label>

        <input type="password" value="<?=$password;?>" name="password"  size="30" required>
        <br><br>
        <label for="gender"><b>Gender</b></label>
        <input type="radio" name="gender" value="male" checked=""> Male
        <input type="radio" name="gender" value="female" > Female

        <br>
        <br>

        <button type="submit" name="edit" value="edit" class="registerbtn">Edit</button>
    </div>


</form>



