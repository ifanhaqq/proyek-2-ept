// $(document).ready(function () {
//     let minutes
//     let seconds

//     console.log($('#timeExamLimit').val())

//     const cd = () => {
//         const timeExamLimit = $('#timeExamLimit').val();

//         mins = 1 * m("1")
//         secs = 0 + s(":01")

//         redo()
//     }

//     const m = (obj) => {
//         for (let i = 0; i < obj.length; i++) {
//             if (obj.substring(i, i + 1) == ":") break
//         }
//         return (obj.substring(i + 1, obj.length))
//     }

//     const s = (obj) => {
//         for (let i = 0; i < obj.length; i++) {
//             if (obj.substring(i, i + 1) == ":") 
//             break
//         }
//         return (obj.substring(i + 1, obj.length))
//     }

//     const dis = (mins, secs) => {
//         let disp
//         if (mins <= 9) {
//             disp = " 0"
//         } else {
//             disp = " "
//         }
//         disp += mins + ":"
//         if (secs <= 9) {
//             disp += "0" + secs
//         } else {
//             disp += secs
//         }
//         return (disp)
//     }

//     const redo = () => {
//         secs--

//         if (secs == -1) {
//             // edit waktu biar cepet
//             secs = 60
//             mins--
//         }

//         $('[name="disp"]').val(dis(mins, secs))

//         if ((mins == 0) && (secs == 0)) {
//             $('#timeLimit').val('stop')
//             $('#test_form').submit()
//         } else {
//             cd = setTimeout("redo()", 1000);
//         }
//     }

//     const init = () => {
//         cd()
//     }

//     init()


// })

let mins
let secs

// function cd() {
//     const timeExamLimit = $('#timeExamLimit').val();
//     mins = 1 * m("" + timeExamLimit); // change minutes here
//     secs = 0 + s(":01");
//     redo();
// }

let cd = () => {
    const timeExamLimit = $('#timeExamLimit').val();
    mins = 1 * m("" + timeExamLimit); // change minutes here
    secs = 0 + s(":01");
    redo();
}

// function m(obj) {
//     for (var i = 0; i < obj.length; i++) {
//         if (obj.substring(i, i + 1) == ":")
//             break;
//     }
//     return (obj.substring(0, i));
// }

const m = (obj) => {
    let i
    for (i = 0; i < obj.length; i++) {
        if (obj.substring(i, i + 1) == ":") break
    }
    return (obj.substring(0, i))
}

// function s(obj) {
//     for (var i = 0; i < obj.length; i++) {
//         if (obj.substring(i, i + 1) == ":")
//             break;
//     }
//     return (obj.substring(i + 1, obj.length));
// }

const s = (obj) => {
    let i
    for (i = 0; i < obj.length; i++) {
        if (obj.substring(i, i + 1) == ":") break
    }
    return (obj.substring(i + 1, obj.length))
}

// function dis(mins, secs) {
//     var disp;
//     if (mins <= 9) {
//         disp = " 0";
//     } else {
//         disp = " ";
//     }
//     disp += mins + ":";
//     if (secs <= 9) {
//         disp += "0" + secs;
//     } else {
//         disp += secs;
//     }
//     return (disp);
// }

const dis = (mins, secs) => {
    let disp

    if (mins <= 9) disp = " 0";
    else disp = " ";

    disp += mins + ":";

    if (secs <= 9) disp += "0" + secs;
    else disp += secs;

    return (disp);
}

// function redo() {
//     secs--;
//     if (secs == -1) {
//         secs = 5;
//         mins--;
//     }
//     document.cd.disp.value = dis(mins, secs);
//     if ((mins == 0) && (secs == 0)) {
//         $('#examAction').val("autoSubmit");
//         $('#submitAnswerFrm').submit();
//     } else {
//         cd = setTimeout("redo()", 1000);
//     }
// }

const redo = () => {
    secs--

    if (secs == -1) {
        secs = 5;
        mins--;
    }

    $('[name="disp"]').val(dis(mins, secs))

    if ((mins == 0) && (secs == 0)) {
        console.log("Time's up!")
    } else {
        cd = setTimeout("redo()", 1000);
    }
}

// function init() {
//     cd();
// }

const init = () => {
    cd()
}

// window.onload = init

$(document).ready(function () {
    init()
})