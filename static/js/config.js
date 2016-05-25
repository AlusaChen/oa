require.config({
    baseUrl: "/js/lib",
    urlArgs: 'v=201605257',
    paths: {
        jquery: "jquery/jquery",
        "jquery.ui": "jquery-ui/jquery-ui.min",
        bootstrap: "bootstrap/js/bootstrap.min",
        datatables: "datatables/jquery.dataTables.min",
        "datatables.bootstrap":"datatables/dataTables.bootstrap.min",
        select2: "select2/select2.min",

        moment:"daterangepicker/moment.min",
        daterangepicker:"daterangepicker/daterangepicker",

        //新版moment
        //moment:"moment/moment.min",

        "bootstrap-datepicker":"datepicker/bootstrap-datepicker",
        "bootstrap-colorpicker":"colorpicker/bootstrap-colorpicker.min",
        "bootstrap-timepicker":"timepicker/bootstrap-timepicker.min",
        icheck:"icheck/icheck.min",
    },
    shim: {
        bootstrap: ["jquery"],
        datatables: ["css!/js/lib/datatables/dataTables.bootstrap.css"],
        select2:["css!/js/lib/select2/select2.min.css"],
        icheck:["css!/js/lib/icheck/all.css"],
        'bootstrap-datepicker':["css!/js/lib/datepicker/datepicker3.css"],
        'bootstrap-colorpicker':["css!/js/lib/colorpicker/bootstrap-colorpicker.min.css"],
        'bootstrap-timepicker':["css!/js/lib/timepicker/bootstrap-timepicker.min.css"],
        daterangepicker:["css!/js/lib/daterangepicker/daterangepicker-bs3.css"],
    },
    map: {
        "*": {
            css: "/js/lib/require-css/css.min.js"
        }
    }
});
