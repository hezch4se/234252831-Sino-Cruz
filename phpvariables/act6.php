<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Activity 6: Salary Calculator</title>
    <link rel="stylesheet" href="styles.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>
<body>
    <div class="background-animation"></div>
    <div class="container">
        <header class="activity-header">
            <h1><i class="fas fa-peso-sign"></i> Salary Calculator</h1>
            <p class="subtitle">Computing net salary with allowances and deductions in PHP.</p>
        </header>
        
        <div class="activity-content">
            <?php
            $basic_salary = "";
            $allowance = "";
            $deduction = "";
            $net_salary = null;
            $error = "";

            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                if (
                    !isset($_POST['basic_salary']) || $_POST['basic_salary'] === "" ||
                    !isset($_POST['allowance']) || $_POST['allowance'] === "" ||
                    !isset($_POST['deduction']) || $_POST['deduction'] === ""
                ) {
                    $error = "Please fill in all the fields.";
                } elseif (
                    !is_numeric($_POST['basic_salary']) ||
                    !is_numeric($_POST['allowance']) ||
                    !is_numeric($_POST['deduction'])
                ) {
                    $error = "Please enter valid numeric values.";
                } elseif (
                    $_POST['basic_salary'] < 0 || $_POST['allowance'] < 0 || $_POST['deduction'] < 0
                ) {
                    $error = "Values cannot be negative.";
                } else {
                    $basic_salary = (float)$_POST['basic_salary'];
                    $allowance = (float)$_POST['allowance'];
                    $deduction = (float)$_POST['deduction'];
                    $net_salary = $basic_salary + $allowance - $deduction;
                }
            }
            ?>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="salary-form">
                <div>
                    <label for="basic_salary">Basic Salary (₱):</label><br />
                    <input type="number" step="0.01" min="0" id="basic_salary" name="basic_salary" value="<?php echo htmlspecialchars($basic_salary); ?>" required />
                </div>
                <div>
                    <label for="allowance">Allowance (₱):</label><br />
                    <input type="number" step="0.01" min="0" id="allowance" name="allowance" value="<?php echo htmlspecialchars($allowance); ?>" required />
                </div>
                <div>
                    <label for="deduction">Deduction (₱):</label><br />
                    <input type="number" step="0.01" min="0" id="deduction" name="deduction" value="<?php echo htmlspecialchars($deduction); ?>" required />
                </div>
                <button type="submit">Calculate Net Salary</button>
            </form>

            <?php if ($error): ?>
                <div class="error-message" style="color:red; margin-top:1em;"><?php echo $error; ?></div>
            <?php elseif ($net_salary !== null): ?>
                <div class="output-card" style="margin-top:1em;">
                    <h3><i class="fas fa-calculator"></i> Salary Breakdown</h3>
                    <div class="output-item">
                        <strong>Basic Salary:</strong>
                        <span class="output-value">₱<?php echo number_format($basic_salary, 2); ?></span>
                    </div>
                    <div class="output-item">
                        <strong>Allowance:</strong>
                        <span class="output-value">₱<?php echo number_format($allowance, 2); ?></span>
                    </div>
                    <div class="output-item">
                        <strong>Deduction:</strong>
                        <span class="output-value">₱<?php echo number_format($deduction, 2); ?></span>
                    </div>
                    <div class="output-item">
                        <strong>Net Salary:</strong>
                        <span class="output-value">₱<?php echo number_format($net_salary, 2); ?></span>
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
