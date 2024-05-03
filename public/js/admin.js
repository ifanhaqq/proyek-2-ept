$(document).ready( function () {
    const section = $('#sectionSelect').val()
    const readingAmount = $('#amountOfReading').val()

    $('#sections tr').hide()
    $('.reading-text').hide()
    $('#sections tr.section-' + section).show()

    for (let index = 0; index < readingAmount; index++) {
        $('.reading_text_' + index).hide().first().show()
    }
    

    $('#sectionSelect').change(function () {
        const newSection = $('#sectionSelect').val()

        if (newSection == '1') {
            $('#audio').show()
            $('.reading-text').hide()
        } else if (newSection == '3') {
            $('.reading-text').show()
            $('#audio').hide()
        } else {
            $('.reading-text').hide()
            $('#audio').hide()
        }

        $('#sections tr').hide()
        $('#sections tr.section-' + newSection).show()
    })

    $('.update-question-grammar').click(function () {
        const questionId = $(this).data('id')
        $('#updating-question').show()
        

        $.ajax({
            url: 'http://localhost:8000/api/test-question/' + questionId,
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                $('#updating-questionch1').val(data.data.question_ch1)
                $('#updating-questionch2').val(data.data.question_ch2)
                $('#updating-questionch3').val(data.data.question_ch3)
                $('#updating-questionch4').val(data.data.question_ch4)
                $('#updating-question').val(data.data.question)
                $('#updating-section').val('Structure & Written Expression')
            }
        })
    })

    $('.update-question-listening').click(function () {
        const questionId = $(this).data('id')
        $('#updating-question').hide()
        

        $.ajax({
            url: 'http://localhost:8000/api/test-question/' + questionId,
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                $('#updating-questionch1').val(data.data.question_ch1)
                $('#updating-questionch2').val(data.data.question_ch2)
                $('#updating-questionch3').val(data.data.question_ch3)
                $('#updating-questionch4').val(data.data.question_ch4)
                $('#updating-section').val('Listening')
            }
        })
    })

    $('.update-question-reading').click(function () {
        const questionId = $(this).data('id')
        $('#updating-question').show()
        

        $.ajax({
            url: 'http://localhost:8000/api/test-question/' + questionId,
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                $('#updating-questionch1').val(data.data.question_ch1)
                $('#updating-questionch2').val(data.data.question_ch2)
                $('#updating-questionch3').val(data.data.question_ch3)
                $('#updating-questionch4').val(data.data.question_ch4)
                $('#updating-question').val(data.data.question)
                $('#updating-section').val('Reading')
            }
        })
    })
})