let delayMilliseconds = 2000;  // change to 20 seconds later (= 20000)

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

function cycle() {
    setInterval(next, delayMilliseconds);
    next();
}

cycle();
