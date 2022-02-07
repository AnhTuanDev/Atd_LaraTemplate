require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.store('shop', {

    slideMenu: false,

    overflow: false,
 
    toggleSlideMenu() {
        this.slideMenu = ! this.slideMenu
    },

    toggleOverflow() {
        this.overflow = ! this.overflow
    }
})

Alpine.start();
