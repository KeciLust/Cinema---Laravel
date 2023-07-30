function timeRevers() {
    let p = document.querySelector('.buying__info-start');
    let t = document.querySelector('.ticket__start');
    if (p) {
        let arr = Array.from(p.textContent);
        if (arr.length === 4) {
            p.textContent = `Начало сеанса: ${arr[0]}${arr[1]}:${arr[2]}${arr[3]}`;
        }
        if (arr.length === 3) {
            p.textContent = `Начало сеанса: 0${arr[0]}:${arr[1]}${arr[2]}`;
        }
    }
    if (t) {
        let arr = Array.from(t.textContent);
        if (arr.length === 4) {
            t.textContent = `${arr[0]}${arr[1]}:${arr[2]}${arr[3]}`;
        }
        if (arr.length === 3) {
            t.textContent = `0${arr[0]}:${arr[1]}${arr[2]}`;
        }
    }
}

timeRevers();


