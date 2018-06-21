export default {

  getInterests(interests) {

      let personalInterests = interests.split(',')

      for(let index in personalInterests) {

        personalInterests.splice(index, 1, personalInterests[index].trim())

      }

      return personalInterests

  }

}
