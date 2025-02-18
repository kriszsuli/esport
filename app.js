function toggleMenu() {
    const menu = document.getElementById("navLinks");
    menu.classList.toggle("active");
}

document.getElementById("registerForm").addEventListener("submit", function(event) {
    event.preventDefault();
    let email = document.querySelector("input[name='email']");
    let name = document.querySelector("input[name='fullname']");
    let studentClass = document.querySelector("input[name='class']");
    let feedbackMessage = document.getElementById("feedbackMessage");
    let isValid = true;

    feedbackMessage.innerHTML = "";
    feedbackMessage.style.display = "none";

    if (!email.value.includes("@")) {
        email.style.border = "2px solid red";
        feedbackMessage.innerHTML += "Érvénytelen email cím!<br>";
        isValid = false;
    } else {
        email.style.border = "2px solid green";
    }
    
    if (name.value.length < 3) {
        name.style.border = "2px solid red";
        feedbackMessage.innerHTML += "A névnek legalább 3 karakter hosszúnak kell lennie!<br>";
        isValid = false;
    } else {
        name.style.border = "2px solid green";
    }
    
    if (studentClass.value !== "7" && studentClass.value !== "8") {
        studentClass.style.border = "2px solid red";
        feedbackMessage.innerHTML += "Csak 7. és 8. osztályosok jelentkezhetnek!<br>";
        isValid = false;
    } else {
        studentClass.style.border = "2px solid green";
    }
    /*
    if (studentClass.value === "XXXXXX") {
        CODE REDACTED
    }
    */
    
    if (isValid) {
        feedbackMessage.innerHTML = "Sikeres regisztráció!";
        feedbackMessage.style.color = "green";
        feedbackMessage.style.display = "block";
        setTimeout(() => {
            document.getElementById("registerForm").submit();
        }, 2000);
    } else {
        feedbackMessage.style.color = "red";
        feedbackMessage.style.display = "block";
    }
});

// csapatszamot lekeri aztan megjeleniti (nem teszteltem)
fetch('temporary/teamcount.json')
    .then(response => response.json())
    .then(data => {
        document.getElementById('teamCount').innerText = "Jelenleg " + data.count + " csapat regisztrált.";
    });
