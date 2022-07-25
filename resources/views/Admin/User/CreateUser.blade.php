@extends('Admin.layouts.Home')
@section('title', 'Thêm Tài Khoản')
@section('content')
    <div class="card-body">
        <form action="{{ route('storeProducts') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Your Text Name ...">
                    </div>
                    <div class="form-group">
                        <label for="">Price</label>
                        <input type="text" name="price" class="form-control" placeholder="Your Text Price ...">
                    </div>

                    <div class="form-group">
                        <label for="">Sale_Price</label>
                        <input type="text" name="sale_price" class="form-control" placeholder="Your Sale_Price ...">
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="kv-avatar">
                        <div class="file-loading">
                            <label for="">Uploads Image</label>
                            <input id="avatar-1" name="feature_image" type="file">
                        </div>
                    </div>

                    <label for="">Description</label>
                    <div class="card card-outline card-info">
                        <div class="card-body">
                            <textarea id="summernote" name="details" style="display: none;"> </textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Categories</label>

                    </div>
                </div>
                <div class="col-12 d-flex justify-content-center">
                    <button class="btn btn-sm btn-primary" type="submit">Save</button>
                    <button class="btn btn-sm btn-danger" type="submit">Cencal</button>
                </div>
            </div>
        </form>

    </div>


@endsection
