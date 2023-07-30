function resetConfPrice() {
    let price = document.querySelector('.price');
    let priceVip = document.querySelector('.priceVip');
    price.value = '';
    priceVip.value = '';
    let halls = document.querySelectorAll('.radioConfPrice');
    halls.forEach(hall => {
        if (hall.checked) { hall.checked = false }
    });
}
function formConfPrice(id) {
    let form = document.querySelector('.formConfPrice');
    form.action = `admin/${id}/confPrice`;
}
function setPrice(hall) {
    if (hall) {
        let input = document.querySelector('.typeChangeConfPrice');
        input.setAttribute('type', 'submit');
    }
    let price = document.querySelector('.price');
    let priceVip = document.querySelector('.priceVip');
    if (hall.price) { price.value = hall.price }
    if (hall.priceVip) { priceVip.value = hall.priceVip }
}
