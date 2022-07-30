@extends('Admin.layouts.Home')
@section('title', 'Sửa sản phẩm')
@section('content')
<div class="card-body">
  <form action="" method="POST" enctype="multipart/form-data">
    @csrf
      <div class="row">
          <div class="col-md-6">
              <div class="form-group">
                  <label for="">Name</label>
                  <input type="text" name="name"  class="form-control" placeholder="Your Text Name ..." value="{{old('name', $products->name)}}">
              </div>
              <div class="form-group">
                <label for="">Price</label>
                <input type="text" name="price"  class="form-control" placeholder="Your Text Price ..." value="{{old('name', $products->price)}}">
              </div>
              
              <div class="form-group">
                <label for="">Sale_Price</label>
                <input type="text" name="sale_price"  class="form-control" placeholder="Your Sale_Price ..." value="{{old('name', $products->sale_price)}}" >
          </div>
          <div class="form-group">
            <label for="">Status</label>
              <select name="status" class="form-control">
                @foreach(config('common.status_products') as $k => $val)
                <option value="{{$k}}">{{$val}}</option>
                @endforeach
              </select>
          </div>
          <div class="form-group">
            <label for="">Categories</label>
            <select name="cate_id" class="form-control" >
                @foreach($cates as $c)
                <option 
                    @if($c->id == old('cate_id', $products->cate_id))
                    selected
                    @endif
                value="{{$c->id}}">{{$c->name}}</option>
                @endforeach
            </select>
          </div>
          </div>
            <div class="col-md-6">
              <div class="img-show">
                  <img src="{{ asset($products->feature_image) }}" width="150px">
              </div>
                <div class="kv-avatar">
                  <div class="file-loading">
                    <label for="">Uploads Image</label>
                      <input id="avatar-1" name="feature_image" class="form-control" type="file">
                  </div>
              </div>

              <div class="form-group">
                <label for="">Số Lượng</label>
                <input type="text" name="quantity" class="form-control" placeholder="" value="{{ old('quantity', $products->quantity) }}">
            </div>
              <label for="">Description</label>
              <div class="card card-outline card-info">
                <div class="card-body">
                 <textarea name="details" id="" cols="30" rows="3">{{ old('details', $products->details) }}</textarea>
                </div>
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