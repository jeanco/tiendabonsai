<template lang="pug">
  div
    label(class='u-mb1 u-block u-fz-h6' v-if='label', :class='labelClass') {{label}}

    div(:class='wrapperClass' class='c-input')
      textarea(v-if="type === 'textarea'",
        :value='value',
        ref='input',
        :placeholder='placeholder'
        @input='updateValue($event.target.value)',
        :class="[inputClass,{'u-border-error' : message}]",
        :rows='rows'
      )

      input(v-else
        :value='value',
        :type='type',
        :name='name',
        ref='input',
        :placeholder='placeholder',
        :min='min'
        @blur='formatValue'
        @input='updateValue($event.target.value)',
        :class="[inputClass,{'u-border-error' : message}]"
      )

    span(v-if='message' class='u-fz-xs', :class='errorClass') {{message}}
</template>

<script>
import Validator from 'validatorjs'

export default {
  props: {
    inputClass: {
      type: String,
      default: ''
    },
    wrapperClass: {
      type: String,
      default: ''
    },
    mask: {
      type: String,
      default: ''
    },
    label: {
      type: String,
      default: ''
    },
    labelClass: {
      type: String,
      default: ''
    },
    name: {
      type: String,
      default: ''
    },
    placeholder: {
      type: String,
      default: ''
    },
    validation: {
      type: Boolean,
      default: false
    },
    value: {
      type: String,
      default: ''
    },
    icon: {
      type: String,
      default: ''
    },
    min: {
      type: String,
      default: ''
    },
    errorBorder: {
      type: String,
      default: 'u-border-error'
    },
    errorClass: {
      type: String,
      default: 'u-color-error'
    },
    type: {
      type: String,
      default: 'text'
    },
    rule: {
      type: String,
      default: ''
    },
    messageColor: {
      type: String,
      default: 'error'
    },
    rows: {
      type: String,
      default: '4'
    }
  },

  data () {
    return {
      message: '',
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
      this.$emit('input', value)
      this.validate()
    },

    validate () {
      if (this.rule) {
        const self = this
        setTimeout(() => {
          let validate = new Validator({value: self.$refs.input.value ? self.$refs.input.value : self.value}, {value: self.rule})
          self.validated = validate.passes()
          self.message = validate.errors.first('value')
        }, 10)
      }
    },

    formatValue () {
      if (this.type === 'number' && this.value < this.min && this.value === !null) {
        this.$emit('input', this.min)
      }
    }
  }
}
</script>
