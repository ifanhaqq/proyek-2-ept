
$(document).ready(function () {
    const audioPath = $("#audio-path").val()
    const playAudioBtn = $("#play-audio")
    const audioPlayingBtn = $("#audio-playing")

    playAudioBtn.hide()
    audioPlayingBtn.hide()

    const ctx = new AudioContext();

    let audio;

    fetch(audioPath)
        .then(data => data.arrayBuffer())
        .then(arrayBuffer => ctx.decodeAudioData(arrayBuffer))
        .then(decodedAudio => {
            audio = decodedAudio;
            playAudioBtn.show()
        });

    function playback() {
        return new Promise((resolve, reject) => {
            try {
                if (audio) {
                    const playAudio = ctx.createBufferSource();
                    playAudio.buffer = audio;
                    playAudio.connect(ctx.destination);
                    playAudio.start(ctx.currentTime);
                    // console.log(ctx.currentTime)
                    // console.log(ctx.destination)
                    console.log("audio data successfully loaded")

                    resolve('Playback started successfully');
                } else {
                    console.log('audio data still not loaded')
                }
 
            } catch (error) {
                reject("error: " + error.message)
            }
        })
    }

    playAudioBtn.click(function () {
        playback().then(function () {
            playAudioBtn.hide()
            audioPlayingBtn.show()
        })

    })
})