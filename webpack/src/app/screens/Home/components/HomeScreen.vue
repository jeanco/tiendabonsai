<template lang="pug">
  div
    app-header
    section(v-if='company && company.covers.length > 0' class='u-relative')
      slick(
        ref="slickCover"
        :options="slickCover"
        v-if='company && company.covers.length > 0'
        class='slick-height-auto'
      )
        a(
          v-for='(cover, index) in company.covers'
          class='u-block',
          :target="(cover.isBlank && cover.linkUrl !== '#') ? '_blank' : ''",
          :href='cover.linkUrl'
        )
          picture(class='u-block')
            source(class='u-12/12' media='(min-width: 767.84px', :srcset='cover.imageUrl', :alt='cover.title', :title='cover.title')
            img(class='u-12/12', :src='cover.imageUrlThumb', :alt='cover.title', :title='cover.title')

      button(class='c-btn-nav c-btn-nav--prev u-show@tablet' id='cover__prev' @click='$refs.slickCover.prev()')
        i(class='u-icon arrow_left')
      button(class='c-btn-nav c-btn-nav--next u-show@tablet' id='cover__next' @click='$refs.slickCover.next()')
        i(class='u-icon arrow_right')
    app-categories

    section(class='o-container u-pt4')
      article(v-if='offers.length > 0' class='u-mb4 u-relative')
        swiper(:options='swiperOffers')
          swiper-slide(v-for='(offer, index) in offers', :key='index')
            section(class='c-offers')
              router-link(
                v-for='(item, index) in offer',
                :to="{name:'Product', params:{slug: item.itemSlug}}"
                :key='index'
                class='c-offers__item'
              )
                //- app-image(:image-src='item.imageUrl')
                img(:src='item.imageUrl')

        button(class='c-btn-nav c-btn-nav--secondary c-btn-nav--prev' id='offer__prev')
          i(class='u-icon arrow_left')
        button(class='c-btn-nav c-btn-nav--secondary c-btn-nav--next' id='offer__next')
          i(class='u-icon arrow_right')

      article(v-if='catalogs.length > 0' class='u-mb4 u-relative')
        swiper(:options='swiperCatalogs')
          swiper-slide(v-for='(catalog, index) in catalogs', :key='index')
            a(class='u-block', target='_blank', :href='catalog.link')
              //- picture(class='u-block')
                source(class='u-12/12' media='(min-width: 767.84px', :srcset='catalog.imageUrl')
                img(class='u-12/12', :src='catalog.imageThumbUrl')

              progressive-img(:src="catalog.imageUrl", :blur="10")

        button(class='c-btn-nav c-btn-nav--secondary c-btn-nav--prev' id='catalog__prev')
          i(class='u-icon arrow_left')
        button(class='c-btn-nav c-btn-nav--secondary c-btn-nav--next' id='catalog__next')
          i(class='u-icon arrow_right')

      article(v-if='brands.length > 0' class='u-mb4 u-show@tablet' )
        ul(class='u-list-reset u-flex u-flex-wrap u-justify-center u-pt3')
          li(v-for='brand in brands' class='u-px3 u-mb3' )
            a(:href='brand.link' target='_blank')
              img(:src='brand.imageUrl', :alt='brand.name', :title='brand.name'  class='u-brand')

      article(v-if='categories.length > 0' class='u-mb4' )
        h2(class='u-center u-line-height-1')
          span(class='u-fw-regular u-mr2') Descubre nuestros
          strong productos destacados

        app-section(
          v-for='(category, index) in categories',
          :key='index',
          :category-name='category.name',
          :category-icon='category.iconUrl',
          :items='category.items'
          :is-related='false'
          @show-cart='isShowMiniCart = true'
          class='u-mb4'
        )

      article(class='c-social-network u-mb4' id='suscription' )
        div(class='c-social-network__info')
          p
            span(class='u-fw-bold') Síguenos&nbsp;
            span en nuestras redes sociales
        a(v-if='company.facebookPage' class='c-social-network__link c-social-network--facebook', :href='company.facebookPage' target='_blank')
          i(class='u-icon facebook')
        a(v-if='company.twitterPage' class='c-social-network__link c-social-network--twitter' , :href='company.twitterPage' target='_blank')
          i(class='u-icon twitter')
        a(v-if='company.youtubePage' class='c-social-network__link c-social-network--youtube' , :href='company.youtubePage' target='_blank')
          i(class='u-icon youtube_play')
        a(v-if='company.googlePage' class='c-social-network__link c-social-network--google' , :href='company.googlePage' target='_blank')
          i(class='u-icon google_plus')
        a(v-if='company.instagramPage' class='c-social-network__link c-social-network--instagram' , :href='company.instagramPage' target='_blank')
          i(class='u-icon instagram')

      article(class='c-subscribe' )
        div(class='u-1/12@tablet u-mt0 u-white u-mb3 u-flex-1 u-px3')
          i(class='u-mb3 u-icon newsletter u-white u-fz-h1')
        div(class='u-11/12@tablet')
          p(class='u-mt0 u-white u-mb3 u-flex-1 u-px3')
            strong(class='u-fz-h5') Suscríbete
            br
            | Estarás informado al momento de todas nuestras ofertas y novedades
        div(class='u-12/12@tablet')
          form(@submit.prevent='postSubscription' class='c-subscribe__form')
            input(
              class='c-input-circle u-3/12@tablet u-mx1 u-mb3'
              type='text'
              required
              placeholder='Ingrese su nombre' v-model='subcriptionForm.name')
            input(
              class='c-input-circle u-3/12@tablet u-mx1 u-mb3'
              type='text'
              placeholder='Ingrese su celular'
              v-model='subcriptionForm.cell')
            input(
              class='c-input-circle u-3/12@tablet u-mx1 u-mb3'
              type='email'
              required placeholder='Ingrese su correo'
              v-model='subcriptionForm.email')
            input(
              class='c-input-circle u-2/12@tablet u-mx1 u-mb3 c-subscribe__form-submit'
              type='submit'
              value='Suscríbete')
        div(class='u-12/12@tablet')
          label(class='c-checkbox u-12/12@tablet u-mx1 u-mb3')
            input(type='checkbox' v-model='subcriptionForm.receive_offers')
            span(class='c-checkbox__label u-white') Deseo recibir ofertas

      //- router-link(:to="{ name: 'BoyfriendsClub'}" class=' u-fw-bold u-inline-block u-line-1 ')
            img(src='https://dl.dropboxusercontent.com/s/ou0yq0y0oyz34mq/novios.png?dl=0')

    button(
      v-scroll-to="{el: '#root', duration: 1000}"
      class='u-flex u-justify-center u-items-center u-show@tablet u-bg-quinary u-py2 u-fw-bold u-12/12 u-p0 u-color-primary'
    )

      i(class='u-icon arrow_up u-mr2')
      span Subir
    app-footer
    loading(v-if='isFormLoading' message='Enviando')
    mini-cart(v-if='isShowMiniCart' @hide='isShowMiniCart = false')

    modal-success(
      v-if='isShowModalSuccess'
      @hide='isShowModalSuccess = false',
      :message='modalMessage'
    )

    modal-error(
      v-if='isShowModalError'
      @hide='isShowModalError = false',
      :message='modalMessage'
    )

    loading(v-if='isLoading')
</template>

<script>
import {mapGetters} from 'vuex'
import axios from 'axios'
import MiniCart from 'components/MiniCart'

export default {
  components: {MiniCart},
  data () {
    return {
      offers: [],
      catalogs: [],
      categories: [],
      brands: [],
      modalMessage: '',
      isLoading: true,
      isShowModalSuccess: false,
      isShowModalError: false,
      isShowMiniCart: false,
      swiperCover: {
        navigation: {
          nextEl: '#cover__next',
          prevEl: '#cover__prev'
        },
        // loop: true,
        // autoHeight: true
        autoplay: {
          disableOnInteraction: false,
          delay: 10000
        }
      },
      slickCover: {
        arrows: false,
        infinite: true,
        speed: 500,
        fade: true,
        autoplay: true,
        autoplaySpeed: 10000,
        slidesToShow: 1
      },
      swiperOffers: {
        navigation: {
          nextEl: '#offer__next',
          prevEl: '#offer__prev'
        },
        spaceBetween: 16,
        loop: true,
        autoHeight: true,
        autoplay: {
          disableOnInteraction: false,
          delay: 7000
        }
      },
      swiperCatalogs: {
        navigation: {
          nextEl: '#catalog__next',
          prevEl: '#catalog__prev'
        },
        grabCursor: true,
        // autoHeight: true,
        autoplay: {
          disableOnInteraction: false,
          delay: 5000
        }
      },
      subcriptionForm: {
        receive_offers: true,
        email: ''
      },
      isFormLoading: false
    }
  },

  computed: {
    ...mapGetters([
      'company'
    ])
  },

  created () {
    this.getOffers()
    this.getCatalogs()
    this.getBrands()
    this.getItems()

    setTimeout(() => {
      this.isLoading = false
    }, 3000)
  },

  methods: {
    getOffers () {
      axios.get(`${window.API_URL}/items/offers?screen=${window.innerWidth}`)
        .then(({data}) => {
          this.offers = data.data
        })
    },

    getCatalogs () {
      axios.get(`${window.API_URL}/catalogs`)
        .then(({data}) => {
          this.catalogs = data.data
        })
    },

    getBrands () {
      axios.get(`${window.API_URL}/brands`)
        .then(({data}) => {
          this.brands = data.data
        })
    },

    getItems () {
      axios.get(`${window.API_URL}/items/outstanding`)
        .then(({data}) => {
          this.categories = data.data
        })
    },

    postSubscription () {
      if (!this.isFormLoading && this.subcriptionForm.email && this.subcriptionForm.name) {
        this.isFormLoading = true
        axios.post(`${window.API_URL}/subscriptions`, this.subcriptionForm)
          .then(({data}) => {
            this.isFormLoading = false
            this.isShowModalSuccess = true
            this.modalMessage = data.message
            this.subcriptionForm = {
              // accepted_terms: false,
              receive_offers: false,
              email: '',
              cell: '',
              name: ''
            }
          })
          .catch(({response}) => {
            this.isFormLoading = false
            this.isShowModalError = true
            this.modalMessage = response.data.message
          })
      }
    }
  }
}
</script>
