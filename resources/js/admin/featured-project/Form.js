import AppForm from '../app-components/Form/AppForm';

Vue.component('featured-project-form', {
    mixins: [AppForm],
    data: function () {
        return {
            form: {
                title: '',
                user_id: [],
                description: '',
                youtube_url: '',
            },
            user: [],
            mediaCollections: ['thumbnails', 'banners']
        }
    },
    mounted() {
        if (this.form.user) {
            for (let i = 0; i < this.form.user.length; i++) {
                this.user.push(this.form.user[i]);
            }
        }

    },
    watch: {
        user() {
            this.form.user_id = [];
            for (let i = 0; i < this.user.length; i++) {
                this.form.user_id.push(this.user[i].id);
            }
        }
    }

});
