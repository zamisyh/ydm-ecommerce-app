<div>
    @section('title', 'Admin Orders')

    <div class="drawer-content" x-data="{ drawer: false }">

        @include('livewire.admin.components.header')
        @include('livewire.admin.components.sidebar')


        <div class="px-5 mt-10" :class="{ 'lg:ml-80 lg:p-5 md:ml-80 md:p-5': drawer }">
            <div class="flex flex-wrap justify-between">
                <div>
                    <h1 class="text-4xl font-bold">Orders</h1>
                    <h3 class="mt-3 text-xl font-thin">This is page for manajement Order</h3>
                </div>
                <div class="text-sm breadcrumbs">
                    <ul>
                        <li>
                            <a>Home</a>
                        </li>
                        <li>Order</li>
                    </ul>
                </div>
            </div>

            <div class="mt-10 mb-5">

                <div class="flex flex-wrap justify-between">
                    <div>
                        <div class="flex">
                            <input wire:model='search' type="text" class="mb-4 input input-bordered"
                                placeholder="Searching..">
                            <div wire:loading wire:target='search'
                                class="w-12 h-12 ml-5 border-t-2 border-b-2 border-purple-500 rounded-full animate-spin">
                            </div>
                        </div>
                    </div>
                    <div>
                        <select wire:model='rows' class="mb-2 select select-bordered">
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="15">15</option>
                            <option value="20">20</option>
                            <option value="25">25</option>
                        </select>
                    </div>
                </div>
                <div class="container h-auto shadow-xl">
                    <h1 class="text-2xl font-bold underline mt-5 mb-5">Order Today</h1>
                    <div class="mt-3 overflow-x-auto flex flex-wrap justify-start gap-5">
                        @foreach ($orderToday as $key => $item)
                            <div>
                                <div class="card bg-base-100 shadow-xl w-72">
                                    <div class="card-body">
                                    <h2 class="card-title">[{{ $item->table->nomor_table }}] {{ $item->table->table_name }}</h2>
                                    <h4 class="text-xs -mt-2 mb-5">{{ $item->order_date }}</h4>

                                    <?php $total = 0;  ?>
                                    @foreach ($item->products as $product)
                                        <div class="flex flex-wrap justify-between">
                                            <div>
                                                <p class="text-sm">{{ $product->coffe_name }}</p>
                                            </div>
                                            <div>
                                                <p class="text-sm">x{{ $product->pivot->qty }}</p>
                                            </div>
                                            <div>
                                                <p class="text-sm">Rp. {{ number_format($product->pivot->total) }}</p>
                                            </div>
                                        </div>
                                        <hr class="h-px my-3  bg-gray-200 border-0 dark:bg-gray-700">

                                        <?php $total += $product->pivot->total ?>
                                    @endforeach

                                    <div class="flex flex-wrap justify-between">
                                        <div><p class="font-bold">Subtotal</p></div>
                                        <div><p class="font-bold">Rp. {{ number_format($total) }}</p></div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{-- <h1 class="text-2xl font-bold underline mt-10 mb-5">Orders</h1>
                    <div class="mt-3 overflow-x-auto flex flex-wrap justify-start gap-5">
                        <div>
                            <div class="card bg-base-100 shadow-xl w-72">
                                <figure><img src="https://daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.jpg" alt="Shoes" /></figure>
                                <div class="card-body">
                                  <h2 class="card-title">Shoes!</h2>
                                  <p>If a dog chews shoes whose shoes does he choose?</p>
                                </div>
                              </div>
                        </div>
                    </div> --}}
                </div>
                <div class="justify-center mt-5">
                    {{-- {{ $data['data_coffe']->links() }} --}}
                </div>
            </div>
        </div>
    </div>

</div>
