let delayMilliseconds = 2000;  // change to 20 seconds later (= 20000)
let cycleThroughEvents = true;



// Manage each cycle step

let counter = 0;

function next() {
    counter++;

    document.getElementById("header").innerText = "Header " + counter;
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
