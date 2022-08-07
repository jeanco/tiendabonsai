<template lang="pug">
  main(class='c-order-detail o-container')
    div(class='c-order-detail__cart')
      table(class='')
        thead
          tr(class='u-border-bottom')
            th Producto
            th Cantidad
            th(width='140px') Precio Unit.
            th(width='140px') Subtotal
            th(width='40px')
        tbody
          tr(v-for='item in webCartItems')
            td
              div(class='u-flex u-items-center')
                div(class='c-order-detail__cart-image')
                  img(:src='item.imageUrl')
                p(class='u-m0 u-flex-1')
                  router-link(:to="{name: 'Product', params: {slug: item.slug}}" class='c-order-detail__cart-link') {{item.name}}
                  br
                  span(class='u-color-text') Disponible: {{item.stock}}u.
            td
              input-quantity(
                :quantity='item.quantity'
                :max-quantity='item.stock'
                :item-id='item.id'
                @update='updateQuantityFromWebCart')
            td(class='u-right-align')
              price(:price='item.price' class='u-fw-bold')
              price(v-if='item.beforePrice', :price='item.beforePrice' class='u-color-text u-fz-xs u-text-decoration-line-through')
            td(class='u-right-align'): price(:price='item.price * item.quantity' class='u-color-primary u-fw-bold')
            td(class='u-center'): button(@click='removeFromWebCart([item.id])' class='u-color-error u-p0'): i(class='u-icon remove')

    div(class='c-order-detail__summary')
      cart-summary

      router-link(:to="{name: 'Info'}" class='c-btn--primary u-uppercase u-block u-12/12 u-mb3') Continuar
      router-link(:to="{name: 'Catalog'}" class='u-color-default') Volver al cátalogo
</template>

<script>
import {mapGetters, mapActions} from 'vuex'

export default {
  data () {
    return {
    }
  },

  computed: {
    ...mapGetters([
      'webCartItems'
    ])
  },

  methods: {
    ...mapActions([
      'updateQuantityFromWebCart',
      'removeFromWebCart'
    ])
  }
}
</script>
