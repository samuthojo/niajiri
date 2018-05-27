export default {

  getAwards(honors) {

      let awards = []

      let counter = 1;

      for(let index in honors) {

        awards.push({
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
                          text: "Title",
                          bold: true
                        },
                        {text: ':'},
                        {text: honors[index].title}
                      ],
                      [
                        {},
                        {
                          text: 'Issued',
                          bold: true
                        },
                        {text: ':'},
                        {text: globals.getShortDate(honors[index].issued_at)}
                      ],
                      [
                        {},
                        {
                          text: 'Organization',
                          bold: true
                        },
                        {text: ':'},
                        {text: honors[index].organization}
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
                      [{}, {}, {text: 'Reason for the award:', bold: true}],
                      [{}, {}, {text: honors[index].summary}]
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

      return awards
  }

}
