@extends('layouts.app')

@section('title', 'Regisztráció - Book & Film Webshop')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
        <div class="card">
            <div class="card-body p-5">
                <div class="text-center mb-4">
                    <i class="fas fa-user-plus fa-3x text-primary mb-3"></i>
                    <h2 class="fw-bold">Regisztráció</h2>
                    <p class="text-muted">Csatlakozz hozzánk és fedezd fel a tartalmainkat!</p>
                </div>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label fw-semibold">
                            <i class="fas fa-user me-1"></i>Teljes név *
                        </label>
                        <input type="text" 
                               class="form-control @error('name') is-invalid @enderror" 
                               id="name" 
                               name="name" 
                               value="{{ old('name') }}" 
                               required 
                               autofocus>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold">
                            <i class="fas fa-envelope me-1"></i>E-mail cím *
                        </label>
                        <input type="email" 
                               class="form-control @error('email') is-invalid @enderror" 
                               id="email" 
                               name="email" 
                               value="{{ old('email') }}" 
                               required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="password" class="form-label fw-semibold">
                                <i class="fas fa-lock me-1"></i>Jelszó *
                            </label>
                            <input type="password" 
                                   class="form-control @error('password') is-invalid @enderror" 
                                   id="password" 
                                   name="password" 
                                   required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="password_confirmation" class="form-label fw-semibold">
                                <i class="fas fa-lock me-1"></i>Jelszó megerősítése *
                            </label>
                            <input type="password" 
                                   class="form-control" 
                                   id="password_confirmation" 
                                   name="password_confirmation" 
                                   required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label fw-semibold">
                            <i class="fas fa-phone me-1"></i>Telefonszám
                        </label>
                        <input type="tel" 
                               class="form-control @error('phone') is-invalid @enderror" 
                               id="phone" 
                               name="phone" 
                               value="{{ old('phone') }}">
                        @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label fw-semibold">
                            <i class="fas fa-map-marker-alt me-1"></i>Cím
                        </label>
                        <input type="text" 
                               class="form-control @error('address') is-invalid @enderror" 
                               id="address" 
                               name="address" 
                               value="{{ old('address') }}">
                        @error('address')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-8 mb-3">
                            <label for="city" class="form-label fw-semibold">Város</label>
                            <input type="text" 
                                   class="form-control @error('city') is-invalid @enderror" 
                                   id="city" 
                                   name="city" 
                                   value="{{ old('city') }}">
                            @error('city')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="postal_code" class="form-label fw-semibold">Irányítószám</label>
                            <input type="text" 
                                   class="form-control @error('postal_code') is-invalid @enderror" 
                                   id="postal_code" 
                                   name="postal_code" 
                                   value="{{ old('postal_code') }}">
                            @error('postal_code')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="birth_date" class="form-label fw-semibold">
                            <i class="fas fa-calendar me-1"></i>Születési dátum
                        </label>
                        <input type="date" 
                               class="form-control @error('birth_date') is-invalid @enderror" 
                               id="birth_date" 
                               name="birth_date" 
                               value="{{ old('birth_date') }}">
                        @error('birth_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-check mb-3">
                        <input class="form-check-input" 
                               type="checkbox" 
                               id="newsletter_subscription" 
                               name="newsletter_subscription"
                               {{ old('newsletter_subscription') ? 'checked' : '' }}>
                        <label class="form-check-label" for="newsletter_subscription">
                            Feliratkozom a hírlevelekre
                        </label>
                    </div>

                    <div class="form-check mb-4">
                        <input class="form-check-input @error('terms') is-invalid @enderror" 
                               type="checkbox" 
                               id="terms" 
                               name="terms" 
                               required>
                        <label class="form-check-label" for="terms">
                            Elfogadom az <a href="#" class="text-decoration-none">Általános Szerződési Feltételeket</a> *
                        </label>
                        @error('terms')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="fas fa-user-check me-2"></i>Regisztráció
                        </button>
                    </div>

                    <div class="text-center mt-4">
                        <p class="mb-0">Már van fiókod? 
                            <a href="{{ route('login') }}" class="text-decoration-none fw-semibold">
                                Jelentkezz be itt
                            </a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection