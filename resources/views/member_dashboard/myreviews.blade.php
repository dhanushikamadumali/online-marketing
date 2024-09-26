@extends('layouts.user_sidebar')

@section('dashboard-content')
<style>


</style>

<h4 class="py-2 px-2">My Reviews</h4>
<div class="d-flex justify-content-between align-items-center mt-4">
    <div class="button-tabs">
        <button class="tab-button mb-1 active" data-target="to-be-reviewed">To be Reviewed ({{ $toBeReviewedItems->count() }})</button>
        <button class="tab-button mb-1" data-target="history">History ({{ $reviewedItems->count() }})</button>
    </div>
</div>

<!-- To be reviewed Tab -->
<div id="to-be-reviewed" class="tab-content active">
    <div class="order-items mt-3">
        <div class="order-items-list px-3">
            @foreach ($toBeReviewedItems as $item)
                <div class="order-item d-flex align-items-center justify-content-between" style="padding: 10px; border-bottom: 1px solid #eaeaea;">
                    <div style="display: flex; align-items: center;">
                        <div style="margin-right: 15px;">
                            @if ($item->product->images->isNotEmpty())
                                <a href="#"><img src="{{ asset('storage/' . $item->product->images->first()->image_path) }}" alt="Product Image" width="70" height="auto"></a>
                            @endif
                        </div>
                        <div style="line-height: 1.5;">
                            <span style="font-weight: 600; font-size: 15px;">{{ $item->product->product_name }}</span><br>
                            <div>
                                <span class="me-2">Color: <span style="font-weight: 600;">{{ $item->color }}</span></span> | 
                                <span class="me-2 ms-2">Size: <span style="font-weight: 600;">{{ $item->size }}</span></span> |
                                <span class="ms-2">Qty: <span style="font-weight: 600;">{{ $item->quantity }}</span></span>
                            </div>
                            <h6 class="mt-2" style="font-weight: bold;">Rs {{ $item->cost }}</h6>  
                        </div>
                    </div>
                    <div class="ml-auto" style="text-align: right;">
                        <a href="" class="btn-review">Review</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<!-- History Tab -->
<div id="history" class="tab-content">
    <div class="order-items mt-3">
        <div class="order-items-list px-3">
            @foreach ($reviewedItems as $review)
                <div class="order-item row" style="padding: 10px; border-bottom: 1px solid #eaeaea;">
                    <div class="col-md-1 d-flex align-items-center">
                        <div style="margin-right: 15px;">
                            @if ($review->product->images->isNotEmpty())
                                <a href="#"><img src="{{ asset('storage/' . $review->product->images->first()->image_path) }}" alt="Product Image" width="70" height="auto"></a>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-3 d-flex flex-column justify-content-center border-end" style="border-right: 1px solid #eaeaea; font-size: 13px;">
                        <span style="font-weight: 600;">{{ $review->product->product_name }}</span>
                        <div>
                            @if ($review->orderItem) <!-- Check if orderItem exists -->
                                <span class="me-2">Color: <span style="font-weight: 600;">{{ $review->orderItem->color }}</span></span> | 
                                <span class="me-2 ms-2">Size: <span style="font-weight: 600;">{{ $review->orderItem->size }}</span></span> |
                                <span class="ms-2">Qty: <span style="font-weight: 600;">{{ $review->orderItem->quantity }}</span></span>
                            @else
                                <span class="me-2">Color: <span style="font-weight: 600;">N/A</span></span> | 
                                <span class="me-2 ms-2">Size: <span style="font-weight: 600;">N/A</span></span> |
                                <span class="ms-2">Qty: <span style="font-weight: 600;">N/A</span></span>
                            @endif
                        </div>
                        <h6 class="mt-2" style="font-size: 13px; font-weight: bold;">Rs {{ $review->orderItem->cost }}</h6>  
                    </div>

                    <div class="col-md-6 d-flex flex-column align-items-start border-end" style="border-right: 1px solid #eaeaea;">
                        <p class="m-0" style="font-weight: 500;">Feedback I left:</p>
                        <div class="rating text-warning mb-1" style="font-size: 20px;">
                            @for ($i = 1; $i <= 5; $i++)
                                <i class="{{ $i <= $review->rating ? 'fas' : 'far' }} fa-star"></i>
                            @endfor
                        </div>
                        <div class="review-description text-start">
                            <p style="font-size: 13px;">{{ $review->comment }}</p>
                        </div>
                    </div>
                    <div class="col-md-2 d-flex align-items-start justify-content-start">
                        <span class="">{{ $review->status === 'pending' ? 'Feedback is not published' : 'Feedback is published' }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>






<script>
    document.querySelectorAll('.tab-button').forEach(button => {
        button.addEventListener('click', function() {
            document.querySelectorAll('.tab-button').forEach(btn => btn.classList.remove('active'));
            document.querySelectorAll('.tab-content').forEach(content => content.classList.remove('active'));

            this.classList.add('active');
            document.getElementById(this.getAttribute('data-target')).classList.add('active');
        });
    });
</script>


@endsection
