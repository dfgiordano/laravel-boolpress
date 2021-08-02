<template>
    <div>
        <h1> Chi siamo </h1>
        <ul>
            <li><a href="#">P.IVA 1234567890</a></li>
            <li><a href="#">Telefono: 1234567890</a></li>
            <li><a href="#">Indirizzo: Via Martiri della Libertà, 26</a></li>
            <li><a href="#">Email: boolpress@boolean.com</a></li>
            <li><a href="#">FAQ</a></li>
        </ul>
    </div>
</template>

<script>
export default {
    name : 'About'
}
</script>

<style lang="scss" scoped>
    div {
        text-align: center;
    }
    ul {
        width: 400px;
        margin: auto;
        border: 2px solid lightblue;
        text-align: left;
        li {
            list-style: none;
            padding: 2px;
        }
    }
</style>