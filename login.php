<?php 
session_start();
include_once 'include/class.user.php';
$user = new User();

if (isset($_POST['submit'])) { 
		extract($_POST);   
	    $token = $user->check_login($emailusername, $password);
	    if ($token) {
	       header("location:posts.php?token=".$token);
	    } else {
	        echo 'Wrong username or password';
	    }
	}
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <title>OOP Login Module</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
  </head>

  <body>
    <div id="container" class="container">
      <h1>Login Here</h1>
      <form action="" method="post" name="login">
        <table class="table " width="400">
          <tr>
            <th>UserName or Email:</th>
            <td>
              <input type="text" name="emailusername" required>
            </td>
          </tr>
          <tr>
            <th>Password:</th>
            <td>
              <input type="password" name="password" required>
            </td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>
              <input class="btn" type="submit" name="submit" value="Login" onclick="return(submitlogin());">
            </td>
          </tr>
          
        </table>
      </form>
    </div>
    <script>
      function submitlogin() {
        var form = document.login;
        if (form.emailusername.value == "") {
          alert("Enter email or username.");
          return false;
        } else if (form.password.value == "") {
          alert("Enter password.");
          return false;
        }
      }
    </script>


  </body>