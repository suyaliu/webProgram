<!--header-->

<?php include_once "./partial/header.php"; ?>

<body>


  <?php 
  // referance : lecture teacher w13 example 
    require_once('./dao/productDAO.php'); 
    $shoeDAO = new productDAO();
    if (isset($_POST["search_keyword"])){
      $shoes = $shoeDAO->getProducts($_POST["search_keyword"]);
    }
    else{
      $shoes = $shoeDAO->getProducts('');
    }

    if ($shoes == false){
      echo '<br><br><br><div></div>';
      echo '<h3 style="text-align:center"> No product found! Try a different search term</h3>';
    }
    else{
    echo '<div class="row text-center">';
    foreach ($shoes as $shoe) {
      echo '<div class="col-sm-4">';
       echo '<div class="thumbnail">';
         echo '<a href="shoe.php?id='. $shoe->getProduct_id(). '"><img src='. $shoe->getImage() . ' alt="Paris" width="400" height="300"><a>';
         echo '<p><strong>'. $shoe->getModel() . '</strong></p>';
         echo '<p>CAD$ '. $shoe->getPrice() . '|'. $shoe->getStock() . ' in stock | '. $shoe->getColor() . '</p>';
       echo '</div>';                          
      echo '</div>';
    }
  }
?>

<!--footer2-->
<?php include_once "./partial/footer.php"; ?>

</body>

</html>