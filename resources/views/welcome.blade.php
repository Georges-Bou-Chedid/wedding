<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A Love Story: Charbel & Rita</title>
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            overflow: hidden; /* Prevents the body from scrolling freely */
            scroll-behavior: smooth; /* Ensures smooth scrolling between pages */
        }

        body {
            background-image: url("{{ asset('images/background.jpg') }}");
            background-repeat: no-repeat;
            background-size: 100% 100%;
            /*display: flex;*/
            background-position: center center;
            background-attachment: fixed;
            flex-direction: column; /* Stack the pages vertically */
            height: 100%;
            scroll-snap-type: y mandatory; /* Enables scroll snapping on vertical scroll */
            overflow-y: scroll; /* Allows scrolling vertically */
        }

        .welcomePage {
            width: 100%;
            height: 100%; /* Full viewport height */
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            position: relative;
            scroll-snap-align: start;
        }

        .welcomeContent {
            width: 100%;
            height: 100%; /* Ensures it takes full height */
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: start; /* Aligns 'Save The Date' at the top */
            position: relative;
            z-index: 2;
            padding: 15px;
        }

        .save-the-date {
            align-self: center; /* Centers horizontally */
        }

        .couple-names {
            position: absolute;
            top: 45%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            white-space: nowrap;
        }

        h1 {
            font-family: 'Times New Roman', serif;
            font-size: 4.5vw;
            font-weight: 500;
            text-transform: uppercase;
            margin: 0; /* Removes default margin */
            padding: 0;
        }

        h2 {
            font-family: 'Times New Roman', serif;
            font-size: 1.8vw;
            font-weight: 300;
            text-transform: uppercase;
            margin-top: 0;
        }

        @font-face {
            font-family: 'Le Jour Script';
            src: url("{{ secure_asset('fonts/Le Jour Script.otf') }}") format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        .theScript {
            font-family: 'Le Jour Script', cursive;
            font-size: 3.2vw;
            text-transform: capitalize;
            margin-right: 8px;
        }

        .script {
            font-family: 'Le Jour Script', cursive;
            font-size: 5vw;
            text-transform: capitalize;
        }

        .wedding-details {
            position: absolute;
            bottom: 20px;
            right: 30px;
            text-align: center; /* Align text to the right */
            font-family: 'Times New Roman', serif;
            font-size: 1.6vw;
        }

        /* Button */
        .churchButton {
            font-family: 'Times New Roman', serif;
            background-color: gold;
            color: black;
            font-size: 1vw;
            padding: 15px;
            border: none;
            text-transform: uppercase;
            border-radius: 20px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
            text-decoration: none;
        }

        .churchButton:hover {
            background-color: #d4af37;
        }

        .page {
            width: 100%;
            height: 100%; /* Ensure each page is the full height of the viewport */
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            position: relative;
            scroll-snap-align: start;
        }

        .content {
            position: relative;
            z-index: 2;
            padding: 20px;
        }

        .details {
            font-family: 'Times New Roman', serif;
            font-size: 2.5vw;
        }

        /* Button */
        .button {
            font-family: 'Times New Roman', serif;
            background-color: gold;
            color: black;
            font-size: 1.4vw;
            text-transform: uppercase;
            padding: 20px;
            border: none;
            border-radius: 20px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
            text-decoration: none;
        }

        .button:hover {
            background-color: #d4af37;
        }

        /* Title */
        .rsvp-title {
            font-family: 'Times New Roman', serif;
            font-size: 2.7vw; /* Adjusts based on screen size */
            font-weight: bold;
            text-transform: uppercase;
            color: gold;
            margin-bottom: 20px;
        }

        /* Subtitle */
        .rsvp-subtitle {
            font-family: 'Times New Roman', serif;
            font-size: 1.8vw;
            margin-bottom: 30px;
        }

        /* Form */
        .rsvp-form {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 15px;
        }

        label {
            font-family: 'Times New Roman', serif;
            font-size: 1.6vw;
        }

        .message {
            font-family: 'Times New Roman', serif;
            font-size: 1.3vw;
        }

        input, select {
            font-family: 'Times New Roman', serif;
            padding: 15px;
            font-size: 1.6vw;
            width: 20%;
            min-width: 300px; /* Ensures better visibility on large screens */
            border-radius: 10px;
            border: none;
        }

        /* Responsive Design for Small Screens */
        @media (max-width: 768px) {
            h1 {
                font-family: 'Times New Roman', serif;
                font-size: 9.5vw;
            }

            h2 {
                font-family: 'Times New Roman', serif;
                font-size: 4.5vw;
            }

            @font-face {
                font-family: 'Le Jour Script';
                src: url("{{ secure_asset('fonts/Le Jour Script.otf') }}") format('truetype');
                font-weight: normal;
                font-style: normal;
            }

            .theScript {
                font-family: 'Le Jour Script', cursive;
                font-size: 8.5vw;
            }

            .script {
                font-family: 'Le Jour Script', cursive;
                font-size: 9.5vw;
            }

            .wedding-details {
                font-size: 4vw;
            }

            .churchButton {
                font-size: 3vw;
                padding: 12px;
            }

            .details {
                font-family: 'Times New Roman', serif;
                font-size: 5.5vw;
            }

            /* Button */
            .button {
                font-size: 3.4vw;
                padding: 14px;
            }

            .rsvp-title {
                font-size: 6.5vw;
            }

            .rsvp-subtitle {
                font-size: 4.5vw;
            }

            label {
                font-size: 4vw;
            }

            .message {
                font-size: 3.2vw;
            }

            input, select {
                width: 20%;
                min-width: 160px;
                font-size: 4vw;
            }
        }

    </style>
</head>
<body>

<!-- First Page (Save The Date) -->
<div class="welcomePage">
    <div class="welcomeContent">
        <h1 class="save-the-date">Save <span class="theScript">The</span> Date</h1>
        <h2>FOR THE WEDDING OF</h2>
        <br>
        <br>
        <p class="script couple-names">Charbel & Rita</p>
        <div class="wedding-details">
            <p>May 31, 2025</p>
            <p>Saint Augustin, Ain Saadeh</p>
            <p>06:30 P.M.</p>
            <a href="https://maps.app.goo.gl/Fb2eEWgvP3pJGbkv6" target="_blank" class="churchButton">
                VIEW LOCATION
            </a>
        </div>
    </div>
</div>

<!-- Second Page (More Details) -->
<div class="page">
    <div class="content">
        <div class="details">
            <p>A Night of Love & Joy at</p>
            <p>Santa Preri – Jbeil</p>
            <a href="https://maps.app.goo.gl/YYXRPm89CANrY1Fn8" target="_blank" class="button">
                VIEW LOCATION
            </a>
        </div>
    </div>
</div>

<!-- Third Page (More Details) -->
<div class="page">
    <div class="content">
        <div class="details">
            <p class="rsvp-subtitle">Your love, laughter, and presence are the best gifts. <br>However, if you wish to contribute, below are the details.</p>
            <p class="rsvp-title">WHISH ACCOUNT</p>
            <p class="rsvp-subtitle">Acc# XXXX</p>
        </div>
    </div>
</div>

<!-- Fourth Page (More Details) -->
<div class="page">
    <div class="content">
        <div class="details">
            <div class="rsvp-title">RSVP</div>
            <div class="rsvp-subtitle">Let us know if you'll be attending!</div>

            <form id="submitForm" class="rsvp-form" action="{{ url()->secure('submit') }}" method="POST">
                @csrf
                <label for="name">Name</label>
                <input type="text" id="name" name="name" required>

                <label for="attending">Are u attending?</label>
                <select id="attending" name="attending">
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>

                <button type="submit" style="margin-top: 10px" class="button">SEND RSVP</button>
            </form>
            <div id="rsvpMessage" style="margin-top: 20px" class="message"></div>

            <script>
                document.getElementById('submitForm').addEventListener('submit', function (event) {
                    event.preventDefault();
                    const name = document.querySelector('[name="name"]').value;
                    const attending = document.querySelector('[name="attending"]').value;

                    fetch('{{ url()->secure('submit') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                        },
                        body: JSON.stringify({
                            name: name,
                            attending: attending
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
    </div>
</div>

</body>
</html>

