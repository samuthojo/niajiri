export default {

  getWorkExperiences(experiences) {

      let workExperiences = []

      let counter = 1;

      for(let index in experiences) {

        workExperiences.push({
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
                  text: globals.getShortDate(experiences[index].started_at) +
                  " - " + globals.getShortDate(experiences[index].ended_at),
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
                          text: 'Position',
                          bold: true
                        },
                        {text: ':'},
                        {text: experiences[index].position}
                      ],
                      [
                        {
                          text: 'Sector/Department',
                          bold: true
                        },
                        {text: ':'},
                        {text: experiences[index].sector}
                      ],
                      [
                        {
                          text: 'Organization',
                          bold: true
                        },
                        {text: ':'},
                        {text: experiences[index].organization}
                      ],
                      [
                        {
                          text: 'Location',
                          bold: true
                        },
                        {text: ':'},
                        {text: experiences[index].location}
                      ],
                    ]
                  },
                  layout: 'noBorders'
                }
              ],
              [
                {},
                //Achievement Table
                {
                  style: 'detailsTable',
                  table: {
                    widths: [500],
                    body: [
                      [{text: 'Achievement in this role:', bold: true}],
                      [{text: experiences[index].summary}]
                    ]
                  },
                  layout: 'noBorders'
                }
                //End of Achievement Table
              ]
            ]
          },
          layout: 'noBorders'
        })

      }

      return workExperiences
  }

}
