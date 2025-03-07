<div class="w-full">
    <div class="flex justify-between">
        <h1 class="text-3xl font-bold">Articles</h1>
        <flux:button wire:navigate href="/articles/create" variant="primary">Create</flux:button>
    </div>
    <hr class="mt-7 mb-9">
    <div class="w-ful">
        <div class="flex w-xl mb-8">
            <!-- Used debounce and input event to trigger search on every keystroke -->
            <flux:input 
                wire:model.debounce.1ms="textInput" 
                wire:input="search"
                placeholder="Search" 
                class="w-sm me-2" 
            />
        </div>
        <div class="space-x-2">
            <!-- Search Badge: Appears only when there is a search term -->
            @if ($textInput)
                <flux:badge class="mb-5">
                    Search: <span class="ms-1"><b>{{ $textInput }}</b></span>
                    <flux:badge.close wire:click="clearSearch" class="cursor-pointer" />
                </flux:badge>
            @endif
            <!-- Sorting Badge: Displays if sorting is applied -->
            @if ($sortColumn && $sortDirection)
                <flux:badge class="mb-5">
                    Sort By: <span class="ms-1 me-2"><b>{{ ucfirst($sortColumn) }}</b>,</span> Order: <span class="ms-1 me-2"><b>{{ ucfirst($sortDirection) }}</b></span>
                    <flux:badge.close wire:click="resetSorting" class="cursor-pointer" />
                </flux:badge>
            @endif
            <!-- "Clear All" Badge: Displayed when both search and sorting are active -->
            @if ($textInput && $sortColumn && $sortDirection)
                <flux:badge class="mb-5">
                    Clear All
                    <flux:badge.close wire:click="clearAll" class="cursor-pointer" />
                </flux:badge>
            @endif
        </div>
        <x-message></x-message>
        <table class="w-full">
            <thead class="bg-gray-100">
                <tr class="border-b border-t">
                    <td class="px-4 py-2 cursor-pointer" wire:click="sortBy('id')">
                         ID
                        @if ($sortColumn === 'id')
                            <span class="ml-1">{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                        @endif
                    </td>
                    <td wire:click="sortBy('title')" class="px-3 py-3 cursor-pointer">
                        Title
                        @if ($sortColumn === 'title')
                            <span class="ml-1">{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                        @endif
                    </td>
                    <td wire:click="sortBy('author')" class="px-3 py-3 cursor-pointer">
                        Author
                        @if ($sortColumn === 'author')
                            <span class="ml-1">{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                        @endif
                    </td>
                    <td wire:click="sortBy('status')" class="px-3 py-3 cursor-pointer">
                        Status
                        @if ($sortColumn === 'status')
                            <span class="ml-1">{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                        @endif
                    </td>
                    <td class="px-3 py-3">Action</td>
                </tr>
            </thead>
            <tbody>
                @if($articles->isNotEmpty())
                @foreach ($articles as $article)
                <tr class="border-b">
                    <td class="px-3 py-4">{{ $article->id }}</td>
                    <td class="px-3 py-4">{{ $article->title }}</td>
                    <td class="px-3 py-4">{{ $article->author }}</td>
                    <td class="px-3 py-4">
                        @if ($article->status == 'Active')
                            <flux:badge color="green">Active</flux:badge>
                        @else
                            <flux:badge color="secondary">Draft</flux:badge>
                        @endif
                    </td>
                    <td class="px-3 py-3 space-y-1 space-x-3">
                        <flux:button wire:navigate href="/articles/{{ $article->id }}/edit" size="sm" variant="primary" class="bg-gray-200 text-black hover:text-white hover:bg-gray-900">Edit</flux:button>
                        <flux:button wire:confirm="Are you sure, you want to delete: {{ $article->title }}?" wire:click="delete({{ $article->id }})" size="sm" variant="danger">Delete</flux:button>
                    </td>
                </tr>
                @endforeach
                @else
                    <tr class="border-b">
                        <td class="px-3 py-4 text-center" colspan="5">No articles found.</td>
                    </tr>
                @endif
            </tbody>
        </table>
        <div class="mt-7">
            {{ $articles->links() }}
        </div>
    </div>
</div>
