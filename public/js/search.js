$(document).ready(function () {
    let input, filter, table, tr, td, i, txtvalues, search

    input = $("#searchInput")
    filter = input.val(function () {
        return this.value.toUpperCase()
    })
    table = $("#scoresTable")
    tr = $("tr")
    td = $("td")

    for (let index = 0; index < tr.length; index++) {
        search = tr[i].td[0]
        
    }
})