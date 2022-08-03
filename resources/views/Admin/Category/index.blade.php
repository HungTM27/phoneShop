@extends('Admin.layouts.Home')
@section('title', 'Danh Mục')
@section('content')
    <div class="mesage-btn">
        <div class="row">
            <div class="col-md-3">
                @if (Session::has('success'))
                    <p class="alert alert-success text-center ">{{ Session::get('success') }} </p>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <form action="" method="GET">
            <div class="input-group">
                <div class="form-outline">
                    <input type="search" id="form1" name="keyword" class="form-control" value="{{$keywords}}"
                        placeholder="Search..." />
                </div>
            </div>
        </form>
    </div>
    <div class="dataTables_length" id="example_length"><label>Show <select name="example_length" aria-controls="example" class="form-select form-select-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div>
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table" id="data-table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                @foreach ($cates as $cate)
                    <tbody>
                        <tr>
                            <td>{{ $loop->iteration + $cates->firstItem() - 1 }}</td>
                            <td>{{ $cate->name }}</td>
                            <td>{{ $cate->slug }}</td>
                            <td>
                                <input type="checkbox" class="toggle-class" data-id="{{ $cate->id }}"
                                    data-toggle="toggle" data-style="slow" data-on="Enabled" data-off="Disabled"
                                    {{ $cate->status == true ? 'checked' : '' }}>
                            </td>
                            <td>
                                <a href="{{ route('storecreate') }}" class="btn btn-sm btn-success"><i class="fa fa-plus"
                                        aria-hidden="true"></i></a>
                                <a href="{{ route('categoriesEdit', $cate->id) }}" class="btn btn-sm btn-info "><i
                                        class="fa fa-edit"></i></a>
                                <a href="{{ route('destroy', $cate->id) }}" class="btn btn-sm btn-danger btn-remove"><i
                                        class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
        <div class="d-flex justify-content-left">
            {!! $cates->links() !!}
        </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script>
        $(document).ready(function() {
            $('.btn-remove').on('click', function() {
                Swal.fire({
                    title: 'Cảnh báo!',
                    text: "Bạn chắc chắn muốn xóa danh mục này?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Đồng ý!'
                }).then((result) => {
                    if (result.value) {
                        var url = $(this).attr('href');
                        window.location.href = url;
                    }
                })
                return false;
            });
        });
    </script>
@endsection

@push('scripts')
    <script>
        $(function() {
            $('#toggle-two').bootstrapToggle({
                on: 'Enabled',
                off: 'Disabled'
            });
        });
    </script>
    <script>
        toastr.options = {
            "closeButton": true,
            "newestOnTop": true,
            "positionClass": "toast-top-right"
        };
        $('.toggle-class').on('change', function() {
            var status = $(this).prop('checked') == true ? 1 : 0;
            var id = $(this).data('id');
            $.ajax({
                type: 'GET',
                dataType: 'JSON',
                url: '{{ route('changeCategoriesStatus') }}',
                data: {
                    'status': status,
                    'id': id
                },
                success: function(data) {
                    setTimeout(() => {
                        toastr.success(data.success);
                    }, 500)
                }
            });
        });
    </script>
@endpush
