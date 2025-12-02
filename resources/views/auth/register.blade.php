<x-guest-layout>
    <div class="card-body">
        <div class="card-content p-2">
            <div class="text-center">
                <img src="{{ asset('template/assets/images/logo-icon.png') }}" alt="logo icon">
            </div>
            <div class="card-title text-uppercase text-center py-3">Sign Up</div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group">
                    <label for="name" class="sr-only">Nama</label>
                    <div class="position-relative has-icon-right">
                        <input type="text" id="name" name="name" class="form-control input-shadow" placeholder="Masukkan Nama Anda" value="{{ old('name') }}" required autofocus autocomplete="name">
                        <div class="form-control-position">
                            <i class="icon-user"></i>
                        </div>
                    </div>
                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-danger" />
                </div>

                <div class="form-group">
                    <label for="email" class="sr-only">Email</label>
                    <div class="position-relative has-icon-right">
                        <input type="email" id="email" name="email" class="form-control input-shadow" placeholder="Masukkan Email" value="{{ old('email') }}" required autocomplete="username">
                        <div class="form-control-position">
                            <i class="icon-envelope-open"></i>
                        </div>
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
                </div>

                <div class="form-group">
                    <label for="password" class="sr-only">Password</label>
                    <div class="position-relative has-icon-right">
                        <input type="password" id="password" name="password" class="form-control input-shadow" placeholder="Pilih Password" required autocomplete="new-password">
                        <div class="form-control-position">
                            <i class="icon-lock"></i>
                        </div>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />
                </div>

                <div class="form-group">
                    <label for="password_confirmation" class="sr-only">Konfirmasi Password</label>
                    <div class="position-relative has-icon-right">
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control input-shadow" placeholder="Konfirmasi Password" required autocomplete="new-password">
                        <div class="form-control-position">
                            <i class="icon-lock"></i>
                        </div>
                    </div>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-danger" />
                </div>
                
                <button type="submit" class="btn btn-light btn-block waves-effect waves-light">Sign Up</button>
            </form>
        </div>
    </div>
    <div class="card-footer text-center py-3">
        <p class="text-warning mb-0">Sudah punya akun? <a href="{{ route('login') }}"> Login di sini</a></p>
    </div>
</x-guest-layout>