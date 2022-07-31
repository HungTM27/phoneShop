@extends('Admin.layouts.Home')
@section('title', 'Thêm sản phẩm')
@section('content')
    <div class="card-body">
        <form action="{{ route('storeProducts') }}" method="POST" enctype="multipart/form-data">
           {{ csrf_field() }}
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" placeholder="Your Text Name ...">
                    </div>
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <div class="form-group">
                        <label for="">Price <span class="text-danger">*</span></label>
                        <input type="text" name="price" class="form-control" placeholder="Your Text Price ...">
                    </div>
                    @error('price')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <div class="form-group">
                        <label for="">Sale_Price <span class="text-danger">*</span></label>
                        <input type="text" name="sale_price" class="form-control" placeholder="Your Sale_Price ...">
                    </div>
                    @error('sale_price')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <div class="form-group">
                        <label for="">Status</label>
                        <select name="status" class="form-control">
                            @foreach (config('common.status_products') as $k => $val)
                                <option value="{{ $k }}">{{ $val }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="priview-mg">
                        <img id="priview" src="" alt="" class="img-responsive">
                    </div>
                    <div class="kv-avatar">
                        <div class="file-loading">
                            <label for="">Uploads Image <span class="text-danger">*</span></label>
                            <input id="avatar-1" name="feature_image" type="file"  class="form-control"
                             onchange="encodeImageFileAsURL(this)">
                        </div>
                    </div>
                    @error('feature_image')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <div class="form-group">
                        <label for="">Số Lượng <span class="text-danger">*</span></label>
                        <input type="text" name="quantity" class="form-control" placeholder="">
                    </div>
                    @error('quantity')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <label for="">Description <span class="text-danger">*</span></label>
                    <div class="card card-outline card-info">
                        <div class="card-body">
                            <textarea name="details" id="" cols="30" rows="3"></textarea>
                        </div>
                    </div>
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <div class="form-group">
                        <label for="">Categories <span class="text-danger">*</span></label>
                        <select name="cate_id" class="form-control">
                            @foreach ($cates as $cate)
                                <option @if ($cate->id == old('cate_id')) selected @endif value="{{ $cate->id }}">
                                    {{ $cate->name }}</option>
                            @endforeach
                        </select>
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

@push('scripts')
    <script>
        function encodeImageFileAsURL(element) {
            var file = element.files[0];
            var reader = new FileReader();
            reader.onloadend = function() {
                console.log('RESULT', reader.result)
                $('#priview').attr('src', reader.result);
            }
            reader.readAsDataURL(file);
        }
    </script>
@endpush
