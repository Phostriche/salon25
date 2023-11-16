// Import Bootstrap and BootstrapVue CSS files (order is important)
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import BootstrapVue3 from 'bootstrap-vue-3';


// Make BootstrapVue available throughout your project

// Optionally install the BootstrapVue icon components plugin
//Vue.use(IconsPlugin)
import { createApp } from 'vue'
import { createPinia } from 'pinia'
import router from './routes'
import './styles/tailwind.css'

import Choix from './js/Choix.vue'
createApp(Choix).mount('#choix')
import Joke from './js/Joke.vue'
createApp(Joke).mount('#joke')

import Ticket from './views/Ticket.vue'
createApp(Ticket)
    .use(createPinia())
    .mount('#ticket')

    import App from './App.vue'

 const app = createApp(App)
app.use(createPinia())
app.use(router)
app.use(BootstrapVue3)
app.mount('#app')

