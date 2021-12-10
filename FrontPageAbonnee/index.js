//PARALAX
let scene = document.querySelector("#scene");
let parallaxInstance = new Parallax(scene);
////////HTML_ANIMATION
//NARVBAR
gsap.from(".nav_bar", { duration: 2, opacity: 0, y: 100 });
//EARTH
/*
var earth = gsap.from(".slide-img", { duration: 80, rotationY: 360 });
//EARTH_DESCRIPTION
gsap.from(".swiper-slide", { duration: 2, opacity: 0, y: 230 });
//////////
// click handlers for controlling the tween instance...
document.querySelector("#play").onclick = () => earth.play();
document.querySelector("#pause").onclick = () => earth.pause();
document.querySelector("#resume").onclick = () => earth.resume();
document.querySelector("#reserver").onclick = () => earth.reverse();
document.querySelector("#restart").onclick = () => earth.restart();



*/
///LOAD/////
setTimeout(function () {
    $('.loader_bg').fadeToggle();
}, 2500);
