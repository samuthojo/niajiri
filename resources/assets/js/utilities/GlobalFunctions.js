export default {

  getReadableMonth(int) {

    switch(parseInt(int)) {

      case 1: return 'January'

      case 2: return 'February'

      case 3: return 'March'

      case 4: return 'April'

      case 5: return 'May'

      case 6: return 'June'

      case 7: return 'July'

      case 8: return 'August'

      case 9: return 'September'

      case 10: return 'October'

      case 11: return 'November'

      case 12: return 'December'
    }

  },

  getShortDate(date) {

    if(!date) return ''

    date = date.toString()

    if(date.indexOf('-') != -1) {
      let isoDate = date.split(' ')[0]
      let year = isoDate.split('-')[0]
      let month = isoDate.split('-')[1]

      return globals.getReadableMonth(month) + " " + year
    }

    return date
  },

  getIndex(arrayOfObjects, comparisonObject) {

    return arrayOfObjects.findIndex(object => object.id == comparisonObject.id);

  }

}
