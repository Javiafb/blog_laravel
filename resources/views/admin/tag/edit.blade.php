<x-layouts.app>

    <div class="mb-8 flex justify-between items-center">
        <flux:breadcrumbs>
            <flux:breadcrumbs.item href="{{ route('dashboard') }}" icon="home" />
            <flux:breadcrumbs.item href="{{ route('admin.tag.index') }}">Tags</flux:breadcrumbs.item>
            <flux:breadcrumbs.item>Editar</flux:breadcrumbs.item>
        </flux:breadcrumbs>
    </div>


    <form action="{{ route('admin.tag.update',$tag) }}" method="POST" enctype="multipart/form-data" class="cardt">
        @csrf
        @method('PUT')

        <div class="cardt mb-4">
            <div class="mb-5">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">nombre</label>
                <input type="text" id="name" name="name" value="{{ $tag->name }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Escriba el nombre de la nueva etiqueta" required maxlength="30" />
            </div>

            <div class="flex justify-end">
                <button type="submit" class="boton">Enviar</button>
            </div>

        </div>
    </form>

</x-layouts.app>