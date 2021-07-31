<template>
    <div>
        <h1>BoolBlog</h1>
        <nav>
            <ul>
                <li>
                    <a class="active" href="">Home</a>
                </li>
                <li>
                    <a href="">Contatti</a>
                </li>
                <li>
                    <a href="">Chi siamo</a>
                </li>
            </ul>
        </nav>
    </div>
</template>

<script>
export default {
    name: 'Header'
}
</script>

<style lang="scss" scoped>
    h1 {
        text-align: center;
        margin: 30px;
        color: red;
    }
    ul {
        text-align: center;
    }
    li {
        display: inline-block;
        margin: 5px;
            a {
                text-decoration: none;
                padding: 10px;
                color: black;
                    &:hover,
                    &.active {
                        background-color: lightgreen;
                    }
            }
    }
</style>