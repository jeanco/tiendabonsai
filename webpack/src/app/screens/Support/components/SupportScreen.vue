<template lang="pug">
  div
    app-header
    article(
      class='u-parallax u-white u-center u-py6 o-container u-center',
      v-show='coverImage'
      :style='{backgroundImage: `url(${coverImage})`}'
    )

    article(class='u-flex o-container u-flex-wrap u-pt5 u-justify-between' id='soporte')
      div(class='u-5/12@tablet')
        h1(class='u-title-mini') {{support.title}}
        div(v-html='support.description')
      div(class='u-6/12@tablet' )
        img(:src='support.imageUrl')

    article(class='o-container u-py5')
      div(class='u-6/12@tablet u-center u-mx-auto' )
        h2(class='u-title-mini') {{callCenter.title}}
        p {{callCenter.info}}

      ul(class='u-list-reset u-flex u-flex-wrap u-justify-center u-mb0 u-mt0')
        li(v-for='brand in callCenter.brands' class='c-brand' )
          div(class='c-brand__content')
            img(:src='brand.imageUrl', :alt='brand.name' class='c-brand__image')

          div(class='c-brand__tooltip')
            strong {{brand.address}}
            p Call Center: {{brand.callCenter}}
            p Teléfono: {{brand.phone}}

    section(class='u-flex u-flex-wrap')
      article(
        class='u-6/12@tablet u-12/12 u-py5'
        v-for='service in services'
        :style="{backgroundColor: service.backgroundColor}"
      )
        div(class='o-container')
          h3(class='u-fz-h2 u-uppercase u-white u-mt4') {{service.name}}
          div(v-html='service.description' class='u-content-white u-mb4')

    article(class='o-container u-py5' id='preguntas')
      h2(class='u-center u-color-secondary u-fz-h3 u-mt3' ) En Kamasa respondemos a todas tus preguntas.

      ol(class='u-pl0')
        li(
          v-for='(question, index) in frequentQuestions'
          class='c-question',
          :class="{'is-active' : selectedQuestion === index + 1}"
        )
          a(class='c-question__text' @click='selectedQuestion = index + 1') {{question.question}}
          div(v-html='question.answer' class='c-question__answer')

    app-footer
</template>

<script>
import {mapGetters} from 'vuex'
import axios from 'axios'

export default {
  data () {
    return {
      callCenter: false,
      coverImage: false,
      frequentQuestions: [],
      services: [],
      support: false,
      selectedQuestion: 0
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
      axios.get(`${window.API_URL}/support`)
        .then(({data}) => {
          this.callCenter = data.data.callCenter
          this.coverImage = data.data.coverImageUrl
          this.services = data.data.services
          this.frequentQuestions = data.data.frequentQuestions
          this.support = data.data.support
        })
    }
  }
}
</script>
