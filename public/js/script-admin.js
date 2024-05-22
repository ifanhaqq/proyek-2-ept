$(document).ready(function () {
    $(".delete-wave-button").click((e) => {
        e.preventDefault()
        const id = $(this).data("id")
        console.log(id)
        Swal.fire({
            title: "Do you want to save the changes?",
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: "Yes",
            denyButtonText: `No`
        }).then((result) => {
            if (result.isConfirmed) {
                
            }
        })
    })
})