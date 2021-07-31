<template>
    <footer>
        <ul>
            <li>
                <a href="#">
                    Made by Boolean Trainee
                </a>
            </li>
            <li>
                <a href="#">
                    &copy; Copyright
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="https://www.boolean.careers/images/misc/logo-small.png" alt="logo-boolean">
                </a>
            </li>
        </ul>
    </footer>
</template>

<script>
export default {
name: 'Footer'
}
</script>

<style lang="scss" scoped>
footer {
    display: flex; 
    justify-content: space-around;
}
    a {
        text-decoration: none;
        color: black;
    }
    li {
        display: inline-block;
        padding: 5px;
    }
    img {
        height: 50px;
    }
</style>