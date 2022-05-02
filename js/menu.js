$('.btn').click(function(){
    $(this).toggleClass("click");
    $('.sidebar').toggleClass("show");
});
    $('.menu1-btn').click(function(){
    $('nav ul .menu1-show').toggleClass("show");
    $('nav ul .uno').toggleClass("fa-minus-circle");
    });
    $('.menu2-btn').click(function(){
    $('nav ul .menu2-show').toggleClass("show1");
    $('nav ul .dos').toggleClass("fa-minus-circle");
    });
    $('.menu3-btn').click(function(){
    $('nav ul .menu3-show').toggleClass("show2");
    $('nav ul .tres').toggleClass("fa-minus-circle");
    });
    $('nav ul li').click(function(){
    $(this).addClass("active").siblings().removeClass("active");
    });