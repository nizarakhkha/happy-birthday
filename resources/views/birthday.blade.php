<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Happy Birthday {{ $birthdayPerson }}</title>
    <link rel="stylesheet" href="{{ asset('css/birthday.css') }}">
</head>
<body>

    <!-- Page 1 -->
    <section class="landing-page" id="landingPage">
        <div class="floating floating-1">💖</div>
        <div class="floating floating-2">🦋</div>
        <div class="floating floating-3">✨</div>
        <div class="floating floating-4">💗</div>
        <div class="floating floating-5">🌸</div>

        <div class="landing-content">
            <h1 class="main-title">Happy Birthday, {{ $birthdayPerson }}! 💕</h1>
            <p class="subtitle">
                happy birthday may all your wishes come true
            </p>

            <div class="mini-icons">
                <span>💗</span>
                <span>💖</span>
                <span>💕</span>
                <span>💞</span>
                <span>💘</span>
            </div>

            <button id="openMessageBtn" class="main-btn">Click Me ✨</button>
        </div>
    </section>

    <!-- Page 2 -->
    <section class="message-page hidden" id="messagePage">
        <div class="message-card">
            <p class="message-label">A Special Message For You 💌</p>
           
            <p id="typedText" class="typed-text"></p>
            <button id="backBtn" class="secondary-btn">Back 💕</button>
        </div>
    </section>

    <script>
        window.birthdayMessage = @json($birthdayText);
    </script>
    <script src="{{ asset('js/birthday.js') }}"></script>

</body>
</html>