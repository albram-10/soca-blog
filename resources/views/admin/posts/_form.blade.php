@php $post = $post ?? null; @endphp

<div class="grid grid-cols-1 gap-5 max-w-2xl">
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Judul</label>
        <input type="text" name="title" value="{{ old('title', $post->title ?? '') }}" required
               class="w-full rounded-lg border-gray-300 focus:border-blue-600 focus:ring-blue-600 text-sm">
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
        <select name="category_id" required class="w-full rounded-lg border-gray-300 focus:border-blue-600 focus:ring-blue-600 text-sm">
            <option value="">Pilih kategori</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" @selected(old('category_id', $post->category_id ?? '') == $category->id)>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Penulis</label>
        <input type="text" name="author_name" value="{{ old('author_name', $post->author_name ?? 'SOCA Team') }}"
               class="w-full rounded-lg border-gray-300 focus:border-blue-600 focus:ring-blue-600 text-sm">
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Ringkasan (excerpt)</label>
        <textarea name="excerpt" rows="2"
                  class="w-full rounded-lg border-gray-300 focus:border-blue-600 focus:ring-blue-600 text-sm">{{ old('excerpt', $post->excerpt ?? '') }}</textarea>
        <p class="text-xs text-gray-400 mt-1">Muncul di kartu artikel & preview.</p>
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Isi Artikel</label>
        <div id="body-editor" class="bg-white rounded-lg border border-gray-300" style="min-height: 280px;">{!! old('body', $post->body ?? '') !!}</div>
        <textarea name="body" id="body-input" class="hidden">{{ old('body', $post->body ?? '') }}</textarea>
        <p class="text-xs text-gray-400 mt-1">Gunakan toolbar untuk mengatur heading, bold, list, dan link.</p>
    </div>

    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var quill = new Quill('#body-editor', {
                theme: 'snow',
                placeholder: 'Tulis isi artikel di sini...',
                modules: {
                    toolbar: [
                        [{ header: [2, 3, false] }],
                        ['bold', 'italic', 'underline'],
                        [{ list: 'ordered' }, { list: 'bullet' }],
                        ['link', 'blockquote'],
                        ['clean']
                    ]
                }
            });

            var hiddenInput = document.getElementById('body-input');

            // Keep the hidden textarea (the field Laravel actually receives) in sync.
            quill.on('text-change', function () {
                hiddenInput.value = quill.root.innerHTML;
            });

            // Cover the case where content came from old('body') on validation error,
            // and the case where the form is submitted without ever touching the editor.
            hiddenInput.value = quill.root.innerHTML;

            hiddenInput.closest('form').addEventListener('submit', function () {
                hiddenInput.value = quill.root.innerHTML;
            });
        });
    </script>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Gambar Cover</label>

        @if(($post->cover_image ?? null))
            <div class="mb-3 flex items-center gap-3">
                <img src="{{ $post->cover_image }}" alt="Cover saat ini" class="w-24 h-16 object-cover rounded-lg border border-gray-200">
                <label class="flex items-center gap-2 text-xs text-red-600">
                    <input type="checkbox" name="remove_cover_image" value="1" class="rounded border-gray-300">
                    Hapus gambar ini
                </label>
            </div>
        @endif

        <div x-data="{ tab: 'upload', fileName: '', dragging: false }" class="border border-gray-300 rounded-xl overflow-hidden">
            <div class="relative p-6 text-center transition"
                 :class="dragging ? 'bg-blue-50' : ''"
                 @dragover.prevent="dragging = (tab === 'upload')"
                 @dragleave.prevent="dragging = false"
                 @drop.prevent="
                    dragging = false;
                    if (tab === 'upload' && $event.dataTransfer.files.length) {
                        document.getElementById('cover-file-input').files = $event.dataTransfer.files;
                        fileName = $event.dataTransfer.files[0].name;
                    }
                 ">
                <div x-show="tab === 'upload'">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 mx-auto text-gray-400 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                    </svg>
                    <p class="text-sm text-gray-600 font-medium pointer-events-none">Tarik & lepas gambar di sini, atau klik di sini untuk pilih file</p>
                    <p class="text-xs text-gray-400 mt-1 pointer-events-none" x-text="fileName || 'JPG/PNG/dll, maks. 50MB'"></p>
                    {{-- Real file input sits transparently on top of the whole box, so any click
                         inside this area is a direct, native click on the input itself. --}}
                    <input type="file" name="cover_image_file" id="cover-file-input" accept="image/*"
                           class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                           @change="fileName = $event.target.files[0]?.name ?? ''">
                </div>
                <div x-show="tab === 'url'" x-cloak>
                    <p class="text-sm text-gray-600 font-medium mb-3">Masukkan URL gambar yang sudah online</p>
                    <input type="url" name="cover_image_url" value="{{ old('cover_image_url') }}" placeholder="https://..."
                           class="w-full max-w-sm mx-auto rounded-lg border-gray-300 focus:border-blue-600 focus:ring-blue-600 text-sm">
                </div>
            </div>

            <div class="flex border-t border-gray-200 bg-gray-50 text-sm font-medium">
                <button type="button"
                        @click="tab = 'upload'"
                        :class="tab === 'upload' ? 'bg-blue-600 text-white' : 'text-blue-700 hover:bg-gray-100'"
                        class="flex-1 py-2.5 transition">
                    Upload
                </button>
                <button type="button"
                        @click="tab = 'url'"
                        :class="tab === 'url' ? 'bg-blue-600 text-white' : 'text-blue-700 hover:bg-gray-100'"
                        class="flex-1 py-2.5 border-l border-gray-200 transition">
                    Insert from URL
                </button>
            </div>
        </div>
    </div>

    <label class="flex items-center gap-2 text-sm text-gray-700">
        <input type="checkbox" name="publish" value="1" class="rounded border-gray-300"
               @checked(old('publish', $post->published_at ?? false))>
        Publikasikan sekarang
    </label>
</div>

<div class="mt-6">
    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-2.5 rounded-lg transition">
        Simpan
    </button>
    <a href="{{ route('admin.posts.index') }}" class="ml-2 text-sm text-gray-500 hover:text-gray-700">Batal</a>
</div>
