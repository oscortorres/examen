import { createApp } from 'vue';

// tailwind
import '../../css/vue.css'

//oruga
import Oruga from '@oruga-ui/oruga-next'
import '@oruga-ui/oruga-next/dist/oruga.css'
import '@oruga-ui/oruga-next/dist/oruga-full.css'
import '@oruga-ui/oruga-next/dist/oruga-full-vars.css'

// material
import '@mdi/font/css/materialdesignicons.min.css'

//axios 
import axios from 'axios';

// cookie
import VueCookies from 'vue3-cookies'

import App from './App.vue';
import router from './router';

const app = createApp(App).use(Oruga).use(router).use(VueCookies)

app.config.globalProperties.$axios = axios
window.axios = axios

app.mount('#app')