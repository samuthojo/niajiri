export default {

  getActivities(activities) {

      let extraCurricular = activities.split(',')

      for(let index in extraCurricular) {

        extraCurricular.splice(index, 1, extraCurricular[index].trim())

      }

      return extraCurricular

  }

}
