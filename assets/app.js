import { registerVueControllerComponents } from '@symfony/ux-vue';
import './bootstrap.js';
import './styles/app.css';
/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)


globalThis.__VUE_OPTIONS_API__ = true;
globalThis.__VUE_PROD_DEVTOOLS__ = false;
import './styles/app.css';
import './bootstrap';
import { createApp } from 'vue'

import Joke from './js/Joke.vue'
createApp(Joke).mount('#joke')

import Choix from './js/Choix.vue'
createApp(Choix).mount('#choix')
registerVueControllerComponents(require.context('./vue/controllers', true, /\.vue$/));