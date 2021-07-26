//da app.js mi copio in un altro file che poi importerò nel file front.js per differenziarlo da quello del backend

window.Vue = require('vue').default;

//per utilizzare vue devo importarlo qui
import App from '../views/guest/App.vue';

//creo una nuova istanza di vue 
var app = new Vue(
    {
        el:'#root',
        render: h => h(App)
    }
)