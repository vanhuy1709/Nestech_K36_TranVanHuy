<!DOCTYPE html>
<html lang="vi">
<head> 
    <meta charset="utf-8" />
    <title>- <?php echo htmlspecialchars($titlePage); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?= PUBLIC_URL ?>/css/style.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <header class="bg-success text-white py-3">
            <?php include "header.php"; ?>
        </header>
        
        <nav class="bg-warning">
            <?php include "menu.php"; ?>
        </nav>
        
        <main class="row my-4">
            <article class="col-lg-9 col-md-8 mb-4">
                <?php include $view; ?>
            </article>
            <aside class="col-lg-3 col-md-4 mb-4">
                <?php include "aside.php"; ?>
            </aside>
        </main>
        
        <footer class="bg-dark text-white text-center py-3">
            <?php include "footer.php"; ?>
        </footer>
    </div> 
    

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
