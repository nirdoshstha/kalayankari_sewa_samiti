// on document ready
$(document).ready(function () {
  // Show/hide the mobile menu based on class added to container
  $(".menu-icon").click(function () {
    $(this).parent().toggleClass("is-tapped");
    $("#hamburger").toggleClass("open");
  });

  // Handle touch device events on dropdown: first tap adds class, second navigates
  $(".touch .sitenavigation li.nav-dropdown > a").on("touchend", function (e) {
    e.preventDefault(); // Prevent default action to manage touch interactions properly

    if ($(".menu-icon").is(":hidden")) {
      var $parent = $(this).parent();
      $(this).removeClass("linkclicked");

      if ($parent.hasClass("clicked")) {
        window.location.href = $(this).attr("href");
      } else {
        // Close other open menus at this level
        $parent.siblings().find(".clicked").removeClass("clicked");

        // Add class to the current menu
        $(this).addClass("linkclicked");
        $parent.addClass("clicked");
      }
    }
  });

  // Handle the expansion of mobile menu dropdown nesting
  $(".sitenavigation li.nav-dropdown").click(function (event) {
    event.stopPropagation();

    if ($(".menu-icon").is(":visible")) {
      var $currentMenu = $(this);

      // Close all other menus at this level
      $currentMenu.siblings().removeClass("expanded").find("> ul").hide();

      // Toggle the current menu
      $currentMenu.toggleClass("expanded");
      $currentMenu.find("> ul").toggle();
    }
  });

  // Prevent links from propagating click/tap events that may trigger hiding/unhiding
  $(".sitenavigation a.nav-dropdown, .sitenavigation li.nav-dropdown a").click(
    function (event) {
      event.stopPropagation();
    }
  );

  // JavaScript fade in and out of dropdown menu
  $(".no-touch .sitenavigation li").hover(
    function () {
      if (!$(".menu-icon").is(":visible")) {
        $(this).find("> ul").stop(true, true).fadeIn(100); // Ensure animation queue is cleared
      }
    },
    function () {
      if (!$(".menu-icon").is(":visible")) {
        $(this).find("> ul").stop(true, true).fadeOut(100); // Ensure animation queue is cleared
      }
    }
  );
});

// const header = document.querySelector(".navbar");
// // Set the initial scroll position
// let lastScrollPosition = 0;
// // // Add an event listener for the scroll event
// window.addEventListener("scroll", () => {
//   // Get the current scroll position
//   let currentScrollPosition = window.pageYOffset;

//   if (currentScrollPosition - lastScrollPosition > 0) {
//     // If the scroll direction is down and the user has scrolled past the navbar, hide the navbar
//     header.classList.add("hide");
//   } else {
//      // If the scroll direction is up or the user is at the top of the page, show the navbar
//     header.classList.remove("hide");
//   }
//   // Set the last scroll position to the current scroll position
//   lastScrollPosition = currentScrollPosition;
// });

const myNav = document.querySelector(".navbar");

window.addEventListener("scroll", function () {
  // Check if #nav-bar has the 'Psticky' class
  const isPsticky = document
    .querySelector("#nav-bar")
    .classList.contains("Psticky");

  // Only run the scroll logic if the 'Psticky' class is not present
  if (!isPsticky) {
    if (window.scrollY > window.innerHeight) {
      myNav.classList.add("scrolled");
    } else {
      myNav.classList.remove("scrolled");
    }
  }
});

//counter js Start
let mCount = function (selector) {
  $(selector).each(function () {
    $(this).animate(
      {
        Counter: $(this).text(),
      },
      {
        duration: 5000,
        easing: "swing",
        step: function (value) {
          $(this).text(Math.ceil(value));
        },
      }
    );
  });
};
let b = 0;
$(window).scroll(function () {
  let oTop = $(".numbers").offset().top - window.innerHeight;
  if (b == 0 && $(window).scrollTop() >= oTop) {
    b++;
    mCount(".bottom__number-holder > h1 > span");
  }
});
//counter js end
