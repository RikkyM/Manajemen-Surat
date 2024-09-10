<nav id="sidebar"
    class="flex w-16 flex-col justify-between overflow-hidden bg-[#262626] transition-[width] duration-[.7s] ease-[cubic-bezier(0.79,0.14,0.15,0.86)]">
    <section>
        <div class="flex w-full items-center gap-3 whitespace-nowrap py-10 pl-3 pr-10 text-white">
            <div class="flex items-center gap-5">
                <span><img src="{{ asset('data/img/logo.png') }}" alt="" class="min-w-10 max-w-10"></span>
                <a href="{{ route('user.profile') }}"
                    class="grid text-base font-semibold text-white opacity-0 transition-[opacity] duration-[.7s]"
                    id="text">
                    <span>{{ Auth::user()->name }}</span>
                    <span class="text-xs">
                        {{-- {{ Debugbar::info($user) }} --}}
                        @if ($user && $user->nik !== null)
                            {{ $user->nik }}
                        @else
                            -
                        @endif
                    </span>
                </a>
            </div>
        </div>
        <div class="flex w-full flex-col justify-center text-white">
            <a href="{{ route('user.dashboard') }}"
                class="@if (request()->is('user/dashboard')) bg-white/10 before:content-[''] before:absolute before:w-1 before:h-full before:left-0 before:bg-blue-500 before:rounded-r-md @endif relative flex w-full items-center gap-3 whitespace-nowrap py-4 pl-5 pr-10">
                <span><svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 24 24">
                        <path fill="#fff"
                            d="M3 3h8v10H3zm2 2v6h4V5zm8-2h8v6h-8zm2 2v2h4V5zm-2 6h8v10h-8zm2 2v6h4v-6zM3 15h8v6H3zm2 2v2h4v-2z" />
                    </svg></span>
                <span class="text-sm font-semibold opacity-0 transition-[opacity] duration-[.7s]"
                    id="text">Dashboard</span>
            </a>

            <div>
                <button id="surat"
                    class="@if (request()->is('user/surat/domisili') ||
                            request()->is('user/surat/kematian') ||
                            request()->is('user/surat/usaha') ||
                            request()->is('user/surat/kehilangan')) before:h-[140px] @endif relative flex w-full items-center gap-3 whitespace-nowrap py-4 pl-5 pr-10 before:pointer-events-none before:absolute before:left-[33px] before:top-12 before:h-0 before:border-l-2 before:transition-[height] before:delay-[.1s] before:duration-[.3s] before:content-['']">
                    <span><svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 24 24">
                            <g fill="none" stroke="currentColor" stroke-width="2">
                                <rect width="16" height="12" x="4" y="6" rx="2" />
                                <path d="m4 9l7.106 3.553a2 2 0 0 0 1.788 0L20 9" />
                            </g>
                        </svg></span>
                    <span class="text-sm font-semibold opacity-0 transition-[opacity] duration-[.7s]"
                        id="text">Surat Keterangan</span>
                </button>
                <ul id="listSurat"
                    class="@if (request()->is('user/surat/domisili') ||
                            request()->is('user/surat/kematian') ||
                            request()->is('user/surat/usaha') ||
                            request()->is('user/surat/kehilangan')) h-40 @endif grid h-0 overflow-hidden text-base transition-[height] duration-[.5s]">
                    <div class="grid h-max gap-1 py-3">
                        <li>
                            <a href="{{ route('user.surat.domisili') }}"
                                class="@if (request()->is('user/surat/domisili')) text-blue-500 @endif before:size-5 relative ml-12 flex w-full px-3 py-1 font-semibold opacity-0 transition-[opacity] delay-[.3s] duration-[.4s] before:absolute before:-left-[15px] before:-top-1 before:rounded-es-lg before:border-b-2 before:border-l-2 before:content-['']"
                                id="sub">Domisili</a>
                        </li>
                        <li>
                            <a href="{{ route('user.surat.kematian') }}"
                                class="@if (request()->is('user/surat/kematian')) text-blue-500 @endif before:size-5 relative ml-12 flex w-full px-3 py-1 font-semibold opacity-0 transition-[opacity] delay-[.3s] duration-[.4s] before:absolute before:-left-[15px] before:-top-1 before:rounded-es-lg before:border-b-2 before:border-l-2 before:content-['']"
                                id="sub">Kematian</a>
                        </li>
                        <li>
                            <a href="{{ route('user.surat.usaha') }}"
                                class="@if (request()->is('user/surat/usaha')) text-blue-500 @endif before:size-5 relative ml-12 flex w-full px-3 py-1 font-semibold opacity-0 transition-[opacity] delay-[.3s] duration-[.4s] before:absolute before:-left-[15px] before:-top-1 before:rounded-es-lg before:border-b-2 before:border-l-2 before:content-['']"
                                id="sub">Usaha</a>
                        </li>
                        <li>
                            <a href="{{ route('user.surat.kehilangan') }}"
                                class="@if (request()->is('user/surat/kehilangan')) text-blue-500 @endif before:size-5 relative ml-12 flex w-full px-3 py-1 font-semibold opacity-0 transition-[opacity] delay-[.3s] duration-[.4s] before:absolute before:-left-[15px] before:-top-1 before:rounded-es-lg before:border-b-2 before:border-l-2 before:content-['']"
                                id="sub">Kehilangan</a>
                        </li>
                    </div>
                </ul>
            </div>
            <a href="{{ route('user.pengajuan') }}"
                class="relative flex w-full items-center gap-3 whitespace-nowrap py-4 pl-5 pr-10 before:pointer-events-none before:absolute before:left-[33px] before:top-12 before:h-0 before:border-l-2 before:transition-[height] before:delay-[.1s] before:duration-[.5s] before:content-['']">
                <span><svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 24 24">
                        <g fill="none" stroke="currentColor" stroke-width="2">
                            <path
                                d="M20 12v5c0 1.886 0 2.828-.586 3.414C18.828 21 17.886 21 16 21H6.5a2.5 2.5 0 0 1 0-5H16c1.886 0 2.828 0 3.414-.586C20 14.828 20 13.886 20 12V7c0-1.886 0-2.828-.586-3.414C18.828 3 17.886 3 16 3H8c-1.886 0-2.828 0-3.414.586C4 4.172 4 5.114 4 7v11.5" />
                            <path stroke-linecap="round" d="M9 8h6" />
                        </g>
                    </svg></span>
                <span class="text-sm font-semibold opacity-0 transition-[opacity] duration-[.7s]" id="text">Data
                    Pengajuan</span>
            </a>
        </div>
    </section>
    <section class="grid">
        <a href="{{ route('user.sandi') }}"
            class="flex w-full items-center gap-3 whitespace-nowrap py-4 pl-5 pr-10 text-white">
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 24 24">
                    <path fill="white"
                        d="M12 13a1.49 1.49 0 0 0-1 2.61V17a1 1 0 0 0 2 0v-1.39A1.49 1.49 0 0 0 12 13Zm5-4V7A5 5 0 0 0 7 7v2a3 3 0 0 0-3 3v7a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3v-7a3 3 0 0 0-3-3ZM9 7a3 3 0 0 1 6 0v2H9Zm9 12a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1v-7a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1Z" />
                </svg>
            </span>
            <span id="text" class="text-sm font-semibold opacity-0 transition-[opacity] duration-[.7s]">Ubah
                Sandi</span>
        </a>
        <a href="{{ route('logout') }}" class="flex items-center gap-3 whitespace-nowrap py-4 pl-5 pr-5 text-white">
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 24 24">
                    <path fill="red"
                        d="M5.615 20q-.69 0-1.152-.462Q4 19.075 4 18.385V5.615q0-.69.463-1.152Q4.925 4 5.615 4h6.404v1H5.615q-.23 0-.423.192Q5 5.385 5 5.615v12.77q0 .23.192.423q.193.192.423.192h6.404v1H5.615Zm10.847-4.462l-.702-.719l2.319-2.319H9.192v-1h8.887l-2.32-2.32l.703-.718L20 12l-3.538 3.538Z" />
                </svg>
            </span>
            <span id="text"
                class="text-sm font-semibold text-red-600 opacity-0 transition-[opacity] duration-[.7s]">
                Log Out
            </span>

        </a>
    </section>
</nav>
<script>
    const side = document.querySelector('#sidebar');
    const text = document.querySelectorAll('#text');
    const sub = document.querySelectorAll('#sub');
    const surat = document.querySelector('#surat');
    const listSurat = document.querySelector("#listSurat");

    if (surat.classList.contains('before:h-[140px]')) {
        surat.classList.add('before:h-[140px]')
        listSurat.classList.add('h-40')
        surat.classList.remove('before:h-0');
        listSurat.classList.remove('h-0')
    } else {
        surat.classList.remove('before:h-[140px]')
        listSurat.classList.remove('h-40')
        surat.classList.add('before:h-0');
        listSurat.classList.add('h-0')
    }

    surat.addEventListener('click', () => {
        listSurat.classList.toggle('h-40');
        listSurat.classList.toggle('h-0');
        surat.classList.toggle('before:h-[140px]');
        surat.classList.toggle('before:h-0');

        sub.forEach(item => {
            item.classList.toggle('opacity-0', listSurat.classList.contains('h-0'));
        });
    });

    side.addEventListener('mouseover', function() {
        this.classList.add('w-52');
        this.classList.remove('w-16');
        text.forEach(item => {
            item.classList.remove('opacity-0');
        });
        sub.forEach(item => {
            item.classList.toggle('opacity-0', listSurat.classList.contains('h-0'));
        });
    });

    side.addEventListener('mouseout', function() {
        this.classList.add('w-16');
        this.classList.remove('w-52');
        text.forEach(item => {
            item.classList.add('opacity-0');
        });
        sub.forEach(item => {
            item.classList.add('opacity-0');
        });
    });
</script>
