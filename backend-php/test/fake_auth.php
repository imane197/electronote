<?php
session_start();
$_SESSION['user_id'] = 1;
$_SESSION['nom'] = 'Test User';
$_SESSION['email'] = 'test@test.com';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Auth Temporaire</title>
    <style>
        body { font-family: Arial; max-width: 700px; margin: 50px auto; padding: 20px; background: #f5f5f5; }
        .card { background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        h1 { color: #28a745; }
        .info { background: #e7f3ff; padding: 15px; border-left: 4px solid #2196F3; margin: 20px 0; }
        .warning { background: #fff3cd; padding: 15px; border-left: 4px solid #ffc107; margin: 20px 0; }
        a { display: inline-block; background: #007bff; color: white; padding: 10px 20px; text-decoration: none; border-radius: 4px; margin: 5px; }
        a:hover { background: #0056b3; }
    </style>
</head>
<body>
    <div class="card">
        <h1>✅ Authentification Temporaire Activée</h1>
        
        <div class="info">
            <strong>Session utilisateur créée :</strong><br>
            • ID: <?php echo $_SESSION['user_id']; ?><br>
            • Nom: <?php echo $_SESSION['nom']; ?><br>
            • Email: <?php echo $_SESSION['email']; ?>
        </div>
        
        <div class="warning">
            <strong>⚠️ TEMPORAIRE :</strong> Sera remplacé par l'auth de Personne C
        </div>
        
        <h3>🧪 Tester les routes :</h3>
        <a href="../index.php?route=components">📦 Tous les composants</a>
        <a href="../index.php?route=my-project">🛠️ Mon projet</a>
        
        <h3>📝 Instructions Postman :</h3>
        <div class="info">
            1. Active cette page d'abord<br>
            2. Dans Postman : Settings → Cookies → Activer<br>
            3. Teste POST et DELETE
        </div>
    </div>
</body>
</html>
```

