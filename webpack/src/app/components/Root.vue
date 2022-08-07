<template lang='pug'>
  main(id='root')
    router-view()
</template>

<script>
import {mapActions, mapGetters} from 'vuex'

export default {
  data () {
    return {
    }
  },

  computed: {
    ...mapGetters([
      'webCart'
    ])
  },

  watch: {
    'webCart.length' (val, oldVal) {
      if (val > oldVal) {
        this.loadWebCartItems()
      }
    }
  },

  created () {
    this.loadCompany()
    this.loadCategories()
    this.loadCategoriesOutstanding()
    this.loadWebCartItems()
  },

  methods: {
    ...mapActions({
      loadCompany: 'loadCompany',
      loadCategories: 'loadCategories',
      loadCategoriesOutstanding: 'loadCategoriesOutstanding',
      loadWebCartItems: 'loadWebCartItems'
    })
  }
}
</script>
