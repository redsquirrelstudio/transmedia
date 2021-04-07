import AppForm from '../app-components/Form/AppForm';

Vue.component('featured-project-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                title:  '' ,
                user_id:  null ,
                description:  '' ,
                youtube_url:  '' ,
            },
            user: null,
            mediaCollections: ['thumbnails', 'banners']
        }
    },
    mounted(){
      this.user = this.form.user_id;
    },
    watch: {
        user(){
            if (this.user.id){
                this.form.user_id = this.user.id;
            }
        }
    }

});
