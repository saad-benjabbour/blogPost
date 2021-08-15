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

<div class="container">
    <h2 class="title title_margin">Create Post</h2>
    <form action="<?php echo URLROOT; ?>/posts/create" method="POST">
        <div class="form-group">
            <label>Title</label>
            <input type="text" class="form-control" name="title" aria-describedby="emailHelp" placeholder="What's the title">
            <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
        </div>
        <div class="form-group">
            <label>What's on your mind</label>
            <textarea type="text" class="form-control" name="body" placeholder="Write here..." rows="4"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
<?php
    require_once APPROOT . '/views/includes/footer.php';
?>
