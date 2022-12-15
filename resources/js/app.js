import './bootstrap'
import { createApp } from 'vue/dist/vue.esm-bundler'
import AppComponent from './components/App.vue'
import router from './router'
import Notifications from '@kyvg/vue3-notification'

const app = createApp({
    components: {
        AppComponent
    }
})

app.use(router)
app.use(Notifications)
app.mount('#app')