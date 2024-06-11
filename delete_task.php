<?php
$host = "localhost";
$username = "root";
$password = "";
$datebase = "plan";

$connection = mysqli_connect($host, $username, $password, $datebase);

if (!$connection) {
    die("Ошибка подключения: " . mysqli_connect_error());
}

if (isset($_GET['id'])) {
    //если в массиве GET есть данные с ключом id, то экранируем данные, которые хранятся под ключом id
    $id = mysqli_real_escape_string($connection, $_GET['id']);
    //создаем запрос на удаление
    $query = "DELETE FROM tasks WHERE id='$id'";
    //выполняем запрос
    $result = mysqli_query($connection, $query);
    //проверяем, что запрос выполнен успешно
    if ($result) {
        echo 'Задача удалена!';
    }
}
mysqli_close($connection);
