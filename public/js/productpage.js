$(document).ready(function () {
    $(document).on("mouseenter",".tb",function () {
        $(".tb").removeClass("tb-active");
        $(this).addClass("tb-active");

        current_fs = $(".active");

        next_fs = $(this).attr("id");
        next_fs = "#" + next_fs + "1";

        $("fieldset").removeClass("active");
        $(next_fs).addClass("active");

        current_fs.animate({}, {
          step: function () {
            current_fs.css({
              display: "none",
              position: "relative",
            });
            next_fs.css({
              display: "block",
            });
          },
        });
      });
  });

$("#recipeCarousel").carousel({
  interval: 999999999,
});

$(".carousel .carousel-item").each(function () {
  var minPerSlide = 6;
  var next = $(this).next();
  if (!next.length) {
    next = $(this).siblings(":first");
  }
  next.children(":first-child").clone().appendTo($(this));

  for (var i = 0; i < minPerSlide; i++) {
    next = next.next();
    if (!next.length) {
      next = $(this).siblings(":first");
    }

    next.children(":first-child").clone().appendTo($(this));
  }
});

$(".navbar-toggler").click(function () {
  $(".mobile_nav").addClass("show");
});

$("#main").click(function () {
  $(".mobile_nav").removeClass("show");
});
