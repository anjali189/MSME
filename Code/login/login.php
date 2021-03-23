<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">

    <link rel="stylesheet" type="text/css" href="../css/style.css" />


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
<div id="wrapper">
<header class="header">

       <div style="background-color: #fff; text-align: center">
            <div class="row">
                <div class="col-sm-3 col-md-3 pt-5">

                     <img alt="logo"  href="../index.php" src="../images/p1.png" hspace="5" vspace="5" />

                </div>
                <div class="col-sm-6   col-md-6 col-xs-6 hidden-xs">
                    <div align="center" class="header-div"  style="padding-top: 3em;  ">



                        <font size="4" style="font-weight:bold">भारत सरकार</font>
                        <br />
                        <font size="4" style="color: red; font-weight:bold"> सूक्ष्म , लघु  और मध्यम उद्यम मंत्रालय </font>
                        <br />
                        <font size="4"  style="font-weight:bold  ;letter-spacing: 3px;">
                        Government Of India<br />
                        Ministry of Micro, Small & Medium Enterprises</font>
                        <br />
                    </div>
                </div>

              <div id="right-logo"  class="col-sm-3 col-md-3 col-xs-3  d-none d-md-block">
                 <img alt="MSME" src="../images/p2.png" hspace="5" vspace="5" />
             </div>
            </div>
        </div>

    </header>


    <nav class="navbar navbar-expand-md navbar-light bg-light" style=width:100%;>


<a class="navbar-brand" href="#"  ></a>  <font size="4"  style="font-weight: 500 ;letter-spacing: 3px;">
National Ministry of Micro, Small & Medium Enterprises</font></a>


<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"  style="float: right;"></span>
    </button>

    <div class="collapse navbar-collapse " style="float:right" id="navbarTogglerDemo02">




<ul class="navbar-nav ml-auto mr-5 mt-3 mt-lg-0" >
<li class="nav-item">
                      <a class="nav-link " href="../index.php" style="float: right;color:black; "  >Home</a>
           </li>
<li id="support" class="nav-item">
          <div class="dropdown" style="float:right;margin-top:9px; margin-right:11px;">
            <a class="dropbtn">Support</a>
            <div class="dropdown-content" style="width:190px;">
              <a  class="nav-link" href="#"> Registration Guidelines</a>
              <a class="nav-link" href="#">Find Account</a>

            </div>
          </div>
        </li>


        <li class="nav-item">
          <div class="dropdown" style="float:right;margin-top:9px; margin-left:2px;">
            <a class="dropbtn">Register</a>
            <div class="dropdown-content">
              <a  class="nav-link" href="../signup/employ_signup_step1.php">Employee</a>
              <a class="nav-link" href="#">Organisation</a>

            </div>
          </div>
        </li>
      </ul>

    </div>

  </nav>
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">

                <div class="row">
                    <div class="col-md-6 mx-auto">

                        <!-- form card login -->
                        <div class="card rounded-0">
                            <div class="card-header">
                                <h3 class="mb-0">Login</h3>
                            </div>
                            <div class="card-body">
                                <form class="form" role="form" autocomplete="off" id="formLogin" novalidate="" method="POST">



                                   <!-- username field  id ="username"-->
                                    <div class="form-group">
                                        <label for="uname1">UAN / Phone number</label>
                                        <input type="text" class="form-control form-control-lg rounded-0" name="uname1" id="username" required="">
                                        <div class="invalid-feedback">Oops, you missed this one.</div>
                                    </div>
                                    <!--password field password-->
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control form-control-lg rounded-0" id="password" required="" autocomplete="new-password">
                                        <div class="invalid-feedback">Enter your password too!</div>
                                    </div>
                                    <div>
                                        <label class="custom-control custom-checkbox">

                                          <span class="custom-control-description medium text-dark"><a href="registration.html"><strong>Forget Password</strong> </a> </a></span>
                                        </label>
                                    </div>

                                    <!--login btn id "btnlogin"-->
                                    <button type="submit" href="./process.php" class="btn btn-success btn-lg float-right" id="btnLogin">Login</button>

                            </div>
                            <!--/card-block-->
                        </div>
                        <!-- /form card login -->

                    </div>


                </div>
                <!--/row-->

            </div>
            <!--/col-->
        </div>
        <!--/row-->
    </div>
    <!--/container-->



</div>
    <script>$("#btnLogin").click(function(event) {

        //Fetch form to apply custom Bootstrap validation
        var form = $("#formLogin")

        if (form[0].checkValidity() === false) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.addClass('was-validated');
      });</script>






        <!--cdn bootstrap -js-->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</body>
</html>
