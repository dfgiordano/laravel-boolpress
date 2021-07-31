<template>
    <div>
        <Header />
        <main class="container">
            <div class="row">
                <Card 
                v-for="post in posts"
                :key="post.id"
                :item="post"
                />
            </div>
        </main>
        <Footer />
    </div>
</template>

<script>
import Header from './components/Header';
import Card from './components/Card';
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
        Card,
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

                this.posts.forEach(
                    element => {
                        element.excerpt = this.textView(element.post, 150);
                    }
                )
            }
                
        )
    }

}
</script>

<style>
    
</style>