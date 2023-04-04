<?php 
include __DIR__ . '/content/header.php'; 
?>


<?php if (isset($_GET['action']) and $_GET['action'] === 'add') : ?>
    <div class="container">

<div class="newCategory">
    <form method="POST" class="mb-3">
        <div class="mb-3" id="newCategoryInput">
            <label class="form-label">New category</label>
            <input type="text" class="form-control" placeholder="Type new category" name="name">
        </div>
        <button class="btn btn-outline-dark" type="submit">Add Category</button>
    </form>
</div>

<div class=" newVideo">
    <form method="POST">
        <div class="mb-3">
            <label class="form-label">Video name:</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="mb-3">
            <label class="form-label">Choose category:</label>
            <select name="category_id" class="form-control">
                <?php foreach ($categories as $category) : ?>
                    <option value="<?= $category['id']; ?>"><?= $category['name']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Video URL:</label>
            <input type="text" class="form-control" name="video_url">
        </div>
        <div class="mb-3">
            <label class="form-label">Video Thumbnail URL:</label>
            <input type="text" class="form-control" name="thumbnail_url">
        </div>
           

        <button class="btn btn-outline-dark" type="submit">Add video</button>
    </form>
</div>
</div>
<?php endif; ?>




<div class="videos d-flex gap-2">
<?php foreach ($videos as $video) : ?>
    <div class="card" style="width: 18rem;">
        <a href="?page=video&id=<?= $video['id'] ?>"><img src="<?= $video['thumbnail_url'] ?>" class="card-img-top" alt="..."></a>
        <div class="card-body">
            <p class="card-text"><?= $video['name'] ?></p>
        </div>
    </div>
<?php endforeach; ?>
</div>
</div>


<!-- <ul>
    <?php foreach ($videos as $video) : ?>
        <li>
            <div><img src="<?= $video['thumbnail_url'] ?>" /></div>
            <div><?= $video['name'] ?></div>
        </li>
    <?php endforeach; ?>

</ul> -->

<?php
include __DIR__. '/content/footer.php';
?>


