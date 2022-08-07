<template>
  <div class="c-item">
    <router-link
      :to="{ name: 'Product', params:{ slug: item.slug } }"
      class="c-item__image"
    >
      <app-image :image-src="item.imageUrl"/>
    </router-link>

    <div class="c-item__info">
      <p class="c-item__name">
        <router-link
          :to="{ name: 'Product', params:{ slug: item.slug } }"
          class="c-item__link"
        >{{ item.name }}</router-link>
      </p>

      <price
        v-if="item.promotion.flag"
        :price="item.price"
        class="c-item__previous-price"
      />

      <price
        :price="item.promotion.flag ? item.promotion.price : item.price"
        class="c-item__current-price"
      />

      <p
        v-if="item.promotion.flag"
        class="c-item__discount-price"
      >
        <span>Ahorras</span>
        <price
          :price="item.price - item.promotion.price"
          class="u-inline"
        />
      </p>
      <button
        class="c-btn--primary u-mt3 u-mx-auto u-py2 u-block"
        @click="addToCart"
      >Agregar al Carrito</button>
    </div>
    <div
      v-if="!isRelated && item.promotion.flag && item.promotion.imageUrl"
      class="c-item__promotion"
    ><img :src="item.promotion.imageUrl"></div>
  </div>
</template>

<script>
import { mapActions } from 'vuex'

export default {
  props: {
    isRelated: {
      type: Boolean,
      default: false
    },
    item: {
      type: Object,
      default: () => ({})
    }
  },

  methods: {
    ...mapActions([
      'addToWebCart'
    ]),

    addToCart () {
      this.addToWebCart([
        {
          itemId: this.item.id,
          stock: this.item.stock,
          quantity: 1
        }
      ])

      this.$emit('show-cart')
    }
  }
}
</script>
