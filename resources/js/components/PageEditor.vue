<template>
    <div class="page-editor">
        <div class="editor-header">
            <h2>
                Edit your page
            </h2>
            <i class="las la-times" @click.prevent="$emit('close')"></i>
        </div>
        <hr>
        <div class="images">

        </div>
        <p class="label">Your name</p>
        <label for="name" class="form-control dark">
            <i class="las la-user"></i>
            <input id="name" type="text" name="name" v-model="details.name" placeholder="What's your name?">
        </label>
        <p class="label">Your Course</p>
        <label for="course_id" class="form-control dark">
            <i class="las la-tools select-icon"></i>
            <select name="course_id" id="course_id" v-model="details.course_id">
                <option :value="null" disabled>Which discipline are you?</option>
                <option v-for="course in courses" :key="course.id" :value="course.id">
                    {{ course.name }}
                </option>
            </select>
        </label>
        <p class="label">Your portfolio URL</p>
        <label for="portfolio_url" class="form-control dark">
            <i class="las la-globe"></i>
            <input id="portfolio_url" type="url" name="portfolio_url" v-model="details.portfolio_url" placeholder="Your portfolio link">
        </label>
        <p class="label">Tag line <small>({{ tagline_remaining }} characters remaining)</small></p>
        <label for="tagline" class="form-control dark">
            <i class="las la-tags"></i>
            <input id="tagline" type="text" name="tagline" v-model="details.tagline" placeholder="What do you do?" maxlength="50">
        </label>
        <p class="label">Bio <small>({{ bio_remaining }} characters remaining)</small></p>
        <label for="bio" class="form-control dark">
            <textarea id="bio" name="bio" v-model="details.bio" placeholder="A bit about yourself..." maxlength="300" rows="7"></textarea>
        </label>
        <label for="submit" class="form-control dark">
            <button class="btn-primary dark" type="submit" id="submit" @click.prevent="save">Save Your Page</button>
        </label>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    name: "PageEditor",
    props: {
        user: {
            type: Object,
            required: true,
        },
        courses: {
            type: Array,
            required: true,
        },
        apiUrl: {
            type: String,
            required: true,
        }
    },
    data(){
        return {
            details: null,
        }
    },
    created(){
        this.details = {
            name: this.user.name,
            course_id: this.user.page.course_id,
            portfolio_url: this.user.page.portfolio_url,
            tagline: this.user.page.tagline,
            bio: this.user.page.bio,
        }
    },
    computed: {
        tagline_remaining(){
            return this.details.tagline ? 50 - this.details.tagline.length : 50;
        },
        bio_remaining(){
            return this.details.bio ? 300 - this.details.bio.length : 300;
        }
    },
    methods: {
        save(){
            axios.post(this.apiUrl, this.$makeForm({
                'user_id': this.user.id,
                'name': this.details.name,
                'course_id': this.details.course_id,
                'portfolio_url': this.details.portfolio_url,
                'tagline': this.details.tagline,
                'bio': this.details.bio
            })).then(res => {
                if (res.data.success){
                    this.$emit('close');
                    setTimeout(() => {
                        location.reload();
                    }, 200);
                }
            }).catch(err => {
                console.error(err.message);
            });
        }
    }
}
</script>
