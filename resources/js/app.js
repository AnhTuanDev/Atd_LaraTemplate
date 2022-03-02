require('./bootstrap');
import persist from '@alpinejs/persist'

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.plugin(persist)

Alpine.store('shop', {

    ////////////// Variable ////////////// 
    
    imageZoom: false,

    slideMenu: false,

    overflow: false,

    //overflow: Alpine.$persist(false).as('shop'),
    slideCart: false,
    
    ////////////// Init ////////////// 
    
    init() {
        this.overflow = false
        console.log(this.overflow)
    },

    ////////////// Function ////////////// 
    
    // Slide Menu
    toggleSlideMenu() {
        this.slideMenu = ! this.slideMenu
    },

    // Overflow
    ofOverflow() {
        this.overflow = false
        console.log(this.overflow)
    },
    onOverflow() {
        this.overflow = true
        console.log(this.overflow)
    },
    toggleOverflow() {
        console.log(this.overflow)
        this.overflow = ! this.overflow
        console.log(this.overflow)
    },

    // Slide Cart
    toggleSlideCart() {
        this.slideCart = ! this.slideCart
    }

})

Alpine.start();
