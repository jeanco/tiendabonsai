<template lang='pug'>
  .c-not-found.o-wrapper
    img.c-not-found__image(src='/images/404.png')
    h1.c-not-found__title Parece que hubo un problema
    p.c-not-found__text &iexcl;La p&aacute;gina que busca no est&aacute; disponible!
    router-link.c-btn.c-btn--secondary(:to="{name: 'Home'}") Regresar al Inicio
</template>

<script>
export default {
  name: 'NotFoundScreen'
}
</script>
