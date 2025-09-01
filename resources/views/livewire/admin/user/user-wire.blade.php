<div>
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
        <!-- begin:: Content Head -->
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">{{__('validation.attributes.list_users')}} </h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                <div class="kt-input-icon kt-input-icon--right kt-subheader__search kt-hidden">
                    <input type="text" class="form-control" placeholder="Search order..." id="generalSearch">
                    <span class="kt-input-icon__icon kt-input-icon__icon--right">
										<span><i class="flaticon2-search-1"></i></span>
									</span>
                </div>
            </div>
            <div class="kt-subheader__toolbar">
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                        <div class="kt-portlet__head-actions">
                            <div class="dropdown dropdown-inline">
                                <a wire:navigate href="{{ route('admin.module.create')}}" class="btn btn-brand btn-elevate btn-icon-sm">
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
                                            <a wire:navigate href="{{ route('admin.menu.create', ['locale' => app()->getLocale()]) }}" class="kt-nav__link">
                                                <i class="kt-nav__link-icon la la-print"></i>
                                                <span class="kt-nav__link-text">{{__('validation.attributes.print')}}</span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a wire:navigate href="{{ route('admin.menu.create', ['locale' => app()->getLocale()]) }}" class="kt-nav__link">
                                                <i class="kt-nav__link-icon la la-copy"></i>
                                                <span class="kt-nav__link-text">{{__('validation.attributes.copy')}}</span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a wire:navigate href="{{ route('admin.menu.create', ['locale' => app()->getLocale()]) }}" class="kt-nav__link">
                                                <i class="kt-nav__link-icon la la-file-excel-o"></i>
                                                <span class="kt-nav__link-text">{{__('validation.attributes.excel')}}</span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a wire:navigate href="{{ route('admin.menu.create', ['locale' => app()->getLocale()]) }}" class="kt-nav__link">
                                                <i class="kt-nav__link-icon la la-file-text-o"></i>
                                                <span class="kt-nav__link-text">{{__('validation.attributes.file')}} CSV</span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a wire:navigate href="{{ route('admin.menu.create', ['locale' => app()->getLocale()]) }}" class="kt-nav__link">
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

            </div>
        </div>
        <!-- end:: Content Head -->
    </div>

    <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
        {{--        <div class="alert alert-light alert-elevate" role="alert">--}}
        {{--            <div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>--}}
        {{--            <div class="alert-text">--}}
        {{--               پیام خطا--}}
        {{--            </div>--}}
        {{--        </div>--}}
        {{--        @if($msg != '')--}}
        {{--            <div class="alert alert-light alert-elevate w-25 @if($msg_status == 'info') alert-info @else alert-danger @endif">--}}
        {{--                <i class="mx-3 fa @if($msg_status == 'info') fa-check-circle @else fa-times-circle @endif"></i>--}}
        {{--                {{$msg}}--}}
        {{--            </div>--}}
        {{--        @endif--}}

        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__head kt-portlet__head-- align-items-center">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="kt-font-brand flaticon2-line-chart"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                        {{__('validation.attributes.list_users')}}
                    </h3>
                </div>
                <div class="dropdown dropdown-inline d-flex align-items-center w-25">
                    <label for="exampleSelect1" class="w-50">{{__('validation.attributes.per_page')}}</label>
                    <select autocomplete="off" wire:model.live="paginate_num" :key="paginate_num" class="form-control w-50" id="exampleSelect1">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="50">30</option>
                    </select>
                </div>

            </div>
            <div class="kt-portlet__body">

                <!--begin: Datatable -->
                <table class="table table-striped table-bordered table-hover table-checkable" id="kt_table_1">
                    <thead>
                    <tr>
                        <th class="w-auto">#</th>
                        <th>{{__('validation.auth.username')}}</th>
                        <th>{{__('validation.auth.phone')}}</th>
                        <th>{{__('validation.auth.role')}}</th>
                        <th>{{__('validation.attributes.created_at')}}</th>
                        <th class="text-center" style="width:100px;">{{__('validation.attributes.action')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $u)
                        <tr>
                            <td>{{$u->id}}</td>
                            <td>{{$u->name}}</td>
                            <td>{{$u->phone}}</td>
                            <td>
                                @switch($u->role)
                                    @case(0)
                                        <div class="badge bg-warning px-3">{{__('validation.attributes.user')}}</div>
                                        @break
                                    @case(1)
                                        <div class="badge bg-success px-3">{{__('validation.attributes.admin')}}<div>
                                        @break
                                    @case(2)
                                        <div class="badge bg-info px-3">{{__('validation.attributes.vendor')}}</div>
                                        @break
                                @endswitch
                            </td>
                            <td>
                                {{verta($u->created_at)->format('Y/m/d H:i:s')}}
                            </td>
                            <td class="text-center d-flex justify-content-between">
{{--                                <a wire:click="deleteMenu({{$m->id}})" class="text-danger btn btn-bolder border-danger btn-sm d-flex justify-content-center align-items-center" style="width:35px; height:35px;">--}}
{{--                                    <i class="fa fa-trash"></i>--}}
{{--                                </a>--}}
{{--                                <a wire:navigate href="{{ route('admin.menu.edit', ['menu' => $m->id ])}}"  class="text-info btn btn-bolder border-info btn-sm d-flex justify-content-center align-items-center" style="width:35px; height:35px; margin-left:5px;">--}}
{{--                                    <i class="fa fa-edit"></i>--}}
{{--                                </a>--}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

{{--                <div class="mt-2">--}}
{{--                    @if(app()->getLocale() === 'fa')--}}
{{--                        نمایش {{ $modules->firstItem() }} تا {{ $modules->lastItem() }} از {{ $modules->total() }} نتیجه--}}
{{--                    @endif--}}
{{--                </div>--}}
{{--                {{$modules->links()}}--}}
{{--                <!--end: Datatable -->--}}
            </div>
        </div>
    </div>

</div>
