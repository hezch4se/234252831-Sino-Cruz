<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Activity 4: Temperature Converter</title>
    <link rel="stylesheet" href="styles.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>
<body>
    <div class="background-animation"></div>
    <div class="container">
        <header class="activity-header">
            <h1><i class="fas fa-thermometer-half"></i> Temperature Converter</h1>
            <p class="subtitle">Converting Celsius to Fahrenheit using PHP formulas.</p>
        </header>
        
        <div class="activity-content">
            <?php
            $celsius = "";
            $fahrenheit = null;
            $error = "";

            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                if (!isset($_POST['celsius']) || $_POST['celsius'] === "") {
                    $error = "Please enter a Celsius value.";
                } elseif (!is_numeric($_POST['celsius'])) {
                    $error = "Please enter a valid numeric value.";
                } else {
                    $celsius = (float)$_POST['celsius'];
                    $fahrenheit = ($celsius * 9/5) + 32;
                }
            }
            ?>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="temp-form">
                <div>
                    <label for="celsius">Celsius:</label><br />
                    <input type="number" step="any" id="celsius" name="celsius" value="<?php echo htmlspecialchars($celsius); ?>" required />
                </div>
                <button type="submit">Convert</button>
            </form>

            <?php if ($error): ?>
                <div class="error-message" style="color:red; margin-top:1em;"><?php echo $error; ?></div>
            <?php elseif ($fahrenheit !== null): ?>
                <div class="output-card" style="margin-top:1em;">
                    <h3><i class="fas fa-exchange-alt"></i> Conversion Result</h3>
                    <div class="output-item">
                        <strong>Input:</strong>
                        <span class="output-value"><?php echo $celsius; ?> °C</span>
                    </div>
                    <div class="output-item">
                        <strong>Output:</strong>
                        <span class="output-value"><?php echo $fahrenheit; ?> °F</span>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
    
    <a href="index.php" class="back-btn"><i class="fas fa-arrow-left"></i> Go Back to Activity List</a>
</body>
</html>
