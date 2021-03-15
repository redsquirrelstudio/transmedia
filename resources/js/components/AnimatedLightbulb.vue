<template>
    <div :class="`animated-lightbulb ${scrolled ? 'scrolled' : ''}`">
        <transition name="fade">
            <img class="outline" v-if="!filled && !scrolled" :src="outlined" alt="Transmedia 2021" key="outlined">
            <img v-if="scrolled || filled" :src="logo" alt="Transmedia 2021" key="logo">
        </transition>
        <transition name="fade">
            <div class="tag-line" v-if="!scrolled">
                <div class="animated-text">
                    <p>
                        Explore,
                    </p>
                    <p>
                        Experience,
                    </p>
                    <p>
                        Enlighten.
                    </p>
                </div>
                <a href="#about" class="scroll-arrow">
                    <p>Scroll Down</p>
                    <i class="las la-angle-double-down"></i>
                </a>
            </div>
        </transition>
    </div>
</template>

<script>
export default {
    name: "AnimatedLightbulb",
    props: {
        outlined: {
            type: String,
            required: true,
        },
        logo: {
            type: String,
            required: true,
        }
    },
    data() {
        return {
            filled: false,
            scrolled: false,
        }
    },
    mounted() {
        this.scrolled = document.documentElement.scrollTop > 100;
        setTimeout(() => {
            this.filled = true;
        }, 3000);
        window.addEventListener('scroll', this.handleScroll);
    },
    methods: {
        handleScroll(){
            console.log("hello");
            this.scrolled = document.documentElement.scrollTop > 100;
        }
    }
}
</script>
