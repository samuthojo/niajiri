export default {

  getReferees(referees) {

      let applicantReferees = []

      let counter = 1;

      for(let index in referees) {

        applicantReferees.push({
          style: 'detailsTable',

                  table: {
                    widths: ['auto', 'auto', 'auto', 'auto'],
                    body: [
                      [
                        {
                          text: (counter++) + ".",
                          bold: true
                        },
                        {
                          text: referees[index].name,
                          bold: true
                        },
                        {},
                        {}
                      ],
                      [
                        {},
                        {
                          text: 'Title'
                        },
                        {text: ':'},
                        {text: referees[index].title}
                      ],
                      [
                        {},
                        {
                          text: 'Organization'
                        },
                        {text: ':'},
                        {text: referees[index].organization}
                      ],
                      [
                        {},
                        {
                          text: 'Mobile'
                        },
                        {text: ':'},
                        {text: referees[index].mobile}
                      ],
                      [
                        {},
                        {
                          text: 'Alternative Mobile'
                        },
                        {text: ':'},
                        {text: referees[index].alternative_mobile}
                      ],
                      [
                        {},
                        {
                          text: 'Email'
                        },
                        {text: ':'},
                        {text: referees[index].email}
                      ],
                    ]
                  },
                  layout: 'noBorders'
                
        })

      }

      return applicantReferees
  }

}
