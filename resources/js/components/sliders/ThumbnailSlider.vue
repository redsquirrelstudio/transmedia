<template>
    <div class="thumbnail-slider">
        <div class="slide-container">
            <div class="trolley" :style="`transform: translate(${-500 * active}px, 0);`">
                <img class="slide" v-lazy="slide" v-for="(slide, index) in slides" :key="slide" alt="Slide image">
            </div>
        </div>
       <div class="indicators">
           <div class="indicator" v-for="(slide, index) in slides" :key="slide" :class="{ active: active === index}" @click="goTo(index)">
               <img v-lazy="slide" alt="slide indicator">
           </div>
       </div>
    </div>
</template>

<script>
export default {
    name: "ThumbnailSlider",
    props: {
        slides: {
            type: Array,
            default(){
                return [];
            }
        }
    },
    data(){
        return{
            active: 0,
            interval: null,
        }
    },
    mounted(){
        this.interval = setInterval(() => {
            if (this.active === this.slides.length - 1){
                this.active = 0;
            }
            else{
                this.active++;
            }
        }, 5000)
    },
    beforeDestroy() {
        clearInterval(this.interval);
    },
    methods: {
        goTo(slide){
            clearInterval(this.interval);
            this.active = slide;
            this.interval = setInterval(() => {
                if (this.active === this.slides.length - 1){
                    this.active = 0;
                }
                else{
                    this.active++;
                }
            }, 5000)
        }
    }
}
</script>
