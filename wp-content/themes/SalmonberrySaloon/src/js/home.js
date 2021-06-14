/* eslint-disable no-unused-vars */
/* eslint-disable no-lonely-if */
/* eslint-disable no-console */
/* eslint-disable no-loop-func */
import 'intersection-observer';
import anime from 'animejs/lib/anime.es.js';

document.addEventListener('DOMContentLoaded', () => {
    // ANIMATIONS
    const easeOut = 'easeOutQuad';
    const easeIn = 'easeInQuad';
    const duration = '800';
    const delay = '400';

    const heroArrowClass = '.home__primary .arrow__down';
    const heroArrowNode = document.querySelector(heroArrowClass);

    const homeIO = new IntersectionObserver(
        entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting === true) {
                    if (entry.target === heroArrowNode) {
                        anime({
                            delay: delay * 3,
                            duration: duration,
                            easing: easeOut,
                            targets: heroArrowClass,
                            height: ['0px', '160px']
                        });
                    }
                } else {
                    if (entry.target === heroArrowNode) {
                        anime({
                            duration: duration,
                            easing: easeOut,
                            targets: heroArrowClass,
                            height: '0px'
                        });
                    }
                }
            });
        },
        {
            // threshold: [1]
        }
    );

    homeIO.observe(heroArrowNode);

    // MENU STUFF
    // document.querySelectorAll('header .menu-item-has-children').forEach(node => {
    //     node.addEventListener('mouseenter', e => {
    //         e.preventDefault();
    //         e.stopPropagation();
    //         e.target.classList.add('menu-open');
    //     });
    //     node.addEventListener('mouseleave', e => {
    //         e.preventDefault();
    //         e.stopPropagation();
    //         e.target.classList.remove('menu-open');
    //     });
    // });

    // const hamburger = document.getElementById('hamburger-menu');
    // const mobileMenu = document.getElementById('menu__mobile');
    // hamburger.addEventListener('click', () => {
    //     hamburger.classList.toggle('is-active');
    //     mobileMenu.classList.toggle('show');
    // });
});
