//set variable
var quantity = 1;
var price = 125;
//find quantitiy and total_price.
var quantity_box = document.querySelector('#quantity');
var total_amount = document.querySelector('#total_price');
//declare the function add_one
function add_one(){
  quantity += 1;
  quantity_box.value  = quantity;
  total_amount.innerText  = "CAD$ " + quantity * price;
}
//declare the function minus_one
function minus_one(){
  quantity -= 1;
  if (quantity < 1){
    quantity = 1;
  }
  quantity_box.value  = quantity;
  total_amount.innerText  = "CAD$ " + quantity * price;
}