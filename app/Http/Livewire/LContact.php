<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Contact;
use Livewire\WithPagination;

class LContact extends Component
{

    use WithPagination;

    public $name, $phone, $selected_id;
    public $updateMode = false;

    public function render()
    {
        return view('livewire.l-contact', [
            'contacts' => Contact::orderBy('name')->paginate(5)
        ]);
    }

    private function resetInput() 
    {
        $this->name = null;
        $this->phone = null;
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|min:2',
            'phone' => 'required|numeric'
        ]);

        $contact = new Contact();
        $contact->name = $this->name;
        $contact->phone = $this->phone;
        $contact->save();

        $this->resetInput();
    }

    public function edit($id) 
    {
        $formEdit = Contact::find($id);
        $this->selected_id = $id;
        $this->name = $formEdit->name;
        $this->phone = $formEdit->phone;

        $this->updateMode = true;
    }

    public function update() 
    {
        $this->validate([
            'name' => 'required|min:2',
            'phone' => 'required|numeric'
        ]);

        if($this->selected_id) 
        {
            $contact = Contact::find($this->selected_id);
            $contact->name = $this->name;
            $contact->phone = $this->phone;
            $contact->save();

            $this->resetInput();
            $this->updateMode = false;
        }

    }

    public function delete($id) 
    {
        if($id) 
        {
            $contact = Contact::find($id);
            $contact->delete();
        }
    }
}
