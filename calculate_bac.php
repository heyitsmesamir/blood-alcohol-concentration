<?php
    $weight = $_POST['weight'];
    $weightUnit = $_POST['unit'];
    $gender = $_POST['gender'];
    $drinks= $_POST['drinks'];
    $alcoholContent = $_POST['alcohol_content'];
    $timeElapsed = $_POST['time_elapsed'];
    
    $alcoholConsumed = $alcoholContent * $drinks;

    $genderConstant = 0.68;
    
    if ($gender=="female"){
        $genderConstant = 0.55;
    }

    if ($weightUnit == "kg"){
        $weight = $weight * 2.20462; 
    }

    $bac = (($alcoholConsumed * 5.14) / ($weight * $genderConstant))-(0.015 * $timeElapsed);

    $bac = round($bac , 4);

    echo $weight;
    echo "<br>";
    echo $weightUnit;
    echo "<br>";
    echo $gender;
    echo "<br>";
    echo $drinks;
    echo "<br>";
    echo $alcoholContent;
    echo "<br>";
    echo $timeElapsed;
    echo "<br>";
    echo $alcoholConsumed;
    echo "<br>";
    echo $genderConstant;
    echo "<br>";
    echo 'your baa is ' . $bac;

    $safeIndex = ($bac < 0.08)? "Safe to Drive" : "Dangerous to Drive";

    header("Location: index.php?bac=" .urlencode($bac) . "&safe_index=". urlencode($safeIndex));
