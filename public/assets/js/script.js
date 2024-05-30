document.addEventListener("DOMContentLoaded", function (event) {
    // ALERT
    const successAlert = document.getElementById("success-alert");
    const errorAlert = document.getElementById("error-alert");

    if (successAlert) {
        successAlert.classList.add("show");
        setTimeout(() => {
            successAlert.classList.remove("show");
        }, 3000);
    }

    if (errorAlert) {
        errorAlert.classList.add("show");
        setTimeout(() => {
            errorAlert.classList.remove("show");
        }, 3000);
    }

    // SELECT
    const selects = document.querySelectorAll(".select");

    selects.forEach((select) => {
        const trigger = select.querySelector(".select-trigger");
        const options = select.querySelector(".options");
        const hiddenInput = select.nextElementSibling;

        trigger.addEventListener("click", (e) => {
            selects.forEach((otherSelect) => {
                if (otherSelect !== select) {
                    otherSelect
                        .querySelector(".options")
                        .classList.remove("show");
                    otherSelect.classList.remove("open");
                }
            });

            options.classList.toggle("show");
            select.classList.toggle("open");
        });

        options.addEventListener("click", (e) => {
            if (e.target.classList.contains("option")) {
                const selectedOption = e.target;
                const value = selectedOption.getAttribute("data-value");
                trigger.textContent = selectedOption.textContent;

                hiddenInput.value = value;

                options.querySelectorAll(".option").forEach((option) => {
                    option.removeAttribute("selected");
                });
                selectedOption.setAttribute("selected", "");
                options.classList.remove("show");
                select.classList.remove("open");
            }
        });

        select.addEventListener("focus", () => {
            select.classList.add("focused");
        });

        select.addEventListener("blur", () => {
            select.classList.remove("focused");
            options.classList.remove("show");
            select.classList.remove("open");
        });
    });

    document.addEventListener("click", function (e) {
        selects.forEach((select) => {
            const options = select.querySelector(".options");
            if (!select.contains(e.target)) {
                options.classList.remove("show");
                select.classList.remove("open");
            }
        });
    });

    // MODAL
    const searchModal = document.getElementById("searchModal");
    const openSearchModal = document.getElementById("openSearchModal");

    openSearchModal.onclick = function () {
        searchModal.style.display = "block";
    };

    window.onclick = function (event) {
        if (event.target == searchModal) {
            searchModal.style.display = "none";
        }
    };

    document.querySelectorAll(".delete-button").forEach((button) => {
        button.addEventListener("click", function () {
            const questionId = this.getAttribute("data-question-id");
            const form = document.getElementById("deleteForm");
            form.action = `/questions/${questionId}`;
            document.getElementById("deleteModal").style.display = "block";
        });
    });

    document
        .getElementById("cancelDeleteButton")
        .addEventListener("click", function () {
            document.getElementById("deleteModal").style.display = "none";
        });
});
