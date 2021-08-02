//da app.js mi copio in un altro file che poi importerò nel file front.js per differenziarlo da quello del backend

window.Vue = require('vue').default;

//per utilizzare vue devo importarlo qui
import App from './App.vue';
import router from './router';



//importo entrambi copiandoli dal file bootstrap.js -import comune
window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
//creo una nuova istanza di vue 
var app = new Vue(
    {
        el:'#root',
        render: h => h(App),
        router //aggiungo il router alla mia istanza di vue
    }
)