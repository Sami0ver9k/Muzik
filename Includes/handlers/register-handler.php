<?php 
//include ("classes/Account.php");
//$account-> register();

function formatUsername($input) {
    $input = strip_tags($input);
    $input = str_replace(" ", "", $input);
    return $input;
}

function formatFullname($input) {
    $input = strip_tags($input);

    return $input;
}

if (isset($_POST['register'])) {
    $username = formatUsername($_POST['username']);
    $fname = formatFullname($_POST['fullname']);
    $email = $_POST['email'];
    $pass1 = $_POST['password1'];
    $pass2 = $_POST['password2'];
    $bday = $_POST['bday'];


    $success = $account->registerAcc($username, $fname, $email, $pass1, $pass2, $bday);

    if ($success == true) {

        header("Location: index.php");
    }
}
?>
