<?php

/* Author: Roberto Aleman, ventics.com , license: GNU AGPLv3 */

echo "Author: Roberto Aleman, ventics.com , license: GNU AGPLv3 <br/><br/>";

include 'ShannonEntropyCalculator.php';



// Ejemplo de uso
$imagePath = 'img0.png'; // Reemplaza con la ruta de tu imagen
$calculator = new ShannonEntropyCalculator($imagePath);
$resultado = $calculator->calcularEntropia();
echo "<img src='img0.png' style='width: 150px;height: 150px;'><br/>";
echo "Shannon Entropy: " . $resultado['entropia'] . "\n";
echo "Results: " . $resultado['diagnostico'] . "\n";
echo "<br/>------------------------------------<br/><br/>";


$imagePath = 'img1.png'; // Reemplaza con la ruta de tu imagen
$calculator = new ShannonEntropyCalculator($imagePath);
$resultado = $calculator->calcularEntropia();
echo "<img src='img1.png' style='width: 150px;height: 150px;'><br/>";
echo "Shannon Entropy: " . $resultado['entropia'] . "\n";
echo "Results: " . $resultado['diagnostico'] . "\n";
echo "<br/>------------------------------------<br/><br/>";


$imagePath = 'img2.png'; // Reemplaza con la ruta de tu imagen
$calculator = new ShannonEntropyCalculator($imagePath);
$resultado = $calculator->calcularEntropia();
echo "<img src='img2.png' style='width: 150px;height: 150px;'><br/>";
echo "Shannon Entropy: " . $resultado['entropia'] . "\n";
echo "Results: " . $resultado['diagnostico'] . "\n";
echo "<br/>------------------------------------<br/><br/>";



$imagePath = 'img3.png'; // Reemplaza con la ruta de tu imagen
$calculator = new ShannonEntropyCalculator($imagePath);
$resultado = $calculator->calcularEntropia();
echo "<img src='img3.png' style='width: 150px;height: 150px;'><br/>";
echo "Shannon Entropy: " . $resultado['entropia'] . "\n";
echo "Results: " . $resultado['diagnostico'] . "\n";
echo "<br/>------------------------------------<br/><br/>";


$imagePath = 'img4.png'; // Reemplaza con la ruta de tu imagen
$calculator = new ShannonEntropyCalculator($imagePath);
$resultado = $calculator->calcularEntropia();
echo "<img src='img4.png' style='width: 150px;height: 150px;'><br/>";
echo "Shannon Entropy: " . $resultado['entropia'] . "\n";
echo "Results: " . $resultado['diagnostico'] . "\n";
echo "<br/>------------------------------------<br/><br/>";


?>