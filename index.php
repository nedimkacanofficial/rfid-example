<?php
$cardId = $_POST['cardId'] ?? "";
$fullname = $_POST['fullname'] ?? "";
$role = $_POST['role'] ?? "";
$balance = $_POST['balance'] ?? "";
$mesaj = "";

if(isset($_POST['okut'])){
   $mesaj = "Kartı okutun ve bilgileri doldurun.";
}

if(isset($_POST['kaydet'])){
   require 'db.php';

   $stmt = $pdo->prepare("SELECT * FROM cards WHERE card_id = ?");
   $stmt->execute([$cardId]);
   $card = $stmt->fetch();

   if($card){
      $mesaj = "❌ Bu kart zaten kayıtlı!";
   } else {
      $stmt = $pdo->prepare("INSERT INTO cards (card_id, fullname, role, balance) VALUES (?, ?, ?, ?)");
      $stmt->execute([$cardId, $fullname, $role, $balance]);
      $mesaj = "✅ Kart kaydedildi.";
      $cardId = $fullname = $role = $balance = "";
   }
}

if(isset($_POST['iptal'])){
   $cardId = $fullname = $role = $balance = "";
}
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">
    <div class="row justify-content-center mt-5">
        <div class="col-md-4" style="background-color: #f7f5a6; padding: 20px; border-radius: 10px;"> <!-- Inline CSS ile arka plan rengi ve diğer stil ayarları -->
            <h2>Kart Tanımlama Ekranı</h2>
            <?php if($mesaj): ?>
            <div class="alert alert-info mt-3"><?php echo $mesaj; ?></div>
            <?php endif; ?>

            <form method="post">
            <div class="mb-3">
                <label>Kart ID</label>
                <input type="text" name="cardId" class="form-control" value="<?php echo htmlspecialchars($cardId); ?>" <?php echo $cardId ? 'readonly' : 'autofocus'; ?> required oninput="setTimeout(()=>document.getElementById('fullname').focus(),500)">
            </div>
            <div class="mb-3">
                <label>Ad Soyad</label>
                <input type="text" name="fullname" class="form-control" id="fullname" value="<?php echo htmlspecialchars($fullname); ?>" required>
            </div>
            <div class="mb-3">
                <label>Durum (Öğrenci / Personel / Vatandaş)</label>
                <input type="text" name="role" class="form-control" value="<?php echo htmlspecialchars($role); ?>" required>
            </div>
            <div class="mb-3">
                <label>Bakiye</label>
                <input type="number" step="0.01" name="balance" class="form-control" value="<?php echo htmlspecialchars($balance); ?>" required>
            </div>
            <?php if(!$cardId): ?>
                <button type="submit" name="okut" class="btn btn-primary">Kart Okut</button>
            <?php else: ?>
                <button type="submit" name="kaydet" class="btn btn-success">Kaydet</button>
                <button type="submit" name="iptal" class="btn btn-danger">Kart Değiştir</button>
            <?php endif; ?>
            </form>
        </div>
    </div>
</div>
