// Get the slider element
var slider = document.getElementById('slider');

// Add event listener to the slider input
slider.addEventListener('input', function(event) {
    // Set the font size of the body to the value of the slider
    document.body.style.fontSize = event.target.value + 'px';
});

        // sidebar menu
        function toggleSidebar() {
            document.querySelector('.sidebar').classList.toggle('open');
        }

    // Text Typing Animation
    const headline = document.querySelector("h1");
    const text = "Welcome To Classmates!";
    let index = 0;

    function typeEffect() {
        if (index < text.length) {
            headline.textContent += text.charAt(index);
            index++;
            setTimeout(typeEffect, 100);
        }
    }
    typeEffect();

    // Social Media Icons Animation
    const socialIcons = document.querySelectorAll("#footer-div img");
    socialIcons.forEach(icon => {
        icon.addEventListener("mouseenter", function() {
            icon.style.transform = "scale(1.1)";
        });
        icon.addEventListener("mouseleave", function() {
            icon.style.transform = "scale(1)";
        });
    });

