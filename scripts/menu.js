const list = document.querySelectorAll('.list');
function activeLink(event) {
    event.preventDefault();

    list.forEach((item) =>
    item.classList.remove('active'));
    this.classList.add('active');

    const menuId = this.getAttribute('data-menu-id');
    let phpFile = '';
    switch(menuId) {
        case '1':
            phpFile = "index.php";
            break;
        case '2':
            phpFile = 'hemeroteca.php';
            break;
        case '3':
            phpFile = 'contacto.php';
            break;
        case '4':
            phpFile = 'programacion.php';
            break;
        case '5':
            phpFile = 'carnaval.php';
            break;

        default:
            phpFile = 'index.php';
            break;
    }

    setTimeout(() => {
        window.location.href = phpFile;
    }, 500);
}
list.forEach((item) => {
    item.addEventListener('click', activeLink);
});