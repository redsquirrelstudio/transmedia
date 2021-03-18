import Vue from 'vue';
import AnimatedLightbulb from "./components/AnimatedLightbulb";
import Exhibition from "./components/Exhibition";
import PageEditor from "./components/PageEditor";

const app = new Vue({
    'el': '#app',
    data(){
        return{
            showEditor: false,
        }
    },
    components: {
        AnimatedLightbulb,
        Exhibition,
        PageEditor,
    }
});
