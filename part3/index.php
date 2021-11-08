<!--header-->
<?php include_once "./partial/header.php"; ?>

<body>

  <!-- section here-->                                
 <!--#################################Carousel#####################################-->              
 <div class="container">
  
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="image/W21-FEB-1120121-LNYHERO.jpg" alt="Los Angeles" style="width:100%;">
      </div>

      <div class="item">
        <img src="image/gift for you.jpg" alt="Chicago" style="width:100%; height: 600px;">
      </div>
    
      <div class="item">
        <img src="image/3picture.jpg" alt="New york" style="width:100%; height: 600px;">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>><br>
     
<hr>

<!--footer2-->
<?php include_once "./partial/footer.php"; ?>

</body>
</html>