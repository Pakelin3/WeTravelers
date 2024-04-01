<?php
    /*
        * Cancel Order page
    */

    $rootPath = "../";
    include_once('../api/Config/Config.php');
    include('../templates/header.php');
?>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <h4>
                You cancelled the order.
            </h4>
            <br/>
            Return to <a href="<?= $rootPath ?>index.php">home page</a>.
        </div>
        <div class="col-md-4"></div>
    </div>
<?php
    include('../templates/footer.php');
?>