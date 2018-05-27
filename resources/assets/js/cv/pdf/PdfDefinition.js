import WorkExperiencesPdf from './WorkExperiencesPdf'

import AcademicQualificationsPdf from './AcademicQualificationsPdf'

import TrainingsAttendedPdf from './TrainingsAttendedPdf'

import AwardsReceivedPdf from './AwardsReceivedPdf'

import PersonalSkillsPdf from './PersonalSkillsPdf'

import LanguagePdf from './LanguagePdf'

import ExtraCurricularPdf from './ExtraCurricularPdf'

import RefereesPdf from './RefereesPdf'

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
        pageMargins: [ 55, 55, 30, 40 ],

        footer: (currentPage, pageCount) => {
          return {
            margin: [55, 0, 30, 40],
            table: {
              widths: ['*', 'auto', '*'],
              body: [
                [
                  {text: this.getApplicantName(), italics: true, alignment: 'left'},
                  {text: currentPage.toString()},
                  {
                    alignment: 'right',
                    text: [
                      {text: 'CV By: '},
                      {
                        text: 'niajiri.co.tz',
                        color: 'blue',
                        link: 'http://www.niajiri.co.tz/'
                      }
                    ]
                  }
                ],
              ]
            },
            layout: 'noBorders'
          }
        },

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
          detailsTable: {
      			margin: [0, 2, 0, 2]
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
              { text: this.getEmailContacts() + '\n\n\n'},
            ]
          },

          {text: 'PERSONAL PARTICULARS:\n', style: 'tableHeader'},
          {
            //Personal particulars and image
            columns: [
              {
                width: '*',
                style: 'niajiriTable',
                table: {
                  widths: ['auto', 'auto', 'auto'],
                  heights: [0, 15, 15, 15, 15, 15, 15],
                  body: [
                    [{text: 'Date Of Birth'}, {text: ':'}, {text: this.getDateOfBirth()}],
                    [{text: 'Gender'}, {text: ':'}, {text: this.payload.user.gender}],
                    [{text: 'Postal Address'}, {text: ':'}, {text: this.payload.user.postal_address}],
                    [{text: 'Physical Address'}, {text: ':'}, {text: this.payload.user.physical_address}],
                    [{text: 'State/Region'}, {text: ':'}, {text: this.payload.user.state}],
                    [{text: 'Country'}, {text: ':'}, {text: this.payload.user.country}]
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
                [{text: this.payload.user.summary, alignment: 'justify'}],
              ]
            },
            layout: 'noBorders'
            //End of profile
          },

          {text: 'WORK EXPERIENCES:\n', bold: true},

          //Start Of Experience Table
          WorkExperiencesPdf.getWorkExperiences(this.payload.experiences),
          //End Of Experience Table

          {text: 'ACADEMIC QUALIFICATIONS:\n', bold: true, margin: [0, 10, 0, 0]},

          //Start Of Academic Qualifications Table
          AcademicQualificationsPdf.getAcademic(this.payload.educations),
          //End Of Academic Qualifications Table

          {text: 'TRAININGS ATTENDED:\n', bold: true, margin: [0, 10, 0, 0]},

          //Start Of Trainings Attended Table
          TrainingsAttendedPdf.getTrainings(this.payload.certificates),
          //End Of Trainings Attended Table

          {text: 'AWARDS RECEIVED:\n', bold: true, margin: [0, 10, 0, 0]},

          //Start Of Awards Table
          AwardsReceivedPdf.getAwards(this.payload.honors),
          //End Of Awards Table

          {text: 'LANGUAGE PROFICIENCY:\n', bold: true, margin: [0, 10, 0, 5]},

          //Start Of Language Table
          {
            style: 'detailsTable',
            table: {
              widths: ['*', '*', '*'],
              body: LanguagePdf.getLanguages(this.payload.languages)
            }
          },
          //End Of Language Table

          {text: 'PERSONAL SKILLS:\n', bold: true, margin: [0, 20, 0, 5]},

          //Start Of Personal Skills
          {
            type: 'square',
            ul: PersonalSkillsPdf.getSkills(this.payload.user.skills)
          },
          //End Of Personal Skills

          {text: 'EXTRACURRICULAR ACTIVITIES:\n', bold: true, margin: [0, 20, 0, 5]},

          //Start Of ExtraCurricular Activities
          {
            type: 'square',
            ul: ExtraCurricularPdf.getActivities(this.payload.user.extracurricular_activities)
          },
          //End Of ExtraCurricular Activities

          {
            text: 'REFEREES:\n', pageBreak: 'before',
            bold: true
          },

          //Start Of Academic Qualifications Table
          RefereesPdf.getReferees(this.payload.referees),
          //End Of Academic Qualifications Table

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

      if(emails.indexOf(null) === -1) return emails.join(" or ")

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

//End of PdfDefinition class
}
