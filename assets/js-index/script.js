
// *******************************************************************************************/

//Obtenir le bouton
var mybutton = document.getElementById("dirigeantBtnTop");

// *Lorsque l'utilisateur fait défiler vers le bas 
//20 pixels à partir du haut du document, affichez le bouton
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// Lorsque l'utilisateur clique sur le bouton, 
//faites défiler vers le haut du document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}




var swiper = new Swiper(".dirigeants-slider", {
  spaceBetween: 20,
  loop:true,
  autoplay: {
      delay: 2500,
      disableOnInteraction: false,
  },
  breakpoints: {
      640: {
        slidesPerView: 1,
      },
      768: {
        slidesPerView: 2,
      },
      1024: {
        slidesPerView: 3,
      },
  },
});

var swiper = new Swiper(".logo-slider", {
  spaceBetween: 20,
  loop:true,
  autoplay: {
      delay: 2500,
      disableOnInteraction: false,
  },
  breakpoints: {
      450: {
        slidesPerView: 2,
      },
      768: {
        slidesPerView: 3,
      },
      991: {
        slidesPerView: 4,
      },
      1200: {
        slidesPerView: 5,
      },
    },
});











// (() =>{

//   const openNavMenu = document.querySelector(".open-nav-menu"),
//   closeNavMenu = document.querySelector(".close-nav-menu"),
//   navMenu = document.querySelector(".nav-menu"),
//   menuOverlay = document.querySelector(".menu-overlay"),
//   mediaSize = 991;

//   openNavMenu.addEventListener("click", toggleNav);
//   closeNavMenu.addEventListener("click", toggleNav);
//   // close the navMenu by clicking outside
//   menuOverlay.addEventListener("click", toggleNav);

//   function toggleNav() {
//   	navMenu.classList.toggle("open");
//   	menuOverlay.classList.toggle("active");
//   	document.body.classList.toggle("hidden-scrolling");
//   }

//   navMenu.addEventListener("click", (event) =>{
//       if(event.target.hasAttribute("data-toggle") && 
//       	window.innerWidth <= mediaSize){
//       	// prevent default anchor click behavior
//       	event.preventDefault();
//       	const menuItemHasChildren = event.target.parentElement;
//         // if menuItemHasChildren is already expanded, collapse it
//         if(menuItemHasChildren.classList.contains("active")){
//         	collapseSubMenu();
//         }
//         else{
//           // collapse existing expanded menuItemHasChildren
//           if(navMenu.querySelector(".menu-item-has-children.active")){
//         	collapseSubMenu();
//           }
//           // expand new menuItemHasChildren
//           menuItemHasChildren.classList.add("active");
//           const subMenu = menuItemHasChildren.querySelector(".sub-menu");
//           subMenu.style.maxHeight = subMenu.scrollHeight + "px";
//         }
//       }
//   });
//   function collapseSubMenu(){
//   	navMenu.querySelector(".menu-item-has-children.active .sub-menu")
//   	.removeAttribute("style");
//   	navMenu.querySelector(".menu-item-has-children.active")
//   	.classList.remove("active");
//   }
//   function resizeFix(){
//   	 // if navMenu is open ,close it
//   	 if(navMenu.classList.contains("open")){
//   	 	toggleNav();
//   	 }
//   	 // if menuItemHasChildren is expanded , collapse it
//   	 if(navMenu.querySelector(".menu-item-has-children.active")){
//         	collapseSubMenu();
//      }
//   }

//   window.addEventListener("resize", function(){
//      if(this.innerWidth > mediaSize){
//      	resizeFix();
//      }
//   });

// })();

