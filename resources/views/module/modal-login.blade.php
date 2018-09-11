<!-- Modal -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="login">Silahkan Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="brand-budayaku brand-md color-budayaku text-center mb-4"><a href="{{ route('homepage') }}">Budayaku</a></div>
                <form method="POST" id="input-login" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                    @csrf @if ($errors->all())
                    <div class="form-group">
                            <div class="alert alert-warning alert-dismissable">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                <small>Username atau password yang kamu masukkan salah.</small>
                            </div>
                    </div>
                    @endif

                    <div class="form-group">
                        <input type="text" id="username" name="email" class="form-control" placeholder="Email/Username" value="{{ old('email') }}"
                            required autofocus>
                    </div>
                    <div class="form-group">
                        <input type="password" id="pass" name="password" class="form-control" placeholder="Password" required>
                    </div>
                    <a href="#"><small>Lupa Password?</small></a>

                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-login">Login</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer bg-light">
                <a href="{{ route('register') }}"><small>Belum punya akun?</small></a>
            </div>
        </div>
    </div>
</div>

<!-- end modal -->

@if (($errors->first('email') || $errors->first('password')) && Route::current()->getName() != 'login')
 @if(Route::current()->getName() == 'register')

    @else
    <script>
        $( document ).ready(function() {
                $('#login').modal('show');
            });
    </script>
    @endif
@endif