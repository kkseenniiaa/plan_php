<?php
$host = "localhost";
$username = "root";
$password = "";
$datebase = "plan";

$connection = mysqli_connect($host, $username, $password, $datebase);

if (!$connection) {
    die("Ошибка подключения: " . mysqli_connect_error());
} else {
    echo "Успешное подключение к БД";
}
if (
    isset($_POST['task']) && !empty($_POST['task']) &&
    isset($_POST['task_date']) && !empty($_POST['task_date']) &&
    isset($_POST['task_time']) && !empty($_POST['task_time']) &&
    isset($_POST['priority']) && !empty($_POST['priority'])
) {
    //защита данных от SQL - инъекций
    //экранирует специальные символы в страке для использования в SQL выражении
    $task = mysqli_real_escape_string($connection, $_POST['task']);
    $task_date = mysqli_real_escape_string($connection, $_POST['task_date']);
    $task_time = mysqli_real_escape_string($connection, $_POST['task_time']);
    $priority = mysqli_real_escape_string($connection, $_POST['priority']);


    //создаем запрос для вставки новой задачи в БД
    $query = "INSERT INTO tasks (task, task_date, task_time, priority) VALUES ('$task', '$task_date', '$task_time', '$priority')";
    //выполняем запрос
    $result = mysqli_query($connection, $query);
    if ($resulr = true) {
        //если запрос выполнился успешно 
        header("Location: index.php"); //Перенаправляем пользователя на главну страницу
    } else {
        //если запрос не выполнился успешно
        echo 'Ошибка при добавлении задачи';
    }
}
mysqli_close($connection);//закрываем соединение с БД