
const playButton = document.getElementById('play-button');
const iframe = document.querySelector('.cuadroBordeado iframe');

playButton.addEventListener('click', function() {
    // Trigger the media playback by setting the 'autoStart' query parameter to 1
    const iframeSrc = iframe.getAttribute('src');
    const newSrc = iframeSrc.replace('autoStart=0', 'autoStart=1');
    iframe.setAttribute('src', newSrc);
});