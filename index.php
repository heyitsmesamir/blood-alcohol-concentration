<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blood Alcohol Calculator</title>
  <link rel="stylesheet" href="style.css">
  <style>
    .safe {
      color: green;
      font-weight: bold;
    }

    .dangerous {
      color: red;
      font-weight: bold;
    }
  </style>
</head>

<body>
  <div class="container">
    <h2>Blood Alcohol Concentration Calculator</h2>
    <form action="calculate_bac.php" method="POST" id="bac-form">
      <label for="weight">Weight:</label>
      <input type="number" id="weight" name="weight" placeholder="Enter your weight" required>

      <label for="unit">Weight Unit:</label>
      <select id="unit" name="unit" required>
        <option value="kg">Kilograms (kg)</option>
        <option value="lbs">Pounds (lbs)</option>
      </select>

      <label for="gender">Gender:</label>
      <select id="gender" name="gender" required>
        <option value="male">Male</option>
        <option value="female">Female</option>
      </select>

      <label for="drinks">Number of Drinks:</label>
      <input type="number" id="drinks" name="drinks" placeholder="Enter number of drinks" required>

      <label for="alcohol_content">Alcohol Content per Drink (grams):</label>
      <input type="number" id="alcohol_content" name="alcohol_content" placeholder="Enter alcohol content per drink"
        required>

      <label for="time_elapsed">Time Elapsed (hours):</label>
      <input type="number" id="time_elapsed" name="time_elapsed" placeholder="Enter time elapsed since drinking started"
        required>

      <button type="submit">Calculate BAC</button>
    </form>

    <div class="output-wrapper">
      <?php
      if (isset($_GET['bac']) && isset($_GET['safe_index'])) {
        $safeIndexClass = $_GET['safe_index'] === "Safe to Drive" ? "safe" : "dangerous";
        echo "<div> Your Blood Concentration is: <span>" . htmlspecialchars($_GET['bac']) . "%</span></div>";
        echo "<div class=\"$safeIndexClass\">" . htmlspecialchars($_GET['safe_index']) . "</div>";
      } else {
        echo "<div> Your Blood Concentration is: <span>0.08%</span></div>";
        echo "<div class=\"safe\">Safe to drive</div>";
      }
      ?>
    </div>
  </div>
</body>
</html>
