<div class="row align-items-center g-4">
    <div class="col-lg">
        <div class="container-tight">
            <div class="text-center mb-4">
                <a href="{{ route('dashboard.index') }}" class="navbar-brand navbar-brand-autodark">
                    <img src="{{ asset('image/logo/brand.svg') }}" width="100" alt="Laravel Livewire">
                </a>
            </div>
            <div class="card card-md">
                <div class="card-body">
                    <h2 class="h2 text-center mb-4">Login to your account</h2>
                    <form wire:submit="login" autocomplete="off">
                        <div class="mb-3">
                            <label class="form-label">Email address</label>
                            <input wire:model="email" type="email"
                                class="form-control @error('email') is-invalid @enderror" placeholder="your@email.com"
                                autocomplete="off">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label class="form-label">
                                Password
                                <span class="form-label-description">
                                    <a href="#">I forgot password</a>
                                </span>
                            </label>
                            <div class="input-group input-group-flat">
                                <input wire:model="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    placeholder="Your password" autocomplete="off">
                                <span class="input-group-text">
                                    <a href="#" class="link-secondary" title="Show password"
                                        data-bs-toggle="tooltip">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                            <path
                                                d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                        </svg>
                                    </a>
                                </span>
                            </div>
                            @error('password')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label class="form-check">
                                <input wire:model="remember" type="checkbox" class="form-check-input" />
                                <span class="form-check-label">Remember me on this device</span>
                            </label>
                        </div>
                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary w-100" wire:loading.attr="disabled">
                                <span wire:loading.remove>Sign in</span>
                                <span wire:loading>Signing in...</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="text-center text-secondary mt-3">
                Don't have account yet? <a href="#" tabindex="-1">Sign up</a>
            </div>
        </div>
    </div>
    <div class="col-lg d-none d-lg-block">
        <img src="./image/static/undraw_secure_login_pdn4.svg" height="300" class="d-block mx-auto" alt="">
    </div>
</div>
