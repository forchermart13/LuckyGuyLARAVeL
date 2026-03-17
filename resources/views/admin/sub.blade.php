@extends('Layout.index')

@section('title')
Add Subcategory
@endsection

@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<div class="container">
    <div class="page-header">
        <div class="header-content">
            <h2>Add New Subcategory</h2>
            <p class="text-muted">Create a new subcategory under an existing category</p>
        </div>
        <a href="/admin/products" class="btn-outline">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M19 12H5M12 19l-7-7 7-7"/>
            </svg>
            Back to List
        </a>
    </div>

    <div class="form-card">
        <form action="{{ route('admin.subcategory.store') }}" method="POST" enctype="multipart/form-data" id="subcategoryForm">
            @csrf

            <div class="form-grid">
                <!-- Category Selection -->
                <div class="form-group full-width">
                    <label for="category_id">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="3" width="8" height="8" rx="2"/>
                            <rect x="13" y="3" width="8" height="8" rx="2"/>
                            <rect x="3" y="13" width="8" height="8" rx="2"/>
                            <rect x="13" y="13" width="8" height="8" rx="2"/>
                        </svg>
                        Select Parent Category <span class="required">*</span>
                    </label>
                    <div class="select-wrapper">
                        <select name="category_id" id="category_id" required>
                            <option value="" disabled selected>Choose a category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        <svg class="select-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="6 9 12 15 18 9"/>
                        </svg>
                    </div>
                    @error('category_id')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Subcategory Name -->
                <div class="form-group full-width">
                    <label for="name">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M20 7h-8a4 4 0 0 0-4 4v8a4 4 0 0 0 4 4h8a4 4 0 0 0 4-4v-8a4 4 0 0 0-4-4z"/>
                            <path d="M4 4h12"/>
                        </svg>
                        Subcategory Name <span class="required">*</span>
                    </label>
                    <input 
                        type="text" 
                        name="name" 
                        id="name" 
                        value="{{ old('name') }}"
                        required 
                        placeholder="e.g., Electronics, Clothing, Books"
                    >
                    @error('name')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Image Upload -->
                <div class="form-group full-width">
                    <label for="image">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="2" y="2" width="20" height="20" rx="2.18"/>
                            <circle cx="8.5" cy="8.5" r="1.5"/>
                            <path d="M21 15l-5-5L6 21"/>
                        </svg>
                        Subcategory Image
                    </label>
                    <div class="upload-area" id="uploadArea">
                        <input type="file" name="image" id="image" accept="image/*" style="display: none;">
                        <div class="upload-content">
                            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/>
                                <circle cx="12" cy="13" r="4"/>
                            </svg>
                            <p><strong>Click to upload</strong> or drag and drop</p>
                            <span class="upload-hint">PNG, JPG, GIF up to 2MB</span>
                        </div>
                        <div class="upload-preview" id="uploadPreview" style="display: none;">
                            <img src="" alt="Preview">
                            <button type="button" class="remove-image" onclick="removeImage()">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <line x1="18" y1="6" x2="6" y2="18"/>
                                    <line x1="6" y1="6" x2="18" y2="18"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                    @error('image')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Status Selection -->
                <div class="form-group full-width">
                    <label for="status">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10"/>
                            <path d="M12 6v6l4 2"/>
                        </svg>
                        Status
                    </label>
                    <div class="status-options">
                        <label class="radio-card">
                            <input type="radio" name="status" value="active" checked>
                            <div class="radio-content">
                                <span class="status-badge active">Active</span>
                                <span class="status-desc">Subcategory will be visible on the site</span>
                            </div>
                        </label>
                        <label class="radio-card">
                            <input type="radio" name="status" value="inactive">
                            <div class="radio-content">
                                <span class="status-badge inactive">Inactive</span>
                                <span class="status-desc">Subcategory will be hidden from the site</span>
                            </div>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="form-actions">
                <button type="reset" class="btn-secondary" onclick="resetForm()">
                    Reset Form
                </button>
                <button type="submit" class="btn-primary">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M20 14.66V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h5.34"/>
                        <polygon points="18 2 22 6 12 16 8 16 8 12 18 2"/>
                    </svg>
                    Create Subcategory
                </button>
            </div>
        </form>
    </div>
</div>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .container {
        max-width: 800px;
        margin: 40px auto;
        padding: 0 24px;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, sans-serif;
    }

    /* Page Header */
    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 32px;
        flex-wrap: wrap;
        gap: 16px;
    }

    .header-content h2 {
        font-size: 28px;
        font-weight: 600;
        color: #1e293b;
        margin-bottom: 8px;
    }

    .header-content .text-muted {
        color: #64748b;
        font-size: 15px;
    }

    .btn-outline {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 20px;
        border: 1.5px solid #e2e8f0;
        border-radius: 10px;
        color: #475569;
        text-decoration: none;
        font-weight: 500;
        font-size: 14px;
        transition: all 0.2s ease;
        background: white;
    }

    .btn-outline:hover {
        border-color: #94a3b8;
        background: #f8fafc;
        transform: translateY(-1px);
    }

    /* Form Card */
    .form-card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
        padding: 40px;
        border: 1px solid #f1f5f9;
    }

    /* Form Grid */
    .form-grid {
        display: flex;
        flex-direction: column;
        gap: 24px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .form-group label {
        display: flex;
        align-items: center;
        gap: 8px;
        font-weight: 600;
        font-size: 15px;
        color: #334155;
    }

    .form-group label svg {
        color: #64748b;
    }

    .required {
        color: #ef4444;
        margin-left: 4px;
    }

    /* Input Styles */
    .form-group input[type="text"] {
        width: 100%;
        padding: 12px 16px;
        border: 2px solid #e2e8f0;
        border-radius: 12px;
        font-size: 15px;
        transition: all 0.2s ease;
        background: white;
    }

    .form-group input[type="text"]:focus {
        outline: none;
        border-color: #6366f1;
        box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1);
    }

    /* Select Wrapper */
    .select-wrapper {
        position: relative;
        width: 100%;
    }

    .select-wrapper select {
        width: 100%;
        padding: 12px 16px;
        border: 2px solid #e2e8f0;
        border-radius: 12px;
        font-size: 15px;
        appearance: none;
        background: white;
        cursor: pointer;
    }

    .select-wrapper select:focus {
        outline: none;
        border-color: #6366f1;
        box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1);
    }

    .select-arrow {
        position: absolute;
        right: 16px;
        top: 50%;
        transform: translateY(-50%);
        color: #64748b;
        pointer-events: none;
    }

    /* Upload Area */
    .upload-area {
        border: 2px dashed #e2e8f0;
        border-radius: 16px;
        padding: 32px;
        text-align: center;
        cursor: pointer;
        transition: all 0.2s ease;
        background: #f8fafc;
    }

    .upload-area:hover {
        border-color: #6366f1;
        background: #f1f5f9;
    }

    .upload-content {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 12px;
    }

    .upload-content svg {
        color: #94a3b8;
    }

    .upload-content p {
        font-size: 16px;
        color: #334155;
    }

    .upload-hint {
        font-size: 13px;
        color: #64748b;
    }

    .upload-preview {
        position: relative;
        display: inline-block;
    }

    .upload-preview img {
        max-width: 200px;
        max-height: 200px;
        border-radius: 12px;
        border: 2px solid #e2e8f0;
    }

    .remove-image {
        position: absolute;
        top: 8px;
        right: 8px;
        background: #ef4444;
        border: none;
        border-radius: 50%;
        width: 32px;
        height: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        color: white;
        transition: all 0.2s ease;
    }

    .remove-image:hover {
        background: #dc2626;
        transform: scale(1.1);
    }

    /* Status Options */
    .status-options {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 16px;
    }

    .radio-card {
        position: relative;
        cursor: pointer;
    }

    .radio-card input[type="radio"] {
        position: absolute;
        opacity: 0;
    }

    .radio-content {
        padding: 20px;
        border: 2px solid #e2e8f0;
        border-radius: 16px;
        display: flex;
        flex-direction: column;
        gap: 8px;
        transition: all 0.2s ease;
    }

    .radio-card input[type="radio"]:checked + .radio-content {
        border-color: #6366f1;
        background: #f8fafc;
        box-shadow: 0 4px 12px rgba(99, 102, 241, 0.1);
    }

    .status-badge {
        display: inline-block;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 14px;
        font-weight: 600;
        width: fit-content;
    }

    .status-badge.active {
        background: #dcfce7;
        color: #166534;
    }

    .status-badge.inactive {
        background: #fee2e2;
        color: #991b1b;
    }

    .status-desc {
        font-size: 13px;
        color: #64748b;
    }

    /* Form Actions */
    .form-actions {
        display: flex;
        gap: 16px;
        justify-content: flex-end;
        margin-top: 40px;
        padding-top: 24px;
        border-top: 2px solid #f1f5f9;
    }

    .btn-primary, .btn-secondary {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 12px 28px;
        border-radius: 12px;
        font-weight: 600;
        font-size: 15px;
        cursor: pointer;
        transition: all 0.2s ease;
        border: none;
    }

    .btn-primary {
        background: #6366f1;
        color: white;
        box-shadow: 0 4px 12px rgba(99, 102, 241, 0.3);
    }

    .btn-primary:hover {
        background: #4f46e5;
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(99, 102, 241, 0.4);
    }

    .btn-secondary {
        background: white;
        color: #475569;
        border: 2px solid #e2e8f0;
    }

    .btn-secondary:hover {
        background: #f8fafc;
        border-color: #94a3b8;
    }

    /* Error Messages */
    .error-message {
        color: #ef4444;
        font-size: 13px;
        margin-top: 4px;
    }

    /* Responsive */
    @media (max-width: 640px) {
        .container {
            margin: 20px auto;
        }

        .form-card {
            padding: 24px;
        }

        .status-options {
            grid-template-columns: 1fr;
        }

        .form-actions {
            flex-direction: column-reverse;
        }

        .btn-primary, .btn-secondary {
            justify-content: center;
        }

        .page-header {
            flex-direction: column;
            align-items: flex-start;
        }
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // Image upload preview
    const uploadArea = document.getElementById('uploadArea');
    const imageInput = document.getElementById('image');
    const uploadPreview = document.getElementById('uploadPreview');
    const uploadContent = document.querySelector('.upload-content');

    uploadArea.addEventListener('click', () => {
        imageInput.click();
    });

    uploadArea.addEventListener('dragover', (e) => {
        e.preventDefault();
        uploadArea.style.borderColor = '#6366f1';
        uploadArea.style.background = '#f1f5f9';
    });

    uploadArea.addEventListener('dragleave', (e) => {
        e.preventDefault();
        uploadArea.style.borderColor = '#e2e8f0';
        uploadArea.style.background = '#f8fafc';
    });

    uploadArea.addEventListener('drop', (e) => {
        e.preventDefault();
        uploadArea.style.borderColor = '#e2e8f0';
        uploadArea.style.background = '#f8fafc';
        
        const file = e.dataTransfer.files[0];
        if (file && file.type.startsWith('image/')) {
            imageInput.files = e.dataTransfer.files;
            previewImage(file);
        }
    });

    imageInput.addEventListener('change', (e) => {
        const file = e.target.files[0];
        if (file) {
            previewImage(file);
        }
    });

    function previewImage(file) {
        const reader = new FileReader();
        reader.onload = (e) => {
            uploadContent.style.display = 'none';
            uploadPreview.style.display = 'block';
            uploadPreview.querySelector('img').src = e.target.result;
        };
        reader.readAsDataURL(file);
    }

    window.removeImage = function() {
        imageInput.value = '';
        uploadContent.style.display = 'flex';
        uploadPreview.style.display = 'none';
    };

    // Reset form
    window.resetForm = function() {
        document.getElementById('subcategoryForm').reset();
        removeImage();
    };

    // Success message
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '{{ session('success') }}',
            confirmButtonColor: '#6366f1',
            timer: 3000,
            timerProgressBar: true,
            showConfirmButton: true
        });
    @endif

    // Error message
    @if($errors->any())
        Swal.fire({
            icon: 'error',
            title: 'Validation Error',
            html: '{!! implode('<br>', $errors->all()) !!}',
            confirmButtonColor: '#6366f1'
        });
    @endif
</script>

@endsection