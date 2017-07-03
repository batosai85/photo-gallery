"use strict";
$(() => {
    if ($(".upload-photo").text() === "Photo uploaded") {
        setTimeout(() => {
            window.location.href = "photos";
        }, 1500);
    }
    if ($(".photo-edited").text() === "Photo details update") {
        setTimeout(() => {
            window.location.href = "photos";
        }, 1500);
    }

    if ($(".user-edited").text() === "User edited, logging out ...") {
        setTimeout(() => {
            window.location.href = "http://localhost/php/gallery/logout";
        }, 1500);
    }
    let $height = $(".photo-front").height();
    $(".comments").css({
        height: $height + "px"
    });
    $(".btn-comments").on("click", (e) => {
        $(".comment-div").removeClass("hide");
        $(".comment-div").addClass("show");
    });
    $(".submit-comment").on("click", (e) => {
        let $content = $(".content").val();
        if ($content) {
            $(".message").text("").animate({opacity : "0"},500) ;
            $(".comment-div").addClass("hide");
            setTimeout(() => {
                $(".comment-div").removeClass("show");
            }, 600);
        }else{
            $(".message").text("Empty comment field is not allowed").animate({opacity : "1"},500) ;;
            return false;
        }  
    });
    $(".cancel-comment").on("click", (e) => {
        e.preventDefault();
        $(".message").text("").animate({opacity : "0"},500) ;
        $(".comment-div").addClass("hide");
        setTimeout(() => {
            $(".comment-div").removeClass("show");
        }, 600);
    });
    window.onscroll = function(){
        if(document.documentElement.scrollTop >= 200 || document.body.scrollTop >= 200){
            $(".scroll-up").stop().animate({right:"50px"},50);
        }else{
            $(".scroll-up").stop().animate({right:"-100px"},50);
        }
        $(".scroll-up").on("click", () => {
            $("html, body").stop().animate({ scrollTop: "0"},500);
    });
    }
    if(document.documentElement.scrollTop >= 200 || document.body.scrollTop >= 200){
        $(".scroll-up").stop().animate({right:"50px"},50);
    }else{
        $(".scroll-up").stop().animate({right:"-100px"},50);
    }
    $(".scroll-up").on("click", () => {
        $("html, body").stop().animate({ scrollTop: "0"},500);
    });
});