// if the gamer is on screen 
var active = false;

//count down function 
function start_timer() {
    // function will start if active is true

    if(active) {
        var timer = document.getElementById("my_timer").innerHTML;
        var arr = timer.split(":");//splitting into array by : hour [0], min [1]
        var hour = arr[0]; // hour
        var min = arr[1]; // min
        var sec = arr[2]; // secs

        if(sec == 59){
            if(min == 59){
                hour--;
                min = 0;
                if(hour < 10) hour = "0" + hour;
            }else{
                min--;
            }
            if(min < 10) min = "0" + min;
            sec = 0;
        }else{
            sec--;
            if(sec < 10) sec = "0" + sec;
        }
        //updating our html
        document.getElementById("my_timer").innerHTML = hour + ":" + min + ":" + sec;
        setTimeout(start_timer, 1000);// keeping the speed of 1 second
    }
}

// change timer start or pause

function changeState(){
    if (active === false){
        active = true;
        start_timer();
        console.log("timer has been started");
        document.getElementById("control").innerHTML = "Pause Time";
    } else {
        active = false;
        console.log("timer has been paused");
        document.getElementById("control").innerHTML = "start time";
    }
}

// we need to rest time with a function

function reset(){
    document.getElementById("my_timer").innerHTML = "00" + ":" + "00" + ":" + "00";
    console.log("timer has been reset");

}