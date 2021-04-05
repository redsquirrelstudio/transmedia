import Vue from 'vue';
import Exhibition from "./components/Exhibition";
import PageEditor from "./components/PageEditor";
import ImageUpload from "./components/ImageUpload";
import MailForm from "./components/landing/MailForm";
import Countdown from "./components/landing/Countdown";

import HeroSlider from "./components/siders/HeroSlider";

Vue.prototype.$makeForm = (object) => {
    let form = new FormData;
    for (let key in object) {
        if (object.hasOwnProperty(key)) {
            form.append(key, object[key]);
        }
    }
    return form;
};

const app = new Vue({
    'el': '#app',
    data(){
        return{
            showEditor: false,
        }
    },
    components: {
        Exhibition,
        PageEditor,
        ImageUpload,
        MailForm,
        Countdown,
        HeroSlider,
    }
});
