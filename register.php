<?php

include 'pdoUtils.php';



$fnameErr ="";
$valid = 1;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["email"])) {
        $emailErr = "email is required";
        $valid=0;
    } else {
        $email = test_input($_POST["email"]);
    }


    if (empty($_POST["fname"])) {
        $fnameErr = "First Name is required";
        $valid=0;
    } else {
        $fname = test_input($_POST["fname"]);
    }

    if (empty($_POST["lname"])) {
        $lnameErr = "Last Name is required";
        $valid=0;
    } else {
        $lname = test_input($_POST["lname"]);
    }

    if (empty($_POST["phone"])) {
        $phoneErr = "Phone is required";
        $valid=0;
    } else {
        $phone = test_input($_POST["phone"]);
    }

    if (empty($_POST["birthday"])) {
        $birthdayErr = "Birthday is required";
        $valid=0;
    } else {
        $birthday = test_input($_POST["birthday"]);
    }



    if (empty($_POST["gender"])) {
        $genderErr = "Select Gender";
        $valid=0;
    } else {
        $gender = test_input($_POST["gender"]);
    }


    if (empty($_POST["pwd"])) {
        $pwdErr = "Select Password";
        $valid=0;
    } else {
       // $pwd = test_input($_POST["pwd"]);
        //We will Encrypt password
        $pwd=password_hash(test_input($_POST["pwd"]), PASSWORD_DEFAULT);

    }



    if($valid){
       //Insert the record into table
     //   echo "Inserting into DB";
        $db = pdoUtil::getDBConnection();
       // echo "Debug 1";
        $columns_accounts = array('email', 'fname', 'lname', 'phone', 'birthday', 'gender','password');
      //  echo "Debug 2";

        $columnString = implode(',',$columns_accounts);
//        echo "Debug 3";
        $sql="INSERT INTO accounts (" . $columnString . ") VALUES ('$email','$fname','$lname','$phone','$birthday','$gender','$pwd')";
  //      echo $sql;
        $statement = $db->prepare($sql);
        if($statement->execute())
        {
            //sucess page
            header('Location: registerSuccess.php');

        }else{

            //error page
           $regError = "Sorry,Your Registration not successfull, Please try again !!!";

        }




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
    <h4>Sign Up</h4>
  <div class="form-group">
    <label for="exampleInputEmail1">First name</label>
    <input type="text" class="form-control" id="First Name" aria-describedby="emailHelp" placeholder="Enter first name">
 
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Last name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter last name">
 
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
 
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Password</label>
    <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter password">
 
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Confirm password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
 <button type="submit" class="btn btn-primary">Sign Up</button>
  <button type="submit" class="btn btn-primary">Login</button>
  
  </div>
</form>
  
  
  
</div>




</html>
