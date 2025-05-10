<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MADJUO-HRIS</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap');

        body {
            margin: 0;
            font-family: 'Orbitron', sans-serif;
            background: linear-gradient(135deg, #0066FF, #0038A3);
            color: #FFFFFF;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            overflow-x: hidden;
        }

        header {
            text-align: center;
            padding: 20px;
            background: rgba(0, 0, 0, 0.5);
            animation: fadeIn 2s ease-in-out;
        }

        header img {
            width: 150px;
            margin-bottom: 20px;
        }

        header h1 {
            font-size: 3rem;
            text-shadow: 0 0 10px #0066FF;
        }

        header p {
            font-size: 1.2rem;
            color: #FF7A00;
        }

        main {
            flex: 1;
            padding: 20px;
            text-align: center;
        }

        .hero {
            text-align: center;
            padding: 20px;
            animation: fadeIn 3s ease-in-out;
        }

        .hero h2 {
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 1rem;
            margin-bottom: 30px;
        }

        .details {
            margin-top: 20px;
            font-size: 1rem;
            color: #FFFFFF;
            line-height: 1.5;
            text-align: center;
        }

        .buttons {
            margin-top: 20px;
        }

        .button {
            background: #FF7A00;
            color: #FFFFFF;
            border: none;
            padding: 15px 30px;
            margin: 10px;
            font-size: 1rem;
            cursor: pointer;
            border-radius: 5px;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .button:hover {
            background: #FFFFFF;
            color: #FF7A00;
            box-shadow: 0 0 15px #FF7A00;
        }

        .button-outline {
            background: transparent;
            border: 2px solid #0066FF;
            color: #0066FF;
        }

        .button-outline:hover {
            background: #0066FF;
            color: #FFFFFF;
            box-shadow: 0 0 15px #0066FF;
        }

        footer {
            text-align: center;
            padding: 10px;
            background: rgba(0, 0, 0, 0.5);
            color: #FFFFFF;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
    </style>
</head>
<body>
    <header>
        <img src="{{ asset('images/logo.png') }}" alt="MADJUO Logo">
        <h1>Selamat Datang di MADJUO-HRIS</h1>
        <p>Tingkatkan Produktivitas Tim dengan HRIS Gamifikasi Seperti Bermain Game!</p>
    </header>

    <main>
        <div class="hero">
            <h2>Fitur Unggulan</h2>
            <p>Gamifikasi, AI Recruitment, dan Dashboard Interaktif untuk pengalaman HR yang lebih baik.</p>

            <div class="details">
                <p>Dengan MADJUO-HRIS, Anda dapat mengelola tim dengan lebih efisien melalui fitur-fitur canggih seperti:</p>
                <ul>
                    <li>Gamifikasi untuk meningkatkan motivasi karyawan.</li>
                    <li>AI Recruitment untuk proses rekrutmen yang lebih cepat dan akurat.</li>
                    <li>Dashboard interaktif untuk analisis data yang mendalam.</li>
                </ul>
            </div>

            <div class="buttons">
                <a href="{{ url('/madjuo360') }}" class="button">Ke MADJUO360</a>
                <a href="{{ url('/login') }}" class="button button-outline">Login</a>
            </div>
        </div>
    </main>

    <footer>
        &copy; 2025 MADJUO-HRIS. Semua Hak Dilindungi.
    </footer>
</body>
</html>
