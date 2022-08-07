<template lang="pug">
  div(class='c-footer')
    div(class='o-wrapper')
      div(class='c-footer__info')
        div(class='c-footer__info-item' )
          i(class='u-icon c-footer__info-icon') email
          p(class='c-footer__info-content')
            span Escríbenos
            router-link(
              :to="{name: 'Contact'}"
              class='c-footer__link'
            ) {{company.email}}
        div(class='c-footer__info-item'  )
          i(class='u-icon c-footer__info-icon') location
          div(class='c-footer__info-content')
            p(class='u-m0') Ubícanos
            router-link(
              :to="{name: 'Contact', hash:'#ubicacion'}"
              class='c-footer__link'
            ) {{company.address}}
        div(class='c-footer__info-item'  )
          i(class='u-icon c-footer__info-icon u-icon cellphone') whatsapp_o
          p(class='c-footer__info-content')
            span Llámanos
            router-link(
              :to="{name: 'Contact'}"
              class='c-footer__link'
            ) {{ company.cellphone }}
        //- div(class='c-footer__info-item'  )
          i(class='u-icon c-footer__info-icon') open_book
          p(class='c-footer__info-content')
            router-link(:to="{name: 'Claims'}" class='u-white u-text-decoration-none') Libro de Reclamaciones

      //- nav(class='c-footer__nav')
      //-   div(class='u-flex u-items-center u-justify-center')
      //-     router-link(:to="{name: 'Home'}" class='c-footer__logo')
      //-       img(:src='company.whiteLogoUrl', :alt='company.name')
      //-   ul(class='c-footer__list')
      //-     li(class='c-footer__list-item') Sobre {{company.name}}
      //-     li(class='c-footer__list-item')
      //-       router-link(
      //-         :to="{name: 'AboutUs', hash:'#quienes-somos'}"
      //-         class='c-footer__link'
      //-         v-if="$route.name !== 'AboutUs'"
      //-       ) ¿Quienes Somos?
      //-       a(href="#" v-scroll-to="'#quienes-somos'" class='c-footer__link' v-else) ¿Quienes Somos?

      //-     li(class='c-footer__list-item')
      //-       router-link(
      //-         :to="{name: 'AboutUs', hash:'#mision'}"
      //-         v-if="$route.name !== 'AboutUs'"
      //-         class='c-footer__link'
      //-       ) Visión y Misión
      //-       a(href="#" v-scroll-to="'#mision'" class='c-footer__link' v-else) Visión y Misión

      //-     li(class='c-footer__list-item')
      //-       router-link(
      //-         :to="{name: 'AboutUs', hash:'#valores'}"
      //-         v-if="$route.name !== 'AboutUs'"
      //-         class='c-footer__link'
      //-       ) Valores Corporativos
      //-       a(href="#" v-scroll-to="'#valores'" class='c-footer__link' v-else) Valores Corporativos

      //-     li(class='c-footer__list-item')
      //-       router-link(
      //-         :to="{name: 'AboutUs', hash:'#trabaja'}"
      //-         v-if="$route.name !== 'AboutUs'"
      //-         class='c-footer__link'
      //-       ) Trabaja con Nosotros
      //-       a(href="#" v-scroll-to="'#trabaja'" class='c-footer__link' v-else) Trabaja con Nosotros

      //-   ul(class='c-footer__list')
      //-     li(class='c-footer__list-item') Servicios al Cliente
      //-     li(class='c-footer__list-item')
      //-       router-link(
      //-         :to="{name: 'Contact', hash:'#contacto'}"
      //-         v-if="$route.name !== 'Contact'"
      //-         class='c-footer__link'
      //-       ) Contáctenos
      //-       a(href="#" v-scroll-to="'#contacto'" class='c-footer__link' v-else) Contáctenos

      //-     li(class='c-footer__list-item')
      //-       router-link(
      //-         :to="{name: 'Contact', hash:'#ubicacion'}"
      //-         v-if="$route.name !== 'Contact'"
      //-         class='c-footer__link'
      //-       ) Ubicación de la Tienda
      //-       a(href="#" v-scroll-to="'#ubicacion'" class='c-footer__link' v-else) Ubicación de la Tienda

      //-     li(class='c-footer__list-item')
      //-       router-link(
      //-         :to="{name: 'Support', hash:'#preguntas'}"
      //-         v-if="$route.name !== 'Support'"
      //-         class='c-footer__link'
      //-       ) Preguntas Frecuentas
      //-       a(href="#" v-scroll-to="'#preguntas'" class='c-footer__link' v-else) Preguntas Frecuentas

      //-   ul(class='c-footer__list')
      //-     li(class='c-footer__list-item') Más de {{company.name}}
      //-     li(class='c-footer__list-item')
      //-       router-link(:to="{name: 'Catalog'}" class='c-footer__link') Ver Catálogo

      //-   ul(class='c-footer__list ')
      //-    div(class='c-footer__info-item'  )
      //-     i(class='u-icon c-footer__info-icon') open_book
      //-    div(class='c-footer__info-item'  )
      //-     p(class='c-footer__info-content')
      //-       router-link(:to="{name: 'Claims'}" class='u-white u-text-decoration-none') Libro de Reclamaciones

    footer(class=' u-white o-wrapper u-center u-py3 u-line-height-1') {{currentDate.getFullYear()}} &copy Todos los derechos reservados {{company.legalName}} {{company.city}} - {{company.country}} | Desarrollado por&nbsp;
      a(href='http://noveltie.la/' target='_blank' class='u-white') Noveltie
</template>

<script>
import {mapGetters} from 'vuex'

export default {
  data () {
    return {
      currentDate: new Date()
    }
  },
  computed: {
    ...mapGetters({
      company: 'company'
    })
  }
}
</script>
