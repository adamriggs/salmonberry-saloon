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

    // open giftcard popup
    const giftCard = document.querySelector('.gift-card__popup');
    giftCard.addEventListener('click', () => {
        const popUp = document.querySelector('.gift-card__popup__modal');
        popUp.classList.remove('pop-up--hide');
    });

    // close any popup
    const close = Array.from(document.getElementsByClassName('pop-up--close'));
    close.forEach((elem)=> {
        elem.addEventListener('click', (e) => {
            elem.parentElement.classList.add('pop-up--hide');
        });
    });
});
