<template lang="pug">
  div
    app-header
    app-categories

    section(class='o-wrapper')
      p(class='u-mt4' v-if='currentItem')
        router-link(class='u-color-text u-text-decoration-none', :to="{name: 'Home'}") Inicio
        span(class='u-mr2') &nbsp;-
        router-link(class='u-color-text u-text-decoration-none', :to="{name: 'Catalog'}") Catálogo
        span(class='u-mr2') &nbsp;-
        router-link(class='u-color-text u-text-decoration-none', :to="{name: 'Category', params:{categorySlug: currentItem.categorySlug}}") {{currentItem.categoryName}}
        span(class='u-mr2') &nbsp;-
        router-link(
          class='u-color-text u-text-decoration-none',
          :to="{name: 'Subcategory', params:{categorySlug: currentItem.categorySlug, subcategorySlug: currentItem.subcategorySlug}}"
        ) {{currentItem.subcategoryName}}

      h1(class='u-mt3 u-fz-h3 u-mb4  u-border-bottom u-pb2') {{currentItem.itemName}}

      div(class='c-item-description')
        div( class='c-item-description__images')
          div(class='u-mb4' v-if='currentImages.length > 0')
            slick(ref="slickMain", :options="slickMain" class='slider-main')
              figure(class='u-m0' v-for='(image, index) in currentImages')
                img(:src='image.url')

          div(class='u-mb4 u-flex u-items-center' v-if='currentImages.length > 0')
            button(class='c-btn-nav'  @click='$refs.slickMain.prev()')
              i(class='u-icon arrow_left')
            div(class='u-mx2 u-flex-1 u-1/12')
              slick(ref="slickThumbs", :options="slickThumbs" class='slider-nav slick-thumbs ' style='height: 70px' )
                figure(v-for='(image, index) in currentImages' class='u-mx1 u-mt0 u-mb0', :key='index')
                  img(:src='image.urlThumb')
            button(class='c-btn-nav'  @click='$refs.slickMain.next()')
              i(class='u-icon arrow_right')

        div(class='c-item-description__prices u-pb4')
          price(
            :price='currentItem.promotion.flag ? currentItem.promotion.price : currentItem.price'
            class='c-item__current-price' v-if='currentItem')

          price(:price='currentItem.price' class='c-item__previous-price' v-if='currentItem && currentItem.promotion.flag')

          p(class='c-item__discount-price' v-if='currentItem && currentItem.promotion.flag') Ahorras&nbsp;
            price(:price='currentItem.price - currentItem.promotion.price' class='u-inline')

          a(
            v-if="currentItem.dataSheet"
            target="_blank"
            :href="currentItem.dataSheet"
            class="u-color-primary"
          ) Ficha técnica

          button(
            :disabled='currentItem.stock === 0',
            class='u-show@tablet u-12/12 c-btn--primary u-mb2 u-mt3'
            @click='addItemToCart'
          ) Agregar al Carrito

          button(
            @click="$router.push({name: 'Info', query:{producto: currentItem.id, separar: true}})"
            class='u-show@tablet u-12/12 c-btn--secondary'
            :disabled='currentItem.stock === 0'
          ) Separar Ahora

          p(class='u-flex' v-if='currentItem.stock')
            i(class='u-icon check_circle u-color-success u-mr1 u-fz-h5')
            span Disponible:
              strong  {{currentItem.stock}} Unidad{{currentItem.stock !== 1 ? 'es' : ''}}

          p(class='u-flex' v-else)
            i(class='u-icon remove_circle u-color-error u-mr1 u-fz-h5')
            span No disponible

          a(
            :href="`https://wa.me/51${company.cellphone}?text=${getMessage}`"
            target="_blank"
            class="c-btn--whatsapp u-flex u-items-center u-justify-center u-mb3"
          )
            i(class="u-icon u-fz-h5 u-mr2") whatsapp
            span Consultar
          hr

          div.u-mb2.u-flex.u-items-center
            i(class="u-icon u-fz-h3") truck
            p(class="u-fw-bold u-mt0 u-mb0 u-mx3") Despacho a Domicilio
            button(class="u-bg-primary u-white u-px3 u-fz-xs u-py2 u-br2") Consultar
          div.u-flex.u-items-center
            i(class="u-icon u-fz-h3") store
            p(class="u-fw-bold u-mt0 u-mb0 u-mx3") Despacho a Domicilio
            button(class="u-bg-primary u-white u-px3 u-fz-xs u-py2 u-br2") Consultar

          p(class='u-fw-bold u-color-text u-mb2') Comparte con tus amigos:
          share-buttons(:title='currentItem.itemName', :shares="['whatsapp', 'facebook', 'twitter', 'google_plus']")

        div(class='c-item-description__info')
          p(class='u-uppercase u-fz-h5 u-fw-bold u-mt0') Descripción
          div(v-html='currentItem.description' class='c-item-content u-color-text')

    section(v-if='currentItem.specifications || currentItem.features')
      div(class='c-item-nav')
        button(v-if='currentItem.specifications'
          class='c-item-nav__button', @click='selectedContent = 1'
          :class="{'is-active' : selectedContent === 1}") Detalles

        button(v-if='currentItem.features'
          class='c-item-nav__button', @click='selectedContent = 2'
          :class="{'is-active' : selectedContent === 2}") Características

      div(class='c-item-content o-wrapper' v-html='currentItem.specifications' v-if='selectedContent === 1')
      div(class='c-item-content o-wrapper' v-html='currentItem.features' v-if='selectedContent === 2')

    section(class='u-mt3 u-hide@tablet u-mt3' id='item-buttons')
      div(class='u-flex u-fixed u-bottom-0 u-12/12  u-z2' id='item-buttons__container')
        button(
          :disabled='currentItem.stock === 0',
          @click="$router.push({name: 'Info', query:{producto: currentItem.id, separar: true}})"
          class='c-btn--primary u-flex-1 u-br0'
        ) Separar ahora

        button(
          :disabled='currentItem.stock === 0',
          class='c-btn--secondary u-flex-1 u-br0'
          @click='addItemToCart'
        ) Agregar al Carrito

    section(class='u-pt3' v-if='related.length > 0')
      h2(class='o-wrapper u-center u-fw-bold u-line-height-1 u-mb4') Productos Relacionados

      app-section(:items="related", :category-name='currentItem.categoryName' class='u-mb4 o-container')

    app-footer
    loading(v-if='isLoading')
    mini-cart(v-if='isShowMiniCart' @hide='isShowMiniCart = false')
</template>

<script>
import axios from 'axios'
import {mapActions, mapState} from 'vuex'
import MiniCart from 'components/MiniCart'

export default {
  components: {MiniCart},
  data () {
    return {
      isShowMiniCart: false,
      selectedContent: 1,
      currentItem: false,
      isLoading: true,
      selectedImage: 0,
      currentImages: [],
      related: [],
      slickMain: {
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        adaptiveHeight: true,
        asNavFor: '.slider-nav'
      },
      slickThumbs: {
        slidesToShow: 4,
        slidesToScroll: 1,
        asNavFor: '.slider-main',
        arrows: false,
        // centerMode: true,
        focusOnSelect: true,
        responsive: [
          {
            breakpoint: 478,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 1
            }
          }
        ]
      }
    }
  },

  computed: {
    ...mapState({
      company: s => s.company.company
    }),

    getMessage () {
      return encodeURI(`Hola, deseo información de: ${this.currentItem.itemName} - ${window.location.href}`)
    },

    currentImage () {
      if (this.selectedImage) {
        return this.currentItem.images.find((i) => i.id === this.selectedImage)
      }
      return false
    }
  },

  beforeRouteEnter (to, from, next) {
    axios.get(`${window.API_URL}/items/${to.params.slug}`)
      .then(({data}) => {
        next((vm) => {
          vm.currentItem = data.data

          setTimeout(() => {
            vm.isLoading = false
          }, 500)
        })
      })
      .catch(() => {
        next({name: 'NotFound'})
      })
  },

  watch: {
    $route () {
      this.getProduct()
    },

    currentItem (val) {
      this.getRelated()

      if (val.images.length > 0) {
        this.currentImages = val.images
        this.selectedImage = val.images[0].id
        const self = this
        setTimeout(() => {
          self.$refs.slickMain.reSlick()
        }, 1000)
      }
    }
  },

  mounted () {
    setTimeout(() => {
      if (window.window.innerWidth < 768) {
        const itemButtons = document.getElementById('item-buttons')
        const itemButtonsContainer = document.getElementById('item-buttons__container')
        window.addEventListener('scroll', this.handleScroll)
        itemButtons.style.height = itemButtonsContainer.offsetHeight + 'px'
      }
    }, 500)
  },

  beforeDestroy () {
    if (window.window.innerWidth < 768) {
      window.removeEventListener('scroll', this.handleScroll)
    }
  },

  methods: {
    ...mapActions([
      'addToWebCart'
    ]),

    addItemToCart () {
      this.addToWebCart([{
        itemId: this.currentItem.id,
        stock: this.currentItem.stock,
        quantity: 1
      }])

      this.isShowMiniCart = true
    },

    getProduct () {
      this.isLoading = true
      axios.get(`${window.API_URL}/items/${this.$route.params.slug}`)
        .then(({data}) => {
          this.currentItem = data.data
          const self = this
          setTimeout(() => {
            self.isLoading = false
          }, 500)
        })
    },

    getRelated () {
      axios.get(`${window.API_URL}/items/${this.$route.params.slug}/related`)
        .then(({data}) => {
          this.related = data.data
        })
    },

    handleScroll () {
      let win = window.$(window)
      const itemButtons = document.getElementById('item-buttons')
      const itemButtonsContainer = document.getElementById('item-buttons__container')
      // if (win.scrollTop() >= 0 && win.scrollTop() <= this.$refs.header) {

      if (win.scrollTop() >= 0 && win.scrollTop() < itemButtons.offsetTop - window.$(window).height()) {
        itemButtonsContainer.classList.add('u-fixed')
      } else {
        itemButtonsContainer.classList.remove('u-fixed')
      }
    }
  }
}
</script>
