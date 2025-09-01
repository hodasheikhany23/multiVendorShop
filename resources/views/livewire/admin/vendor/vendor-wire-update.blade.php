<div>
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

        <!-- begin:: Content Head -->
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    {{__('validation.attributes.update_vendor')}}
                </h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                <div class="kt-input-icon kt-input-icon--right kt-subheader__search kt-hidden">
                    <input type="text" class="form-control border-primary" placeholder="Search order..." id="generalSearch">
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
                                <a wire:navigate href="{{ route('admin.vendor.index') }}" class="btn btn-brand btn-elevate btn-icon-sm">
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
    <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
        @if($msg != null)
            <div class="alert alert-light alert-elevate w-25 @if($msg_status == 'success') alert-success @else alert-danger @endif">
                <i class="mx-3 fa @if($msg_status == 'success') fa-check-circle @else fa-times-circle @endif"></i>
                {{$msg}}
            </div>
        @endif
        @error('f_name')
        <div class="alert alert-light alert-elevate w-25 alert-danger">
            <i class="mx-3 fa fa-times-circle"></i>
            {{$message}}
        </div>
        @enderror
        @error('l_name')
        <div class="alert alert-light alert-elevate w-25 alert-danger">
            <i class="mx-3 fa fa-times-circle"></i>
            {{$message}}
        </div>
        @enderror
        @error('shop_name')
        <div class="alert alert-light alert-elevate w-25 alert-danger">
            <i class="mx-3 fa fa-times-circle"></i>
            {{$message}}
        </div>
        @enderror
        @error('phone')
        <div class="alert alert-light alert-elevate w-25 alert-danger">
            <i class="mx-3 fa fa-times-circle"></i>
            {{$message}}
        </div>
        @enderror
        @error('user_id')
        <div class="alert alert-light alert-elevate w-25 alert-danger">
            <i class="mx-3 fa fa-times-circle"></i>
            {{$message}}
        </div>
        @enderror
        @error('province')
        <div class="alert alert-light alert-elevate w-25 alert-danger">
            <i class="mx-3 fa fa-times-circle"></i>
            {{$message}}
        </div>
        @enderror
        @error('city')
        <div class="alert alert-light alert-elevate w-25 alert-danger">
            <i class="mx-3 fa fa-times-circle"></i>
            {{$message}}
        </div>
        @enderror
        @error('logo')
        <div class="alert alert-light alert-elevate w-25 alert-danger">
            <i class="mx-3 fa fa-times-circle"></i>
            {{$message}}
        </div>
        @enderror
        <div class="kt-portlet">
            <div class="kt-portlet__body kt-portlet__body--fit">
                <div class="kt-grid kt-wizard-v3 kt-wizard-v3--white" id="kt_wizard_v3" data-ktwizard-state="step-first">
                    <div class="kt-grid__item">

                        <!--begin: Form Wizard Nav -->
                        <div class="kt-wizard-v3__nav">
                            <div class="kt-wizard-v3__nav-items">
                                <a class="kt-wizard-v3__nav-item" href="#" data-ktwizard-type="step" @if($currentStep==1)data-ktwizard-state="current"@endif>
                                    <div class="kt-wizard-v3__nav-body">
                                        <div class="kt-wizard-v3__nav-label">
                                            <span>1</span>  {{__('validation.attributes.details')}}
                                        </div>
                                        <div class="kt-wizard-v3__nav-bar"></div>
                                    </div>
                                </a>
                                <a class="kt-wizard-v3__nav-item" href="#" data-ktwizard-type="step" @if($currentStep==2)data-ktwizard-state="current"@endif>
                                    <div class="kt-wizard-v3__nav-body">
                                        <div class="kt-wizard-v3__nav-label">
                                            <span>2</span> {{__('validation.attributes.shop_details')}}
                                        </div>
                                        <div class="kt-wizard-v3__nav-bar"></div>
                                    </div>
                                </a>
                                <a class="kt-wizard-v3__nav-item" href="#" data-ktwizard-type="step" @if($currentStep==3)data-ktwizard-state="current"@endif>
                                    <div class="kt-wizard-v3__nav-body">
                                        <div class="kt-wizard-v3__nav-label">
                                            <span>3</span> {{__('validation.attributes.contact_details')}}
                                        </div>
                                        <div class="kt-wizard-v3__nav-bar"></div>
                                    </div>
                                </a>
                                <a class="kt-wizard-v3__nav-item" href="#" data-ktwizard-type="step" @if($currentStep==4)data-ktwizard-state="current"@endif>
                                    <div class="kt-wizard-v3__nav-body">
                                        <div class="kt-wizard-v3__nav-label">
                                            <span>5</span> {{__('validation.attributes.review_and_submit')}}
                                        </div>
                                        <div class="kt-wizard-v3__nav-bar"></div>
                                    </div>
                                </a>
                                <a class="kt-wizard-v3__nav-item" href="#" data-ktwizard-type="step" @if($currentStep==6)data-ktwizard-state="current"@endif>
                                    <div class="kt-wizard-v3__nav-body">
                                        <div class="kt-wizard-v3__nav-label">
                                            <span>6</span> {{__('validation.attributes.add_english')}}
                                        </div>
                                        <div class="kt-wizard-v3__nav-bar"></div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <!--end: Form Wizard Nav -->
                    </div>
                    <div class="kt-grid__item kt-grid__item--fluid kt-wizard-v3__wrapper">

                        <!--begin: Form Wizard Form-->
                        <form class="kt-form" id="kt_form" wire:submit.prevent="edit">

                            <!--begin: Form Wizard Step 1-->
                            <div class="kt-wizard-v3__content" data-ktwizard-type="step-content" @if($currentStep==1)data-ktwizard-state="current"@endif>
                                <div class="kt-heading kt-heading--md"> {{__('validation.attributes.details')}}</div>
                                <div class="kt-form__section kt-form__section--first">
                                    <div class="kt-wizard-v3__form">
                                        <div class="form-group">
                                            <label>{{__('validation.attributes.user')}}</label>
                                            <select wire:model.live="user_id" name="user" class="form-control border-primary">
                                                <option value="">__</option>
                                                @foreach($users as $u)
                                                    <option value="{{$u->id}}">{{$u->id}} ___ {{$u->name}}__{{$u->phone}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>{{__('validation.attributes.f_name')}}</label>
                                            <input wire:model="f_name" type="text" class="form-control border-primary" name="name" placeholder="{{__('validation.attributes.f_name')}}">
                                        </div>
                                        <div class="form-group">
                                            <label>{{__('validation.attributes.l_name')}}</label>
                                            <input wire:model="l_name" type="text" class="form-control border-primary" name="name" placeholder="{{__('validation.attributes.l_name')}}">
                                        </div>
                                        <div class="form-group">
                                            <label>{{__('validation.auth.phone')}}</label>
                                            <input wire:model="phone" type="text" class="form-control border-primary" name="address2" placeholder="{{__('validation.auth.phone')}}">
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <label>{{__('validation.attributes.province')}}</label>
                                                    <select wire:model.live="province" name="country" class="form-control border-primary">
                                                        <option value="">__</option>
                                                        @foreach($provinces as $p)
                                                            @if(app()->getLocale()=='fa')
                                                                <option value="{{$p->id}}">{{$p->name}}</option>
                                                            @else
                                                                <option value="{{$p->id}}">{{$p->name_en}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <label>{{__('validation.attributes.city')}}</label>
                                                    <select wire:model.live="city" name="country" class="form-control border-primary">
                                                        <option value="">__</option>
                                                        @foreach($cities as $c)
                                                            @if(app()->getLocale()=='fa' || $c->name_en == null)
                                                                <option value="{{$c->id}}">{{$c->name}}</option>
                                                            @elseif(app()->getLocale()=='en' && $c->name_en != null)
                                                                <option value="{{$c->id}}">{{$c->name_en}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--end: Form Wizard Step 1-->

                            <!--begin: Form Wizard Step 2-->
                            <div class="kt-wizard-v3__content" data-ktwizard-type="step-content" @if($currentStep==2)data-ktwizard-state="current"@endif>
                                <div class="kt-heading kt-heading--md"> {{__('validation.attributes.shop_details')}}</div>
                                <div class="kt-form__section kt-form__section--first">
                                    <div class="kt-wizard-v3__form">
                                        <div class="form-group">
                                            <label> {{__('validation.attributes.shop_name')}}</label>
                                            <input wire:model="shop_name" type="text" class="form-control border-primary border-primary" name="shop_name" placeholder="{{__('validation.attributes.shop_name')}}">
                                        </div>
                                        <div class="form-group">
                                            <label>{{__('validation.attributes.description')}}</label>
                                            <textarea wire:model="description" class="form-text form-control-plaintext border-primary"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>{{__('validation.attributes.website')}}</label>
                                            <input wire:model="website" type="text" class="form-control border-primary " name="website" placeholder="{{__('validation.attributes.website')}}" >
                                        </div>
                                        <div class="form-group">
                                            <div class="position-relative">
                                                <!-- input-like container -->
                                                <div class="form-control d-flex flex-wrap align-items-center border-primary" style="min-height: 45px; cursor: pointer;" wire:click="toggleDropdown">
                                                    @if(count($selected) == 0)
                                                        <span class="text-muted">{{__('validation.attributes.categories')}}</span>
                                                    @endif

                                                    @foreach($selected as $sel)
                                                        <span class="badge bg-primary mx-2 mb-1 text-white text-center">
                                                                {{ $this->findNameById($items, $sel) ?? $sel }}
                                                            </span>
                                                    @endforeach
                                                    <input type="text" class="border-0 flex-grow-1 border-primary" placeholder="" style="outline: none; min-width: 50px;" readonly>
                                                </div>

                                                <!-- Dropdown list -->
                                                @if($dropdownOpen)
                                                    <ul class="dropdown-menu show mt-1 p-2"
                                                        style="display: block; position: absolute; width: 100%; max-height: 200px; overflow-y: auto; z-index: 1000;">

                                                        @php
                                                            $renderTree = function($items) use (&$renderTree) {
                                                                foreach ($items as $key => $value) {
                                                                    if (isset($value['id'])) {
                                                                        echo '<li class="form-check ms-4">
                                                                                <label class="kt-checkbox kt-checkbox--brand" for="item-'.$value['id'].'">
                                                                                    <input id="item-'.$value['id'].'" wire:model.live="selected" value="'.$value['id'].'" type="checkbox">
                                                                                    '.$value['name'].'
                                                                                    <span></span>
                                                                                </label>
                                                                              </li>';
                                                                    } else {
                                                                        echo '<li class="dropdown-header">'.$key.'</li>';
                                                                        echo '<ul class="ms-3">';
                                                                        $renderTree($value); // بازگشتی
                                                                        echo '</ul>';
                                                                        echo '<li><hr class="dropdown-divider"></li>';
                                                                    }
                                                                }
                                                            };
                                                        @endphp

                                                        {!! $renderTree($items) !!}
                                                    </ul>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-4">
                                                <div class="form-group">
                                                    <label>{{__('validation.attributes.logo')}}</label>
                                                    <input type="file" wire:model="logo" class="form-control">
                                                    @error('logo') <span class="text-danger">{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>{{__('validation.attributes.status')}}</label>
                                            <div class="kt-radio-inline">
                                                <label class="kt-radio">
                                                    <input wire:model="status" type="radio" name="radio2" value="1"> {{__('validation.attributes.active')}}
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio">
                                                    <input wire:model="status" type="radio" name="radio2" value="0"> {{__('validation.attributes.inactive')}}
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <!--end: Form Wizard Step 2-->

                            <!--begin: Form Wizard Step 3-->
                            <div class="kt-wizard-v3__content" data-ktwizard-type="step-content" @if($currentStep==3)data-ktwizard-state="current"@endif>
                                <div class="kt-heading kt-heading--md">{{__('validation.attributes.contact_details')}}</div>
                                <div class="kt-form__section kt-form__section--first">
                                    <div class="kt-wizard-v3__form">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label> {{__('validation.attributes.telegram')}}</label>
                                                <input wire:model="telegram" type="text" class="form-control border-primary border-primary" name="shop_name" placeholder="{{__('validation.attributes.telegram')}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label> {{__('validation.attributes.instagram')}}</label>
                                                <input wire:model="instagram" type="text" class="form-control border-primary border-primary" name="shop_name" placeholder="{{__('validation.attributes.instagram')}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label> {{__('validation.auth.email')}}</label>
                                                <input wire:model="email" type="text" class="form-control border-primary border-primary" name="shop_name" placeholder="{{__('validation.auth.email')}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label> {{__('validation.attributes.eata')}}</label>
                                                <input wire:model="eata" type="text" class="form-control border-primary border-primary" name="shop_name" placeholder="{{__('validation.attributes.eata')}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--end: Form Wizard Step 3-->

                            <!--begin: Form Wizard Step 4-->
                            <div class="kt-wizard-v3__content" data-ktwizard-type="step-content" @if($currentStep==4)data-ktwizard-state="current"@endif>
                                <div class="kt-heading kt-heading--md">{{__('validation.attributes.review_and_submit')}}</div>
                                <div class="kt-form__section kt-form__section--first">
                                    <div class="kt-wizard-v3__form">
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <label>{{__('validation.attributes.f_name')}}</label>
                                                    <input wire:model="f_name" type="text" class="form-control border-primary" disabled>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <label>{{__('validation.attributes.l_name')}}</label>
                                                    <input wire:model="l_name"  type="text" class="form-control border-primary" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <label>{{__('validation.auth.phone')}}</label>
                                                    <input wire:model="phone"  type="text" class="form-control border-primary" disabled >
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label>{{__('validation.attributes.province')}}</label>
                                                        @if($province != null)
                                                            @foreach($provinces as $p)
                                                                @if($p->id == $province)
                                                                    @if(app()->getLocale()=='fa')
                                                                        <input value="{{$p->name}}" type="text" class="form-control border-primary" disabled>
                                                                    @else
                                                                        <input value="{{$p->name_en}}" type="text" class="form-control border-primary" disabled>
                                                                    @endif
                                                                @endif
                                                            @endforeach
                                                        @else
                                                            <input type="text" class="form-control border-primary" disabled>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group">
                                                <label>{{__('validation.attributes.city')}}</label>
                                                @if($city != null)
                                                    @foreach($cities as $c)
                                                        @if($c->id == $city)
                                                            @if(app()->getLocale()=='fa')
                                                                <input value="{{$c->name}}" type="text" class="form-control border-primary" disabled>
                                                            @else
                                                                <input value="{{$c->name_en}}" type="text" class="form-control border-primary" disabled>
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                @else
                                                    <input type="text" class="form-control border-primary" disabled>
                                                @endif

                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label>{{__('validation.attributes.shop_name')}}</label>
                                                    <input wire:model="shop_name"  type="text" class="form-control border-primary" disabled name="locpostcode" >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group">
                                                <label>{{__('validation.attributes.website')}}</label>
                                                <input wire:model="website"  type="text" class="form-control border-primary" disabled name="locpostcode" >
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label>{{__('validation.attributes.category')}}</label>
                                                    <div class="form-control d-flex flex-wrap align-items-center border-primary" style="min-height: 45px; cursor: pointer;" wire:click="toggleDropdown">
                                                        @if(count($selected) == 0)
                                                            <span class="text-muted">{{__('validation.attributes.categories')}}</span>
                                                        @endif

                                                        @foreach($selected as $sel)
                                                            <span class="badge bg-primary mx-2 mb-1 text-white text-center">
                                                                {{ $this->findNameById($items, $sel) ?? $sel }}
                                                            </span>
                                                        @endforeach
                                                        <input type="text" class="border-0 flex-grow-1 border-primary" placeholder="" style="outline: none; min-width: 50px;" readonly>
                                                    </div>
                                                    {{--                                                    <input wire:model="selected"  type="text" class="form-control border-primary" disabled name="locpostcode" >--}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group">
                                                <label>{{__('validation.attributes.telegram')}}</label>
                                                <input wire:model="telegram"  type="text" class="form-control border-primary" disabled name="locpostcode" >
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label>{{__('validation.attributes.instagram')}}</label>
                                                    <input wire:model="instagram"  type="text" class="form-control border-primary" disabled name="locpostcode">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group">
                                                <label>{{__('validation.attributes.eata')}}</label>
                                                <input wire:model="eata"  type="text" class="form-control border-primary" disabled name="locpostcode" >
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label>{{__('validation.auth.email')}}</label>
                                                    <input wire:model="email"  type="text" class="form-control border-primary" disabled name="locpostcode" >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            {{--           step 5                 --}}
                            <div class="kt-wizard-v3__content" data-ktwizard-type="step-content" @if($currentStep==5)data-ktwizard-state="current"@endif>
                                <div class="kt-heading kt-heading--md"> {{__('validation.attributes.add_english')}}</div>
                                <div class="kt-form__section kt-form__section--first">
                                    <div class="kt-wizard-v3__form">
                                        <div class="form-group">
                                            <label>{{__('validation.attributes.f_name')}}</label>
                                            <input wire:model="f_name_en" type="text" class="form-control border-primary" name="name" placeholder="{{__('validation.attributes.f_name')}}">
                                        </div>
                                        <div class="form-group">
                                            <label>{{__('validation.attributes.l_name')}}</label>
                                            <input wire:model="l_name_en" type="text" class="form-control border-primary" name="name" placeholder="{{__('validation.attributes.l_name')}}">
                                        </div>
                                        <div class="form-group">
                                            <label>{{__('validation.attributes.shop_name')}}</label>
                                            <input wire:model="shop_name_en" type="text" class="form-control border-primary" name="name" placeholder="{{__('validation.attributes.shop_name')}}">
                                        </div>
                                        <div class="form-group">
                                            <label>{{__('validation.attributes.description')}}</label>
                                            <textarea wire:model="description_en" class="form-text form-control-plaintext border-primary"></textarea>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="kt-form__actions">
                                @if($currentStep>1)
                                    <a wire:click="previousStep" class="btn btn-secondary btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u">
                                        <i class="fa fa-long-arrow-alt-right"></i>
                                        {{__('validation.attributes.previous_step')}}
                                    </a>
                                @endif
                                @if($currentStep<$totalSteps)
                                    <a wire:click="nextStep" class="btn btn-brand btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u">
                                        @if($currentStep==4)
                                            {{__('validation.attributes.add_english')}} &nbsp;
                                        @else
                                            {{__('validation.attributes.next_step')}} &nbsp;
                                        @endif
                                        <i class="fa fa-long-arrow-alt-left"></i>
                                    </a>
                                @elseif($currentStep>=4)
                                    <button type="submit" class="btn btn-success btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u f-flex justify-content-between">
                                        <i class="fa fa-check-circle"></i>&nbsp;&nbsp;
                                        {{__('validation.attributes.submit')}}
                                    </button>
                                @endif
                                @if($currentStep==4)
                                    <button type="submit" class="btn btn-success btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u f-flex justify-content-between">
                                        <i class="fa fa-check-circle"></i>&nbsp;&nbsp;
                                        {{__('validation.attributes.submit')}}
                                    </button>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
