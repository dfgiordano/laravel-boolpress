<template>
    <div class="col-4 d-flex my-2">
        <div class="card w-100">
            <div class="card-body">
                <h3 class="card-title">{{item.title}}</h3>
                <p>{{item.excerpt}}</p>
                <!-- <a class="card-link" href="#">Leggi l'articolo</a> -->
                <!-- vado a sostituire il mio link con il router-link, nella prop ci passo il nome della route, e un parametro (definito in router.js e gli passo item.slug che recupero da su) -->
                <router-link :to="{ name: 'single-post', params: { slug: item.slug}}">Leggi l'articolo...</router-link>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Card',
    props: {
        'item' : Object
    }
}
</script>

<style>

</style>