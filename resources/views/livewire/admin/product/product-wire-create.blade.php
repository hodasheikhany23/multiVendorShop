<div>
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

        <!-- begin:: Content Head -->
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    {{__('validation.attributes.create_product')}}
                </h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                <div class="kt-input-icon kt-input-icon--right kt-subheader__search kt-hidden">
                    <input type="text" class="form-control border-primary" placeholder="Search order..."
                           id="generalSearch">
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
                                <a wire:navigate href="{{ route('admin.product.index') }}"
                                   class="btn btn-brand btn-elevate btn-icon-sm">
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
            <div
                class="alert alert-light alert-elevate w-25 @if($msg_status == 'success') alert-success @else alert-danger @endif">
                <i class="mx-3 fa @if($msg_status == 'success') fa-check-circle @else fa-times-circle @endif"></i>
                {{$msg}}
            </div>
        @endif
        @error('name')
        <div class="alert alert-light alert-elevate w-25 alert-danger">
            <i class="mx-3 fa fa-times-circle"></i>
            {{$message}}
        </div>
        @enderror
        @error('name_en')
        <div class="alert alert-light alert-elevate w-25 alert-danger">
            <i class="mx-3 fa fa-times-circle"></i>
            {{$message}}
        </div>
        @enderror
        @error('vendor_id')
        <div class="alert alert-light alert-elevate w-25 alert-danger">
            <i class="mx-3 fa fa-times-circle"></i>
            {{$message}}
        </div>
        @enderror

        @error('price')
        <div class="alert alert-light alert-elevate w-25 alert-danger">
            <i class="mx-3 fa fa-times-circle"></i>
            {{$message}}
        </div>
        @enderror
        @error('quantity')
        <div class="alert alert-light alert-elevate w-25 alert-danger">
            <i class="mx-3 fa fa-times-circle"></i>
            {{$message}}
        </div>
        @enderror

        <div class="kt-portlet">
            <div class="kt-portlet__body kt-portlet__body--fit">
                <div class="kt-grid kt-wizard-v3 kt-wizard-v3--white" id="kt_wizard_v3"
                     data-ktwizard-state="step-first">
                    <div class="kt-grid__item">

                        <!--begin: Form Wizard Nav -->
                        <div class="kt-wizard-v3__nav">
                            <div class="kt-wizard-v3__nav-items">
                                <a class="kt-wizard-v3__nav-item" href="#" data-ktwizard-type="step"
                                   @if($currentStep==1)data-ktwizard-state="current"@endif>
                                    <div class="kt-wizard-v3__nav-body">
                                        <div class="kt-wizard-v3__nav-label">
                                            <span>1</span> {{__('validation.attributes.details')}}
                                        </div>
                                        <div class="kt-wizard-v3__nav-bar"></div>
                                    </div>
                                </a>
                                <a class="kt-wizard-v3__nav-item" href="#" data-ktwizard-type="step"
                                   @if($currentStep==2)data-ktwizard-state="current"@endif>
                                    <div class="kt-wizard-v3__nav-body">
                                        <div class="kt-wizard-v3__nav-label">
                                            <span>2</span> {{__('validation.attributes.attributes')}}
                                        </div>
                                        <div class="kt-wizard-v3__nav-bar"></div>
                                    </div>
                                </a>
                                <a class="kt-wizard-v3__nav-item" href="#" data-ktwizard-type="step"
                                   @if($currentStep==3)data-ktwizard-state="current"@endif>
                                    <div class="kt-wizard-v3__nav-body">
                                        <div class="kt-wizard-v3__nav-label">
                                            <span>3</span> {{__('validation.attributes.add_english')}}
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
                        <form class="kt-form" id="kt_form" wire:submit.prevent="save">

                            <!--begin: Form Wizard Step 1-->
                            <div class="kt-wizard-v3__content" data-ktwizard-type="step-content"
                                 @if($currentStep==1)data-ktwizard-state="current"@endif>
                                <div class="kt-heading kt-heading--md"> {{__('validation.attributes.details')}}</div>
                                <div class="kt-form__section kt-form__section--first">
                                    <div class="kt-wizard-v3__form">
                                        <div class="form-group">
                                            <label>{{__('validation.attributes.vendor')}}</label>
                                            <select wire:model.live="vendor_id" name="user"
                                                    class="form-control border-primary">
                                                <option value="">__</option>
                                                @foreach($vendors as $v)
                                                    <option value="{{$v->id}}">{{$v->id}} ___ {{$v->name}}
                                                        __{{$v->phone}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>{{__('validation.attributes.name')}}</label>
                                            <input wire:model="name" type="text" class="form-control border-primary"
                                                   name="name" placeholder="{{__('validation.attributes.f_name')}}">
                                        </div>
                                        <div class="form-group">
                                            <label>{{__('validation.attributes.description')}}</label>
                                            <textarea wire:model="description"
                                                      class="form-text form-control-plaintext border-primary"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>{{__('validation.attributes.price')}}</label>
                                            <div class="border-primary mx-3">
                                                <input wire:model="price" id="kt_touchspin_3"
                                                       placeholder="{{__('validation.attributes.price')}}" type="text"
                                                       class="form-control" value="0" name="demo1">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>{{__('validation.attributes.quantity')}}</label>
                                            <input wire:model="quantity" id="kt_touchspin_4" type="text"
                                                   class="form-control bootstrap-touchspin-vertical-btn px-5" value=""
                                                   name="demo1"
                                                   placeholder="{{__('validation.attributes.quantity')}}"
                                                   type="text">
                                        </div>
                                        <div class="form-group">
                                            <label>{{__('validation.attributes.status')}}</label>
                                            <div class="kt-radio-inline">
                                                <label class="kt-radio">
                                                    <input wire:model="status" type="radio" name="radio2"
                                                           value="1"> {{__('validation.attributes.active')}}
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio">
                                                    <input wire:model="status" type="radio" name="radio2"
                                                           value="0"> {{__('validation.attributes.inactive')}}
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--end: Form Wizard Step 1-->

                            <!--begin: Form Wizard Step 2-->
                            <div class="kt-wizard-v3__content" data-ktwizard-type="step-content"
                                 @if($currentStep==2)data-ktwizard-state="current"@endif>
                                <div class="kt-heading kt-heading--md"> {{__('validation.attributes.attributes')}}</div>
                                <div class="kt-form__section kt-form__section--first">
                                    <div class="kt-wizard-v3__form">
                                        <div class="form-group">
                                            <div class="position-relative">
                                                <!-- input-like container -->
                                                <div
                                                    class="form-control d-flex flex-wrap align-items-center border-primary"
                                                    style="min-height: 45px; cursor: pointer;"
                                                    wire:click="toggleDropdown">
                                                    @if(count($selected) == 0)
                                                        <span
                                                            class="text-muted">{{__('validation.attributes.categories')}}</span>
                                                    @endif

                                                    @foreach($selected as $sel)
                                                        <span class="badge bg-primary mx-2 mb-1 text-white text-center">
                                                                {{ $this->findNameById($items, $sel) ?? $sel }}
                                                            </span>
                                                    @endforeach
                                                    <input type="text" class="border-0 flex-grow-1 border-primary"
                                                           placeholder="" style="outline: none; min-width: 50px;"
                                                           readonly>
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
                                        <div class="row d-flex justify-content-between">
                                            @for($i=1; $i<=$formCount; $i++)
                                                <div class="form-group w-50">
                                                    <label>{{__('validation.attributes.attribute')}}</label>
                                                    <select wire:model="selected_attributes.{{$i}}.id" name="user"
                                                            class="form-control border-primary">
                                                        <option value="">__</option>
                                                        @foreach($attribute as $a)
                                                            <option value="{{$a->id}}">{{$a->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <label class="mt-3">{{__('validation.attributes.price')}}</label>
                                                    <input wire:model="selected_attributes.{{$i}}.price" type="text"
                                                           class="form-control border-primary"
                                                           name="name" placeholder="{{__('validation.attributes.price')}}">
                                                </div>
                                                <div class="form-group" style="width: 25%">
                                                    <label>{{__('validation.attributes.value')}}</label>
                                                    <input wire:model="selected_attributes.{{$i}}.value" type="text"
                                                           class="form-control border-primary"
                                                           name="name" placeholder="{{__('validation.attributes.value1-value2-value3')}}">
                                                    <label class="mt-3">{{__('validation.attributes.quantity')}}</label>
                                                    <input wire:model="selected_attributes.{{$i}}.quantity" type="text"
                                                           class="form-control border-primary"
                                                           name="name" placeholder="{{__('validation.attributes.quantity')}}">
                                                </div>
                                                <div class="form-group d-flex justify-content-between align-items-end align-content-end" style="width: 20%">
                                                    <button wire:click="addForm" type="button" class="btn btn-primary d-flex justify-content-center align-items-center">
                                                        + {{__('validation.attributes.add')}}
                                                    </button>
                                                    <button wire:click="deleteForm" type="button" class="btn btn-primary d-flex justify-content-center align-items-center">
                                                        _ {{__('validation.attributes.delete')}}
                                                    </button>
                                                </div>
                                            @endfor
                                        </div>
                                        <label>{{__('validation.attributes.image')}}
                                            <label>{{__('validation.attributes.product')}}</label></label>
                                        <div class="row">
                                            <div id="product-dropzone"
                                                 class="dropzone d-flex justify-content-center align-items-center flex-column border-primary">
                                                <i class="fa fa-images"
                                                   style="font-size: 24px; color:var(--color-main)"></i>

                                                <p class="mt-2 text-sm text-gray-500">
                                                    {{__('validation.attributes.Drop_files_or_upload')}}
                                                </p>
                                            </div>
                                            <div class="grid grid-cols-4 gap-4 mt-4">
                                                @foreach($images as $index => $image)
                                                    <div class="relative border rounded p-2">
                                                        <img src="{{ $image->temporaryUrl() }}"
                                                             class="w-full h-32 object-cover rounded"/>

                                                        <button wire:click="removeImage({{ $index }})"
                                                                class="absolute top-1 right-1 bg-red-500 text-white px-2 py-1 text-xs rounded">
                                                            حذف
                                                        </button>

                                                        <div class="mt-2">
                                                            <input type="radio"
                                                                   wire:click="setMainImage({{ $index }})"
                                                                {{ $mainImage === $index ? 'checked' : '' }}>
                                                            تصویر اصلی
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>

                                            @push('scripts')
                                                <script>
                                                    Dropzone.options.productDropzone = {
                                                        url: '#',
                                                        autoProcessQueue: false,
                                                        addRemoveLinks: true,
                                                        init: function () {
                                                            this.on("addedfile", file => {
                                                            @this.upload('images.' + @this.images.length, file)
                                                                ;
                                                            });
                                                        }
                                                    };
                                                </script>
                                            @endpush
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <!--end: Form Wizard Step 2-->
                            <div class="kt-wizard-v3__content" data-ktwizard-type="step-content"
                                 @if($currentStep==3)data-ktwizard-state="current"@endif>
                                <div
                                    class="kt-heading kt-heading--md"> {{__('validation.attributes.add_english')}}</div>
                                <div class="kt-form__section kt-form__section--first">
                                    <div class="kt-wizard-v3__form">
                                        <div class="form-group">
                                            <label>{{__('validation.attributes.name')}}</label>
                                            <input wire:model="name_en" type="text" class="form-control border-primary"
                                                   name="name" placeholder="{{__('validation.attributes.name')}}">
                                        </div>
                                        <div class="form-group">
                                            <label>{{__('validation.attributes.description')}}</label>
                                            <textarea wire:model="description_en"
                                                      class="form-text form-control-plaintext border-primary"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="kt-form__actions">
                                @if($currentStep>1)
                                    <a wire:click="previousStep"
                                       class="btn btn-secondary btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u">
                                        <i class="fa fa-long-arrow-alt-right"></i>
                                        {{__('validation.attributes.previous_step')}}
                                    </a>
                                @endif
                                @if($currentStep<$totalSteps)
                                    <a wire:click="nextStep"
                                       class="btn btn-brand btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u">
                                        @if($currentStep==4)
                                            {{__('validation.attributes.add_english')}} &nbsp;
                                        @else
                                            {{__('validation.attributes.next_step')}} &nbsp;
                                        @endif
                                        <i class="fa fa-long-arrow-alt-left"></i>
                                    </a>
                                @elseif($currentStep>=2)
                                    <button type="submit"
                                            class="btn btn-success btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u f-flex justify-content-between">
                                        <i class="fa fa-check-circle"></i>&nbsp;&nbsp;
                                        {{__('validation.attributes.submit')}}
                                    </button>
                                @endif
                                @if($currentStep==4)
                                    <button type="submit"
                                            class="btn btn-success btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u f-flex justify-content-between">
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
