import { createApp } from 'vue'
import App from './App.vue'
import router from '@/router'
import axios from 'axios'
import VueAxios from 'vue-axios'
import LaravelVuePagination from 'laravel-vue-pagination'
import Toast from "vue-toastification"
import 'vue-toastification/dist/index.css'
// import './vite/modulepreload-polyfill'

const options = {

};


createApp(App)
  .use(router)
  .use(VueAxios, axios)
  .use(Toast, options)
  .component('Pagination', LaravelVuePagination)
  .mount('#app')
