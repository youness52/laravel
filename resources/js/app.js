import "./bootstrap"
import { createApp } from 'vue'
import HelloWorld from './components/welcom'
import Orders from './components/orders/orders'

const app = createApp({})

app.component('hello-world', HelloWorld)
app.component('orders', Orders)

app.mount('#app')
