<template lang='pug'>
  div
    app-header()

    article(
      class='parallax u-white u-center u-py6 o-container u-center',
      v-if='cover'
      :style='{backgroundImage: `url(${cover.backgroundUrl})`}'
    )
      h1(v-html='cover.title' class='u-mt0 u-mb3 u-fz-h1 u-line-height-1 u-center')
      p(class='u-mb4') {{cover.subtitle}}
      button(class='c-btn--primary u-px4 u-uppercase' v-scroll-to="'#formulario'" ) Registrate

    article(class='u-py5 o-container')
      h2(class='u-fz-h3 u-center u-mt3') {{about.title}}

      div(v-html='about.description' class='u-7/12@tablet u-mx-auto'  )

    article(class='u-py6 u-relative' v-if='inscription')
      div(class='u-bg-image  u-bg-darken')
        img(:src='inscription.backgroundUrl')
      div(class='u-relative u-white o-container')
        h2(class='u-fz-h2 u-uppercase u-center u-mt3' v-html='inscription.title' )
        div(v-html='inscription.description' class='u-7/12@tablet u-mx-auto' )

    article(class='u-py5')
      form(class='c-boyfriends-form' @submit.prevent='postForm' id='formulario' )
        div(class='c-boyfriends-form__container' )
          h2(class='u-px2 u-mt0 u-mb0 u-line-height-1') Llena el formulario para participar
          div(class='u-flex u-flex-wrap')
            div(class='u-px2 u-6/12@tablet u-12/12')
              div(class='u-flex u-color-primary u-items-center u-my3')
                img(src='/images/girlfriend.png' class="c-boyfriends-form__icon")
                p(class='u-fw-s-bold u-m0 u-fz-h5') Datos de la novia
              input-validate(
                placeholder='Nombres y apellidos'
                label='Nombres y apellidos'
                class='u-mb3'
                :validation='toggleValidate'
                v-model='formBoyfriends.girlfriend.fullname'
                :rule='rulesBoyfriends.girlfriend.fullname'
              )
              input-validate(
                placeholder='Documento de identidad'
                label='DNI'
                class='u-mb3'
                :validation='toggleValidate'
                v-model='formBoyfriends.girlfriend.identityDocument'
                :rule='rulesBoyfriends.girlfriend.identityDocument'
              )
              input-validate(
                placeholder='Celular'
                label='Celular'
                type='tel'
                class='u-mb3'
                :validation='toggleValidate'
                v-model='formBoyfriends.girlfriend.cellphone'
                :rule='rulesBoyfriends.girlfriend.cellphone'
              )
              input-validate(
                placeholder='Correo Electrónico'
                label='Correo'
                type='email'
                class='u-mb3'
                :validation='toggleValidate'
                v-model='formBoyfriends.girlfriend.email'
                :rule='rulesBoyfriends.girlfriend.email'
              )
              input-validate(
                placeholder='Fecha de nacimiento'
                label='Fecha de nacimiento'
                class='u-mb3'
                :validation='toggleValidate'
                v-model='formBoyfriends.girlfriend.birthday'
                :rule='rulesBoyfriends.girlfriend.birthday'
              )
              input-validate(
                placeholder='Dirección'
                label='Dirección'
                class='u-mb3'
                :validation='toggleValidate'
                v-model='formBoyfriends.girlfriend.address'
                :rule='rulesBoyfriends.girlfriend.address'
              )
            div(class='u-px2 u-6/12@tablet u-12/12')
              div(class='u-flex u-color-primary u-items-center u-my3')
                img(src='/images/boyfriend.png' class="c-boyfriends-form__icon")
                p(class='u-fw-s-bold u-m0 u-fz-h5') Datos del novio
              input-validate(
                placeholder='Nombres y apellidos'
                label='Nombres y apellidos'
                class='u-mb3'
                :validation='toggleValidate'
                v-model='formBoyfriends.boyfriend.fullname'
                :rule='rulesBoyfriends.boyfriend.fullname'
              )
              input-validate(
                placeholder='Documento de identidad'
                label='DNI'
                class='u-mb3'
                :validation='toggleValidate'
                v-model='formBoyfriends.boyfriend.identityDocument'
                :rule='rulesBoyfriends.boyfriend.identityDocument'
              )
              input-validate(
                placeholder='Celular'
                label='Celular'
                type='tel'
                class='u-mb3'
                :validation='toggleValidate'
                v-model='formBoyfriends.boyfriend.cellphone'
                :rule='rulesBoyfriends.boyfriend.cellphone'
              )
              input-validate(
                placeholder='Correo Electrónico'
                label='Correo'
                type='email'
                class='u-mb3'
                :validation='toggleValidate'
                v-model='formBoyfriends.boyfriend.email'
                :rule='rulesBoyfriends.boyfriend.email'
              )
              input-validate(
                placeholder='Fecha de nacimiento'
                label='Fecha de nacimiento'
                class='u-mb3'
                :validation='toggleValidate'
                v-model='formBoyfriends.boyfriend.birthday'
                :rule='rulesBoyfriends.boyfriend.birthday'
              )
              input-validate(
                placeholder='Dirección'
                label='Dirección'
                class='u-mb3'
                :validation='toggleValidate'
                v-model='formBoyfriends.boyfriend.address'
                :rule='rulesBoyfriends.boyfriend.address'
              )
          hr(class='u-mx2  u-mb3')
          div(class='u-flex u-flex-wrap')
            input-validate(
              placeholder='Dirección'
              label='Dirección del lugar de la boda'
              class='u-mb3 u-12/12 u-px2'
              v-model='formBoyfriends.address'
              :rule='rulesBoyfriends.address'
              :validation='toggleValidate'
            )
            input-validate(
              placeholder='Hora de la boda'
              label='Hora'
              class='u-mb3 u-6/12@tablet u-12/12 u-px2'
              v-model='formBoyfriends.hour'
              :rule='rulesBoyfriends.hour'
              :validation='toggleValidate'
            )
            input-validate(
              placeholder='Fecha de la boda'
              label='Fecha'
              class='u-mb3 u-6/12@tablet u-12/12 u-px2'
              v-model='formBoyfriends.date'
              :rule='rulesBoyfriends.date'
              :validation='toggleValidate'
            )
          div(class='u-center u-mt3')
            button(type='submit' class='c-btn--primary u-px4 u-uppercase') Registrarme

    article(v-if='gallery.length > 0')
      h2(class='u-fz-h2 u-uppercase u-mt0 u-mb2 o-container u-center u-line-height-1')
        | Ellos ya están
        br
        | Participando
      p(class='u-center o-container u-mb4 u-mt0' ) Inspírate de otros novios y si te gustan contáctanos

      div(class='u-relative' )
        swiper(:options='swiperImages')
          swiper-slide(v-for='(image, index) in gallery', :key='index')
            progressive-img(
              v-if='image.imageUrl'
              :src="image.imageUrl",
              :placeholder='image.imageThumbUrl',
              :blur="10"
            )

        button(class='c-btn-nav c-btn-nav--secondary c-btn-nav--prev' id='image__prev')
          i(class='u-icon arrow_left')
        button(class='c-btn-nav c-btn-nav--secondary c-btn-nav--next' id='image__next')
          i(class='u-icon arrow_right')

    app-footer
    loading(v-if='isLoading')
</template>

<script>
import axios from 'axios'
import Validator from 'validatorjs'

export default {
  data () {
    return {
      about: false,
      cover: false,
      gallery: [],
      inscription: false,
      isLoading: false,
      toggleValidate: false,
      formValidate: false,
      swiperImages: {
        navigation: {
          nextEl: '#image__next',
          prevEl: '#image__prev'
        },
        slidesPerView: 3,
        grabCursor: true,
        autoplay: {
          disableOnInteraction: false,
          delay: 5000
        },
        breakpoints: {
          420: {
            slidesPerView: 1
          },
          768: {
            slidesPerView: 2
          }
        }
      },
      formBoyfriends: {
        recaptcha: '',
        girlfriend: {
          fullname: '',
          identityDocument: '',
          cellphone: '',
          email: '',
          address: '',
          birthday: ''
        },
        boyfriend: {
          fullname: '',
          identityDocument: '',
          cellphone: '',
          email: '',
          address: '',
          birthday: ''
        },
        address: '',
        hour: '',
        date: ''
      },
      rulesBoyfriends: {
        recaptcha: '',
        girlfriend: {
          fullname: 'required',
          identityDocument: 'required',
          cellphone: 'required|phone',
          email: 'required|email'
        },
        boyfriend: {
          fullname: 'required',
          identityDocument: 'required',
          cellphone: 'required|phone',
          email: 'required|email'
        },
        date: 'required'
      }
    }
  },

  created () {
    this.getData()
  },

  methods: {
    getData () {
      axios.get(`${window.API_URL}/boyfriends-club`)
        .then(({data}) => {
          this.cover = data.data.cover
          this.about = data.data.about
          this.gallery = data.data.gallery
          this.inscription = data.data.inscription
        })
    },

    postForm () {
      this.validate()
      if (this.formValidate && !this.isLoading) {
        this.isLoading = true
        axios.post(`${window.API_URL}/boyfriends-register`, this.formBoyfriends)
          .then(({data}) => {
            this.$swal({
              type: 'success',
              title: data.title,
              text: data.message,
              confirmButtonText: 'Aceptar'
            })

            this.isLoading = false
            this.formBoyfriends = {
              recaptcha: '',
              girlfriend: {
                fullname: '',
                identityDocument: '',
                cellphone: '',
                email: '',
                address: '',
                birthday: ''
              },
              boyfriend: {
                fullname: '',
                identityDocument: '',
                cellphone: '',
                email: '',
                address: '',
                birthday: ''
              },
              address: '',
              hour: '',
              date: ''
            }
          })
          .catch(() => {
            this.isLoading = false

            this.$swal({
              type: 'error',
              title: 'Title',
              text: 'Text',
              confirmButtonText: 'Aceptar'
            })
          })
      }
    },

    validate () {
      let validation = new Validator(this.formBoyfriends, this.rulesBoyfriends)
      validation.passes()
      this.toggleValidate = !this.toggleValidate
      this.formValidate = validation.passes()
    }
  }
}
</script>

<style lang='scss' scoped>
.service-cover {
  &__subtitle {
    &:after {
      content: '';
      display: block;
      width: 90px;
      height: 5px;
      background: white;
      margin-left: auto;
      margin-right: auto;
      margin-top: 1.5rem;
      border-radius: 4px;
    }
  }
}
.parallax {
  background-attachment: fixed;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  max-width:100%;
}
</style>
