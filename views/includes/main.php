        <main role="main" class="container min-height">
            <!-- header jumbotron -->
            <!--<div class="row">
                <div class="col-12">
                    <div class="jumbotron">
                        <h1><?php echo $titre; ?></h1>
                    </div>
                </div>
            </div>-->
            <!-- Contenu -->
            <?php if(!empty($messageErreur)){
                include("messageErreur.php");
            }?>
            <?php echo $content; ?>
        </main>