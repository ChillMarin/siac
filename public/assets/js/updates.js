/*VUE INSTANCE*/
moment.locale('es')
let vm = new Vue({
    vuetify,
    el: '#siac-suite-container',
    data: {
      loading: false,
      updates: [],
      updates_filtered: [],
      search_by: 'Doctor',
      search: '',
    },

    computed: {
    },

    created () {
      this.initialize()
    },

    mounted () {
    },

    methods: {
      initialize () {
        var app = this
        var url = api_url + 'updates/get'
        app.$http.get(url).then( res => {
          if (res.body.length > 0) {
            res.body.forEach((item, i) => {
              item['doctor_full_name'] = item.doctor_first_name + ' ' + item.doctor_last_name
              item['patient_full_name'] = item.patient_first_name + ' ' + item.patient_last_name
            });

            app.updates = res.body
            app.updates_filtered = res.body
          }
        }, err => {

        })
      },

      fromNow (d) {
        return moment(d).fromNow();
      },

      filterUpdates () {
        var app = this
        var query = app.search
        var search_by = app.search_by
        var filtered = app.updates.filter( (el) => {
          if (search_by == 'Doctor') {
            return el.doctor_full_name.toLowerCase().indexOf(query.toLowerCase()) > -1;
          }
          else if (search_by == 'Paciente') {
            return el.patient_full_name.toLowerCase().indexOf(query.toLowerCase()) > -1;
          }
        })
        return app.updates_filtered = filtered
      },

      getAlertClass (c) {
        if (c == 'update') {
         return 'success'
        }
        else if (c == 'delete') {
          return 'error'
        }
        else {
          return 'primary'
        }
      },

  	}
});
