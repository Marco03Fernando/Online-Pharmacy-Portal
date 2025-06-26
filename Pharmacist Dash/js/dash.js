
function DarkModeButton() {
    const body = document.body;
    const icon = document.getElementById('moon');
    const button = document.querySelector('.buttn1');

    body.classList.toggle('darkmode');
    button.classList.toggle('bdark')
    icon.classList.toggle('rotate-icon');

    if (body.classList.contains('darkmode')) {
        icon.src = '../images/sun.png';
        button.style.background = "linear-gradient(135deg, #a3a3a3, #cfcfcf)";

        document.querySelectorAll('.box1, .box2,.card2,.card3, .prescrip-div, .prescrip-div2, .sidemenu','.forms-div').forEach(element => {
            element.style.background = 'linear-gradient(to bottom right, #4B0082, #8A2BE2, #DA70D6)'; 
            element.style.color = 'whitesmoke';

            
        });

    }else {
        
        icon.src = '../images/moon.png'
        button.style.background = 'linear-gradient(to bottom right, #4B0082, #8A2BE2, #DA70D6)';

        document.querySelectorAll('.box1, .box2,.card2,.card3, .prescrip-div, .prescrip-div2, .sidemenu','.forms-div').forEach(element => {
            element.style.background = 'linear-gradient(135deg, #a3a3a3, #cfcfcf)'; 
            element.style.color = 'black'; 
        });
    }
    icon.addEventListener('transitionend', () => {  
        icon.classList.remove('rotate-icon');
    }, { once: true });

}

function showDashboard(dashboardId) {
   
    const contents = document.querySelectorAll('.content');
    contents.forEach(content => {
        content.classList.remove('active');
    });

    
    const selectedDashboard = document.getElementById(dashboardId);
    selectedDashboard.classList.add('active');

    if (dashboardId === 'dashboard1') {
        document.body.style.overflow = 'hidden'; 
    } else {
        document.body.style.overflow = ''; 
    }
}