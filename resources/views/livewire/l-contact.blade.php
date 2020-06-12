<div class="d-flex align-items-center justify-content-center position-ref full-height">
    <div class="content">
        <h1><span class="badge badge-success text-left">CRUD with laravel livewire</span></h1>

        <div class="card">
            <div class="card-header text-left">
                My Contact
            </div>

            <div class="card-body">
                @if(!$updateMode) 
                    @include('livewire.create')
                @else
                    @include('livewire.update')
                @endif
            </div>

            <hr>

            @foreach($contacts as $contact)

                <div class="d-flex justify-content-between align-items-center mb-3">
                    
                    <div class="ml-2">
                        <img src="https://api.adorable.io/avatars/75/. {{$contact->name}}" alt="" style="border-radius: 10px;">
                    </div>
                    
                    <div class="ml-3">
                        {{$contact->name}}
                    </div>
                    

                    {{$contact->phone}}
                    
                    <div class="d-flex flex-column mr-3">
                        <button class="btn btn-xs btn-warning" wire:click="edit({{$contact->id}})">Edit</button>
                        <button class="btn btn-xs btn-danger" wire:click="delete({{$contact->id}})">Delete</button>
                    </div>
                </div>

                
            @endforeach
            <div class="d-flex justify-content-center">
                {{$contacts->links()}}
            </div>
        </div>
    </div>
</div>