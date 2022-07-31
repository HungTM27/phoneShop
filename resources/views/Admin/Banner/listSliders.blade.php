@extends('Admin.layouts.Home')
@section('title', 'Danh sách Banner')
@section('content')
    <div class="row">
        <div class="col-4">
            @if (Session::has('success'))
                <p class="alert alert-success text-center ">{{ Session::get('success') }} </p>
            @endif
            @if (Session::has('error'))
                <p class="alert alert-danger text-center ">{{ Session::get('error') }} </p>
            @endif
        </div>
    </div>
    <form action="" method="GET">
        <div class="row">
            <div class="col-4">
                <div class="input-group">
                    <div class="form-outline">
                    <input type="search" id="form1" name="keyword" class="form-control" value="" placeholder="Search..." />
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-4">
                    <a href="{{ route('showCreateBanner') }}" id="form-add" class="btn btn-success"><i
                        class="fa fa-plus" aria-hidden="true"></i></a>
                </div>
           </div>
        </div>
    </form>
       <div class="">

       </div>
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table" id="data-table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Chi Tiết</th>
                        <th scope="col">Ảnh Banner</th>
                        <th scope="col">Phân Quyền</th>
                        <th scope="col">Chức Năng</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($banners as  $banner)
                          <tr>
                            {{--  <td>{{ $loop->iteration + $banners->firstItem() - 1 }}</td>  --}}
                            <td>{{ $banner->id }}</td>
                            <td>{{ $banner->title }}</td>
                            <td>
                                <img src="{{ asset($banner->slides_image) }}" width="100">
                            </td>
                            <td>
                                <input type="checkbox" class="toggle-class" data-id="{{ $banner->id }}"
                                data-toggle="toggle" data-style="ios" data-on="Kích Hoạt" data-off="Khoá"
                                {{ $banner->status == true ? 'checked' : '' }}>
                            </td>
                            <td>
                                <a href="{{route('showEditBanner', $banner->id)}}" class="btn btn-sm btn-info "><i class="fa fa-edit"></i></a>
                                <a href="{{route('destroyBanner', $banner->id)}}" class="btn btn-sm btn-danger btn-remove"><i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
        <div class="d-flex justify-content-left">
           
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
                    text: "Bạn chắc chắn muốn xóa sản phẩm này?",
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
                url: '{{ route('changeStatusBanner') }}',
                data: {
                    'status': status,
                    'id': id
                },
                success: function(data) {
                        toastr.success(data.success);
                }
            });
        });
    </script>
@endpush

