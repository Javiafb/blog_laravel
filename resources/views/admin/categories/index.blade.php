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
                <th>editar</th>
                <th>borrar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $data)
            <tr>
                <td>{{ $data['id'] }}</td>
                <td>{{ $data['name'] }}</td>
                <td>
                    <a href="{{ route('admin.categories.edit',$data) }}"> <button class="boton">editar</button></a>
                </td>
                <td>
                    <form class="delete" action="{{ route('admin.categories.destroy',$data) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="boton-red">borrar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @push('js')

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

        forms = document.querySelectorAll('.delete');

        forms.forEach(form => {
            form.addEventListener('submit', (e) => {
                e.preventDefault();
                Swal.fire({
                    title: "¿Estas seguro?",
                    text: "Deseas eliminar esta categoria!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Si, eliminar!",
                    cancelButtonText: "No, cancelar"
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            })
        });
    </script>


    @endpush


</x-layouts.app>