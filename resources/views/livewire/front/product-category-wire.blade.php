<div>
    <div class="w-100 top-page">
        <div class="container pt-2 pb-1">
            <div class="d-flex justify-content-between align-content-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">{{__('validation.attributes.home')}}</a></li>
                        @foreach($breadcrumb as $b)
                            <li class="breadcrumb-item {{ $loop->last ? 'active' : '' }}" aria-current="page"><a
                                    href="#">{{$b}}</a></li>
                        @endforeach
                    </ol>
                </nav>
                <a class="color-primary" style="font-weight: bold;font-size: 12px;"
                       href="#">{{__('validation.attributes.store')}}</a>
            </div>
        </div>
    </div>
    <div class="container mt-5 w-100 d-flex gap-5">
        <div class="d-flex flex-column flex-wrap w-25 gap-5">
            <div class="sidebar-top px-3">
                فیلتر محصولات
            </div>
            <div class="sidebar px-3 py-4">
                <h6>{{__('validation.attributes.category')}}</h6>
                <div class="cat-sidebar pb-2 border-bottom">
                    <div class="cat-sidebar-box">
                        <div class="ec-sidebar-wrap">
                            <!-- Sidebar Category Block -->
                            <div class="ec-sidebar-block">
                                @foreach($categories as $category)
                                    <div class="ec-sb-block-content">
                                        <ul>
                                            <li>
                                                <div class="ec-sidebar-block-item d-flex justify-content-between">
                                                    {{ app()->getLocale() == 'fa' ? $category->name : $category->name_en }}
                                                    <i class="bi bi-plus"></i>
                                                </div>
                                                @if($category->children->count())
                                                    <ul style="display: none;">
                                                        @foreach($category->children as $child)
                                                            <li class="py-2">
                                                                <div class="ec-sidebar-sub-item"><a>
                                                                        <input type="checkbox" class="checkbox">
                                                                        {{ app()->getLocale() == 'fa' ? $child->name : $child->name_en }}</a>
                                                                </div>
                                                                @if($child->children->count())
                                                                    <ul style="display: none;">
                                                                        @foreach($child->children as $subChild)
                                                                            <li class="ec-sidebar-sub-item py-1"><a style="font-size: 12px; color: #333333 !important;">
                                                                                    <input type="checkbox" class="checkbox"> {{ app()->getLocale() == 'fa' ? $subChild->name : $subChild->name_en }}</a>
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                @endif
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </li>
                                        </ul>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content w-75">
            <div class="sidebar-top px-3 d-flex justify-content-between">
                <div class="d-flex flex-row align-items-center">
                    <i class="bi bi-sort-down mx-2"></i>
                    مرتب سازی
                    <ul class="d-flex flex-row align-items-center m-0 px-4">
                        <li class="mx-2 btn btn-secondary">
                            جدید ترین
                        </li>
                        <li class="mx-2 btn btn-secondary">
                            محبوب ترین
                        </li>
                        <li class="mx-2 btn btn-secondary">
                           ارزان ترین
                        </li>
                        <li class="mx-2 btn btn-secondary">
                            گران ترین
                        </li>
                    </ul>
                </div>
                <div>
                    <button class="btn btn-secondary">
                        <i class="bi bi-grid"></i>
                    </button>
                    <button class="btn btn-secondary">
                        <i class="bi bi-list-task"></i>
                    </button>
                </div>
            </div>
            <div class="d-flex flex-wrap mt-5">
                @foreach($products as $p)
                    <div class="col-md-4 col-sm-6 mb-4">
                        <div class="product-card card p-0 pb-2 d-flex justify-content-center align-items-center">
                            <!-- نوار بالا با notch شبیه عکس (از طریق SVG mask). توجه: id یکتا با product id -->
                            <div class="card-top-curve w-100">
                                <svg viewBox="0 0 100 40" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
                                    <defs>
                                        <mask id="notchMask-{{ $p->id }}">
                                            <rect x="0" y="0" width="100" height="40" fill="white"/>
                                            <circle cx="50" cy="70" r="60" fill="black"/>
                                        </mask>
                                    </defs>

                                    <!-- نوار قرمز که با mask حفره می‌خورد -->
                                    <rect x="0" y="0" width="100" height="40" fill="#d3522a" mask="url(#notchMask-{{ $p->id }})"/>
                                </svg>
                            </div>

                            <!-- عنوان زیر نوار -->
                            <div class="text-center mt-2 px-3 mb-3">
                                <h6 class="product-cat">{{ $str }}</h6>
                                <h6 class="product-title">{{ $p->name }}</h6>
                            </div>

                            <div class="text-center px-3">
                                @if($p->mainImage)
                                    <img src="{{ asset('storage/' . $p->mainImage->path) }}" class="product-img" alt="{{ $p->name }}">
                                @elseif($p->media->count() > 0)
                                    <img src="{{ asset('storage/' . $p->media->first()->path) }}" class="product-img" alt="{{ $p->name }}">
                                @else
                                    <img src="{{ asset('images/no-image.png') }}" class="product-img" alt="No image">
                                @endif
                            </div>

                            <div class="card-body w-100 d-flex justify-content-between ">
                                <div class="mb-3">
                                    <span class="text-warning">&#9733;&#9733;&#9733;&#9733;<span class="text-secondary">&#9733;</span></span>
                                    <br>
                                    <span class="badge @if($p->quantity < 5)badge-danger @else badge-success @endif px-2 py-1" style="font-size: 10px;">موجودی: {{$p->quantity}} عدد </span>
                                </div>
                                <h6 class="fw-bold mb-2">{{ number_format($p->price) }}<span style="font-size: 10px; color: var(--color-gray-300);">تومان</span><br><del style="font-size: 12px; color: var(--color-danger)">{{ number_format($p->price) }}</del> </h6>
                            </div>
                            <div class="w-100 d-flex justify-content-between px-3">
                                <a wire:navigate href="{{route('store.product.detail',['slug'=>$slug,'product'=>$p->id])}}" class="btn btn-secondary d-flex justify-content-between align-items-center">مشاهده<i class="d-flex bi bi-arrow-left-short"></i></a>
                                <a href="#" class="btn btn-primary"><i class="bi bi-heart text-white"></i> </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
