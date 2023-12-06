if ( window.history.replaceState ) {
    window.history.replaceState(null, null, window.location.href );
}

const todoInEl = document.getElementById("todo-in")
const todoInBtnEl = document.querySelector(".todo-in-btn")
const todoListEl = document.querySelector(".todos-list")
const todoForm = document.querySelector(".todo-form")


const personal = document.querySelector(".personal")
const work = document.querySelector(".work")
const college = document.querySelector(".college")
const today = document.querySelector(".today")
const upcoming = document.querySelector(".upcoming")
const due = document.querySelector(".due")



const personalBtn = document.querySelector(".personal-btn")
const workBtn = document.querySelector(".work-btn")
const collegeBtn = document.querySelector(".college-btn")
const todayBtn = document.querySelector(".today-btn")

const upcomingBtn = document.querySelector(".upcoming-btn")
const dueBtn = document.querySelector(".due-btn")






personal.classList.add("hidden");
work.classList.add("hidden");
college.classList.add("hidden");


function hideSections(sec1, sec2, sec3, sec4, sec5) {
    sec1.classList.add("hidden");
    sec2.classList.add("hidden");
    sec3.classList.add("hidden"); 
    sec4.classList.add("hidden"); 
    sec5.classList.add("hidden"); 

}


personalBtn.addEventListener("click", () => {
    personal.classList.remove("hidden");
    hideSections(work, today, college, upcoming, due)
})


workBtn.addEventListener("click", () => {
    work.classList.remove("hidden");
    hideSections(personal, today, college, upcoming, due)

})


collegeBtn.addEventListener("click", () => {
    college.classList.remove("hidden");
    hideSections(personal, work, today, upcoming, due)

})


todayBtn.addEventListener("click", () => {
    today.classList.remove("hidden");
    personal.classList.add("hidden");
    work.classList.add("hidden");
    college.classList.add("hidden");
    upcoming.classList.add("hidden");
    due.classList.add("hidden");


})

upcomingBtn.addEventListener("click", () => {
    console.log("Hey");
    upcoming.classList.remove("hidden");
    hideSections(personal, work, college, today, due)

})

dueBtn.addEventListener("click", () => {
    console.log("Hey");
    due.classList.remove("hidden");
    hideSections(personal, work, college, today, upcoming)

})









// todoForm.addEventListener("submit", (e) => {

//     console.log("Hey");
//     e.preventDefault(); 
//     let todoContent = todoInEl.value; 
//     console.log(todoContent);



//     // // Perform an Ajax request to send data to the server
//     // fetch('../myphp.php', {
//     //     method: 'POST',
//     //     headers: {
//     //         'Content-Type': 'application/x-www-form-urlencoded',
//     //     },
//     //     body: 'value=' + encodeURIComponent(todoContent)
//     // })
//     // .then(response => response.text())
//     // .then(data => alert(data));

    
//     let todoContainer = document.createElement("div");
//     todoContainer.classList.add("todo");

//     todoContainer.innerHTML = `
//         <input type="checkbox" name="todo-check" id="todo-check">
//         <span class="todo-title">${todoContent}</span>
//         <button class="todo-details"> > </button>
//     `

//     todoListEl.appendChild(todoContainer);

// })

function applyTheme() {
    const theme = localStorage.getItem('theme');
    if (theme === 'white') {
        switchToWhiteTheme();
    } else {
        switchToDarkTheme();
    }
}

document.addEventListener('DOMContentLoaded', applyTheme);