initHomeHero = function () {
    console.log('Hello world');
}

if (window.acf) {
    window.acf.addAction('render_block_preview/type=homepage', initHomeHero);
} else {
    document.addEventListener('DOMContentLoaded', initHomeHero);
}