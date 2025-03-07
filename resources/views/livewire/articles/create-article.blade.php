<div class="w-full">
    <div class="flex justify-between">
        <h1 class="text-3xl font-bold">Articles / Create</h1>
        <flux:button wire:navigate href="/articles" variant="filled"><- &nbsp; &nbsp; Go Back</flux:button>
    </div>
    <hr class="my-8">
    <div class="w-ful">
        <form wire:submit="save" action="" class="space-y-4">
            <flux:field>
                <flux:label>Title</flux:label>
                <flux:input wire:model="title" type="text" />
                <flux:error name="title" />
            </flux:field>
            <flux:field>
                <flux:label>Author</flux:label>
                <flux:input wire:model="author" type="text" />
                <flux:error name="author" />
            </flux:field>
            <flux:field>
                <flux:label>Content</flux:label>
                <flux:textarea rows="5" wire:model="content" type="text" />
            </flux:field>
            <div class="w-sm">
                <flux:radio.group wire:model="status" label="Status" variant="segmented">
                    <flux:radio label="Active" value="Active"/>
                    <flux:radio label="Draft" value="Draft"/>
                </flux:radio.group>
            </div>
            <hr class="mt-12">
            <flux:button type="submit" variant="primary" class="mt-6">
                Save Article
            </flux:button>
        </form>
    </div>
</div>
