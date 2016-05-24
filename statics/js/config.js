require.config({
    baseUrl: "js/lib",
    urlArgs: 'v=20160524',
    paths: {
        jquery: "jquery/jquery",
        "jquery.ui": "jquery-ui/jquery-ui.min",
        bootstrap: "bootstrap/js/bootstrap.min",
        //slimscroll: "slimScroll/jquery.slimscroll.min",
        //fastclick:"fastclick/fastclick.min"
    },
    shim: {
        bootstrap: ["jquery"],
    }
});