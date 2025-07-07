<x-layouts.app>

    <div class="mb-8 flex justify-between items-center">
        <flux:breadcrumbs>
            <flux:breadcrumbs.item href="{{ route('dashboard') }}" icon="home" />
            <flux:breadcrumbs.item href="{{ route('admin.post.index') }}">Post</flux:breadcrumbs.item>
            <flux:breadcrumbs.item>Editar</flux:breadcrumbs.item>
        </flux:breadcrumbs>
    </div>


    <form action="{{ route('admin.post.update',$post) }}" method="POST" enctype="multipart/form-data" class="cardt">
        @csrf
        @method('PUT')

        <div class="mb-5 relative">
            <img id="imgPreview" class="w-full aspect-video object-cover object-center" src="{{ $post->image_path ? Storage::url($post->image_path) : 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSFuLZe9UHs6cC_sIBZ8HIqkTg4ADomTdWBcQ&s' }} " alt="">
            <div class="absolute top-0 left-0 right-0 bottom-0 text-white flex items-center justify-center">
                <label class="bg-black cursor-pointer px-4 py-2 rounded-lg">
                    cambiar imagen
                    <input type="file" name="image" id="image" class="hidden" accept="image/*" onchange="previewImage(event, '#imgPreview')">
                </label>
            </div>
        </div>

        <div class="cardt mb-4">
            <div class="mb-5">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">titulo</label>
                <input type="text" id="title" name="title" value="{{ $post->title }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Escriba el nombre del post" required maxlength="30" oninput="string_to_slug(this.value, '#slug')" />
            </div>
            <div class="mb-5">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">slug</label>
                <input type="text" id="slug" name="slug" value="{{ $post->slug }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Escriba el slug" required maxlength="30" />
            </div>

            <div class="mb-5">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Categories</label>
                <select name="category_id" id="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="">Seleccione una categoria</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-5">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tags</label>
                <select name="tag_id" id="tag_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="">Seleccione una etiqueta</option>
                    @foreach ($tag as $tags)
                    <option value="{{ $tags->id }}" {{ $post->tag_id== $tags->id ? 'selected' : '' }}>{{ $tags->name }}</option>
                    @endforeach
                </select>
            </div>


            <div class="mb-5">
                <flux:textarea
                    label="resumen"
                    name="excerpt"
                    placeholder="Resumen del post">
                    {{ old('excerpt', $post->excerpt) }}
                </flux:textarea>
            </div>

            <div class="mb-5">
                <flux:textarea
                    label="contenido"
                    name="content"
                    rows="16"
                    required
                    placeholder="{{ $post->content }}">
                    {{ old('content', $post->content) }}
                </flux:textarea>
            </div>

            <div class="mb-5">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Estados del post</label>

                <div class="flex space-x-1">
                    <input type="radio" name="is_publiced" value="0" id="" @checked(old('is_published' , $post->is_published) == 0) >
                    <span class="ml-1">No publicado</span>

                    <input type="radio" name="is_publiced" value="1" id="" @checked(old('is_published' , $post->is_published) == 1)>
                    <span class="ml-1">Publicado</span>
                </div>

            </div>

            <div class="flex justify-end">
                <button type="submit" class="boton">Enviar</button>
            </div>

        </div>
    </form>

</x-layouts.app>