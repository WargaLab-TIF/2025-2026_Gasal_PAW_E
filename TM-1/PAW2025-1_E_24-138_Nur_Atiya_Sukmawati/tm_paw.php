<?php
require_once 'tm1.php';

$size = '';
$selectedRule = '';
$selectedColor = '';
$tableHtml = '';
$error = '';

$rules = [
    'kubik'      => 'Bilangan Kubik',
    'perbatasan' => 'Pola Perbatasan', 
    'prima'      => 'Bilangan Prima',
    'diagonal'   => 'Pola Arsiran Diagonal'
];

$colors = [
    'red'    => 'Merah',
    'blue'   => 'Biru',
    'green'  => 'Hijau',
    'yellow' => 'Kuning'
];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputSize = filter_input(INPUT_POST, 'size', FILTER_VALIDATE_INT);
    $selectedRule = filter_input(INPUT_POST, 'rule', FILTER_SANITIZE_STRING);
    $selectedColor = filter_input(INPUT_POST, 'color', FILTER_SANITIZE_STRING);

    $size = filter_input(INPUT_POST, 'size', FILTER_SANITIZE_STRING);

    if ($inputSize === false || $inputSize === null || $inputSize <= 0) {
        $error = "Error: Batas ukuran tabel harus berupa bilangan bulat positif.";
    } elseif (!array_key_exists($selectedRule, $rules)) {
        $error = "Error: Aturan filter harus dipilih.";
    } elseif (!array_key_exists($selectedColor, $colors)) {
        $error = "Error: Pilihan warna harus dipilih.";
    } else {
        // Jika valid
        $size = $inputSize;
        $selectedColorName = $colors[$selectedColor];
        $selectedRuleName = $rules[$selectedRule];
        
        $tableHtml = createModulusTable($size, $selectedColor, $selectedColorName, $selectedRule, $selectedRuleName);
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas Tabel Modulus Dinamis</title>
    <link rel="stylesheet" href="tm_1.css"> 
</head>
<body>
    <h1>Tabel Modulus Dinamis</h1>
    
    <form method="post" action="tm_paw.php" class="form-container">
        
        <label for="size">Batas Ukuran Tabel:</label>
        <input type="number" id="size" name="size" min="1" required 
               value="<?php echo htmlspecialchars($size); ?>">

        <label for="rule">Aturan Filter Tampilan:</label>
        <select id="rule" name="rule" required>
            <option value="" disabled <?php echo empty($selectedRule) ? 'selected' : ''; ?>>-- Pilih Aturan --</option>
            <?php foreach ($rules as $value => $label): ?>
                <option value="<?php echo $value; ?>" 
                        <?php echo ($selectedRule === $value) ? 'selected' : ''; ?>>
                    <?php echo $label; ?>
                </option>
            <?php endforeach; ?>
        </select>
        
        <label for="color">Warna Filter:</label>
        <select id="color" name="color" required>
            <option value="" disabled <?php echo empty($selectedColor) ? 'selected' : ''; ?>>-- Pilih Warna --</option>
            <?php foreach ($colors as $value => $label): ?>
                <option value="<?php echo $value; ?>" 
                        <?php echo ($selectedColor === $value) ? 'selected' : ''; ?>>
                    <?php echo $label; ?>
                </option>
            <?php endforeach; ?>
        </select>
        
        <button type="submit" class="generate-button">Generate Tabel</button>

        <p class="instruction-text">Silakan pilih ukuran tabel dan filter, lalu klik Generate Tabel</p>
    </form>

    <?php 
    if (!empty($error)) {
        echo "<p class='error'>$error</p>";
    }
    if (!empty($tableHtml)) {
        echo $tableHtml;
    }
    ?>
    
</body>
</html>