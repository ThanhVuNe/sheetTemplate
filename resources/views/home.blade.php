<x-app-layout>
    <div class="hero">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-5">
                    <div class="intro-excerpt">
                        <h1>Google Sheets Templates</h1>
                        <p class="mb-4">Quản lý mọi thông tin công việc cũng như cuộc sống</p>
                        <p><a href="{{ route('templates.index') }}" class="btn btn-secondary me-2">Mua ngay</a><a href="{{ route('templates.index') }}" class="btn btn-white-outline">Khám phá ngay</a></p>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="hero-img-wrap">
                        <img style="width: 100%; height: 300px" src="{{ asset('images/banner-home.png') }}" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="product-section">
        @foreach ($categories as $category)
        <div class="container">
            <div class="row">
                    {{-- <div class="col-12">
                        <h2 class="mb-4 section-title">{{ $category->name }}</h2> <!-- Hiển thị tên danh mục -->
                    </div> --}}

                    <div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
                        <h2 class="mb-4 section-title">{{ $category->name }}</h2>
                        <p class="mb-4">Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique. </p>
                        <p><a href="{{ route('templates.index', ['category' => $category->id]) }}" class="btn">Khám phá</a></p>
                    </div> 
            
                    @foreach ($category->templates->take(3) as $template)
                    <div class="col-12 col-md-4 col-lg-3 mb-5">
                        <a class="product-item" href="{{ route('templates.show', $template->id) }}">
                            <img src="{{ asset('storage/' . $template->image_path) }}" class="img-fluid product-thumbnail">
                            <h3 class="product-title">{{ $template->name }}</h3>
                            <strong class="product-price">
                                @if($template->discount > 0)
                                    <span style="text-decoration: line-through;">{{ number_format($template->price, 0) }} đ</span>
                                    <span class="text-danger">{{ number_format($template->price - ($template->price * $template->discount / 100), 0) }} đ</span>
                                @else
                                    {{ number_format($template->price, 0) }} đ
                                @endif
                            </strong>
                            <p class="category-text">Category: {{ $category->name }}</p>
                        </a>
                    </div>

                    @endforeach
                    
                    {{-- <div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
                        <a href="{{ route('templates.index', ['category' => $category->id]) }}" class="btn btn-primary">
                            Xem thêm
                    </a>
                </div> --}}
            </div>
    
            <!-- Button "Xem thêm" để chuyển đến trang danh mục -->

                </div>
                
                @endforeach
            </div>
    </div>
</x-app-layout>
