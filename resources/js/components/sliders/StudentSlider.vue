<template>
    <div class="carousel-wrapper">
        <transition-group name="carousel-slide" tag="div" class="carousel">
            <div class="slide" v-for="student in slides" :key="student.id">
                <img :src="student.page.avatar_image.file_url" :alt="student.name">
                <div class="overlay">
                    <h3>
                        <span v-if="student.year === 1">1st Year </span>
                        <span v-if="student.year === 2">2nd Year </span>
                        <span v-if="student.year === 3">3rd Year </span>
                        <span v-if="student.year === 4">MA </span>
                        <span v-if="student.page.course">{{ student.page.course.name }}</span>
                    </h3>
                    <h2>{{ student.name }}</h2>
                    <p v-if="student.page.tagline">
                        {{ student.page.tagline }}
                    </p>
                </div>
            </div>
        </transition-group>
        <slot name="arrow"></slot>
    </div>
</template>

<script>
export default {
    name: "StudentSlider",
    props: {
        students: {
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
        this.slides = this.students;
        this.interval = setInterval(() => {
            let popped = this.slides.pop();
            setTimeout(() => {
                this.slides.unshift(popped);
            }, 100);
        }, 5000);
    },
    beforeDestroy() {
        clearInterval(this.interval);
    }
}
</script>
