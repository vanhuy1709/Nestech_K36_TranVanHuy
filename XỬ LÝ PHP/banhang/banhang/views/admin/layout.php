<head>
    <meta charset="utf8" />
    <title> <?php echo $tittlePage?> </title>
    <link href="<?=PUBLIC_URL?>css/admin.css" rel="stylesheet">
</head>
<body>
    <div id="container">
        <header>    
            <b id="userinfo">
                <?php if(isset($_SESSION['hoten'])) echo "Chào". $_SESSION['hoten'];?>
            </b>
        </header>
        <nav>
            <?php include 'menu.php'; ?>
        </nav>

        <main> <article><?php include $viewnoidung ?></article> </main>
    </div>
</body>