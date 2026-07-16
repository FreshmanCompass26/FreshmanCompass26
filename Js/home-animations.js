document.addEventListener("DOMContentLoaded", () => {

    const elementos = document.querySelectorAll(".scroll-reveal");

    const observer = new IntersectionObserver((entries) => {

        entries.forEach(entry => {

            if (entry.isIntersecting) {
                entry.target.classList.add("active");
            }

        });

    }, {
        threshold: 0.1
    });

    elementos.forEach(elemento => {
        observer.observe(elemento);
    });

});