<template lang="pug">
  transition(name='fade')
    div(class="c-modal", @click.self="cancelModal")
      div(class="c-modal__container u-px4 u-pb4 u-center", :style="{width: width}", style='overflow:visible', :class='modalClass')
        img(class='c-modal__image' src='/images/success.png')
        h2(class='u-color-dark u-fz-h1 u-center u-mt0 u-mb3 u-line-height-1 u-fw-regular') ¡Gracias!
        p(v-if='message' v-html='message')

        button(class='c-btn--primary u-mx1' @click="confirmModal" v-if='showButtonConfirm') {{textButtonConfirm}}
        button(class='c-btn--default u-mx1' @click="cancelModal" v-if='showButtonCancel') {{textButtonCancel}}
</template>

<script>
export default {
  props: {
    width: {
      type: String,
      default: '360px'
    },
    message: {
      type: String,
      default: 'En breves momentos nos comunicaremos con usted.'
    },
    showButtonConfirm: {
      type: Boolean,
      default: true
    },
    textButtonConfirm: {
      type: String,
      default: 'Confirmar'
    },
    showButtonCancel: {
      type: Boolean,
      default: false
    },
    textButtonCancel: {
      type: String,
      default: 'Cancelar'
    },
    modalClass: {
      type: String,
      default: ''
    }
  },

  mounted () {
    window.$('body').css('overflow-y', 'hidden')
  },

  beforeDestroy () {
    window.$('body').css('overflow-y', '')
  },

  methods: {
    confirmModal () {
      this.$emit('hide')
      this.$emit('confirm')
    },

    cancelModal () {
      this.$emit('hide')
      this.$emit('cancel')
    }
  }
}
</script>
