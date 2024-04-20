$(document).ready(function () {
    const buttons = $('#button-wrapper .btn')
    const params = $('#params').val()
    const count = $('#max_params').val()

    for (let i = 1; i <= count; i++) {
        $('#nav-button-' + i).click(function () {
            const newParams = $('#params').val(i)
            const params = $('#params').val()

            $('#prev').show()
            $('#submit_button').hide()
            $('#next').show()

            if (params == 1) {
                $('#next').show()
                $('#submit_button').hide()
                $('#prev').hide()
            } else if (params == count) {
                $('#submit_button').show()
                $('#prev').show()
                $('#next').hide()
            }


            
            $('#list_question li').hide()
            $('#list_question li ol li').show()
            $('#no' + i).show()
        })

    }


})