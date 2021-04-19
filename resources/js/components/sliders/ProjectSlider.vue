<template>
    <div class="carousel-wrapper">
        <transition-group name="carousel-slide" tag="div" class="carousel">
            <div class="slide" v-for="project in slides" :key="project.id">
                <img :src="project.thumbnail_media[0]" :alt="project.title">
                <div class="overlay">
                    <h3>
                        {{ project.user.name }}
                    </h3>
                    <h2>{{ project.title }}</h2>
                </div>
            </div>
        </transition-group>
        <slot name="arrow"></slot>
    </div>
</template>

<script>
export default {
    name: "ProjectSlider",
    props: {
        projects: {
            type: Array,
            default() {
                return [];
            }
        }
    },
    data(){
        return{
            slides: [],
            interval: null,
        }
    },
    mounted(){
        this.slides = this.projects;
        if (this.slides.length > 4){
            this.interval = setInterval(() => {
                let popped = this.slides.pop();
                setTimeout(() => {
                    this.slides.unshift(popped);
                }, 100);
            }, 5000);
        }
    },
    beforeDestroy() {
        if (this.interval){
            clearInterval(this.interval);
        }
    }
}
</script>
