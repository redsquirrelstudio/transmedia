<template>
    <div style="width: 100%; height: 100%;" v-observe-visibility="{
        callback: visibilityChanged,
        throttle: 500,
        }">
        <transition :name="transition">
            <slot name="subject" v-if="show"></slot>
        </transition>
    </div>
</template>

<script>
export default {
    name: "Animated",
    props: {
        transition: {
            type: String,
            default: 'fade-up'
        }
    },
    data() {
        return {
            show: false,
        }
    },
    methods: {
        visibilityChanged(isVisible, entry) {
            this.show = isVisible;
            console.log(entry);
        }
    }
}
</script>
