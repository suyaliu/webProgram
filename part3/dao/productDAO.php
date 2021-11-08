<?php
require_once('abstractDAO.php');
require_once('./model/product.php');
/**referance lecture teacher w13 example */
class productDAO extends abstractDAO {
        
    function __construct() {
        try{
            parent::__construct();
        } catch(mysqli_sql_exception $e){
            throw $e;
        }
    } 

    public function getProduct($product_id){
        $result = $this->mysqli->query("SELECT * FROM catalogue WHERE product_id =".$product_id);
        if($result->num_rows == 1){
            $row = $result->fetch_assoc();
            $product = new Product($row['product_id'],$row['image'], $row['model'], $row['stock'], $row['color'], $row['rating'], $row['category'], $row['price']);
            $result->free();
            return $product;
        }
        $result->free();
        return false;
    }

    public function getProducts($search_term){
        if (strlen($search_term) == 0){
            $result = $this->mysqli->query("SELECT * FROM catalogue");
        }
        else{
            $result = $this->mysqli->query("SELECT * FROM catalogue WHERE category LIKE '%{$search_term}%'");
        }
        
        $products = Array();
        
        if($result->num_rows >= 1){
            while($row = $result->fetch_assoc()){
                //Create a new product object, and add it to the array.
                $product = new Product($row['product_id'],$row['image'], $row['model'], $row['stock'], $row['color'], $row['rating'], $row['category'], $row['price']);
                $products[] = $product;
            }
            $result->free();
            return $products;
        }
        $result->free();
        return false;
    }   
    
    public function addProduct($product){
        
        if(!$this->mysqli->connect_errno){
            //The query uses the question mark (?) as a
            //placeholder for the parameters to be used
            //in the query.
            //The prepare method of the mysqli object returns
            //a mysqli_stmt object. It takes a parameterized 
            //query as a parameter.
			$query = "INSERT INTO catalogue (product_id, image, model, stock, color, rating, category, price) VALUES (?,?,?,?,?,?,?,?)";
			$stmt = $this->mysqli->prepare($query);
            if($stmt){
                $product_id = $product->getProduct_id();
                $image = $product->getImage();
                $model = $product->getModel();
                $stock = $product->getStock();
                $color = $product->getColor();
                $rating = $product->getRating();
                $category = $product->getCategory();
                $price = $product->getPrice();
                
                $stmt->bind_param('issisisd', 
                    $product_id,
                    $image,
                    $model,
                    $stock,
                    $color,
                    $rating,
                    $category,
                    $price
                );    
                //Execute the statement
                $stmt->execute();         
                
                if($stmt->error){
                    return $stmt->error;
                } else {
                    return $product->getModel() . ' added successfully!';
                } 
			}
             else {
                $error = $this->mysqli->errno . ' ' . $this->mysqli->error;
                echo $error; 
                return $error;
            }
       
        }else {
            return 'Could not connect to Database.';
        }
    }   
    public function updateProduct($product){
        
        if(!$this->mysqli->connect_errno){
            //The query uses the question mark (?) as a
            //placeholder for the parameters to be used
            //in the query.
            //The prepare method of the mysqli object returns
            //a mysqli_stmt object. It takes a parameterized 
            //query as a parameter.
            $query = "UPDATE catalogue SET name=?, address=?, salary=? WHERE id=?";
            $stmt = $this->mysqli->prepare($query);
            if($stmt){
                $product_id = $product->getProduct_id();
                $image = $product->getImage();
                $model = $product->getModel();
                $stock = $product->getStock();
                $color = $product->getColor();
                $rating = $product->getRating();
                $category = $product->getCategory();
                $price = $product->getPrice();

                $stmt->bind_param('ssii', 
                    $product_id,
                    $image,
                    $model,
                    $stock,
                    $color,
                    $rating,
                    $category,
                    $price
                );

                //Execute the statement
                $stmt->execute();         
                
                if($stmt->error){
                    return $stmt->error;
                } else {
                    return $product->getModel() . ' updated successfully!';
                } 
			}
             else {
                $error = $this->mysqli->errno . ' ' . $this->mysqli->error;
                echo $error; 
                return $error;
            }
       
        }else {
            return 'Could not connect to Database.';
        }
    }   

    public function deleteProduct($product_id){
        if(!$this->mysqli->connect_errno){
            $query = 'DELETE FROM catalogue WHERE id = ?';
            $stmt = $this->mysqli->prepare($query);
            $stmt->bind_param('i', $product_id);
            $stmt->execute();
            if($stmt->error){
                return false;
            } else {
                return true;
            }
        } else {
            return false;
        }
    }
}

?>
