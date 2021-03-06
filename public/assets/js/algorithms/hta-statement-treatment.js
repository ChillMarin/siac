/*VUE INSTANCE*/
let vm = new Vue({
    vuetify,
    el: '#siac-suite-container',
    data: {
      loading: false,
      ampa_form: false,
      diagnostic: '',
      tracking: '',
      treatment: '',
      vars: {
        pas: '',
        pad: '',
        ampa: ''
      }
    },

    watch: {
      vars: {
        deep: true,
        handler: 'calc'
      }
    },

    computed: {

    },

    created () {
    },

    mounted () {
    },

    methods: {
      calc () {
        var app = this
        var pas = parseInt(app.vars.pas)
        var pad = parseInt(app.vars.pad)
        var ampa = app.vars.ampa
        var ampa_form = app.ampa_form
        var tracking = app.tracking
        var diagnostic = app.diagnostic

        app.ampa_form = false

        if (pas < 130 && pad < 80) {
          app.ampa = ''
          if (pas < 120) {
            app.diagnostic = 'Normal'
            app.tracking = 'PA casual cada 12 meses'
          }
          else {
            app.diagnostic = 'Elevada'
            app.tracking = 'PA casual cada 6 meses'
          }
        }
        else if (pas >= 130 && pas < 180 && pad >= 80 && pad < 110) {
          app.ampa_form = true
          ampa = ampa.split('/')
          if (parseInt(ampa[0]) <= 130 && parseInt(ampa[1]) <= 80) {
            app.diagnostic = 'Hipertensión de bata blanca'
            app.tracking = 'PA Casual cada 6 meses'
          }
          else if (parseInt(ampa[0]) > 130 && parseInt(ampa[1]) > 80) {
            app.diagnostic = 'Hipertensión arterial'
            app.tracking = 'Iniciar tratamiento medicantoso'
            if (parseInt(ampa[0]) < 135 && parseInt(ampa[1]) < 85 && parseInt(ampa[0]) > 130 && parseInt(ampa[1]) > 80 ) {
              app.diagnostic += ' (Estadio 1)'
            }
            else if (parseInt(ampa[0]) < 135 && parseInt(ampa[1]) < 85) {
              app.diagnostic += ' (Estadio 2)'
            }
          }
        }
      }
    }
});
