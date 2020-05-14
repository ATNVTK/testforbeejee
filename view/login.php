<div class="container h-100">
    <div class="row h-100">
        <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
            <div class="d-table-cell align-middle">

                <div class="text-center mt-4">
                    <p class="lead">
                        Войдите в свой аккаунт чтобы продолжить
                    </p>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="m-sm-4">
                            <form action="/admin/login" method="post">
                                <div class="form-group">
                                    <label>Имя пользователя</label>
                                    <input class="form-control form-control-lg" type="text" name="admin"
                                           placeholder="Введите имя пользователя"/>
                                </div>
                                <div class="form-group">
                                    <label>Пароль</label>
                                    <input class="form-control form-control-lg" type="password" name="password"
                                           placeholder="Введите пароль"/>
                                </div>
                                <div class="text-center mt-3">
                                    <button type="submit" class="btn btn-lg btn-primary">Войти</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
