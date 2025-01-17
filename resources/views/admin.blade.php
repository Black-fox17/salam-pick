<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce Admin Panel</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>E-commerce Admin Panel</h1>
        
        <form id="productForm" class="product-form">
            <div class="form-group">
                <label for="section">Section:</label>
                <select id="section" required>
                    <option value="">Select a section</option>
                    <option value="fashion">Fashion</option>
                    <option value="autos">Autos</option>
                </select>
            </div>

            <div class="form-group">
                <label for="name">Product Name:</label>
                <input type="text" id="name" required>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" required></textarea>
            </div>

            <div class="form-group">
                <label for="price">Price ($):</label>
                <input type="number" id="price" step="0.01" required>
            </div>

            <div class="form-group">
                <label for="whyWantProduct">Why Want Product:</label>
                <textarea id="whyWantProduct" required></textarea>
            </div>

            <div class="form-group">
                <label for="soldBy">Sold By:</label>
                <input type="text" id="soldBy" required>
            </div>

            <div class="form-group">
                <label for="color">Color:</label>
                <input type="text" id="color" required>
            </div>

            <div class="form-group">
                <label for="madeIn">Made In:</label>
                <input type="text" id="madeIn" required>
            </div>

            <div class="form-group">
                <label for="image">Product Image:</label>
                <div class="image-upload-container">
                    <div class="image-upload-area" id="dropZone">
                        <input type="file" id="image" accept="image/*" required>
                        <div class="upload-text">
                            <i class="upload-icon">📸</i>
                            <p>Drag & drop an image or click to browse</p>
                        </div>
                    </div>
                    <div class="image-preview" id="imagePreview"></div>
                </div>
            </div>

            <button type="submit" class="submit-btn">Add Product</button>
        </form>

        <div id="preview" class="preview-section">
            <h2>Preview</h2>
            <pre id="jsonPreview"></pre>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>