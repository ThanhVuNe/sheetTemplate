@section('title', 'Chi tiết template')

<x-app-layout>
    <div class="hero">
        <div class="container">
            <h2 style="font-size: 50px; text-align: center; color: white">Chi tiết template {{ $template->name }}</h2>
        </div>
    </div>

    <div class="why-choose-section">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-7">
                    <div class="img-wrap">
                        <img src="{{ asset('storage/' . $template->image_path) }}" alt="Image" class="img-fluid">
                    </div>
                </div>
         <div class="col-lg-5">
            <div class="how-to-receive mt-5 p-4 bg-light rounded">
                <h3 class="text-dark font-weight-bold text-center">Làm thế nào để nhận sản phẩm?</h3>
                <ul class="receive-steps list-unstyled text-center mt-3">
                    <li><span class="step-number">1</span> Thêm vào giỏ hàng.</li>
                    <li><span class="step-number">2</span> Điền Gmail của bạn vào form.</li>
                    <li><span class="step-number">3</span> Nhận link tải ngay trong hộp thư.</li>
                    <li><span class="step-number">4</span> Tải về và khám phá ngay!</li>
                </ul>
                <p class="text-center text-success font-weight-bold">
                    ❤️ Hoàn toàn miễn phí – không rủi ro, nhiều giá trị.
                </p>
            </div>
            <div style="text-align: center">
                <h3 class="text-dark font-weight-bold">
                    <span style="font-size: 25px;">Giá tiền: </span>
                    @if($template->discount > 0)
                        <span class="" style="font-size: 25px; font-weight: bold;">
                            {{ number_format($template->price - ($template->price * $template->discount / 100), 0) }}đ
                        </span>
                    @endif
                    <span style="font-size: 25px; font-weight: bold; text-decoration: {{ $template->discount > 0 ? 'line-through' : 'none' }};">
                        @if($template->discount > 0)
                            ({{ number_format($template->price, 0) }}đ)
                        @else
                            {{ number_format($template->price, 0) }}đ
                        @endif
                    </span>
    
                </h3>
            
                <p class="text-success" style="font-size: 20px;">Giảm giá: {{ $template->discount }}%</p>
            
                {{-- <form action="{{ route('cart.add', $template->id) }}" method="POST"> --}}
                <form action="" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary mt-3">Thêm vào giỏ hàng</button>
                </form>
            </div>

        </div>

            </div>
        </div>
    </div>
</x-app-layout>
