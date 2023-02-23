<?php

namespace App\Http\Livewire;

use App\Actions\Fortify\UpdateUserProfileInformation;
use Livewire\Component;

class ProfileForm extends Component
{
    public $state = [];

    public function mount()
    {
        $ss = auth()->user()->withoutRelations()->toArray();
        dd($ss);
    }

    public function updateProfileInformation(UpdateUserProfileInformation $updater)
    {
        $this->resetErrorBag();

        $updater->update(
            auth()->user(),[
           'name' => $this->state['name'],
           'email'=>$this->state['email'], 
             ] );

        session()->flash('status', 'Profile successfully updated');
    }

    public function render()
    {
        return view('livewire.profile.update-profile-information-form');
    }
}
