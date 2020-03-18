/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

// ------------------ ATTIVAZIONE TOOLTIPs DI BOOSTRAP -------------------------
$(function() {
    $('[data-toggle="tooltip"]').tooltip();
});
// ------------------ ATTIVAZIONE TOOLTIPs DI BOOSTRAP -------------------------



// ---------------------------- TOMTOM -----------------------------------------

$(document).ready(function() {

    // se l'id "map" è definito, vuol dire che mi trovo sulla pagina "show" dove devo visualizzare la mappa,
    // altrimenti non faccio nulla
    if ($("#map").length) {

        var Apt_location = [45.46738025, 9.14222736]; // coordinate [lat, lon]

        var map = tomtom.L.map('map', {
            key: 'BG5ffg9ACWQBPZZHShDaXxBnheo0bD36', // api-key di tomtom
            basePath: '../', // path di dove si trova la cartella con SDK di TomTom
            center: Apt_location, // array che contiene coordinate di un punto specifico
            zoom: 13 // livello di zoomata
        });
        // aggiungo un marker sulla mappa (map), nella posizione specificata nell'array Apt_location
        var Apt_location_marker = tomtom.L.marker(Apt_location).addTo(map);

        // aggiungo un popup sul marker, con una descrizione testuale della posizione
        Apt_location_marker.bindPopup("BoolBnB, Via Pietro Rubens, 20146 Milano, Italia");

    }
}); // end document ready

// ---------------------------- TOMTOM -----------------------------------------