<?php
    include "../common_parts/header.php";
?>
<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <main role="main" class="inner cover">
    <h1 class="cover-heading">Wynik: <?php echo $_COOKIE['wynik']; ?></h1>
    <p class="lead">
        <a href="../main-page.php" class="btn btn-lg btn-secondary">Zagraj ponownie</a>
    </p>
    </main>
</div>
<?php      
    include "../common_parts/footer.php";
?>