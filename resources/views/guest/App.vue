<template>
    <div>
        <Header />
    </div>
</template>

<script>
import Header from './components/Header';
export default {
    name: 'App',
    components: {
        Header
    },
    //al created vado a fare la chiamata axios per recuperare i miei dati
    created: function () {
        axios
        .get('http://127.0.0.1:8000/api/posts')
        .then(
            res => {
                console.log(res.data);
            }
                
        )
    }

}
</script>

<style>
    
</style>