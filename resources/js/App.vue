<template>
    <div>
        <Header />
        <main class="container">
            <router-view></router-view>
        </main>
        <Footer />
    </div>
</template>

<script>
import Header from './components/Header';
import Footer from './components/Footer';

export default {
    name: 'App',
    
    components: {
        Header,
        Footer,
    },


}
</script>

<style>

</style>