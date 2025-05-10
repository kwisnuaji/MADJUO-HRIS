<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Madjuo HRIS</title>
    <link rel="icon" type="image/png" href="/images/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&family=Rajdhani:wght@300;500;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --neon-blue: #00f3ff;
            --neon-orange: #ff7b00;
            --dark-blue: #030b1a;
            --cyber-blue: #073252;
            --cyber-dark: #041325;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Rajdhani', 'Orbitron', sans-serif;
        }

        @keyframes scanline {
            0% {
                transform: translateY(-100%);
            }

            100% {
                transform: translateY(100%);
            }
        }

        @keyframes flicker {

            0%,
            19.999%,
            22%,
            62.999%,
            64%,
            64.999%,
            70%,
            100% {
                opacity: 0.99;
            }

            20%,
            21.999%,
            63%,
            63.999%,
            65%,
            69.999% {
                opacity: 0.4;
            }
        }

        @keyframes glitch {
            0% {
                clip-path: polygon(0 2%, 100% 2%, 100% 5%, 0 5%);
                transform: translate(20px);
            }

            20% {
                clip-path: polygon(0 15%, 100% 15%, 100% 15%, 0 15%);
                transform: translate(-20px);
            }

            30% {
                clip-path: polygon(0 10%, 100% 10%, 100% 20%, 0 20%);
                transform: translate(15px);
            }

            40% {
                clip-path: polygon(0 1%, 100% 1%, 100% 2%, 0 2%);
                transform: translate(-15px);
            }

            50% {
                clip-path: polygon(0 33%, 100% 33%, 100% 33%, 0 33%);
                transform: translate(0);
            }

            55% {
                clip-path: polygon(0 44%, 100% 44%, 100% 44%, 0 44%);
                transform: translate(10px);
            }

            60% {
                clip-path: polygon(0 50%, 100% 50%, 100% 20%, 0 20%);
                transform: translate(-10px);
            }

            65% {
                clip-path: polygon(0 70%, 100% 70%, 100% 70%, 0 70%);
                transform: translate(15px);
            }

            70% {
                clip-path: polygon(0 80%, 100% 80%, 100% 80%, 0 80%);
                transform: translate(-15px);
            }

            80% {
                clip-path: polygon(0 50%, 100% 50%, 100% 55%, 0 55%);
                transform: translate(20px);
            }

            85% {
                clip-path: polygon(0 60%, 100% 60%, 100% 65%, 0 65%);
                transform: translate(-20px);
            }

            95% {
                clip-path: polygon(0 72%, 100% 72%, 100% 78%, 0 78%);
                transform: translate(0);
            }
        }

        @keyframes flow {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        @keyframes pulse {
            0% {
                opacity: 0.5;
                box-shadow: 0 0 5px var(--neon-blue);
            }

            50% {
                opacity: 1;
                box-shadow: 0 0 15px var(--neon-blue), 0 0 30px var(--neon-blue);
            }

            100% {
                opacity: 0.5;
                box-shadow: 0 0 5px var(--neon-blue);
            }
        }

        @keyframes movingLines {
            0% {
                transform: translateX(-100%);
            }

            100% {
                transform: translateX(100%);
            }
        }

        body {
            background: var(--dark-blue);
            color: white;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            position: relative;
        }

        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background:
                radial-gradient(circle at 50% 50%, rgba(3, 11, 26, 0.7) 0%, rgba(3, 11, 26, 0.95) 100%),
                url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='rgba(0, 243, 255, 0.1)' fill-opacity='0.1' fill-rule='evenodd'/%3E%3C/svg%3E");
            z-index: -2;
        }

        .grid {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background:
                linear-gradient(var(--neon-blue), transparent 1px) 0 0 / 40px 40px,
                linear-gradient(90deg, var(--neon-blue), transparent 1px) 0 0 / 40px 40px;
            opacity: 0.05;
            z-index: -1;
            transform: perspective(500px) rotateX(60deg);
            transform-origin: center top;
        }

        .scanline {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: rgba(255, 255, 255, 0.2);
            z-index: 100;
            animation: scanline 4s linear infinite;
            opacity: 0.3;
        }

        .crt-flicker {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: transparent;
            opacity: 0.1;
            z-index: 99;
            pointer-events: none;
            animation: flicker 0.15s infinite;
        }

        .container {
            position: relative;
            width: 450px;
            min-height: 520px;
            background: rgba(7, 50, 82, 0.3);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(0, 243, 255, 0.3);
            padding: 20px;
            z-index: 1;
            overflow: hidden;
        }

        .frame-line {
            position: absolute;
            background: linear-gradient(90deg, transparent, var(--neon-blue), transparent);
            z-index: 2;
        }

        .frame-line.horizontal {
            height: 1px;
            width: 100%;
            left: 0;
        }

        .frame-line.top {
            top: 0;
        }

        .frame-line.bottom {
            bottom: 0;
        }

        .frame-line.vertical {
            width: 1px;
            height: 100%;
            top: 0;
        }

        .frame-line.left {
            left: 0;
        }

        .frame-line.right {
            right: 0;
        }

        .moving-line {
            position: absolute;
            height: 1px;
            width: 50%;
            background: linear-gradient(90deg, transparent, var(--neon-blue), transparent);
            opacity: 0.7;
            z-index: 3;
        }

        .moving-line.top {
            top: 30px;
            animation: movingLines 3s linear infinite;
        }

        .moving-line.middle {
            top: 50%;
            animation: movingLines 4s linear infinite reverse;
        }

        .moving-line.bottom {
            bottom: 30px;
            animation: movingLines 4s linear infinite;
        }

        .corner {
            position: absolute;
            width: 20px;
            height: 20px;
            z-index: 4;
        }

        .corner.top-left {
            top: -1px;
            left: -1px;
            border-top: 2px solid var(--neon-orange);
            border-left: 2px solid var(--neon-orange);
            animation: pulse 3s infinite;
        }

        .corner.top-right {
            top: -1px;
            right: -1px;
            border-top: 2px solid var(--neon-orange);
            border-right: 2px solid var(--neon-orange);
            animation: pulse 3s infinite 0.5s;
        }

        .corner.bottom-left {
            bottom: -1px;
            left: -1px;
            border-bottom: 2px solid var(--neon-orange);
            border-left: 2px solid var(--neon-orange);
            animation: pulse 3s infinite 1s;
        }

        .corner.bottom-right {
            bottom: -1px;
            right: -1px;
            border-bottom: 2px solid var(--neon-orange);
            border-right: 2px solid var(--neon-orange);
            animation: pulse 3s infinite 1.5s;
        }

        .login-content {
            position: relative;
            z-index: 10;
            padding: 30px 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .glitch-title {
            font-size: 2.5rem;
            color: white;
            text-shadow:
                0 0 5px var(--neon-blue),
                0 0 10px var(--neon-blue),
                0 0 20px var(--neon-blue);
            position: relative;
            margin-bottom: 50px;
            letter-spacing: 3px;
            text-transform: uppercase;
        }

        .glitch-title::before,
        .glitch-title::after {
            content: "LOGIN";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0.8;
        }

        .glitch-title::before {
            color: #ff00ff;
            z-index: -1;
            animation: glitch 3s infinite;
        }

        .glitch-title::after {
            color: #00ffff;
            z-index: -2;
            animation: glitch 2s infinite reverse;
        }

        .input-container {
            position: relative;
            width: 100%;
            margin-bottom: 25px;
            padding: 8px 0;
            /* Polygonal neon frame using SVG background */
            background: url('data:image/svg+xml;utf8,<svg width="100%25" height="100%25" viewBox="0 0 400 56" xmlns="http://www.w3.org/2000/svg"><polygon points="8,2 392,2 398,10 398,46 392,54 8,54 2,46 2,10" fill="none" stroke="%2300f3ff" stroke-width="4"/><polyline points="8,2 392,2 398,10" fill="none" stroke="%23ff7b00" stroke-width="4"/><polyline points="392,54 8,54 2,46" fill="none" stroke="%23ff7b00" stroke-width="4"/></svg>');
            background-size: 100% 100%;
            background-repeat: no-repeat;
            min-height: 56px;
            box-shadow: 0 0 16px 2px #00f3ff55;
            border-radius: 10px;
        }

        .cyber-input {
            width: 92%;
            padding: 14px 18px 8px 18px;
            background: transparent;
            border: none;
            color: #fff;
            font-size: 18px;
            outline: none;
            letter-spacing: 1px;
            box-shadow: none;
            position: relative;
            z-index: 2;
        }

        .cyber-input:focus {
            color: #00f3ff;
        }

        .input-label {
            position: absolute;
            left: 24px;
            top: 50%;
            transform: translateY(-50%);
            color: #00f3ff;
            font-size: 14px;
            background: rgba(3, 11, 26, 0.7);
            padding: 0 6px;
            pointer-events: none;
            transition: all 0.3s cubic-bezier(.4, 2, .6, 1);
            z-index: 3;
        }

        .cyber-input:focus~.input-label,
        .cyber-input:not(:placeholder-shown)~.input-label {
            top: -12px;
            left: 18px;
            font-size: 12px;
            color: #ff7b00;
            background: #030b1a;
            padding: 0 8px;
        }

        .cyber-button {
            width: 100%;
            padding: 12px;
            margin-top: 10px;
            background: linear-gradient(45deg, var(--neon-orange), #ff5e00);
            border: none;
            color: white;
            font-size: 18px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 2px;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(255, 123, 0, 0.5);
            transition: all 0.3s ease;
        }

        .cyber-button:hover {
            background: linear-gradient(45deg, #ff5e00, var(--neon-orange));
            box-shadow: 0 0 20px rgba(255, 123, 0, 0.7);
            transform: translateY(-2px);
        }

        .cyber-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
            transition: all 0.5s;
        }

        .cyber-button:hover::before {
            left: 100%;
        }

        .options {
            display: flex;
            width: 100%;
            justify-content: space-between;
            margin-top: 20px;
        }

        .option-link {
            color: var(--neon-blue);
            text-decoration: none;
            font-size: 14px;
            position: relative;
            transition: all 0.3s ease;
        }

        .option-link:hover {
            color: var(--neon-orange);
            text-shadow: 0 0 5px rgba(255, 123, 0, 0.5);
        }

        .option-link::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 1px;
            background: var(--neon-orange);
            transition: width 0.3s ease;
        }

        .option-link:hover::after {
            width: 100%;
        }

        .circuit-container {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 1;
        }

        .circuit {
            position: absolute;
            background: var(--neon-blue);
            opacity: 0.2;
        }

        .circuit.h1 {
            top: 15%;
            left: -5%;
            width: 30%;
            height: 1px;
        }

        .circuit.h2 {
            top: 35%;
            right: -5%;
            width: 25%;
            height: 1px;
        }

        .circuit.h3 {
            bottom: 25%;
            left: -5%;
            width: 35%;
            height: 1px;
        }

        .circuit.v1 {
            top: -5%;
            left: 15%;
            width: 1px;
            height: 25%;
        }

        .circuit.v2 {
            top: 30%;
            right: 25%;
            width: 1px;
            height: 40%;
        }

        .circuit.v3 {
            bottom: -5%;
            right: 40%;
            width: 1px;
            height: 30%;
        }

        .node {
            position: absolute;
            border-radius: 50%;
            background: var(--neon-orange);
            box-shadow: 0 0 10px var(--neon-orange);
            z-index: 2;
        }

        .node.blue {
            background: var(--neon-blue);
            box-shadow: 0 0 10px var(--neon-blue);
        }

        .node.small {
            width: 6px;
            height: 6px;
        }

        .node.large {
            width: 20px;
            height: 20px;
            animation: pulse 4s ease-in-out infinite;
        }

        .node:nth-child(1) {
            top: 15%;
            left: 15%;
        }

        .node:nth-child(2) {
            top: 35%;
            right: 25%;
        }

        .node:nth-child(3) {
            bottom: 25%;
            left: 15%;
        }

        .node.blue:nth-child(4) {
            top: 15%;
            right: 15%;
        }

        .node.blue:nth-child(5) {
            bottom: 15%;
            right: 15%;
        }

        .node.large:nth-child(6) {
            top: 45%;
            left: 10%;
        }

        .node.blue.large:nth-child(7) {
            bottom: 45%;
            right: 10%;
        }

        .loading-bar {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            width: 80%;
            height: 3px;
            background: rgba(255, 255, 255, 0.1);
            overflow: hidden;
        }

        .loading-progress {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            background: linear-gradient(90deg, var(--neon-blue), var(--neon-orange));
            animation: flow 3s linear infinite;
            background-size: 200% 100%;
            width: 100%;
        }

        .binary-stream {
            position: absolute;
            color: var(--neon-blue);
            font-family: monospace;
            font-size: 10px;
            opacity: 0.2;
            overflow: hidden;
            width: 30px;
        }

        .binary-stream:nth-child(1) {
            top: 10%;
            left: 5%;
            height: 300px;
        }

        .binary-stream:nth-child(2) {
            top: 5%;
            right: 10%;
            height: 200px;
        }

        .binary-stream:nth-child(3) {
            bottom: 15%;
            left: 15%;
            height: 250px;
        }

        .binary-stream:nth-child(4) {
            bottom: 10%;
            right: 5%;
            height: 350px;
        }

        .data-flow {
            position: absolute;
            height: 2px;
            width: 50px;
            background: linear-gradient(90deg, transparent, var(--neon-orange), transparent);
            opacity: 0.7;
            animation: movingLines 3s linear infinite;
        }

        .data-flow:nth-child(1) {
            top: 20%;
            left: 10%;
            width: 100px;
        }

        .data-flow:nth-child(2) {
            top: 40%;
            right: 15%;
            width: 70px;
            animation-delay: 1s;
        }

        .data-flow:nth-child(3) {
            bottom: 30%;
            left: 20%;
            width: 80px;
            animation-delay: 2s;
        }

        .data-flow:nth-child(4) {
            bottom: 60%;
            right: 25%;
            width: 120px;
            animation-delay: 0.5s;
        }

        .status-indicator {
            position: absolute;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: var(--neon-blue);
            box-shadow: 0 0 5px var(--neon-blue);
            animation: pulse 2s infinite;
        }

        .status-indicator:nth-child(1) {
            top: 20px;
            right: 20px;
            animation-delay: 0s;
        }

        .status-indicator:nth-child(2) {
            top: 20px;
            right: 35px;
            animation-delay: 0.5s;
        }

        .status-indicator:nth-child(3) {
            top: 20px;
            right: 50px;
            animation-delay: 1s;
        }

        /* Gaya baru untuk speaker button cyberpunk */
        .speaker-btn {
            position: absolute;
            top: 30px;
            right: 30px;
            width: 36px;
            height: 36px;
            background: rgba(0, 243, 255, 0.1);
            border: 1px solid var(--neon-blue);
            border-radius: 50%;
            color: var(--neon-blue);
            font-size: 16px;
            cursor: pointer;
            z-index: 100;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            box-shadow: 0 0 8px rgba(0, 243, 255, 0.3);
        }

        .speaker-btn:hover {
            background: rgba(0, 243, 255, 0.2);
            box-shadow: 0 0 15px var(--neon-blue);
            transform: scale(1.1);
        }

        .speaker-btn.muted {
            color: #666;
            border-color: #666;
            box-shadow: 0 0 8px rgba(255, 255, 255, 0.1);
        }

        .speaker-btn::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            border: 1px solid var(--neon-blue);
            animation: pulse 2s infinite;
            opacity: 0;
        }

        .speaker-btn:hover::after {
            opacity: 0.7;
        }

        .speaker-btn.muted::after {
            display: none;
        }
    </style>
</head>

<body onload="playLoginSound()">
    <!-- Audio element untuk fallback -->
    <audio id="loginEnterSound" src="/sounds/login.mp3" preload="auto"></audio>
    
   
    <div class="scanline"></div>
    <div class="crt-flicker"></div>
    <div class="grid"></div>

    <div class="binary-stream">101010110110101101001101010101011010</div>
    <div class="binary-stream">010101011010101010110110101010101010</div>
    <div class="binary-stream">110101010101011010101010101101010101</div>
    <div class="binary-stream">010101110101010101011010101101010110</div>

   

    <div class="container">
        <!-- Speaker Button -->
        <button class="speaker-btn" id="speakerBtn">
            <i class="fas fa-volume-up"></i>
        </button>
        <!-- Frame lines -->
        <div class="frame-line horizontal top"></div>
        <div class="frame-line horizontal bottom"></div>
        <div class="frame-line vertical left"></div>
        <div class="frame-line vertical right"></div>

        <!-- Corners -->
        <div class="corner top-left"></div>
        <div class="corner top-right"></div>
        <div class="corner bottom-left"></div>
        <div class="corner bottom-right"></div>

        <!-- Moving lines -->
        <div class="moving-line top"></div>
        <div class="moving-line middle"></div>
        <div class="moving-line bottom"></div>

        <!-- Circuit elements -->
        <div class="circuit-container">
            <div class="circuit h1"></div>
            <div class="circuit h2"></div>
            <div class="circuit h3"></div>
            <div class="circuit v1"></div>
            <div class="circuit v2"></div>
            <div class="circuit v3"></div>

            <div class="node small"></div>
            <div class="node small"></div>
            <div class="node small"></div>
            <div class="node blue small"></div>
            <div class="node blue small"></div>
            <div class="node large"></div>
            <div class="node blue large"></div>

            <div class="data-flow"></div>
            <div class="data-flow"></div>
            <div class="data-flow"></div>
            <div class="data-flow"></div>

            <div class="status-indicator"></div>
            <div class="status-indicator"></div>
            <div class="status-indicator"></div>
        </div>

        <div class="login-content">
            <h1 class="glitch-title">LOGIN</h1>

            <div class="input-container">
                <input type="text" class="cyber-input" placeholder=" ">
                <label class="input-label">USERNAME</label>
            </div>

            <div class="input-container">
                <input type="password" class="cyber-input" placeholder=" ">
                <label class="input-label">PASSWORD</label>
            </div>

            <button class="cyber-button">ACCESS</button>

            <div class="options">
                <a href="#" class="option-link">REGISTER</a>
                <a href="#" class="option-link">FORGOT PASSWORD</a>
            </div>
        </div>

        <div class="loading-bar">
            <div class="loading-progress"></div>
        </div>
    </div>
    <script>
        // Variabel global
        let audioContext;
        let audioBuffer;
        let audioSource;
        let audioElement = document.getElementById('loginEnterSound');
        let isPlaying = false;
        const startTime = 3; // Mulai dari detik ke-3
        const endTime = 18;  // Berakhir di detik ke-18

        // Fungsi untuk memotong dan memainkan audio
        async function playAudioSegment() {
            try {
                // Hentikan audio yang sedang bermain
                stopAudio();
                
                // Buat audio context jika belum ada
                if (!audioContext) {
                    audioContext = new (window.AudioContext || window.webkitAudioContext)();
                }
                
                // Jika belum ada buffer, muat audio
                if (!audioBuffer) {
                    const response = await fetch(audioElement.src);
                    const arrayBuffer = await response.arrayBuffer();
                    audioBuffer = await audioContext.decodeAudioData(arrayBuffer);
                }
                
                // Buat audio source
                audioSource = audioContext.createBufferSource();
                audioSource.buffer = audioBuffer;
                
                // Buat gain node untuk kontrol volume
                const gainNode = audioContext.createGain();
                gainNode.gain.value = 0.7;
                
                // Hubungkan node
                audioSource.connect(gainNode);
                gainNode.connect(audioContext.destination);
                
                // Mainkan hanya bagian yang diinginkan (3-18 detik)
                audioSource.start(0, startTime, endTime - startTime);
                isPlaying = true;
                
                // Update UI
                document.getElementById('speakerBtn').classList.add('active');
                document.getElementById('speakerBtn').classList.remove('muted');
                document.getElementById('speakerBtn').innerHTML = '<i class="fas fa-volume-up"></i>';
                
                // Ketika audio selesai
                audioSource.onended = () => {
                    isPlaying = false;
                    document.getElementById('speakerBtn').classList.remove('active');
                };
                
            } catch (error) {
                console.error('Error playing audio:', error);
                // Fallback ke audio element HTML5 jika Web Audio API gagal
                fallbackAudio();
            }
        }

        // Fungsi fallback menggunakan audio element biasa
        function fallbackAudio() {
            try {
                audioElement.currentTime = startTime;
                audioElement.volume = 0.7;
                audioElement.play()
                    .then(() => {
                        isPlaying = true;
                        // Set timeout untuk menghentikan di endTime
                        setTimeout(() => {
                            audioElement.pause();
                            isPlaying = false;
                            document.getElementById('speakerBtn').classList.remove('active');
                        }, (endTime - startTime) * 1000);
                        
                        document.getElementById('speakerBtn').classList.add('active');
                    })
                    .catch(e => {
                        console.log('Fallback audio play failed:', e);
                        document.getElementById('speakerBtn').classList.add('muted');
                    });
            } catch (error) {
                console.error('Fallback audio error:', error);
            }
        }

        // Fungsi untuk menghentikan audio
        function stopAudio() {
            if (audioSource) {
                audioSource.stop();
                audioSource = null;
            }
            if (audioElement) {
                audioElement.pause();
            }
            isPlaying = false;
            document.getElementById('speakerBtn').classList.remove('active');
        }

        // Fungsi untuk toggle audio
        function toggleAudio() {
            if (isPlaying) {
                stopAudio();
                document.getElementById('speakerBtn').innerHTML = '<i class="fas fa-volume-mute"></i>';
                document.getElementById('speakerBtn').classList.add('muted');
            } else {
                // Coba gunakan Web Audio API dulu
                if (window.AudioContext || window.webkitAudioContext) {
                    playAudioSegment();
                } else {
                    fallbackAudio();
                }
            }
        }

        // Event listener untuk tombol speaker
        document.getElementById('speakerBtn').addEventListener('click', toggleAudio);

        // Coba mainkan audio saat halaman dimuat
        window.addEventListener('load', () => {
            // Tunggu interaksi user pertama kali
            const enableAudio = () => {
                // Hapus event listeners setelah interaksi pertama
                document.removeEventListener('click', enableAudio);
                document.removeEventListener('keydown', enableAudio);
                
                // Coba mainkan audio
                if (window.AudioContext || window.webkitAudioContext) {
                    audioContext.resume().then(playAudioSegment);
                } else {
                    fallbackAudio();
                }
            };
            
            // Tambahkan event listeners untuk interaksi pertama
            document.addEventListener('click', enableAudio);
            document.addEventListener('keydown', enableAudio);
        });
    </script>
</body>

</html>