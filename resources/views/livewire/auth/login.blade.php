<div>
    @section('title', 'Login Page')
    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <div
                class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Sign in to your account
                    </h1>
                    <div class="space-y-2">
                        <div>
                            <label class="form-control">
                                <div class="label">
                                    <span class="label-text">Email</span>
                                </div>
                                <input type="text" wire:model="email" placeholder="Masukkan email"
                                    class="input input-bordered w-full @error('email')
                                        input-error
                                    @enderror" />
                                @error('email')
                                    <label>
                                        <span class="text-red-500 label-text-alt">{{ $message }}</span>
                                    </label>
                                @enderror
                            </label>
                        </div>
                        <div>
                            <label class="form-control">
                                <div class="label">
                                    <span class="label-text">Password</span>
                                </div>
                                <input type="password" wire:model="password" placeholder="**********"
                                    class="input input-bordered w-full @error('email')
                                        input-error
                                    @enderror" />
                                @error('password')
                                    <label>
                                        <span class="text-red-500 label-text-alt">{{ $message }}</span>
                                    </label>
                                @enderror
                            </label>
                        </div>
                        <div class="">
                            <div class="flex flex-row gap-5">
                                <div>
                                    <input type="checkbox" class="checkbox checkbox-primary checkbox-xs" /> Remember me
                                </div>
                            </div>
                        </div>
                        <div class="form-control">
                            <button wire:click="login" wire:loading.remove class="btn btn-primary mt-4">
                                Login
                            </button>
                            <button class="btn btn-primary mt-4" wire:loading wire:target="login"
                                disabled>Loading....</button>
                        </div>

                        @if ($isRedirect)
                            <script>
                                setTimeout(function() {
                                    window.location.href = "{{ route('admin.dashboard') }}";
                                }, 3000);
                            </script>
                        @endif

                        @if (Auth::check())
                            <script>
                                window.location.href = "{{ route('admin.dashboard') }}";
                            </script>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
