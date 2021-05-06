$('.active-preloader').click(function () {
    var vclass = $(this).attr('data-preloader-container');
    $("#"+vclass).html("<div class=\"preloader text-center py-5 w-100\" id=\"preloader\">\n" +
        "    <img src=\"/assets/loader/preloader_x128.gif\"  class=\"w-10\" alt=\"no saved products were added\" >\n" +

        "</div>");
})