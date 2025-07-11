<x-layouts.public>
    <section class="max-w-4xl mx-auto px-6 py-16">
        <h1 class="text-5xl font-extrabold tracking-tight text-center text-zinc-900 dark:text-white mb-14">
            Blog & Publicaciones
        </h1>

        <div class="space-y-16">
            @foreach ($posts as $post)
                <article class="group border-b border-zinc-200 dark:border-zinc-700 pb-12">
                    <a href="{{ route('posts.show', $post) }}" class="block space-y-4">
                        <div class="overflow-hidden rounded-xl">
                            <img src="{{ $post->imagen }}"
                                alt="{{ $post->title }}"
                                class="w-full h-64 object-cover transition-transform duration-500 ease-in-out group-hover:scale-105">
                        </div>

                        <div>
                            <h2 class="text-3xl font-bold text-zinc-900 dark:text-white group-hover:underline transition duration-200">
                                {{ $post->title }}
                            </h2>

                            <p class="mt-2 text-zinc-500 dark:text-zinc-400 text-sm">
                                Publicado el {{ $post->created_at->format('d M Y') }} —
                                <span class="italic">#{{ $post->id }}</span>
                            </p>

                            <p class="mt-4 text-lg text-zinc-700 dark:text-zinc-300 leading-relaxed">
                                {{ Str::limit($post->excerpt, 180) }}
                            </p>

                            <div class="mt-4">
                                <span class="text-indigo-600 dark:text-indigo-400 text-sm font-semibold group-hover:underline">
                                    Leer el artículo →
                                </span>
                            </div>
                        </div>
                    </a>
                </article>
            @endforeach
        </div>

        <div class="mt-16 flex justify-center">
            {{ $posts->links('pagination::tailwind') }}
        </div>
    </section>
</x-layouts.public>
