@extends('layouts.app')

@section('content')
<div class="cyber-container">
    <div class="cyber-card">
        <h1 class="glitch-text">VERIFY 2FA</h1>
        
        <form method="POST" action="{{ route('2fa.verify') }}">
            @csrf
            
            <div class="cyber-input-group">
                <input type="text" name="code" 
                       class="cyber-input" 
                       placeholder="Enter 6-digit code"
                       maxlength="6"
                       required autofocus>
                <span class="cyber-highlight"></span>
            </div>

            <button type="submit" class="cyber-button">
                VERIFY
            </button>
        </form>
    </div>
</div>
@endsection