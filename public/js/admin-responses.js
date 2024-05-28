$(document).ready(function () {
    const deleteBtn = $(".delete-button")

    $(deleteBtn).click(function (event) {
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
})