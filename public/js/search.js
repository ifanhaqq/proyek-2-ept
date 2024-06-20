$(document).ready(function () {
    // let input, filter, table, tr, td, i, txtvalues, search

    // input = $("#searchInput")
    // filter = input.val(function () {
    //     return this.value.toUpperCase()
    // })
    // table = $("#scoresTable")
    // tr = $("tr")
    // td = $("td")

    // for (let index = 0; index < tr.length; index++) {
    //     search = tr[i].td[0]
        
    // }

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