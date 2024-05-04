$(document).ready( function () {
    const section = $('#sectionSelect').val()
    const readingAmount = $('#amountOfReading').val()

    $('#sections tr').hide()
    $('.reading-text').hide()
    $('.questionInput').hide()
    $('.readingTextQuestion').hide()
    $('#addNewQuestion').hide()

    $('#sections tr.section-' + section).show()
    $('#questionInput').removeAttr('required')
    $('#readingTextQuestion').removeAttr('required')

    for (let index = 0; index < readingAmount; index++) {
        $('.reading_text_' + index).hide().first().show()
    }
    
    $('#addQuestionSection').change(function () {
        const newSection = $('#addQuestionSection').val()
        $('.clonedElems').remove();

        if (newSection == 'listening') {
            $('.readingTextQuestion').hide()
            $('.questionInput').hide()
            $('#addNewQuestion').hide()
            $('#questionInput').removeAttr('required')
            $('#readingTextQuestion').removeAttr('required')
        } else if (newSection == 'reading') {
            $('.readingTextQuestion').show()
            $('#addNewQuestion').show()
            $('.questionInput').show()
            $('#questionInput').prop('required', true)
            $('#readingTextQuestion').prop('required', true)
        } else {
            $('.readingTextQuestion').hide()
            $('#addNewQuestion').hide()
            $('.questionInput').show()
            $('#questionInput').prop('required', true)
            $('#readingTextQuestion').removeAttr('required')
        }
    })

    $('#sectionSelect').change(function () {
        const newSection = $('#sectionSelect').val()

        if (newSection == '1') {
            $('#audioPlayer').show()
            $('.reading-text').hide()
        } else if (newSection == '3') {
            $('.reading-text').show()
            $('#audioPlayer').hide()
        } else {
            $('.reading-text').hide()
            $('#audioPlayer').hide()
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

    $('#addNewQuestion').click(function (e) { 
        const questionElems = $('.questionElems')
        const questionElemParam  = $('#questionElemParam').val()
        const newParam = $('#questionElemParam').val(parseInt(questionElemParam) + 1)

        let questionClones = questionElems.clone().attr('class', 'clonedElems')

        questionClones.find('input').each(function () {
            const originalName = $(this).attr('name')
            const newName = originalName + '_' + newParam.val()
            $(this).attr('name', newName)
        })

        questionClones.find('textarea').each(function () {
            const originalName = $(this).attr('name')
            const newName = originalName + '_' + newParam.val()
            $(this).attr('name', newName)
        })

        questionClones.find('select').each(function () {
            const originalName = $(this).attr('name')
            const newName = originalName + '_' + newParam.val()
            $(this).attr('name', newName)
        })

        $('#questionsContainer').append(questionClones)
        
    });
})