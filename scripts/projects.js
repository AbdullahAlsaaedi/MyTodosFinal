

const addBtn = document.querySelector('.create-project-add'); 
const form = document.querySelector('.new-project-form');


addBtn.addEventListener("click", () => {
    addBtn.classList.add('hidden')
    form.classList.remove('hidden')
})
