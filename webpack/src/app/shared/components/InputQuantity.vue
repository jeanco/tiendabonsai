<template lang="pug">
  div(class='c-quantity')
    button(@click='less()' class='c-quantity__btn' type='button')
      i(class='u-icon') minus

    input(ref='quantity', type='number', :max='maxQuantity', :min='minQuantity', @input='handleChange($event.target.value)',
    :value='quantity', class='c-quantity__input', number @blur='formatValue')

    button(@click='more()' class='c-quantity__btn' type='button')
      i(class='u-icon') add
</template>

<script>
export default {
  props: {
    quantity: {
      type: Number,
      required: true
    },

    itemId: {
      type: Number,
      default: 0
    },

    minQuantity: {
      type: Number,
      default: 1
    },

    maxQuantity: {
      type: Number,
      default: 1000
    }
  },

  methods: {
    less () {
      if (this.quantity > this.minQuantity) {
        this.changeQuantity(this.quantity - 1)
      }
    },

    more () {
      if (this.quantity < this.maxQuantity) {
        this.changeQuantity(this.quantity + 1)
      }
    },

    handleChange (value) {
      this.changeQuantity(parseInt(value, 10))
    },

    changeQuantity (value) {
      let newQuantity = 0

      if (value < this.minQuantity || isNaN(value)) {
        newQuantity = this.minQuantity
      } else if (value > this.maxQuantity) {
        newQuantity = this.maxQuantity
      } else {
        newQuantity = parseInt(value, 10)
      }

      this.$emit('update', {
        quantity: newQuantity,
        itemId: this.itemId
      })
    },

    formatValue () {
      this.$refs.quantity.value = this.quantity
    }
  }
}
</script>
