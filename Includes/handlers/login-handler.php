<?php
//include ("classes/Account.php");

if (isset($_POST['login'])) {
    //login pressed
    $username = $_POST['loginUsername'];
    $pass = $_POST['loginPassword'];

    $success = $account->loginAcc($username, $pass);
    if($success==true)
    {
        $_SESSION['userloggedin']=$username; 
        header("Location: index.php");
        
    }


//    
}
?>
