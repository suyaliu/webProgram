
<script src='js/product.js' defer> </script>
<!--header-->
<?php include_once "./partial/header.php"; ?>

<body>

<?php 
//referance lecture teacher w13 example
  require_once('./dao/productDAO.php'); 
  $shoeDAO = new productDAO();
  $shoe = $shoeDAO->getProduct($_GET["id"]);
?>

  <!-- section here-->                                
  <div class="container-fluid">             
    <div class="row " >
        <div class="col-sm-9">
        <img src=<?php echo $shoe->getImage() ?>>
        </div>           
      <div class="col-sm-3">
          <div class="thumbnail">             
            <h2><?php echo $shoe->getModel() ?></h2>
            <ul class="rating" style="padding-left: 0;">           
              <span class="view-stars pull-right">
                <span class="glyphicon glyphicon-star star-color"></span>
                <span class="glyphicon glyphicon-star star-color"></span>
                <span class="glyphicon glyphicon-star star-color"></span>
                <span class="glyphicon glyphicon-star star-color"></span>
                <span class="glyphicon glyphicon-star star-color half" ></span>
              </span>
              <span class="view-stats">981 views</span>
            </ul>

            <h3 id="total_price" style="display:inline"> CAD$: <?php echo $shoe->getPrice() ?> </h3>
            <hr>
            <p>Quantity</p>
            <form class="form-inline">
            <div class="input-group">
              <div class="input-group-btn">
                <button type="button" class="btn button-gry" onclick="add_one()">
                  <span class="glyphicon">&#x2b;</span>
                </button>
              </div>
              <input type="text" class="form-control" size="10" placeholder="1" id="quantity" required>
              <div class="input-group-btn">
                <button type="button" class="btn button-gry" onclick="minus_one()">
                  <span class="glyphicon">&#x2212;</span>
                </button>
              </div>
            </div>
            </form> <br>
            <p>Size</p>
            <div class="checkbox">
            <span class="choice-details">
                <label class="checkbox-inline">
                  <input type="checkbox" value="" checked>Small
                </label>
                <label class="checkbox-inline">
                  <input type="checkbox" value="">Media
                </label>
                <label class="checkbox-inline">
                <input type="checkbox" value="" >Large
              </label>
              </span>
            </div>
            <a href="#" class="btn btn-primary" role="button">Buy Now</a>
            <a href="#" class="btn btn-info btn-danger" role="button">
            <span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart</a>
            <hr>
            <h6> <b> Free Shipping on orders CAD $195+. <br>
              Free Returns. </b></h6>
        </div>
      </div>
    </div> 
  </div>
  <hr>

<!--footer2-->
<?php include_once "./partial/footer.php"; ?>

</body>
</html>