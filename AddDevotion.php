<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Devotional</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            border-radius: 15px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .form-header {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            padding: 30px;
            text-align: center;
            color: white;
        }

        .form-header h2 {
            font-size: 2rem;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .form-header p {
            opacity: 0.9;
            font-size: 1.1rem;
        }

        .form-content {
            padding: 40px;
        }

        .mb-3 {
            margin-bottom: 25px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #333;
            font-size: 1rem;
        }

        .form-control {
            width: 100%;
            padding: 15px;
            border: 2px solid #e1e5e9;
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: #f8f9fa;
        }

        .form-control:focus {
            outline: none;
            border-color: #4facfe;
            background: white;
            box-shadow: 0 0 0 3px rgba(79, 172, 254, 0.1);
            transform: translateY(-1px);
        }

        .form-control:hover {
            border-color: #c3c9d0;
            background: white;
        }

        input[type="file"] {
            padding: 12px;
            background: white;
            border: 2px dashed #4facfe;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        input[type="file"]:hover {
            border-color: #2196f3;
            background: #f0f8ff;
        }

        .button-group {
            display: flex;
            gap: 15px;
            margin-top: 30px;
            justify-content: center;
        }

        .btn {
            padding: 15px 30px;
            border: none;
            border-radius: 10px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            min-width: 140px;
        }

        .btn-success {
            background: linear-gradient(135deg, #56ab2f 0%, #a8e6cf 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(86, 171, 47, 0.3);
        }

        .btn-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(86, 171, 47, 0.4);
        }

        .btn-secondary {
            background: linear-gradient(135deg, #6c757d 0%, #adb5bd 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(108, 117, 125, 0.3);
        }

        .btn-secondary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(108, 117, 125, 0.4);
        }

        .btn:active {
            transform: translateY(0);
        }

        /* Input animations */
        .form-control {
            position: relative;
        }

        .mb-3 {
            position: relative;
        }

        .form-label::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            transition: width 0.3s ease;
        }

        .mb-3:focus-within .form-label::after {
            width: 100%;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .container {
                margin: 10px;
                border-radius: 10px;
            }

            .form-header {
                padding: 20px;
            }

            .form-header h2 {
                font-size: 1.5rem;
            }

            .form-content {
                padding: 20px;
            }

            .button-group {
                flex-direction: column;
                gap: 10px;
            }

            .btn {
                width: 100%;
            }
        }

        /* Loading animation for form submission */
        .btn.loading {
            position: relative;
            color: transparent;
        }

        .btn.loading::after {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            top: 50%;
            left: 50%;
            margin-left: -10px;
            margin-top: -10px;
            border: 2px solid transparent;
            border-top-color: white;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        /* Success message styling */
        .success-message {
            background: linear-gradient(135deg, #56ab2f 0%, #a8e6cf 100%);
            color: white;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
            text-align: center;
            display: none;
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