@extends('admin.layout')

@section('content')

<style>
    .form-card {
        background: white;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        overflow: hidden;
    }

    .form-header {
        background: linear-gradient(135deg, #5fcf80 0%, #4ab56e 100%);
        color: white;
        padding: 25px 30px;
    }

    .form-header h3 {
        margin: 0;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .form-header p {
        margin: 5px 0 0 0;
        opacity: 0.9;
        font-size: 14px;
    }

    .form-body {
        padding: 30px;
    }

    .form-label {
        font-weight: 600;
        color: #1a1d29;
        margin-bottom: 8px;
        font-size: 14px;
    }

    .form-control, .form-select {
        border: 2px solid #e9ecef;
        border-radius: 8px;
        padding: 12px 15px;
        transition: all 0.3s ease;
        font-size: 14px;
    }

    .form-control:focus, .form-select:focus {
        border-color: #5fcf80;
        box-shadow: 0 0 0 0.2rem rgba(95, 207, 128, 0.15);
    }

    .form-control::placeholder {
        color: #adb5bd;
    }

    .input-group-text {
        background: #f8f9fa;
        border: 2px solid #e9ecef;
        border-right: none;
        color: #6c757d;
    }

    .input-group .form-control {
        border-left: none;
    }

    .input-group:focus-within .input-group-text {
        border-color: #5fcf80;
        background: rgba(95, 207, 128, 0.05);
        color: #5fcf80;
    }

    .file-upload-wrapper {
        position: relative;
        overflow: hidden;
        display: inline-block;
        width: 100%;
    }

    .file-upload-input {
        border: 2px dashed #e9ecef;
        border-radius: 8px;
        padding: 30px;
        text-align: center;
        background: #f8f9fa;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .file-upload-input:hover {
        border-color: #5fcf80;
        background: rgba(95, 207, 128, 0.05);
    }

    .file-upload-input i {
        font-size: 40px;
        color: #5fcf80;
        margin-bottom: 10px;
    }

    .btn-save {
        background: #5fcf80;
        color: white;
        border: none;
        padding: 12px 35px;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s ease;
        font-size: 15px;
    }

    .btn-save:hover {
        background: #4ab56e;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(95, 207, 128, 0.3);
    }

    .btn-cancel {
        background: #6c757d;
        color: white;
        border: none;
        padding: 12px 35px;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s ease;
        text-decoration: none;
        font-size: 15px;
    }

    .btn-cancel:hover {
        background: #5a6268;
        color: white;
        transform: translateY(-2px);
    }

    .form-footer {
        padding: 20px 30px;
        background: #f8f9fa;
        border-top: 1px solid #e9ecef;
        display: flex;
        gap: 10px;
    }

    .char-counter {
        font-size: 12px;
        color: #6c757d;
        float: right;
        margin-top: 5px;
    }

    .required-asterisk {
        color: #e74c3c;
        margin-left: 3px;
    }
</style>

<div class="form-card">
    <div class="form-header">
        <h3>
            <i class="bi bi-plus-circle"></i>
            Add New Course
        </h3>
        <p>Fill in the details below to create a new course</p>
    </div>

    <form action="/admin/courses/store" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="form-body">
            <div class="row">
                <!-- Course Title -->
                <div class="col-md-8 mb-4">
                    <label class="form-label">
                        Course Title <span class="required-asterisk">*</span>
                    </label>
                    <input type="text" 
                           name="title" 
                           class="form-control" 
                           placeholder="e.g., Complete Web Development Bootcamp"
                           required>
                </div>

                <!-- Price -->
                <div class="col-md-4 mb-4">
                    <label class="form-label">
                        Price (₹) <span class="required-asterisk">*</span>
                    </label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-currency-rupee"></i>
                        </span>
                        <input type="number" 
                               name="price" 
                               class="form-control" 
                               placeholder="2999"
                               min="0"
                               step="0.01"
                               required>
                    </div>
                </div>

                <!-- Category (Optional) -->
                <div class="col-md-6 mb-4">
                    <label class="form-label">Category</label>
                    <select name="category" class="form-select">
                        <option value="">Select Category</option>
                        <option value="web-development">Web Development</option>
                        <option value="mobile-development">Mobile Development</option>
                        <option value="data-science">Data Science</option>
                        <option value="design">Design</option>
                        <option value="marketing">Marketing</option>
                        <option value="business">Business</option>
                    </select>
                </div>

                <!-- Duration (Optional) -->
                <div class="col-md-6 mb-4">
                    <label class="form-label">Duration</label>
                    <div class="input-group">
                        <input type="text" 
                               name="duration" 
                               class="form-control" 
                               placeholder="e.g., 12 weeks">
                        <span class="input-group-text">
                            <i class="bi bi-clock"></i>
                        </span>
                    </div>
                </div>

                <!-- Description -->
                <div class="col-12 mb-4">
                    <label class="form-label">
                        Course Description <span class="required-asterisk">*</span>
                    </label>
                    <textarea name="description" 
                              class="form-control" 
                              rows="6" 
                              placeholder="Describe what students will learn in this course..."
                              required></textarea>
                    <div class="char-counter">
                        <i class="bi bi-info-circle"></i> Maximum 500 characters
                    </div>
                </div>

                <!-- Image Upload -->
                <div class="col-12 mb-4">
                    <label class="form-label">
                        Course Thumbnail <span class="required-asterisk">*</span>
                    </label>
                    <div class="file-upload-wrapper">
                        <label for="courseImage" class="file-upload-input">
                            <i class="bi bi-cloud-upload"></i>
                            <div>
                                <strong>Click to upload</strong> or drag and drop
                            </div>
                            <small class="text-muted">PNG, JPG or JPEG (Max. 2MB)</small>
                            <input type="file" 
                                   id="courseImage"
                                   name="image" 
                                   class="d-none"
                                   accept="image/*"
                                   required>
                        </label>
                    </div>
                </div>

                <!-- Preview Area -->
                <div class="col-12">
                    <div id="imagePreview" style="display: none;">
                        <label class="form-label">Preview</label>
                        <img id="preview" src="" alt="Preview" style="max-width: 300px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                    </div>
                </div>
            </div>
        </div>

        <div class="form-footer">
            <button type="submit" class="btn-save">
                <i class="bi bi-check-circle me-2"></i> Save Course
            </button>
            <a href="/admin/courses" class="btn-cancel">
                <i class="bi bi-x-circle me-2"></i> Cancel
            </a>
        </div>
    </form>
</div>

<script>
    // Image Preview
    document.getElementById('courseImage').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('preview').src = e.target.result;
                document.getElementById('imagePreview').style.display = 'block';
            }
            reader.readAsDataURL(file);
        }
    });
</script>

@endsection