<template lang="pug">
  div
    app-header(class='u-absolute')
    article(class='u-height-vh u-flex u-flex-column u-justify-center u-relative')
      div(class='u-bg-image  u-bg-darken')
        img(:src='cover.backgroundUrl')
      div(class='o-container u-relative u-white')
        h1(v-html='cover.title' class='u-mt0 u-fz-h1 u-line-height-1')
        p(class='u-mb0 u-6/12@tablet') {{cover.summary}}

    section(id='mision')
      article(class='u-bg-primary c-objective')
        div(class='c-objective__content')
          h2(class='u-mt0') Misión
          p(class='u-m0') {{mission}}

        div(class='u-picture' v-if='missionImageUrl' )
          progressive-background(:src="missionImageUrl", :blur="50")

      article(class='u-bg-tertiary u-white c-objective')
        div(class='c-objective__content')
          h2(class='u-mt0') Visión
          p(class='u-m0') {{vision}}

        div(class='u-picture' v-if='visionImageUrl' )
          progressive-background(:src="visionImageUrl", :blur="50")

    article(class='u-height-vh u-flex u-items-center' id="quienes-somos")
      div(class='u-flex u-relative o-container u-justify-between u-py3 u-flex-wrap u-items-center')
        div(class='u-bg-image u-show@tablet' v-if='aboutUs.backgroundUrl')
          progressive-background(:src="aboutUs.backgroundUrl", :blur="50")

        div(class=' u-relative u-z2 u-4/12@laptop')
          h2(class='u-font-secondary u-uppercase u-mt3 u-color-secondary') Sobre Kamasa
          p {{aboutUs.description}}
        div(class='u-7/12@laptop u-relative u-z2 u-py3' )
          img(:src='aboutUs.imageUrl')

    article(class='u-bg-tertiary u-white c-objective' v-if='firstHistory' id='nuestra-historia')
      div(class='u-picture' v-if='firstHistory.imageUrl' )
        progressive-background(:src="firstHistory.imageUrl", :blur="50")

      div(class='o-container u-relative u-py5' )
        div(class='u-bg-image' v-if='firstHistory.backgroundUrl')
          progressive-background(:src="firstHistory.backgroundUrl", :blur="50")

        div(class='u-relative u-z2 u-left-align')
          p(class='u-uppercase u-mb2 u-white u-fw-s-bold u-mt0') Nuestra historia
          h2(class='u-uppercase u-fz-h2 u-white u-mt0 u-line-height-1')
            | Los
            br
            | inicios

          div(class='u-bg-quinary u-p4')
            div(class='u-center u-mb3')
              img(:src='firstHistory.iconUrl')
            p(class='u-mt0 u-color-text u-uppercase u-center') {{firstHistory.title}}

            p(class='u-color-default u-mb0') {{firstHistory.description}}

    article(class='o-container u-my5')
      p(class='u-uppercase u-mb2 u-fw-s-bold u-mt0') Nuestra historia
      h2(class='u-uppercase u-fz-h2 u-mt0 u-line-height-1')
        | Seguimos
        br
        | Creciendo

    article(class='o-wrapper u-relative u-height-vh ')
      div(class='u-bg-image' v-if='secondHistory.imageUrl')
        progressive-background(:src="secondHistory.imageUrl", :blur="50")

      div(class='u-relative u-justify-between u-py4 c-objective u-left-align')
        div(class='u-white u-z2 u-relative u-5/12@tablet u-self-center u-my4' )
          h2(class='u-line-height-1 u-uppercase u-7/12@tablet u-fz-h2 u-mt0') Disfruta de nuestros productos
          router-link(:to="{name: 'Catalog'}" class='c-btn--primary u-uppercase' ) Ver catálogo

        div(class='u-relative u-z2 u-5/12@tablet u-my4')
          div(class='u-bg-quinary u-p4' )
            div(class='u-center u-mb3')
              img(:src='secondHistory.iconUrl')

            p(class='u-mt0 u-color-text u-uppercase u-center') {{secondHistory.title}}

            p(class='u-color-default u-mb0') {{secondHistory.description}}

    article(class='o-container u-pt5 u-mt3' id='valores')
      p(class='u-uppercase u-mb2 u-fw-s-bold u-mt0' ) Nuestros Valores
      h2(class='u-uppercase u-mb0 u-fz-h2 u-mt0 u-line-height-1' )
        | Lo que
        br
        | vivimos

      ul(class='u-list-reset u-flex u-flex-wrap u-justify-between')
        li(class='c-value' v-for='value in values' )
          div(class='c-value__image')
            img(:src='value.imageUrl')
          p(class='u-color-secondary u-fz-h5 u-fw-s-bold') {{value.name}}
          p {{value.description}}

    article(class='o-container u-mb5 u-center u-pt5' id='trabaja')
      h2(class='u-mt0 u-fz-h2 u-line-height-1') ¿Interesado en trabajar con nosotros?
      p(class='u-my4') {{jobsDescription}}
      router-link(:to="{name:'Contact'}" class='c-btn--primary') Pónganse en contacto con nosotros
    app-footer
</template>

<script>
import {mapGetters} from 'vuex'
import axios from 'axios'

export default {
  data () {
    return {
      aboutUs: false,
      cover: false,
      firstHistory: false,
      jobsDescription: false,
      mission: false,
      missionImageUrl: false,
      secondHistory: false,
      values: [],
      vision: false,
      visionImageUrl: false
    }
  },

  computed: {
    ...mapGetters([
      'company'
    ])
  },

  created () {
    this.getAbout()
  },

  methods: {
    getAbout () {
      axios.get(`${window.API_URL}/about`)
        .then(({data}) => {
          this.aboutUs = data.data.aboutUs
          this.cover = data.data.cover
          this.firstHistory = data.data.firstHistory
          this.jobsDescription = data.data.jobsDescription
          this.mission = data.data.mission
          this.missionImageUrl = data.data.missionImageUrl
          this.secondHistory = data.data.secondHistory
          this.values = data.data.values
          this.vision = data.data.vision
          this.visionImageUrl = data.data.visionImageUrl
        })
    }
  }
}
</script>
