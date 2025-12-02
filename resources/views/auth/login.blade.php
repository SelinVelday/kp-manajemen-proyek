<x-guest-layout>
    <div class="card-body">
        <div class="card-content p-2">
            <div class="text-center">
                <img src="{{ asset('template/assets/images/logo-icon.png') }}" alt="logo icon">
            </div>
            <div class="card-title text-uppercase text-center py-3">Sign In</div>

            <x-auth-session-status class="mb-4" :status="session('status')" />
            
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label for="email" class="sr-only">Email</label>
                    <div class="position-relative has-icon-right">
                        <input type="email" id="email" name="email" class="form-control input-shadow" placeholder="Masukkan Email" :value="old('email')" required autofocus>
                        <div class="form-control-position">
                            <i class="icon-user"></i>
                        </div>
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
                </div>

                <div class="form-group">
                    <label for="password" class="sr-only">Password</label>
                    <div class="position-relative has-icon-right">
                        <input type="password" id="password" name="password" class="form-control input-shadow" placeholder="Masukkan Password" required>
                        <div class="form-control-position">
                            <i class="icon-lock"></i>
                        </div>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />
                </div>

                <div class="form-row">
                    <div class="form-group col-6">
                        <div class="icheck-material-white">
                            <input type="checkbox" id="remember_me" name="remember">
                            <label for="remember_me">Ingat Saya</label>
                        </div>
                    </div>
                    <div class="form-group col-6 text-right">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}">Lupa Password?</a>
                        @endif
                    </div>
                </div>

                <button type="submit" class="btn btn-light btn-block">Sign In</button>
                
            </form>
        </div>
    </div>
    <div class="card-footer text-center py-3">
        <p class="text-warning mb-0">Belum punya akun? <a href="{{ route('register') }}"> Daftar di sini</a></p>
    </div>
</x-guest-layout>