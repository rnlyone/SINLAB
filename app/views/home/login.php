<style>
    html,
body {
  height: 100%;
}

body {
  display: flex;
  align-items: center;
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #ffffff;
}

.form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: auto;
}

.form-signin .form-floating:focus-within {
  z-index: 1;
}

.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}

.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
</style>
</head>
<body class="text-center" data-new-gr-c-s-check-loaded="14.1029.0" data-gr-ext-installed="">
    
<main class="form-signin">
  <form action="login/auth" method="POST">
    <a href="<?= BASEURL?>"><img class="mb-4" src="<?= img ?>/logo.svg" alt="" width="72" height="57"></a>
    <h1 class="h3 mb-3 fw-normal">Masuk SINLAB</h1>

    <?= Flasher::flash() ?>
    <div class="form-floating">
      <input name="username" type="text" class="form-control" id="floatingInput" placeholder="Username">
      <label for="floatingInput">Username</label>
    </div>
    <div class="form-floating">
      <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>

    <div class="checkbox mb-3">
    </div>
    <button class="w-100 btn btn-lg btn-secondary" type="submit">Login</button>
    </div>
    <p class="mt-5 mb-3 text-muted">© 1999–2021 Laboratorium Terpadu Fakultas Ilmu Komputer</p>
  </form>
</main>
