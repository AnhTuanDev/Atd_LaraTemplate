<template 
    x-data 
    x-if="$store.shop.slideMenu">

    <div class="min-h-screen fixed top-0 left-0 on-top">
        <div class="relative bg-secondary-dark p-6 min-h-screen w-screen md:w-96 shadow-lg">
            <h2 x-data @click="$store.shop.toggleSlideMenu()">Menu nu</h2>
        </div>
    </div>
</template>
