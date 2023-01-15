import { createApp } from 'vue'
import './scss/general.scss'
import * as bootstrap from 'bootstrap'
import './style.css'

// Bootstrap JS plugins
/* import Alert from 'bootstrap/js/dist/alert';
// or, specify which plugins you need:
import { Tooltip, Toast, Popover } from 'bootstrap'; */

import App from './App.vue'

createApp(App).mount('#app')
