<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Charbel and Rita's Wedding</title>

    <meta name="description" content="You're invited to celebrate the love between Charbel and Rita">

    <meta property="og:title" content="Charbel and Rita's Wedding">
    <meta property="og:description" content="You're invited to celebrate the love between Charbel and Rita">
    <meta property="og:image" content="{{ secure_asset('images/main-compressed.jpg') }}">
    <meta property="og:url" content="https://invimagic-25a76eef47e3.herokuapp.com/charbel-and-rita">

    <link rel="icon" href="{{ asset('rounded-invimagic.png') }}" type="image/png">

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Upright&family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css" />
    <script src="https://cdn.plyr.io/3.7.8/plyr.js"></script>
    <style>
        body {
            font-family: 'Lato', sans-serif;
        }
        input {
            text-align: center;
        }
        .curved-bottom {
            clip-path: ellipse(80% 100% at center top);
        }
        .wedding-shape {
            clip-path: polygon(0% 0%, 100% 0%, 100% 80%, 75% 90%, 50% 100%, 25% 90%, 0% 80%);
        }
        @font-face {
            font-family: 'Le Jour Script';
            src: url("{{ secure_asset('fonts/Le Jour Script.otf') }}") format('truetype');
            font-weight: normal;
            font-style: normal;
        }
        .script {
            font-family: 'Le Jour Script', cursive;
        }
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('{{ asset('images/main.jpg') }}') center/cover no-repeat;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            font-size: 20px;
            cursor: pointer;
            transition: opacity 0.5s ease, visibility 0.5s;
        }
        .tap-box {
            padding: 7px 40px;
            font-size: 20px;
            color: white;
            border: 1px solid white;
            box-shadow: 0 2px 5px rgba(255, 255, 255, 0.3);
            text-align: center;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(5px);
            cursor: pointer;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            animation: glow 1.5s infinite alternate ease-in-out;
        }

        .tap-box:hover {
            transform: scale(1.05);
            box-shadow: 0 3px 6px rgba(255, 255, 255, 0.5);
        }
        .hidden {
            opacity: 0;
            visibility: hidden;
        }

        /* Glow Animation */
        @keyframes glow {
            0% {
                box-shadow: 0 2px 5px rgba(255, 255, 255, 0.3);
            }
            100% {
                box-shadow: 0 4px 10px rgba(255, 255, 255, 0.6);
            }
        }

        .heart {
            position: fixed; /* Use fixed instead of absolute */
            top: -10px; /* Start above the viewport */
            color: red;
            font-size: 20px;
            opacity: 0.8;
            animation: fall linear infinite;
            will-change: transform, opacity;
            pointer-events: none; /* Prevents clicking on hearts */
        }

        @keyframes fall {
            0% {
                transform: translateY(-100px) rotate(0deg);
                opacity: 1;
            }
            100% {
                transform: translateY(100vh) rotate(360deg);
                opacity: 0;
            }
        }
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            countdown();
        });

        // Countdown Timer Logic
        function countdown() {
            const weddingDate = new Date("May 31, 2025 18:30:00").getTime();

            function updateCountdown() {
                const now = new Date().getTime();
                const distance = weddingDate - now;

                if (distance < 0) {
                    clearInterval(interval);
                    document.getElementById("countdown").innerHTML = "It's our wedding day!";
                } else {
                    const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                    const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                    document.getElementById("days").innerText = days.toString().padStart(2, '0');
                    document.getElementById("hours").innerText = hours.toString().padStart(2, '0');
                    document.getElementById("minutes").innerText = minutes.toString().padStart(2, '0');
                    document.getElementById("seconds").innerText = seconds.toString().padStart(2, '0');
                }
            }

            // Call updateCountdown immediately to prevent the 4-second delay
            updateCountdown();

            // Then start the interval to update every second
            const interval = setInterval(updateCountdown, 1000);
        }
    </script>
</head>
<body class="text-gray-800">

<div class="overlay" id="startOverlay">
    <div class="tap-box">Tap to start</div>
</div>

<div class="content hidden" id="content">
<!-- Main Section with Background Image -->
    <section class="relative bg-cover bg-center wedding-shape" style="background-image: url('{{ asset('images/main.jpg') }}'); height: 100vh;">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="absolute inset-0 flex items-center justify-center text-center text-white">
            <div>
                <h1 class="text-4xl script font-bold">Charbel & Rita</h1>
                <p class="text-lg mt-2">Are Getting Married!</p>
                <p class="text-xl mt-2 font-semibold">Saturday, May 31th, 2025</p> <!-- Date added here -->
                <div style="text-align: center; padding: 30px;">
                    <div id="countdown" class="text-3xl mt-10" style="display: flex; justify-content: center;">
                        <div style="margin: 0 10px;">
                            <span id="days" class="font-semibold">00</span>
                            <div style="font-size: 0.34em;">DAYS</div>
                        </div>
                        <div>
                            <span class="font-semibold">:</span>
                        </div>
                        <div style="margin: 0 10px;">
                            <span id="hours" class="font-semibold">00</span>
                            <div style="font-size: 0.34em;">HOURS</div>
                        </div>
                        <div>
                            <span class="font-semibold">:</span>
                        </div>
                        <div style="margin: 0 10px;">
                            <span id="minutes" class="font-semibold">00</span>
                            <div style="font-size: 0.34em;">MINUTES</div>
                        </div>
                        <div>
                            <span class="font-semibold">:</span>
                        </div>
                        <div style="margin: 0 10px;">
                            <span id="seconds" class="font-semibold">00</span>
                            <div style="font-size: 0.34em;">SECONDS</div>
                        </div>
                    </div>
                </div>
                <div class="mt-8">
                    <a href="#rsvp" class="bg-pink-500 text-white px-6 py-3 rounded-lg text-lg font-medium shadow-md hover:bg-pink-600">RSVP Now</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Bible Section -->
    <section id="bible-verse" class="p-8 bg-white mt-10">
        <div class="max-w-4xl mx-auto text-center md:p-10" style="font-family: 'Cormorant Upright', serif;">
            <p class="text-xl text-gray-600 mb-4 md:mb-6">"And over all these virtues put on love, which binds them all together in perfect unity."</p>
            <p class="text-xl text-gray-600">Colossians 3:14</p>
        </div>
    </section>

    <!-- Schedule Section -->
    <section id="schedule" class="p-8 bg-white mt-10">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-4xl font-bold text-gray-900" style="font-family: 'Cormorant Upright', serif;">Schedule</h2>
            <ul class="mt-6 space-y-4 text-lg text-gray-700">
                <li><span class="font-bold">6:30 PM</span> - Ceremony</li>
                <li>
                    Saint Augustin, Ain Saadeh
                    <a href="https://maps.app.goo.gl/Fb2eEWgvP3pJGbkv6" target="_blank" rel="noopener noreferrer" style="display: inline-flex; align-items: center;">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </a>
                </li>
                <li><span class="font-bold">8:00 PM</span> - A Night of Love & Joy</li>
                <li>
                    Santa Preri, Jbeil
                    <a href="https://maps.app.goo.gl/YYXRPm89CANrY1Fn8" target="_blank" rel="noopener noreferrer" style="display: inline-flex; align-items: center;">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </a>
                </li>
            </ul>
        </div>
    </section>

    <!-- Gift Registry Section -->
    <section id="giftRegistry" class="p-8 bg-white mt-10">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-4xl font-bold text-gray-900" style="font-family: 'Cormorant Upright', serif;">Gift Registry</h2>
            <ul class="mt-6 space-y-4 text-lg text-gray-700">
                <li>Your presence is the most cherished gift. However, for those who wish to contribute, our Whish Money account detail are below</li>
                <h2 class="text-2xl font-bold text-gray-900" style="font-family: 'Cormorant Upright', serif;">Whish Account</h2>
                <li>
                Acc# 20000
                <div style="display: inline-flex; align-items: center; margin-left: 10px;">
                    <button id="copyButton" style="cursor: pointer; background: transparent; border: 1px solid #ccc; padding: 4px 6px; border-radius: 5px; color: #333; font-size: 0.7em;">
                    Copy
                    </button>
                </div>
                </li>

                <script>
                    const copyButton = document.getElementById('copyButton');
                    const accountNumber = "20000"; // Store the account number directly

                    copyButton.addEventListener('click', () => {
                        const tempInput = document.createElement('input');
                        tempInput.value = accountNumber;
                        document.body.appendChild(tempInput);
                        tempInput.select();
                        document.execCommand('copy');
                        document.body.removeChild(tempInput);
                        alert('Copied to clipboard'); // Optional user feedback
                    });

                </script>
            </ul>
        </div>
    </section>

    <!-- RSVP Section -->
    <section id="rsvp" class="p-8 bg-white mt-10">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-4xl font-bold text-gray-900" style="font-family: 'Cormorant Upright', serif;">RSVP</h2>
            <form id="submitForm" action="{{ url()->secure('/charbel-and-rita/submit') }}" method="POST" class="mt-6">
                @csrf
                <label for="name" class="block text-lg font-medium mb-3">
                    Full Name
                </label>
                <div class="mb-4">
                    <input type="text" name="name" id="nameInput" placeholder="Your Name" class="px-4 py-2 border rounded-lg w-4/5 max-w-xs mx-auto placeholder-gray-800 bg-gray-200" required disabled>
                </div>
                <div>    
                    <button type="submit" class="bg-pink-500 text-white px-6 py-3 rounded-lg text-lg font-medium shadow-md hover:bg-pink-600">Submit RSVP</button>
                </div>    
            </form>
            <div id="rsvpMessage" style="margin-top: 20px" class="message"></div>

            <script>
                document.getElementById('submitForm').addEventListener('submit', function (event) {
                    event.preventDefault();
                    const name = document.querySelector('[name="name"]').value;

                    fetch('{{ url()->secure('/charbel-and-rita/submit') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                        },
                        body: JSON.stringify({
                            name: name
                        })
                    })
                        .then(response => response.json())
                        .then(data => {
                            document.getElementById('rsvpMessage').innerText = `Dear ${name}, thank you for confirming your attendance! We look forward to celebrating with you.`;
                        })
                        .catch(error => {
                            document.getElementById('rsvpMessage').innerText = 'Something went wrong, please try again.';
                        });
                });
            </script>
        </div>
    </section>

    <!-- Gallery Section with Swiper Carousel -->
    <section id="gallery" class="mt-10">
        <div id="default-carousel" class="relative w-full h-full" data-carousel="slide">
            <!-- Carousel wrapper -->
            <div class="relative h-56 overflow-hidden rounded-lg md:h-96 curved-bottom">
                <!-- Item 1 -->
                <div class="absolute opacity-0 transition-opacity duration-700 ease-in-out inset-0" data-carousel-item>
                    <img src="{{ asset('images/background1.jpg') }}" class="absolute object-cover block w-full h-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                <!-- Item 2 -->
                <div class="absolute opacity-0 transition-opacity duration-700 ease-in-out inset-0" data-carousel-item>
                    <img src="{{ asset('images/background2.jpg') }}" class="absolute object-cover block w-full h-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
            </div>
            <!-- Slider indicators -->
            <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
            </div>
            <!-- Slider controls -->
            <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-[#4A5568] group-focus:outline-none">
            <svg class="w-4 h-4 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="#4A5568" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
            </svg>
            <span class="sr-only">Previous</span>
        </span>
            </button>
            <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-[#4A5568] group-focus:outline-none">
            <svg class="w-4 h-4 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="#4A5568" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="sr-only">Next</span>
        </span>
            </button>
        </div>
    </section>

    <script>
        // Optional: You can use this for your carousel behavior if you want auto-sliding
        let currentIndex = 0;
        const slides = document.querySelectorAll('[data-carousel-item]');
        const totalSlides = slides.length;

        const changeSlide = (index) => {
            // Hide all slides
            slides.forEach((slide) => {
                slide.classList.remove('opacity-100');
                slide.classList.add('opacity-0');
            });

            // Show the current slide
            slides[index].classList.remove('opacity-0');
            slides[index].classList.add('opacity-100');
        };

        const nextSlide = () => {
            currentIndex = (currentIndex + 1) % totalSlides;
            changeSlide(currentIndex);
        };

        const prevSlide = () => {
            currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
            changeSlide(currentIndex);
        };

        // Initialize with the first slide visible
        changeSlide(currentIndex);

        // Set auto-slide interval
        setInterval(nextSlide, 5000);  // Auto-slide every 5 seconds

        // Attach event listeners for prev/next buttons
        document.querySelector('[data-carousel-prev]').addEventListener('click', prevSlide);
        document.querySelector('[data-carousel-next]').addEventListener('click', nextSlide);
    </script>

        <!-- Footer Section -->
    <footer class="text-black py-4 text-center">
        <p class="mt-2">© 2025 Charbel & Rita’s Wedding ♡</p>
        <audio id="myAudio" muted loop>
            <source src="{{ secure_asset('audio/song1.mp3') }}" type="audio/mp3">
            Your browser does not support the audio element.
        </audio>
        <button id="audioToggle" class="p-3 bg-pink-500 text-white rounded-full shadow-lg hover:bg-pink-600 transition fixed bottom-4 left-4 z-50 text-3xl">
            ♫
        </button>
    </footer>

    <script src="https://cdn.plyr.io/3.7.8/plyr.js"></script>
    <script>
        function createHearts() {
            setInterval(() => {
                const heart = document.createElement("div");
                heart.classList.add("heart");
                heart.innerHTML = "💗";

                // Random position and size
                heart.style.left = Math.random() * 100 + "vw";
                heart.style.top = "-10px"; // Start just above the viewport
                heart.style.fontSize = Math.random() * 20 + 10 + "px";
                heart.style.animationDuration = Math.random() * 5 + 4 + "s"; 

                document.body.appendChild(heart); // Append directly to body

                // Remove heart after animation ends
                setTimeout(() => {
                    heart.remove();
                }, 5000);
            }, 600);
        }

         document.getElementById("startOverlay").addEventListener("click", function() {
            this.classList.add("opacity-0"); // Fade out
            setTimeout(() => {
                this.classList.add("hidden"); // Hide completely after fade
                document.getElementById("content").classList.remove("hidden"); // Show main content
                createHearts();
            }, 500);

            const player = new Plyr('#myAudio', { controls: [] });
            if (player.muted) {
                player.muted = false; // Unmute
                player.play();
            } else if (player.paused) {
                player.play();
            } else {
                player.pause();
            }
        });

        document.addEventListener("DOMContentLoaded", function () {
            const audioButton = document.getElementById("audioToggle");

            // Initialize Plyr without default controls
            const player = new Plyr('#myAudio', { controls: [] });

            // Toggle play/pause on button click
            audioButton.addEventListener("click", function () {
                if (player.muted) {
                    player.muted = false; // Unmute
                    player.play();
                } else if (player.paused) {
                    player.play();
                } else {
                    player.pause();
                }
            });
        });

        // Function to get query parameter from URL
        function getQueryParam(param) {
            const urlParams = new URLSearchParams(window.location.search);
            return urlParams.get(param);
        }

        // Get 'name' from URL and set it in the input field
        document.addEventListener('DOMContentLoaded', function () {
            const nameFromURL = getQueryParam('name');
            if (nameFromURL) {
                document.getElementById('nameInput').value = nameFromURL;
            }
        });
    </script>
</div>
</body>
</html>




