<x-layouts.app>

<div class="mb-8 flex justify-between items-center">
        <flux:breadcrumbs>
            <flux:breadcrumbs.item href="{{ route('dashboard') }}" icon="home" />
            <flux:breadcrumbs.item href="#">Post</flux:breadcrumbs.item>
            <flux:breadcrumbs.item>Post</flux:breadcrumbs.item>
        </flux:breadcrumbs>
        <a href="{{ route('admin.post.create') }}"><button type="button" class="boton">Nuevo post</button></a>
    </div>

      <table id="miTabla" class="min-w-full divide-y divide-gray-200 rounded-md shadow-md">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>editar</th>
                <th>borrar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($post as $data)
            <tr>
                <td>{{ $data->id }}</td>
                <td>{{ $data->title }}</td>
                <td>
                    <a href="{{ route('admin.post.edit',$data) }}"> <button class="boton">editar</button></a>
                </td>
                <td>
                    <form class="delete" action="{{ route('admin.post.destroy',$data) }}" method="post">
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

    </script>


    @endpush


</x-layouts.app>