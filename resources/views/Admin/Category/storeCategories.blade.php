@extends('Admin.layouts.Home')
@section('title', 'Thêm danh mục điện thoại')
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
						@csrf
						<div class="form-group">
							<label for="input-1">Tên Sản Phẩm</label>
							<input type="text" name="name" class="form-control" id="name"
								placeholder="Nhập sản phẩm ..." value="{{ old('name') }}">
						</div>
                        @error('name')
                        <p class="text-danger">{{ $message }}</p>
                       @enderror
					   <div class="form-group">
						<label for="input-1">Slug</label>
						<input type="text" name="slug"id="slug" class="form-control" onkeyup="ChangeToSlug();"
							placeholder="" value="">
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
<script>
	function ChangeToSlug()
{
    var name, slug;
 
 //Lấy text từ thẻ input title 
 title = document.getElementById("title").value;

 //Đổi chữ hoa thành chữ thường
 slug = title.toLowerCase();

 //Đổi ký tự có dấu thành không dấu
 slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
 slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
 slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
 slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
 slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
 slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
 slug = slug.replace(/đ/gi, 'd');
 //Xóa các ký tự đặt biệt
 slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
 //Đổi khoảng trắng thành ký tự gạch ngang
 slug = slug.replace(/ /gi, " - ");
 //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
 //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
 slug = slug.replace(/\-\-\-\-\-/gi, '-');
 slug = slug.replace(/\-\-\-\-/gi, '-');
 slug = slug.replace(/\-\-\-/gi, '-');
 slug = slug.replace(/\-\-/gi, '-');
 //Xóa các ký tự gạch ngang ở đầu và cuối
 slug = '@' + slug + '@';
 slug = slug.replace(/\@\-|\-\@|\@/gi, '');
 //In slug ra textbox có id “slug”
 document.getElementById('slug').value = slug;
}
</script>
@endsection