<x-app-layout>
    <div class="hero">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-5">
                    <div class="intro-excerpt">
                        <h1>Shop</h1>
                    </div>
                </div>
                <div class="col-lg-7">

                </div>
            </div>
        </div>
    </div>
    <!-- End Hero Section -->

    <div class="untree_co-section product-section before-footer-section">
        <div class="container">
            <div class="row">
                @foreach ($templates as $template)
                <div class="col-12 col-md-4 col-lg-3 mb-5">
                    <a class="product-item" href="#">
                        <img src="{{ asset('storage/' . $template->image_path) }}" class="img-fluid product-thumbnail">
            
                        <h3 class="product-title">{{ $template->name }}</h3>
                        <strong class="product-price">{{ number_format($template->price, 0) }} đ</strong>
            
                        <p class="category-text">Category: {{ $template->category->name }}</p>
            
                        <span class="icon-cross">
                            <img src="{{ asset('images/cross.svg') }}" class="img-fluid">
                        </span>
                    </a>
                </div>
            @endforeach            

            </div>
        </div>
    </div>
</x-app-layout>