@extends('admin.master.admin_master')
@section('title')
    {{__('validation.attributes.list')}} {{__('validation.attributes.menu')}}
@endsection
@section('page_title')
    @yield('title')
@endsection
@section('header_left')
    <div class="kt-portlet__head-toolbar">
        <div class="kt-portlet__head-wrapper">
            <div class="kt-portlet__head-actions">
                <div class="dropdown dropdown-inline">
                    <a href="{{route('menu.create')}}" class="btn btn-brand btn-elevate btn-icon-sm">
                        <i class="la la-plus"></i>
                        {{__('validation.attributes.add')}}
                    </a>
                    &nbsp;
                    <button type="button" class="btn btn-default btn-icon-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         <i class="la la-download"></i>{{__('validation.attributes.download')}} {{__('validation.attributes.file')}}
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <ul class="kt-nav">
                            <li class="kt-nav__section kt-nav__section--first">
                                <span class="kt-nav__section-text">{{__('validation.massages.select_export_type')}}</span>
                            </li>
                            <li class="kt-nav__item">
                                <a href="#" class="kt-nav__link">
                                    <i class="kt-nav__link-icon la la-print"></i>
                                    <span class="kt-nav__link-text">{{__('validation.attributes.print')}}</span>
                                </a>
                            </li>
                            <li class="kt-nav__item">
                                <a href="#" class="kt-nav__link">
                                    <i class="kt-nav__link-icon la la-copy"></i>
                                    <span class="kt-nav__link-text">{{__('validation.attributes.copy')}}</span>
                                </a>
                            </li>
                            <li class="kt-nav__item">
                                <a href="#" class="kt-nav__link">
                                    <i class="kt-nav__link-icon la la-file-excel-o"></i>
                                    <span class="kt-nav__link-text">{{__('validation.attributes.excel')}}</span>
                                </a>
                            </li>
                            <li class="kt-nav__item">
                                <a href="#" class="kt-nav__link">
                                    <i class="kt-nav__link-icon la la-file-text-o"></i>
                                    <span class="kt-nav__link-text">{{__('validation.attributes.file')}} CSV</span>
                                </a>
                            </li>
                            <li class="kt-nav__item">
                                <a href="#" class="kt-nav__link">
                                    <i class="kt-nav__link-icon la la-file-pdf-o"></i>
                                    <span class="kt-nav__link-text">{{__('validation.attributes.file')}} PDF  </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')

    <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
{{--        <div class="alert alert-light alert-elevate" role="alert">--}}
{{--            <div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>--}}
{{--            <div class="alert-text">--}}
{{--               پیام خطا--}}
{{--            </div>--}}
{{--        </div>--}}

        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
										<span class="kt-portlet__head-icon">
											<i class="kt-font-brand flaticon2-line-chart"></i>
										</span>
                    <h3 class="kt-portlet__head-title">
                        @yield('title')
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">

                <!--begin: Datatable -->
                <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
                    <thead>
                    <tr>
                        <th>{{__('validation.attributes.id')}}</th>
                        <th>{{__('validation.attributes.title')}}</th>
                        <th>{{__('validation.attributes.parent')}}</th>
                        <th>{{__('validation.attributes.status')}}</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>61715-075</td>
                        <td>China</td>
                        <td>Tieba</td>
                        <td nowrap></td>
                    </tr>
                    </tbody>
                </table>

                <!--end: Datatable -->
            </div>
        </div>
    </div>
@endsection
