<template>
    <div class="load-wrapper">
        <div class="load-fill" :style="`height: ${loaded}vh`">
        </div>
    </div>

</template>

<script>
export default {
    name: "LoadRing",
    props: {
        loaded: {
            type: Number,
            default: 0,
        }
    }
}
</script>

<style scoped>
.load-wrapper{
    width: 100%;
    height: 100vh;
    position: absolute;
    left: 0;
    top: 0;
    z-index: 1;
}

.load-fill{
    width: 100%;
    position: absolute;
    left: 0;
    bottom: 0;
    background-color: #000;
    transition: 0.5s;
}

</style>
