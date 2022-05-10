import "bootstrap/dist/css/bootstrap.css"
import { createApp } from 'vue'
import App from './App.vue'
import router from '@/router'
import axios from 'axios'
import VueAxios from 'vue-axios'
import LaravelVuePagination from 'laravel-vue-pagination'
import Toast from "vue-toastification"
import "vue-toastification/dist/index.css";

const options = {

};


createApp(App)
.use(router)
.use(VueAxios, axios)
.use(Toast, options)
.component('Pagination', LaravelVuePagination)
.mount('#app')

import "bootstrap/dist/js/bootstrap.js"
