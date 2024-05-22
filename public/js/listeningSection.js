$(document).ready(function () {
    const params = $('#params').val()
    const maxParams = $('#max_params').val()

    const showHide = (params) => {
        $('#list_question li').hide()
        $('#list_question li ol li').show()
        $('#no' + params).show()

        for (let index = 1; index <= maxParams; index++) {
            if (params == index) {
                $('#nav-button-' + params).addClass('btn-primary')
            } else {
                $('.radio_' + index).is(":checked") ? $('#nav-button-' + index).removeClass("btn-primary") : $('#nav-button-' + index).removeClass("btn-primary text-white")


            }

        }
    }

    const navHandler = (params) => {
        for (let index = 1; index <= maxParams; index++) {
            if (params == index) {
                $('#nav-button-' + params).addClass('btn-primary')
            } else {
                $('#nav-button-' + index).removeClass("btn-primary")
            }

        }
    }

    const checkboxHandler = () => {
        const params = $('#params').val()
        for (let index = 1; index <= maxParams; index++) {
            if ($('#checkbox-' + index).is(":checked")) {
                if (params == index) {
                    $("#nav-button-" + index).addClass("btn-primary")
                } else {
                    $("#nav-button-" + index).removeClass("btn-dark text-white btn-primary")
                    $("#nav-button-" + index).addClass("btn-warning text-black")
                    console.log("false")
                }
            } else {
                $("#nav-button-" + index).removeClass("btn-warning text-black")
                if ($('.radio_' + index).is(":checked")) {
                    $("#nav-button-" + index).addClass("btn-dark btn-outline-white text-white")
                }
            }
        }

    }

    $('#submit_button').hide()
    $('#prev').hide()
    $('#margin').hide()
    showHide(params)


    $('#next').click(function () {
        const params = $('#params').val();
        const newParams = $('#params').val(parseInt(params) + 1).val()
        $('#prev').show()
        if (newParams === maxParams) {
            showHide(newParams)
            $('#submit_button').show()
            $('#next').hide()
        }

        showHide(newParams)
    })

    $('#prev').click(function () {
        const params = $('#params').val();
        const newParams = $('#params').val(parseInt(params) - 1).val()

        if (newParams === '1') {
            showHide(newParams)
            $('#prev').hide()
        }
        $('#next').show()
        $('#submit_button').hide()
        showHide(newParams)
    })






    for (let index = 1; index <= maxParams; index++) {
        let radioInput = $('.radio_' + index)
        let navButton = $('#nav-button-' + index)
        let checkbox = $('#checkbox-' + index)


        radioInput.click(() => {
            if (checkbox.is(":checked")) {
                navButton.addClass("btn-warning text-black")
            } else {
                navButton.removeClass("btn-warning text-black")
                navButton.addClass("btn-dark btn-outline-white text-white")
            }

        })

        navButton.click(() => {
            const navButtonValue = navButton.html()
            navHandler(navButtonValue)
            checkboxHandler()


        })

        checkboxHandler()

        checkbox.change(() => {

            checkboxHandler()

        })

    }

})