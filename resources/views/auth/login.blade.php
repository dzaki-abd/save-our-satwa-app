@extends('layouts.app')

@section('jumbotron')
  <div class="jumbotron h-100">
    <div class="container login-container d-flex justify-content-center align-items-center">
      <div
        class="login-box p-3 rounded"
        style="width: 20rem"
      >
        <h4 class="text-white text-center mb-4">MASUK</h4>
        <form
          method="POST"
          action="{{ route('login') }}"
        >
          @csrf
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
                required
                autocomplete="email"
                autofocus
                placeholder="your email..."
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
          <div class="mb-4">
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
                required
                autocomplete="current-password"
                placeholder="your password..."
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
          <div class="mb-4 d-flex justify-content-between align-items-center">
            <div>
              <input
                class="form-check-input"
                type="checkbox"
                name="remember"
                id="check"
                {{ old('remember') ? 'checked' : '' }}
              >
              <label
                class="label-checkbox"
                for="check"
              >Ingat saya</label>
            </div>
            <a href="{{ route('password.request') }}">Lupa Password?</a>
          </div>
          <button
            type="submit"
            class="btn button-teal-500 w-100 mb-3"
          >Masuk</button>
          <p class="text-center text-white mb-0">Belum punya akun? <a href="/register">Daftar</a></p>
        </form>
      </div>
    </div>
  </div>
@endsection
