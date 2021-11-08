<?php
//referance lecture teacher week13 example
	class Product{		

		private $product_id;
		private $image;
		private $model;
		private $stock;
		private $color;
		private $rating;
		private $category;
		private $price;
		
		function __construct($product_id, $image, $model, $stock, $color, $rating, $category, $price){
			$this->setProduct_id($product_id);
			$this->setImage($image);
			$this->setModel($model);
			$this->setStock($stock);
			$this->setColor($color);
			$this->setRating($rating);
			$this->setCategory($category);			
			$this->setPrice($price);
			}		

		public function getProduct_id(){
			return $this->product_id;
		}
		
		public function setProduct_id($product_id){
			$this->product_id = $product_id;
		}
		
		public function getImage(){
			return $this->image;
		}
		
		public function setImage($image){
			$this->image = $image;
		}

		public function getModel(){
			return $this->model;
		}

		public function setModel($model){
			$this->model = $model;
		}

		public function getStock(){
			return $this->stock;
		}

		public function setStock($stock){
			$this->stock = $stock;
		}

		public function getColor(){
			return $this->color;
		}

		public function setColor($color){
			$this->color = $color;
		}

		public function getRating(){
			return $this->rating;
		}

		public function setRating($rating){
			$this->rating = $rating;
		}

		
		public function getCategory(){
			return $this->category;
		}

		public function setCategory($category){
			$this->category = $category;
		}

		public function getPrice(){
			return $this->price;
		}

		public function setPrice($price){
			$this->price = $price;
		}
	}
?>