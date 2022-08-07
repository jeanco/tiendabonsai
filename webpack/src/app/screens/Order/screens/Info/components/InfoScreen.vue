<template lang="pug">
  main(class='c-order-info o-container')
    div(class='c-order-info__form')
      h2(class='c-order__subtitle') Ingresa tus datos personales
      form(@submit.prevent='')
        input-validate(
          @input='debounceInput',
          v-model='personForm.identityDocument',
          :rule='rules.identityDocument',
          :validation='toggleValidation'
          placeholder='DNI'
          label='Documento de identidad'
          class='u-mb3'
        )

        input-validate(
          @input='debounceInput',
          v-model='personForm.firstName',
          :rule='rules.firstName',
          :validation='toggleValidation'
          placeholder='Nombres y Apellidos'
          label='Nombres y Apellidos'
          class='u-mb3'
        )

        //- input-validate(
          v-model='personForm.lastName',
          :rule='rules.lastName',
          :validation='toggleValidation'
          placeholder='Apellidos'
          label='Apellidos'
          class='u-mb3'
        //- )

        input-validate(
          @input='debounceInput',
          v-model='personForm.whatsapp',
          :rule='rules.whatsapp',
          :validation='toggleValidation'
          placeholder='Celular / Whatsapp'
          label='Celular / Whatsapp'
          class='u-mb3'
        )

        input-validate(
          @input='debounceInput',
          v-model='personForm.email',
          :rule='rules.email',
          :validation='toggleValidation'
          placeholder='Correo'
          label='Email'
          class='u-mb3'
        )

        input-validate(
          v-model='personForm.birthday',
          :validation='toggleValidation'
          placeholder='Ejm: 01 de Enero de 1980'
          label='Fecha de Cumpleaños'
          class='u-mb3'
        )

        select-validate(
          :options='countries'
          v-model='personForm.countryId',
          :rule='rules.countryId',
          :validation='toggleValidation'
          label='País'
          placeholder='País'
          class='u-mb3'
        )

        select-validate(
          :is-disabled='cities.length === 0'
          :options='cities'
          v-model='personForm.cityId',
          :rule='rules.cityId',
          :validation='toggleValidation'
          placeholder='Seleccione la Ciudad'
          label='Ciudad'
          class='u-mb3'
        )

        input-validate(
          v-model='personForm.address',
          :rule='rules.address',
          :validation='toggleValidation'
          placeholder='Su dirección'
          label='Dirección'
        )

    div(class='c-order-info__payments')
      template(v-if='Boolean($route.query.separar)')
        h2(class='c-order__subtitle') Separar ahora
        p
          span Puede separar su pedido por un periodo de&nbsp;
          strong 30 días
          span , dejando un adelanto de&nbsp;
          strong 10%&nbsp;
          span del producto.

        p(class='u-mb4')
          i(class='u-color-secondary u-fz-h3 u-block u-icon video_call')
          strong Llamar al
          span(class='u-fz-h5 u-block') (+51)(052) 427894

      h2(class='c-order__subtitle') Formas de pago
      ul(class='u-list-reset')
        li(v-for='account in accounts' class='u-mt3')
          strong {{account.name}}
          ul(class='u-list-reset')
            li(
              v-for='entity in account.entities',
              class='u-mt3'
            )
              div(class='c-entity')
                button(
                  @click='selectedEntity = entity.id',
                  :class="{'is-active' : selectedEntity === entity.id}"
                  class='c-entity__btn'
                )

                div(class='u-color-text')
                  img(:src='entity.logoUrl' class='c-entity__image' v-if='entity.logoUrl')
                  p(class='u-mt0 u-mb1') {{entity.title}}
                  p(class='u-mt0 u-mb1') {{entity.accountInfo}}
                  p(class='u-mt0 u-mb1') {{entity.propietaryDocument}}
                  p(class='u-mt0 u-mb1') {{entity.propietary}}
                  p(class='u-mt0 u-mb1') {{entity.instructions}}

    div(class='c-order-detail__summary')
      cart-summary(v-if='Boolean($route.query.separar) === false')
      div(class='' v-else)
        table(class='u-mb3 c-order-detail__summary-table' v-if='currentItem')
          caption() Resumen de tu orden

          tbody
            tr
              td(class='') {{currentItem.name}}

              td(class='u-px2')
                input-quantity(
                  :quantity='currentQuantity'
                  :max-quantity='currentItem.stock'
                  @update='updateQuantity')

              td(class='u-right-align'): price(:price='currentPrice')
          tfoot
            tr
              td(colspan='2') TOTAL
              td(class='u-right-align'): price(:price='currentPrice * currentQuantity')
            tr
              td(colspan='2') Adelanto a pagar
              td(class='u-right-align'): price(:price='(currentPrice * currentQuantity) * 0.1')

      button(
        class='c-btn--primary u-uppercase u-block u-12/12 u-mb3'
        v-if='webCart.length >= 1 || currentItem'
        @click='postOrder') Aceptar

      router-link(:to="{name: 'Catalog'}" class='u-color-default  u-mt3' v-else) Volver al cátalogo

      //- div(class='u-right-align u-px2') Costo de Envíos a Tacna: S/ 20.00

    modal-success(
      v-if='isShowModalSuccess'
      @hide='isShowModalSuccess = false',
      @cancel='goCatalog'
      @confirm='goOrder'
      text-button-cancel='Seguir Comprando'
      :message='modalMessage'
      :show-button-cancel='true'
      :show-button-confirm='false'
    )

    loading(v-if='isLoading' message='Enviando')
</template>

<script>
import debounce from 'lodash.debounce'
import axios from 'axios'
import {decamelizeKeys} from 'humps'
import {mapGetters, mapActions} from 'vuex'
import Validator from 'validatorjs'

export default {
  data () {
    return {
      currentQuantity: 1,
      isLoading: false,
      isShowModalSuccess: false,
      isShowModalError: false,
      modalMessage: '',
      currentItem: false,
      countries: [],
      accounts: [],
      toggleValidation: false,
      isFormValidation: false,
      selectedEntity: 0,
      selectedCity: false,
      personForm: {
        identityDocument: '',
        birthday: '',
        firstName: '',
        lastName: '',
        email: '',
        countryId: 0,
        cityId: 0,
        whatsapp: '',
        address: ''
      },
      rules: {
        identityDocument: 'required',
        firstName: 'name',
        lastName: 'name',
        email: 'required|email',
        countryId: 'min:1',
        cityId: 'min:1',
        whatsapp: 'phone',
        address: 'required'
      }
    }
  },

  computed: {
    ...mapGetters([
      'webCart'
    ]),

    cities () {
      if (this.personForm.countryId) {
        let country = this.countries.find(c => c.id === this.personForm.countryId)
        if (country !== -1) {
          return country.cities
        }
      }
      return []
    },

    currentPrice () {
      if (this.currentItem) {
        return this.currentItem.promotion.flag ? this.currentItem.promotion.price : this.currentItem.price
      }
      return 0
    }
  },

  watch: {
    'personForm.countryId' (val) {
      this.personForm.cityId = 0
    },

    'personForm.identityDocument' (value, oldValue) {
      if (value.length > 7) {
        this.getCustomer()
      }
    }
  },

  created () {
    this.getCountries()
    this.getAccounts()
    if (this.$route.query.separar) {
      this.getItem()
    }
  },

  methods: {
    ...mapActions([
      'checkoutWebCart'
    ]),

    getCustomer: debounce(function () {
      axios.get(`${window.API_URL}/customers/${this.personForm.identityDocument}`)
        .then(({data}) => {
          for (const key in data.data) {
            if (key === 'cityId') {
              for (let country of this.countries) {
                let city = country.cities.find(r => r.id === data.data[key])

                if (city) {
                  this.selectedCity = city
                }
              }
            } else {
              this.personForm[key] = data.data[key]
            }
          }
          this.validate()
        })
        .catch((e) => {
          this.selectedCity = false
          for (const key in this.personForm) {
            if (key === 'countryId' || key === 'cityId') {
            } else if (key !== 'identityDocument') {
              this.personForm[key] = ''
            }
          }
          this.validate()
        })
    }, 500),

    goCatalog () {
      this.$router.push({name: 'Catalog'})
    },

    goOrder () {
      this.$router.push({name: 'Catalog'})
    },

    updateQuantity ({quantity}) {
      this.currentQuantity = quantity
    },

    getCountries () {
      axios.get(`${window.API_URL}/countries`)
        .then(({data}) => {
          this.countries = data.data
          if (this.countries.length > 0) {
            this.personForm.countryId = this.countries[0].id
          }
        })
    },

    getAccounts () {
      axios.get(`${window.API_URL}/accounts`)
        .then(({data}) => {
          this.accounts = data.data
          if (this.accounts.length > 0) {
            this.selectedEntity = this.accounts[0].id
          }
        })
    },

    postOrder () {
      this.validate()
      if (!this.isLoading && (this.currentItem || this.webCart.length > 0) && this.selectedEntity && this.isFormValidation) {
        this.isLoading = true
        let separatedItem = [
          {
            itemId: this.currentItem.itemId,
            quantity: this.currentQuantity
          }
        ]

        axios.post(`${window.API_URL}/orders`, decamelizeKeys({
          isSeparated: Boolean(this.$route.query.separar),
          accountId: this.selectedEntity,
          currencyId: 1,
          person: this.personForm,
          items: this.$route.query.separar ? separatedItem : this.webCart
        }))
          .then((response) => {
            this.modalMessage = response.data.message
            this.isLoading = false
            this.isShowModalSuccess = true

            if (!this.$route.query.separar) {
              this.checkoutWebCart()
            }
          })
          .catch((err) => {
            console.log(err)
            this.isLoading = false
            this.isShowModalError = true
          })
      }
    },

    validate () {
      let validation = new Validator(this.personForm, this.rules)
      validation.passes()
      this.toggleValidation = !this.toggleValidation
      this.isFormValidation = validation.passes()
    },

    getItem () {
      axios.get(`${window.API_URL}/items/cart`, {
        params: {
          q: [this.$route.query.producto]
        },
        paramsSerializer: (params) => {
          return window.Qs.stringify(params, { arrayFormat: 'indices' })
        }
      })
        .then(({data}) => {
          if (data.data.length > 0) {
            this.currentItem = data.data[0]
          } else {
            this.$router.push({name: 'Catalog'})
          }
        })
        .catch(() => {
          this.$router.push({name: 'Catalog'})
        })
    },

    debounceInput: debounce(function () {
      this.validate()
    }, 250)
  }
}
</script>
