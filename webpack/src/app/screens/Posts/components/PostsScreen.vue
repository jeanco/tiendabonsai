<template lang="pug">
  div(class='')
    app-header
    div(class="u-pt4 u-pb4")
      aside(class='o-container u-hide@laptop u-pt3 u-bg-background u-mb4')
        span(class='u-m0 u-px4 u-uppercase u-fw-bold') Categorías
        ul(class='u-m0 u-bg-background u-px3 u-py2 u-list-none' data-aos='fade-left' )
          li(class='u-mb1', :class="{'u-color-secondary' : selectedTag === 0}")
            button(class='u-pl0 u-pr0' @click='selectTag(0)')
              i(class='u-icon u-color-secondary circle')
              span Todas las categorías
          li(class='u-mb2' v-for='tag in tags', :class="{'u-color-secondary' : selectedTag === tag.id}")
            button(class='u-pl0 u-pr0' @click='selectTag(tag.id)')
              i(class='u-icon u-color-secondary circle')
              span {{tag.name}}

      div(class='o-container u-flex')
        section(class='u-mb4 u-flex-1 u-1/12 u-pt4' id="posts-container")
          app-post(:post='post', :key='post.id' v-for='post in posts' class='u-mb4')
          nav(class='c-nav')
            button(
              class='c-nav__item', :disabled='currentPage === 1'
              @click='prevPage'
            )
              i(class='u-icon') arrow_left

            button(
              class='c-nav__item' v-for='page in totalPages'
              :class="{'is-active' : page === currentPage}"
              @click="changePage(page)"
              ) {{page}}

            button(
              class='c-nav__item', :disabled='currentPage === totalPages'
              @click='nextPage'
            )
              i(class='u-icon') arrow_right

        aside(class='u-mb5 u-ml4 u-show@laptop' ref='aside_container' style='width:300px')
          div(ref='aside' style='width:300px' class=" u-pt4 u-bg-background u-mb4")
            span(class='u-m0 u-px4 u-uppercase u-fw-bold') Categorías
            ul(class='u-m0 u-px4 u-list-none u-py2 u-bg-background u-mb4')
              li(class='u-mb1', :class="{'u-color-secondary' : selectedTag === 0}")
                button(class='u-pl0 u-pr0' @click='selectTag(0)')
                  i(class='u-icon u-color-secondary circle')
                  span Todas las categorías
              li(class='u-mb1' v-for='tag in tags', :class="{'u-color-secondary' : selectedTag === tag.id}")
                button(class='u-pl0 u-pr0' @click='selectTag(tag.id)')
                  i(class='u-icon u-color-secondary circle')
                  span {{tag.name}}
    app-footer(:is-show-info='false')
    loading(v-if='isLoading')
</template>

<script>
// import debounce from 'lodash.debounce'
import { mapGetters } from 'vuex'
import axios from 'axios'

export default {
  name: 'PostsScreen',
  data () {
    return {
      posts: [],
      tags: [],
      isLoading: true,
      selectedTag: 0,
      currentPage: 1,
      totalPages: 1,
      lastPage: 1
    }
  },

  computed: {
    ...mapGetters({
      company: 'company'
    })
  },

  created () {
    this.getPosts()
    this.getTags()
  },

  methods: {
    prevPage () {
      if (this.currentPage > 1) {
        this.currentPage -= 1
        this.getPosts()
        this.scrollTop()
      }
    },

    nextPage () {
      if (this.currentPage < this.totalPages) {
        this.currentPage += 1
        this.getPosts()
        this.scrollTop()
      }
    },

    changePage (page) {
      this.currentPage = page
      this.getPosts()
      this.scrollTop()
    },

    getPosts () {
      axios.get(`${window.API_URL}/posts?tagId=${this.selectedTag}&page=${this.currentPage}`)
        .then(({data}) => {
          // this.posts = this.posts.concat(data.data)
          this.posts = data.data
          this.totalPages = data.last_page

          const self = this
          setTimeout(() => {
            self.isLoading = false
          }, 500)
        })
    },

    getTags () {
      axios.get(`${window.API_URL}/tags`)
        .then(({data}) => {
          this.tags = data.data
        })
    },

    selectTag (id) {
      this.selectedTag = id
      this.isLoading = true
      this.totalPages = 1
      this.currentPage = 1
      this.posts = []
      this.getPosts()
    },

    scrollTop () {
      window.scrollTo({
        top: 0,
        behavior: 'instant'
      })
    }
  }
}
</script>
