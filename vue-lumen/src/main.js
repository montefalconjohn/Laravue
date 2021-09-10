import { createApp } from 'vue';
import axios from 'axios';
import VueAxios from 'vue-axios';

import App from './App.vue';
import store from './store';
import router from "./router/index";


createApp(App)
.use(router)
.use(store)
.use(VueAxios, axios)
.mount('#app')
