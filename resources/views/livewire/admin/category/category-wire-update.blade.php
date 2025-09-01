<div>
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

        <!-- begin:: Content Head -->
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    {{__('validation.attributes.update_category')}}
                </h3>
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
                                <a wire:navigate href="{{ route('admin.category.index') }}" class="btn btn-brand btn-elevate btn-icon-sm">
                                    <i class="la la-plus"></i>
                                    {{__('validation.massages.show_the_list')}}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end:: Content Head -->
    </div>
    <div class="d-flex justify-content-center align-items-center">
        @if($msg != '')
            <div class="alert alert-light alert-elevate w-25 @if($msg_status == 'success') alert-success @else alert-danger @endif">
                <i class="mx-3 fa @if($msg_status == 'success') fa-check-circle @else fa-times-circle @endif"></i>
                {{$msg}}
            </div>
        @endif
    </div>
    <div class="kt-content kt-grid__item kt-grid__item--fluid" id="kt_content">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                <i class="fa fa-plus text-primary mx-2"></i>
                                {{__('validation.attributes.update_category')}}
                                {{--                                @if(app()->getLocale() === 'fa')--}}
                                {{--                                    <span>زبان جاری: فارسی</span>--}}
                                {{--                                @else--}}
                                {{--                                    <span>Current Language: English</span>--}}
                                {{--                                @endif--}}
                            </h3>
                        </div>
                    </div>
                    <form class="kt-form" wire:submit.prevent="edit">
                        <div class="kt-portlet__body">
                            <div class="form-group">
                                <label>{{__('validation.attributes.fa_title')}}</label>
                                <input wire:model="name" :key="$name" value="{{$category->title}}" type="text" class="form-control">
                                @error('name')
                                <div class="alert alert-danger">
                                    <i class="mx-3 fa fa-exclamation-triangle"></i>
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleSelect1">{{__('validation.attributes.category')}} {{__('validation.attributes.parent')}} </label>
                                <select autocomplete="off" wire:model="parent_id" :key="parent_id" class="form-control" id="exampleSelect1">
                                    <option value="">__انتخاب منوی والد __</option>
                                    @foreach($categories as $c)
                                        <option value="{{$c->id}}">
                                            @if(app()->getLocale()==='fa')
                                                {{$c->name}}
                                            @else
                                                {{$c->name_en ?? $m->name}}
                                            @endif
                                        </option>
                                    @endforeach
                                </select>

                            </div>

                            <label class="kt-checkbox kt-checkbox--brand">
                                <input wire:model.live="translate_check" type="checkbox">{{__('validation.massages.add_translation')}}
                                <span></span>
                            </label>
                            @if($translate_check)
                                <div class="form-group">
                                    <label>{{__('validation.attributes.en_title')}}</label>
                                    <input autocomplete="off" wire:model="translate_name" :key="translate_name" type="text" class="form-control" placeholder="{{__('validation.massages.enter_title')}}">
                                    @error('translate_name')
                                    <div class="alert alert-danger">
                                        <i class="mx-3 fa fa-exclamation-triangle"></i>
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            @endif
                        </div>
                        <div class="kt-portlet__foot">
                            <div class="kt-form__actions kt-form__actions--center">
                                <button type="submit"  class="btn btn-brand btn-elevate btn-icon-sm">
                                    <i class="la la-check-circle"></i>
                                    {{__('validation.attributes.submit')}}</button>
                                <button type="button" wire:click="clearForm" class="btn btn-secondary">{{__('validation.attributes.cancel')}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
