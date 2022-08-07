<template>
  <div class="c-image">
    <transition name="fade">
      <img
        v-show="isLoadedImage"
        :src="imageSrc"
        :alt="imageAlt"
        class="c-image__src"
        @load="loaded"
      >
    </transition>

    <div
      v-show="!isLoadedImage"
      class="c-image__load">
      <pulse-loader
        color="#402D7A"
        size="20px"/>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    imageSrc: {
      type: String,
      default: ''
    },
    imageAlt: {
      type: String,
      default: ''
    }
  },

  data () {
    return {
      isLoadedImage: false
    }
  },

  methods: {
    loaded () {
      setTimeout(() => {
        this.isLoadedImage = true
      }, 1000)
    }
  }
}
</script>
