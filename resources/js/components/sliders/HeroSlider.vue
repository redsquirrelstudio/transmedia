<template>
    <div class="hero-slider scroll-anchor">
        <div class="slide-trolley" :style="`transform: translate(-${current * 100}vw, 0);`">
            <div class="slide" v-for="slide in slides" :key="`slide-${slide.id}`">
                <img v-if="slide.type === 'image'" :src="slide.src" :alt="slide.title">
                <video autoplay muted loop v-else>
                    <source :src="slide.src" type="video/mp4">
                </video>
                <div class="caption">
                    <h1>{{ slide.title }}</h1>
                    <h2>{{ slide.subtitle }}</h2>
                    <a class="btn-c2a" :href="slide.link_href">{{ slide.link_text }}</a>
                </div>
            </div>
        </div>
        <ul class="slide-indicators">
            <li :class="`indicator ${index === current ? 'active' : ''}`" v-for="(slide, index) in slides" :key="`indicator-${slide.id}`">
                <a @click.prevent="goTo(index)"></a>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    name: "HeroSlider",
    props: {
        slides: {
            type: Array,
            required: true,
        }
    },
    data() {
        return {
            current: 0,
            timer: null,
            waitSeconds: 15,
        }
    },
    mounted(){
        this.goTo();
    },
    methods: {
        goTo(index = 0){
            this.current = index;
            if (this.timer){
                clearInterval(this.timer);
            }
            this.timer = setInterval(() => {
                if (this.current < this.slides.length - 1){
                    this.current++;
                }
                else{
                    this.current = 0;
                }
            }, this.waitSeconds * 1000);
        }
    },
    beforeDestroy() {
        clearInterval(this.timer);
    }
}
</script>

