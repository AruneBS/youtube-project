<?php 
    include __DIR__ . '/content/header.php';
?>

<div class="container">
    <?php foreach ($result as $video) : ?>
        <div class="video">
            <iframe src="<?= $video['video_url'] ?>" frameborder="0" width="100%" height="500px" allowfullscreen="true"><?= $video['video_url'] ?></iframe>
        </div>
        <div class="fs-4"><?= $video['name'] ?></div>
    <?php endforeach; ?>
</div>

<?php
    include __DIR__ . '/content/footer.php';
?>