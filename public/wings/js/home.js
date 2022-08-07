(() => {
    $('form').submit(false);
    getElement(`#home_text-to-search`)
        .addEventListener('keyup', (e) => {
            e.preventDefault();
            if (e.keyCode == 13) {
               window.location.replace(`${window.location.origin}/catalogo?q=${e.target.value}`);
            }
        });
})();