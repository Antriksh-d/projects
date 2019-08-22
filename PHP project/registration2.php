<?php
include 'include.php';

$error=$_GET['error_message'];
echo $error;
?>
<form
    method="POST"
    action = "registring.php">
    <div class="container">
        <h1>User Registration</h1>


        <label for="first_name"><b>first name</b></label>

        <input type="text" placeholder="Enter firstname" name="firstname" required>
        <br><br>
        <label for="last_name"><b>last name</b></label>
        <input type="text" placeholder="Enter lastname" name="lastname" required>
        <br><br>

        <label for="email"><b>Email</b></label>

        <input type="email" placeholder="Enter email" name="email" pattern=".+@.+.com" size="30" required>

        <br><br>
        <label for="password"><b>Password</b></label>

        <input type="password" placeholder="Enter password" name="password"  size="30" required>
        <br><br>
        <label for="gender"><b>Gender</b></label>
        <input type="radio" name="gender" value="male"> Male
        <input type="radio" name="gender" value="female"> Female
        <br>
        <br>

        <button type="submit" class="registerbtn" name="submit" value="1">Register</button>
    </div>


</form>

