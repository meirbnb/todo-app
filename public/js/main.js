window.addEventListener('load', () => {
    checks = document.querySelectorAll('input[type=checkbox]');
    for (let check of checks){
        check.addEventListener('click', (e) => {
            e.target.parentNode.querySelector('button.hidden').click();
        });
    }

    let editBtns = document.querySelectorAll('.editBtn');
    for (let editBtn of editBtns){
        editBtn.addEventListener('click', (e) => {
            e.preventDefault();
            e.target.parentNode.parentNode.parentNode.querySelectorAll('td')[1].setAttribute('contenteditable', true);
        });
    }
});