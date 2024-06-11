<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto+Mono:ital,wght@0,700;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>

<body>
    <div class="wrapper">
        <h1 class="title">Мои задачи</h1>
        <div id="app">
            <form action="add_task.php" method="post" class="form">
                <input class="form__row" type="text" name="task" placeholder="Добавить задачу" require>
                <input class="form__row" type="date" name="task_date" require>
                <input class="form__row" type="time" name="task_time" require>
                <select name="priority" class="form__row">
                    <option value="low">Низкая важность(low)</option>
                    <option value="medium">Средняя важность(medium)</option>
                    <option value="high">Высокая важность(high)</option>
                </select>
                <button class="btn" type="submit">Добавить</button>
            </form>
            <ul id="task_list">

            </ul>
        </div>
    </div>
    <script src="java.js"></script>
</body>

</html>