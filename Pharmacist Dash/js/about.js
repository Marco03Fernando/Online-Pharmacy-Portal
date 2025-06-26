function ReadMore() {
    const additionalParagraph = document.getElementById('paragraph1');
    
    // Check the current display state and toggle it
    if (additionalParagraph.style.display === 'none' || additionalParagraph.style.display === '') {
        additionalParagraph.style.display = 'block'; // Show additional paragraph
    } else {
        additionalParagraph.style.display = 'none'; // Hide additional paragraph
    }
}
