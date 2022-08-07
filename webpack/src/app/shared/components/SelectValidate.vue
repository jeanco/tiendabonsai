<template lang="pug">
  div
    label(class='u-mb1 u-block' v-if='label') {{label}}

    div(:class='wrapperClass' class='c-input')
      select(
        :value='value',
        :class='selectClass'
        :disabled='isDisabled'
        ref='input'
        @change='updateValue($event.target.value)'
      )
        option(:value='0' hidden disabled) {{placeholder}}
        option(v-for='option in options', :value='option.id' ) {{option.name}}

      i(class='u-icon') {{icon ? icon : 'arrow_down'}}

    span(class='u-fz-xs u-color-error', :class='errorClass' v-show='isShowMessage') {{message}}
</template>

<script>
import Validator from 'validatorjs'

export default {
  props: {
    isDisabled: {
      default: false,
      type: Boolean
    },
    validation: {
      type: Boolean,
      default: false
    },
    wrapperClass: {
      type: String,
      default: ''
    },
    errorClass: {
      type: String,
      default: ''
    },
    icon: {
      type: String,
      default: ''
    },
    placeholder: {
      type: String,
      default: 'Seleccione'
    },
    options: {
      type: Array,
      default: () => []
    },
    messageColor: {
      type: String,
      default: 'error'
    },
    rule: {
      type: String,
      default: 'min:1'
    },
    selectClass: {
      type: String,
      default: ''
    },
    value: {
      type: Number,
      default: null
    },
    label: {
      type: String,
      default: ''
    },
    message: {
      type: String,
      default: 'Seleccione una opción'
    }
  },

  data () {
    return {
      isShowMessage: false,
      validated: false
    }
  },

  watch: {
    validation (val, oldVal) {
      this.validate()
    }
  },

  methods: {
    updateValue (value) {
      this.validate()
      this.$emit('input', parseInt(value, 10))
    },

    validate () {
      if (this.rule) {
        let validate = new Validator({value: parseInt(this.$refs.input.value, 10)}, {value: this.rule})
        this.validated = validate.passes()

        if (validate.errors.first('value')) {
          this.isShowMessage = true
        } else {
          this.isShowMessage = false
        }
        // this.message = validate.errors.first('value')
      }
    }
  }
}
</script>
