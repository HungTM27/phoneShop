@extends('Admin.layouts.Home')
@section('title', 'Danh sách sản phẩm')
@section('content')
    <div class="row">
        <div class="col-md-4">
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
                        <input type="search" id="form1" name="keyword" class="form-control" value=""
                            placeholder="Search..." />
                    </div>
                </div>
            </div>
            <div class="col-2" id="cate_id">
                <div class="form-group">
                    <label for="">Danh mục:</label>
                    <select name="cate_id" class="form-control">
                        <option value="">Tất cả</option>
                        @foreach ($cates as $c)
                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-2" id="cate_id">
                <div class="form-group">
                    <label for="">Sắp xếp theo</label>
                    <select name="order_by" class="form-control">
                        <option value="">Mặc định</option>
                        @foreach (config('common.product_order_by') as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-12 d-flex justify-content-center">
                <button class="btn btn-sm btn-primary" type="submit">Tìm kiếm</button>
            </div>
        </div>
        <div class="col-12 d-flex justify-content-end">
            <a href="{{ route('storeProducts') }}" class="btn btn-success btn-save">
                <i class="fa fa-plus" aria-hidden="true"> Thêm Sản Phẩm</i></a>
        </div>

    </form>
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table" id="data-table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Tên Sản Phẩm</th>
                        <th scope="col">Image</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Giá Khuyến Mãi</th>
                        <th scope="col">Số Lượng</th>
                        <th scope="col">Chi Tiết</th>
                        <th scope="col">Danh Mục</th>
                        <th scope="col">Trạng Thái</th>
                        <th scope="col">Chức Năng</th>
                    </tr>
                </thead>
                @foreach ($prods as $products)
                    <tbody>
                        <tr>
                            <td>{{ $loop->iteration + $prods->firstItem() - 1 }}</td>
                            <td>{{ $products->name }}</td>
                            <td>
                                <img src="{{ asset($products->feature_image) }}" width="70">
                            </td>
                            <td>{{ $products->price }}</td>
                            <td>{{ $products->sale_price }}</td>
                            <td>{{ $products->quantity }}</td>
                            <td>{{ $products->details }}</td>
                            <td>{{ $products->category->name }}</td>
                            <td>
                                @if ($products->status == 1)
                                    <p class="text-success">Còn Hàng</p>
                                @else
                                    <p class="text-danger">Hết Hàng</p>
                                @endif
                            </td>
                            <td>

                                <a href="{{ route('editProducts', $products->id) }}" class="btn btn-sm btn-info "><i
                                        class="fa fa-edit"></i></a>
                                <a href="{{ route('storeProducts.Destroy',$products->id) }}"
                                class="btn btn-sm btn-danger btn-remove"><i class="fa fa-trash"></i>
                            </a>
                            </td>
                        </tr>
                    </tbody>
                @endforeach

            </table>
        </div>
        <div class="d-flex justify-content-left">
            {{ $prods->appends(request()->query())->links() }}
        </div>
    </div>
    </div>
@endsection

@push('scripts')
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
@endpush
