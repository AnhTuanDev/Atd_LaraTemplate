require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.store('shop', {

    slideMenu: false,

    overflow: false,

    slideCart: false,
 
    toggleSlideMenu() {
        this.slideMenu = ! this.slideMenu
    },

    toggleOverflow() {
        this.overflow = ! this.overflow
    },

    toggleSlideCart() {
        this.slideCart = ! this.slideCart
    }

})

Alpine.start();
