document.querySelector('form').addEventListener('submit', function(event) {
    var checkbox = document.querySelector('input[name="terms"]'); // getting the html element
    
     if (!checkbox.checked) {
         alert("You Must Agree To The Terms of Service Before Submitting!");
         event.preventDefault(); //preventing from submitting
     }
});


function toggleDarkMode() {
    const body = document.body;
    const icon = document.getElementById('dark-icon');
    const button = document.querySelector('.btn1');

    body.classList.toggle('darkmode');
    button.classList.toggle('bdark')
    icon.classList.toggle('rotate-icon');

    if (body.classList.contains('darkmode')) {
        icon.src = '../images/light.png';
        button.style.background = "linear-gradient(to bottom right, #99e699, #66cc66, #33b533)";

        document.querySelectorAll('form, .read-table').forEach(element=> {
            element.style.background = 'linear-gradient(to bottom right, #4B0082, #8A2BE2, #DA70D6)'; // Purple gradient
            element.style.color = 'whitesmoke';
        });

    }else {
        
        icon.src = '../images/dark.png'
        button.style.background = 'linear-gradient(to bottom right, #4B0082, #8A2BE2, #DA70D6)';

        document.querySelectorAll('form, .read-table').forEach(element=> {
            element.style.background = 'linear-gradient(to bottom right, #99e699, #66cc66, #33b533)'; // Default green gradient
            element.style.color = 'black'; 
        });
    }
    icon.addEventListener('transitionend', () => {  
        icon.classList.remove('rotate-icon');
    }, { once: true });

    

}
