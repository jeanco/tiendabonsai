<template>
  <article>
    <p class="u-flex u-items-center">
      <img
        v-if="categoryIcon"
        :src="categoryIcon"
        :alt="categoryName"
        class="c-section__icon u-mr2"
      >
      <span class="u-fz-h4 u-fw-bold u-uppercase">{{ categoryName }}</span>
    </p>

    <!-- <div class="c-section__info">
      <div class="c-section__info-data">

      </div>

      <div class="u-center u-show@tablet">
        <button
          class="c-btn-nav c-btn-nav--white u-mx1"
          @click="$refs.slickItems.prev()"
        >
          <i class="u-icon arrow_left"/>
        </button>
        <button
          class="c-btn-nav c-btn-nav--white u-mx1"
          @click="$refs.slickItems.next()"
        >
          <i class="u-icon arrow_right"/>
        </button>
      </div>
    </div> -->

    <div class="c-section__slider">
      <button
        class="c-btn-nav u-hide@tablet"
        @click="$refs.slickItems.prev()"
      >
        <i class="u-icon arrow_left"/>
      </button>

      <div
        v-if="items.length"
        class="c-section__slick"
      >
        <slick
          ref="slickItems"
          :options="slickItems"
          class="slick-height-auto"
        >

          <div
            v-for="item in items"
            :key="item.id"
            class="u-py1 u-px3 u-flex"
          >
            <app-item
              :item="item"
              :is-related="isRelated"
              @show-cart="$emit('show-cart')"
            />
          </div>
        </slick>
      </div>

      <button
        class="c-btn-nav u-hide@tablet"
        @click="$refs.slickItems.next()"
      ><i class="u-icon arrow_right"/></button>
    </div>
  </article>
</template>

<script>
export default {
  props: {
    items: {
      type: Array,
      default: () => []
    },
    categoryName: {
      type: String,
      default: ''
    },
    categoryIcon: {
      type: String,
      default: ''
    },
    isRelated: {
      type: Boolean,
      default: true
    }
  },

  data () {
    return {
      slickItems: {
        slidesToShow: 4,
        slidesToScroll: 1,
        arrows: false,
        infinite: true,
        autoplay: true,
        autoplaySpeed: 5000,
        responsive: [
          {
            breakpoint: 998,
            settings: {
              slidesToShow: 3
            }
          },
          {
            breakpoint: 768,
            settings: {
              slidesToShow: 2
            }
          },
          {
            breakpoint: 560,
            settings: {
              slidesToShow: 1
            }
          }
        ]
      }
    }
  }
}
</script>
