localStorage.setItem('search_text', '');
function search_button_click(){
    var search_text = document.querySelector('#search_text');
    localStorage.setItem('search_text', search_text.value);
}