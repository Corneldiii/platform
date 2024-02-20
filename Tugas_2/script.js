hamburger= document.querySelector(".hamburger");
hamburger.onclick = function () {
    navbar = document.querySelector(".nav-bar")
    navbar.classList.toggle("active")
}


logo=document.querySelector('.logo');
logo.onclick = function() {
    location.reload();
}

const aboutMeContainer = document.querySelector('.aboutme-container');
const projectContainer = document.querySelector('.project-container');
let isAboutMeVisible = false;
let isProjectVisible = false;

function checkScroll() {
    const scrollPosition = window.scrollY;
    const aboutMePosition = aboutMeContainer.offsetTop;
    const projectPosition = projectContainer.offsetTop;
    const windowHeight = window.innerHeight;

    if (scrollPosition > aboutMePosition - windowHeight + 100) {
        if (!isAboutMeVisible) {
            aboutMeContainer.classList.add('aboutme-show');
            aboutMeContainer.classList.remove('aboutme-hide');
            isAboutMeVisible = true;
        }
    } else {
        if (isAboutMeVisible) {
            aboutMeContainer.classList.remove('aboutme-show');
            aboutMeContainer.classList.add('aboutme-hide');
            isAboutMeVisible = false;
        }
    }

    if (scrollPosition > projectPosition - windowHeight + 100) {
        if (!isProjectVisible) {
            projectContainer.classList.add('project-show');
            projectContainer.classList.remove('project-hide');
            isProjectVisible = true;
        }
    } else {
        if (isProjectVisible) {
            projectContainer.classList.remove('project-show');
            projectContainer.classList.add('project-hide');
            isProjectVisible = false;
        }
    }

}

window.addEventListener('scroll', checkScroll);

const textAboutMe = document.querySelector('.aboutme-right .text');
const buttonAboutMe = document.querySelector('.aboutme-right .toggle-button');

let isOpenAboutMe = false;

function updateAboutMeToggle() {
    if (isScreenSizeInRange(0, 768)) {
        buttonAboutMe.style.display = 'block'; 
        textAboutMe.style.maxHeight = '100px';
        buttonAboutMe.textContent = 'Read More';
        
        buttonAboutMe.addEventListener('click', toggleAboutMe);
    } else {
        buttonAboutMe.style.display = 'none';
        textAboutMe.style.maxHeight = 'none';
        buttonAboutMe.removeEventListener('click', toggleAboutMe);
    }
}

function toggleAboutMe() {
    if (isOpenAboutMe) {
        textAboutMe.style.maxHeight = '100px';
        buttonAboutMe.textContent = 'Read More';
    } else {
        textAboutMe.style.maxHeight = '1000px';
        buttonAboutMe.textContent = 'Less';
    }
    isOpenAboutMe = !isOpenAboutMe;
}

function isScreenSizeInRange(minWidth, maxWidth) {
    return window.matchMedia(`(min-width: ${minWidth}px) and (max-width: ${maxWidth}px)`).matches;
}

document.addEventListener('DOMContentLoaded', updateAboutMeToggle);
window.addEventListener('resize', updateAboutMeToggle);

function toggleActiveState(element){
    element.classList.toggle("active");
}

const Darkmode = document.querySelector('.darkmode');
const BodyMode = document.body;
const HeaderMode = document.header;
const FooterMode = document.footer;
const AboutmeMode = document.querySelector('.aboutme-container');
const ProjectMode = document.querySelector('.project-container');
const IconMode = document.querySelector('.icon-project i');

Darkmode.addEventListener('click', () => {
    
    if(Darkmode.classList.toggle('active')){
        BodyMode.classList.toggle('active');
        AboutmeMode.classList.toggle('active');
        ProjectMode.classList.toggle('active');
        IconMode.classList.toggle('active');
    }else{
        Darkmode.classList.remove('active');
        BodyMode.classList.remove('active');
        AboutmeMode.classList.remove('active');
        ProjectMode.classList.remove('active');
        IconMode.classList.remove('active');
    }
});

