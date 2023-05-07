@include('admin.templates.nologin')


<div class="login-box" style="margin:auto; padding-top:75px;" >
    <div class="login-logo">
       <b>Admin</b>Testy
    </div>
    
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Zaloguj się</p>
            <form action="" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Hasło">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8"></div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Zaloguj</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@include('admin.templates.nologinfooter')