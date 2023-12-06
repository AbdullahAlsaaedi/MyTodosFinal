function switchToWhiteTheme() {
    // Get the root element
    var root = document.documentElement;

    // Define new colors for the white theme
    root.style.setProperty('--dark', '#f0f0f0'); // Light grey instead of dark
    root.style.setProperty('--lightblack', '#d6d6d6'); // Softer grey
    root.style.setProperty('--todo', '#ffffff'); // White for the main background
    root.style.setProperty('--pink', '#ff8fb1'); // Lighter pink
    root.style.setProperty('--white', '#000000'); // Black for text (contrast)
    root.style.setProperty('--todosides', '#eaeaea'); // Very light grey for sides
    root.style.setProperty('--form', '#cccccc'); // Lighter form background

    root.style.setProperty('--form-white', '#FFFFFF'); // Dark grey for form backgrounds
    root.style.setProperty('--black', '#0a0a0a'); // Dark grey for form backgrounds

    localStorage.setItem('theme', 'white'); // Save theme preference

    
}


function switchToDarkTheme() {
    var root = document.documentElement;

    // Resetting the CSS variables to the original dark theme values
    root.style.setProperty('--dark', '#161819'); // Dark background
    root.style.setProperty('--lightblack', '#232628'); // Slightly lighter black
    root.style.setProperty('--todo', '#1E2021'); // Dark grey for todo items
    root.style.setProperty('--pink', '#D53B85'); // Bright pink for accents
    root.style.setProperty('--white', '#FFFFFF'); // White for text and contrast
    root.style.setProperty('--todosides', '#2A2D2F'); // Dark grey for sidebar or borders
    root.style.setProperty('--form', '#363B3E'); // Dark grey for form backgrounds

    root.style.setProperty('--form-white', '#b5a6a6;'); // Dark grey for form backgrounds
    root.style.setProperty('--black', '#0a0a0a'); // Dark grey for form backgrounds



    localStorage.setItem('theme', 'dark'); // Save theme preference
}


function applySavedTheme() {
    var savedTheme = localStorage.getItem('theme');
    if (savedTheme === 'white') {
        switchToWhiteTheme();
    } else {
        switchToDarkTheme();
    }
}

document.addEventListener('DOMContentLoaded', applySavedTheme);


// Call this function to apply the white theme


document.querySelector(".save-button").addEventListener("click", () => {
    const theme = document.querySelector("#theme").value
    
    theme === 'dark' ? switchToDarkTheme() : switchToWhiteTheme();
    
})

