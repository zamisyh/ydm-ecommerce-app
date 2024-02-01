<div>
    @section('title', 'Cart')
    @section('css')
        <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    @endsection

    @livewire('client.components.header')

    <div>
        <section id="about" class="about">
            <a href="{{ route('client.home') }}" class="text-4xl font-bold underline -mt-10">Keranjang Kamu</a>


            <div class="flex flex-wrap justify-between">
                <div>
                    @if ($alertSuccess)
                        <div role="alert" class="alert alert-success mt-10">
                            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6"
                                fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>Pesan kamu sudah terkonfirmasi dan akan dikirim ke meja
                                {{ $this->nomor_meja ?? 0 }}</span>
                        </div>
                    @endif
                    @foreach ($cart as $item)
                        <div class="flex gap-10 m-2 mt-14">
                            <div>
                                <img class="h-48 w-48"
                                    src="{{ asset('storage/images/products/' . $item->attributes->image) }}"
                                    alt="" srcset="">
                            </div>
                            <div>
                                <h1 class="text-3xl font-bold">{{ $item->name }}</h1>
                                <h4 class="text-xl font-thin mt-2">{{ $item->attributes->description }}</h4>
                                <div class="flex justify-content-around flex-wrap mt-5 gap-10">
                                    <div>
                                        <span class="text-2xl font-bold">Rp. {{ number_format($item->price) }}</span>
                                    </div>
                                    <div>
                                        <span class="text-2xl font-thin">x{{ $item->quantity }}</span>
                                    </div>
                                    <div>
                                        <button wire:click="increment({{ $item->id }})"
                                            class="btn btn-primary btn-sm">+</button>
                                        <span class="text-xl">{{ $item->quantity }}</span>
                                        <button wire:click="decrement({{ $item->id }})"
                                            class="btn btn-primary btn-sm">-</button>
                                    </div>
                                </div>
                                <div class="mt-7">
                                    <button type="button" wire:click="delete(({{ $item->id }}))"
                                        class="btn btn-error btn-sm">Delete</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="bg-white w-full xl:w-96 p-10 mt-0 mt-10 xl:mt-0 h-fit" style="height: fit-content">
                    <h1 class="text-black text-2xl font-bold underline">Rincian Belanja</h1>
                    @foreach ($cart as $summary)
                        <div class="flex justify-between flex-wrap gap-5 text-black mt-5 mb-5">
                            <div>
                                <span class="text-lg">{{ $summary->name }}</span>
                            </div>
                            <div>
                                <span class="text-lg">x{{ $summary->quantity }}</span>
                            </div>
                            <div>
                                <span class="text-lg">Rp.
                                    {{ number_format($summary->price * $summary->quantity) }}</span>
                            </div>
                        </div>
                    @endforeach
                    <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
                    <div class="flex flex-wrap justify-between text-black">
                        <div>
                            <span class="font-bold text-xl">Subtotal</span>
                        </div>
                        <div>

                        </div>
                        <div>
                            <span class="font-bold text-xl">Rp. {{ number_format(\Cart::getTotal()) }}</span>
                        </div>
                    </div>
                    <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

                    @if ($openFormMeja)
                        <div class="mb-5 text-black form-control">
                            <select name="nomor_meja" aria-placeholder="Masukkan nomor meja" id="nomor_meja"
                                wire:model='nomor_meja'>
                                <option value="">Pilih Nomor Meja</option>
                                @foreach ($dataMeja as $item)
                                    <option value="{{ $item->id }}">{{ $item->nomor_table }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif

                    <button wire:click="checkout" class="w-full btn btn-primary btn-lg">Checkout</button>
                </div>
            </div>
        </section>
    </div>


    {{-- @livewire('client.components.footer') --}}
</div>
