<?php
$host = "localhost";
$username = "root";
$password = "";
$datebase = "plan";

$connection = mysqli_connect($host, $username, $password, $datebase);

if (!$connection) {
    die("Ошибка подключения: " . mysqli_connect_error());
}
$query = "SELECT *  FROM tasks ORDER BY task_date ASC, task_time ASC";
//ORDER BY - сортировка записи по определенному полю при выборы из БД
//параметр ASC(по умолчанию) устанавливает порядок сортировки по возростанию, от меньшим к больши

$result = mysqli_query($connection, $query); //выполнен запрос на получение результата

$tasks = []; //создание пустого массива для хранения задач

/* echo "<br>";
var_dump($result->fetch_assoc());
echo '<br>';
var_dump($result->fetch_assoc());
echo '<br>'; */

while ($row = mysqli_fetch_assoc($result)) {
    //mysqli_fetch_assoc - выбирает одну строку данных из набора результатов и возврощает ее в виде асссоциативного массива
    // каждый последующий вызов этой фцнкции возвращает следующую строку в наборе результатов или null если строк больше нет 
    $tasks[] = $row; // добавление каждой выбранной задачи в массив
}

echo json_encode($tasks); //преобразует массив в формат json и выводит на экран
mysqli_close($connection);//закрываем соединение с БД