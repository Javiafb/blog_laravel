<x-layouts.app>

    <div class="mb-8 flex justify-between items-center">
        <flux:breadcrumbs>
            <flux:breadcrumbs.item href="{{ route('dashboard') }}" icon="home" />
            <flux:breadcrumbs.item href="{{ route('admin.categories.index') }}">Categories</flux:breadcrumbs.item>
            <flux:breadcrumbs.item>nuevo</flux:breadcrumbs.item>
        </flux:breadcrumbs>
    </div>


    <div class="cardt">

        <form action="{{ route('admin.categories.store') }}" method="POST">
            @csrf
            <div class="mb-5">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Categorias</label>
                <input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Escriba el nombre de la categoria" required maxlength="30" />
            </div>

            <div class="flex justify-end">
                <button type="submit" class="boton">Enviar</button>
            </div>
        </form>


    </div>

</x-layouts.app>