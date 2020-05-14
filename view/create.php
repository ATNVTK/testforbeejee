<div class="container-fluid p-0">

    <h1 class="h3 mb-3">Добавить задачу</h1>
    <form action="/task/create" method="post">
        <div class="form-group">
            <label>Email</label>
            <input class="form-control form-control-lg" type="email" name="email" placeholder="Введите email"/>
        </div>
        <div class="form-group">
            <label>Имя пользователя</label>
            <input class="form-control form-control-lg" type="text" name="user_name"
                   placeholder="Введите имя пользователя"/>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <textarea name="text" data-provide="markdown" rows="14"></textarea>

                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mt-3">
            <button type="submit" class="btn btn-lg btn-primary">Сохранить</button>
        </div>
    </form>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css"
          integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ"
          crossorigin="anonymous">
</div>
