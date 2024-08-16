@extends('layouts.affiliate_main.master')

@section('content')

<main style="margin-top: 58px">
    <div class="container pt-4 px-4"> 
        <h3 class="py-3">AD Center</h3>
        <ul class="nav nav-tabs mb-3" id="myTab0" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab0" data-bs-toggle="tab" data-bs-target="#hot_deals" type="button"
                    role="tab" aria-controls="hot_deals" aria-selected="true">
                    Hot Deals
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="commision-tab0" data-bs-toggle="tab" data-bs-target="#commision" type="button"
                    role="tab" aria-controls="commision" aria-selected="false">
                    Higher Commision
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="products-tab0" data-bs-toggle="tab" data-bs-target="#products" type="button"
                    role="tab" aria-controls="products" aria-selected="false">
                    Featured Products
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="search-tab0" data-bs-toggle="tab" data-bs-target="#search" type="button"
                    role="tab" aria-controls="search" aria-selected="false">
                    Search
                </button>
            </li>
        </ul>

        <div class="card">
            <div class="card-body">
                <div class="tab-content" id="myTabContent0">
                    <!-- Hot Deals -->
                    <div class="tab-pane fade show active" id="hot_deals" role="tabpanel" aria-labelledby="home-tab0">
                        <form id="hotDealsForm" method="GET" action="{{ route('ad_center') }}">
                            <div class="row">
                                <div class="col-md-2 mb-3">
                                    <select id="categoriesHotDeals" name="category" class="form-select" style="font-size: 0.8rem;">
                                        <option value="all" {{ request('category') == 'all' ? 'selected' : '' }}>All Categories</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-2 mb-3">
                                    <select id="ship_from" class="form-select" style="font-size: 0.8rem;">
                                        <option selected>Ship From</option>
                                        <option value="1">United States</option>
                                        <option value="2">China</option>
                                        <option value="3">Germany</option>
                                    </select>
                                </div>

                                <div class="col-md-2 mb-3">
                                    <select id="currency" class="form-select" style="font-size: 0.8rem;">
                                        <option selected>Currency</option>
                                        <option value="USD">USD</option>
                                        <option value="EUR">EUR</option>
                                        <option value="JPY">JPY</option>
                                    </select>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="free_shipping" style="transform: scale(0.8);">
                                        <label class="form-check-label" for="free_shipping" style="font-size: 0.8rem;">
                                            Free Shipping
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <!-- Display Products -->
                        <div class="container mt-4 mb-4">
                            <div class="row">
                                @foreach($hotDeals as $product)
                                    <div class="col-md-3">
                                        <div class="deal-items">
                                            <a href="#">
                                                <img src="{{ asset('storage/' . $product->product_image) }}" alt="{{ $product->product_name }}" class="img-fluid">
                                                <p>{{ $product->product_name }}</p>
                                                <p class="description">{{ $product->product_description }}</p>
                                                <div class="price mb-2">Rs.{{ $product->total_price }}</div>
                                                @php
                                                    $commissionPrice = $product->total_price - $product->affiliate_price;
                                                @endphp
                                                <div class="commission mb-2">
                                                    Est. Commission Rs. {{ $commissionPrice }} | {{ $product->commission_percentage }}%
                                                </div>
                                                <a href="#" class="btn btn-primary btn_promote">Promote Now</a>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Higher Commission -->
                    <div class="tab-pane fade" id="commision" role="tabpanel" aria-labelledby="commision-tab0">
                        <form id="highComForm" method="GET" action="{{ route('ad_center') }}">
                            <div class="row">
                                <div class="col-md-2 mb-3">
                                    <select id="categoriesHighCom" name="category" class="form-select" style="font-size: 0.8rem;">
                                        <option value="all" {{ request('category') == 'all' ? 'selected' : '' }}>All Categories</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-2 mb-3">
                                    <select id="ship_from" class="form-select" style="font-size: 0.8rem;">
                                        <option selected>Ship From</option>
                                        <option value="1">United States</option>
                                        <option value="2">China</option>
                                        <option value="3">Germany</option>
                                    </select>
                                </div>

                                <div class="col-md-2 mb-3">
                                    <select id="currency" class="form-select" style="font-size: 0.8rem;">
                                        <option selected>Currency</option>
                                        <option value="USD">USD</option>
                                        <option value="EUR">EUR</option>
                                        <option value="JPY">JPY</option>
                                    </select>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="free_shipping" style="transform: scale(0.8);">
                                        <label class="form-check-label" for="free_shipping" style="font-size: 0.8rem;">
                                            Free Shipping
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <!-- Display Products -->
                        <div class="container mt-4 mb-4">
                            <div class="row">
                                @foreach($highCom as $product)
                                    <div class="col-md-3 mb-4">
                                        <div class="deal-items">
                                            <a href="#">
                                                <img src="{{ asset('storage/' . $product->product_image) }}" alt="{{ $product->product_name }}" class="img-fluid">
                                                <p>{{ $product->product_name }}</p>
                                                <p class="description">{{ $product->product_description }}</p>
                                                <div class="price mb-2">Rs.{{ $product->total_price }}</div>
                                                @php
                                                    $commissionPrice = $product->total_price - $product->affiliate_price;
                                                @endphp
                                                <div class="commission mb-2">
                                                    Est. Commission Rs. {{ $commissionPrice }} | {{ $product->commission_percentage }}%
                                                </div>
                                                <a href="#" class="btn btn-primary btn_promote">Promote Now</a>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Featured Products -->
                    <div class="tab-pane fade" id="products" role="tabpanel" aria-labelledby="products-tab0">
                        Tab 3 content
                    </div>

                    <!-- Search -->
                    <div class="tab-pane fade" id="search" role="tabpanel" aria-labelledby="search-tab0">
                        <!-- Search content here -->
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var categorySelectHotDeals = document.getElementById('categoriesHotDeals');
        var categorySelectHighCom = document.getElementById('categoriesHighCom');

        categorySelectHotDeals.addEventListener('change', function() {
            document.getElementById('hotDealsForm').submit();
        });

        categorySelectHighCom.addEventListener('change', function() {
            document.getElementById('highComForm').submit();
        });
    });
</script>

@endsection
