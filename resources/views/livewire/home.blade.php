<section class="h-screen w-full flex items-center justify-center">
    <div class="max-w-lg w-full m-auto py-12">
        <input type="text" wire:model="title" placeholder="Title" class="w-full mb-3 p-3 border border-black">
        <button wire:click="store" class="px-4 py-2 bg-black text-white font-semibold">Store</button>
        @if (count($todos))
            <ul class="flex flex-col ml-3 mt-4">
                @foreach ($todos as $index => $todo)
                    <li class="mb-2">{{ $index }}. {{ $todo->title }} - @if ($todo->status == 'pending')
                            <code
                                class="px-3 capitalize rounded-full bg-yellow-300 text-black font-semibold inline-block">{{ $todo->status }}</code>
                        @else
                            <code
                                class="px-3 capitalize rounded-full bg-blue-300 text-black font-semibold inline-block">{{ $todo->status }}</code>
                        @endif
                    </li>
                @endforeach
            </ul>
        @else
            <p class="text-center text-gray-600">No todo items exist!</p>
        @endif
    </div>
</section>
