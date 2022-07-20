@extends('Admin.layouts.Home')
@section('content')
<div class="container-fluid">
	<div class="row mt-3">
		<div class="col-md-3"></div>
		<div class="col-lg-6">
			<div class="card">
				<div class="card-body">
					<div class="card-title">Thêm Danh Mục</div>
					<hr>
					<form action="" method="post">
						<div class="form-group">
							<label for="input-1">Tên Sản Phẩm</label>
							<input type="text" name="name" class="form-control" id="input-1"
								placeholder="Nhập sản phẩm ..." value="{{ old('name', $cates->name)  }}">
						</div>
                       <div class="card-body">
                        <div class="row">
                            <h5>Trạng Thái</h5>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status"  value="1">
                            <label class="form-check-label"  for="">Enable</label>
                        </div> 
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" checked="checked" name="status" value="0">
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
	<!--End Row-->

	<!--start overlay-->
	<div class="overlay toggle-menu"></div>
	<!--end overlay-->

</div>
@endsection