let themeloader = document.querySelector('.theme-loader');
"use strict";


document.addEventListener('DOMContentLoaded',()=>{
    themeloader.animate({
        'opacity': '0',
    }, 1200);
    setTimeout(function() {
        themeloader.remove();
    }, 1200)
    

});