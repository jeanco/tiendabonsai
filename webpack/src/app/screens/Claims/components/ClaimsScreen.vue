<template>
  <div>
    <app-header/>

    <article class="u-bg-background">
      <div class="o-container u-py5">
        <h1 class="u-mt0">{{ cover.title }}</h1>
        <div v-html="cover.info"/>
      </div>
    </article>
    <article class="u-flex u-flex-wrap u-justify-between o-container u-py5">
      <div class="u-5/12@tablet u-12/12 u-my3">
        <h2 class="u-fw-regular u-mt0 u-fz-h4 u-mb3">1. Identificación del consumidor reclamante</h2>
        <input-validate
          v-model="claimForm.person.fullname"
          :rule="formRules.person.fullname"
          :validation="toggleValidate"
          class="u-mb3"
          placeholder="Nombres y apellidos"
          label="Nombres y apellidos"
          input-class="u-width-100"
          error-class="u-color-error u-fw-s-bold"/>
        <input-validate
          v-model="claimForm.person.phone"
          :rule="formRules.person.phone"
          :validation="toggleValidate"
          input-class="u-width-100"
          class="u-mb3"
          placeholder="Teléfono celular"
          label="Teléfono celular"
          type="tel"
          error-class="u-color-error u-fw-s-bold"/>
        <input-validate
          v-model="claimForm.person.otherPhone"
          :rule="formRules.person.otherPhone"
          :validation="toggleValidate"
          input-class="u-width-100"
          class="u-mb3"
          placeholder="Otro teléfono"
          label="Otro teléfono (opcional)"
          type="tel"
          error-class="u-color-error u-fw-s-bold"/>
        <input-validate
          v-model="claimForm.person.address"
          :rule="formRules.person.address"
          :validation="toggleValidate"
          input-class="u-width-100"
          class="u-mb3"
          placeholder="Dirección"
          label="Dirección"
          error-class="u-color-error u-fw-s-bold"/>
        <input-validate
          v-model="claimForm.person.reference"
          :rule="formRules.person.reference"
          :validation="toggleValidate"
          input-class="u-width-100"
          class="u-mb3"
          placeholder="Referencia (opcional)"
          label="Referencia"
          error-class="u-color-error u-fw-s-bold"/>
        <input-validate
          v-model="claimForm.person.province"
          :rule="formRules.person.province"
          :validation="toggleValidate"
          input-class="u-width-100"
          class="u-mb3"
          placeholder="País"
          label="País"
          error-class="u-color-error u-fw-s-bold"/>
        <input-validate
          v-model="claimForm.person.region"
          :rule="formRules.person.region"
          :validation="toggleValidate"
          input-class="u-width-100"
          class="u-mb3"
          placeholder="Región"
          label="Región"
          error-class="u-color-error u-fw-s-bold"/>
        <input-validate
          v-model="claimForm.person.district"
          :rule="formRules.person.district"
          :validation="toggleValidate"
          input-class="u-width-100"
          class="u-mb3"
          placeholder="Ciudad"
          label="Ciudad"
          error-class="u-color-error u-fw-s-bold"/>
        <input-validate
          v-model="claimForm.person.documentType"
          :rule="formRules.person.documentType"
          :validation="toggleValidate"
          input-class="u-width-100"
          class="u-mb3"
          placeholder="Tipo de documento"
          label="Tipo de documento"
          error-class="u-color-error u-fw-s-bold"/>
        <input-validate
          v-model="claimForm.person.identityDocument"
          :rule="formRules.person.identityDocument"
          :validation="toggleValidate"
          input-class="u-width-100"
          class="u-mb3"
          placeholder="Nro de documento"
          label="Número de documento"
          error-class="u-color-error u-fw-s-bold"/>
        <input-validate
          v-model="claimForm.person.email"
          :rule="formRules.person.email"
          :validation="toggleValidate"
          input-class="u-width-100"
          placeholder="Email"
          label="Email"
          type="email"
          error-class="u-color-error u-fw-s-bold"/>
      </div>
      <div class="u-5/12@tablet u-12/12 u-my3">
        <h2 class="u-fw-regular u-mt0 u-fz-h4 u-mb3">2. Identificación de producto o servicio</h2>
        <input-validate
          v-model="claimForm.amount"
          :rule="formRules.amount"
          :validation="toggleValidate"
          input-class="u-width-100"
          class="u-mb3"
          placeholder="Monto del bien objeto de reclamo"
          label="Monto del bien objeto de reclamo"
          error-class="u-color-error u-fw-s-bold"/>
        <div class="u-flex u-mb3">
          <div class="c-radio u-mr3"><input
            id="contract1"
            v-model="claimForm.itemOptionId"
            :value="1"
            type="radio"
            name="contract" ><label
              class="c-radio__label"
              for="contract1">Producto</label></div>
          <div class="c-radio"><input
            id="contract2"
            v-model="claimForm.itemOptionId"
            :value="2"
            type="radio"
            name="contract" ><label
              class="c-radio__label"
              for="contract2">Servicio</label></div>
        </div>
        <input-validate
          v-model="claimForm.descriptionItem"
          :validation="toggleValidate"
          :rule="formRules.descriptionItem"
          input-class="u-width-100"
          class="u-mb3"
          type="textarea"
          placeholder="Descripción"
          rows="5"
          error-class="u-color-error u-fw-s-bold"/>
        <input-validate
          v-model="claimForm.paymentVoucher"
          :rule="formRules.paymentVoucher"
          :validation="toggleValidate"
          input-class="u-width-100"
          class="u-mb3"
          placeholder="Comprobante de pago"
          label="Comprobante de pago"
          error-class="u-color-error u-fw-s-bold"/>
        <div>
          <p class="u-mb2">Tipo de reclamaciones</p>
          <div class="c-radio u-mb2"><input
            id="claim1"
            v-model="claimForm.claimOptionId"
            :value="1"
            type="radio"
            name="claim" ><label
              class="c-radio__label"
              for="claim1">Reclamo</label></div>
          <div class="c-radio u-mb2"><input
            id="claim2"
            v-model="claimForm.claimOptionId"
            :value="2"
            type="radio"
            name="claim" ><label
              class="c-radio__label"
              for="claim2">Queja</label></div>
          <div class="c-radio u-mb3"><input
            id="claim3"
            v-model="claimForm.claimOptionId"
            :value="3"
            type="radio"
            name="claim" ><label
              class="c-radio__label"
              for="claim3">Consulta</label></div>
        </div>
        <input-validate
          v-model="claimForm.details"
          :rule="formRules.details"
          :validation="toggleValidate"
          input-class="u-width-100"
          class="u-mb3"
          type="textarea"
          placeholder="Descripción"
          label="Detalle del reclamo"
          rows="5"
          error-class="u-color-error u-fw-s-bold"/>
        <input-validate
          v-model="claimForm.order"
          :rule="formRules.order"
          :validation="toggleValidate"
          input-class="u-width-100"
          class="u-mb3"
          type="textarea"
          placeholder="Descripción"
          label="Pedido del cliente"
          rows="5"
          error-class="u-color-error u-fw-s-bold"/>
        <input-validate
          v-model="claimForm.aboutProvider"
          :rule="formRules.aboutProvider"
          :validation="toggleValidate"
          input-class="u-width-100"
          type="textarea"
          placeholder="Descripción"
          label="Sobre las acciones del proveedor"
          rows="5"
          error-class="u-color-error u-fw-s-bold"/>
      </div>
      <div class="u-center u-12/12 u-mt3">
        <button
          :disabled="isLoading"
          class="u-fw-s-bold c-btn--primary u-uppercase u-px5"
          @click="postForm">Enviar</button></div>
    </article>
    <article class="o-container u-pb5 u-pt4">
      <div v-html="footerInfo"/>
    </article>
    <app-footer/>

    <loading
      v-if="isLoading"
      message="Enviando"/>
  </div>
</template>

<script>
import axios from 'axios'
import Validator from 'validatorjs'

export default {
  data () {
    return {
      cover: false,
      isLoading: false,
      footerInfo: false,
      formValidate: false,
      toggleValidate: false,
      claimForm: {
        person: {
          fullname: '',
          phone: '',
          otherPhone: '',
          district: '',
          address: '',
          province: '',
          reference: '',
          region: '',
          documentType: '',
          identityDocument: '',
          email: ''
        },
        claimOptionId: 0,
        amount: '',
        itemOptionId: 0,
        descriptionItem: '',
        details: '',
        order: ''
      },
      formRules: {
        person: {
          otherPhone: 'phone',
          fullname: 'required|name',
          phone: 'required|phone',
          district: 'required',
          province: 'required',
          region: 'required',
          identityDocument: 'required',
          email: 'email'
        },
        claimOptionId: 'min:1',
        itemOptionId: 'min:1',
        descriptionItem: 'required',
        details: 'required'
      }
    }
  },

  created () {
    this.getData()
  },

  methods: {
    getData () {
      axios.get(`${window.API_URL}/claims`)
        .then(({data}) => {
          this.cover = data.data.cover
          this.footerInfo = data.data.footerInfo
        })
    },

    postForm () {
      this.validate()

      if (this.formValidate && !this.isLoading) {
        this.isLoading = true
        axios.post(`${window.API_URL}/claims`, this.claimForm)
          .then(({data}) => {
            this.$swal({
              type: 'success',
              title: data.title,
              text: data.message,
              confirmButtonText: 'Aceptar'
            })
            this.isLoading = false
            this.isShowModalConfirm = true
            this.claimForm = {
              person: {
                fullname: '',
                phone: '',
                otherPhone: '',
                district: '',
                address: '',
                province: '',
                reference: '',
                region: '',
                documentType: '',
                identityDocument: '',
                email: ''
              },
              claimOptionId: 0,
              amount: '',
              itemOptionId: 0,
              descriptionItem: '',
              details: '',
              order: ''
            }
          })
          .catch(({response}) => {
            this.isLoading = false
            // this.$swal({
            //   type: 'error',
            //   title: 'Título',
            //   text: 'Respuesta',
            //   confirmButtonText: 'Aceptar'
            // })
          })
      }
    },

    validate () {
      let validation = new Validator(this.claimForm, this.formRules)
      validation.passes()
      this.toggleValidate = !this.toggleValidate
      this.formValidate = validation.passes()
    },

    onVerify (value) {
      this.form.recaptcha = value
    }
  }
}
</script>
