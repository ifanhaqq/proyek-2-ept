$(document).ready(function () {

    let input = $('#searchInput')
    let table = $('#scoresTable')

    $(input).keyup(function (e) { 
        let value = $(this).val().toLowerCase()
        $('#scoresTable tbody tr').filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        })
        console.log(value)
    });
})