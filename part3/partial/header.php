<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    
    <link rel='stylesheet' id='fontawesome-css' href='https://use.fontawesome.com/releases/v5.0.1/css/all.css?ver=4.9.1' type='text/css' media='all' /> 
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script_upload.js" defer></script>

</head>

<nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!--logo-->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>                        
              </button>
             
              <a class="navbar-brand "  href="index.php" style="color: red;"> LWD STORE </a>
         </div>
         <!--nav bar with dropdown-->
         <div class="collapse navbar-collapse" id="myNavbar">
        
          <ul class="nav navbar-nav" >
            <li class=""><a href="index.php">Home</a></li>
            <li class=""><a href="catalogue.php">Catalogue</a></li>
            <li class=""><a href="add_new.php">Add NEW</a></li>
          </ul>
           <!--sing in sign up-->
           
            <ul class="nav navbar-nav navbar-right">
           <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span></a></li>
           <li><a href="signin.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
           <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
             </ul>

          <!--search icon-->
           <form action="catalogue.php" method="post">
                <input type="text" placeholder="Search" name="search_keyword">
                <button class="btn btn-default" type="submit">
                <i class="glyphicon glyphicon-search"></i></a>
                </button>
            </form> 
            
           
         </div>
        </div>
     </nav><br><br><br><br>
    