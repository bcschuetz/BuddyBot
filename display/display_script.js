const loremIpsum = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed commodo porttitor justo, non facilisis arcu efficitur sit amet. Donec vestibulum lorem quis lacinia volutpat. Praesent quam felis, ullamcorper non tortor sed, mattis volutpat quam. Aenean id sapien eu tortor iaculis ultrices et vitae lectus. Pellentesque pulvinar dui et suscipit maximus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur aliquet posuere elit sed aliquet. Ut porttitor nisl vel lectus feugiat, iaculis efficitur velit aliquam. Duis eu mauris ut tellus iaculis sodales et et erat. Maecenas lacinia sapien leo, eget interdum sapien fermentum sed. Mauris pellentesque ipsum lorem, sed consequat nisl dignissim vitae. Cras sed rhoncus tortor. Sed a turpis non sapien fringilla cursus sit amet vitae turpis. Phasellus dignissim sem vitae mauris porta aliquam.";
const delayMilliseconds = 2000;  // change to 20 seconds later (= 20000)
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

    var userName = getInfo("lisa_hecker", "first_name");

    document.getElementById("header").innerText = userName + "'s birthday is today! (" + counter + ")";
    document.getElementById("description").innerText = "(" + counter + ")\n" + loremIpsum;
    document.getElementById("image").src = counter % 2 == 1 ? "cat.jpeg" : "tac.jpeg";
}

function prev() {
    counter--;

    document.getElementById("header").innerText = userName + "'s birthday is today! (" + counter + ")";
    document.getElementById("description").innerText = "(" + counter + ")\n" + loremIpsum;
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
