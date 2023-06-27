// inputs

const timer = document.querySelector('.timer');


const hr = 0;
const min = 0;
const sec = 10;

const hours = hr * 3600000;
const minutes = hr * 60000;
const seconds = sec * 1000;
const setTime = hour + minutes + seconds;
const starTime = Date.now();
const futureTime = starTime + setTime;

const timerLoop = setInterval(countDownTimer);
countDownTimer();

function countDownTimer(){

    const currentTime = Date.now();
    const remainingTime = futureTime - currentTime;
    


// timer
const hrs = Math.floor((remainingTime / (1000 * 60 *60)) % 24);
const mins = Math.floor((remainingTime / (1000 * 60)) % 60);
const secs = Math.floor((remainingTime / 1000) % 60);

timer.innerHtml = '<div>${hrs}</div> <div class="colon">:</div> <div>${mins}</div> <div class="colon">:</div> <div>${secs}</div> <div class="colon">:</div>';



    // ending time
    if(remainingTime < 0){
        clearInterval(timerLoop);

        timer.innerHtml = '<div>00</div> <div class="colon">:</div> <div>00</div> <div class="colon">:</div> <div>00</div> <div class="colon">:</div>';
    }
}