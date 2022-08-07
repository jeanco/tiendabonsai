import AppHeader from 'components/AppHeader'
import AppFooter from 'components/AppFooter'
import AppItem from 'components/AppItem'
import AppCategories from 'components/AppCategories'
import AppSection from 'components/AppSection'
import AppImage from 'components/AppImage'
import AppPost from 'components/AppPost'

import InputQuantity from 'components/InputQuantity'
import InputValidate from 'components/InputValidate'
import SelectValidate from 'components/SelectValidate'
import InputNumber from 'components/InputNumber'

import CartSummary from 'components/CartSummary'

import VueRecaptcha from 'vue-recaptcha'
// import DatePicker from 'vuejs-datepicker'

import Slick from 'vue-slick'
import { swiper, swiperSlide } from 'vue-awesome-swiper'

import Modal from 'components/Modal'
import ModalVideo from 'components/ModalVideo'
import ModalSuccess from 'components/ModalSuccess'
import ModalError from 'components/ModalError'

import ShareButtons from 'components/ShareButtons'
import Price from 'components/Price'
import VueImgLoader from 'vue-img-loader'

import Loading from 'components/Loading'
import PulseLoader from 'vue-spinner/src/PulseLoader'
import ClipLoader from 'vue-spinner/src/ClipLoader'
import SyncLoader from 'vue-spinner/src/SyncLoader'

// import { headroom } from 'vue-headroom'

export default function registerComponents (Vue) {
  Vue.component('app-footer', AppFooter)
  Vue.component('app-header', AppHeader)
  Vue.component('app-item', AppItem)
  Vue.component('app-categories', AppCategories)
  Vue.component('app-section', AppSection)
  Vue.component('app-image', AppImage)
  Vue.component('app-post', AppPost)

  Vue.component('input-quantity', InputQuantity)
  Vue.component('input-validate', InputValidate)
  Vue.component('select-validate', SelectValidate)
  Vue.component('input-number', InputNumber)

  Vue.component('image-loader', VueImgLoader)

  Vue.component('modal', Modal)
  Vue.component('modal-video', ModalVideo)
  Vue.component('modal-success', ModalSuccess)
  Vue.component('modal-error', ModalError)

  Vue.component('share-buttons', ShareButtons)
  Vue.component('price', Price)

  Vue.component('swiper-slide', swiperSlide)
  Vue.component('swiper', swiper)
  Vue.component('slick', Slick)

  Vue.component('cart-summary', CartSummary)

  Vue.component('vue-recaptcha', VueRecaptcha)
  // Vue.component('datepicker', DatePicker)

  Vue.component('loading', Loading)
  Vue.component('pulse-loader', PulseLoader)
  Vue.component('clip-loader', ClipLoader)
  Vue.component('sync-loader', SyncLoader)
}
