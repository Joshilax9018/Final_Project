<?php


include "pdoUtils.php";

$error ="";
$valid = 1;
$email ="";
$pwd ="";






function userVerifivcation($email,$password){
    // Get DB Connection Object
    //echo "debug3";
    $conn = pdoUtil::getDBConnection();

    //echo "debug4";

    //Fire a select Query  and fetch the pwd of that user
    $statement = $conn->prepare("SELECT password FROM accounts WHERE email ='$email'");
    $statement->execute();
    $results=$statement->fetch();
    $statement->closeCursor();

   /* echo "PWD from DB".$results['password'];
    echo '<br>';
    echo "PWD from USER".password_hash($password,PASSWORD_DEFAULT);*/
    //echo $password;
    //echo '<br>';
    //echo "PWD from DB".$results['password'];
    //match the password with pwd in post request
    if(password_verify($password,$results['password']))
    {
        //Login Successful , Create the session for user now.
        //return true;
        //echo "Correct Password";
        //Create session
        session_start();
        $_SESSION["email"] = $email;

        header("Location: https://web.njit.edu/~svj28/Final_Project/todolist.php");

    }else{

        //  stringFunctions::printThis('<h1>Invalid email/password,Please try again</h1>');
        //stringFunctions::printThis('<a href="login.html">Try again</a>');
        $error ="Incorrect email/pwd, Please try again!";
        //echo "Incorrect password";

    }
    //if  succ -- >
    //Set the cookie and return the sucess page

    //return false;
    //if fails
    // Display the

}
session_start();
//print_r($_SESSION);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["email"])) {
        $emailErr = "email is required";
        $valid=0;
    } else {
        $email = test_input($_POST["email"]);
    }


    if (empty($_POST["pwd"])) {
        $pwdErr = "Select Password";
        $valid=0;
    } else {
        // $pwd = test_input($_POST["pwd"]);
        //We will Encrypt password
        //$pwd=password_hash(test_input($_POST["pwd"]), PASSWORD_DEFAULT);
        //$pwd=password_hash(test_input($_POST["pwd"]), PASSWORD_DEFAULT);
        $pwd =$_POST["pwd"];

    }


    if($valid){
        //create object of the verify class
       // echo $valid." email is".$email." pwd".$pwd;

       // echo "debug2";
        userVerifivcation($email,$pwd);
       // echo " validation ";
    }




}


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}






?>

<html>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">




<div class="container">
  
 
  
  <form>
   <div class="col-md-6">
    <h4>Sign In</h4>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
 
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
 
  <button type="submit" class="btn btn-primary">Login</button>
  <button type="submit" class="btn btn-primary">Sign Up</button>
  </div>
</form>
  
  
  
</div>




</html>

    

