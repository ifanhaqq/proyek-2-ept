$(document).ready(function () {
    const params = $('#params').val()
    const maxParams = $('#max_params').val()
    const showHide = (params) => {
        $('#list_question li').hide()
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
        console.log(maxParams)
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

})