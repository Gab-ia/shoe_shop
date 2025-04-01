let link = document.querySelectorAll('.lien');
let menu = document.getElementById("menu");

function afficheMenu(){

link.addEventListener ("click", () => {

if (getComputedStyle(menu).visibility != "hidden"){

menu.style.visibility = "hidden";



} else {


    menu.style.visibility = "visible";



}


  



});




}