<template lang="pug">
  div
    span() S/
    span() {{price.toFixed(2)}}
</template>

<script>
export default {
  props: {
    price: {
      type: [Number, String],
      default: 0
    }
  }
}
</script>
