<?php
@session_start();
if(array_key_exists('username', $_SESSION) && array_key_exists('username', $_COOKIE)){
   header('location:newsmagazine/dashboard.php');
}
 include('class/user.class.php');

 $userObject = new User();
 $error = [];
 if(isset($_POST['submit'])){
    
     
     if(isset($_POST['email']) && !empty($_POST['email'])){
         $userObject->email = $_POST['email'];
        }else{
            $error['msg'] = "Enter Email";
        }
        if(isset($_POST['password']) && !empty($_POST['password'])){
            $userObject->password = $_POST['password'];
        }else{
            $error['msg'] = "Enter password";
        }
        
        // if(count($error) == 0){
            $status =  $userObject->login();
            
            echo "<pre>";
            print_r($status);
            echo "</pre>";
    // }


 }
 

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Panel</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
        label.error{
            color:red;
        }
    </style>

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                       <?php
                           if(isset($status) || isset($error['msg'])){
                            echo "<div class='alert alert-danger'>$status</div>";
                            echo $error['msg'];
                           }
                        ?>
                        <form action="" id="loginForm" method="post" noValidate>
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="" required>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" name='submit' class="btn btn-lg btn-success btn-block" value="Login">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/jquery/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function(){ 
            $('#loginForm').validate();
        })
    </script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

</body>
</html>