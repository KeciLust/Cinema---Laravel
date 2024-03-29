function addChairs(row, chair, arr, price, priceVip) {
    let main = document.querySelector('.buying-scheme__wrapper');
    let chairs = [...arr];
    let chairsAdd = document.querySelector('.clientAddChairs');
    let priceNew = document.querySelector('.price');
    let priceF = 0;
    let chairPay = [];
    let chairF = document.querySelector('.chairPay');
    for (let i = 0; i < row; i++) {
        let div = document.createElement('div');
        div.classList.add('buying-scheme__row');
        for (let y = 0; y < chair; y++) {
            let span = document.createElement('span');
            span.classList.add('buying-scheme__chair');
            span.classList.add('buying-scheme__chair_disabled');
            div.insertAdjacentElement('beforeend', span);
        }
        main.insertAdjacentElement('beforeend', div);
    }
    let spans = Array.from(main.querySelectorAll('.buying-scheme__chair'));
    for (let i = 0; i < (row * chair); i++) {
        if (chairs[i] === 1) {
            spans[i].classList.remove('buying-scheme__chair_disabled');
            spans[i].classList.add('buying-scheme__chair_standart');
        }
        if (chairs[i] === 2) {
            spans[i].classList.remove('buying-scheme__chair_disabled');
            spans[i].classList.add('buying-scheme__chair_vip');
        }
        if (chairs[i] === 3 || chairs[i] === 4) {
            spans[i].classList.remove('buying-scheme__chair_disabled');
            spans[i].classList.add('buying-scheme__chair_taken');
        }

    }
    spans.forEach((el, i) => {
        el.addEventListener('click', () => {

            if (!el.classList.contains('buying-scheme__chair_disabled')) {
                if (el.classList.contains('buying-scheme__chair_standart')) {
                    chairs[i] = 3;
                    chairPay[i] = 1;
                    el.classList.remove('buying-scheme__chair_standart');
                    el.classList.add('buying-scheme__chair_selected');
                    priceF = priceF + price;
                }
                else if (el.classList.contains('buying-scheme__chair_vip')) {
                    chairs[i] = 4;
                    chairPay[i] = 1;
                    el.classList.remove('buying-scheme__chair_vip');
                    el.classList.add('buying-scheme__chair_selected');
                    priceF = priceF + priceVip;
                }
                else if (el.classList.contains('buying-scheme__chair_selected')) {
                    chairs[i] = arr[i];
                    chairPay[i] = null;
                    if (arr[i] === 1) {
                        el.classList.remove('buying-scheme__chair_selected');
                        el.classList.add('buying-scheme__chair_standart');
                        priceF = priceF - price;
                    }
                    if (arr[i] === 2) {
                        el.classList.remove('buying-scheme__chair_selected');
                        el.classList.add('buying-scheme__chair_vip');
                        priceF = priceF - priceVip;
                    }
                }

            }
            priceNew.value = priceF;
            chairsAdd.value = JSON.stringify(chairs);

            if (chairPay.includes(1)) {
                document.querySelector('.acceptin-button').type = 'submit';
            } else { document.querySelector('.acceptin-button').type = 'button'; }


            chairF.value = JSON.stringify(chairPay);

        });


    });
}

