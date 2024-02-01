<div style="margin-top: -9px" class="fixed shadow-lg h-50 drawer" x-show='drawer' x-transition:enter.duration.500ms
    @click.away="drawer = false" x-transition:leave.duration.500ms>
    <div class="h-screen drawer-side">
        <label for="my-drawer" class="drawer-overlay"></label>
        <ul class="p-4 overflow-y-auto menu w-80 bg-base-100 text-base-content">
            <li>
                <a href="{{ route('client.home') }}">
                    <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M15 13L11 9V12H2V14H11V17M22 12H20V21H4V16H6V19H18V11L12 5L7 10H4L12 2L22 12Z" />
                    </svg>
                    <span class="ml-3">Home</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M13,3V9H21V3M13,21H21V11H13M3,21H11V15H3M3,13H11V3H3V13Z" />
                    </svg>
                    <span class="ml-3">Dashboard</span>
                </a>
            </li>
            <hr>
            <li>
                <a href="{{ route('admin.table') }}">
                    <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M2,2H16V16H2V2M22,8V22H8V18H18V8H22M4,4V14H14V4H4Z" />
                    </svg>
                    <span class="ml-3">Meja</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.products') }}">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M5 10.2c.6 0 1 .4 1 1v.2l6 3.5 6-3.5v-.2a1 1 0 1 1 2 0v.8c0 .4-.2.7-.5.9l-7 4a1 1 0 0 1-1 0l-7-4A1 1 0 0 1 4 12v-.8c0-.6.5-1 1-1Zm0 5c.6 0 1 .4 1 1v.2l6 3.4 6-3.4V16a1 1 0 1 1 2 0v.9c0 .3-.2.6-.5.8l-7 4a1 1 0 0 1-1 0l-7-4A1 1 0 0 1 4 17v-1c0-.5.4-1 1-1Z"
                            clip-rule="evenodd" />
                        <path
                            d="M12.5 2.1a1 1 0 0 0-1 0l-7 4a1 1 0 0 0 0 1.8l7 4c.3.2.7.2 1 0l7-4a1 1 0 0 0 0-1.7l-7-4Z" />
                    </svg>

                    <span class="ml-3">Products</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.orders') }}">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.3L19 7H7.3" />
                    </svg>
                    <span class="ml-3">Orders</span>
                </a>
            </li>
        </ul>
    </div>

</div>
