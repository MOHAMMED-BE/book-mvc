document.addEventListener("DOMContentLoaded", function () {
    const titleField = document.getElementById("title");
    const authorField = document.getElementById("author");

    titleField.addEventListener("keyup", function (event) {
        let issValid = true;

        const titleInput = document.getElementById("title");
        const titleText = document.getElementById("titleHelp");
        if (titleInput.value.trim().length < 2) {
            titleText.textContent = "title must be at least 3 characters long.";
            titleText.classList.add("text-danger");
            issValid = false;
        } else {
            titleText.textContent = "title looks good.";
            titleText.classList.remove("text-danger");
            titleText.classList.add("text-success");
        }
        if (!issValid) {
            event.preventDefault();
        }
    });

    authorField.addEventListener("keyup", function (event) {
        let issValid = true;

        const authorInput = document.getElementById("author");
        const authorText = document.getElementById("authorHelp");
        if (authorInput.value.trim().length < 2) {
            authorText.textContent = "author must be at least 3 characters long.";
            authorText.classList.add("text-danger");
            issValid = false;
        } else {
            authorText.textContent = "author looks good.";
            authorText.classList.remove("text-danger");
            authorText.classList.add("text-success");
        }
        if (!issValid) {
            event.preventDefault();
        }
    });

});
