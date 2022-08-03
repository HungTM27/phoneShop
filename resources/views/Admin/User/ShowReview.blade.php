@extends('Admin.layouts.Home')
@section('content')
    <div class="kt-grid__item kt-grid__item--fluid kt-app__content">
        <div class="row">
            <div class="col-xl-12">
                <div class="kt-portlet">
                    <form class="kt-form kt-form--label-right">
                        <div class="kt-portlet__body">
                            <div class="kt-section kt-section--first">
                                <div class="kt-section__body">
                                    <div class="row">
                                        <label class="col-xl-3"></label>
                                        <div class="col-lg-9 col-xl-6">
                                            <h3 class="kt-section__title kt-section__title-sm">Thông tin cá nhân:</h3>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Họ và tên</label>
                                        <div class="col-lg-9 col-xl-6"><input type="text" value="{{ $showReviewUser->username }}"
                                                readonly="readonly" class="form-control" /></div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Email</label>
                                        <div class="col-lg-9 col-xl-6"><input type="text" value="{{ $showReviewUser->email }}"
                                                readonly="readonly" class="form-control" /></div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Số Điện Thoại</label>
                                        <div class="col-lg-9 col-xl-6"><input type="text" value="{{ $showReviewUser->phone }}"
                                                readonly="readonly" class="form-control" /></div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Địa chỉ</label>
                                        <div class="col-lg-9 col-xl-6"><input type="text"
                                                value="{{ $showReviewUser->address }}" readonly="readonly"
                                                class="form-control" /></div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Quyền</label>
                                        <div class="col-lg-9 col-xl-6"><input type="text" value="{{ $showReviewUser->role == 1 ? 'Admin' : 'User'}}"
                                                readonly="readonly" class="form-control" /></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
