@extends('Layout.index')

@section('title')
Add Product
@endsection

@section('content')
<div class="container-fluid px-4">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="h4 fw-semibold text-dark">Add New Product</h2>
        <a href="{{ route('admin.products') }}" class="btn btn-secondary">
            <i class="fa-solid fa-arrow-left me-2"></i>Back to Products
        </a>
    </div>

    <!-- Display Success/Error Messages -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Validation Errors -->
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Product Form -->
    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('admin.addpro.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="row g-4">
                    <!-- Left Column -->
                    <div class="col-lg-6">
                        <!-- Product Name -->
                        <div class="mb-4">
                            <label class="form-label fw-medium text-dark">
                                <i class="fa-solid fa-tag me-2 text-primary"></i>Product Name <span class="text-danger">*</span>
                            </label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" 
                                   placeholder="e.g., Premium Cotton T-Shirt" value="{{ old('name') }}">
                            <div class="form-text">Maximum 100 characters</div>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div class="mb-4">
                            <label class="form-label fw-medium text-dark">
                                <i class="fa-solid fa-file-lines me-2 text-primary"></i>Description <span class="text-danger">*</span>
                            </label>
                            <textarea name="description" rows="5" class="form-control @error('description') is-invalid @enderror" 
                                      placeholder="Enter detailed product description, features, benefits, etc...">{{ old('description') }}</textarea>
                            <div class="form-text">
                                <span class="fw-medium text-primary">Minimum 6 words</span>, maximum 1000 characters
                                <span id="word-count" class="badge bg-secondary ms-2">0 words</span>
                            </div>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Short Description -->
                        <div class="mb-4">
                            <label class="form-label fw-medium text-dark">
                                <i class="fa-solid fa-paragraph me-2 text-primary"></i>Short Description
                            </label>
                            <textarea name="short_description" rows="2" class="form-control @error('short_description') is-invalid @enderror" 
                                      placeholder="Brief summary of the product...">{{ old('short_description') }}</textarea>
                            @error('short_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="col-lg-6">
                        <!-- Main Photo -->
                        <div class="mb-4">
                            <label class="form-label fw-medium text-dark">
                                <i class="fa-solid fa-camera me-2 text-primary"></i>Main Product Photo <span class="text-danger">*</span>
                            </label>
                            <div class="border border-dashed border-secondary rounded-3 p-4 text-center" 
                                 style="border-style: dashed !important; cursor: pointer;" 
                                 onclick="document.getElementById('photo').click()">
                                <input type="file" name="photo" id="photo" class="d-none @error('photo') is-invalid @enderror" accept="image/*">
                                <i class="fa-solid fa-cloud-upload-alt fs-1 text-secondary mb-2"></i>
                                <p class="text-secondary small mb-1">Click to upload main product image</p>
                                <p class="text-secondary small opacity-75">PNG, JPG, WEBP up to 13MB</p>
                            </div>
                            @error('photo')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                            <div id="photo-preview" class="mt-2 d-none">
                                <img src="#" alt="Preview" class="img-thumbnail" style="height: 128px; width: 128px; object-fit: cover;">
                            </div>
                        </div>

                        <!-- Additional Photos -->
                        <div class="mb-4">
                            <label class="form-label fw-medium text-dark">
                                <i class="fa-solid fa-images me-2 text-primary"></i>Additional Photos (Up to 5)
                            </label>
                            <div class="border border-dashed border-secondary rounded-3 p-4 text-center" 
                                 style="border-style: dashed !important; cursor: pointer;"
                                 onclick="document.getElementById('photos').click()">
                                <input type="file" name="photo02[]" id="photos" class="d-none" multiple accept="image/*">
                                <i class="fa-solid fa-cloud-upload-alt fs-1 text-secondary mb-2"></i>
                                <p class="text-secondary small mb-1">Click to upload additional product images</p>
                                <p class="text-secondary small opacity-75">PNG, JPG, WEBP up to 13MB each</p>
                            </div>
                            @error('photo02.*')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                            <div id="additional-photos-preview" class="row g-2 mt-2"></div>
                        </div>

                        <!-- Sizes - Multiple Choice (Fetched from Database) -->
                        <div class="mb-4">
                            <label class="form-label fw-medium text-dark">
                                <i class="fa-solid fa-ruler me-2 text-primary"></i>Available Sizes <span class="text-danger">*</span>
                            </label>
                            <div class="form-text mb-2">Select multiple sizes available for this product</div>
                            
                            <div class="row g-2">
                                @foreach($sizes as $size)
                                <div class="col-4 col-sm-3">
                                    <div class="form-check">
                                        <input type="checkbox" name="sizes[]" value="{{ $size->id }}" 
                                               class="btn-check" id="size-{{ $size->id }}"
                                               {{ in_array($size->id, old('sizes', [])) ? 'checked' : '' }}>
                                        <label class="btn btn-outline-secondary w-100" for="size-{{ $size->id }}">
                                            {{ $size->name }}
                                        </label>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            @error('sizes')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror

                            <!-- Size Guide Link -->
                            <div class="mt-2">
                                <a href="#" class="text-primary small text-decoration-none">
                                    <i class="fa-solid fa-ruler-combined me-1"></i>View Size Guide
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Additional Fields Row -->
                <div class="row g-3 mt-2">
                    <!-- Price -->
                    <div class="col-md-6 col-lg-3">
                        <label class="form-label fw-medium text-dark">
                            <i class="fa-solid fa-dollar-sign me-2 text-primary"></i>Price <span class="text-danger">*</span>
                        </label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="number" name="price" step="0.01" class="form-control @error('price') is-invalid @enderror" 
                                   placeholder="0.00" value="{{ old('price') }}">
                        </div>
                        @error('price')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Compare Price -->
                    <div class="col-md-6 col-lg-3">
                        <label class="form-label fw-medium text-dark">
                            <i class="fa-solid fa-tags me-2 text-primary"></i>Compare at Price
                        </label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="number" name="compare_price" step="0.01" class="form-control @error('compare_price') is-invalid @enderror" 
                                   placeholder="0.00" value="{{ old('compare_price') }}">
                        </div>
                        @error('compare_price')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Categories -->
                <div class="row g-3 mt-3">
                    <!-- Subcategories -->
                    <div class="col-md-6">
                        <label class="form-label fw-medium text-dark">
                            <i class="fa-solid fa-folder me-2 text-primary"></i>Subcategory <span class="text-danger">*</span>
                        </label>
                        <select name="subcategory" class="form-select @error('subcategory') is-invalid @enderror">
                            <option value="">Select a SubCategory</option>
                            @foreach($subcategories as $subcategory)
                                <option value="{{ $subcategory->id }}" {{ old('subcategory') == $subcategory->id ? 'selected' : '' }}>
                                    {{ $subcategory->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('subcategory')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Product Status -->
                <div class="mt-4 p-3 bg-light rounded">
                    <h6 class="fw-medium text-dark mb-3">
                        <i class="fa-solid fa-toggle-on me-2 text-primary"></i>Product Status
                    </h6>
                    <div class="d-flex gap-4">
                        <div class="form-check">
                            <input type="radio" name="status" value="active" id="status-active" class="form-check-input" 
                                   {{ old('status', 'active') == 'active' ? 'checked' : '' }}>
                            <label class="form-check-label" for="status-active">Active</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="status" value="draft" id="status-draft" class="form-check-input"
                                   {{ old('status') == 'draft' ? 'checked' : '' }}>
                            <label class="form-check-label" for="status-draft">Draft</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="status" value="scheduled" id="status-scheduled" class="form-check-input"
                                   {{ old('status') == 'scheduled' ? 'checked' : '' }}>
                            <label class="form-check-label" for="status-scheduled">Scheduled</label>
                        </div>
                    </div>
                    @error('status')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Form Actions -->
                <div class="d-flex justify-content-end gap-2 mt-4 pt-4 border-top">
                    <button type="reset" class="btn btn-outline-secondary px-4">
                        Reset
                    </button>
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="fa-solid fa-save me-2"></i>Save Product
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- JavaScript for Image Preview and Word Count -->
<script>
    // Main photo preview
    document.getElementById('photo').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const preview = document.getElementById('photo-preview');
                preview.classList.remove('d-none');
                preview.querySelector('img').src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    });

    // Additional photos preview
    document.getElementById('photos').addEventListener('change', function(e) {
        const files = e.target.files;
        const preview = document.getElementById('additional-photos-preview');
        preview.innerHTML = '';
        
        for (let i = 0; i < files.length; i++) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const col = document.createElement('div');
                col.className = 'col-auto';
                col.innerHTML = `
                    <div class="position-relative">
                        <img src="${e.target.result}" class="rounded" style="height: 80px; width: 80px; object-fit: cover;">
                        <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 p-0" 
                                style="transform: translate(50%, -50%); width: 20px; height: 20px; font-size: 10px;"
                                onclick="this.closest('.col-auto').remove()">
                            <i class="fa-solid fa-times"></i>
                        </button>
                    </div>
                `;
                preview.appendChild(col);
            }
            reader.readAsDataURL(files[i]);
        }
    });

    // Word count for description
    document.querySelector('textarea[name="description"]').addEventListener('input', function() {
        const text = this.value.trim();
        const wordCount = text === '' ? 0 : text.split(/\s+/).filter(word => word.length > 0).length;
        const wordCountElement = document.getElementById('word-count');
        wordCountElement.textContent = wordCount + ' words';
        
        // Change color based on word count
        if (wordCount < 6) {
            wordCountElement.classList.remove('bg-success', 'bg-secondary');
            wordCountElement.classList.add('bg-danger');
        } else {
            wordCountElement.classList.remove('bg-danger', 'bg-secondary');
            wordCountElement.classList.add('bg-success');
        }
    });

    // Trigger initial word count
    window.addEventListener('load', function() {
        const description = document.querySelector('textarea[name="description"]');
        if (description.value) {
            const event = new Event('input');
            description.dispatchEvent(event);
        }
    });
</script>
@endsection