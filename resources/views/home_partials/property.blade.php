<section class="property" id="property">
    <div class="container">

        <p class="section-subtitle">Perumahan</p>

        <h2 class="h2 section-title">Daftar Perumahan</h2>

        <ul class="property-list has-scrollbar">

            @foreach ($houses as $house)
                <li>
                    <div class="property-card">
                        <figure class="card-banner">
                            <a href="#">
                                <img src="{{ asset('storage/' . $house->image) }}" alt="{{ $house->model }}"
                                    class="w-100">
                            </a>
                            <div class="card-badge {{ $house->status == 'Dijual' ? 'orange' : 'green' }}">
                                {{ $house->status }}</div>
                        </figure>
                        <div class="card-content">
                            <div class="card-price">
                                <strong>Rp.1.000.000</strong>/Bulan
                            </div>
                            <h3 class="h3 card-title">{{ $house->model }}</h3>
                            <ul class="card-list">
                                <li class="card-item">
                                    <strong>{{ $house->bedrooms }}</strong>
                                    <ion-icon name="bed-outline"></ion-icon>
                                    <span>Kamar</span>
                                </li>

                                <li class="card-item">
                                    <strong>{{ $house->bathrooms }}</strong>
                                    <ion-icon name="man-outline"></ion-icon>
                                    <span>Kamar Mandi</span>
                                </li>

                                <li class="card-item">
                                    <strong>{{ $house->size }}</strong>
                                    <ion-icon name="square-outline"></ion-icon>
                                    <span>Meter Persegi</span>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer">
                            <div class="card-author">
                                <div>
                                    <h4 class="author-name">William Seklo</h4>
                                    <p class="author-title">Estate Agents</p>
                                </div>
                            </div>

                            <div class="card-footer-actions">
                                @guest
                                    <a href="/auth/login" class="card-footer-actions-btn">
                                        <ion-icon name="add-circle-outline"></ion-icon>
                                    </a>
                                @endguest
                                @role('customer')
                                    <button class="card-footer-actions-btn confirm-btn" data-id="{{ $house->id }}">
                                        <ion-icon name="add-circle-outline"></ion-icon>
                                    </button>
                                @endrole
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach


        </ul>

    </div>
</section>

@push('scripts')
    <script>
        $('.confirm-btn').click(function() {
            Swal.fire({
                text: "Ingin mengajukan penawaran untuk properti ini?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Iya'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "/customer/setOffer/" + $(this).data('id')
                }
            })
        })
    </script>
@endpush
