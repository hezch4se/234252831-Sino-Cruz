<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Activity 3: Area and Perimeter</title>
    <link rel="stylesheet" href="styles.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>
<body>
    <div class="background-animation"></div>
    <div class="container">
        <header class="activity-header">
            <h1><i class="fas fa-square"></i> Area and Perimeter of a Rectangle</h1>
            <p class="subtitle">Calculating geometric properties with PHP.</p>
        </header>
        
        <div class="activity-content">
            <?php
            $length = "";
            $width = "";
            $area = null;
            $perimeter = null;
            $error = "";

            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                if (!isset($_POST['length']) || !isset($_POST['width']) || $_POST['length'] === "" || $_POST['width'] === "") {
                    $error = "Please enter both length and width.";
                } elseif (!is_numeric($_POST['length']) || !is_numeric($_POST['width'])) {
                    $error = "Please enter valid numeric values.";
                } elseif ($_POST['length'] <= 0 || $_POST['width'] <= 0) {
                    $error = "Length and width must be positive numbers.";
                } else {
                    $length = (float)$_POST['length'];
                    $width = (float)$_POST['width'];
                    $area = $length * $width;
                    $perimeter = 2 * ($length + $width);
                }
            }
            ?>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="rectangle-form">
                <div>
                    <label for="length">Length:</label><br />
                    <input type="number" step="any" id="length" name="length" value="<?php echo htmlspecialchars($length); ?>" required />
                </div>
                <div>
                    <label for="width">Width:</label><br />
                    <input type="number" step="any" id="width" name="width" value="<?php echo htmlspecialchars($width); ?>" required />
                </div>
                <button type="submit">Calculate</button>
            </form>

            <?php if ($error): ?>
                <div class="error-message" style="color:red; margin-top:1em;"><?php echo $error; ?></div>
            <?php elseif ($area !== null && $perimeter !== null): ?>
                <div class="output-card" style="margin-top:1em;">
                    <h3><i class="fas fa-ruler"></i> Rectangle Dimensions</h3>
                    <div class="output-item">
                        <strong>Length & Width:</strong>
                        <span class="output-value">length: <?php echo $length; ?>, width: <?php echo $width; ?></span>
                    </div>
                    <div class="output-item">
                        <strong>Area:</strong>
                        <span class="output-value"><?php echo $area; ?> square units</span>
                    </div>
                    <div class="output-item">
                        <strong>Perimeter:</strong>
                        <span class="output-value"><?php echo $perimeter; ?> units</span>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
    
    <a href="index.php" class="back-btn"><i class="fas fa-arrow-left"></i> Go Back to Activity List</a>
</body>
</html>
