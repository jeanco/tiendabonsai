<template lang="pug">
  div
    app-header
    app-categories

    article(class='o-wrapper')
      div(class='u-flex u-justify-between u-pt3 u-hide@tablet')
        button(class='c-btn u-color-default u-uppercase u-border u-br0 u-flex-1 u-pl0 u-pr0 u-mr3' @click='isShowAside = true')
          i(class='u-icon controls u-mr1')
          span Filtros

        div(class='c-select u-flex-1 u-flex')
          //- label(class='u-mr3') Ordernado por:
          select(v-model='selectedOrderBy' class='u-12/12@mobile')
            option(:value='1') Relevancia
            option(:value='2') Precio Menor
            option(:value='3') Precio Mayor
            //- option(:value='4') Marca
          i(class='u-icon') caret_down

    article(class='o-wrapper')
      div(class='c-catalog u-py4')
        aside(
          class='c-catalog__aside'
          @click.self='isShowAside = false',
          :class="{'is-show' : isShowAside}"
        )
          div(class='c-catalog__aside-content')
            div(class='c-catalog__aside-title' v-if='currentCategory')
              img(src='/favicon.ico' width='20' class='u-mr2')
              p(class='u-uppercase u-fw-bold') {{currentCategory.name}}

            div(class='u-px3 u-bg-quinary u-items-center u-overflow-hidden')
              p(class='u-uppercase u-fw-bold' v-if='currentCategory') Subcategorias

              ul(class='u-list-reset' v-if='currentCategory')
                li(v-for='subcategory in currentCategory.subcategories' class='u-mt2')
                  router-link(:to="{name: 'Subcategory', params:{subcategorySlug: subcategory.slug}}" class='u-link') {{subcategory.name}}
              hr(v-if='currentCategory')

              div(class='u-flex u-items-center u-justify-between')
                p(class='u-uppercase u-fw-bold')
                  i(class='u-icon controls u-mr1')
                  span Filtros
                button(class='u-text-decoration-underline u-color-text u-fz-xs u-p0' @click='clearFilters') Limpiar filtros

              ul(
                v-if="selectedAttributes.length || selectedPriceRange"
                class="u-list-reset u-flex u-flex-wrap u-mt0"
              )
                li(
                  v-for="attribute in selectedAttributes"
                  :key="attribute"
                  class="u-border u-br4 u-mr2 u-block u-border-secondary u-mb2"
                )
                  button(
                    @click="removeAttribute(attribute)"
                    class="u-flex u-items-center"
                  )
                    i.u-icon.u-fz-xs.u-mr1.u-color-error close
                    span {{ getAttribute(attribute).name }}

                li(
                  v-if="selectedPriceRange"
                  class="u-border u-br4 u-block u-border-secondary u-mb2"
                )
                  button(
                    @click="removeRange()"
                    class="u-flex u-items-center"
                  )
                    i.u-icon.u-fz-xs.u-mr1.u-color-error close
                    span {{ getRange(selectedPriceRange).name }}

              ul(class='u-list-reset u-mt0')
                li(v-for='attribute in attributes' class='u-mb3')
                  p(class='u-flex u-justify-between u-mt0 u-mb2')
                    span(class='u-fw-bold') {{attribute.name}}
                    button(class='u-color-text' @click="activedAttribute = attribute.id")
                      i(class='u-icon') {{activedAttribute === attribute.id ? 'arrow_down' : 'arrow_right'}}

                  transition(name='fade')
                    ul(class='u-list-reset u-mt0' v-show="attribute.id === activedAttribute")
                      li(class='u-mt2' v-for='value in attribute.values')
                        label(class='c-checkbox')
                          input(
                            type='checkbox'
                            v-model='selectedAttributes',
                            :value='value.id'
                          )
                          span(class='c-checkbox__label') {{value.name}}
                  hr(class='u-my3')

                li(class='u-mb3')
                  p(class='u-flex u-justify-between u-mt0 u-mb2')
                    span(class='u-fw-bold') Precios
                    button(class='u-color-text' @click="activedAttribute = 0")
                      i(class='u-icon') {{activedAttribute === 0 ? 'arrow_down' : 'arrow_right'}}

                  transition(name='fade')
                    ul(class='u-list-reset u-mt0' v-show="0 === activedAttribute")
                      li(class='u-mt2' v-for='price in pricesRange')
                        label(class='c-radio')
                          input(
                            type='radio'
                            v-model='selectedPriceRange',
                            :value='price.id'
                            name='prices'
                          )
                          span(class='c-radio__label') {{price.name}}

              //- button(class='c-btn--default u-mb3 u-hide@tablet' @click='getNewsItems') Establecer

        section()
          div(class='u-flex u-mb4 u-border-bottom u-pb2 u-items-center u-justify-between')
            div(class='c-select u-flex u-items-center u-show@tablet')
              label(class='u-mr3') Ordenado por:
              select(v-model='selectedOrderBy')
                option(:value='1') Relevancia
                option(:value='2') Precio Menor
                option(:value='3') Precio Mayor
                option(:value='4') Marca
              i(class='u-icon') caret_down

            p(class='u-mt0 u-mb0') {{totalItems}} Resultado{{totalItems === 1 ? '' : 's'}} en&nbsp;
              strong {{currentCategory.name}}

          div(class='c-catalog__items u-mb4')
            article(v-for='item in items', :key='item.id')
              app-item(:item='item' @show-cart="isShowMiniCart = true")

          ul(class='c-nav' v-if='totalPages > 1')
            button(
              class='c-nav__item', :disabled='currentPage === 1'
              @click='prevPage'
            )
              i(class='u-icon') arrow_left

            button(
              class='c-nav__item' v-for='page in totalPages'
              :class="{'is-active' : page === currentPage}"
              @click="changePage(page)"
              v-if='page === 1 || page >= currentPage'
              ) {{page}}

            button(
              class='c-nav__item', :disabled='currentPage === totalPages'
              @click='nextPage'
            )
              i(class='u-icon') arrow_right

    app-footer
    loading(v-if='isLoading')
    mini-cart(v-if='isShowMiniCart' @hide='isShowMiniCart = false')
</template>

<script>
import {mapGetters} from 'vuex'
import axios from 'axios'
import MiniCart from 'components/MiniCart'

export default {
  components: {MiniCart},
  data () {
    return {
      items: [],
      attributes: [],
      pricesRange: [],
      selectedAttributes: [],
      activedAttribute: 0,
      isShowMiniCart: false,
      currentPage: 1,
      totalPages: 1,
      totalItems: 0,
      isLoading: false,
      selectedOrderBy: 1,
      selectedPriceRange: 0,
      isShowAside: false
    }
  },

  computed: {
    allAttributes () {
      return this.attributes.reduce((acc, curr) => acc.concat(curr.values), [])
    },

    ...mapGetters({
      company: 'company',
      categories: 'categories'
    }),

    currentCategory () {
      if (this.$route.params.categorySlug) {
        let category = this.categories.find(c => c.slug === this.$route.params.categorySlug)
        return category || false
      }
      return false
    }
  },

  watch: {
    $route (val) {
      this.isLoading = true
      this.getItems()
      this.currentPage = 1
      this.selectedAttributes = []
      this.selectedPriceRange = 0
      this.getAttributes()

      setTimeout(() => {
        this.isLoading = false
      }, 750)
    },

    selectedPriceRange (val) {
      this.getNewsItems()
    },
    selectedAttributes (val) {
      this.getNewsItems()
    },
    selectedOrderBy (val) {
      this.getNewsItems()
    }
  },

  created () {
    const self = this
    this.getAttributes()
    this.getPricesRange()

    setTimeout(() => {
      self.getItems()
    }, 10)
  },

  methods: {
    getAttribute (id) {
      return this.allAttributes.find(a => a.id === id)
    },
    getRange (id) {
      return this.pricesRange.find(p => p.id === id)
    },
    removeRange (id) {
      this.selectedPriceRange = 0
    },
    removeAttribute (id) {
      console.log(id)
      this.selectedAttributes = this.selectedAttributes.filter(a => a !== id)
    },
    getItems () {
      axios.get(`${window.API_URL}/items`, {
        params: {
          page: this.currentPage,
          attrs: this.selectedAttributes,
          category: this.$route.params.categorySlug,
          subcategory: this.$route.params.subcategorySlug,
          promotion: this.$route.query.promotion,
          orderBy: this.selectedOrderBy,
          pricesRange: this.selectedPriceRange
        },
        paramsSerializer: (params) => {
          return window.Qs.stringify(params, {arrayFormat: 'indices'})
        }
      })
        .then(({data}) => {
          this.items = data.data
          this.totalPages = data.last_page
          this.totalItems = data.total

          const self = this
          setTimeout(() => {
            self.isLoading = false
          }, 1000)
        })
        .catch(() => {
          this.isLoading = false
        })
    },

    getAttributes () {
      axios.get(`${window.API_URL}/attributes`, {
        params: {
          category: this.$route.params.categorySlug,
          subcategory: this.$route.params.subcategorySlug
        }
      })
        .then(({data}) => {
          this.attributes = data.data
        })
    },

    getPricesRange () {
      axios.get(`${window.API_URL}/prices-range`, {
        params: {
          category: this.$route.params.categorySlug,
          subcategory: this.$route.params.subcategorySlug
        }
      })
        .then(({data}) => {
          this.pricesRange = data.data
        })
    },

    changePage (page) {
      this.currentPage = page
      this.getItems()
      this.scrollTop()
    },

    nextPage () {
      if (this.currentPage < this.totalPages) {
        this.currentPage += 1
        this.getItems()
        this.scrollTop()
      }
    },

    prevPage () {
      if (this.currentPage > 1) {
        this.currentPage -= 1
        this.getItems()
        this.scrollTop()
      }
    },

    getNewsItems () {
      this.currentPage = 1
      this.isShowAside = false
      this.getItems()
    },

    clearFilters () {
      this.selectedAttributes = []
      this.selectedPriceRange = 0
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
