<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Contacto</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 2rem;
        }

        .container {
            background: #ffffff;
            border-radius: 16px;
            padding: 2.5rem 2rem;
            width: 100%;
            max-width: 420px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
        }

        h1 { font-size: 1.8rem; font-weight: 700; color: #1a1a2e; margin-bottom: 0.4rem; }
        .subtitle { font-size: 0.9rem; color: #888; margin-bottom: 1.8rem; }
        .form-group { margin-bottom: 1.25rem; }

        label { display: block; font-size: 0.875rem; font-weight: 600; color: #333; margin-bottom: 0.4rem; }

        input[type="email"], textarea {
            width: 100%;
            padding: 0.75rem 1rem;
            font-size: 0.95rem;
            font-family: inherit;
            color: #333;
            background: #fff;
            border: 1.5px solid #d1d5db;
            border-radius: 8px;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
            resize: none;
        }

        input[type="email"]:focus, textarea:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.2);
        }

        .is-invalid { border-color: #e53e3e !important; }
        textarea { min-height: 120px; line-height: 1.5; }
        .field-error { font-size: 0.8rem; color: #e53e3e; margin-top: 0.3rem; }

        .alert-success {
            background: #f0fff4; border: 1px solid #9ae6b4; color: #276749;
            border-radius: 8px; padding: 0.75rem 1rem; font-size: 0.875rem; margin-bottom: 1.25rem;
        }
        .alert-error {
            background: #fff5f5; border: 1px solid #feb2b2; color: #c53030;
            border-radius: 8px; padding: 0.75rem 1rem; font-size: 0.875rem; margin-bottom: 1.25rem;
        }

        button[type="submit"] {
            width: 100%; padding: 0.85rem; font-size: 1rem; font-weight: 600;
            font-family: inherit; color: #fff;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none; border-radius: 8px; cursor: pointer;
            transition: opacity 0.2s, transform 0.15s; margin-top: 0.5rem;
        }
        button[type="submit"]:hover { opacity: 0.92; transform: translateY(-1px); }
        button[type="submit"]:disabled { opacity: 0.6; cursor: not-allowed; transform: none; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Contáctanos</h1>
        <p class="subtitle">Completa el formulario y te responderemos pronto</p>

        @if(session('success'))
            <div class="alert-success">✓ {{ session('success') }}</div>
        @endif

        @if($errors->any())
            <div class="alert-error">Por favor corrige los errores antes de enviar.</div>
        @endif

        <form method="POST" action="{{ route('contact.send') }}">
            @csrf

            <div class="form-group">
                <label for="email">Correo electrónico *</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="tu@email.com"
                    class="{{ $errors->has('email') ? 'is-invalid' : '' }}"
                    required
                >
                @error('email')
                    <div class="field-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="mensaje">Mensaje *</label>
                <textarea
                    id="mensaje"
                    name="mensaje"
                    placeholder="Escribe tu mensaje aquí..."
                    class="{{ $errors->has('mensaje') ? 'is-invalid' : '' }}"
                    required
                >{{ old('mensaje') }}</textarea>
                @error('mensaje')
                    <div class="field-error">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit">Enviar mensaje</button>
        </form>
    </div>

    <script>
        document.querySelector('form').addEventListener('submit', function () {
            const btn = this.querySelector('button[type="submit"]');
            btn.disabled = true;
            btn.textContent = 'Enviando...';
        });
    </script>
</body>
</html>