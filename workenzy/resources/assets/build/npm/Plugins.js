/*
 * File name: Plugins.js
 * Last modified: 2021.01.29 at 23:27:25
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

'use strict'

const Plugins = [
  // jQuery
  {
    from: 'node_modules/jquery/dist',
    to: 'public/vendor/jquery'
  },
  // Popper
  {
    from: 'node_modules/popper.js/dist',
    to: 'public/vendor/popper'
  },
  // Bootstrap
  {
    from: 'node_modules/bootstrap/dist/js',
    to: 'public/vendor/bootstrap/js'
  },
  // Font Awesome
  {
    from: 'node_modules/@fortawesome/fontawesome-free/css',
    to: 'public/vendor/fontawesome-free/css'
  },
  {
    from: 'node_modules/@fortawesome/fontawesome-free/webfonts',
    to: 'public/vendor/fontawesome-free/webfonts'
  },
  // overlayScrollbars
  {
    from: 'node_modules/overlayscrollbars/js',
    to: 'public/vendor/overlayScrollbars/js'
  },
    {
        from: 'node_modules/overlayscrollbars/css',
        to: 'public/vendor/overlayScrollbars/css'
    },
    // Chart.js
    {
        from: 'node_modules/chart.js/dist/',
        to: 'public/vendor/chart.js'
    },
    // // jQuery UI
    // {
    //   from: 'node_modules/jquery-ui-dist/',
    //   to: 'public/vendor/jquery-ui'
    // },
    // // Flot
    // {
    //   from: 'node_modules/flot/dist/es5/',
    //   to: 'public/vendor/flot'
    // },
    // {
    //   from: 'node_modules/flot/source/',
    //   to: 'public/vendor/flot/plugins'
    // },
    // Summernote
  {
    from: 'node_modules/summernote/dist/',
    to: 'public/vendor/summernote'
  },
  // // Bootstrap Slider
  // {
  //   from: 'node_modules/bootstrap-slider/dist/',
  //   to: 'public/vendor/bootstrap-slider'
  // },
  // {
  //   from: 'node_modules/bootstrap-slider/dist/css',
  //   to: 'public/vendor/bootstrap-slider/css'
    // },
    // Bootstrap Colorpicker
    {
        from: 'node_modules/bootstrap-colorpicker/dist/js',
        to: 'public/vendor/bootstrap-colorpicker/js'
    },
    {
        from: 'node_modules/bootstrap-colorpicker/dist/css',
        to: 'public/vendor/bootstrap-colorpicker/css'
    },
    // Tempusdominus Bootstrap 4
    {
        from: 'node_modules/tempusdominus-bootstrap-4/build/js',
        to: 'public/vendor/tempusdominus-bootstrap-4/js'
    },
    {
        from: 'node_modules/tempusdominus-bootstrap-4/build/css',
        to: 'public/vendor/tempusdominus-bootstrap-4/css'
    },
    // Moment
    {
        from: 'node_modules/moment/min',
        to: 'public/vendor/moment'
    },
    {
        from: 'node_modules/moment/locale',
        to: 'public/vendor/moment/locale'
    },
    // // FastClick
    // {
    //   from: 'node_modules/fastclick/lib',
    //   to: 'public/vendor/fastclick'
    // },
    // Date Range Picker
    // {
    //   from: 'node_modules/daterangepicker/',
    //   to: 'public/vendor/daterangepicker'
    // },
    // DataTables
    // {
    //   from: 'node_modules/pdfmake/build',
    //   to: 'public/vendor/pdfmake'
    // },
    {
        from: 'node_modules/jszip/dist',
        to: 'public/vendor/jszip'
    },
    {
    from: 'node_modules/datatables.net/js',
    to: 'public/vendor/datatables'
  },
  {
    from: 'node_modules/datatables.net-bs4/js',
    to: 'public/vendor/datatables-bs4/js'
  },
  {
    from: 'node_modules/datatables.net-bs4/css',
    to: 'public/vendor/datatables-bs4/css'
  },
  // {
  //   from: 'node_modules/datatables.net-autofill/js',
  //   to: 'public/vendor/datatables-autofill/js'
  // },
  // {
  //   from: 'node_modules/datatables.net-autofill-bs4/js',
  //   to: 'public/vendor/datatables-autofill/js'
  // },
  // {
  //   from: 'node_modules/datatables.net-autofill-bs4/css',
  //   to: 'public/vendor/datatables-autofill/css'
  // },
  {
    from: 'node_modules/datatables.net-buttons/js',
    to: 'public/vendor/datatables-buttons/js'
  },
  {
    from: 'node_modules/datatables.net-buttons-bs4/js',
    to: 'public/vendor/datatables-buttons/js'
  },
  {
    from: 'node_modules/datatables.net-buttons-bs4/css',
    to: 'public/vendor/datatables-buttons/css'
  },
  {
    from: 'node_modules/datatables.net-colreorder/js',
    to: 'public/vendor/datatables-colreorder/js'
  },
  {
    from: 'node_modules/datatables.net-colreorder-bs4/js',
    to: 'public/vendor/datatables-colreorder/js'
  },
  {
    from: 'node_modules/datatables.net-colreorder-bs4/css',
    to: 'public/vendor/datatables-colreorder/css'
  },
  {
    from: 'node_modules/datatables.net-fixedcolumns/js',
    to: 'public/vendor/datatables-fixedcolumns/js'
  },
  {
    from: 'node_modules/datatables.net-fixedcolumns-bs4/js',
    to: 'public/vendor/datatables-fixedcolumns/js'
  },
  {
    from: 'node_modules/datatables.net-fixedcolumns-bs4/css',
    to: 'public/vendor/datatables-fixedcolumns/css'
  },
  {
    from: 'node_modules/datatables.net-fixedheader/js',
    to: 'public/vendor/datatables-fixedheader/js'
  },
  {
    from: 'node_modules/datatables.net-fixedheader-bs4/js',
    to: 'public/vendor/datatables-fixedheader/js'
  },
  {
    from: 'node_modules/datatables.net-fixedheader-bs4/css',
    to: 'public/vendor/datatables-fixedheader/css'
  },
  {
    from: 'node_modules/datatables.net-keytable/js',
    to: 'public/vendor/datatables-keytable/js'
  },
  {
    from: 'node_modules/datatables.net-keytable-bs4/js',
    to: 'public/vendor/datatables-keytable/js'
  },
  {
    from: 'node_modules/datatables.net-keytable-bs4/css',
    to: 'public/vendor/datatables-keytable/css'
  },
  {
    from: 'node_modules/datatables.net-responsive/js',
      to: 'public/vendor/datatables-responsive/js'
  },
    {
        from: 'node_modules/datatables.net-responsive-bs4/js',
        to: 'public/vendor/datatables-responsive/js'
    },
    {
        from: 'node_modules/datatables.net-responsive-bs4/css',
        to: 'public/vendor/datatables-responsive/css'
    },
    {
        from: 'node_modules/datatables.net-rowgroup/js',
        to: 'public/vendor/datatables-rowgroup/js'
    },
    {
        from: 'node_modules/datatables.net-rowgroup-bs4/js',
        to: 'public/vendor/datatables-rowgroup/js'
    },
    {
        from: 'node_modules/datatables.net-rowgroup-bs4/css',
        to: 'public/vendor/datatables-rowgroup/css'
    },
    {
        from: 'node_modules/datatables.net-rowreorder/js',
        to: 'public/vendor/datatables-rowreorder/js'
    },
    {
        from: 'node_modules/datatables.net-rowreorder-bs4/js',
        to: 'public/vendor/datatables-rowreorder/js'
    },
    {
        from: 'node_modules/datatables.net-rowreorder-bs4/css',
    to: 'public/vendor/datatables-rowreorder/css'
  },
  {
    from: 'node_modules/datatables.net-scroller/js',
      to: 'public/vendor/datatables-scroller/js'
  },
    {
        from: 'node_modules/datatables.net-scroller-bs4/js',
        to: 'public/vendor/datatables-scroller/js'
    },
    {
        from: 'node_modules/datatables.net-scroller-bs4/css',
        to: 'public/vendor/datatables-scroller/css'
    },
    {
        from: 'node_modules/datatables.net-searchpanes/js',
        to: 'public/vendor/datatables-searchpanes/js'
    },
    {
        from: 'node_modules/datatables.net-searchpanes-bs4/js',
        to: 'public/vendor/datatables-searchpanes/js'
    },
    {
        from: 'node_modules/datatables.net-searchpanes-bs4/css',
        to: 'public/vendor/datatables-searchpanes/css'
    },
    {
        from: 'node_modules/datatables.net-select/js',
    to: 'public/vendor/datatables-select/js'
  },
  {
    from: 'node_modules/datatables.net-select-bs4/js',
    to: 'public/vendor/datatables-select/js'
  },
  {
    from: 'node_modules/datatables.net-select-bs4/css',
    to: 'public/vendor/datatables-select/css'
  },

  // // Fullcalendar
  // {
  //   from: 'node_modules/fullcalendar/',
  //   to: 'public/vendor/fullcalendar'
  // },
  // icheck bootstrap
  {
    from: 'node_modules/icheck-bootstrap/',
    to: 'public/vendor/icheck-bootstrap'
  },
  // // inputmask
  // {
  //   from: 'node_modules/inputmask/dist/',
  //   to: 'public/vendor/inputmask'
  // },
  // // ion-rangeslider
  // {
  //   from: 'node_modules/ion-rangeslider/',
  //   to: 'public/vendor/ion-rangeslider'
  // },
  // // JQVMap (jqvmap-novulnerability)
  // {
  //   from: 'node_modules/jqvmap-novulnerability/dist/',
  //   to: 'public/vendor/jqvmap'
  // },
  // // jQuery Mapael
  // {
  //   from: 'node_modules/jquery-mapael/js/',
  //   to: 'public/vendor/jquery-mapael'
  // },
  // // Raphael
  // {
  //   from: 'node_modules/raphael/',
  //   to: 'public/vendor/raphael'
  // },
  // // jQuery Mousewheel
  // {
  //   from: 'node_modules/jquery-mousewheel/',
  //   to: 'public/vendor/jquery-mousewheel'
  // },
  // // jQuery Knob
  // {
  //   from: 'node_modules/jquery-knob-chif/dist/',
  //   to: 'public/vendor/jquery-knob'
  // },
  // // pace-progress
  // {
  //   from: 'node_modules/@lgaitan/pace-progress/dist/',
  //   to: 'public/vendor/pace-progress'
  // },
  // Select2
  {
    from: 'node_modules/select2/dist/',
    to: 'public/vendor/select2'
  },
  {
    from: 'node_modules/@ttskch/select2-bootstrap4-theme/dist/',
    to: 'public/vendor/select2-bootstrap4-theme'
  },
  // // Sparklines
  // {
  //   from: 'node_modules/sparklines/source/',
  //   to: 'public/vendor/sparklines'
  // },
  // // SweetAlert2
  // {
  //   from: 'node_modules/sweetalert2/dist/',
  //   to: 'public/vendor/sweetalert2'
  // },
  // {
  //   from: 'node_modules/@sweetalert2/theme-bootstrap-4/',
  //   to: 'public/vendor/sweetalert2-theme-bootstrap-4'
  // },
  // // Toastr
  // {
  //   from: 'node_modules/toastr/build/',
  //   to: 'public/vendor/toastr'
  // },
  // // jsGrid
  // {
  //   from: 'node_modules/jsgrid/dist',
  //   to: 'public/vendor/jsgrid'
  // },
  // {
  //   from: 'node_modules/jsgrid/demos/db.js',
  //   to: 'public/vendor/jsgrid/demos/db.js'
  // },
  // // flag-icon-css
  // {
  //   from: 'node_modules/flag-icon-css/css',
  //   to: 'public/vendor/flag-icon-css/css'
  // },
  // {
  //   from: 'node_modules/flag-icon-css/flags',
  //   to: 'public/vendor/flag-icon-css/flags'
  // },
  // // bootstrap4-duallistbox
  // {
  //   from: 'node_modules/bootstrap4-duallistbox/dist',
  //   to: 'public/vendor/bootstrap4-duallistbox/'
  // },
  // // filterizr
  // {
  //   from: 'node_modules/filterizr/dist',
  //   to: 'public/vendor/filterizr/'
  // },
    // // ekko-lightbox
    // {
    //   from: 'node_modules/ekko-lightbox/dist',
    //   to: 'public/vendor/ekko-lightbox/'
    // },
    // // bootstrap-switch
    // {
    //   from: 'node_modules/bootstrap-switch/dist',
    //   to: 'public/vendor/bootstrap-switch/'
    // },
    // // jQuery Validate
    // {
    //   from: 'node_modules/jquery-validation/dist/',
    //   to: 'public/vendor/jquery-validation'
    // },
    // // bs-custom-file-input
    // {
    //   from: 'node_modules/bs-custom-file-input/dist/',
    //   to: 'public/vendor/bs-custom-file-input'
    // },
    // bs-stepper
    {
        from: 'node_modules/bs-stepper/dist/',
        to: 'public/vendor/bs-stepper'
    },
    // // CodeMirror
    // {
    //   from: 'node_modules/codemirror/lib/',
    //   to: 'public/vendor/codemirror'
    // },
    // {
    //   from: 'node_modules/codemirror/addon/',
    //   to: 'public/vendor/codemirror/addon'
    // },
    // {
    //   from: 'node_modules/codemirror/keymap/',
    //   to: 'public/vendor/codemirror/keymap'
    // },
    // {
    //   from: 'node_modules/codemirror/mode/',
    //   to: 'public/vendor/codemirror/mode'
    // },
    // {
    //   from: 'node_modules/codemirror/theme/',
    //   to: 'public/vendor/codemirror/theme'
    // },
    // dropzonejs
    {
        from: 'node_modules/dropzone/dist/',
        to: 'public/vendor/dropzone'
    },
    // bootstrap4c-dropzone
    {
        from: 'node_modules/bootstrap4c-dropzone/dist/',
        to: 'public/vendor/bootstrap4c-dropzone'
    },
    // // uPlot
    // {
    //   from: 'node_modules/uplot/dist/',
    //   to: 'public/vendor/uplot'
    // }
]

module.exports = Plugins
