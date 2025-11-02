@extends('layouts.app')

@section('title', 'Bejelentkezés - Book & Film Webshop')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6 col-lg-5">
        <div class="card">
            <div class="card-body p-5">
                <div class="text-center mb-4">
                    <i class="fas fa-sign-in-alt fa-3x text-primary mb-3"></i>
                    <h2 class="fw-bold">Bejelentkezés</h2>
                    <p class="text-muted">Üdvözlünk vissza!</p>
                </div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold">
                            <i class="fas fa-envelope me-1"></i>E-mail cím
                        </label>
                        <input type="email" 
                               class="form-control form-control-lg @error('email') is-invalid @enderror" 
                               id="email" 
                               name="email" 
                               value="{{ old('email') }}" 
                               required 
                               autofocus
                               placeholder="pelda@email.com">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold">
                            <i class="fas fa-lock me-1"></i>Jelszó
                        </label>
                        <input type="password"