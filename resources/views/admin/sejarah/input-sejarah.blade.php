<h2 class="mt-7 text-3xl font-bold">Input Sejarah Kantor Desa Tirto Sari</h2>
<form action="{{ route('admin.sejarah') }}" method="POST" enctype="multipart/form-data"
    class="grid w-full max-w-[1300px] grid-cols-2">
    @csrf
    <div>
        <div class="flex flex-col gap-3">
            <div class="block">
                <h3 class="mt-5 font-semibold">Input Gambar</h3>
                <input type="file" id="img" name="gambar" required
                    class="mt-2 block w-full text-sm text-slate-500 file:mr-4 file:rounded-full file:border file:border-violet-500 file:bg-violet-50 file:px-3 file:py-2 file:text-sm file:font-semibold file:text-violet-700 hover:file:bg-violet-100" />
            </div>
            <label for="img" class="flex flex w-[450px] items-center justify-center">
                <div id="text"
                    class="flex h-[200px] w-full items-center justify-center rounded-md border-4 border-dotted border-black text-xl font-semibold">
                    Masukkan Gambar
                </div>
            </label>
            <div class="flex hidden h-[200px] max-h-[200px] w-[450px] shrink-0 items-center justify-center"
                id="gambar">
                <img id='preview_img' class="h-full max-h-[200px] object-cover" />
            </div>
        </div>

        <div class="flex w-[450px] flex-col">
            <label class="mb-2 mt-5 font-semibold" for="sejarah">Sejarah</label>
            <textarea name="sejarah" id="sejarah" cols="59" rows="7" required
                class="resize-none rounded-md border border-black p-2"></textarea>
        </div>
    </div>
    <div class="px-2">
        <div class="flex flex-col gap-3">
            <label for="visi" class="mb-1 mt-5 text-xl font-semibold">Visi</label>
            <div id="visiContainer">
                <div class="my-2 flex items-center gap-2">
                    <input type="text" name="visi[]" class="w-full border border-black p-2" required>
                    <button tabindex="-1"
                        class="removeVisi pointer-events-none flex h-max w-max items-center justify-center rounded-md bg-red-500 px-2 py-1 font-semibold text-white opacity-0">Hapus</button>
                </div>
            </div>
            <button id="addVisi" type="button"
                class="h-max w-max rounded-md bg-green-500 px-2 py-1 font-semibold text-white">Tambah</button>
        </div>
        <div class="flex flex-col gap-3">
            <label for="misi" class="mb-1 mt-5 text-xl font-semibold">Misi</label>
            <div id="misiContainer">
                <div class="flex items-center gap-2">
                    <input type="text" name="misi[]" class="w-full border border-black p-2" required>
                    <button tabindex="-1"
                        class="removeVisi pointer-events-none flex h-max w-max items-center justify-center rounded-md bg-red-500 px-2 py-1 font-semibold text-white opacity-0">Hapus</button>
                </div>
            </div>
            <button id="addMisi" type="button"
                class="h-max w-max rounded-md bg-green-500 px-2 py-1 font-semibold text-white">Tambah</button>
        </div>
    </div>
    <div class="col-span-2 flex items-center justify-center p-3">
        <button type="submit" class="bg-green-500 px-3 py-2 font-bold text-white">Submit</button>
    </div>
</form>

<script>
    document.querySelector('#addVisi').addEventListener('click', (e) => {
        const visiContainer = document.querySelector('#visiContainer');
        const newVisi = document.createElement('div');
        newVisi.innerHTML = `
                            <input type="text" name="visi[]" class="w-full border border-black p-2">
                            <button class="removeVisi h-max w-max rounded-md bg-red-500 px-2 py-1 font-semibold text-white">Hapus</button>
                        `;
        newVisi.classList.add('flex', 'items-center', 'gap-2', 'my-2');

        visiContainer.appendChild(newVisi);

        newVisi.querySelector('.removeVisi').addEventListener('click', () => {
            visiContainer.removeChild(newVisi);
        });
    });

    document.querySelector('#addMisi').addEventListener('click', () => {
        const misiContainer = document.querySelector('#misiContainer');
        const newMisi = document.createElement('div')
        newMisi.classList.add('flex', 'gap-2', 'items-center', 'my-2')

        newMisi.innerHTML = `
                            <input type="text" name="misi[]" class="w-full border border-black p-2">
                            <button class="removeMisi flex items-center justify-center h-max w-max rounded-md bg-red-500 px-2 py-1 font-semibold text-white">Hapus</button>
                        `
        misiContainer.appendChild(newMisi)

        newMisi.querySelector('.removeMisi').addEventListener('click', () => {
            misiContainer.removeChild(newMisi);
        })
    })

    document.querySelector("#img").addEventListener('change', e => {
        var input = event.target;
        var file = input.files[0];
        var type = file.type;

        var output = document.getElementById('preview_img');
        var gambar = document.querySelector('#gambar')
        var text = document.querySelector('#text')

        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            if (gambar.classList.contains('hidden')) {
                gambar.classList.remove('hidden');
                gambar.classList.add('block')
                text.classList.add('hidden');
            }
            URL.revokeObjectURL(output.src)
        }


    });
</script>
