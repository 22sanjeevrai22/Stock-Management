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
                        data-feather="plus-circle" class="me-2"></i>Add New
                    Category</a>
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
                                            <a class="me-2 p-2" href="#" data-bs-toggle="modal"
                                                data-bs-target="#edit-category">
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
@endsection

@section('bottom-scripts')
    <script src="{{ asset('panel/assets/js/jquery.dataTables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('panel/assets/js/dataTables.bootstrap5.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('panel/assets/plugins/summernote/summernote-bs4.min.js') }}" type="text/javascript"></script>

    <script src="{{ asset('panel/assets/plugins/select2/js/select2.min.js') }}" type="text/javascript"></script>

    <script src="{{ asset('panel/assets/js/moment.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('panel/assets/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>

    <script src="{{ asset('panel/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js') }}" type="text/javascript">
    </script>
@endsection
