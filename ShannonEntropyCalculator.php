<?php
/* Author: Roberto Aleman, ventics.com , license: GNU AGPLv3 */


class ShannonEntropyCalculator {
    private $image;
    private $width;
    private $height;

    public function __construct($imagePath) {
        $this->loadImage($imagePath);
    }

    private function loadImage($imagePath) {
        $this->image = imagecreatefrompng($imagePath);
        $this->width = imagesx($this->image);
        $this->height = imagesy($this->image);
    }

    public function calcularEntropia() {
        $totalPixels = $this->width * $this->height;
        $histogram = [];

        // Calcular el histograma de colores
        for ($y = 0; $y < $this->height; $y++) {
            for ($x = 0; $x < $this->width; $x++) {
                $colorIndex = imagecolorat($this->image, $x, $y);
                if (!isset($histogram[$colorIndex])) {
                    $histogram[$colorIndex] = 0;
                }
                $histogram[$colorIndex]++;
            }
        }

        // Calcular la entropía de Shannon
        $entropy = 0;
        foreach ($histogram as $count) {
            $probability = $count / $totalPixels;
            if ($probability > 0) {
                $entropy -= $probability * log($probability, 2);
            }
        }

        return $this->diagnostico($entropy);
    }

    private function diagnostico($entropy) {
        if ($entropy < 1) {
            return [
                'entropia' => $entropy,
                'diagnostico' => "Very low randomness (little variability in colors)."
            ];
        } elseif ($entropy < 3) {
            return [
                'entropia' => $entropy,
                'diagnostico' => "Low to moderate randomness (little color diversity)."
            ];
        } elseif ($entropy < 5) {
            return [
                'entropia' => $entropy,
                'diagnostico' => "Moderate to high randomness (acceptable color diversity)."
            ];
        } elseif ($entropy < 7) {
            return [
                'entropia' => $entropy,
                'diagnostico' => "High randomness (good color diversity)."
            ];
        } elseif ($entropy < 8) {
            return [
                'entropia' => $entropy,
                'diagnostico' => "Very high randomness (almost all colors are equally likely)."
            ];
        } else {
            return [
                'entropia' => $entropy,
                'diagnostico' => "Extremely high randomness (very diverse color distribution)."
            ];
        }
    }
}



?>