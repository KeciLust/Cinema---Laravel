function clientPay(chairs, name, chair, hall) {
    let span = document.querySelector('.ticket__chairs');
    let spanF = document.querySelector('.ticketF__chairs');
    let value = '';
    let chairClient = 0;
    chairs.forEach((el, i) => {
        if (el === 1) {
            if (i < chair) {
                for (let q = 0; q <= i; q++) {
                    if (!(hall[q] == null)) {
                        chairClient++;
                    }
                }
                value += `Ряд: 1 Место: ${chairClient} `;
            }
            else {

                value += `Ряд: ${(Math.floor(i / chair) + 1)} Место: ${i % chair} `;

            }

        }
    });
    span.textContent = value;
    spanF.textContent = value;
    document.querySelector('.acceptin-button').addEventListener('click', () => {
        document.querySelector('.ticket').style.display = 'none';
        document.querySelector('.ticketF').style.display = 'block';
    })
    let src = document.querySelector('.ticket__info-qr').src;
    src += `${value}`;
    document.querySelector('.ticket__info-qr').src = src;
}
