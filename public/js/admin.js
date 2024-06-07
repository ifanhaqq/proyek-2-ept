$(document).ready( function () {
    const section = $('#sectionSelect').val()
    const readingAmount = $('#amountOfReading').val()

    $('#sections tr').hide()
    $('.reading-text').hide()
    $('.questionInput').hide()
    $('.readingTextQuestion').hide()
    $('#addNewQuestion').hide()
    $(".test_guides").hide()

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

    const guideSelect = $("#guideSelect")
    $("#" + guideSelect.val()).show()
    guideSelect.change(function () {
        $(".test_guides").hide()
        $("#" + guideSelect.val()).show()
    })

    $('.update-question-grammar').click(function () {
        const questionId = $(this).data('id')
        $('#updating-question').show()
        $('.updating-text').hide()
        

        $.ajax({
            url: 'http://localhost:8000/api/test-question/' + questionId,
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                console.log(data.data)
                $('#updating-question-id').val(data.data.question_id)
                $('#updating-questionch1').val(data.data.question_ch1)
                $('#updating-questionch2').val(data.data.question_ch2)
                $('#updating-questionch3').val(data.data.question_ch3)
                $('#updating-questionch4').val(data.data.question_ch4)
                $('#updating-question').val(data.data.question)
                $('#updating-section-display').val('Structure & Written Expression')
                $('#updating-section').val(data.data.section)
            }
        })
    })

    $('.update-question-listening').click(function () {
        const questionId = $(this).data('id')
        $('#updating-question').hide()
        $('.updating-text').hide()
        

        $.ajax({
            url: 'http://localhost:8000/api/test-question/' + questionId,
            method: 'GET',
            dataType: 'json',
            success: function(data) {

                $('#updating-question-id').val(data.data.question_id)
                $('#updating-questionch1').val(data.data.question_ch1)
                $('#updating-questionch2').val(data.data.question_ch2)
                $('#updating-questionch3').val(data.data.question_ch3)
                $('#updating-questionch4').val(data.data.question_ch4)
                $('#updating-section-display').val('Listening')
                $('#updating-section').val(data.data.section)
            }
        })
    })

    $('.update-question-reading').click(function () {
        const questionId = $(this).data('id')
        const readingId = $(this).data('reading')
        $('#updating-question').show()
        $('.updating-text').show()
        

        $.ajax({
            url: 'http://localhost:8000/api/test-question-reading/' + questionId + '/' + readingId,
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                $('#updating-question-id').val(data.data.question_id)
                $('#updating-reading-id').val(data.data.reading_id)

                $('#updating-questionch1').val(data.data.question_ch1)
                $('#updating-questionch2').val(data.data.question_ch2)
                $('#updating-questionch3').val(data.data.question_ch3)
                $('#updating-questionch4').val(data.data.question_ch4)

                $('#updating-text').val(data.data.text)
                $('#updating-question').val(data.data.question)
                $('#updating-section-display').val('Reading')
                $('#updating-section').val(data.data.section)
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