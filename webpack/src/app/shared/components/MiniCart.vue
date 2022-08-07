<template lang="pug">
  transition(name='fade')
    div(class='c-mini-cart' @click.self="$emit('hide')")
      div(class='c-mini-cart__container')
        div(class='c-mini-cart__title')
          p Mi Carrito
          button(class='' @click="$emit('hide')"): i(class='u-icon remove')

        ul(class='c-mini-cart__items')
          li(class='c-mini-cart__item' v-for='item in webCartItems' v-if='item', :key='item.id')
            div(class='c-mini-cart__item-image')
              img(:src='item.imageUrl')

            div(class='u-flex-1 u-ml3 u-mr2')
              router-link(:to="{name: 'Product', params:{slug: item.slug}}" class='u-color-default u-text-decoration-none u-mb2 u-fw-bold u-mt0') {{item.name}}
              p(class='u-my2 u-color-primary')
                span(class='u-mr2') Precio:
                price(:price='item.price' class='u-inline u-fw-bold')
              p(class='u-my2 u-color-secondary')
                span(class='u-mr2') Subtotal:
                price(:price='item.price * item.quantity' class='u-inline u-fw-bold')
              p(class='u-my2 u-color-text') {{item.quantity}} Producto{{item.quantity !== 1 ? 's' : ''}}

              input-quantity(
                :quantity='item.quantity'
                :max-quantity='item.stock'
                :item-id='item.id'
                @update='updateQuantityFromWebCart')

            div(class='c-mini-cart__item-remove')
              button(class='u-p0' @click='removeFromWebCart([item.id])'): i(class='u-icon remove u-color-error')
        div(class='u-p3')
          div(class='u-flex u-items-center u-border-top u-border-bottom u-justify-between')
            p Total
            price(:price='webCartTotalPrice' class='u-fw-bold')
          div(class='u-pt3 u-center')
            router-link(:to="{name: 'Detail'}" class='c-btn--primary u-inline-block') Comprar
            p(class='u-mb2')
              router-link(:to="{name: 'Catalog'}" class='u-color-default u-text-decoration-none u-border-bottom u-pb1') Volver al catálogo
</template>

<script>
import {mapGetters, mapActions} from 'vuex'

export default {
  computed: {
    ...mapGetters([
      'webCartItems',
      'webCartTotalPrice'
    ])
  },

  beforeCreate () {
    window.$('body').css('overflow-y', 'hidden')
  },

  beforeDestroy () {
    window.$('body').css('overflow-y', '')
  },

  methods: {
    ...mapActions([
      'updateQuantityFromWebCart',
      'removeFromWebCart'
    ])
  }
}
</script>
