function showParagraph(num) {
    document.getElementById('para1').style.display = 'none';
    document.getElementById('para2').style.display = 'none';
    document.getElementById('para3').style.display = 'none';

    if(num === 1) {
        document.getElementById('para1').style.display = 'block';
    } else if (num === 2) {
        document.getElementById('para2').style.display = 'block';
    } else if (num === 3) {
        document.getElementById('para3').style.display = 'block';
    }
}

function submitFeedback() {
    const feedback = document.getElementById('feedback').value;
    if(feedback) {
        alert("Thank You For Your Feedback: " + feedback)
    } else {
        alert("Please Enter Your Feedback Before Submitting !")
    }
}