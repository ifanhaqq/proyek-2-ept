$(document).ready(function () {
    const testForm = $("#testForm")
    const submitBtn = $("#submitTest")

    submitBtn.click(function (e) { 
        e.preventDefault();
        
        Swal.fire({
            title: "You still have plenty of time!",
            text: "Are you sure you want to submit it now?",
            showCancelButton: true,
            confirmButtonText: "Yes",
            confirmButtonColor: "#bd2f2f",
            cancelButtonText: "Cancel"
        }).then((result) => {
            if (result.isConfirmed) {
                testForm.submit()
            }
        })
    });
})