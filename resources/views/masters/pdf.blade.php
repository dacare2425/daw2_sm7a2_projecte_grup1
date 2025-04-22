<!DOCTYPE html>
<html>
<head>
    <title>Detalls del Master - {{ $master->nom }}</title>
    <style>
        body { font-family: Arial, sans-serif; color: #333; }
        h1 { color: #000; border-bottom: 1px solid #ddd; padding-bottom: 10px; }
        .detail { margin-bottom: 8px; }
        .label { font-weight: bold; color: #555; }
        .footer { margin-top: 30px; font-size: 12px; color: #777; }
    </style>
</head>
<body>
    <h1>{{ $master->nom }}</h1>
    
    <div class="detail">
        <span class="label">Hores:</span> {{ $master->hores }}
    </div>
    <div class="detail">
        <span class="label">Director:</span> {{ $master->director }}
    </div>
    <div class="detail">
        <span class="label">Creat el:</span> {{ $master->created_at->format('d/m/Y H:i') }}
    </div>
    <div class="detail">
        <span class="label">Actualitzat el:</span> {{ $master->updated_at->format('d/m/Y H:i') }}
    </div>
    
    <div class="footer">
        Document generat el {{ now()->format('d/m/Y H:i') }} per {{ auth()->user()->name }}
    </div>
</body>
</html>