const logo = document.querySelector('.homeLogo');
const homeBooking = document.querySelector('.homeBooking')
let height = logo.clientHeight/2;

const icon = document.querySelector('.arrow');
const background = document.querySelector('.homeBackground');
let heightBackground = background.clientHeight*0.8;
const nav = document.querySelector('.nav');

window.addEventListener("scroll", () => {
    if(window.scrollY > height) {
        logo.classList.add('scrollRemove')
    }
    else {
        logo.classList.remove('scrollRemove')
    }
})

window.addEventListener("scroll", () =>{
    if (window.scrollY > height){
        homeBooking.classList.add('scrollRemove')
    }
    else{
        homeBooking.classList.remove('scrollRemove')
    }
})

window.addEventListener("scroll", () =>{
    if (window.scrollY > heightBackground){
        icon.classList.add('removeIcon')
    }
    else{
        icon.classList.remove('removeIcon')
    }
})

window.addEventListener("scroll", () =>{
    if (window.scrollY > heightBackground){
        nav.classList.add('addNav')
    }
    else{
        nav.classList.remove('addNav')
    }
})




