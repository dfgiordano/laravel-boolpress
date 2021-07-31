<template>
    <div class="col-4 d-flex my-2">
        <div class="card w-100">
            <div class="card-body">
                <h3 class="card-title">{{item.title}}</h3>
                <p>{{item.excerpt}}</p>
                <a class="card-link" href="#">Leggi l'articolo</a>
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