let searchForm = document.querySelector('.search-form');

document.querySelector('#search-btn'). onclick = () =>{
    searchForm.classList.toggle('active');
   
    //se omitió el código del carrito
    navbar.classList.remove('active');
    loginForm.classList.remove('active');
}

//se omitió el código del carrito

let loginForm = document.querySelector('.login-form');

document.querySelector('#login-btn'). onclick = () =>{
    loginForm.classList.toggle('active');
    searchForm.classList.remove('active');
    //se omitió el código del carrito
    navbar.classList.remove('active');
}

let navbar = document.querySelector('.navbar');
document.querySelector('#menu-btn'). onclick = () =>{
    navbar.classList.toggle('active');
    searchForm.classList.remove('active');
    //se omitió el código del carrito
    loginForm.classList.remove('active');
}

window.onscroll = () =>{
    searchForm.classList.remove('active');
    //se omitió el código del carrito
    navbar.classList.remove('active');
    loginForm.classList.remove('active');
}


var swiper = new Swiper(".productos-slider", {
    loop:true,
    spaceBetween: 20,
    autoplay:{
        delay:7500,
        disableOnInteraction:false,
    },
    breakpoints: {
      0: {
        slidesPerView: 1,
      },
      768: {
        slidesPerView: 2,
      },
      1020: {
        slidesPerView: 3,
      },
    },
  });


  var swiper = new Swiper(".review-slider", {
    loop:true,
    spaceBetween: 20,
    autoplay:{
        delay:7500,
        disableOnInteraction:false,
    },
    breakpoints: {
      0: {
        slidesPerView: 1,
      },
      768: {
        slidesPerView: 2,
      },
      1020: {
        slidesPerView: 3,
      },
    },
  });