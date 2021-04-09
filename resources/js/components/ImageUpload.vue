<template>
    <div class="image-upload">
        <div class="overlay" @click="$refs['file'].click()">
            <i :class="icon"></i>
        </div>
        <transition name="slide-up" mode="out-in">
            <div v-if="!fileUrl" :class="`placeholder ${error ? 'error' : ''}`" key="placeholder">
                <div class="message">
                    <i class="las la-cloud-upload-alt"></i>
                    <p>Upload {{ label }} <br> (Max 500kb)</p>
                </div>
            </div>
            <div v-else class="image" :key="fileUrl">
                <img :src="fileUrl"/>
            </div>
        </transition>
        <input ref="file" type="file" accept="image/*" :name="name" class="invisible" v-on:change="generateUrl">
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: "ImageUpload",
    props: {
        name: {
            type: String,
            required: true,
        },
        label: {
            type: String,
            default: 'Image',
        },
        insert: {
            type: String,
            default: null,
        },
        icon: {
            type: String,
            default: 'las la-edit'
        }
    },
    data() {
        return {
            fileUrl: null,
            media_id: null,
            error: false,
        }
    },
    created() {
        if (this.insert !== null) {
            this.fileUrl = this.insert;
        }
    },
    methods: {
        generateUrl(e) {
            this.error = false;
            const file = e.target.files[0];
            console.log(file.size);
            if (file.size > 2000000){
                this.error = true;
                this.$refs['file'].value = null;
                alert('Images cannot exceed 2MB in file size, please optimise your image');
            }
            else{
                this.fileUrl = URL.createObjectURL(file);
            }
        },
    },
}
</script>
