@extends('panel.layouts.app')
@section('content-section')
    <div class="content">
        <div class="page-header">
            <div class="add-item d-flex">
                <div class="page-title">
                    <h4>Category</h4>
                    <h6>Manage your categories</h6>
                </div>
            </div>
            <ul class="table-top-head">
                <li>
                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="Pdf"><img src="assets/img/icons/pdf.svg"
                            alt="img" /></a>
                </li>
                <li>
                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="Excel"><img src="assets/img/icons/excel.svg"
                            alt="img" /></a>
                </li>
                <li>
                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="Print"><i data-feather="printer"
                            class="feather-rotate-ccw"></i></a>
                </li>
                <li>
                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="Refresh"><i data-feather="rotate-ccw"
                            class="feather-rotate-ccw"></i></a>
                </li>
                <li>
                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="Collapse" id="collapse-header"><i
                            data-feather="chevron-up" class="feather-chevron-up"></i></a>
                </li>
            </ul>
            <div class="page-btn">
                <a href="#" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#add-category"><i
                        data-feather="plus-circle" class="me-2"></i>Add New Categoryy</a>
            </div>
        </div>

        <div class="card table-list-card">
            <div class="card-body">
                <div class="table-top">
                    <div class="search-set">
                        <div class="search-input">
                            <a href class="btn btn-searchset"><i data-feather="search" class="feather-search"></i></a>
                        </div>
                    </div>
                    <div class="search-path">
                        <a class="btn btn-filter" id="filter_search">
                            <i data-feather="filter" class="filter-icon"></i>
                            <span><img src="assets/img/icons/closes.svg" alt="img" /></span>
                        </a>
                    </div>
                    <div class="form-sort">
                        <i data-feather="sliders" class="info-img"></i>
                        <select class="select">
                            <option>Sort by Date</option>
                            <option>Newest</option>
                            <option>Oldest</option>
                        </select>
                    </div>
                </div>

                <div class="card" id="filter_inputs">
                    <div class="card-body pb-0">
                        <div class="row">
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="input-blocks">
                                    <i data-feather="zap" class="info-img"></i>
                                    <select class="select">
                                        <option>Choose Category</option>
                                        <option>Laptop</option>
                                        <option>Electronics</option>
                                        <option>Shoe</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="input-blocks">
                                    <i data-feather="calendar" class="info-img"></i>
                                    <div class="input-groupicon">
                                        <input type="text" class="datetimepicker" placeholder="Choose Date" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="input-blocks">
                                    <i data-feather="stop-circle" class="info-img"></i>
                                    <select class="select">
                                        <option>Choose Status</option>
                                        <option>Active</option>
                                        <option>Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12 ms-auto">
                                <div class="input-blocks">
                                    <a class="btn btn-filters ms-auto">
                                        <i data-feather="search" class="feather-search"></i>
                                        Search
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table datanew">
                        <thead>
                            <tr>
                                <th class="no-sort">
                                    <label class="checkboxs">
                                        <input type="checkbox" id="select-all" />
                                        <span class="checkmarks"></span>
                                    </label>
                                </th>
                                <th>Category</th>
                                <th>Category slug</th>
                                <th>Cover</th>
                                <th>Created On</th>
                                <th>Status</th>
                                <th class="no-sort">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($categories as $category)
                                <tr>
                                    <td>
                                        <label class="checkboxs">
                                            <input type="checkbox" />
                                            <span class="checkmarks"></span>
                                        </label>
                                    </td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->slug }}</td>
                                    <td>
                                        @if ($category->getFirstMedia('cover'))
                                            <img src="{{ $category->getFirstMedia('cover')->getUrl('preview') }}"
                                                alt="coverr">
                                        @else
                                            No cover image available
                                        @endif
                                    </td>
                                    <td>{{ $category->created_at }}</td>
                                    <td>
                                        @if ($category->status == 1)
                                            <span class="badge badge-linesuccess">Active</span>
                                        @else
                                            <span class="badge badge-linedanger">Inactive</span>
                                        @endif
                                    </td>
                                    <td class="action-table-data">
                                        <div class="edit-delete-action">
                                            <a class="me-2 p-2" onclick="editCategory({{ $category->id }})"
                                                href="" data-bs-toggle="modal" data-bs-target="#edit-category">
                                                <i data-feather="edit" class="feather-edit"></i>
                                            </a>
                                            <a class="confirm-text p-2" href="javascript:void(0);">
                                                <i data-feather="trash-2" class="feather-trash-2"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="add-category">
        <div class="modal-dialog modal-dialog-centered custom-modal-two">
            <div class="modal-content">
                <div class="page-wrapper-new p-0">
                    <div class="content">
                        <div class="modal-header border-0 custom-modal-header">
                            <div class="page-title">
                                <h4>Create Category</h4>
                            </div>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body custom-modal-body">
                            <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-6 mb-3">
                                        <label class="form-label">Category</label>
                                        <input name="name" type="text" value="{{ old('name') }}"
                                            class="form-control @error('name') is-invalid @enderror" required />
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label class="form-label">Category Slug</label>
                                        <input name="slug" type="text" value="{{ old('slug') }}"
                                            class="form-control @error('slug') is-invalid @enderror" required />
                                        @error('slug')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12 mb-3">
                                    <div class="input-blocks summer-description-box transfer mb-3">
                                        <label>Description</label>
                                        <textarea class="form-control h-100 @error('description') is-invalid @enderror" rows="5" name="description"
                                            required>{{ old('description') }}</textarea>
                                        <p class="mt-1">Maximum 60 Characters</p>
                                        @error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-lg-12">
                                    <div class="add-choosen">
                                        <div class="input-blocks">
                                            <div class="image-upload">
                                                <input class="upload-image" type="file" name="cover"
                                                    id="cover" />
                                                <div class="image-uploads">
                                                    <i data-feather="plus-circle" class="plus-down-add me-0"></i>
                                                    <h4>Add Images</h4>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="phone-img">
                                            <img id="preview_image"
                                                src="https://th.bing.com/th/id/R.7a46c40eff6061c149d6c442cead3ddf?rik=P7RmvAdzYGMcXQ&pid=ImgRaw&rr=0&sres=1&sresct=1"
                                                alt="image" />
                                            <a href="javascript:void(0);"><i data-feather="x"
                                                    class="x-square-add remove-product"></i></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-0">
                                    <div
                                        class="status-toggle modal-status d-flex justify-content-between align-items-center">
                                        <span class="status-label">Status</span>
                                        <input type="hidden" name="status" value="0" />
                                        <input type="checkbox" name="status" id="category_status" class="check"
                                            value="1" {{ old('status', 1) ? 'checked' : '' }} />
                                        <label for="category_status" class="checktoggle"></label>
                                    </div>
                                </div>
                                <div class="modal-footer-btn">
                                    <button type="button" class="btn btn-cancel me-2" data-bs-dismiss="modal">
                                        Cancel
                                    </button>
                                    <button type="submit" class="btn btn-submit">
                                        Create
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="edit-category">
        <div class="modal-dialog modal-dialog-centered custom-modal-two">
            <div class="modal-content">
                <div class="page-wrapper-new p-0">
                    <div class="content">
                        <div class="modal-header border-0 custom-modal-header">
                            <div class="page-title">
                                <h4>Edit Category</h4>
                            </div>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body custom-modal-body">
                            <form id="edit-category-form" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="category_id" id="edit_category_id">

                                <div class="row">
                                    <div class="col-6 mb-3">
                                        <label class="form-label">Category</label>
                                        <input name="name" type="text" id="edit_name" class="form-control @error('name') is-invalid @enderror" required />
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label class="form-label">Category Slug</label>
                                        <input name="slug" type="text" id="edit_slug" class="form-control @error('slug') is-invalid @enderror" required />
                                        @error('slug')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12 mb-3">
                                    <div class="input-blocks summer-description-box transfer mb-3">
                                        <label>Description</label>
                                        <textarea class="form-control h-100 @error('description') is-invalid @enderror" rows="5" name="description" id="edit_description" required></textarea>
                                        <p class="mt-1">Maximum 60 Characters</p>
                                        @error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="add-choosen">
                                        <div class="input-blocks">
                                            <div class="image-upload">
                                                <input class="upload-image" type="file" name="cover" id="edit_cover" />
                                                <div class="image-uploads">
                                                    <i data-feather="plus-circle" class="plus-down-add me-0"></i>
                                                    <h4>Add Images</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="phone-img">
                                            <img id="edit_preview_image" src="default-image-url" alt="image" />
                                            <a href="javascript:void(0);"><i data-feather="x" class="x-square-add remove-product"></i></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-0">
                                    <div class="status-toggle modal-status d-flex justify-content-between align-items-center">
                                        <span class="status-label">Status</span>
                                        <input type="hidden" name="status" value="0" />
                                        <input type="checkbox" name="status" id="edit_category_status" class="check" value="1" {{ old('status', 1) ? 'checked' : '' }} />
                                        <label for="edit_category_status" class="checktoggle"></label>
                                    </div>
                                </div>
                                <div class="modal-footer-btn">
                                    <button type="button" class="btn btn-cancel me-2" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-submit">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Toast Html --}}
    {{-- @if (session('success'))
        <div class="toast-container position-fixed top-50 end-0 translate-middle-y p-3">
            <div id="middleright-Toast" class="toast colored-toast bg-primary-transparent text-primary" role="alert"
                aria-live="assertive" aria-atomic="true">
                <div class="toast-header bg-primary text-fixed-white">
                    <strong class="me-auto">Toast</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">toastr.success("{{ session('success') }}");</div>
            </div>
        </div>
    @endif --}}
@endsection



@section('bottom-scripts')
    <!-- Toast JavaScript -->

    <script src="{{ asset('panel/assets/plugins/toastr/toastr.min.js') }}" type="text/javascript"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script> --}}
    <script src="{{ asset('panel/assets/js/jquery.dataTables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('panel/assets/js/dataTables.bootstrap5.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('panel/assets/plugins/summernote/summernote-bs4.min.js') }}" type="text/javascript"></script>

    <script src="{{ asset('panel/assets/plugins/select2/js/select2.min.js') }}" type="text/javascript"></script>

    <script src="{{ asset('panel/assets/js/moment.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('panel/assets/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>

    <script src="{{ asset('panel/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js') }}" type="text/javascript"></script>
    <script>
        document.getElementById('cover').addEventListener('change', function(e) {
            var reader = new FileReader();
            reader.onload = function(event) {
                document.getElementById('preview_image').src = event.target.result;

            }
            reader.readAsDataURL(e.target.files[0]);
        });

        document.getElementById('cover').addEventListener('change', function(e) {
            var reader = new FileReader();
            reader.onload = function(event) {
                document.getElementById('edit_preview_image').src = event.target.result;

            }
            reader.readAsDataURL(e.target.files[0]);
        });

        document.addEventListener('DOMContentLoaded', function() {
            @if ($errors->any())
                $('#add-category').modal('show');
            @endif
        });

        @if (session('success'))
            toastr.success("{{ session('success') }}");
        @endif
        @if (session('error'))
            toastr.error("{{ session('error') }}");
        @endif

        function editCategory(categoryId) {
            $.get('/categories/' + categoryId + '/edit', function(data) {
                // Set the form action to the update route for this category
                $('#edit-category-form').attr('action', '/categories/' + data.id);

                // Populate the form fields with the current category data
                $('#edit_category_id').val(data.id);
                $('#edit_name').val(data.name);
                $('#edit_slug').val(data.slug);
                $('#edit_description').val(data.description);

                // Set the status checkbox
                $('#edit_category_status').prop('checked', data.status === 1);

                // Update the preview image if available
                if (data.cover_url) {
                    $('#edit_preview_image').attr('src', data.cover_url);
                } else {
                    $('#edit_preview_image').attr('src', 'default-image-url'); // Optional: Set to a default image
                }

                // Show the edit modal
                $('#edit-category').modal('show');
            });
        }
    </script>
@endsection
