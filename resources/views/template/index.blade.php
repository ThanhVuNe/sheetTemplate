@section('title', 'Danh sách Templates')

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
            <div class="row mb-4">
                <div class="col-md-3">
                    <select id="category-filter" class="form-select">
                        <option value="">Tất cả danh mục</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row">
                @foreach ($templates as $template)
                <div class="col-12 col-md-4 col-lg-3 mb-5">
                    <a class="product-item" href="{{ route('templates.show', $template->id) }}">
                        <img src="{{ asset('storage/' . $template->image_path) }}" class="img-fluid product-thumbnail">

                        <h3 class="product-title">{{ $template->name }}</h3>
                        <strong class="product-price" style="{{ $template->discount > 0 ? 'text-decoration: line-through; color: gray;' : '' }}">
                            {{ number_format($template->price, 0) }} đ
                        </strong>
                        
                        @if ($template->discount > 0)
                            <strong class="product-price ms-2">
                                {{ number_format($template->price - ($template->price * $template->discount / 100), 0) }} đ
                            </strong>
                            <div>
                                <span class="badge bg-success ms-2">-{{ $template->discount }}%</span>
                            </div>
                        @endif

                        <p class="category-text">{{ $template->category->name }}</p>

                        <span class="icon-cross">
                            <img src="{{ asset('images/cross.svg') }}" class="img-fluid">
                        </span>
                    </a>
                </div>
                @endforeach

            </div>

            <div class="pagination d-flex justify-content-center">
                {{ $templates->links('pagination::bootstrap-5') }}
            </div>            
        </div>

    </div>


    <script>
        document.getElementById('category-filter').addEventListener('change', function() {
            let selectedCategory = this.value;
            let baseUrl = "{{ route('templates.index') }}";
            let url = selectedCategory ? `${baseUrl}?category=${selectedCategory}` : baseUrl;
            window.location.href = url;
        });
    </script>
</x-app-layout>
