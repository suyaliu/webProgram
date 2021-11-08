//Define class constructor and methods
class Product {
    constructor(image, model, price, stock, color, rating, category, href){
        this.image = image;
        this.model = model;
        this.price= price;
        this.color = color;
        this.rating = rating;
        this.stock = stock;
        this.category = category;
        this.href = href;
    }

    showProductThumnail(){
      // create div
      var div_thumnail = document.createElement('div');
      div_thumnail.className = "thumbnail";

      // div element - image
      var img_container = document.createElement('a');
      var img = document.createElement('img');
      img.src = this.image;
      img.width = 400;
      img.height = 300;
      img.alt = "Paris";
      img_container.href = this.href;
      img_container.appendChild(img);

      // div element - product model & info
      var product_model = document.createElement('a');
      var product_info = document.createElement('a');
      product_model.innerHTML = this.model + '<br>';
      product_info.innerHTML = 'CAD$ ' + this.price + ' | ' + this.stock + ' in stock | ' + this.color + "<br>";
      
      var h4 = document.createElement('h4');
      h4.append(product_model);

      // rating stars
      var rating = document.createElement('a');
      //rating.className = "rating";
      var i;
      var star = [];
      for (i=0; i <= 4; i++){
        star[i] = document.createElement('span');
        if (i <= this.rating-1){
          star[i].className = "glyphicon glyphicon-star";
        }
        else {
          star[i].className = "glyphicon glyphicon-star-empty";
        }
        star[i].style = "color:orange";
        rating.append(star[i]);
      }

      // add elements to div
      div_thumnail.append(img_container);
      div_thumnail.append(h4);
      div_thumnail.append(product_info);
      div_thumnail.append(rating);

      return div_thumnail;
    }

  }
  
// product data in an array
const product_data = [
  {
      image: "image/FLUFF_YEAR_SLIDE_125.jpg", 
      model: "FLUFF YEAR SLIDE",
      price: 15, 
      stock: 10,
      color: "red", 
      rating: 5,
      category: "lady",
      href: 'product.html'
  },
  {
      image: "image/oh year-125-10.jpg", 
      model: "OH YEAR",
      price: 86, 
      stock: 8,
      color: "pick", 
      rating: 4,
      category: "lady",
      href: 'product.html'
  },
  {
      image: "image/adirondack III -295-2.webp", 
      model: "CALI COLLAGE",
      price: 231, 
      stock: 10,
      color: "black", 
      rating: 3,
      category: "lady",
      href: 'product.html'
    },
  {
      image: "image/men-BLacK_butte.webp", 
      model: "BLacK_butte",
      price: 180, 
      stock: 3,
      color: "black", 
      rating: 2,
      category: "men",
      href: 'product.html'
    },
    {
      image: "image/men-brown-union-CHElsea_2.webp", 
      model: "chelsea",
      price: 725, 
      stock: 3,
      color: "black", 
      rating: 2,
      category: "men",
      href: 'product.html'
    },
    {
      image: "image/men-brown_190.webp", 
      model: "Classic",
      price: 190, 
      stock: 3,
      color: "brown", 
      rating: 2,
      category: "men",
      href: 'product.html'
    },
  {
      image: "image/kids-brown-classic II.webp", 
      model: "classic II",
      price: 25, 
      stock: 10,
      color: "brown", 
      rating: 1,
      category: "kid",
      href: 'product.html'
  },
  {
      image: "image/kids-blue-Gradient.jpg", 
      model: "Gradient",
      price: 85, 
      stock: 10,
      color: "blue", 
      rating: 5, 
      category: "kid",
      href: 'product.html'

    },
  {
    image: "image/kids_fluff_rainbow.webp", 
    model: "fluff_rainbow",
    price: 65, 
    stock: 10,
    color: "red", 
    rating: 5, 
    category: "kid",
    href: 'product.html'
  }
];

// show product in a loop
function showProduct(products){
  var product_list = document.querySelector("#product_list");
  product_list.innerHTML='';
  var grid = document.createElement('div');
  grid.className = "row text-center";

  for(let p of products){
    var col = document.createElement('div');
    col.className = "col-sm-4";
    col.append(p.showProductThumnail());
    grid.append(col);
  }
  product_list.appendChild(grid);

  // Show a message that no product found if products.length=0
  if (products.length == 0){
    var no_found_warning = document.createElement('h2');
    no_found_warning.innerHTML = '<br><br>  No product found! <br><br><br>'
    //no_found_warning.style.color = 'red';
    product_list.appendChild(no_found_warning);
  }
}


// Put all products  in an array
var myProductArray = [];
for(let p of product_data){
  var tmp_p = new Product(p.image, p.model, p.price, p.stock, p.color, p.rating, p.category, p.href);
  myProductArray.push(tmp_p);
}

var search_result = [];

// show all products in the search result
function showSearchResult(){
  search_keyword = localStorage.getItem('search_text');
  if (search_keyword.length > 0) {
      search_result = myProductArray.filter(function(item){
      return item.category.includes(search_keyword);
      });
    showProduct(search_result);
  }
  else{
    showProduct(myProductArray);
  }
}

// search the array for matching product
function search_button_click2(){
  var search_keyword = document.querySelector('#search_text2');
  localStorage.setItem('search_text', search_keyword.value);
  console.log(localStorage.getItem('search_text'));
  showSearchResult();
}

// sort by price
var sort_button = document.querySelector('#sort_by_price');
sort_button.onclick = function(){
  if (sort_button.value == 1){
      myProductArray.sort((a, b) => (a.price - b.price));
      search_result.sort((a, b) => (a.price - b.price));
  }
  if (sort_button.value == 2){
      myProductArray.sort((a, b) => (b.price - a.price));
      search_result.sort((a, b) => (b.price - a.price));
  }
  showSearchResult();
};


// filter by price
// < 25
var price_filter = document.querySelectorAll(".form-check-input")

// show the filter corresponding product
var filter_result = [];
price_filter[0].onclick = function(){
  if (search_result.length > 0){
    filter_result = search_result.filter(function(item){return item.price < 25;});
  }
  else{
    filter_result = myProductArray.filter(function(item){return item.price < 25;});
  }
  showProduct(filter_result);
};
// 25 - 50
price_filter[1].onclick = function(){
  if (search_result.length > 0){
    filter_result = search_result.filter(function(item){return item.price >= 25 && item.price < 50;});
  }
  else{
    filter_result = myProductArray.filter(function(item){return item.price >= 25 && item.price < 50;});
  }
  showProduct(filter_result);
};
price_filter[2].onclick = function(){
  if (search_result.length > 0){
    filter_result = search_result.filter(function(item){return item.price >= 50 && item.price < 100;});
  }
  else{
    filter_result = myProductArray.filter(function(item){return item.price >= 50 && item.price < 100;});
  }
  showProduct(filter_result);
};
price_filter[3].onclick = function(){
  if (search_result.length > 0){
    filter_result = search_result.filter(function(item){return item.price >= 100 && item.price < 200;});
  }
  else{
    filter_result = myProductArray.filter(function(item){return item.price >= 100 && item.price < 200;});
  }
    showProduct(filter_result);
  };
price_filter[4].onclick = function(){
  if (search_result.length > 0){
    filter_result = search_result.filter(function(item){return item.price >= 200;});
  }
  else{
    filter_result = myProductArray.filter(function(item){return item.price >= 200;});
  }
    showProduct(filter_result);
  };

// when loading the page, if searched from the landing page, load the results
showSearchResult()

  

  
  