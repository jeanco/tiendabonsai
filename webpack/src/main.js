import Validator from 'validatorjs'
import { app } from './app'

window.$ = window.jQuery = require('jquery')
window.Velocity = window.$.Velocity
window.Qs = require('qs')

// require('materialize-css/js/global')
// require('materialize-css/js/pushpin')

require('animate.css')
require('aos/dist/aos.css')

require('swiper/dist/css/swiper.css')
require('slick-carousel/slick/slick.css')

require('jquery-zoom/jquery.zoom.min.js')

require('./styles/main.scss')

Validator.useLang('es')

Validator.register('phone', (value) => { return value.match(/^[0-9;\-+ ]+$/) }, 'Ingrese su número correctamente.')
Validator.register('name', (value) => { return value.match(/^[a-zA-ZñáéíóúÑÁÉÍÓÚüÜ;\- ]+$/) }, 'Este campo sólo acepta texto.')

let messages = Validator.getMessages('es')
messages.required = 'Por favor complete este campo!'
messages.email = 'Este no es una dirección de email correcta.'
messages.min = 'Ingrese un valor mayor o igual a :min.'
messages.url = 'Esta no es una url correcta.'
messages.integer = 'Este campo solo acepta números.'
Validator.setMessages('es', messages)

/* eslint-disable */
const aos = require('aos/dist/aos.js')
aos.init({
  offset: 50,
  duration: 800,
  disable: 'mobile',
  easing: 'ease-in-sine'
})
/* eslint-enable */

app.$mount('#root')
