<?php 
include("connection.php");
session_start();
$error=null;
if($_SERVER["REQUEST_METHOD"] == "POST")
 {
// username and password received from loginform 
$username=mysqli_real_escape_string($conn,$_POST['user']);
$password=mysqli_real_escape_string($conn,$_POST['pass']);

$sql_query="SELECT ID FROM user WHERE User='$username' and password='$password'";
$result=mysqli_query($conn,$sql_query);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$count=mysqli_num_rows($result);


// If result matched $username and $password, table row must be 1 row
if($count==1)
{
$_SESSION['login_user']=$username;

header("location: Store.php");
}
else
{
$error="<div ID='result' class='alert alert-danger'>!!!!User Name or Pasword is Incorrect<span class=' pull-right' id='close'><i class='fa fa-times' aria-hidden='true'></i></span></div>";

}
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

    <title>CHR Service Main Store</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse  navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header ">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand " href="index.php">Part Code Genretor.... Changhong Ruba Service Main Store</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="http://116.58.45.67:891" target="blank">GoTo IVMS</a>
                    </li>
                    <li>
                        <a href="http://116.58.45.67" target="blank">GoTo CMS</a>
                    </li>
                    <li>
                        <a href="http://mail.google.com" target="blank">Gmail</a>
                    </li>
                    
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Login
                    
                </h1>
                <div>
                <?php echo $error; ?>
                    
                </div>
            </div>
        </div>
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">
            <!-- Map Column -->
            <div class="col-md-4">
			<div class="row" >
			<h3>Enter Your Login Details</h3>
                <form id="Login" action="Index.php" method="Post" novalidate>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>User Name:</label>
                            <input type="text" class="form-control" name="user" id="user" Placeholder="Abdul" required>
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Password:</label>
                            <input type="Password" name="pass" class="form-control" Placeholder="Password" id="pass" required >
                        </div>
                    </div>
                    
                    
                    <div id="success"></div>
                    <!-- For success/fail messages -->
                    <button type="submit" id="submit" class="btn btn-primary">Login</button> <span>Not a User? Main Store Manager!!</a>
                </form>
            </div>  
            </div>
			<div class="col-md-4">
			</div>
            <!-- Contact Details Column -->
            <div class="col-md-4">
                <h3>Contact Details</h3>
                <p>
                    <h4>Changhong Ruba Service Main Store</h4><br>Opp. Feroz Sons Labortaries Near Sundar Industrial Estate Gate #2, Lahore<br>
                </p>
                <p><i class="fa fa-phone"></i> 
                    <abbr title="Phone">P</abbr>: (042) 111-672-247</p>
                <p><i class="fa fa-envelope-o"></i> 
                    <abbr title="Email">E</abbr>: <a href="mailto://parts@changhong.com.pk">parts@changhong.com.pk</a>
                </p>
                <p><i class="fa fa-clock-o"></i> 
                    <abbr title="Hours">H</abbr>: Monday - Friday: 9:00 AM to 6:00 PM</p>
                    <p><i class="fa fa-clock-o"></i> 
                    <abbr title="Hours">H</abbr>: Saturday: 9:00 AM to 1:00 PM</p>
                <ul class="list-unstyled list-inline list-social-icons">
                    <li>
                        <a href="#"><i class="fa fa-facebook-square fa-2x"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-linkedin-square fa-2x"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-twitter-square fa-2x"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-google-plus-square fa-2x"></i></a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /.row -->

        <!-- Contact Form -->
        <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
        <div class="row">
         

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Changhong Ruba Main Store 2017</p>
                    <p>Developed by Abdul Razzaq</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Contact Form JavaScript -->
    <!-- Do not edit these files! In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
   <script src="script.js"></script>

</body>

</html>
