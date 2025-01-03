function animateCounter(element) {
    const target = +element.getAttribute("data-target");
    const speed = 200;
    const increment = target / speed;
    let count = 0;

    const updateCounter = () => {
        count += increment;
        if (count < target) {
            element.innerText = Math.ceil(count);
            requestAnimationFrame(updateCounter);
        } else {
            element.innerText = target;
        }
    };
    updateCounter();
}

const counterSection = document.getElementById("counter-section");
const observer = new IntersectionObserver((entries, observer) => {
    const [entry] = entries;

    if (entry.isIntersecting) {
        const counters = document.querySelectorAll(".count");
        counters.forEach(counter => animateCounter(counter));
        observer.unobserve(counterSection);
    }
}, {
    root: null,
    threshold: 0.2
});

observer.observe(counterSection);