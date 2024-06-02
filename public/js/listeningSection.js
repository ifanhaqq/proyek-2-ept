$(document).ready(function () {

    const params = $('#params').val()
    const maxParams = $('#max_params').val()

    const showHide = (params) => {
        $('#list_question li').hide()
        $('#list_question li ol li').show()
        $('#no' + params).show()
    }

    const currentHandler = (params, index) => {
        if (params == index) {
            $('#nav-button-' + params).removeClass('btn-warning btn-dark text-white')
            $('#nav-button-' + params).addClass('btn-primary')
        } else {
            $('.radio_' + index).is(":checked") ? $('#nav-button-' + index).removeClass("btn-primary") : $('#nav-button-' + index).removeClass("btn-primary text-white")

        }
    }

    const colorHandler = (params) => {
        for (let index = 1; index <= maxParams; index++) {

            currentHandler(params, index)

            if ($('#checkbox-' + index).is(":checked")) {
                if (params == index) {
                    currentHandler(params, index)
                } else {
                    $("#nav-button-" + index).removeClass("text-white")
                    $("#nav-button-" + index).addClass("btn-warning btn-outline-dark text-black")
                }
            }

            if ($('.radio_' + index).is(":checked")) {
                if (params == index) {
                    currentHandler(params, index)
                } else {
                    if ($('#checkbox-' + index).is(":checked")) {
                        $("#nav-button-" + index).removeClass("text-white")
                        $("#nav-button-" + index).addClass("btn-warning btn-outline-dark text-black")
                    } else {
                        $("#nav-button-" + index).removeClass("text-black")
                        $("#nav-button-" + index).addClass("btn-dark btn-outline-white text-white")
                    }
                }
            }
        }
    }

    $('#submit_button').hide()
    $('#prev').hide()
    $('#margin').hide()
    showHide(params)
    colorHandler(params)


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
        colorHandler(newParams)
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
        colorHandler(newParams)
    })

    for (let index = 1; index <= maxParams; index++) {
        let radioInput = $('.radio_' + index)
        let navButton = $('#nav-button-' + index)


        radioInput.click(() => {
            const params = $("#params").val()
            colorHandler(params)
        })

        navButton.on('mouseenter',() => {
            navButton.addClass("text-white")
            navButton.on('mouseleave', () => {
                navButton.removeClass("text-white")
            })
        })

        navButton.click(() => {
            const navButtonValue = navButton.html()
            const params = $("#params").val(navButtonValue).val()
            colorHandler(params)
        })
    }
})