<?php

/**
 *
 */
//include("Constants.php");
class Account {

    private $con;
    private $errorarray;

    public function __construct($con) {
        $this->con = $con;
        $this->errorarray = array();
    }
    
    

    //checking for error or showing error msg

    public function getError($error) {
        if (!in_array($error, $this->errorarray)) {

            $error = "";  //if no error then emptyy string
        } else {


            echo "<div class='alert alert-danger alert-dismissible'>
  <button type='button' class='close' data-dismiss='alert'>&times;</button>
  <strong>Opps!</strong>$error
      </div>";
        }
    }

    
    
    //login account
    public function loginAcc($uname, $pass) {

       
        // $pdo= new PDO;
        //$pdo->prepare($statement)
        $uname = mysqli_real_escape_string($this->con, $uname);
        $query = " select password from userreg where username='$uname'  limit 1 ";
        $res = mysqli_query($this->con, $query);



        //data['0'] will be password another way of doing
        $data = mysqli_num_rows($res);


        if ($data > 0) {

            while ($row = mysqli_fetch_assoc($res)) {
                $p = $row['password'];
                
            }
         $match=  password_verify($pass, $p);    // returns true or false
         
           //if matches 
         if( $match)
                    {
                       
                        return true;
                        
                    }
                    else 
                    {  
                        array_push ($this->errorarray, Constants::$loginError);
                    
                    return false;
                    }
    }
    
       else
       { array_push ($this->errorarray, Constants::$loginError);
          return false;
       }
    }

//reg function
    public function registerAcc($uname, $fname, $email, $pass1, $pass2, $bday) {
        $this->usernameValidate($uname);
        $this->fullnameValidate($fname);
        $this->emailValidate($email);
        $this->passwordsValidate($pass1, $pass2);
        $this->ageValidate($bday);

        if (empty($this->errorarray) == true) {
            //insert db
            return $this->insertUserdetails($uname, $fname, $email, $pass1, $bday);
        } else {

            return false;
        }
    }

    //insert db
    private function insertUserdetails($uname, $fname, $email, $pass1, $bday) {
        $uname = mysqli_real_escape_string($this->con, trim($uname));
        $fname = mysqli_real_escape_string($this->con, $fname);
       // $pass = trim($pass1);
        $encryptPass = password_hash($pass1, PASSWORD_BCRYPT);
        



        $date = date("Y-m-d");
        $propic = ("Assets/Images/Profilepic/defaultuser.png");

        $query = "INSERT INTO userreg ( id,username, fullname, email, password, dateofbirth, sinupdate, propic) VALUES"
                . " ( '', '$uname', '$fname', '$email', '$encryptPass', ' $bday', '$date', '$propic') ";

        $result = mysqli_query($this->con, $query);

        If (!$result) {

            die("couldnt insert user details" . mysqli_errno($this->con));
        } else
            return true;
    }

//username
    private function usernameValidate($uname) {
        if (strlen($uname) > 25 || strlen($uname) < 5) {
            array_push($this->errorarray, Constants::$unameCharcount);
            return;
        }
        //check if same username exists in db or not

        $query = "select username from userreg where username='$uname' ";
        $res = mysqli_query($this->con, $query);

        if (mysqli_num_rows($res) != 0) {

            array_push($this->errorarray, Constants::$usernameExists);
            return;
        }
    }

    //fullname

    private function fullnameValidate($fname) {
        if (strlen($fname) > 25 || strlen($fname) < 5) {
            array_push($this->errorarray, Constants::$fnameCharcount);
            return;
            //ceck if username exists
            //invalid characters
        }
    }

    //email

    private function emailValidate($email) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

            array_push($this->errorarray, Constants::$emailFilter);
            return;
        }

        $query = " select email from userreg where email='$email' ";
        $res = mysqli_query($this->con, $query);

        if (mysqli_num_rows($res) != 0) {
            array_push($this->errorarray, Constants::$emailExists);
            return;
        }
    }

    //pass
    private function passwordsValidate($pass1, $pass2) {



        if (strlen($pass1) > 20 || strlen($pass1) < 8) {
            array_push($this->errorarray, Constants::$passCharcount);
            return;
        }


        if (!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,20}$/', $pass1)) {

            array_push($this->errorarray, Constants:: $passnotAlhpanumeric);
            return;
        }



        if ($pass1 != $pass2) {
            array_push($this->errorarray, Constants::$passDontmatch);
            return;
        }
    }

    private function ageValidate($bday) {

        if (time() < strtotime("+12 years", strtotime($bday))) {

            array_push($this->errorarray, Constants::$ageValidation);
            return;
        }
    }

}

?>
