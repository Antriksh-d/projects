<?php
include "db_config.php";



class User{



public $db;



public function __construct(){

$this->db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);


if(mysqli_connect_errno()) {

echo "Error: Could not connect to database.";

exit;

}

}



/*** for registration process ***/

public function reg_user($fname,$lname,$password,$email,$gender,$number){



$password = md5($password);

$sql="SELECT * FROM details WHERE email='$email'";



//checking if the username or email is available in db

$check =  $this->db->query($sql) ;

$count_row = $check->num_rows;

//print_r($count_row);

//if the username is not in db then insert to the table

if ($count_row == 0) {

//$sql1="INSERT INTO details( fname, lname, email, password, gender) VALUES ('$fname', '$lname', '$email', '$password', '$gender')";


    $sql1 = "INSERT INTO details (fname, lname,email,password,ph_no,gender) 
VALUES (?,?,?,?,?,?)";
    if ($stmt = mysqli_prepare($this->db, $sql1)) {
        mysqli_stmt_bind_param($stmt, "ssssss", $fname, $lname, $email, $password, $number, $gender);



        mysqli_stmt_execute($stmt);

        return $stmt;

    } else {
        return false;
    }

}}



/*** for login process ***/

public function check_login($email, $password)
{


    $password = md5($password);

//$sql2="SELECT id from details WHERE email='$email'  and password='$password'";

    $sql2 = "SELECT id FROM details WHERE email= ? AND password = ?";

    if ($stmt = mysqli_prepare($this->db, $sql2)) {


        mysqli_stmt_bind_param($stmt, "ss", $email, $password);


        mysqli_stmt_execute($stmt);

        mysqli_stmt_store_result($stmt);
        mysqli_stmt_bind_result($stmt, $id);

//checking if the username is available in the table




        if($stmt->affected_rows == 1)
        //if ($count_row == 1)
        {

            $sql5 = "Select id from details where email='$email'and password='$password'";
            $result=mysqli_query($this->db,$sql5);



            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            print_r($row);

            $id = $row['id'];}


        $_SESSION["id"]=$id;
// this login var will use for the session thing

            $_SESSION['login'] = true;



            return true;

        } else {

            return false;

        }

    }



/*** for showing the username or fullname ***/

public function get_fullname($id){

$sql3="SELECT fname FROM details WHERE id = $id";

$result = mysqli_query($this->db,$sql3);

$user_data = mysqli_fetch_array($result);

echo $user_data['fx name'];

}



/*** starting the session ***/

public function get_session(){

return $_SESSION['login'];

}



public function user_logout() {

$_SESSION['login'] = FALSE;

session_destroy();

}



}
?>