<?php
include_once "include.php";

echo "<table border='1'>
<tr>
<th>id</th>
<th>Firstname</th>
<th>Lastname</th>
<th>Email</th>
<th>Password</th>
<th>Phone no.</th>
<th>Gender</th>

<th>Edit</th>

</tr>";
$sql="select * from details";
$result = mysqli_query($link,$sql);

while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
{
    $edit='edit';
    echo "<tr>";
    echo "<td>" . $row['id'] .  "</td>";
    echo "<td>" . $row['fname'] .  "</td>";
    echo "<td>" . $row['lname'] .  "</td>";
    echo "<td>" . $row['email'] .  "</td>";
    echo"<td>" . $row['password'] . "</td>";
    echo "<td>" . $row['ph_no'] . "</td>";
    echo "<td>" . $row['gender'] . "</td>";
    echo "<td>" . "<button id =' $row[id]' type='button' value='$row[id]' >". $edit ."</button>" . "</td>";

    echo "</tr>";
}
echo "</table>";



mysqli_close($link);
?>




<html

</style>
<div id="login_page">
<form id="loginform"
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

        <input type="email" placeholder="Enter email" id="email" name="email"  pattern=".+@.+.com" size="30"  required >
<span id="span" style="display: none";> Email Exist  </span>
<br><br>

        <label for="password"><b>Password</b></label>

        <input type="password" placeholder="Enter password" name="password"  size="30" required>
        <br><br>


        <label for="ph_no"><b>Phone no</b></label>
            <input type="text" placeholder="Enter phone number" name="number" id="number" required="" />
            <span id="span2" style="display: none";> Invalid phone number  </span>
        <br><br>

        <label for="gender"><b>Gender</b></label>
        <input type="radio" name="gender" value="male"> Male
        <input type="radio" name="gender" value="female"> Female
<br>
<br>

        <button type="submit" class="registerbtn" name="submit" value="1">Register</button>


    </div>



</form></div>
<form action = loginclass.php>
    <button type="submit" class="loginbtn" name="submit" value="3">Login</button>
</form>

</div>

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
                            console.log(response);
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


        $(document).ready(function() {

                $("button").click(function() {
                console.log('a');
                var id=this.id;

                $.ajax({

                    type: "POST",
                    url: 'edit_ajax.php',
                    data: {"myData":id},
                    success: function (response1)

                    {
                        if ($.trim(response1)) {
                       //  var jsonData=(jsonData.success)
                       //  console.log('1');


                            $('#login_page').html(response1);



                        }
                    }
                });
            });
        });




    </script>

</head>
</html>






