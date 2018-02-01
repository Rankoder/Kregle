<?php
include "../common_parts/header.php";
?>
        <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
            <main role="main" class="inner cover">
            <h1 class="cover-heading">Twój wynik: <?php
               
                    echo $_COOKIE["mycookie"]
                
                ?>
            </h1>
           
            <p class="lead">
                <a href="../main-page.php" class="btn btn-lg btn-secondary">Zagraj jeszcze raz</a>
            </p>
            </main>
        </div>
<?php      
include "../common_parts/footer.php";
?>