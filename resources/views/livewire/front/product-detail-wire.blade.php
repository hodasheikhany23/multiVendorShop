<div>
    <div class="w-100 top-page">
        <div class="container pt-2 pb-1">
            <div class="d-flex justify-content-between align-content-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">{{__('validation.attributes.home')}}</a></li>
                        @foreach($breadcrumb as $b)
                            <li class="breadcrumb-item" aria-current="page"><a
                                    href="#">{{$b}}</a></li>
                        @endforeach
                        <li class="breadcrumb-item active" aria-current="page"><a
                                href="#">{{$product_name}}</a></li>
                    </ol>
                </nav>
                <a class="color-primary" style="font-weight: bold;font-size: 12px;"
                   href="#">{{__('validation.attributes.store')}}</a>
            </div>
        </div>

        <div class="container mt-5 w-100 d-flex flex-row justify-content-between gap-5">
            <div class="d-flex flex-row gap-5 w-75">
                <div class="d-flex flex-row gap-3">
                    <div class="d-flex flex-column gap-3">
                        @if($product->media->count() > 0)
                            @foreach($product->media as $image)
                                @if($image->is_main == 0)
                                    <img width="100px" class="product-small-img"
                                         src="{{asset('storage/'.$image->path)}}"
                                @endif
                            @endforeach
                        @endif
                    </div>
                    <img class="product-detail-img" width="350px"
                         src="{{ asset('storage/' . $product->mainImage->path) }}">
                </div>
                <div class="product_detail_text w-50">
                    <div class="d-flex flex-row gap-2">
                        @foreach($breadcrumb as $b)
                            @if($loop->last)
                                <div class="product-detail-category w-auto">{{$b}}</div>
                            @endif
                        @endforeach
                    </div>
                    <div class="product-detail-name mt-4">
                        <h6>{{$product->name}}</h6>
                    </div>
                    <div class="product_rank">
                        <i class="bi bi-star-fill" style="color: goldenrod"></i>
                        <i class="bi bi-star-fill" style="color: goldenrod"></i>
                        <i class="bi bi-star-fill" style="color: goldenrod"></i>
                        <i class="bi bi-star-fill" style="color: goldenrod"></i>
                        <i class="bi bi-star" style="color: goldenrod"></i>
                    </div>
                    <div class="product-attributes mt-4 p-4 w-100">
                        <div class="d-flex flex-column w-100 gap-3">
                            <div class="d-flex w-100 justify-content-between">
                                {{__('validation.attributes.quantity')}}:
                                <span class="badge @if($product->quantity > 5) badge-success @else badge-danger @endif" >
                                    {{$product->quantity}} عدد
                                </span>
                            </div>
                            <div class="d-flex w-100 justify-content-between">
                                {{__('validation.attributes.price')}}:
                                <h6 class="fw-bold">{{ number_format($product->price) }}<span style="font-size: 10px; color: var(--color-gray-300);">تومان</span><br><del style="font-size: 12px; color: var(--color-danger)">{{ number_format($product->price) }}</del> </h6>
                            </div>
                            <div class="d-flex gap-4">
                                <button type="button" class="button">
                                    <span class="button__text" style="font-size: 12px">{{__('validation.attributes.add_to_cart')}}</span>
                                    <span class="button__icon"><i class="bi bi-bag text-white"></i> </span>
                                </button>
                                <a class="btn btn-danger text-white d-flex"><i class="d-flex justify-content-center align-items-center bi bi-heart"></i> </a>
                            </div>
                        </div>

                        <hr>
                        @foreach($attributs as $attributeName => $items)
                            <div class="d-flex flex-row align-items-start gap-2">
                                <p class="d-flex justify-content-between w-100">{{ $attributeName }}:</p>

                                @foreach($items as $item)
                                    @if($item->attribute_id == 3)
                                        <div class="p-1"
                                             style="display:inline-block; border-radius: 4px; background-color: var(--color-gray-150); border: 1px solid var(--color-gray-400)">
                                            <div class="color-attribute"
                                                 style="width:20px; height:20px; background-color: {{$item->value}};"></div>
                                        </div>
                                    @elseif($item->attribute_id == 7)
                                        <div class="p-1"
                                             style="display:inline-block; border-radius: 4px; background-color: var(--color-gray-150); border: 1px solid var(--color-gray-400)">
                                            <div class="size-attribute d-flex justify-content-center align-items-center"
                                                 style="width:20px; height:20px; color: var(--color-gray-800)">{{$item->value}}</div>
                                        </div>
                                    @else
                                        <p>{{ $item->value }}</p>
                                    @endif
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="product_detail_buy d-flex justify-content-start flex-column">
                <div class="button-bar d-flex flex-row gap-2 mb-5">
                    <a class="btn btn-secondary d-flex align-items-center justify-content-center">
                        <i class="d-flex align-items-center justify-content-center bi bi-share"></i>
                    </a>
                    <a class="btn btn-secondary d-flex align-items-center justify-content-center">
                        <i class="d-flex align-items-center justify-content-center bi bi-heart"></i>
                    </a>
                    <a class="btn btn-secondary d-flex align-items-center justify-content-center">
                        <i class="d-flex align-items-center justify-content-center bi bi-bag"></i>
                    </a>
                    <a class="btn btn-secondary d-flex align-items-center justify-content-center">
                        <i class="d-flex align-items-center justify-content-center bi bi-bell"></i>
                    </a>
                </div>
                <div class="p-2 mb-4" style="border: 1px solid var(--color-gray-200); border-radius: 4px;">
                    <div class="product-card card p-0 pb-2 d-flex justify-content-center align-items-center">
                        <!-- نوار بالا با notch شبیه عکس (از طریق SVG mask). توجه: id یکتا با product id -->
                        <div class="card-top-curve w-100">
                            <svg viewBox="0 0 100 40" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
                                <defs>
                                    <mask id="notchMask-{{ $product->id }}">
                                        <rect x="0" y="0" width="100" height="40" fill="white"/>
                                        <circle cx="50" cy="70" r="60" fill="black"/>
                                    </mask>
                                </defs>

                                <!-- نوار قرمز که با mask حفره می‌خورد -->
                                <rect x="0" y="0" width="100" height="40" fill="#d3522a"
                                      mask="url(#notchMask-{{ $product->id }})"/>
                            </svg>
                        </div>
                        <div class="p-4 pb-1 vendor-detail-box d-flex align-items-center">
                            <i class="bi bi-shop-window" style="font-size: 24px; font-weight: bolder;"></i>
                            <p class="mx-2" style="font-weight: bolder">{{$product->vendors->shop_name}}</p>
                        </div>
                        <div class="product_rank">
                            <i class="bi bi-star-fill" style="color: goldenrod"></i>
                            <i class="bi bi-star-fill" style="color: goldenrod"></i>
                            <i class="bi bi-star-fill" style="color: goldenrod"></i>
                            <i class="bi bi-star-fill" style="color: goldenrod"></i>
                            <i class="bi bi-star" style="color: goldenrod"></i>
                        </div>
                        <div class="d-flex justify-content-center align-items-center mt-3 flex-column w-100">
                            <div class="d-flex align-items-start justify-content-between w-75">
                                <p>{{__('validation.attributes.province')}}:</p> <span class="badge badge-secondary">{{$province->name}}</span>
                            </div>
                            <div class="d-flex align-items-start justify-content-between w-75">
                                <p>{{__('validation.attributes.city')}}:</p><span class="badge badge-secondary"> {{$city->name}}</span>
                            </div>
                        </div>


                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
