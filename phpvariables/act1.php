<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Activity 1: Introduce Yourself</title>
    <link rel="stylesheet" href="styles.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>
<body>
    <div class="background-animation"></div>
    <div class="container">
        <header class="activity-header">
            <h1><i class="fas fa-user"></i> Introduce Yourself</h1>
            <p class="subtitle">A simple personal introduction using PHP.</p>
        </header>
        
        <div class="activity-content">

            <?php
            $name = "";
            $age = "";
            $fav_color = "";
            $error = "";

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (empty($_POST["name"]) || empty($_POST["age"]) || empty($_POST["fav_color"])) {
                    $error = "Please fill in all fields.";
                } else {
                    $name = htmlspecialchars(strip_tags(trim($_POST["name"])));
                    $age = (int) $_POST["age"];
                    $fav_color = htmlspecialchars(strip_tags(trim($_POST["fav_color"])));

                    if ($age <= 0) {
                        $error = "Please enter a valid age.";
                    }
                }
            }
            ?>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="intro-form">
                <div>
                    <label for="name">Name:</label><br />
                    <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>" required />
                </div>
                <div>
                    <label for="age">Age:</label><br />
                    <input type="number" id="age" name="age" value="<?php echo htmlspecialchars($age); ?>" required min="1" />
                </div>
                <div>
                    <label for="fav_color">Favorite Color:</label><br />
                    <input type="text" id="fav_color" name="fav_color" value="<?php echo htmlspecialchars($fav_color); ?>" required />
                </div>
                <button type="submit">Submit</button>
            </form>

            <?php if ($error): ?>
                <div class="error-message" style="color:red; margin-top:1em;"><?php echo $error; ?></div>
            <?php elseif ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
                <div class="output-card" style="margin-top:1em;">
                    <h3><i class="fas fa-quote-left"></i>Personal Introduction</h3>
                    <div class="output-item">
                        <span class="output-value">Hi, I’m <?php echo $name; ?>, I am <?php echo $age; ?> years old, and my favorite color is <?php echo $fav_color; ?>.</span>
                    </div>
                </div>
            <?php endif; ?>

        </div>
    </div>
    
    <a href="index.php" class="back-btn"><i class="fas fa-arrow-left"></i> Go Back to Activity List</a>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const content = document.querySelector('.activity-content');
            if (content) {
                content.style.opacity = '0';
                content.style.transform = 'translateY(20px)';
                setTimeout(() => {
                    content.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                    content.style.opacity = '1';
                    content.style.transform = 'translateY(0)';
                }, 200);
            }
        });
        document.querySelector('.back-btn').addEventListener('click', function(e) {
            e.preventDefault();
            this.style.transform = 'translateX(-50%) scale(0.95)';
            setTimeout(() => {
                window.location.href = this.href;
            }, 150);
        });
    </script>
</body>
</html>
