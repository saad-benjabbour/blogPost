<?php
    require_once APPROOT . '/views/includes/head_.php'; // style.css
    // echo APPROOT . '/views/includes/head.php';
?>
<?php
require_once APPROOT . '/views/includes/header__.php'; // style.css
// echo APPROOT . '/views/includes/head.php';
?>
<div class="navbar dark">
    <?php
        require_once APPROOT . '/views/includes/navigation.php';
        // echo APPROOT . '/views/includes/navigation.php';
    ?>
</div>

<main role="main">
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Welcome<?php echo " " . $_SESSION['username']; ?></h>
            <p class="lead text-muted">You can view all of the available posts Right here</p>
            <!-- here we should add the create button but only if he is logged in -->
                <?php if(isLoggedIn()): ?>
                    <p>
                        <a href="<?php echo URLROOT; ?>/posts/create" class="btn btn-primary my-2">Create Post</a>
                    </p>
                <?php endif; ?>
        </div>
    </section>
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                <?php foreach($data['availablePosts'] as $post): ?>
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <img src="data:image/jpeg;base64,/9j
                                 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"
                                 alt="post_picture">
                            <div class="card-body">
                                <?php
                                echo "<h2 class=\"title\">$post->title</h2>";
                                $lines = explode("\n", $post->text);
                                ?>
                                <p class="card-text">
                                    <?php
                                    if(count($lines) == 1 or
                                        count($lines) == 2) { ?>
                                        <?php foreach($lines as $line) { ?>
                                            <?php echo $line; ?>
                                        <?php } ?>
                                    <?php }else { ?>
                                        <?php echo $lines[0]; ?>
                                        <?php echo $lines[1]; ?>
                                        <?php echo $lines[2]; ?>
                                    <?php } ?>
                                </p>
                                <!-- the footer of the card -->
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <!-- the logged in user can view the post even if he didn't create them -->
                                        <div>
                                            <a class="btn btn-sm btn-outline-secondary"
                                               href="<?php echo URLROOT . "/posts/details/" . $post->id ?>">
                                                View
                                            </a>
                                        </div>
                                        <?php if(isset($_SESSION['user_id']) && $_SESSION['user_id'] == $post->user_id): ?>
                                            <div>
                                                <a class="btn btn-sm btn-outline-secondary"
                                                   href="<?php echo URLROOT . "/posts/update/" . $post->id ?>">
                                                    Update
                                                </a>
                                            </div>
                                            <div>
                                                <form action="<?php echo URLROOT . "/posts/delete/" . $post->id ?>"
                                                      method="POST">
                                                    <input class="btn btn-sm btn-outline-secondary" type="submit"
                                                           name="delete" value="Delete">
                                                </form>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <small class="text-muted"><?php echo $post->created_at; ?></small>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</main>
<?php
    require_once APPROOT . '/views/includes/footer.php';
?>

