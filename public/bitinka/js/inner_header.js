$('.sidenav .dropdown-menu a, footer .dropdown-menu a, .navbar-nav .dropdown-menu a').on('click', function () {
    var selc = $(this).attr('id');
    language_change(selc);
});
