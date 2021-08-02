<template>
    <div class="container" v-if="post">
        <h1>Leggi l'articolo:</h1>
        <div>
            <h3>{{post.title}}</h3>
            <h4 v-if="post.category">Categoria: <span class="badge badge-info">{{ post.category.name }}</span></h4>
            <div>
                <h6>Tags: <span class="badge badge-pills badge-secondary" v-for="tag in post.tags" :key="tag.id">{{ tag.name }}</span> </h6>
                
            </div>
            <p>{{post.post}}</p>
        </div>
        <router-link :to="{ name: 'blog' }">Torna all'elenco</router-link>
    </div>
    <Loader v-else/>
</template>

<script>
import Loader from '../components/Loader.vue';
export default {
    name: 'SinglePost',
    components: {
        Loader
    },
    //inizializzo post a null dentro i data, per poi recuperare le varie info da stampare in pagina
    data: function () {
        return {
            post: null
        }
    },
    created: function() {
        this.getPost(this.$route.params.slug);
        // console.log(this.$route.params.slug);
    },
    // definisco un nuovo metodo per recuperare in pagina il post
    methods: {
        getPost: function(slug) {
            axios
                //recupero tramite chiamata axios il mio post con backtick e template literal
                .get(`http://127.0.0.1:8000/api/posts/${slug}`)
                .then(
                    res => {
                        this.post = res.data;
                    }
                )
        }
    }
}
</script>

<style lang="scss" scoped>
    h3 {
        margin-top: 20px;
        color: blue;
    }
    p {
        height: 200px;
        margin: 10px;
    }
    h6 {
        margin: 20px 0;
        span {
            margin: 2px;
        }
    }
</style>