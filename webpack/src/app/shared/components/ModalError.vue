<template lang="pug">
  transition(name='fade')
    div(class="c-modal", @click.self="$emit('hide')")
      div(class="c-modal__container u-px4 u-pb4 u-center", :style="{width: width}", style='overflow:visible', :class='modalClass')
        img(class='c-modal__image' src='/images/error.png')
        h3(class='u-color-dark u-fz-h1 u-center u-mt0 u-mb3 u-line-height-1 u-fw-regular') ¡UPS!
        p(v-if='message' v-html='message')

        button(class='c-btn--primary' @click="$emit('hide')") Aceptar
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
      default: 'Al parecer hubo un problema <br> Por favor vuelva a intentarlo.'
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
  }
}
</script>
