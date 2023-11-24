@extends('layouts.app')

@section('jumbotron')
  <div class="jumbotron h-100">
    <div class="container login-container d-flex justify-content-center align-items-center">
      <div
        class="login-box p-3 rounded"
        style="width: 20rem"
      >
        <h4 class="text-white text-center mb-4">DAFTAR</h4>
        <form
          method="POST"
          action="{{ route('register') }}"
        >
          @csrf
          <div class="mb-3">
            <label
              class="visually-hidden"
              for="name"
            >Nama</label>
            <div class="input-group">
              <div class="input-group-text"><i class="fa-solid fa-user text-white"></i></div>
              <input
                id="name"
                type="text"
                class="form-control @error('name') is-invalid @enderror"
                name="name"
                value="{{ old('name') }}"
                placeholder="nama..."
                required
                autocomplete="name"
                autofocus
              >
              @error('name')
                <span
                  class="invalid-feedback"
                  role="alert"
                >
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
          <div class="mb-3">
            <label
              class="visually-hidden"
              for="email"
            >Email</label>
            <div class="input-group">
              <div class="input-group-text"><i class="fa-solid fa-envelope text-white"></i></div>
              <input
                id="email"
                type="email"
                class="form-control @error('email') is-invalid @enderror"
                name="email"
                value="{{ old('email') }}"
                placeholder="email..."
                required
                autocomplete="email"
              >
              @error('email')
                <span
                  class="invalid-feedback"
                  role="alert"
                >
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
          <div class="mb-3">
            <label
              class="visually-hidden"
              for="nohp"
            >Nomor Handphone</label>
            <div class="input-group">
              <div class="input-group-text"><i class="fa-solid fa-phone text-white"></i></div>
              <input
                id="nohp"
                type="text"
                class="form-control @error('nohp') is-invalid @enderror"
                name="nohp"
                value="{{ old('nohp') }}"
                placeholder="nomor handphone..."
                required
                autocomplete="nohp"
                autofocus
              >
              @error('nohp')
                <span
                  class="invalid-feedback"
                  role="alert"
                >
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
          <div class="mb-3">
            <label
              class="visually-hidden"
              for="password"
            >Password</label>
            <div class="input-group">
              <div class="input-group-text"><i class="fa-solid fa-lock text-white"></i></div>
              <input
                id="password"
                type="password"
                class="form-control @error('password') is-invalid @enderror"
                name="password"
                placeholder="password..."
                required
                autocomplete="new-password"
              >
              @error('password')
                <span
                  class="invalid-feedback"
                  role="alert"
                >
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
          <div class="mb-4">
            <label
              class="visually-hidden"
              for="password-check"
            >Confirm Password</label>
            <div class="input-group">
              <div class="input-group-text"><i class="fa-solid fa-lock text-white"></i></div>
              <input
                id="password-confirm"
                type="password"
                class="form-control"
                name="password_confirmation"
                required
                placeholder="ulangi password..."
                autocomplete="new-password"
              >
            </div>
          </div>
          <button
            type="submit"
            class="btn button-teal-500 w-100 mb-3"
          >Daftar</button>
          <p class="text-center text-white mb-0">Sudah punya akun? <a href="/login">Masuk</a></p>
        </form>
      </div>
    </div>
  </div>
@endsection
