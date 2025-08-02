<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Devotional</title>

    <style>
        /* General Styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7f9;
            margin: 0;
            padding: 0;
        }

        /* Container */
        .container {
            max-width: 600px;
            margin: 60px auto;
            background: #ffffff;
            padding: 30px 40px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        /* Header */
        .form-header h2 {
            margin-bottom: 5px;
            font-size: 28px;
            color: #2c3e50;
        }

        .form-header p {
            color: #7f8c8d;
            font-size: 15px;
        }

        /* Input Fields */
        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #34495e;
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 8px;
            margin-bottom: 20px;
            transition: border-color 0.3s;
        }

        .form-control:focus {
            border-color: #3498db;
            outline: none;
        }

        /* Button Styles */
        .button-group {
            display: flex;
            justify-content: space-between;
            gap: 15px;
        }

        .btn {
            padding: 12px 20px;
            font-size: 16px;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
        }

        .btn-success {
            background-color: #27ae60;
            color: white;
        }

        .btn-success:hover {
            background-color: #219150;
        }

        .btn-secondary {
            background-color: #bdc3c7;
            color: #2c3e50;
        }

        .btn-secondary:hover {
            background-color: #a6acaf;
        }

        /* Success Message */
        .success-message {
            display: none;
            padding: 12px;
            background-color: #d4edda;
            color: #155724;
            border-radius: 6px;
            margin-bottom: 20px;
            font-weight: bold;
        }

        /* Show success message when form is successfully submitted */
        .success-message.show {
            display: block;
        }

        /* Loading Button */
        .loading {
            background-color: #16a085 !important;
            cursor: wait;
            opacity: 0.8;
        }
    </style>
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

                <div class="mb-3">
                    <label for="pdf" class="form-label">Upload PDF (optional)</label>
                    <input type="file" class="form-control" name="pdf" id="pdf" accept="application/pdf" />
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
                window.location.href = 'dashboard.php';  // Redirect to dashboard.php on cancel
            }
        })

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