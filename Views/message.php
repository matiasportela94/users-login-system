<?php
    if (isset($message) && !empty($message)) {
?>
        <div class="col col-12 alert alert-info alert-dismissible fade show mt-3" role="alert">
            <?php echo $message; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
<?php
    }

?>