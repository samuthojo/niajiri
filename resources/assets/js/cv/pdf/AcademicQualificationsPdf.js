export default {

  getAcademic(educations) {

      let academicQualifications = []

      let counter = 1;

      for(let index in educations) {

        academicQualifications.push({
          style: 'detailsTable',
          table: {
            widths: ['auto', 495],
            body: [
              [
                {
                  text: (counter++) + ".",
                  bold: true,
                  alignment: 'left'
                },
                {
                  text: globals.getShortDate(educations[index].started_at) +
                  " - " + globals.getShortDate(educations[index].finished_at),
                  bold: true
                }
              ],
              [
                {},
                {
                  table: {
                    widths: ['auto', 'auto', 'auto'],
                    body: [
                      [
                        {
                          text: 'Level',
                          bold: true
                        },
                        {text: ':'},
                        {text: educations[index].level}
                      ],
                      [
                        {
                          text: 'Majored in',
                          bold: true
                        },
                        {text: ':'},
                        {text: educations[index].summary}
                      ],
                      [
                        {
                          text: 'GPA/Score',
                          bold: true
                        },
                        {text: ':'},
                        {text: educations[index].remark}
                      ],
                      [
                        {
                          text: 'Institution',
                          bold: true
                        },
                        {text: ':'},
                        {text: educations[index].institution}
                      ],
                    ]
                  },
                  layout: 'noBorders'
                }
              ],
            ]
          },
          layout: 'noBorders'
        })

      }

      return academicQualifications
  }

}
