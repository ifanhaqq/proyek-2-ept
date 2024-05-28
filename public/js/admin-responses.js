$(document).ready(function () {
    const deleteQuestionBtn = $(".delete-button-question")
    const deleteWaveBtn = $(".delete-wave-button")

    $(deleteQuestionBtn).click(function (event) {
        event.preventDefault()
        const id = $(this).data("id")

        Swal.fire({
            title: "Are you sure you want to delete it?",
            showCancelButton: true,
            confirmButtonText: "Yes",
            confirmButtonColor: "#bd2f2f",
            cancelButtonText: "Cancel"
        }).then((result) => {
            if (result.isConfirmed) {
                $("#delete-question-" + id).submit()
            }
        })
    })

    $(deleteWaveBtn).click(function (event) {
        event.preventDefault()
        const id = $(this).data("id")

        Swal.fire({
            title: "Are you sure you want to delete it?",
            text: "If you delete this wave you will also delete the questions inside it!",
            showCancelButton: true,
            confirmButtonText: "Yes",
            confirmButtonColor: "#bd2f2f",
            cancelButtonText: "Cancel"
        }).then((result) => {
            if (result.isConfirmed) {
                $("#delete-wave-" + id).submit()
            }
        })
    })
})