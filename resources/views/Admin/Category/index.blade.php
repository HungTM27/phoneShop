@extends('Admin.layouts.Home')
@section('content')
	<div class="row">
		<form action="" method="GET">
			<div class="input-group">
				<div class="form-outline">
				<input type="search" id="form1" name="search" class="form-control" placeholder="Search..." />
				<button type="submit" class="btn btn-primary">
					<i class="fas fa-search"></i>
				</button>
				</div>
				
			</div>
		</form>
	</div>
	<div class="col-md-12">
		<div class="table-responsive">
			<table class="table" id="data-table">
				<thead>
					<tr>
						<th scope="col">ID</th>
						<th scope="col">Name</th>
						<th scope="col">Status</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				@foreach ($cates as $cate )
					<tbody>
						<tr>
							<td>{{ $loop->iteration }}</td>
							<td>{{ $cate->name }}</td>
							<td>
								<div class="form-group">
									<div class="custom-control custom-switch">
									  <input type="checkbox" class="custom-control-input"
									   {{($cate->status) ? 'checked' : ''}}
										 onclick="changeUserStatus(event.target, {{ $cate->id }});">
									  <label class="custom-control-label pointer"></label>
								   </div>
								</div>
							</td>
							<td>
								<a href="" class="btn btn-sm btn-success"><i
										class="fa fa-plus" aria-hidden="true"></i></a>
								<a href=""
									class="btn btn-sm btn-info "><i class="fa fa-edit"></i></a>
								<a href="{{ route('destroy',$cate->id) }}"
									class="btn btn-sm btn-danger btn-remove"><i class="fa fa-trash"></i>
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
	$(document).ready(function(){
	    $('.btn-remove').on('click', function(){
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

	function changeUserStatus(_this, id) {
    var status = $(_this).prop('checked') == true ? 1 : 0;
    let _token = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: `/change-status`,
        type: 'post',
        data: {
            _token: _token,
            id: id,
            status: status 
        },
        success: function (result) {
        }
    });
}
</script>
@endsection