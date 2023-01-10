//SHOW HIDDEN DROPDOWN
var dropdown = document.getElementsByClassName("dropdown-btn-side");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active-side");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";
  } else {
  dropdownContent.style.display = "block";
  }
  });
}


//MATCH HEIGHT
$(document).ready(function () {
  $('.adventure-name').matchHeight();
})
$(document).ready(function () {
  $('.blog-title').matchHeight();
})
$(document).ready(function () {
  $('.item-box p').matchHeight();
})

//ADD BG TO NAVBAR
$(window).scroll(function () {
  if ($(this).scrollTop() > 12) {
    $(".main-navbar").addClass("whitebg");
  } else {
    $(".main-navbar").removeClass("whitebg");
  }
});

//IMAGE SIZE
document.addEventListener("scroll", function () {
  scrollHeight = window.pageYOffset;
  document.getElementsByClassName("navlogo")[0].style.width = scrollHeight >= 120 ? "60px" : "";
}, false);

//TOP CAROUSEL
$('.owl-carousel.top-owl').owlCarousel({
  loop: true,
  margin: 10,
  nav: true,
  autoplay: true,
  responsive: {
    0: {
      items: 1
    },
    600: {
      items: 1
    },
    1000: {
      items: 1
    }
  }
})

// SIDE NAV
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}


// FIXED NAVBAR
$(window).scroll(function () {
  if ($(this).scrollTop() > 120) {
    $(".header-wrapper").addClass("fixed");
  } else {
    $(".header-wrapper").removeClass("fixed");
  }
});

// ScrollToTop
mybutton = document.getElementById("myBtn");
window.onscroll = function () {
  scrollFunction();
};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}

//TRUSTED BY
$('.owl-carousel.trusted-by').owlCarousel({
  loop: true,
  margin: 10,
  nav: false,
  dots: false,
  autoplay: true,
  responsive: {
    0: {
      items: 2
    },
    600: {
      items: 4
    },
    1000: {
      items: 4
    }
  }
})

//BREADCRUMB
$('.owl-carousel.next-owl').owlCarousel({
  loop: true,
  margin: 10,
  nav: true,
  autoplay: true,
  touchDrag: false,
  mouseDrag: false,
  responsive: {
    0: {
      items: 1
    },
    600: {
      items: 1
    },
    1000: {
      items: 1
    }
  }
})



$(document).ready(function(){
  $(".search-button").click(function(){
    $(".search-overlay").show("slow");
  });
});

// Hide SubMenus.
$(".subMenu").hide();

// Shows SubMenu when it's parent is hovered.
$(".subMenu").parent("li").hover(function () {
  $(this).find(">.subMenu").not(':animated').slideDown(300);
  $(this).toggleClass("active ");
});

// Hides SubMenu when mouse leaves the zone.
$(".subMenu").parent("li").mouseleave(function () {
  $(this).find(">.subMenu").slideUp(150);
});

// Prevents scroll to top when clicking on <a href="#"> 
$("a[href=\"#\"]").click(function () {
  return false;
});

// ITINEARY IMAGES
$(document).ready(function ($) {
  $(".package-img .owl-carousel").owlCarousel({
    loop: true,
    margin: 10,
    nav: true,
    autoplay: true,
    responsive: {
      0: {
        items: 1,
      },
      600: {
        items: 2,
      },
      1000: {
        items: 1,
      },
    },
  });
});
