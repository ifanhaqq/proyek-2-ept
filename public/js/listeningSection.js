$(document).ready(function () {
    const params = $('#params').val()
    const maxParams = $('#max_params').val()
    const showHide = (params) => {
        $('#list_question li').hide()
        $('#list_question li ol li').show()
        $('#no' + params).show()
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

        radioInput.click(() =>  {
            navButton.removeClass("btn-outline-dark")
            navButton.addClass("btn-dark btn-outline-white text-white")
        })
        
    }

})