<?php
require_once APPROOT . '/views/includes/head_.php';
?>
<?php
require_once APPROOT . '/views/includes/header__.php';
?>
<div class="navbar dark">
    <?php
        require_once APPROOT . '/views/includes/navigation.php';
    ?>
</div>

<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">
            <?php echo $data['post']->title; ?>
        </h1>
        <p class="lead text-muted">
            <?php echo $data['post']->text; ?>
        </p>
        <p>
            <a href="<?php echo URLROOT;?>/posts/home" class="btn btn-primary my-2">Go back</a>
        </p>
    </div>
</section>

<?php
    require_once APPROOT . '/views/includes/footer.php';
?>

