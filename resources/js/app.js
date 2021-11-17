require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.store('shop', {

    slideMenu: false,
 
    toggleSlideMenu() {
        this.slideMenu = ! this.slideMenu
    }
})

Alpine.start();
