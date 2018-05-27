export default {

  getTrainings(certifications) {

      let trainings = []

      let counter = 1;

      for(let index in certifications) {

        trainings.push({
          style: 'detailsTable',
          table: {
            widths: [500],
            body: [

              [
                {
                  table: {
                    widths: ['auto', 'auto', 'auto', 'auto'],
                    body: [
                      [
                        {
                          text: (counter++) + ".", bold: true, alignment: 'left'
                        },
                        {
                          text: globals.getShortDate(certifications[index].started_at) +
                                " - " + globals.getShortDate(certifications[index].finished_at),
                          bold: true
                        },
                        {},
                        {}
                      ],
                      [
                        {},
                        {
                          text: "Title",
                          bold: true
                        },
                        {text: ':'},
                        {text: certifications[index].title}
                      ],
                      [
                        {},
                        {
                          text: 'Institution',
                          bold: true
                        },
                        {text: ':'},
                        {text: certifications[index].institution}
                      ],
                    ]
                  },
                  layout: 'noBorders'
                }
              ],
              [
                //Summary Table
                {
                  style: 'detailsTable',
                  table: {
                    widths: ['auto', 'auto', '*'],
                    body: [
                      [{}, {}, {text: 'Summary of the training:', bold: true}],
                      [{}, {}, {text: certifications[index].summary}]
                    ]
                  },
                  layout: 'noBorders'
                }
                //End of Summary Table
              ]
            ]
          },
          layout: 'noBorders'
        })

      }

      return trainings
  }

}
