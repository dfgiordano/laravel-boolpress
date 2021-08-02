<template>
    <div>
        <h1>BoolBlog</h1>
        <nav>
            <ul>
                <li>
                    <!-- <a class="active" href="">Home</a> -->
                    <!-- se faccio il passaggio statico mi va beneil primo, altrimenti v-bind e passo tra graffe il nome delle rotte -->
                    <!-- <router-link to="/">Home</router-link> -->
                    <router-link :to="{name: 'home'}">Home</router-link>
                </li>
                <li>
                    <!-- <a href="">Blog</a> -->
                    <router-link :to="{name: 'blog'}">Blog</router-link>
                </li>
                <li>
                    <!-- <a href="">Chi siamo</a> -->
                    <router-link :to="{name: 'about'}">Chi siamo</router-link>
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
                    &.router-link-exact-active {
                        background-color: lightgreen;
                    }
            }
    }
</style>