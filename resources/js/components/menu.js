const body = document.body;
const menuBtn = document.querySelector('.menu-btn');
const header = document.querySelector('.header__menu');
const anchors = document.querySelectorAll('a[href*="#"]');

menuBtn.addEventListener('click', (event) => {
  event.preventDefault();
  body.classList.toggle('body--active');
  header.classList.toggle('active');
  menuBtn.classList.toggle('active');
  menuBtn.blur();
});

function scrollToTarget(targetId) {
  const targetSection = document.getElementById(targetId);
  if (targetSection) {
    body.classList.remove('body--active');
    header.classList.remove('active');
    menuBtn.classList.remove('active');
    setTimeout(() => {
      let targetOffset;
      if (targetId === 'testimonials') {
        targetOffset = targetSection.offsetTop;
      } else {
        targetOffset = targetSection.offsetTop - 30;
      }
      window.scrollTo({top: targetOffset, behavior: 'smooth'});
    }, 400);
  }
}

function handleAnchorClick(event) {
  event.preventDefault();
  const targetId = this.getAttribute('href').split('#')[1];
  scrollToTarget(targetId);
}

for (const anchor of anchors) {
  anchor.addEventListener('click', handleAnchorClick);
  anchor.addEventListener('touchstart', handleAnchorClick, {passive: true});
}

const menuLinks = document.querySelectorAll('.header__link');
menuLinks.forEach((menuLink) => {
  menuLink.addEventListener('click', handleAnchorClick);
  menuLink.addEventListener('touchstart', handleAnchorClick, {passive: true});
});