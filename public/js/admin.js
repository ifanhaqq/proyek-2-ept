$(document).ready( function () {
    const section = $('#sectionSelect').val()

    $('tbody tr').hide()
    $('tbody tr.section-' + section).show()

    $('#sectionSelect').change(function () {
        const newSection = $('#sectionSelect').val()

        $('tbody tr').hide()
        $('tbody tr.section-' + newSection).show()

        console.log(newSection)
        
    })
})