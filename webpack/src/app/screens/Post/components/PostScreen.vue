<template lang="pug">
  div()
    app-header
    //- progressive-background(:src='currentPost.imageUrl', :placeholder='currentPost.imageThumbUrl')

    section(class='o-container u-flex u-flex-wrap u-justify-between u-pt5 u-pb4')
      article(class='u-8/12@laptop u-7/12@tablet u-12/12 u-mb4')
        h1(class='c-post__title u-fz-h2 u-mt0 u-mb3 u-color-primary') {{currentPost.title}}

        p(class='')
          span {{currentPost.date | date }}

        div(class='u-12/12 u-relative u-mx-auto u-mb4' v-if='currentPost.images')
          swiper(:options='swiperImages' class='u-mb4')
            swiper-slide(v-for='(image, index) in currentPost.images', :key='index')
              img(:src='image.url', class='u-12/12')

          button(class='c-btn-nav--prev u-fz-h2 u-white' id='post__prev')
            i(class='u-icon') arrow_left_o
          button(class='c-btn-nav--next u-fz-h2 u-white' id='post__next')
            i(class='u-icon') arrow_right_o
        div(v-if='currentPost.content' v-html='currentPost.content' class='u-mb4')

        div(class='u-flex u-flex-wrap u-items-center')
          p(class='u-mb2 u-fw-s-bold u-mr3 u-mt0 u-color-primary') Compartir:
          share-buttons(:shares="['facebook', 'twitter']" class='u-mb2', :title='currentPost.title')

        //- div(
        //-   :data-href="currentUrl"
        //-   data-share="true"
        //-   data-width="100%"
        //-   data-show-faces="true"
        //-   data-numposts="5"
        //-   class="fb-comments u-mb4"
        //-   data-order-by="reverse_time"
        //- )

      aside(class='u-3/12@laptop u-4/12@tablet u-12/12 u-mb4')
        p(class='u-fw-s-bold u-bg-quaternary u-px4 u-py3 u-white u-mt0 u-mb3') También te puede interesar

        //- router-link(:key='index' v-for='(post, index) in posts' , :to="{ name: 'Post', params:{slug: post.slug}}" class='u-decoration-none u-flex u-mb3 u-border-bottom')
        router-link(:key='index' v-for='(post, index) in posts' , :to="{ name: 'Post', params:{slug: post.slug}}" class='u-mb3 u-white u-decoration-none c-post')
          figure(class='u-4/12 c-post__image')
            img(:src='post.imageUrl')
          //- figure(class='u-3/12 u-relative u-m0 u-flex  u-overflow-hidden')
            //- progressive-img(:src='post.imageUrl' class='u-12/12')

          div(class='u-8/12 c-post__content u-p3')
            p(class='u-mt0 u-mb2 u-fw-bold') {{post.title}}
            p(class='u-mb0 u-fz-h6 u-mt0')
              span {{post.date | date }}

    app-footer

    loading(v-if='isLoading')
</template>

<script>
import { mapGetters } from 'vuex'
import axios from 'axios'

export default {
  name: 'PostScreen',
  data () {
    return {
      currentUrl: window.location.href,
      currentPost: false,
      posts: [],
      isLoading: true,
      swiperImages: {
        navigation: {
          nextEl: '#post__next',
          prevEl: '#post__prev'
        },
        grabCursor: true,
        loop: true,
        autoplay: {
          delay: 5000
        },
        spaceBetween: 10
      }
    }
  },

  computed: {
    ...mapGetters({
      company: 'company'
    }),

    faceWeb () {
      return `https://www.facebook.com/plugins/page.php?href=${encodeURIComponent(this.company.facebookPage)}&tabs=timeline&width=500&height=200&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=true&appId`
      // return `https://www.facebook.com/plugins/page.php?href=${encodeURIComponent('https://www.facebook.com/NoveltiePeru/')}&tabs=timeline&width=500&height=200&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId`
    }
  },

  watch: {
    currentPost (val) {
      this.getRelated()
    },

    $route (val, olVal) {
      this.isLoading = true
      axios.get(`${window.API_URL}/posts/${this.$route.params.slug}`)
        .then(({data}) => {
          this.currentPost = data.data
          this.isLoading = false
        })
    }
  },

  mounted () {
    setTimeout(() => {
      try {
        window.fbAsyncInit()
      } catch (e) {
        console.log(e)
      }
    }, 50)
  },

  methods: {
    getRelated () {
      axios.get(`${window.API_URL}/posts/${this.$route.params.slug}/related`)
        .then(({data}) => {
          this.posts = data.data
        })
    }
  },

  beforeRouteEnter (to, from, next) {
    axios.get(`${window.API_URL}/posts/${to.params.slug}`)
      .then(({data}) => {
        next((vm) => {
          vm.currentPost = data.data
          vm.isLoading = false
        })
      })
      .catch(() => {
        next({name: 'NotFound'})
      })
  }
}
</script>
