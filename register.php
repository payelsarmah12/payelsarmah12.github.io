<?php
session_start();
//connect to database
$db=mysqli_connect("localhost","root","","wss");
if(isset($_POST['submit']))
{
    $fname=mysqli_real_escape_string($db,$_POST['fname']);
    $email=mysqli_real_escape_string($db,$_POST['email']);
    $username=mysqli_real_escape_string($db,$_POST['username']);
    $contact=mysqli_real_escape_string($db,$_POST['contact']);
    $photo=mysqli_real_escape_string($db,$_POST['photo']);
    $id_card=mysqli_real_escape_string($db,$_POST['id_card']);
    $addr=mysqli_real_escape_string($db,$_POST['addr']);
    $password=mysqli_real_escape_string($db,$_POST['password']);
    $password2=mysqli_real_escape_string($db,$_POST['password2']);  
    $query = "SELECT * FROM signup WHERE username = '$username'";
    $result=mysqli_query($db,$query);
      if($result)
      {
     
        if( mysqli_num_rows($result) > 0)
        {
                
                echo '<script language="javascript">';
                echo 'alert("Username already exists")';
                echo '</script>';
        }
        
          else
          {
            
            if($password==$password2)
            {           //Create User
                $password=md5($password); //hash password before storing for security purposes
                $sql="INSERT INTO signup(fname, email, username, contact, photo, id_card, addr, password) VALUES('$fname','$email','$username', '$contact', '$photo', '$id_card','$addr','$password')";
                mysqli_query($db,$sql);  
                $_SESSION['username']=$username;
                header("location:index.php");  //redirect index page
            }
            else
            {
                $_SESSION['message']="The two password do not match";   
            }
          }
      }
}
?>


<!--<!DOCTYPE html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--  <title>Rabbani sarkar</title>-->
<!--  <meta charset="utf-8">-->
<!--  <meta name="viewport" content="width=device-width, initial-scale=1">-->
<!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
<!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>-->
<!--  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
<!--  <link rel="stylesheet" href="style.css">-->
<!--</head>-->
<!--<body>-->
<!---->
<!--<div class="container">-->
<!--  <hgroup>-->
<!--    <h1 class="site-title" style="text-align: center; color: green;">Login, Registration, Logout</h1><br>-->
<!--  </hgroup>-->
<!---->
<!--<br>-->
<!--<nav class="navbar navbar-inverse">-->
<!--  <div class="container-fluid">-->
<!--   Collect the nav links, forms, and other content for toggling -->
<!--    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">-->
<!--      <ul class="nav navbar-nav center">-->
<!--        <li><a href="login.php">LogIN</a></li>-->
<!--        <li><a href="register.php">SignUp</a></li>-->
<!--      </ul>-->
<!---->
<!--    </div>-->
<!--  </div>-->
<!--</nav>-->
<!---->
<!---->
<!--<main class="main-content">-->
<!---->
<!-- <div class="col-md-6 col-md-offset-2">-->
<!---->
<?php
//    if(isset($_SESSION['message']))
//    {
//         echo "<div id='error_msg'>".$_SESSION['message']."</div>";
//         unset($_SESSION['message']);
//    }
//?>
<!--<form method="post" action="register.php">-->
<!--  <table>-->
<!--     <tr>-->
<!--           <td>Username : </td>-->
<!--           <td><input type="text" name="username" class="textInput"></td>-->
<!--     </tr>-->
<!--     <tr>-->
<!--           <td>Email : </td>-->
<!--           <td><input type="email" name="email" class="textInput"></td>-->
<!--     </tr>-->
<!--      <tr>-->
<!--           <td>Password : </td>-->
<!--           <td><input type="password" name="password" class="textInput"></td>-->
<!--     </tr>-->
<!--      <tr>-->
<!--           <td>Password again: </td>-->
<!--           <td><input type="password" name="password2" class="textInput"></td>-->
<!--     </tr>-->
<!--      <tr>-->
<!--           <td></td>-->
<!--           <td><input type="submit" name="register_btn" class="Register"></td>-->
<!--     </tr>-->
<!--    </table>-->
<!---->
<!--</form>-->
<!--</div>-->
<!---->
<!--</main>-->
<!--</div>-->
<!---->
<!--</body>-->
<!--</html>-->


<!DOCTYPE html>
<html lang="en">
<html>
<head>
    <title>Sign Up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="css/signup_style.css" />
    <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link
            href="https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600"
            rel="stylesheet"
            type="text/css"
    />
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
</head>

<body class="body">


<div class="login-page">
    <div class="form">
        <form method="post" action="register.php">
            <lottie-player
                    src="https://assets4.lottiefiles.com/datafiles/XRVoUu3IX4sGWtiC3MPpFnJvZNq7lVWDCa8LSqgS/profile.json"
                    background="transparent"
                    speed="1"
                    style="justify-content: center"
                    loop
                    autoplay
            ></lottie-player>
            <input type="text" placeholder="full name" name="fname" />
            <input type="email" placeholder="email address" name="email"/>
            <input type="text" placeholder="pick a username" name="username" />
            <input type="number" placeholder="contact number" name="contact" />
            <input type="file" placeholder="choose photo" name="photo" />
            
            <!-- <label for="id_card">Choose your ID card :</label>_
            <select id="id_card" name="id_card" size="4">
                <option value="aadhar">Aadhar Card</option>
                <option value="pan">Pan Card</option>
                <option value="voter">Voter ID</option>
                <option value="license">License</option>
            </select>  -->
            <select name="id_card">
                <option value="id">Choose your ID card</option>
                <option value="aadhar">Aadhar Card</option>
                <option value="pan">Pan Card</option>
                <option value="voter">Voter ID</option>
                <option value="license">License</option>
                
             </select>

            <input type="file" placeholder="choose id card" name="id_card" value="Helo" />
            <input type="text" placeholder="address" name="addr"/>
            <input type="password" id="password" placeholder="set a password" name="password"/>
            <input type="password" id="password" placeholder="Confirm password" name="password2"/>
            <br>
            <input type="submit" name="submit" value="SIGN UP">
        </form>

        <form class="login-form">
            <button type="button" onclick="window.location.href='index.php'">LOG IN</button>
        </form>


    </div>
</div>
</body>
<script>
    function show() {
        var password = document.getElementById("password");
        var icon = document.querySelector(".fas");

        // ========== Checking type of password ===========
        if (password.type === "password") {
            password.type = "text";
        } else {
            password.type = "password";
        }
    }
</script>
</html>
</html>


