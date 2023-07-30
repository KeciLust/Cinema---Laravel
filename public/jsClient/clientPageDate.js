function dayWeek() {

    const arrWeek = ['Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб'];
    let a = document.querySelectorAll('.page-nav__day');
    let spanW = Array.from(document.querySelectorAll('.page-nav__day-week'));
    let spanD = document.querySelectorAll('.page-nav__day-number');
    let month = document.querySelector('.page-nav');
    let date = new Date();
    let m;
    if ((date.getMonth() + 1) < 10) {
        m = '0' + (date.getMonth() + 1);
    } else { m = date.getMonth() + 1 }
    let w = date.getDay();
    let d = date.getDate();
    for (let i = 0; i < spanW.length; i++) {
        spanW[i].textContent = arrWeek[w];
        if (w === 0 || w === 6) { spanW[i].classList.add('page-nav__day_weekend') }
        w++;
        if (w === 7) { w = 0; }

        spanD[i].textContent = d;
        d++;
        month.dataset.m = m;
    }
    a.forEach(el => {
        el.addEventListener('click', (e) => {
            e.preventDefault();
            a.forEach(el => el.classList.remove('page-nav__day_chosen'));
            el.classList.add('page-nav__day_chosen');
        })
    })


}
dayWeek();

function time(hall, film, time) {
    let day = document.querySelector('.page-nav__day_chosen');
    let d = day.querySelector('.page-nav__day-number').textContent;
    let month = document.querySelector('.page-nav').dataset.m;
    let t = time.split(':').join('');
    return (document.location.href = `client/hall=${hall}&film=${film}&date=${d}${month}&time=${t}`);
}


