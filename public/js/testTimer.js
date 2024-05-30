let mins
let secs

let cd = () => {
    const timeExamLimit = $('#timeExamLimit').val();
    mins = 1 * m("" + timeExamLimit); // change minutes here
    secs = 0 + s(":01");
    redo();
}

const m = (obj) => {
    let i
    for (i = 0; i < obj.length; i++) {
        if (obj.substring(i, i + 1) == ":") break
    }
    return (obj.substring(0, i))
}

const s = (obj) => {
    let i
    for (i = 0; i < obj.length; i++) {
        if (obj.substring(i, i + 1) == ":") break
    }
    return (obj.substring(i + 1, obj.length))
}

const dis = (mins, secs) => {
    let disp

    if (mins <= 9) disp = " 0";
    else disp = " ";

    disp += mins + ":";

    if (secs <= 9) disp += "0" + secs;
    else disp += secs;

    return (disp);
}

const redo = () => {
    secs--

    if (secs == -1) {
        secs = 59;
        mins--;
    }

    $('[name="disp"]').val(dis(mins, secs))

    if ((mins == 0) && (secs == 0)) {
        Swal.fire({
            title: "Unfortunately, the test is over!",
            allowOutsideClick: false,
            confirmButtonText: "Ok",
        }).then(() => {
            $('#testForm').submit()
        });
    } else {
        cd = setTimeout("redo()", 1000);
    }
}

const init = () => {
    cd()
}

$(document).ready(function () {
    init()
    
    const maxParams = $("#max_params").val
    console.log(maxParams)

    $(window).on('beforeunload', function () {
        sessionStorage.setItem('refreshFlag', 'true');
    });

    // When the page loads, check the flag
    $(window).on('load', function () {
        if (sessionStorage.getItem('refreshFlag') === 'true') {
            $("#testForm").submit()

            sessionStorage.removeItem('refreshFlag');
        }
    });

    $("#clickme").click(function () {
        console.log(1)
        console.log($("#testForm").attr("method"))
    })
})