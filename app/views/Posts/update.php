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
    <h2 class="title title_margin">Update Post</h2>
    <form action="<?php echo URLROOT; ?>/posts/update/<?php echo $data['id']; ?>" method="POST">
        <div class="form-group">
            <label>Title</label>
            <input type="text" class="form-control" name="title" aria-describedby="emailHelp" placeholder="What's the title"
                   value="<?php echo $data['title']; ?>">
            <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
        </div>
        <div class="form-group">
            <label>What's on your mind</label>
            <textarea type="text" class="form-control" name="body" placeholder="Write here..." rows="4">
                <?php echo $data['body']; ?>
            </textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<?php
    require_once APPROOT . '/views/includes/footer.php';
?>

