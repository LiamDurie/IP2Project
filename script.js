var capture = document.forms["input"]["health"].value + '<br';
capture += document.forms["input"]["heart"].value + '<br';
capture += document.forms["input"]["blood_pressure"].value + '<br';
capture += document.forms["input"]["blood_temperature"].value + '<br';
capture += document.forms["input"]["blood_oxygen"].value + '<br';
capture += document.forms["input"]["respiration_rate"].value + '<br';
document.getElementById("health").innerHTML = capture;

var capture2 = document.forms["input"]["num_glasses"].value + '<br';
capture2 += document.forms["input"]["num_fruit"].value + '<br';
capture2 += document.forms["input"]["num_vegetables"].value + '<br';
capture2 += document.forms["input"]["breakfast"].value + '<br';
capture2 += document.forms["input"]["lunch"].value + '<br';
capture2 += document.forms["input"]["dinner"].value + '<br';
document.getElementById("nutrition").innerHTML = capture2;

var capture3 = document.forms["input"]["title"].value + '<br';
capture3 += document.forms["input"]["date"].value + '<br';
capture3 += document.forms["input"]["entry"].value + '<br';
document.getElementById("nutrition").innerHTML = capture3;

var capture4 = document.forms["input"]["title"].value + '<br';
capture4 += document.forms["input"]["num_hrs"].value + '<br';
capture4 += document.forms["input"]["num_mins"].value + '<br';
capture4 += document.forms["input"]["num_calories"].value + '<br';
document.getElementById("logExercise").innerHTML = capture4;

var capture5 = document.forms["input"]["title"].value + '<br';
capture5 += document.forms["input"]["date"].value + '<br';
capture5 += document.forms["input"]["note"].value + '<br';
document.getElementById("goals").innerHTML = capture5;

function link(){

}