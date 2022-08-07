<template lang="pug">
  header(class='c-header')
    div(class='o-wrapper c-header__content')
      router-link(:to="{name: 'Home'}" class='c-header__logo')
        img(:src='company.logoUrl', :alt='company.name')

      div(class='c-header__search u-show@tablet u-flex-1 u-mx4')
        div()
          button(class='c-header__search-button' @click='isShowCategories = !isShowCategories')
            span Catálogo
            i(class='u-icon arrow_down')

          div(class='c-header-categories', :class="{'is-show' : isShowCategories}" @click.self='isShowCategories = false')
            ul(class='u-mt0 u-list-reset c-header-categories__container')
              li(v-for='category in categories' class='c-header-menu__category')
                button(
                  class='c-header-menu__category-button'
                  @click='selectCategory(category.id)'
                )
                  div(class='c-header-menu__category-image')
                    img(:src='category.iconUrl', :alt='category.name')
                  span(class='c-header-menu__category-name') {{category.name}}
                  i(class='u-icon arrow_right c-header-menu__category-icon')

                ul(class='c-header-menu__subcategories')
                  li(v-for='subcategory in category.subcategories' class='c-header-menu__subcategory')
                    router-link(
                      class='c-header-menu__subcategory-link'
                      :to="{name: 'Subcategory', params:{categorySlug: category.slug, subcategorySlug: subcategory.slug}}")
                      | {{subcategory.name}}

                    //- figure(class='c-header-menu__subcategory-image')
                      img(:src='subcategory.imageUrl')
        div(class='u-relative u-flex u-flex-1')
          div(class='c-header__search-input')
            input(type='search' placeholder='¿Qué producto estás buscando?' v-model='searchItems')
            i(class='u-icon search')

          ul(class='c-header-search__list' v-show='searchItems')
            li(v-for='item in items' class='c-header-search__item')
              router-link(:to="{name: 'Product', params:{slug: item.slug}}" class='c-header-search__link')
                div(class='c-header-search__item-image')
                  img(:src='item.imageUrl', :alt='item.name')
                span(class='c-header-search__item-name') {{item.name}}

      div(class='')
        router-link(
          :to="{name: 'Home', hash:'#suscription'}"
          v-if="$route.name !== 'Home'"
          class='c-input-circle u-text-decoration-none u-mx0 scrolldown' style='background: #402d7a;color: white; padding: 5px 15px 5px 15px; '
        ) Suscríbete
        a(href="#" v-scroll-to="'#suscription'" style='background: #402d7a;color: white; padding: 5px 15px 5px 15px;' class='c-input-circle u-text-decoration-none u-mx0 scrolldown' v-else) Suscríbete
      //- div(class='')
        input(v-scroll-to="{el: '#suscription', duration: 1000}" class='c-input-circle u-12/12@tablet u-mx0 scrolldown' type='submit' value='Suscríbete' style='padding:1px 8px 1px 8px;')
      div(class='u-flex u-items-center')
        //- router-link(:to="{name: 'Home'}" class='c-header__link u-show@tablet')
          i(class='u-icon') people
          span Club Novios

        button(class='c-header__button u-hide@tablet' @click='isShowSearch = !isShowSearch')
          i(class='u-icon search')
        button(class='c-header__button c-header__cart ', :data-cart='webCart.length' @click='isShowMiniCart = true')
          //- span(class='u-fz-h6 u-fw-bold u-mr2 u-show@tablet u-color-primary') Mi Pedido
          i(class='u-icon commerce')
        button(class='c-header__button u-ml3' @click='isShowMenu = !isShowMenu')
          i(class='u-icon') {{isShowMenu ? 'close' : 'menu'}}

    div(class='c-header__menu c-header-search' v-if='isShowSearch')
      div(class='c-header-search__container')
        div
          input(autofocus class='c-header-search__input' type='search' placeholder='¿Qué estás buscando?' v-model='searchItems')

        ul(class='c-header-search__list')
          li(v-for='item in items' class='c-header-search__item')
            router-link(:to="{name: 'Product', params:{slug: item.slug}}" class='c-header-search__link')
              div(class='c-header-search__item-image')
                img(:src='item.imageUrl')
              span(class='c-header-search__item-name') {{item.name}}

    div(class='c-header__menu' v-if='isShowMenu')
      ul(class='c-header-menu u-shadow')
        li(v-for='category in categories' class='c-header-menu__category', :class="{'is-active' : category.id === selectedCategory}")
          button(
            class='c-header-menu__category-button'
            @click='selectCategory(category.id)'
          )
            div(class='c-header-menu__category-image')
              img(:src='category.iconUrl', :alt='category.name')
            span(class='c-header-menu__category-name') {{category.name}}
            i(class='u-icon arrow_down c-header-menu__category-icon')

          ul(class='u-pl0', :class="{'u-hide' : category.id !== selectedCategory}")
            li(v-for='subcategory in category.subcategories' class='c-header-menu__subcategory')
              router-link(
                :to="{name: 'Subcategory', params:{categorySlug: category.slug, subcategorySlug: subcategory.slug}}"
                class='c-header-menu__subcategory-link'
              )
                span {{subcategory.name}}

      //- ul(class='c-header-nav')
        li(class='c-header-nav__item') Nosotros
        li(class='c-header-nav__item')
          router-link(
            :to="{name: 'AboutUs', hash:'#quienes-somos'}"
            class='c-header-nav__link'
            v-if="$route.name !== 'AboutUs'"
          ) ¿Quienes Somos?
          a(href="#" v-scroll-to="'#quienes-somos'" class='c-header-nav__link' v-else) ¿Quienes Somos?
        li(class='c-header-nav__item')
          router-link(
            :to="{name: 'AboutUs', hash:'#mision'}"
            v-if="$route.name !== 'AboutUs'"
            class='c-header-nav__link'
          ) Visión y Misión
          a(href="#" v-scroll-to="'#mision'" class='c-header-nav__link' v-else) Visión y Misión
        li(class='c-header-nav__item')
          router-link(
            :to="{name: 'AboutUs', hash:'#valores'}"
            v-if="$route.name !== 'AboutUs'"
            class='c-header-nav__link'
          ) Valores Corporativos
          a(href="#" v-scroll-to="'#valores'" class='c-header-nav__link' v-else) Valores Corporativos
        li(class='c-header-nav__item')
          router-link(
            :to="{name: 'AboutUs', hash:'#trabaja'}"
            v-if="$route.name !== 'AboutUs'"
            class='c-header-nav__link'
          ) Trabaja con Nosotros
          a(href="#" v-scroll-to="'#trabaja'" class='c-header-nav__link' v-else) Trabaja con Nosotros

      //- ul(class='c-header-nav')
        li(class='c-header-nav__item') Servicio al cliente
        li(class='c-header-nav__item')
          router-link(
            :to="{name: 'Contact', hash:'#contacto'}"
            v-if="$route.name !== 'Contact'"
            class='c-header-nav__link'
          ) Contáctenos
          a(href="#" v-scroll-to="'#contacto'" class='c-header-nav__link' v-else) Contáctenos
        li(class='c-header-nav__item')
          router-link(
            :to="{name: 'Contact', hash:'#ubicacion'}"
            v-if="$route.name !== 'Contact'"
            class='c-header-nav__link'
          ) Ubicación de la Tienda
          a(href="#" v-scroll-to="'#ubicacion'" class='c-header-nav__link' v-else) Ubicación de la Tienda

        li(class='c-header-nav__item')
          router-link(
            :to="{name: 'Support', hash:'#preguntas'}"
            v-if="$route.name !== 'Support'"
            class='c-header-nav__link'
          ) Preguntas Frecuentas
          a(href="#" v-scroll-to="'#preguntas'" class='c-header-nav__link' v-else) Preguntas Frecuentas

      //- ul(class='c-header-nav')
        li(class='c-header-nav__item') Más de {{company.name}}
        li(class='c-header-nav__item')
          router-link(:to="{name: 'Services'}" class='c-header-nav__link') Nuestros Servicios
        li(class='c-header-nav__item')
          router-link(:to="{name: 'Catalog'}" class='c-header-nav__link') Ver Catálogo

    mini-cart(v-if='isShowMiniCart' @hide='isShowMiniCart = false')
</template>

<script>
import {mapGetters} from 'vuex'
import axios from 'axios'
import MiniCart from './MiniCart'
import debounce from 'lodash.debounce'

export default {
  components: {MiniCart},
  data () {
    return {
      selectedCategory: 0,
      isShowMenu: false,
      isShowSearch: false,
      isShowCategories: false,
      searchItems: '',
      isShowMiniCart: false,
      items: []
    }
  },

  computed: {
    ...mapGetters({
      company: 'company',
      webCart: 'webCart',
      categories: 'categories'
    })
  },

  watch: {
    $route (val) {
      this.isShowMenu = false
      this.isShowCategories = false
      this.isShowMiniCart = false
      this.items = []
    },

    searchItems (val) {
      const self = this
      this.getItems(val, self)
    }
  },

  methods: {
    selectCategory (id) {
      if (id === this.selectedCategory) {
        this.selectedCategory = 0
      } else {
        this.selectedCategory = id
      }
    },

    getItems: debounce((q, self) => {
      axios.get(`${window.API_URL}/items/search?q=${q}`)
        .then(({data}) => {
          self.items = data.data
        })
        .catch((err) => {
          self.items = []
          console.error(err)
        })
    }, 500)
  }
}

</script>
