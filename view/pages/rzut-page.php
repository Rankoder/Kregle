<?php
    include "../common_parts/header.php";
?>
<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <main role="main" class="inner cover">
        <h1 class="cover-heading">Runda: <?php echo $_COOKIE['runda'] ?></h1>
        <p class="lead">Wykonaj rzut</p>
        <p class="lead">
            <a href="../../kregleModel.php" class="btn btn-lg btn-secondary">
                <?php include 'button.php'; ?>
            </a>
        </p>
    </main>
</div>
<?php      
    include "../common_parts/footer.php";
?>