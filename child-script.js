function query(text){return document.querySelector(text);}
function create_div(html){var div=document.createElement('div');div.innerHTML=html;return div;}
function loaded(funct){document.addEventListener("DOMContentLoaded",funct);}

loaded(init);
function init(){
    query("footer").remove();
    query("#content-vw").prepend(create_div(html_breadcrumb));
}
