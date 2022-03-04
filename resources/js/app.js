require('./bootstrap');
import ScrollReveal from 'scrollreveal'

ScrollReveal().reveal('.post',{
    origin:'top',
    distance: '30px',
    duration:'200',
    interval:'700'
});

new VenoBox({
    selector: '.my-image-links',
    numeration: true,
    infinigall: true,
    share: true,
    spinner: 'rotating-plane'
});
