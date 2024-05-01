$(document).ready( function () {
    const section = $('#sectionSelect').val()

    $('#sections tr').hide()
    $('#sections tr.section-' + section).show()

    $('#sectionSelect').change(function () {
        const newSection = $('#sectionSelect').val()

        $('#sections tr').hide()
        $('#sections tr.section-' + newSection).show()
    })

    $('.update-question').click(function () {
        const questionId = $(this).data('id')

        $.ajax({
            url: 'http://localhost:8000/api/test-question/' + questionId,
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                $('#updating-questionch1').val(data.data.question_ch1)
                $('#updating-questionch2').val(data.data.question_ch2)
                $('#updating-questionch3').val(data.data.question_ch3)
                $('#updating-questionch4').val(data.data.question_ch4)

            }
        })
    }) 
})