
$("form").on("change", ".form-control", function(){
  $(this).parent(".file-upload-wrapper").attr("data-text", $(this).val().replace(/.*(\/|\\)/,''));
});

(()=>{function n(t){for(var e=t+"=",s=document.cookie.split(";"),i=0;i<s.length;i++){for(var r=s[i];r.charAt(0)===" ";)r=r.substring(1);if(r.indexOf(e)===0)return r.substring(e.length,r.length)}return""}function o(t,e,s){var i=new Date;i.setTime(i.getTime()+s*24*60*60*1e3);var r="expires="+i.toUTCString();document.cookie=t+"="+e+";"+r+";path=/"}if(!n("sitevisitor")){let t=new Object,e=new Date;t.referer=document.referrer,t.request=location.pathname.substring(1),t.time=e.getFullYear()+"-"+(e.getMonth()+1)+"-"+e.getDate()+" "+e.getHours()+":"+e.getMinutes()+":"+e.getSeconds(),o("sitevisitor",btoa(JSON.stringify(t)),365)}document.addEventListener("DOMContentLoaded",()=>{"use strict";document.querySelectorAll(".preview-test").forEach(e=>{e.addEventListener("click",function(s){s.preventDefault(),document.querySelector(".preview-devices-active").classList.remove("preview-devices-active"),this.classList.add("preview-devices-active"),document.querySelector("#preview-frame").className=this.id.replace("-test","")})})});})();

$(document).ready(function () {
  var mySwiper = new Swiper(".swiper", {
    autoHeight: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false
    },
    speed: 500,
    direction: "horizontal",
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev"
    },
    pagination: {
      el: ".swiper-pagination",
      type: "progressbar"
    },
    loop: false,
    effect: "slide",
    spaceBetween: 30,
    on: {
      init: function () {
        $(".swiper-pagination-custom .swiper-pagination-switch").removeClass("active");
        $(".swiper-pagination-custom .swiper-pagination-switch").eq(0).addClass("active");
      },
      slideChangeTransitionStart: function () {
        $(".swiper-pagination-custom .swiper-pagination-switch").removeClass("active");
        $(".swiper-pagination-custom .swiper-pagination-switch").eq(mySwiper.realIndex).addClass("active");
      }
    }
  });
  $(".swiper-pagination-custom .swiper-pagination-switch").click(function () {
    mySwiper.slideTo($(this).index());
    $(".swiper-pagination-custom .swiper-pagination-switch").removeClass("active");
    $(this).addClass("active");
  });
});