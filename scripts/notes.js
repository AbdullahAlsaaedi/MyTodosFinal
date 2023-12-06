if ( window.history.replaceState ) {
    window.history.replaceState(null, null, window.location.href );
}

const opnote = document.querySelectorAll('.opennote');

const notetitle = document.querySelector('#notetitle');
const notetext = document.querySelector('#notetext');
const date = document.querySelectorAll(".notedate");




opnote.forEach(element => {
    element.addEventListener('click', function(event) {
        // Your event handling logic here
        console.log(this.dataset.id);
        
        let name = document.querySelector(`.name-${this.dataset.id}`);
        let content = document.querySelector(`.content-${this.dataset.id}`);


        notetitle.value = name.textContent.trim();
        notetext.value = content.textContent.trim(); 

        window.scrollTo({
            top: 0,
            left: 0,
            behavior: 'smooth'
          });
          
        
    });
});



