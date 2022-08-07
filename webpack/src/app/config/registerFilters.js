export default function registerFilters (Vue) {
  // Filtro de texto -> length = máximo de caracteres
  Vue.filter('truncate', function (value, length) {
    if (value.length < length) {
      return value
    }

    length = length - 3
    return value.substring(0, length) + '...'
  })

  // Filtro de hora -> 02:00:00 to 02:00am | 16:00:00 to 04:00pm
  Vue.filter('hour', function (value) {
    if (value) {
      const time = value.split(':')
      let hour
      let hourName

      if (parseInt(time[0], 10) > 12) {
        hour = parseInt(time[0], 10) % 12
        hourName = 'pm'
      } else {
        hour = parseInt(time[0], 10)
        hourName = 'am'
      }
      hour = hour < 10 ? '0' + hour : hour
      return hour + ':' + time[1] + hourName
    } else {
      return value
    }
  })

  // Filtro de fecha -> 2016-01-01 to 01/01/2016
  Vue.filter('reverseDate', function (value) {
    if (value) {
      return value.split('-').reverse().join('/')
    } else {
      return value
    }
  })

  // Filtro de fecha -> Dia(01) | Mes(ene) | Año(2016) | Fecha Completa(01 de Enero del 2016)
  Vue.filter('date', function (value, datetype) {
    if (value) {
      const date = value.split('-').reverse()
      const monthNumber = parseInt(date[1], 10)
      let monthName
      let monthNameFull
      switch (monthNumber) {
        case 1:
          monthName = 'ene'
          monthNameFull = 'enero'
          break
        case 2:
          monthName = 'feb'
          monthNameFull = 'febrero'
          break
        case 3:
          monthName = 'mar'
          monthNameFull = 'marzo'
          break
        case 4:
          monthName = 'abr'
          monthNameFull = 'abril'
          break
        case 5:
          monthName = 'may'
          monthNameFull = 'mayo'
          break
        case 6:
          monthName = 'jun'
          monthNameFull = 'junio'
          break
        case 7:
          monthName = 'jul'
          monthNameFull = 'julio'
          break
        case 8:
          monthName = 'ago'
          monthNameFull = 'agosto'
          break
        case 9:
          monthName = 'sep'
          monthNameFull = 'septiembre'
          break
        case 10:
          monthName = 'oct'
          monthNameFull = 'octubre'
          break
        case 11:
          monthName = 'nov'
          monthNameFull = 'noviembre'
          break
        case 12:
          monthName = 'dic'
          monthNameFull = 'diciembre'
          break
      }
      switch (datetype) {
        case 'day':
          return date[0]
        case 'month':
          return monthName
        case 'year':
          return date[2]
        case 'short':
          return date[0] + ' de ' + monthName + ' del ' + date[2]
        default:
          return date[0] + ' de ' + monthNameFull + ', ' + date[2]
      }
    } else {
      return value
    }
  })
}
