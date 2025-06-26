
function toggleDarkMode() {
    const body = document.body;
    const icon = document.getElementById('dark-icon');
    const button = document.querySelector('.btn1');

    body.classList.toggle('darkmode');
    button.classList.toggle('bdark')
    icon.classList.toggle('rotate-icon');

    if (body.classList.contains('darkmode')) {
        icon.src = '../images/light.png';
        button.style.background = "linear-gradient(135deg, #a3a3a3, #cfcfcf)";

        document.querySelectorAll('.card1, .card2,.card-2,.card-3, .recent-div, .recent-div2, .side-menu').forEach(element => {
            element.style.background = 'linear-gradient(to bottom right, #4B0082, #8A2BE2, #DA70D6)'; 
            element.style.color = 'whitesmoke';

            
        });

    }else {
        
        icon.src = '../images/dark.png'
        button.style.background = 'linear-gradient(to bottom right, #4B0082, #8A2BE2, #DA70D6)';

        document.querySelectorAll('.card1, .card2,.card-2,.card-3, .recent-div, .recent-div2, .side-menu').forEach(element => {
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