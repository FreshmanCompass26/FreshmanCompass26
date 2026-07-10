/*==========================================
        TEACHERS | FRESHMAN COMPASS
==========================================*/

document.addEventListener("DOMContentLoaded", () => {

    const cards = document.querySelectorAll(".teacher-card");
    const buttons = document.querySelectorAll(".filter-btn");
    const search = document.getElementById("searchTeacher");

    let currentFilter = "all";

    /*==============================
            FILTRAR TARJETAS
    ==============================*/

    function filterTeachers() {

        const text = search.value.toLowerCase().trim();

        cards.forEach(card => {

            const category = card.dataset.category;
            const name = card.dataset.name;

            const matchCategory =
                currentFilter === "all" ||
                category === currentFilter;

            const matchName =
                name.includes(text);

            if (matchCategory && matchName) {

                card.style.removeProperty("display");

                setTimeout(() => {

                    card.style.opacity = "1";
                    card.style.transform = "translateY(0)";

                }, 60);

            } else {

                card.style.display = "none";

            }

        });

    }

    /*==============================
            BOTONES
    ==============================*/

    buttons.forEach(button => {

        button.addEventListener("click", () => {

            buttons.forEach(btn =>
                btn.classList.remove("active")
            );

            button.classList.add("active");

            currentFilter = button.dataset.filter;

            filterTeachers();

            window.scrollTo({

                top: 0,

                behavior: "smooth"

            });

        });

    });

    /*==============================
            BUSCADOR
    ==============================*/

    search.addEventListener("keyup", filterTeachers);

    search.addEventListener("input", filterTeachers);

    /*==============================
        HOVER TARJETAS
    ==============================*/

    cards.forEach(card => {

        card.addEventListener("mouseenter", () => {

            card.style.transition = ".35s";

        });

    });

    /*==============================
         APARECER AL HACER SCROLL
    ==============================*/

    const observer = new IntersectionObserver(entries => {

        entries.forEach(entry => {

            if (entry.isIntersecting) {

                entry.target.classList.add("show");

            }

        });

    }, {

        threshold: .12

    });

    cards.forEach(card => {

        observer.observe(card);

    });

});
/*==========================================
            MODAL TEACHER
==========================================*/

const modal = document.getElementById("teacherModal");

const modalImage = document.getElementById("modalImage");
const modalName = document.getElementById("modalName");
const modalSubject = document.getElementById("modalSubject");
const modalEmail = document.getElementById("modalEmail");
const modalSchedule = document.getElementById("modalSchedule");
const modalBirthday = document.getElementById("modalBirthday");
const modalQuote = document.getElementById("modalQuote");

const closeModal = document.querySelector(".close-modal");

document.querySelectorAll(".profile-btn").forEach(button => {

    button.addEventListener("click", () => {

        modalImage.src = button.dataset.image;

        modalName.textContent = button.dataset.name;

        modalSubject.textContent = button.dataset.subject;

        modalEmail.innerHTML =
            `<strong>Email:</strong> ${button.dataset.email}`;
            // Configurar botón de enviar correo
document.getElementById("emailButton").href =
    `mailto:${button.dataset.email}`;
        modalSchedule.innerHTML =
            `<strong>Schedule:</strong> ${button.dataset.schedule}`;

        modalBirthday.innerHTML =
            `<strong>Birthday:</strong> ${button.dataset.birthday}`;

        modalQuote.textContent =
            `"${button.dataset.quote}"`;

        modal.classList.add("show");

    });

});

/* Cerrar con la X */

closeModal.addEventListener("click", () => {

    modal.classList.remove("show");

});

/* Cerrar haciendo clic fuera */

window.addEventListener("click", (e) => {

    if(e.target === modal){

        modal.classList.remove("show");

    }

});

/* Cerrar con ESC */

document.addEventListener("keydown", (e) => {

    if(e.key === "Escape"){

        modal.classList.remove("show");

    }

});
/*==========================================
        BOTONES DEL MODAL
==========================================*/

const copyButton = document.getElementById("copyEmail");
const closeButton = document.getElementById("closeButton");
const toast = document.getElementById("toast");
const toastMessage = document.getElementById("toastMessage");
/* Copiar correo */

copyButton.addEventListener("click", async () => {

    const email = modalEmail.textContent.replace("Email:", "").trim();

    try{

        await navigator.clipboard.writeText(email);

        toastMessage.textContent = "Email copied successfully!";

        toast.classList.add("show");

        setTimeout(() => {

            toast.classList.remove("show");

        }, 2200);

    }catch(error){

        toastMessage.textContent = "Couldn't copy the email.";

        toast.classList.add("show");

        setTimeout(() => {

            toast.classList.remove("show");

        }, 2200);

    }

});

/* Cerrar */

closeButton.addEventListener("click", () => {

    modal.classList.remove("show");

});