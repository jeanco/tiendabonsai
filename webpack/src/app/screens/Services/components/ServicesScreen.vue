<template lang="pug">
  div
    app-header()

    article(
      v-if='cover'
      class='parallax u-white u-flex u-items-center u-center u-py5',
      :style='{backgroundImage: `url(${cover.imageUrl})`}'
    )
      div(class='o-container' )
        h1(v-html='cover.title' class='u-fz-h1 u-line-height-1 u-mt4 u-mb3' )
        p(class='u-mt0 u-mb4 u-5/12@tablet u-mx-auto service-cover__subtitle') {{cover.subtitle}}

    section(class='o-container u-py5' v-if='services.length > 0')
      article(v-for='service in services' class='c-service')
        div(class='u-flex-1' )
          h2(class='c-service__title') {{service.name}}
          img(:src='service.imageUrl' class='c-service__image')

        div(v-html='service.description' class='c-service__description' )
    app-footer
</template>

<script>
import {mapGetters} from 'vuex'
import axios from 'axios'

export default {
  data () {
    return {
      services: [],
      cover: false
    }
  },

  computed: {
    ...mapGetters([
      'company'
    ])
  },

  created () {
    this.getData()
  },

  methods: {
    getData () {
      axios.get(`${window.API_URL}/services`)
        .then(({data}) => {
          this.cover = data.data.cover
          this.services = data.data.services
        })
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
  /* min-height: 320px; */
  /* height: 449px; */
}
</style>
