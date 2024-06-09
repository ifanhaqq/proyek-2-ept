$(document).ready(function () {
    const audioPath = $("#audio-path").val()
    const playAudioBtn = $("#play-audio")

    playAudioBtn.hide()
    playAudioBtn.show(10000)

    const ctx = new AudioContext();

    let audio;

    fetch(audioPath)
        .then(data => data.arrayBuffer())
        .then(arrayBuffer => ctx.decodeAudioData(arrayBuffer))
        .then(decodedAudio => {
            audio = decodedAudio;
        });

    function playback() {
        return new Promise((resolve, reject) => {
            try {
                const playAudio = ctx.createBufferSource();
                playAudio.buffer = audio;
                playAudio.connect(ctx.destination);
                playAudio.start(ctx.currentTime);
                console.log(ctx.currentTime)

                resolve('Playback started successfully');
            } catch (error) {
                reject("error: " + error.message)
            }
        })
    }

    // function playback() {
    //     return new Promise((resolve, reject) => {
    //         try {
    //             // Resume the AudioContext if it is suspended
    //             if (ctx.state === 'suspended') {
    //                 console.log(ctx.state)
    //                 ctx.resume()
    //             } else {
    //                 console.log(ctx.state)
    //                 const playAudio = ctx.createBufferSource();
    //                 playAudio.buffer = audio;
    //                 playAudio.connect(ctx.destination);
    //                 playAudio.start(ctx.currentTime);

    //                 resolve('Playback started successfully');
    //                 console.log("play button deleted")
    //             }


    //         } catch (error) {
    //             reject("error: " + error.message);
    //         }
    //     });
    // }


    playAudioBtn.click(function () {
        playback().then(function () {
            playAudioBtn.hide()
        })

    })
})