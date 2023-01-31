const days = document.querySelector('#days');
const hours = document.querySelector('#hours');
const minutes = document.querySelector('#minutes');
const seconds = document.querySelector('#seconds');

const target = document.querySelector('.target-date');

// const endDate = new Date(`November 01 2022 00:00:00`);
const endDate = new Date(target.innerText);

function updateCounter() {
    const currentTime = new Date();

    let difference = endDate - currentTime;

    if(difference<0) {
        difference = 0;
    }

    //Перевод времени в необходимый вид
    const daysLeft = Math.floor(difference / 1000 / 60 / 60 / 24);
    const hoursLeft = Math.floor(difference / 1000 / 60 / 60) % 24;
    const minutesLeft = Math.floor(difference / 1000 / 60) % 60;
    const secondsLeft = Math.floor(difference / 1000) % 60;

    //Подстановка значений в HTML
    days.innerText = daysLeft;
    hours.innerText = hoursLeft < 10 ? '0' + hoursLeft : hoursLeft;
    minutes.innerText = minutesLeft < 10 ? '0' + minutesLeft : minutesLeft;
    seconds.innerText = secondsLeft < 10 ? '0' + secondsLeft : secondsLeft;

}

updateCounter();

setInterval(updateCounter, 1000);