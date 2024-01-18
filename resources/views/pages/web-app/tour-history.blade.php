<x-layouts.web-app-layout>
    <x-slot name="title">
        Tour History
    </x-slot>
    <div class="page-title-area ptb-100">
        <div class="container">
            <div class="page-title-content">
                <h1>My Tour History</h1>
            </div>
        </div>
        <div class="bg-image">
            <img src="{{ asset('assets/web-app/img/page-title-area/cart.jpg') }}" alt="Demo Image" />
        </div>
    </div>
    <section id="cart" class="cart-section pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="cart-table-container">
                        <table class="table table-cart">
                            <thead>
                                <tr>
                                    <th class="product-col">Package Title</th>
                                    <th>Status</th>
                                    <th class="price-col">Price</th>
                                    <th class="qty-col">Persons</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transitions as $data)
                                    <tr class="product-row">
                                        <td class="product-col">
                                            <figure class="product-image-container">
                                                <a href="#" class="product-image">
                                                    <img src="{{ asset('storage/' . $data->package->place->thumbnail) }}" width=100% style="aspect-ratio:1.67" alt="product" />
                                                </a>
                                            </figure>
                                            <h3 class="product-title">
                                                <a href="#">{{ Str::limit($data->package->title, 30, '...') }}</a>
                                            </h3>
                                        </td>
                                        <td>
                                            @if ($data->status == 'verified')
                                                <span class="badge bg-success">Verified</span>
                                            @else
                                                <span class="badge bg-danger">Un Verified</span>
                                            @endif
                                        </td>
                                        <td>PKR {{ explode('.', $data->package->price)[0] }}</td>
                                        <td>{{ $data->persons }} </td>
                                        <td>{{ explode('.', $data->total_amount)[0] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cart-summary">
                        <h3>Verified Payments Summary</h3>
                        <table class="table table-totals">
                            <tbody>
                                <tr>
                                    <td>Total Orders</td>
                                    <td>{{ $total_transitions }}</td>
                                </tr>
                                <tr>
                                    <td>Total Persons</td>
                                    <td>{{ $persons }}</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td>Grand Total</td>
                                    <td>PKR {{ $grand_total }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.web-app-layout>
