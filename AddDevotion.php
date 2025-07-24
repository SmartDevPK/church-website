<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>

<!-- Add Devotional Form (Initially Hidden) -->
<h2>Add New Devotional</h2>
<form action="add_devotional.php" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="topic" class="form-label">Title / Topic</label>
        <input type="text" class="form-control" name="topic" id="topic" required />
    </div>

    <div class="mb-3">
        <label for="date" class="form-label">Date</label>
        <input type="date" class="form-control" name="date" id="date" required />
    </div>

    <div class="mb-3">
        <label for="image" class="form-label">Cover Image</label>
        <input type="file" class="form-control" name="image" id="image" accept="image/*" required />
    </div>

    <button type="submit" class="btn btn-success">Save Devotional</button>
    <button type="button" class="btn btn-secondary" id="cancel-add">Cancel</button>
</form>
</div>

</script>