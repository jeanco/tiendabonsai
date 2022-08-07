<template lang="pug">
  table(class='u-mb3 c-order-detail__summary-table')
    caption() Resumen de tu orden

    tbody
      tr
        td(class='u-uppercase u-color-text') subtotal ({{webCartTotalQuantity}} producto{{webCartTotalQuantity !== 1 ? 's' : ''}})
        td(class='u-right-align'): price(:price='webCartSubtotalPrice')
      tr(class='u-color-error' v-if='webCartTotalDiscount')
        td Descuento
        td(class='u-right-align')
          span -
          price(:price='webCartTotalDiscount' class='u-inline')
    tfoot
      tr
        td TOTAL
        td(class='u-right-align'): price(:price='webCartTotalPrice')
</template>

<script>
import {mapGetters} from 'vuex'

export default {
  computed: {
    ...mapGetters([
      'webCartSubtotalPrice',
      'webCartTotalPrice',
      'webCartTotalDiscount',
      'webCartTotalQuantity'
    ])
  }
}
</script>
