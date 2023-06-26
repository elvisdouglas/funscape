function TimerFunction(temp) {
	
    var now = new Date().getTime(); // Getting todays date and time in milliseconds
    var coockieVal = getCookie("countDownDate"); //Retrieving Previous Timer record(in milliseconds) from Cookie
    var countDownDate = temp + now; // in milliseconds
    
    if(countDownDate == null || countDownDate == now) { //If no user input given, just a normal page refresh
        countDownDate = coockieVal;
        console.log("Your are in "); //testing
    }
    
    console.log("Cookie " +coockieVal); //testing
    console.log("Other " +countDownDate); //testing
    
    
    setCookie("countDownDate", countDownDate); //Set Cookie Value
    
    //Reset Purpose
    if(temp == -97) { //-97 is just a random selection
        delete_cookie("countDownDate"); //Deleting Cookie Value
        location.href = 'index.php'; //Refresh the page
    }
    
    
    // Updating the timer by every 1 second
    var x = setInterval(function() {
        
        now = new Date().getTime(); // Getting todays date and time again for displaying the time change
        var distance = countDownDate - now; //millis difference between todays date-time and selected timer date-time
            
        //Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            
            
        //For Extra 0 if number is less than 10 e.g 01, 02, 03 ...	
        if(days < 10) {
            document.getElementById("timer_days").innerHTML = "0" +days;
        } else {
            document.getElementById("timer_days").innerHTML = days;
        }
        
        if(hours < 10) {
            document.getElementById("timer_hours").innerHTML = "0" +hours;
        } else {
            document.getElementById("timer_hours").innerHTML = hours;
        }
        
        if(minutes < 10) {
            document.getElementById("timer_minutes").innerHTML = "0" +minutes;
        } else {
            document.getElementById("timer_minutes").innerHTML = minutes;
        }
        
        if(seconds < 10) {
            document.getElementById("timer_seconds").innerHTML = "0" +seconds;
        } else {
            document.getElementById("timer_seconds").innerHTML = seconds;
        }
        
        
        //Printing text once the timer is over
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("timer_days").innerHTML = "EXPIRED";
            document.getElementById("timer_hours").innerHTML = "EXPIRED";
            document.getElementById("timer_minutes").innerHTML = "EXPIRED";
            document.getElementById("timer_seconds").innerHTML = "EXPIRED";
        }
    }, 1000);x
}