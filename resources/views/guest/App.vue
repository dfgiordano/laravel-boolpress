<template>
    <div>
        <Header />
        <main class="container">
            <div class="row">
                <div class="col-4 d-flex my-2"
                v-for="post in posts"
                :key="post.id">
                    <div class="card w-100">
                        <div class="card-body">
                            <h3>{{post.title}}</h3>
                            <p>{{textView(post.post,100)}}</p>
                            <a class="card-link" href="#">Leggi l'articolo</a>
                        </div>
                    </div>
            </div>
            </div>
            
            
        </main>
        <Footer />
    </div>
</template>

<script>
import Header from './components/Header';
import Footer from './components/Footer';

export default {
    name: 'App',
    data: function () {
            return {
                posts: []
            }
        },
    methods: {
        textView: function (string,charsNumber) {
            if(string.length > charsNumber) {
                return string.substr(0, charsNumber) + '...';
            } else {
                return string;
            }
        }
    },
    components: {
        Header,
        Footer,
    },
    //al created vado a fare la chiamata axios per recuperare i miei dati
    created: function () {
        axios
        .get('http://127.0.0.1:8000/api/posts')
        .then(
            res => {
                console.log(res.data);
                //salvo nell'array vuoto i risultati che stanno arrivando con la chiamata axios(arrow function così non cambia il this)
                this.posts = res.data;
            }
                
        )
    }

}
</script>

<style>
    
</style>