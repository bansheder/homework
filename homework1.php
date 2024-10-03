<?php
$startDate = $endDate = '';
$totalDays = $totalMinutes = 0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    if ($startDate && $endDate) {
        $dateDifference = (new DateTime($startDate))->diff(new DateTime($endDate));
        $totalDays = $dateDifference->days;
        $totalMinutes = $totalDays * 24 * 60;
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Калькулятор времени</title>
    <style>
        body {
            background-color: #e0f7fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: 'Tahoma';
            margin: 0;
            color: grey;
        }
        .calculator {
            background-color: #ffffff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
            max-width: 350px;
            text-align: left;
        }
       
        .calculator input, .calculator button {
            width: 90%; 
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 14px;
        }
        .calculator button {
            background-color: #556B2F;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .calculator button:hover {
            background-color: #6B8E23;
        }
        .result {
            margin-top: 15px;
            font-size: 16px;
            color: #004d40;
        }
    </style>
</head>
<body>
    <div class="calculator">
        <form method="post">
            <label for="startDate">Дата начала:</label>
            <input type="date" id="startDate" name="startDate" value="<?= htmlspecialchars($startDate) ?>" required>
            <label for="endDate">Дата окончания:</label>
            <input type="date" id="endDate" name="endDate" value="<?= htmlspecialchars($endDate) ?>" required>
            <button type="submit">Вычислить</button>
        </form>

        <?php if ($totalDays > 0): ?>
            <div class="result">
                <p>Общее количество прошедших дней: <?= $totalDays ?></p>
                <p>Общее количество прошедших минут: <?= $totalMinutes ?></p>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
