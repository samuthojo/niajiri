export default {

  getLanguages(languages) {

      let applicantLanguages = [
        [
          {text: 'LANGUAGE', bold: true},
          {text: 'WRITTEN', bold: true},
          {text: 'ORAL', bold: true}
        ]
      ]

      for(let index in languages) {

        applicantLanguages.push([
          {text: languages[index].name},
          {text: languages[index].write_fluency},
          {text: languages[index].speak_fluency}
        ])

      }

      return applicantLanguages

  }

}
