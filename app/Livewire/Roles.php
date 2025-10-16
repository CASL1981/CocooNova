<?php

namespace App\Livewire;

use App\Models\User;
use App\Traits\WithCrudOperations;
use App\Traits\WithTableOperations;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class Roles extends Component
{
    use WithPagination;
    use WithCrudOperations;
    use WithTableOperations;

    #[Validate('required|string|max:100|unique:roles,name,' . '$this->roleId')]
    public $name = '';
        
    // public $role;

    public function hydrate()
    {
        $this->model = 'App\Models\Role';
        $this->exportable ='App\Exports\RolesExport';
    }

    public function render()
    {
        $this->bulkDisabled = $this->selectedModel < 1;
        
        $roles = Role::search('name', $this->keyWord)
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        foreach ($roles as $role) {
            $role->count_user = User::role($role->name)->count();
        }

        return view('livewire.roles.index', compact('roles'));
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store():void
    {
        can ('role create');

        $this->show = true;

        $validate = $this->validate();

        $fillable = [
            'guard_name' => 'web',
        ];

        $validate = array_merge($validate, $fillable);

        Role::create($validate);

        $this->resetInput();
        $this->dispatch('alert', ['type' => 'success', 'message' => 'Rol creado con éxito']);
        // $this->dispatch('role_id', 0);
    }

    public function edit()
    {
        can ('role update');

        $role = Role::findOrFail($this->selected_id);
        
        $this->name = $role->name;
        
        $this->show = true;
    }

    public function update()
    {
        can ('role update');

        $validate = $this->validate();

        if ($this->selected_id) {
    		$record = Role::find($this->selected_id);
            $record->update($validate);

            $this->resetInput();
    		$this->dispatch('alert', ['type' => 'success', 'message' => 'Role actualizado']);
        }
    }

    #[On('deleteItem')]
    public function delete()
    {
        can('role delete');

        if ($this->selected_id ) {
            $role = Role::find($this->selected_id);
            //validamos la cantidad de usuarios asignados al Role
            $roles = User::role($role->name)->get();
            if(!$roles->count())
            {
                $role->delete();
                $this->dispatch('alert', ['type' => 'success', 'message' => 'Role Eliminado']);
                $this->resetInput();
            }else{
                $this->dispatch('alert', ['type' => 'error', 'message' => 'Role no Eliminado asignado a varios usuarios']);
            }
        }
    }
}
