<template lang="pug">
  article(class='c-post')
    figure(class='c-post__image')
      img(class='', :src='post.imageUrl')
    div(class='c-post__content')
      h3(class='u-fz-h5 u-mt0 u-mb2') {{post.title}}
      p(class='u-fz-h6 u-mt0') {{post.date | date}}
      p(class='u-fz-h6') {{post.content}}
      router-link(:to="{name: 'Post', params:{slug: post.slug}}" class="c-post__link c-btn--primary u-mt3")
        span Leer más
        i(class='u-icon arrow_right')
</template>

<script>
export default {
  props: {
    post: {
      type: Object,
      default: () => ({})
    }
  }
}
</script>
