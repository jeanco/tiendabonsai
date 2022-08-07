<template lang="pug">
  div
    nav(class='c-categories-nav' v-if='categories.length > 0')
      button(class='c-categories-nav__button u-hide@laptop' @click='$refs.slick_categories.prev()')
        i(class='u-icon arrow_left')

      div(class='c-categories-nav__content')
        slick(ref='slick_categories', :options='slickCategoriesNav' class='slick-height-auto')
          div(v-for='category in categories'  :key='category.id')
            //- router-link(
            //-   class='c-categories-nav__item'
            //-   :to="{name: 'Category', params:{categorySlug: category.slug}}"
            //- )
            button(
              @click="selectCategory(category.id)"
              class='c-categories-nav__item'
              :class="{'is-active' : selectedCategory === category.id}"
            )
              span(class='c-categories-nav__item-name') {{category.name}}

          div
            router-link(
              :to="{name: 'Catalog', query:{promotion: true}}"
              class='c-categories-nav__item c-categories-nav__item--special'
            )
              span(class='c-categories-nav__item-name') Ofertas Especiales
      button(class='c-categories-nav__button u-hide@laptop' @click='$refs.slick_categories.next()')
        i(class='u-icon arrow_right')

    app-categories-subcategories(
      :category="currentCategory"
      @click.native.self="selectedCategory = 0"
    )
</template>

<script>
import {mapGetters} from 'vuex'
import AppCategoriesSubcategories from './AppCategoriesSubcategories'

export default {
  components: { AppCategoriesSubcategories },
  data () {
    return {
      selectedCategory: 0,
      slickCategoriesNav: {
        arrows: false,
        slidesToShow: 8,
        responsive: [
          {
            breakpoint: 1120,
            settings: {
              slidesToShow: 6
            }
          },
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 5
            }
          },
          {
            breakpoint: 860,
            settings: {
              slidesToShow: 3
            }
          },
          {
            breakpoint: 478,
            settings: {
              slidesToShow: 2
            }
          }
        ]
      }
    }
  },

  computed: {
    ...mapGetters({
      categories: 'categories'
    }),

    subcategories () {
      return this.currentCategory ? this.currentCategory.subcategories : []
    },

    currentCategory () {
      return this.categories.find(c => c.id === this.selectedCategory)
    }
  },

  watch: {
    $route () {
      this.selectedCategory = 0
    }
  },

  methods: {
    selectCategory (id) {
      if (id === this.selectedCategory) {
        this.selectedCategory = 0
      } else {
        this.selectedCategory = id
      }
    }
  }
}
</script>
