@extends('Admin.layouts.Home')
@section('title', 'Thêm Banner')
@section('content')
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-md-3"></div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Thêm Banner</div>
                        <hr>
                        <form action="{{ route('showCreateBanner') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="input-1">Chi tiết</label>
                                <input type="text" name="title" class="form-control" id="name"
                                    placeholder="Nhập chi tiết ..." value="{{ old('title') }}">
                            </div>
                            <div class="priview-mg">
                                <img id="priview" src="" alt="" class="img-responsive">
                            </div>
                            <div class="form-group">
                                <div class="kv-avatar">
                                    <div class="file-loading">
                                        <label for="">Uploads Image <span class="text-danger">*</span></label>
                                        <input type="file" name="slides_image"  class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <h5>Trạng Thái</h5>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" value="1">
                                    <label class="form-check-label" for="">Enable</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" checked="checked" name="status"
                                        value="0">
                                    <label class="form-check-label" for="">Disable</label>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-sm btn-primary">Thêm</button>
                                <a href="" class="btn btn-sm btn-danger">Huỷ</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
