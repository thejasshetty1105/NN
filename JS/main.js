//preloader
var loader = document.getElementById("preloader");
setTimeout(function() {
    loader.style.display = "none";
}, 1000)

//navbar phone version and hamburger menu
function nav() {
    var span = document.querySelector(".nav-span");
    var phone = document.querySelector(".nav-phone");
    if(span.classList.contains("active")) {
        span.classList.remove("active");
        phone.classList.remove("phone");
        document.querySelector("body").style.overflow = "auto";
    } else {
        span.classList.add("active");
        phone.classList.add("phone");
        document.querySelector("body").style.overflow = "hidden";
    }
}

//navbar color change on scroll
window.addEventListener("scroll",function() {
    var nav = document.querySelector(".navbar");
    var span = document.querySelector(".nav-span");
    nav.classList.toggle("scroll", window.scrollY>0);
    span.classList.toggle("nav-scroll", window.scrollY>0);
})

//slider js
const buttons = document.querySelectorAll("[data-carousel-button]");

buttons.forEach(button => {
    button.addEventListener("click", () =>{
        const offset = button.dataset.carouselButton === "next" ? 1 : -1;
        const slides = button.closest("[data-carousel]").querySelector("[data-slides]");
        const activeSlide = slides.querySelector("[data-active]");
        
        let newIndex = [...slides.children].indexOf(activeSlide) + offset;
        if(newIndex < 0) {
            newIndex = slides.children.length - 1;
        }
        if(newIndex > slides.children.length - 1) {
            newIndex = 0;
        }
        slides.children[newIndex].dataset.active = true;
        delete activeSlide.dataset.active;
    });
});