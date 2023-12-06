window.addEventListener('load', function() {
    document.querySelector('.feedback-form').reset();
});


function validateForm() {
    var isValid = true;
    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var feedback = document.getElementById('feedback').value;
    var referrer = document.querySelector('input[name="referrer"]:checked');
    var features = document.querySelectorAll('input[name="features[]"]:checked').length;

    // Validate name
    if (name.trim() === '') {
        alert('Name is required.');
        isValid = false;

        return false;
    }

    // Validate email
    if (email.trim() === '') {
        alert('Email ID is required.');
        isValid = false;
        return false;
    } else if (!email.includes('@')) {
        alert('Please enter a valid email address.');
        isValid = false;
        return false;

    }

    // Validate referrer (radio buttons)
    if (!referrer) {
        alert('Please select how you heard about us.');
        isValid = false;
        return false;

    }

    // Validate features (checkboxes)
    if (features === 0) {
        alert('Please select at least one feature you like.');
        isValid = false;
        return false;

    }

    // Validate additional comments
    if (feedback.trim() === '') {
        alert('Please provide additional comments.');
        isValid = false;
        return false;

    }

    return isValid;
}

// console.log(validateForm());