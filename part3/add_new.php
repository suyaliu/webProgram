

<?php
// referance : lecture teacher w13 example and lab8 example
  if (isset($_POST['upload'])) {
  	$input_image = $_FILES['image']['name'];
  	$target = "image/" . basename($input_image);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
  }
?>
<?php
// Include productDAO file
require_once('./dao/productDAO.php');

// Define variables and initialize with empty values
$product_id = $image = $model = $stock = $color = $rating = $category = $price = "";
$id_err = $image_err = $model_err = $stock_err = $color_err = $rating_err = $category_err = $price_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate Product ID
    $input_id = trim($_POST["product_id"]);
    if(empty($input_id)){
        $id_err = "Please enter an ID.";
    } else{
        $product_id = $input_id;
    }
    
    // Validate Image address
    //$input_image = trim($_POST["image"]);
    if(empty($input_image)){
        $image_err = "Please select an image.";     
    } else{
        $image = "image/" .  $input_image;
    }
    
    // Validate product model
    $input_model = trim($_POST["model"]);
    if(empty($input_model)){
        $model_err = "Please enter the product model";
    } else{
        $model = $input_model;
    }
    
   // Validate product stock status
   $input_stock = trim($_POST["stock"]);
   if(empty($input_stock)){
       $stock_err = "Please enter the the number of product currently in stock";
   }elseif(!ctype_digit($input_stock)){
        $stock_err = "Please enter a positive integer value.";
   } else{
       $stock = $input_stock;
   }

   // Validate product color
   $input_color = trim($_POST["color"]);
   if(empty($input_color)){
       $color_err = "Please enter the color of the product";
   } else{
       $color = $input_color;
   }
   
    // Validate product rating
    $input_rating = trim($_POST["rating"]);
    if(empty($input_rating)){
        $rating_err = "Please enter the rating of the product";
    }elseif(!ctype_digit($input_rating)){
        $rating_err = "Please enter a positive integer value.";
    } else{
        $rating = $input_rating;
    }
      
   // Validate product category
   $input_category = trim($_POST["category"]);
   if(empty($input_category)){
       $category_err = "Please enter the product category";
   } else{
       $category = $input_category;
   }

   // Validate product model
   $input_price= trim($_POST["price"]);
   if(empty($input_price)){
       $price_err = "Please enter the product model";
   } else{
       $price = $input_price;
   }  
    // Check input errors before inserting in database
    if(empty($id_err) && empty($image_err) && empty($model_err) && empty($stock_err) && empty($color_err)  && empty($rating_err)  && empty($category_err)  && empty($price_err)){
        $shoeDAO = new productDAO();    
        $shoe = new Product($product_id, $image, $model, $stock, $color, $rating, $category, $price);
        $add_product = $shoeDAO->addProduct($shoe);
        header( "refresh:2; url=catalogue.php" ); 
        // Close connection
        $shoeDAO->getMysqli()->close();
    }
}
?>

<!--header-->
<?php include_once "./partial/header.php"; ?>

<body>
<style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-9">
                <h2 class="mt-5">Add a new product to the database</h2>
                <p>Please fill this form and submit to add a new produe to the database.</p>

                        <form action="add_new.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Product_ID</label>
                                <input type="text" name="product_id" class="form-control <?php echo (!empty($id_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $product_id; ?>">
                                <span class="invalid-feedback"><?php echo $id_err;?></span>
                            </div>

                            <div class="form-group">
                                <label>Product image</label>
                                <input type="file" class="form-control-file" name="image">

                            </div>

                            <div class="form-group">
                                <label>Product model</label>
                                <input type="text" name="model" class="form-control <?php echo (!empty($model_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $model; ?>">
                                <span class="invalid-feedback"><?php echo $model_err;?></span>
                            </div>

                            <div class="form-group">
                                <label>Stock</label>
                                <input type="text" name="stock" class="form-control <?php echo (!empty($stock_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $stock; ?>">
                                <span class="invalid-feedback"><?php echo $stock_err;?></span>
                            </div>

                            <div class="form-group">
                                <label>Color</label>
                                <input type="text" name="color" class="form-control <?php echo (!empty($color_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $color; ?>">
                                <span class="invalid-feedback"><?php echo $color_err;?></span>
                            </div>

                            <div class="form-group">
                                <label>Rating</label>
                                <input type="text" name="rating" class="form-control <?php echo (!empty($rating_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $rating; ?>">
                                <span class="invalid-feedback"><?php echo $rating_err;?></span>
                            </div>

                            <div class="form-group">
                                <label>Category</label>
                                <input type="text" name="category" class="form-control <?php echo (!empty($category_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $category; ?>">
                                <span class="invalid-feedback"><?php echo $category_err;?></span>
                            </div>

                            <div class="form-group">
                                <label>Price</label>
                                <input type="text" name="price" class="form-control <?php echo (!empty($price_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $price; ?>">
                                <span class="invalid-feedback"><?php echo $price_err;?></span>
                            </div>

                            <input type="submit" class="btn btn-primary" value="Submit" name="upload">
                            <a href="catalogue.php" class="btn btn-secondary ml-2">Cancel</a>

                        </form>
            </div>
        </div>        
    </div>
</div>


<!--footer2-->
<?php include_once "./partial/footer.php"; ?>

  </body>
</html>