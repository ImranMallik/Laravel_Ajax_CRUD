@extends('layout.index')
<script src="
https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js
"></script>

@section('content')
    <div class="row mt-5 d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="mx-2 mt-2">
                    <h5>
                        Sub Category Name:
                    </h5>
                </div>
                <div class="card-body">
                    {{-- <h1>Imran</h1> --}}
                    <form id="myForm" method="POST" action="{{ route('sub-category.store') }}">
                        @csrf
                        <select class="form-select form-group" name="category" aria-label="Default select example" required>
                            <option value="" disabled selected>Select Category</option>
                            @foreach ($category as $value)
                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                            @endforeach
                        </select>
                        <div class="mt-4">
                            <select name="status" class="form-select form-group" required>
                                <option value="" disabled selected>Select Status</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <label for="exampleInputEmail1" class="form-label">Enter SubCategory:</label>
                            <input type="text" name="sub_category" class="form-control" id=""
                                aria-describedby="emailHelp" required>
                        </div>

                        <button type="submit" class="btn btn-primary mt-2">Submit</button>
                    </form>

                </div>
            </div>
        </div>

    </div>
    <div class="row mt-5 d-flex justify-content-center">
        <div class="col-md-8">


            <div class="card">
                <div class="mx-2 mt-2">
                    <h5>
                        Category List:
                    </h5>
                </div>
                <div class="card-body">
                    {{ $dataTable->table() }}
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    category: {
                        required: true,
                    },
                    status: {
                        required: true,
                    },
                    sub_category: {
                        required: true
                    }
                },
                messages: {
                    category: {
                        required: 'Please Select Category Name',
                    },
                    status: {
                        required: 'Please Select Status',
                    },
                    sub_category: {
                        required: 'Please Enter Sub Category'
                    }




                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
            });
        });
        // Status Change
        $('body').on('click', '.change-status', function() {
            // alert('Hello');
            let isChecked = $(this).is(':checked');
            // console.log(isChecked);
            let id = $(this).data('id');
            let csrfToken = $('meta[name="csrf-token"]').attr('content');
            // console.log(id);

            $.ajax({
                url: "{{ route('sub-category.status-change') }}",
                method: 'PUT',
                headers: {
                    'X-CSRF-TOKEN': csrfToken // Include CSRF token in the headers
                },
                data: {
                    status: isChecked,
                    id: id
                },
                success: function(data) {
                    // toastr.success(data.message); // Display the default success message

                    if (data.notification) {
                        const notification = data.notification;
                        toastr[notification['alert-type']](notification[
                            'message']); // Display the custom notification message
                    }
                },

                error: function(xhr, status, error) {
                    console.log(error);
                }
            })
        })
    </script>
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
