document.addEventListener("DOMContentLoaded", function () {
    const openMessageBtn = document.getElementById("openMessageBtn");
    const backBtn = document.getElementById("backBtn");
    const landingPage = document.getElementById("landingPage");
    const messagePage = document.getElementById("messagePage");
    const typedText = document.getElementById("typedText");

    const message = window.birthdayMessage || "";
    let typingTimeout = null;
    let currentIndex = 0;

    function clearTyping() {
        if (typingTimeout) {
            clearTimeout(typingTimeout);
            typingTimeout = null;
        }
    }

    function typeLetterByLetter(text) {
        clearTyping();
        typedText.innerHTML = '<span class="cursor">|</span>';
        currentIndex = 0;

        function write() {
            if (currentIndex >= text.length) {
                typedText.innerHTML = text + '<span class="cursor">|</span>';
                return;
            }

            const currentText = text.substring(0, currentIndex + 1);
            typedText.innerHTML = currentText + '<span class="cursor">|</span>';

            const currentChar = text[currentIndex];
            currentIndex++;

            let speed = 45;

            if (currentChar === " ") {
                speed = 30;
            } else if (currentChar === "," || currentChar === ";") {
                speed = 180;
            } else if (currentChar === "." || currentChar === "!" || currentChar === "?") {
                speed = 280;
            }

            typingTimeout = setTimeout(write, speed);
        }

        write();
    }

    openMessageBtn.addEventListener("click", function () {
        landingPage.classList.add("hidden");
        messagePage.classList.remove("hidden");
        typeLetterByLetter(message);
    });

    backBtn.addEventListener("click", function () {
        messagePage.classList.add("hidden");
        landingPage.classList.remove("hidden");
        clearTyping();
        typedText.innerHTML = "";
    });
});