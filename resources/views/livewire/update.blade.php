<div>
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="hidden" wire:model="selected_id">
        <input type="text" class="form-control @error('name') is-invalid @enderror" wire:model="name">
        @error('name')
            <span class="invalid-feedback">
                {{$message}}
            </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="phone">Phone:</label>
        <input type="text" class="form-control @error('phone') is-invalid @enderror" wire:model="phone">
        @error('phone')
            <span class="invalid-feedback">
                {{$message}}
            </span>
        @enderror
    </div>

    <div class="input-group">
        <button class="btn btn-primary" wire:click="update">Save</button>
    </div>
</div>