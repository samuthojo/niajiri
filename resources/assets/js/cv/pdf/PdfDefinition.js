export class PdfDefinition {

    constructor() {
      this.payload = {}
    }

    //Returns the docDefinition object
    getDocDefinition() {
      //Start of getDocDefinition method

      return {
        //Start of return

        pageSize: 'A4',

        // [left, top, right, bottom] or [horizontal, vertical] or just a number for equal margins
        pageMargins: [ 55, 60, 30, 40 ],

        styles: {
          //Start of styles
          header: {
            fontSize: 24,
            bold: true
          },
          center: {
            alignment: 'center'
          },
          niajiriTable: {
      			margin: [0, 5, 0, 15]
      		},
          tableHeader: {
      			bold: true,
      			fontSize: 13,
      			color: 'black'
      		}
          //End of styles
        },

        content: [
          //Start of content
          {
            style: 'center',
            text: [
              { text: this.getApplicantName() + '\n',
                style: 'header'
              },

              { text: 'Mobile: ',
                bold: true
              },
              { text: this.getMobileContacts() + '\n' },

              { text: 'Email: ',
                bold: true
              },
              { text: this.getEmailContacts() + '\n\n\n' }
            ]
          },

          {
            //Personal particulars and image
            columns: [
              {
                width: '*',
                style: 'niajiriTable',
                table: {
                  heights: [0, 15, 15, 15, 15, 15, 15],
                  headerRows: 1,
                  body: [
                    [{text: 'PERSONAL PARTICULARS:', style: 'tableHeader'}, {text: ''}],
                    ['Date Of Birth ', ': ' + this.getDateOfBirth()],
                    ['Gender ', ': ' + this.payload.user.gender],
                    ['Postal Address ', ': ' + this.payload.user.postal_address],
                    ['Physical Address ', ': ' + this.payload.user.physical_address],
                    ['State ', ': ' + this.payload.user.state],
                    ['Country ', ': ' + this.payload.user.country]
                  ]
                },
                layout: 'noBorders'
              },

              {
                //Start of the applicant avatar
                width: 110,
                image: this.payload.user.pdfAvatar,
                height: 110
                //End of the applicant avatar
              }
            ]
            //End of personal particulars and image
          },

          {
            //Start of profile
            style: 'niajiriTable',
            table: {
              widths: [500],
              headerRows: 1,
              body: [
                [{text: 'PROFILE:', style: 'tableHeader'}],
                [{text: this.payload.user.summary}],
              ]
            },
            layout: 'noBorders'
            //End of profile
          },

          {
            //Start of work experience
            text: [
              {
                bold: true,
                text: 'WORK EXPERIENCE:\n'
              }
            ]

            //End of work experience
          }

         //End of content
        ]

        //End of return
      }

      //End of getDocDefinition method
    }

    getApplicantName() {

      let names = [
        this.payload.user.first_name,
        this.payload.user.middle_name,
        this.payload.user.surname
      ]

      if(this.payload.user.middle_name) return names.join(" ")

      names.splice(1, 1) //otherwise remove the middle_name from the array

      return names.join(" ")

    }

    getMobileContacts() {

      let mobiles = [
        this.payload.user.mobile,
        this.payload.user.alternative_mobile
      ]

      if(mobiles.indexOf(null) === -1)

        return mobiles[0] + " or " + mobiles[1]

      return mobiles[0]

    }

    getEmailContacts() {

      let emails = [
        this.payload.user.email,
        this.payload.user.secondary_email
      ]

      if(emails.indexOf(null) === -1)

        return emails[0] + " or " + emails[1]

      return emails[0]

    }

    getDateOfBirth() {

      let date = this.payload.user.dob

       if(!date) return ''

       date = date.toString()

       if(date.indexOf('-') != -1) {
         let isoDate = date.split(' ')[0]
         let year = isoDate.split('-')[0]
         let month = isoDate.split('-')[1]
         let day = isoDate.split('-')[2]

         return day + " " + globals.getReadableMonth(month) + " " + year
       }

       return date

    }

}
