<x-layouts.app>

    <div class="mb-8 flex justify-between items-center">
        <flux:breadcrumbs>
            <flux:breadcrumbs.item href="{{ route('dashboard') }}" icon="home" />
            <flux:breadcrumbs.item href="#">Categories</flux:breadcrumbs.item>
            <flux:breadcrumbs.item>Post</flux:breadcrumbs.item>
        </flux:breadcrumbs>
        <a href="{{ route('admin.categories.create') }}"><button type="button" class="boton">Nueva categoria</button></a>
    </div>

    <table id="miTabla" class="min-w-full divide-y divide-gray-200 rounded-md shadow-md">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $data)
            <tr>
                <td>{{ $data['id'] }}</td>
                <td>{{ $data['name'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        $(document).ready(function() {
            $('#miTabla').DataTable({
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
                },
                paging: true,
                ordering: true,
                searching: true,
            });
        });
    </script>

</x-layouts.app>