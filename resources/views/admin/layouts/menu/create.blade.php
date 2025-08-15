@extends('admin.master.admin_master')

@section('title')
    {{__('validation.attributes.create')}} {{__('validation.attributes.menu')}}
@endsection

@section('page_title')
    @yield('title')
@endsection

@section('header_left')
    <div class="kt-portlet__head-toolbar">
        <div class="kt-portlet__head-wrapper">
            <div class="kt-portlet__head-actions">
                <div class="dropdown dropdown-inline">
                    <a href="{{route('menu.index')}}" class="btn btn-brand btn-elevate btn-icon-sm">
                        <i class="la la-plus"></i>
                        {{__('validation.massages.show_the_list')}}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="kt-content kt-grid__item kt-grid__item--fluid" id="kt_content">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                @yield('title')
                            </h3>
                        </div>
                    </div>
                    <form class="kt-form">
                        <div class="kt-portlet__body">
                            <div class="form-group">
                                <label>{{__('validation.attributes.title')}}</label>
                                <input type="email" class="form-control" placeholder="{{__('validation.massages.enter_title')}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleSelect1">{{__('validation.attributes.menu')}} {{__('validation.attributes.parent')}} </label>
                                <select class="form-control" id="exampleSelect1">
                                    <option>tst</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>{{__('validation.attributes.status')}}</label>
                                <div class="kt-radio-inline">
                                    <label class="kt-radio">
                                        <input type="radio" name="radio2"> {{__('validation.attributes.active')}}
                                        <span></span>
                                    </label>
                                    <label class="kt-radio">
                                        <input type="radio" name="radio2"> {{__('validation.attributes.inactive')}}
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="kt-portlet__foot">
                            <div class="kt-form__actions kt-form__actions--center">
                                <button type="reset" class="btn btn-brand btn-elevate btn-icon-sm">
                                    <i class="la la-check-circle"></i>
                                    {{__('validation.attributes.submit')}}</button>
                                <button type="reset" class="btn btn-secondary">{{__('validation.attributes.cancel')}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
