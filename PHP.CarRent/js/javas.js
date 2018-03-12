$(document).ready(function () {
     $(".current").removeProp('hover');
    // stickyNav
    $(window).scroll(function() {
        var y = $(window).scrollTop();

        if( y < 550){
                 $(".logo").css({
           "background": "url('images/slide_1_lt_5.jpg') no-repeat"
            });
             $("#nav a").css({
                "color":"white"
            });
            $("#nav").css({
                "background":"none",

            });
             $("nav ul li a.current").css({

                 "border-bottom":"2px solid white",
                 "cursor": "default"
            });

        }
       else if (y > 550 && y < 1600) {
            $("#nav").css({
                "background":"white",
                "color":"black"
            });
             $("#nav a").css({
                "color":"black",
                 "text-decoration-line":"underline"
            });
             $("nav ul li a.current").css({

                 "border-bottom":"2px solid black",
                 "cursor": "default"
            });
            $(".logo").css({
                "background": "url('images/slide_3_lt_5.jpg') no-repeat",
                "height": "800px"
            });
                document.getElementById().innerHTML="Recipes";

        }
        else if(y > 1600){
                 $("#nav").css({
                "background":"white",
                "color":"black"
            });
             $("#nav a").css({
                "color":"black",
                 "text-decoration-line":"underline"
            });
             $("nav ul li a.current").css({

                 "border-bottom":"2px solid black",
                 "cursor": "default"
            });
            $(".logo").css({
                "background": "url('D:/OpenServer/domains/localhost/3/images/qwe.jpg') no-repeat",
                "height": "800px"
            });

        }
    });
});
