$(document).ready(function () {

    $(window).on('beforeunload', function () {
        sessionStorage.setItem('refreshFlag', 'true');
    });

    // When the page loads, check the flag
    $(window).on('load', function () {
        if (sessionStorage.getItem('refreshFlag') === 'true') {
            $("#testForm").submit()

            sessionStorage.removeItem('refreshFlag');
        }
    });
})