<template>
  <div
    v-if="category"
    class="u-absolute u-bg-white u-z2 u-width-full u-shadow u-bg-darken-full"
  >
    <div class="u-bg-white u-py3">
      <div class="o-wrapper u-flex u-items-center">
        <img
          :alt="category.name"
          :src="category.iconUrl"
          class="u-w4 u-mr2"
        >
        <p class="u-fz-h5 u-fw-bold u-mt0 u-mb0 u-mr3">
          {{ category.name }}
        </p>

        <router-link
          :to="{ name: 'Category', params:{ categorySlug: category.slug } }"
          class="u-uppercase u-fz-xs u-border u-py1 u-border-secondary u-text-decoration-none u-color-primary u-fw-s-bold u-px2"
        >Ver todo</router-link>
      </div>
    </div>

    <div class="o-wrapper u-bg-white">
      <ul class="u-pl0 u-list-reset u-flex u-flex-wrap u-mt0 u-mb0 u-pb3">
        <li
          v-for="subcategory in category.subcategories"
          :key="subcategory.id"
          class="u-12/12 u-6/12@mobile u-4/12@tablet  u-3/12@laptop u-py2"
        >
          <router-link
            :to="{ name: 'Subcategory', params: { categorySlug: category.slug, subcategorySlug: subcategory.slug } }"
            class="u-link"
          >
            {{ subcategory.name }}
          </router-link>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    category: {
      type: Object,
      default: null
    }
  }
}
</script>
