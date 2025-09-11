<?php

namespace App\Livewire;

use App\Livewire\Forms\UserForm;
use App\Models\User;
use App\Traits\WithCrudOperations;
use App\Traits\WithTableOperations;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\On;
use Livewire\WithPagination;

use Livewire\Component;

class Users extends Component
{
    use WithPagination;
    use WithCrudOperations;
    use WithTableOperations;

    public UserForm $form;

    public function hydrate()
    {
        $this->model = 'App\Models\User';
    }

    public function render()
    {
        $this->bulkDisabled = count($this->selectedModel) < 1;

        $users = new User();

        $users = $users->QueryTable($this->keyWord, $this->sortField, $this->sortDirection)->paginate(10);

        return view('livewire.users.index', compact('users'));
    }

    public function store()
    {     
        // can('user create');
        
        $validate = $this->validate(); 
        

        $fillable = [
            'password' => Hash::make($this->form->password ?? 'password'),
            'status' => false, // se crea inactivo
        ];
        
        $validate = array_merge($validate, $fillable);
        $user = User::create($validate);
        //Asignamos el role seleccinado
        // $role = Role::find($this->role_id);
        // $user->assignRole($role->name);
        // $this->show = false;

        //reinicamos los campos
        $this->cancel();
    	$this->dispatch('alert', [
            ['type' => 'success', 'message' => 'Usuario creado correctamente.']
        ]);
    }

    public function edit()
    {
        // can('user update');

        $record = User::findOrFail($this->selected_id);

        $this->form->identification = $record->identification;
        $this->form->name = $record->name;
        $this->form->lastname = $record->lastname;
        $this->form->area = $record->area;
        $this->form->email = $record->email;
        $this->form->status = $record->status;
        $this->form->role_id = $record->role_id;
        $this->form->destination = $record->destination;

        // Asegura que el id actual se pase al form para la validación unique
        $this->form->selected_id = $record->id;

        $this->show = true;
    }

    public function update()
    {
        // can('user update');
        $validate = $this->validate();
        if ($this->selected_id) {

    		$record = User::find($this->selected_id);

            $record->update($validate);

            //Asignamos el rol seleccionado
            // $role = Role::find($this->role_id);
            // if ($role) {
            //     $record->syncRoles($role->name);
            // }

            //reiniciamos los campos
            $this->cancel();
            $this->selected_id = 0;

    		//Mensaje de actualización
            $this->dispatch('alert', ['type' => 'success', 'message' => 'Usuario actualizado correctamente.']);
        }
    }

    #[On('deleteItem')]
    public function delete(): void
    {
        // can('role delete');

        if ($this->selected_id ) {
            $user = User::find($this->selected_id);
            //validamos la cantidad de usuarios asignados al Role
            
            if($user)
            {
                $user->delete();
                $this->dispatch('alert', ['type' => 'success', 'message' => 'Usuario Eliminado correctamente.']);
                $this->resetInput();
            }else{
                $this->dispatch('alert', [
                ['type' => 'warning', 'message' => 'Seleccione un usuario para eliminar.']
            ]);
            }
        }
    }

}
