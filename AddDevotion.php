<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Devotional</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php ini_set('display_errors', 1);
    error_reporting(E_ALL); ?>

    <div class="container">
        <div class="form-header">
            <h2>Add New Devotional</h2>
            <p>Share your spiritual insights with the community</p>
        </div>

        <div class="form-content">
            <div class="success-message" id="successMessage">
                Devotional added successfully!
            </div>

            <form action="add_devotional.php" method="POST" enctype="multipart/form-data" id="devotionalForm">
                <div class="mb-3">
                    <label for="topic" class="form-label">Title / Topic</label>
                    <input type="text" class="form-control" name="topic" id="topic"
                        placeholder="Enter devotional title..." required />
                </div>

                <div class="mb-3">
                    <label for="date" class="form-label">Date</label>
                    <input type="date" class="form-control" name="date" id="date" required />
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Cover Image</label>
                    <input type="file" class="form-control" name="image" id="image" accept="image/*" required />
                </div>

                <div class="button-group">
                    <button type="submit" class="btn btn-success" id="submitBtn">Save Devotional</button>
                    <button type="button" class="btn btn-secondary" id="cancel-add">Cancel</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Set today's date as default
        document.getElementById('date').valueAsDate = new Date();

        // Form submission with loading state
        document.getElementById('devotionalForm').addEventListener('submit', function (e) {
            const submitBtn = document.getElementById('submitBtn');
            submitBtn.classList.add('loading');
            submitBtn.disabled = true;
        });

        // Cancel button functionality
        document.getElementById('cancel-add').addEventListener('click', function () {
            if (confirm('Are you sure you want to cancel? All unsaved changes will be lost.')) {
                document.getElementById('devotionalForm').reset();
                // You can add redirect logic here
                // window.location.href = 'dashboard.php';
            }
        });

        // File input preview (optional enhancement)
        document.getElementById('image').addEventListener('change', function (e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    // You can add image preview functionality here
                    console.log('Image selected:', file.name);
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
</body>

</html>