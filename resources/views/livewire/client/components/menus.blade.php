<div>
    <section id="menu" class="menu">
        <h2><span>Menu</span> Kami</h2>
        <p>
            kami memiliki beberapa menu di vibes coffee, diantaranya ada Moccacino Coffee, Cappucino Coffee, Americcano,
            dan Avocado Coffee
        </p>

        <div class="row">
           @foreach ($products as $item)
                <div class="menu-card align-items-center">
                    <img class="h-48 w-48" src="{{ asset('storage/images/products/' . $item->image) }}" alt="" srcset="">
                    <h3 class="menu-card-title">{{ $item->coffe_name }}</h3>
                    <p class="menu-card-price">Rp. {{ number_format($item->price) }}</p>
                    <button wire:click="addToCart({{ $item->id }})" class="btn mt-3 mb-4" type="button">Pesan</button>
                </div>
           @endforeach
        </div>
    </section>
</div>
