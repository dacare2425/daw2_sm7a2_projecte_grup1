<!DOCTYPE html>
<html>
<head>
    <title>Detalls de l'Alumne - {{ $alumne->nom }}</title>
    <style>
        body { font-family: Arial, sans-serif; color: #333; }
        h1 { color: #000; border-bottom: 1px solid #ddd; padding-bottom: 10px; }
        .detail { margin-bottom: 8px; }
        .label { font-weight: bold; color: #555; }
        .footer { margin-top: 30px; font-size: 12px; color: #777; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th { background-color: #f8f9fa; text-align: left; padding: 8px; }
        td { padding: 8px; border-bottom: 1px solid #eee; }
    </style>
</head>
<body>
    <h1>{{ $alumne->nom }}</h1>
    
    <div class="detail">
        <span class="label">Correu:</span> {{ $alumne->correu }}
    </div>
    <div class="detail">
        <span class="label">Adreça:</span> {{ $alumne->adreça }}
    </div>
    <div class="detail">
        <span class="label">Ciutat:</span> {{ $alumne->ciutat }}
    </div>
    <div class="detail">
        <span class="label">País:</span> {{ $alumne->pais }}
    </div>
    <div class="detail">
        <span class="label">Telèfon:</span> {{ $alumne->telefon }}
    </div>
    <div class="detail">
        <span class="label">Master:</span> {{ $alumne->master->nom ?? 'Sense master' }}
    </div>
    
    <div class="footer">
        Document generat el {{ now()->format('d/m/Y H:i') }} per {{ auth()->user()->name }}
    </div>
</body>
</html>