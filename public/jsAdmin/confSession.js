function resetAddFilm() {
    let name = document.querySelector('.nameAddFilm');
    let country = document.querySelector('.countryAddFilm');
    let lenght = document.querySelector('.lenghtAddFilm');
    let description = document.querySelector('.descriptionAddFilm');
    name.value = '';
    country.value = '';
    lenght.value = '';
    description.value = '';
}
function resetAddSession() {
    let time = document.querySelector('.timeSession');
    time.value = '';
}

function addSession(arr, id) {
    let f = document.querySelector(`.addSession${id}`)
    let div = f.querySelector('.filmLenghtAddSession').value;
    let input = f.querySelector('.inputAddSession');
    let time = convertTime(f.querySelector('.timeSession').value);
    input.type = 'submit';
    if (arr != []) {
        arr.forEach(el => {
            let t = el.time.time;
            let w = convertTime(t);
            if (!((time > w && time >= (w + el.lenght)) || (time < w && time + arr[div].lenght <= w))) { input.type = 'button'; }
        });
    }
}
function convertTime(t) {
    if (t) {
        let q = t.split(':');
        let w = Number(q[0]) * 60 + Number(q[1]);
        return w;
    }
}
function valid(halls) {
    halls.forEach(el => {
        if (el && el.chairs != [] && (el.price != 0 || el.vipPrice != 0) && el.films != []) {
            document.querySelector('.validButton').type = 'submit';
        }
    })

}
