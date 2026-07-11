document.addEventListener("DOMContentLoaded", () => {
    const searchInput = document.getElementById("searchTeacher");
    const filterButtons = document.querySelectorAll(".filter-btn");
    const teacherCards = document.querySelectorAll(".teacher-card");

    const modal = document.getElementById("teacherModal");
    const closeModal = document.querySelector(".close-modal");
    const closeButton = document.getElementById("closeButton");
    const profileButtons = document.querySelectorAll(".profile-btn");

    const modalImage = document.getElementById("modalImage");
    const modalName = document.getElementById("modalName");
    const modalSubject = document.getElementById("modalSubject");
    const modalEmail = document.getElementById("modalEmail");
    const modalSchedule = document.getElementById("modalSchedule");
    const modalBirthday = document.getElementById("modalBirthday");
    const modalQuote = document.getElementById("modalQuote");
    const emailButton = document.getElementById("emailButton");
    const copyEmailBtn = document.getElementById("copyEmail");
    const toast = document.getElementById("toast");

    let currentEmail = "";

    // Buscador y filtros de categoría combinados
    const filterTeachers = () => {
        const searchValue = searchInput.value.toLowerCase().trim();
        const activeFilter = document.querySelector(".filter-btn.active").getAttribute("data-filter");

        teacherCards.forEach(card => {
            const name = card.getAttribute("data-name");
            const category = card.getAttribute("data-category");

            const matchesSearch = name.includes(searchValue);
            const matchesFilter = activeFilter === "all" || category === activeFilter;

            if (matchesSearch && matchesFilter) {
                card.style.display = "flex";
            } else {
                card.style.display = "none";
            }
        });
    };

    searchInput.addEventListener("input", filterTeachers);

    filterButtons.forEach(btn => {
        btn.addEventListener("click", () => {
            filterButtons.forEach(b => b.classList.remove("active"));
            btn.classList.add("active");
            filterTeachers();
        });
    });

    // Abrir Modal con datos interactivos
    profileButtons.forEach(btn => {
        btn.addEventListener("click", () => {
            currentEmail = btn.getAttribute("data-email");
            
            modalImage.src = btn.getAttribute("data-image");
            modalName.textContent = btn.getAttribute("data-name");
            modalSubject.textContent = btn.getAttribute("data-subject");
            modalEmail.innerHTML = `<i class="fa-solid fa-envelope"></i> ${currentEmail}`;
            modalSchedule.innerHTML = `<i class="fa-regular fa-calendar"></i> ${btn.getAttribute("data-schedule")}`;
            modalBirthday.innerHTML = `<i class="fa-solid fa-cake-candles"></i> ${btn.getAttribute("data-birthday")}`;
            modalQuote.textContent = btn.getAttribute("data-quote");

            // Acción dinámica para abrir Outlook/gestor nativo con el correo del maestro activo
            emailButton.setAttribute("href", `mailto:${currentEmail}`);

            modal.classList.add("show");
        });
    });

    // Cerrar Modal
    const hideModal = () => modal.classList.remove("show");
    closeModal.addEventListener("click", hideModal);
    closeButton.addEventListener("click", hideModal);
    window.addEventListener("click", (e) => { if (e.target === modal) hideModal(); });

    // Copiar Email en portapapeles
    copyEmailBtn.addEventListener("click", () => {
        if (!currentEmail) return;
        navigator.clipboard.writeText(currentEmail).then(() => {
            toast.classList.add("show");
            setTimeout(() => { toast.classList.remove("show"); }, 2500);
        }).catch(err => console.error("Error al copiar: ", err));
    });
});