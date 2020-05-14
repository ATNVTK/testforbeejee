<div class="container-fluid p-0">
    <h1 class="h3 mb-3">Задачи</h1>
    <div class="text-right mb-3">
        <a href="/task/create">
            <span>Добавить задачу</span>
        </a>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="datatables-basic" class="table table-striped" style="width:100%">
                        <thead>
                        <tr>
                            <th>Имя пользователя</th>
                            <th>E-mail</th>
                            <th>Задача</th>
                            <th>Выполнено</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($tasks as $task) {
                            echo '<tr>';
                            echo '<td>' . $task->user_name . '</td>';
                            echo '<td>' . $task->email . '</td>';
                            echo '<td>' . $task->text . '</td>';
                            echo '<td>' . ($task->status_id != 1 ? 'Активно' : 'Выполнено') . '</td>';
                            echo '<td>' . ($task->is_updated == 1 ? 'Отредактировано администратором' : '') . '</td>';
                            echo '<td>' . ((\core\Application::get_app())->user->isGuest ? '' : '<a href="/task/update/?id=' . $task->id . '"><span>Редактировать</span></a>') . '</td>';
                            echo '</tr>';
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function (event) {
            // Datatables basic
            $('#datatables-basic').DataTable({
                responsive: true,
                iDisplayLength: 3
            });
            // Datatables with Buttons
            var datatablesButtons = $('#datatables-buttons').DataTable({
                lengthChange: !1,
                buttons: ["copy", "print"],
                responsive: true
            });
            datatablesButtons.buttons().container().appendTo("#datatables-buttons_wrapper .col-md-6:eq(0)")
        });
    </script>

</div>
