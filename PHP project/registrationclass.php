<?php
include_once 'class.user.php';
$user = new User(); // Checking for user logged in or not



if (isset($_REQUEST['submit'])){

extract($_REQUEST);

$register = $user->reg_user($fname, $lname,$password, $email, $gender,$number);

if ($register) {

// Registration Success

echo 'Registration successful <a href="loginclass.php">Click here</a> to login';

} else {

// Registration Failed

echo 'Registration failed. Email exits please try again';

}
}
?>



<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />


Register

<style><!--

    #container{width:400px; margin: 0 auto;}

    --></style>


<script type="text/javascript" language="javascript">

    function submitreg() {

        var form = document.reg;

        if(form.fname.value == ""){

            alert( "Enter fname." );

            return false;

        }

    else if(form.lname.value == ""){
                    alert( "Enter lname." );

            return false;

        }

    else if(form.password.value == ""){

            alert( "Enter password." );
                    return false;

        }

    else if(form.email.value == ""){

            alert( "Enter email." );

            return false;

        }

    }

</script>

<div id="container">

    <h1>Registration Here</h1>
        <form action="" method="post" name="reg">
                <table>

            <tbody>

            <tr>

                <th>First Name:</th>

                <td><input type="text" name="fname" required="" /></td>

            </tr>

            <tr>

                <th>Last Name:</th>

                <td><input type="text" name="lname" required="" /></td>

            </tr>

            <tr>

                <th>Email:</th>

                <td><input type="text" name="email" id="email" pattern=".+@.+.com" size="30" required /></td>
                <td><span id="span" style="display: none";> Email Exist  </span></td>
            </tr>

            <tr>

                <th>Password:</th>

                <td><input type="password" name="password" required="" /></td>

            </tr>
            <tr>
                <th> Phone no: </th>
                <td><input type="text" name="number" id="number" required="" /></td>
                <td><span id="span2" style="display: none";> Invalid phone number  </span></td>
            </tr>
            <tr>

            <tr>
            <td> <label for="gender"><b>Gender</b></label></td>
                <td><input type="radio" name="gender" value="male"> Male </td>
                <td><input type="radio" name="gender" value="female"> Female </td>
            </tr>

                <td></td>

                <td><input onclick="return(submitreg());" type="submit" name="submit" value="Register" /></td>

            </tr>


            <tr>

                <td></td>

                <td><a href="loginclass.php">Already registered! Click Here!</a></td>

            </tr>

            </tbody>

        </table>
            <br><br>


    </form></div>

<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<head>

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript">

        $(document).ready(function() {
            $('#email').blur(function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: 'email_ajax.php',
                    data: $(this).serialize(),
                    success: function(response)
                    {

                        if($.trim(response)){
                            var jsonData = JSON.parse(response);
                            console.log(response)
                            $("#span").show();
                            $("#email").val(" ");




                            //  console.log(jsonData);
                            console.log(jsonData.success);
                        }else
                        {
                            $("#span").hide();
                        }


                        // user is logged in successfully in the back-end
                        // let's redirect

                    }
                });
            });
        });


        jQuery(document).ready(function($){
            $cf = $('#number');
            $cf.blur(function(e){
                phone = $(this).val();
                phone = phone.replace(/[^0-9]/g,'');
                if (phone.length != 10)
                {
                    $("#span2").show();
                    $('#number').val('');
                    $('#number').focus();
                }
            });
        });
    </script>

</head>

