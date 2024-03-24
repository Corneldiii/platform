document.addEventListener("DOMContentLoaded", function() {
    window.addEventListener("scroll", function() {
      var animasicard = document.querySelectorAll('.card');
      for (var i = 0; i < animasicard.length; i++) {
        var imagePos = animasicard[i].getBoundingClientRect().top;
        var windowHeight = window.innerHeight;
        if (imagePos < windowHeight - 100) {
          animasicard[i].classList.add('animated');
        }
      }
    });
  });
  