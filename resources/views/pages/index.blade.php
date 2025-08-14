@extends('layout.app')
@section('content')

<div class="container-fluid w-75 mt-3">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12">
                <div class="card px-5 py-5">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-6">
                                <h2>Laravel <b>Multi Image Upload System</b></h2>
                            </div>
                            <div class="col-sm-6">
                                <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addEmployeeModal"><i class="material-icons">&#xE147;</i> <span>Add New Images</span></a>
                            </div>
                        </div>
                    </div>

                    <table class="table table-hover" id="tableData">
                        <thead>
                            <tr class="bg-light">
                                <th>SL</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="tableList">
        @foreach ($images as $key=>$image)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>
                    <img src="{{ asset($image->multi_image) }}" alt="Employee Image" class="img-fluid rounded" style="width: 50px; height: 50px;">
                </td>
                <td>
                    <a href="" class="edit" data-bs-toggle="modal" data-bs-target="#editEmployeeModal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                    <a href="#" class="delete" data-bs-toggle="modal" data-bs-target="#deleteEmployeeModal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                </td>
            </tr>
        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Add Employee -->
    <div class="modal fade" id="addEmployeeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('store.multi.image') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Multi Image</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="container">
                            <div class="row">

                                <div class="col-12 p-1">
                                    <label class="form-label">Image *</label>
                                    <input type="file" name="multi_image[]" class="form-control" multiple id="image">
                                </div>
                                <img id="showImage" class="form-check-input" src="{{ asset('assets/img/no_image.jpg') }} " alt="Admin" style="width:100px; height: 100px;">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="modal-close" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Edit Modal HTML -->
    <div class="modal fade" id="editEmployeeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Employee</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="save-form">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 p-1">
                                    <label class="form-label">Image *</label>
                                    <input type="file" name="image" class="form-control" id="editimage">
                                </div>
                                <img id="showEditImage" class="form-check-input" src="img/no_image.jpg" style="width:100px; height: 100px;">

                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal HTML -->
    <div class="modal fade" id="deleteEmployeeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Employee</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h3 class=" mt-3 text-warning">Delete !</h3>
                    <p class="mb-3">Once delete, you can't get it back.</p>
                    <input class="" hidden id="deleteID"/>
                </div>
                <div class="modal-footer">
                    <button type="button" id="delete-modal-close" class="btn shadow-sm btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button onclick="itemDelete()" type="button" id="confirmDelete" class="btn shadow-sm btn-danger" >Delete</button>
                </div>
            </div>
        </div>
    </div>

    <!-- <script>
        let tableData = $('#tableData');
        tableData.DataTable({
            order:[[0,'asc']],
            lengthMenu:[5,10,15,20]
        });
    </script> -->

    <script>
        $(document).ready(function () {
            $('#image').change(function (e) {
                var file = e.target.files[0];

                var reader = new FileReader();
                reader.onload = function (event) {
                    $('#showImage').attr('src', event.target.result);
                }
                reader.readAsDataURL(file);
            });
        });
    </script>

    <!-- only for edit image -->
    <script>
        $(document).ready(function () {
            $('#editimage').change(function (e) {
                var file = e.target.files[0];

                var reader = new FileReader();
                reader.onload = function (event) {
                    $('#showEditImage').attr('src', event.target.result);
                }
                reader.readAsDataURL(file);
            });
        });
    </script>
@endsection
