<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Activity 7: BMI Calculator</title>
    <link rel="stylesheet" href="styles.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>
<body>
    <div class="background-animation"></div>
    <div class="container">
        <header class="activity-header">
            <h1><i class="fas fa-weight"></i> BMI Calculator</h1>
            <p class="subtitle">Body Mass Index calculation using weight and height in PHP.</p>
        </header>
        
        <div class="activity-content">
            <?php
            $weight = "";
            $height_cm = "";
            $bmi = null;
            $error = "";

            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                if (!isset($_POST['weight']) || $_POST['weight'] === "" || 
                    !isset($_POST['height_cm']) || $_POST['height_cm'] === "") {
                    $error = "Please enter both weight and height.";
                } elseif (!is_numeric($_POST['weight']) || !is_numeric($_POST['height_cm'])) {
                    $error = "Please enter valid numeric values.";
                } elseif ($_POST['weight'] <= 0 || $_POST['height_cm'] <= 0) {
                    $error = "Weight and height must be positive numbers.";
                } else {
                    $weight = (float)$_POST['weight'];
                    $height_cm = (float)$_POST['height_cm'];
                    $height_m = $height_cm / 100; // convert cm to meters
                    $bmi = $weight / ($height_m * $height_m);
                }
            }
            ?>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="bmi-form">
                <div>
                    <label for="weight">Weight (kg):</label><br />
                    <input type="number" step="0.1" min="0" id="weight" name="weight" value="<?php echo htmlspecialchars($weight); ?>" required />
                </div>
                <div>
                    <label for="height_cm">Height (cm):</label><br />
                    <input type="number" step="0.1" min="0" id="height_cm" name="height_cm" value="<?php echo htmlspecialchars($height_cm); ?>" required />
                </div>
                <button type="submit">Calculate BMI</button>
            </form>

            <?php if ($error): ?>
                <div class="error-message" style="color:red; margin-top:1em;"><?php echo $error; ?></div>
            <?php elseif ($bmi !== null): ?>
                <div class="output-card" style="margin-top:1em;">
                    <h3><i class="fas fa-chart-line"></i> BMI Results</h3>
                    <div class="output-item">
                        <strong>Weight:</strong>
                        <span class="output-value"><?php echo $weight; ?> kg</span>
                    </div>
                    <div class="output-item">
                        <strong>Height:</strong>
                        <span class="output-value"><?php echo $height_cm; ?> cm</span>
                    </div>
                    <div class="output-item">
                        <strong>Your BMI:</strong>
                        <span class="output-value"><?php echo round($bmi, 2); ?></span>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
    
    <a href="index.php" class="back-btn"><i class="fas fa-arrow-left"></i> Go Back to Activity List</a>
</body>
</html>
