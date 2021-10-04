<?php
session_start();
include "conn.php";
?>
<html>
    <head>
<link href="https://www.maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://www.maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://www.cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>
<!------ Include the above in your HEAD tag ---------->
<body>
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="http://danielzawadzki.com/codepen/01/icon.svg" id="icon" alt="User Icon" />
    </div>

    <!-- Login Form -->
    <form method="post">
      <input type="text" id="login" name="login" class="fadeIn second" name="login" placeholder="login">
      <input type="text" id="password" name="password" class="fadeIn third" name="login" placeholder="password">
      <input type="submit" name="submit" class="fadeIn fourth" value="Log In">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div>

  </div>
</div>
</body>
</html>
<?php 
if(isset($_POST['submit'])){

    $username=$_POST['login'];
    $password=$_POST['password'];
    $query=mysqli_query($conn,"select * from users where username='".$username."' AND password='".$password."'");
    $result=mysqli_fetch_row($query);
    $rowcount=mysqli_num_rows($query);
    if($rowcount)
    {
        if($result[6]==1)
        {

            echo "Role 1";
        }
        elseif($result[6]==2)
        {
            echo "Role 2";
        }
    }

}
?>