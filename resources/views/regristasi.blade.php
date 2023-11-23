@extends('layouts.app')

@section('jumbotron')
  <div class="jumbotron h-100">
    <div class="container login-container d-flex justify-content-center align-items-center">
      <div class="login-box p-3 rounded" style="width: 20rem">
        <h4 class="text-white text-center mb-4">DAFTAR</h4>
        <form action="" method="">
          <div class="mb-3">
            <label class="visually-hidden" for="name">Nama</label>
            <div class="input-group">
              <div class="input-group-text"><i class="fa-solid fa-user text-white"></i></div>
              <input type="text" class="form-control" id="name" name="name" placeholder="nama..." required>
            </div>
          </div>
          <div class="mb-3">
            <label class="visually-hidden" for="email">Email</label>
            <div class="input-group">
              <div class="input-group-text"><i class="fa-solid fa-envelope text-white"></i></div>
              <input type="email" class="form-control" id="email" name="email" placeholder="email..." required>
            </div>
          </div>
          <div class="mb-3">
            <label class="visually-hidden" for="password">Password</label>
            <div class="input-group">
              <div class="input-group-text"><i class="fa-solid fa-lock text-white"></i></div>
              <input type="password" class="form-control" id="password" name="password" placeholder="password..." required>
            </div>
          </div>
          <div class="mb-4">
            <label class="visually-hidden" for="password-check">Password</label>
            <div class="input-group">
              <div class="input-group-text"><i class="fa-solid fa-lock text-white"></i></div>
              <input type="password" class="form-control" id="password-check" name="password-check" placeholder="ulangi password..." required>
            </div>
          </div>
          <button type="submit" class="btn button-teal-500 w-100 mb-3">Masuk</button>
          <p class="text-center text-white mb-0">Sudah punya akun? <a href="/login">Masuk</a></p>
        </form>
      </div>
    </div>
  </div>
@endsection