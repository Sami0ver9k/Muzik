<?php
include("Includes/config.php");
include("Includes/classes/Account.php");
include("Includes/classes/Constants.php");



$account = new Account($con);

include("Includes/handlers/register-handler.php");
include("Includes/handlers/login-handler.php");

function getInputValue($val) {
    if (isset($_POST[$val])) {



        echo $_POST[$val];
    }
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Welome</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    </head>

    <body>


        <div class="row">
            <div class="col-sm">
                <div class="position-static">
                    <div class="container">

                        <form id="loginform" action="register.php" method="post">

                            <div class="form-goup">

                                <div class="col-sm-6">
                                    <h3>Login</h3>
                                    <p>

                                        <label>Username</label>
                                        <input id="username" class="form-control" name="loginUsername" type="text" placeholder="mutkiAbal"  required>
                                             <?php echo $account->getError(Constants::$loginError); ?>
                                    </p>
                                </div>

                            </div>

                            <div class="form-group">
                                <div class="col-sm-6">

                                    <label>Password</label>
                                    <input id="password" name="loginPassword" class="form-control" type="password" required>

                                </div>
                            </div>


                            <div class="col-sm-5">

                                <input name="login" type="submit" value="Login" class="btn btn-outline-success">



                            </div>


                        </form>

                    </div>

                </div>
            </div>




            <div class="col-sm">
                <div class="position-relative">
                    <div class="container">

                        <form id="registerform" action="register.php" method="post">
                            <h3>Create New Account</h3>
                            <div class="form-goup row">

                                <div class="col-sm-5">

                                    <p>
                                        <label> Username</label>
                                        <input id="username" class="form-control" name="username" type="text" placeholder="User89" value="<?php getInputValue('username') ?>"   required>
                                        <?php echo $account->getError(Constants::$unameCharcount); ?>
                                        <?php echo $account->getError(Constants::$usernameExists); ?>


                                    </p>

                                </div>

                                <div class="col-sm-5">

                                    <p>

                                        <label>Full Name</label>
                                        <input id="fullname" class="form-control" name="fullname"  value="<?php getInputValue('fullname') ?>" type="text" required>
                                        <?php echo $account->getError(Constants::$fnameCharcount); ?>


                                    </p>


                                </div>




                            </div>



                            <div class="form-goup row">

                                <div class="col-sm-5">

                                    <p>

                                        <label> Email</label>
                                        <input id="email" class="form-control" name="email" type="email" placeholder="some@email.net" required>
                                        <?php echo $account->getError(Constants::$emailFilter); ?>
                                        <?php echo $account->getError(Constants::$emailExists); ?>

                                    </p>

                                </div>

                                <div class="col-sm-5">


                                    <label> Date of Birth</label>

                                    <input type="date" value="<?php getInputValue('bday') ?>" name="bday">
                                    <?php echo $account->getError(Constants::$ageValidation); ?>




                                </div>




                            </div>







                            <div class="form-group row">
                                <div class="col-sm-5">

                                    <label>Password</label>
                                    <input id="password1" name="password1" class="form-control" type="password" required>
                                    <?php echo $account->getError(Constants::$passCharcount); ?>
                                    <?php echo $account->getError(Constants::$passnotAlhpanumeric); ?>


                                </div>

                                <div class="col-sm-5">

                                    <label>Confirm Password</label>
                                    <input id="password2" name="password2" class="form-control" type="password" required>
                                    <?php echo $account->getError(Constants::$passDontmatch); ?>

                                </div>



                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3">


                                    <p>
                                        <input name="register" type="submit" value="Register" class="btn btn-outline-success">
                                    </p>
                                </div>
                            </div>



                        </form>

                    </div>

                </div>
            </div>



        </div>






    </body>





</html>
