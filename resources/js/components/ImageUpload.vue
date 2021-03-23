<template>
    <div class="image-upload" :style="`width: ${size}%;`">
        <transition name="slide-left" mode="out-in">
            <div v-if="!fileUrl" @click="$refs['file'].click()" class="placeholder" key="placeholder">
                <i class="las la-cloud-upload-alt"></i>
                <p>Upload {{ label }}</p>
            </div>
            <div v-else @click="$refs['file'].click()" class="image" :key="fileUrl">
                <img :src="fileUrl"/>
            </div>
        </transition>
        <input ref="file" type="file" accept="image" class="invisible" v-on:change="generateUrl">
        <input ref="media_id" type="text" :name="name" class="invisible" v-model="media_id">
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: "ImageUpload",
    props: {
        size: {
            type: Number,
            default: 25,
        },
        name: {
            type: String,
            required: true,
        },
        label: {
            type: String,
            default: 'Image',
        },
        apiUrl: {
            type: String,
            required: true,
        },
        insert: {
            type: String,
            default: null,
        }
    },
    data() {
        return {
            fileUrl: null,
            media_id: null,
        }
    },
    created() {
        if (this.insert !== null) {
            axios.get(this.apiUrl + '/api/media/get/' + this.insert)
            .then(res => {
                this.fileUrl = res.data;
            })
        }
    },
    methods: {
        generateUrl(e) {
            const file = e.target.files[0];
            this.fileUrl = URL.createObjectURL(file);
            this.uploadMedia(file);
        },
        uploadMedia(file) {
            let form = new FormData();

            form.append('image', file, file.name);
            form.append('description', this.name);
            axios.post(this.apiUrl + '/api/upload/save', form, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }
            )   .then(res => {
                    this.media_id = res.data.media_id;
                    this.$emit('upload', this.media_id);
                })
                .catch(err => {
                    console.error(err.message);
                });
        }
    },
}
</script>
