function confHall(hall) {
    let main = document.querySelector('.conf-step__hall');
    let row = document.querySelector('.row');
    let chair = document.querySelector('.chair');
    let arrNew = [];
    let chairsAdd = document.querySelector('.chairsAdd');
    if (hall.row && hall.chair) {
        row.value = hall.row;
        chair.value = hall.chair;
    }
    if (hall) {
        let input = document.querySelector('.typeChangeConfHall');
        input.setAttribute('type', 'submit');
    }

    addChairs(hall);
    row.addEventListener("keyup", () => {
        dellChairs();
        addChairs(hall);
    })
    chair.addEventListener("keyup", () => {
        dellChairs();
        addChairs(hall);
    })

    function addChairs(arr) {
        dellChairs();
        let a, b;

        if (!row.value && !chair.value) { a = 0, b = 0 } else { a = row.value, b = chair.value }
        let hall = document.createElement('div');
        hall.classList.add('conf-step__hall-wrapper');
        for (let i = 0; i < a; i++) {
            let divRow = document.createElement('div');
            divRow.classList.add('conf-step__row');

            for (let q = 0; q < b; q++) {
                let divChair = document.createElement('span');
                divChair.classList.add('conf-step__chair');
                divChair.classList.add('conf-step__chair_disabled');
                divRow.insertAdjacentElement('beforeend', divChair);
            }
            hall.insertAdjacentElement('beforeend', divRow);
        }
        main.insertAdjacentElement('beforeend', hall);
        if (arr.chairs) {
            arrNew = JSON.parse(arr.chairs);
            choose(arrNew);
        }
        click();
    }
    function dellChairs() {
        let hall = document.querySelector('.conf-step__hall-wrapper');
        if (hall) { hall.remove() };
    }
    function click() {
        let stepHall = document.querySelector('.conf-step__hall')
        let chairs = Array.from(stepHall.querySelectorAll('.conf-step__chair'));

        chairs.forEach((chair, index) => chair.addEventListener('click', () => {
            if (chair.classList.contains('conf-step__chair_disabled')) {
                chair.classList.remove('conf-step__chair_disabled');
                chair.classList.add('conf-step__chair_standart');
                arrNew[index] = 1;
            }
            else if (chair.classList.contains('conf-step__chair_standart')) {
                chair.classList.remove('conf-step__chair_standart');
                chair.classList.add('conf-step__chair_vip');
                arrNew[index] = 2;
            }
            else {
                chair.classList.remove('conf-step__chair_vip');
                chair.classList.add('conf-step__chair_disabled');
                arrNew[index] = 0;
            }
            chairsAdd.value = JSON.stringify(arrNew);

        }))

    }
    function choose(arrNew) {
        let stepHall = document.querySelector('.conf-step__hall')
        let chairs = Array.from(stepHall.querySelectorAll('.conf-step__chair'));
        arrNew.forEach((arr, i) => {
            if (arr === 1) {
                chairs[i].classList.remove('conf-step__chair_disabled');
                chairs[i].classList.add('conf-step__chair_standart');
            }
            else if (arr === 2) {
                chairs[i].classList.remove('conf-step__chair_disabled');
                chairs[i].classList.add('conf-step__chair_vip');
            }
        })
    }
}

function resetConfHall() {
    let row = document.querySelector('.row');
    let chair = document.querySelector('.chair');
    row.value = '';
    chair.value = '';
    let hall = document.querySelector('.conf-step__hall-wrapper');
    if (hall) { hall.remove() };
    let halls = document.querySelectorAll('.radioConfHall');
    halls.forEach(hall => {
        if (hall.checked) { hall.checked = false }
    });
}

function formConfHall(id) {
    let form = document.querySelector('.formConfHall');
    form.action = `admin/${id}/confHall`;
}
