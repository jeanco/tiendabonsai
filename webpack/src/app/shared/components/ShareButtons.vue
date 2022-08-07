<template lang="pug">
  div(class='u-flex')
    //- button( v-if="!(!isMobil && share === 'whatsapp')"  v-for='share in shares', @click="shareSocial(urls[share])", class="c-btn-share", :class="[`c-btn-share--${share}`, btnClass]")
    button( v-if="!(!isMobil && share === 'whatsapp')"  v-for='share in shares', @click="shareSocial(urls[share])", class="c-btn-share", :class="[btnClass]")
      i(class='u-icon') {{share}}
</template>

<script>
export default {
  props: {
    btnClass: {
      type: String,
      default: ''
    },
    shares: {
      type: Array,
      required: true,
      default: () => []
    },
    url: {
      type: String,
      default: ''
    },
    title: {
      type: String,
      default: ''
    },
    height: {
      type: Number,
      default: 400
    },
    width: {
      type: Number,
      default: 600
    }
  },

  data () {
    return {
      leftPosition: (window.$(window).width() / 2) - (this.width / 2),
      topPosition: (window.$(window).height() / 2) - (this.height / 2),
      isMobil: false,
      currentUrl: encodeURIComponent(window.location.href)
    }
  },

  computed: {
    urls () {
      return {
        facebook: `http://www.facebook.com/sharer.php?u=${this.currentUrl}`,
        twitter: `http://twitter.com/share?url=${this.currentUrl}&text=${this.title}`,
        linkedin: `https://www.linkedin.com/shareArticle?url=${this.currentUrl}&title=${this.title}`,
        gplus: `https://plus.google.com/share?url=${this.currentUrl}`,
        whatsapp: `whatsapp://send?text=${this.currentUrl}`
      }
    }
  },

  watch: {
    $route () {
      if (!this.url) {
        this.currentUrl = encodeURIComponent(window.location.href)
      }
    }
  },

  created () {
    if (this.url) {
      this.currentUrl = encodeURIComponent(this.url)
    }
  },

  mounted () {
    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
      this.isMobil = true
    }
  },

  methods: {
    shareSocial (link) {
      window.open(link, null, `height=${this.height},width=${this.width},top=${this.topPosition},left=${this.leftPosition},toolbar=0`)
    }
  }
}
</script>
