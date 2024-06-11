//функция удаления задач
function deleteTask(taskId) {
    if (confirm("Удалить задачу?")) {
        fetch(`delete_task.php?id=${taskId}`, {
            method: 'GET'
        })
            .then(() => {
                window.location.reload();//перезагрузка страницы
            })
            .catch((error) => {
                console.log('Ошибка удаления задачи!');
            })
    }
}

//функция загрузки задач сервера и отображения их на странице
function loadTasks() {
    fetch('get_task.php')//отправка get-запроса на сервер для получения задач
        .then((response) => {
            //декодирует ответ в формате json 
            return response.json();
        })
        .then((data) => {
            //в параметр date поступает результат декодирования ответа в формате json
            //то есть мы получаем объкт сформированный файлом get_tasks из БД
            //в текущий момент в параметре date содержится декодированный из json массив задач из БД
            console.log(data)
            //получение элемента списка задач
            const taskList = document.querySelector('#task_list');
            //очистка списка задач перед обновлением
            taskList.innerHTML = '';
            //перебираем полученный массив задач
            data.forEach((task) => {
                //создать новый элемент списка
                const listItem = document.createElement('li');
                listItem.classList.add('task-item');
                listItem.innerHTML =
                    `<div class="task_info">
                        <b>Дата:</b> ${task.task_date}
                        <br><b>Время</b> ${task.task_time}
                        <br><b>Задача:</b> ${task.task}
                        <br><b>Важность:</b> ${task.priority}
                    </div>    
                    <button class="task_del" onclick='deleteTask(${task.id})'>Удалить</button>
                    `//кнопка удаления задач

                taskList.appendChild(listItem);
            });

        })
        .catch((error) => {
            console.log("Ошибка при загрузке задач!");
        })
}
loadTasks();