const BODY = document.getElementsByTagName('body')[0];
const APP_NAVBAR = document.getElementById('mainNavbar');
const LINKS = document.querySelectorAll(".smooth-scroll");

let section = []

for(const LINK of LINKS){
    section.push({
        id: LINK.getAttribute('href'),
        offset: document.querySelector(LINK.getAttribute('href')).offsetTop,  
        active: false
    })
}

function reset(){
    return section.forEach((k, i) => {
        k.active = false
        LINKS[i].classList.remove('active')
    })
}

function setActiveLink(){

    section.forEach((k, i) => {
        if(window.scrollY > k.offset){
            reset()
            k.active = true
            if(k.active){
                if(!LINKS[i].classList.contains("active")){
                    LINKS[i].classList.add("active");
                } 
            }
        }else{
            k.active = false
        }
    })

}

function changeNavbarBg(){
    
    if(window.scrollY > 80){
        APP_NAVBAR.classList.add('navbar-scrolled');
    }else{
        APP_NAVBAR.classList.remove('navbar-scrolled');
    }

}

BODY.onscroll = function(){

    setActiveLink();

    changeNavbarBg();
    

}


for(const LINK of LINKS) {
    LINK.addEventListener('click', onClickHandler);
}

function onClickHandler(e){
    e.preventDefault();
    const DESTINATION = this.getAttribute('href');
    const OFFSET_TOP  = document.querySelector(DESTINATION).offsetTop;

    scroll({
        top: OFFSET_TOP + 10,
        behavior: "smooth"
    });

}

const NAVBAR_TOGGLER = document.getElementById('navbar-toggler');
let isNavbarActive = false;

NAVBAR_TOGGLER.addEventListener('click', navbarTogglerClick);

function navbarTogglerClick(){
    
    if(window.scrollY < 80){
        isNavbarActive = !isNavbarActive;
        if(isNavbarActive){
            document.getElementById('mainNavbar').classList.add('navbar-scrolled');
        }else{
            document.getElementById('mainNavbar').classList.remove('navbar-scrolled');
        }
    }

}