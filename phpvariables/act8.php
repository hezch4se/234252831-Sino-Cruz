<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Activity 8: String Manipulation</title>
    <link rel="stylesheet" href="styles.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>
<body>
    <div class="background-animation"></div>
    <div class="container">
        <header class="activity-header">
            <h1><i class="fas fa-edit"></i> String Manipulation</h1>
            <p class="subtitle">PHP functions for string analysis and transformation.</p>
        </header>
        
        <div class="activity-content">
            <?php
            $sentence = "";
            $charL = 0;
            $wordL = 0;
            $uppercase = "";
            $lowercase = "";
            $error = "";

            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                if (isset($_POST['sentence']) && trim($_POST['sentence']) !== "") {
                    $sentence = trim($_POST['sentence']);
                    $charL = strlen($sentence);
                    $wordL = str_word_count($sentence);
                    $uppercase = strtoupper($sentence);
                    $lowercase = strtolower($sentence);
                } else {
                    $error = "Please enter a sentence.";
                }
            }
            ?>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="sentence-form">
                <label for="sentence">Enter a sentence:</label><br />
                <input type="text" id="sentence" name="sentence" value="<?php echo htmlspecialchars($sentence); ?>" style="width: 100%; padding: 0.5em;" />
                <button type="submit" style="margin-top: 1em;">Analyze</button>
            </form>

            <?php if ($error): ?>
                <p style="color: red; margin-top: 1em;"><?php echo $error; ?></p>
            <?php elseif ($sentence !== ""): ?>
                <div class="output-card" style="margin-top: 1em;">
                    <h3><i class="fas fa-text-width"></i> String Analysis</h3>
                    <div class="output-item">
                        <strong>Original:</strong>
                        <span class="output-value"><?php echo htmlspecialchars($sentence); ?></span>
                    </div>
                    <div class="output-item">
                        <strong>Characters:</strong>
                        <span class="output-value"><?php echo $charL; ?></span>
                    </div>
                    <div class="output-item">
                        <strong>Words:</strong>
                        <span class="output-value"><?php echo $wordL; ?></span>
                    </div>
                    <div class="output-item">
                        <strong>Uppercase:</strong>
                        <span class="output-value"><?php echo $uppercase; ?></span>
                    </div>
                    <div class="output-item">
                        <strong>Lowercase:</strong>
                        <span class="output-value"><?php echo $lowercase; ?></span>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
    
    <a href="index.php" class="back-btn"><i class="fas fa-arrow-left"></i> Go Back to Activity List</a>
</body>
</html>
