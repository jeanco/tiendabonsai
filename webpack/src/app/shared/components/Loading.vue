<template lang='pug'>
  div(class="c-loading")
    p(class="c-loading__text") {{message}}
    pulse-loader(color="white" size="20px")
</template>

<script>
export default {
  props: {
    message: {
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
