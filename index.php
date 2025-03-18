<?php include 'db_connect.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-WASTE MANAGEMENT SYSTEM</title>
    <link rel="stylesheet" href="style.css">
    <style>
:root {
    --glow-color: #0099cc; /* Darker cyan blue */
    --glow-spread-color: rgba(0, 84, 153, 0.8); /* Darker spread glow */
    --btn-color: #004466; /* Deep navy blue */
}

body {
    font-family: Arial, sans-serif;
    background-color:white; /* Dark background */
    margin: 0;
    padding: 0;
    color: white;
    text-align: center;
}

.main {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: rgb(0, 51, 102); /* Deep navy */
    padding: 15px 60px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.5);
}

.logo img {
    height: 50px;
    width: 300%;
    max-width: 200px;
    height: auto;
}

.main ul {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    align-items: center;
}

.main ul li {
    margin: 0 15px;
}

/* Dark Glow Navigation Button */
.nav-button {
    border: 3px solid var(--glow-color);
    padding: 12px 20px;
    color: white;
    font-size: 16px;
    font-weight: bold;
    background-color: var(--btn-color);
    border-radius: 12px;
    text-decoration: none;
    display: inline-block;
    box-shadow: 0 0 1.5em 0.4em var(--glow-color),
                0 0 3em 1.5em var(--glow-spread-color),
                inset 0 0 1em 0.3em var(--glow-color);
    text-shadow: 0 0 1em var(--glow-color);
    transition: all 0.3s ease-in-out;
    transform: perspective(1px) translateZ(0);
}

.nav-button:hover {
    color: var(--btn-color);
    background-color: var(--glow-color);
    box-shadow: 0 0 2.5em 0.5em var(--glow-color),
                0 0 5em 2em var(--glow-spread-color),
                inset 0 0 1.5em 0.5em var(--glow-color);
    transform: scale(1.1);
}

.nav-button:active {
    box-shadow: 0 0 1em 0.4em var(--glow-color),
                0 0 2.5em 1.2em var(--glow-spread-color),
                inset 0 0 1em 0.3em var(--glow-color);
    transform: scale(0.95);
}
        .title-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 40vh;
        }

        .typing-text {
            font-size: 40px;
            font-weight: bold;
            border-right: 6px solid white;
            white-space: nowrap;
            overflow: hidden;
            width: 0;
            animation: typing 6s steps(20, end) forwards, blink 0.3s infinite;
        }

        @keyframes typing {
            from { width: 0; }
            to { width: 44%; }
        }

        @keyframes blink {
            50% { border-color: transparent; }
        }
        .description-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width:100%;
            padding: 0px;
            box-sizing: border-box;
            margin-top:-100px;
        }
        .description {
            max-width: 900px;
            background: rgba(33, 144, 185, 0.5);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(173, 199, 207, 0.79),
                        0 12px 24px rgba(241, 25, 205, 0.93);
            text-align: justify;
            font-weight: bold;
        }
                /* Scrolling Content */
        .scrolling-content {
            margin-top: 30px;
            padding: 0px 0px;
            background-color: skyblue;
            color: white;
            text-align: center;
        }

        /* Scrolling Text Effect */
        .scrolling-text {
            font-size: 24px;
            font-weight: bold;
            white-space: nowrap;
            overflow: hidden;
            width: 100%;
            display: inline-block;
            animation: scrollText 10s linear infinite;
        }

        @keyframes scrollText {
            from { transform: translateX(100%); }
            to { transform: translateX(-120%); }
        }
                h1 {
    font-size: 32px; /* Adjust size as needed */
    font-weight: bold; /* Optional: Make it bold */
    color: black; /* Optional: Set a color */
    text-align: center; /* Optional: Center align */
}

 h2 {
    font-size: 32px; /* Adjust size as needed */
    font-weight: bold; /* Optional: Make it bold */
    color: black; /* Optional: Set a color */
    text-align: center; /* Optional: Center align */
}
        h3 {
    font-size: 32px; /* Adjust size as needed */
    font-weight: bold; /* Optional: Make it bold */
    color: black; /* Optional: Set a color */
    text-align: center; /* Optional: Center align */
}

.animated-box {
    max-width: 900px;
    margin: 20px auto;
    padding: 20px;
    background: rgba(154, 218, 238, 0.93);
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(218, 136, 215, 0.92);
    text-align: justify;
    font-weight: bold;
    perspective: 1000px; /* 3D Effect */
    transform-style: preserve-3d;
    animation: rotateBox 5s infinite alternate ease-in-out;
}

@keyframes rotateBox {
    0% {
        transform: rotateY(0deg);
        box-shadow: 0 8px 16px rgba(173, 199, 207, 0.5);
    }
    100% {
        transform: rotateY(10deg);
        box-shadow: 0 12px 24px rgba(241, 25, 205, 0.8);
    }
}
.scrolling-content {
    margin-top: 30px;
    padding: 0px 0px;
    background-color: white; /* Change to white */
    color: black;
    text-align: center;
}

</style>
</head>
<body>
    <header>
        <div class="main">
            <div class="logo">
            <img src="e-wast-managemaent.jpg" alt="Logo">
            </div>
            <ul>

                <li><a href="index.php" class="nav-button">HOME</a></li>
                <li><a href="login.php" class="nav-button">LOGIN</a></li>
                <li><a href="price.html" class="nav-button">VALUE</a></li>
                <li><a href="rate_us.php" class="nav-button">RATE US</a></li>
                <li><a href="about_us.php" class="nav-button">ABOUT US</a></li>
                <li><a href="contact.php" class="nav-button">CONTACT US</a></li>
               <li><a href="admin.php" class="nav-button">ADMIN</a></li>
               <li><a href="chatbot.html" class="nav-button">ECO BUDDY</a></li>


            </ul>
        </div>
    </header>
</body>

</html>
         <!-- Centered Title with Typing Effect -->
    <div class="title-container">
        <h1 class="typing-text">E-WASTE MANAGEMENT SYSTEM</h1>
        </div>

<!-- Description Box Centered -->

    <div class="description-container">
     <div class="description">
<!-- Centered Video Section -->
<div style="display: flex; justify-content: center; align-items: center; height: 50vh;">
    <video width="640" height="360" autoplay muted loop controls>
        <source src="waste.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
</div>
<h2>ABOUT OUR COMPANY</h2>
            <p style="font-family: 'Times New Roman', Times, serif; font-size: 18px; color: #333; line-height: 1.6; text-align: justify;">
    
                At <strong>Electronic Waste Collection</strong>, we provide a simple and eco-friendly solution for collecting and recycling electronic waste. With the rapid growth of technology, old and unused electronic devices often end up in landfills, causing serious environmental harm. Our goal is to reduce this impact by offering a convenient e-waste collection system that ensures proper recycling and safe disposal. We collect items like old computers, mobile phones, and other electronic devices, ensuring that valuable materials are recovered and hazardous substances are disposed of responsibly.
                Our services also include <strong>secure data destruction</strong>, giving you peace of mind when recycling old gadgets. Whether you're an individual or a business, we make it easy to get rid of e-waste in a way that protects both the environment and human health. By choosing <strong>Electronic Waste Collection</strong>, you are contributing to a cleaner, greener future. Let’s work together to reduce e-waste and promote sustainable living.
            </p>
        </div>
        <p>

                    <!-- Scrolling Page Content -->
    <div class="scrolling-content" id="scroll-content">

        <!-- Scrolling text effect -->
        <div class="scrolling-text">
            <p>♻️ Save the environment by recycling your e-waste! ♻️ Join us in building a sustainable future! 🌍</p>
        </div>
    </div>

    <script>
        function scrollToContent() {
            document.getElementById("scroll-content").scrollIntoView({ behavior: "smooth" });
        }
    </script>


    </div>
    </div>
</body>
</html>
