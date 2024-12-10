@extends('admin.layouts.app3')

@section('content')

    <style>
        .header {
            text-align: center;
            padding: 20px;
            background-color: #f8f9fa;
            border-bottom: 1px solid #ddd;
        }

        .cart-container {
            display: grid;
            gap: 20px;
            padding: 20px;
        }

        .cart-item {
            display: flex;
            align-items: center;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #fff;
        }

        .cart-item-image {
            width: 80px;
            height: 80px;
            border-radius: 8px;
            margin-right: 15px;
            object-fit: cover;
        }

        .cart-item-details {
            flex: 1;
        }

        .cart-item-title {
            font-size: 1.2em;
            margin-bottom: 8px;
        }

        .cart-item-price {
            color: #ff5722;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .quantity-input {
            width: 60px;
            padding: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-right: 10px;
        }

        .btn {
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .delete-btn {
            background-color: #ff4d4f;
            color: #fff;
        }

        .checkout-btn {
            display: block;
            text-align: center;
            background-color: #28a745;
            color: #fff;
            margin-top: 20px;
            text-decoration: none;
        }

        .cart-summary {
            text-align: right;
            margin-top: 20px;
        }

        .cart-empty {
            text-align: center;
            margin: 50px 0;
        }

        .cart-empty a {
            color: #007bff;
            text-decoration: none;
        }

        @media (max-width: 768px) {
            .cart-item {
                flex-direction: column;
                text-align: center;
            }

            .cart-item-image {
                margin-bottom: 15px;
            }
        }
    </style>

    <div class="main-content">
        <header class="header">
            <h1 class="header-title">Keranjang Belanja</h1>
            <p class="header-description">Kelola karya seni yang ingin Anda beli.</p>
        </header>

        <div class="cart-container">
            @if (session('cart') && count(session('cart')) > 0)
                @foreach (session('cart') as $id => $item)
                    <div class="cart-item">
                        <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['name'] }}" class="cart-item-image">
                        <div class="cart-item-details">
                            <h2 class="cart-item-title">{{ $item['name'] }}</h2>
                            <p class="cart-item-price" id="price-{{ $id }}">Rp
                                {{ number_format($item['price'], 0, ',', '.') }}</p>
                            <div class="cart-item-quantity">
                                <label for="quantity-{{ $id }}">Jumlah:</label>
                                <input type="number" id="quantity-{{ $id }}" name="quantity"
                                    value="{{ $item['quantity'] }}" class="quantity-input" data-price="{{ $item['price'] }}"
                                    data-id="{{ $id }}" min="1">
                            </div>
                            <form action="{{ route('arts.cart.remove', $id) }}" method="POST" class="cart-item-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn delete-btn">Hapus</button>
                            </form>
                        </div>
                    </div>
                @endforeach

                <div class="cart-summary">
                    <h2>Total: Rp <span
                            id="cart-total">{{ number_format(
                                array_sum(
                                    array_map(function ($item) {
                                        return $item['price'] * $item['quantity'];
                                    }, session('cart', [])),
                                ),
                                0,
                                ',',
                                '.',
                            ) }}</span>
                    </h2>
                    {{-- <a href="{{ route('checkout') }}" class="btn checkout-btn">Lanjutkan ke Pembayaran</a> --}}
                </div>
            @else
                <p class="cart-empty">Keranjang Anda kosong. <a href="{{ route('arts.index') }}">Belanja sekarang</a>.</p>
            @endif
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const quantityInputs = document.querySelectorAll('.quantity-input');
            const cartTotalElement = document.getElementById('cart-total');

            quantityInputs.forEach(input => {
                input.addEventListener('input', function() {
                    const pricePerItem = parseFloat(this.dataset.price);
                    const itemId = this.dataset.id;
                    const newQuantity = parseInt(this.value) || 1;
                    const newTotalPrice = pricePerItem * newQuantity;

                    // Update individual item price
                    const priceElement = document.getElementById(`price-${itemId}`);
                    priceElement.textContent = `Rp ${newTotalPrice.toLocaleString('id-ID')}`;

                    // Update cart total price
                    let cartTotal = 0;
                    quantityInputs.forEach(input => {
                        const itemPrice = parseFloat(input.dataset.price);
                        const quantity = parseInt(input.value) || 1;
                        cartTotal += itemPrice * quantity;
                    });

                    cartTotalElement.textContent = cartTotal.toLocaleString('id-ID');
                });
            });
        });
    </script>


@endsection
