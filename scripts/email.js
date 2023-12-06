document.addEventListener("DOMContentLoaded", function() {
    // Scrambled email
    var scrambledEmail = "mytodos@hotmail.com".split("").reverse().join("");
    // Set the email in the HTML
    document.getElementById("email").textContent = scrambledEmail;
});


