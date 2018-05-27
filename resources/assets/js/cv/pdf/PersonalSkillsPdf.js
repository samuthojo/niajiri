export default {

  getSkills(skills) {

      let personalSkills = skills.split(',')

      for(let index in personalSkills) {

        personalSkills.splice(index, 1, personalSkills[index].trim())

      }

      return personalSkills

  }

}
