<aside class="flex w-56 flex-col justify-between overflow-y-auto p-3">
    <div class="grid h-max gap-10">
        <div class="flex items-center gap-5 p-2">
            <img src="{{ asset('data/img/logo.png') }}" alt="logo" class="max-w-10">
            <span class="text-lg font-bold capitalize">{{ $user->name }}</span>
        </div>
        <div>
            <ul class="grid grid-cols-1 gap-5">
                <li>
                    <a href="{{ route('admin.dashboard') }}"
                        class="@if (request()->is('admin/dashboard')) bg-white shadow-sm @endif flex items-center gap-3 rounded-md px-3 py-2">
                        <span class="@if (request()->is('admin/dashboard')) bg-red-500 @endif rounded-md p-1"><svg
                                xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24">
                                <path fill="@if (request()->is('admin/dashboard')) white @else black @endif"
                                    d="M13.5 9V4H20v5h-6.5ZM4 12V4h6.5v8H4Zm9.5 8v-8H20v8h-6.5ZM4 20v-5h6.5v5H4Z" />
                            </svg></span>
                        <span class="@if (request()->is('admin/dashboard')) font-semibold @endif text-xl">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.data-user') }}"
                        class="@if (request()->is('admin/data-user')) bg-white shadow-sm @endif flex items-center gap-3 rounded-md px-3 py-2">
                        <span class="@if (request()->is('admin/data-user')) bg-red-500 @endif rounded-md p-1"><svg
                                xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24">
                                <path fill="@if (request()->is('admin/data-user')) white @else black @endif"
                                    d="M15.71 12.71a6 6 0 1 0-7.42 0a10 10 0 0 0-6.22 8.18a1 1 0 0 0 2 .22a8 8 0 0 1 15.9 0a1 1 0 0 0 1 .89h.11a1 1 0 0 0 .88-1.1a10 10 0 0 0-6.25-8.19ZM12 12a4 4 0 1 1 4-4a4 4 0 0 1-4 4Z" />
                            </svg></span>
                        <span class="@if (request()->is('admin/data-user')) font-semibold @endif text-xl">Data User</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.sejarah') }}"
                        class="@if (request()->is('admin/admin-sejarah')) bg-white shadow-sm @endif flex items-center gap-3 rounded-md px-3 py-2">
                        <span class="@if (request()->is('admin/admin-sejarah')) bg-red-500 @endif rounded-md p-1"><svg
                                xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24">
                                <path fill="@if (request()->is('admin/admin-sejarah')) white @else black @endif"
                                    d="M11.962 20q-3.047 0-5.311-1.99Q4.387 16.022 4.03 13h1.011q.408 2.58 2.351 4.29Q9.337 19 11.962 19q2.925 0 4.962-2.038T18.962 12q0-2.925-2.038-4.963T11.962 5q-1.552 0-2.918.656q-1.365.656-2.41 1.806h2.481v1H4.962V4.308h1v2.388q1.16-1.273 2.718-1.984Q10.238 4 11.962 4q1.663 0 3.118.626q1.455.626 2.542 1.713t1.714 2.543q.626 1.455.626 3.118q0 1.663-.626 3.118q-.626 1.455-1.714 2.543q-1.087 1.087-2.542 1.713q-1.455.626-3.118.626Zm3.203-4.146l-3.646-3.646V7h1v4.792l3.354 3.354l-.708.708Z" />
                            </svg></span>
                        <span class="@if (request()->is('admin/admin-sejarah')) font-semibold @endif text-xl">Sejarah</span>
                    </a>
                </li>
                <li>
                    {{-- <a href="#" --}}
                    <a href="{{ route('admin.admin-kegiatan') }}"
                        class="@if (request()->is('admin/kegiatan')) bg-white shadow-sm @endif flex items-center gap-3 rounded-md px-3 py-2">
                        <span class="@if (request()->is('admin/kegiatan')) bg-red-500 @endif rounded-md p-1"><svg
                                xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24">
                                <path fill="@if (request()->is('admin/kegiatan')) white @else black @endif"
                                    d="M11.962 20q-3.047 0-5.311-1.99Q4.387 16.022 4.03 13h1.011q.408 2.58 2.351 4.29Q9.337 19 11.962 19q2.925 0 4.962-2.038T18.962 12q0-2.925-2.038-4.963T11.962 5q-1.552 0-2.918.656q-1.365.656-2.41 1.806h2.481v1H4.962V4.308h1v2.388q1.16-1.273 2.718-1.984Q10.238 4 11.962 4q1.663 0 3.118.626q1.455.626 2.542 1.713t1.714 2.543q.626 1.455.626 3.118q0 1.663-.626 3.118q-.626 1.455-1.714 2.543q-1.087 1.087-2.542 1.713q-1.455.626-3.118.626Zm3.203-4.146l-3.646-3.646V7h1v4.792l3.354 3.354l-.708.708Z" />
                            </svg></span>
                        <span class="@if (request()->is('admin/kegiatan')) font-semibold @endif text-xl">Kegiatan</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div>
        <a href="{{ route('logout') }}" class="flex items-center gap-5 rounded-md px-3 py-2 text-xl text-red-400">
            <span><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24">
                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="1.5"
                        d="M13.496 21H6.5c-1.105 0-2-1.151-2-2.571V5.57c0-1.419.895-2.57 2-2.57h7M16 15.5l3.5-3.5L16 8.5m-6.5 3.496h10" />
                </svg></span>
            <span>Logout</span>
        </a>
    </div>
</aside>
