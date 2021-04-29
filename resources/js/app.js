import Vue from 'vue';

import VueObserveVisibility from 'vue-observe-visibility';
import VueLazyload from 'vue-lazyload';

import Exhibition from "./components/Exhibition";
import PageEditor from "./components/PageEditor";
import ImageUpload from "./components/ImageUpload";
import MobileNavbar from "./components/MobileNavbar";

import MailForm from "./components/landing/MailForm";
import Countdown from "./components/landing/Countdown";

import Animated from "./components/animations/Animated";
import HoverIcon from "./components/animations/HoverIcon";
import FloatInput from "./components/animations/FloatInput";

import HeroSlider from "./components/sliders/HeroSlider";
import StudentSlider from "./components/sliders/StudentSlider";
import ProjectSlider from "./components/sliders/ProjectSlider";
import ThumbnailSlider from "./components/sliders/ThumbnailSlider";

Vue.use(VueObserveVisibility);
Vue.use(VueLazyload, {
    preLoad: 1.3,
    error: 'dist/error.jpg',
    loading: 'assets/loading.gif',
    attempt: 1
});


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
            showMobile: false,
        }
    },
    components: {
        Exhibition,
        PageEditor,
        ImageUpload,
        MailForm,
        MobileNavbar,
        Countdown,
        HeroSlider,
        StudentSlider,
        ProjectSlider,
        ThumbnailSlider,
        Animated,
        HoverIcon,
        FloatInput,

    }
});
