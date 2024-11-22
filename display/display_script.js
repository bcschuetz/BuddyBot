let delayMilliseconds = 2000;  // change to 20 seconds later (= 20000)
let cycleThroughEvents = true;
/*let events = [
    {"type": "birthday", "title": "Person hat heute Geburtstag!", "description": "abc", "image": "cat.jpeg"}
];*/


function getInfo(username, key) {
    var dataArray = document.getElementById("php-get-info").textContent;
    //var dataArray = div.textContent;
    alert(dataArray);
}

// Manage each cycle step

let counter = 0;

function next() {
    counter++;

    //alert("hello");

    var mynewinfo = getInfo("lisa_hecker", "first_name");

    document.getElementById("header").innerText = "Header " + counter + " " + mynewinfo;
    document.getElementById("description").innerText = "Description " + counter;
    document.getElementById("image").src = counter % 2 == 1 ? "cat.jpeg" : "tac.jpeg";
}

function prev() {
    counter--;

    document.getElementById("header").innerText = "Header " + counter;
    document.getElementById("description").innerText = "Description " + counter;
    document.getElementById("image").src = counter % 2 == 1 ? "cat.jpeg" : "tac.jpeg";
}



// Manage starting and ending the cycle

let cycleInterval;

function startCycle() {
    cycleInterval = setInterval(next, delayMilliseconds);
}

function endCycle() {
    clearInterval(cycleInterval);
}

function updateCycle() {
    if (cycleThroughEvents) {
        startCycle();
    } else {
        endCycle();
    }
}



// Manage keyboard inputs

function manageKeyEvent(event) {
    if (event.key === " ") {
        cycleThroughEvents = !cycleThroughEvents;
        updateCycle();
    } else if (event.key === "ArrowLeft") {
        prev();
    } else if (event.key === "ArrowRight") {
        next();
    }
}

window.addEventListener("keydown", manageKeyEvent);



// Start the cycle

updateCycle();
