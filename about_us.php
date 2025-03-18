<?php include 'db_connect.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Waste Awareness</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: white;
            color: #333;
        }

        /* Main container */
        .container {
            max-width: 500px;
            margin: 50px auto;
            padding: 15px;
            background: rgba(158,203,219,0.91);
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            text-align: center;
        }

        h1, h2, h3, h4 {
            font-size: 24px;
            font-weight: bold;
            color: black;
            text-align: center;
        }
        .section {
            margin-top: 20px;
            padding: 15px;
            background: linear-gradient(45deg, #e81cff, #40c9ff);
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .team-container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 20px;
        }
        .team-member {
            width: 200px;
            padding: 15px;
            background:  linear-gradient(144deg, #af40ff, #5b42f3 50%, #00ddeb);
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        /* Main Animated Box */
        .animated-box {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background: rgba(158, 203, 219, 0.91);
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(186, 21, 236, 0.92);
            text-align: justify;
            font-weight: bold;
        }

        /* Image Styling */
        .animated-box img {
            display: block;
            margin: 20px auto;
            max-width: 400%;
            height: auto;
            border-radius: 10px;
        }

        /* Flex container for e-waste sections */
        .E-waste-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            gap: 20px;
            text-align: center;
            margin-top: 20px;
        }

        .E-waste-box {
            width: 30%;
            background-color:rgb(171, 233, 243);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(206, 32, 180, 0.84);
        }

        .image-container img {
            display: block;
            margin: 0 auto;
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .E-waste-container {
                flex-direction: column;
                align-items: center;
            }
            .E-waste-box {
                width: 80%;
            }
        }

        /* 3D Button */
        .button {
            display: inline-block;
            padding: 12px 24px;
            font-size: 16px;
            font-weight: bold;
            color: white;
            background: linear-gradient(45deg, #e81cff, #40c9ff);
            border: none;
            border-radius: 8px;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 4px 10px rgba(122, 194, 212, 0.83);
            margin-top: 20px;
        }

        .button:hover {
            transform: translateY(-5px) scale(1.05);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
        }

        .home-container {
            text-align: center;
            margin-top: 20px;
        }

    </style>
</head>
<body>
    <!-- Main Awareness Section -->
    <div class="container">
    <h1>RECYCLING E-WASTE</h1>
    <img src="aa-768x512.jpg" alt="E-Waste Recycling" style="max-width:40%; border-radius: 10px; margin-bottom: 15px;">

<!-- 3D Animated Box Wrapper -->
<div class="animated-box">
    <p style="font-family: 'Times New Roman', Times, serif; font-size: 18px; color: #333; line-height: 1.6; text-align: justify;">
    Electronic waste (e-waste) recycling is an essential process that helps manage the growing problem of discarded electronic devices such as computers, mobile phones, televisions, and other household gadgets. With rapid technological advancements, many electronic items become obsolete quickly, leading to an increase in e-waste. If not handled properly, these discarded electronics can release hazardous materials like lead, mercury, and cadmium, which pollute the environment and pose serious health risks. Recycling e-waste not only prevents harmful chemicals from contaminating soil and water but also conserves valuable materials like gold, silver, and copper, reducing the need for mining and lowering energy consumption. Additionally, responsible e-waste disposal helps reduce landfill waste, minimize carbon emissions, and create job opportunities in the recycling industry. Individuals can contribute to e-waste management by donating usable electronics, participating in manufacturer take-back programs, or using certified e-waste recycling centers.
    By adopting sustainable practices and promoting responsible disposal, we can protect the environment and build a cleaner, greener future.</p>
</div>

        </div>
    </div>

    <!-- E-Waste Sections -->
    <div class="E-waste-container">
        <div class="E-waste-box">
            <h2>Laptop E-Waste</h2>
            <p>Laptop e-waste includes discarded laptops and their components. Improper disposal can harm the environment.</p>
            <p>Responsible methods include donating or recycling through certified centers.</p>
            <div class="image-container">
                <img src="laptop.jpeg" alt="Laptop E-Waste">
            </div>
        </div>

        <div class="E-waste-box">
            <h3>Computer E-Waste</h3>
            <p>Computer e-waste includes CPUs, monitors, and accessories, which can cause pollution if not handled properly.</p>
            <p>Proper disposal methods include refurbishment or recycling.</p>
            <div class="image-container">
                <img src="computer.jpg" alt="Computer E-Waste">
            </div>
        </div>

        <div class="E-waste-box">
            <h4>Monitor E-Waste</h4>
            <p>CRT and LCD monitors contain toxic substances like lead. Recycling prevents environmental contamination.</p>
            <div class="image-container">
                <img src="monitor.jpeg" alt="Monitor E-Waste">
            </div>
        </div>
    </div>


    <!-- Back to Home Button -->
    <div class="home-container">
        <a href="index.php" class="button">← Back to Home</a>
    </div>
    

</body>
</html>
