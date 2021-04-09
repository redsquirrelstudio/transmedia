<template>
    <label :for="name" :class="`auth-input ${float ? 'active' : ''}`">
                    <span class="float-label">
                        <i :class="icon"></i> {{ label }}
                    </span>
        <input :id="name" :type="type" :name="name" v-model="text_value">
    </label>
</template>

<script>
export default {
    name: "FloatInput",
    props: {
        label: {
            type: String,
            required: true,
        },
        icon: {
            type: String,
            required: true,
        },
        name: {
            type: String,
            required: true,
        },
        type: {
            type: String,
            required: true,
        },
        value: {
            type: String,
            default: null,
        }
    },
    data(){
        return{
            text_value: '',
        }
    },
    mounted(){
        if(this.value){
            this.text_value = this.value;
        }
    },
    computed: {
        float(){
            return this.text_value.length > 0;
        }
    }
}
</script>
