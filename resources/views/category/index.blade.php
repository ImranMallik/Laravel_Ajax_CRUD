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
                        Category Name:
                    </h5>
                </div>
                <div class="card-body">
                    {{-- <h1>Imran</h1> --}}
                    <form id="myForm" method="POST" action="{{ route('category.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label">Enter Category:</label>
                            <input type="text" name="category" class="form-control" id=""
                                aria-describedby="emailHelp">
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


                },
                messages: {
                    category: {
                        required: 'Please Enter Category Name',
                    },



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
    </script>
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
