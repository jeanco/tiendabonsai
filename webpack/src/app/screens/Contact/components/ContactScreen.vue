<template lang="pug">
  div
    app-header()
    //- progressive-background(:src="coverImage", :blur="50")
    article(
      class='u-parallax u-white u-center o-container u-center',
      v-show='coverImage'
      :style='{backgroundImage: `url(${coverImage})`}'
    )

    div(class='u-flex u-flex-wrap o-container u-py4 u-justify-between u-items-start' id='contacto')
      div(class='u-7/12@tablet u-12/12 u-my4' )
        h2(class='u-border-bottom u-border-bottom-dashed u-pb3 u-mt0 u-mb4') Contacto
        div(v-html='info')

      form(
        class='u-4/12@tablet u-12/12 u-my4'
        @submit.prevent='postForm'

      )
        p(class='u-mt0 u-fw-s-bold') Llenar el formulario
        input-validate(
          v-model='form.firstName',
          :rule='rules.firstName'
          placeholder='Nombres',
          :validation='toggleValidate'
          input-class='u-bg-white u-border'
          class='u-mb3'
        )

        input-validate(
          v-model='form.lastName',
          :rule='rules.lastName'
          placeholder='Apellidos',
          :validation='toggleValidate'
          input-class='u-bg-white u-border'
          class='u-mb3'
        )

        input-validate(
          v-model='form.email',
          :rule='rules.email'
          placeholder='Correo',
          :validation='toggleValidate'
          type='email'
          input-class='u-bg-white u-border'
          class='u-mb3'
        )

        input-validate(
          v-model='form.cellphone',
          :rule='rules.cellphone'
          placeholder='Celular / Whatsapp',
          :validation='toggleValidate'
          type='tel'
          input-class='u-bg-white u-border'
          class='u-mb3'
        )

        input-validate(
          v-model='form.message',
          :rule='rules.message'
          placeholder='Tu consulta',
          :validation='toggleValidate'
          type='textarea'
          input-class='u-bg-white u-border'
          class='u-mb3'
          rows='5'
        )

        vue-recaptcha(
          @expired="form.recaptcha = ''"
          sitekey='6LdA-g8UAAAAAEvHOIl8vXLSz9sIsDSe4VgkvMPB'
          ref="recaptcha"
          @verify="onVerify"
          class='u-mb3'
        )

        div(class='')
          button(class='c-btn--secondary', :disabled='isLoading') Enviar mensaje

    gmap-map(
      v-if='center'
      :center="center",
      :zoom="18",
      style="height: 80vh"
    )
      gmap-info-window(
        :opened="true",
        :position="marker"
      )
        h3(class='u-mb2 u-mt0 u-center' v-if='company.name') {{company.name}}
        p(class='u-mb0 u-mt0 u-color-text u-fw-s-bold') {{company.address}}

    app-footer
    loading(message='Enviando' v-if='isLoading')
</template>

<script>
import {mapGetters} from 'vuex'
import axios from 'axios'
import Validator from 'validatorjs'

export default {
  data () {
    return {
      center: false,
      marker: false,
      coverImage: '',
      info: '',
      toggleValidate: false,
      formValidate: false,
      isLoading: false,
      form: {
        firstName: '',
        lastName: '',
        cellphone: '',
        email: '',
        message: '',
        recaptcha: ''
      },
      rules: {
        firstName: 'name',
        lastName: 'name',
        email: 'required|email',
        cellphone: 'phone',
        recaptcha: 'required'
      }
    }
  },

  computed: {
    ...mapGetters([
      'company'
    ])
  },

  created () {
    this.getContact()
  },

  methods: {
    postForm () {
      this.validate()

      if (this.formValidate && !this.isLoading) {
        this.isLoading = true
        axios.post(`${window.API_URL}/contact`, this.form)
          .then(({data}) => {
            this.isLoading = false
            this.$swal({
              title: data.title,
              text: data.message,
              type: 'success',
              timer: 7500,
              confirmButtonText: 'Aceptar'
            })
            this.$refs.recaptcha.reset()

            this.form = {
              fullname: '',
              cellphone: '',
              email: '',
              subject: '',
              message: '',
              recaptcha: ''
            }
          })
          .catch(({response}) => {
            this.isLoading = false
            window.toastr.error(response.status, 'Error')
          })
      }
    },

    validate () {
      let validation = new Validator(this.form, this.rules)
      validation.passes()
      this.toggleValidate = !this.toggleValidate
      this.formValidate = validation.passes()
    },

    onVerify (value) {
      this.form.recaptcha = value
    },

    getContact () {
      axios.get(`${window.API_URL}/contact`)
        .then(({data}) => {
          this.coverImage = data.data.coverImageUrl
          this.info = data.data.info
          this.center = {
            lat: data.data.location.latitude,
            lng: data.data.location.longitude
          }
          this.marker = {
            lat: data.data.location.latitude,
            lng: data.data.location.longitude
          }
        })
    }
  }
}
</script>
