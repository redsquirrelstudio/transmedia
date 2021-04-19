<template>
    <i :class="hover ? openClass + ' hover-icon-open' : closeClass" :key="hover ? 'open' : 'close'"
       @mouseenter="hover = true"
       @mouseleave="hover = false">
    </i>
</template>

<script>
export default {
    name: "HoverIcon",
    props: {
        openClass: {
            type: String,
            required: true
        },
        closeClass: {
            type: String,
            required: true
        }
    },
    data() {
        return {
            hover: false,
        }
    }
}
</script>
