



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>

    <link rel="stylesheet" href="../css/style.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


  </head>
<body>   <div id="wrapper">
        <header class="header">
       
            <div style="background-color: #fff; text-align: center">
                 <div class="row">
                     <div class="col-sm-3 col-md-3 pt-5">
                        
                          <img alt="logo" src="../images/p1.png" hspace="5" vspace="5" />
                         
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


<a class="navbar-brand" href="index.php"  ></a>  <font size="4"  style="font-weight: 500 ;letter-spacing: 3px;">
National Platform for collaboration among Micro, Small & Medium Enterprises</font></a> 
  

<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"  style="float: right;"></span>
    </button> 

    <div class="collapse navbar-collapse " style="float:right" id="navbarTogglerDemo02">

   


<ul class="navbar-nav ml-auto mr-5 mt-3 mt-lg-0" >

<li id="support" class="nav-item">
          <div class="dropdown" style="float:right;margin-top:9px; margin-left:2px;">
            <a class="dropbtn">Support</a>
            <div class="dropdown-content" style="width:190px;">
              <a  class="nav-link" href="../reg_guide.php"> Registration Guidelines</a>
              <a class="nav-link" href="#">Search an Account</a>
              
            </div>
          </div>
        </li>
        
        <li class="nav-item">
          <a class="nav-link " href="./login/login.php" style="float: right;color:black; "  >Login</a>
        </li>
        <li class="nav-item">
          <div class="dropdown" style="float:right;margin-top:9px; margin-left:2px;">
            <a class="dropbtn">Register</a>
            <div class="dropdown-content">
              <a  class="nav-link" href="signup/employ_signup_step1.php">Employee</a>
              <a class="nav-link" href="../signup/employ_signup_step1.php">Organisation</a>
              
            </div>
          </div>
        </li>
      </ul>         

    </div>
 
  </nav>



         
    <div id="otp" class="container py-3" style="padding-top:2px; margin-bottom:50px;">
        <div class="row">
            <div class="mx-auto col-sm-6">
                        <!-- form user info -->

                        <form  action='emp_signup_get_otp.php' method="POST" >
                        <div class="card">
                            <div class="card-header">
                                <h4 class="mb-0">Employee Authentication</h4>
                            </div>
                            <div class="card-body">
                            <form  action='emp_signup_get_otp.php' method="post" >
                                    
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Mobile Number</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" style=""  name="emp_mob_num" id ="emp_mob_num" type="text" maxlength="10"  >
                                        </div>
                                    </div>
                                   


                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">MSME Enterprise</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" id = "organization" style="" name="organization" type="text"  value=""  maxlength="35">
                                        </div>
                                    </div> 
                                   
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label"></label>
                                        <div class="col-lg-9 text-center">
                                            
                                            <input type="button" id ="submit" class="btn btn-primary" value="Get Authentication Pin" style="text-align:center;">
        
                                        </div>
                                    </div>
                                        
                                                
                                                
                                                    
                               
                            </div>
                        </div> </form>
                        <!-- /form user info -->
            </div>
        </div>
    </div>
    
            </div>    <!--cdn bootstrap -js-->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
    
      <script src="validation.js"></script>


</body>
</html>