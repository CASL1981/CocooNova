<?php

namespace App\Livewire;

use App\Traits\WithTableOperations;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Permissions extends Component
{
    use WithPagination;
    use WithTableOperations;

    public $name;

    public $role;

    public $selected_id;

    public $permission_check = [];
    
    public function render()
    {
        $this->bulkDisabled = count($this->selectedModel) < 1;

        $permissions = Permission::search('name', $this->keyWord)
        ->orderBy($this->sortField, $this->sortDirection)
        ->paginate(10);

        if ($this->selected_id) {

            $this->role = Role::findOrFail($this->selected_id);

            $havePermission = $this->role->permissions()->get();

            $permissions->map(function($permission) use ($havePermission) {
                if($havePermission->contains($permission))            {
                    $permission->check = true;
                } else {
                    $permission->check = false;
                }
            });
        }
        
        return view('livewire.permissions.index', compact('permissions'));
    }

    #[On('role_id')]
    public function selectdId($id): void
    {
        $this->selected_id = $id;
        $this->render();
    }

    public function addPermisssionKey($permission)
    {
        //validamos que exista un role seleccionado
        if($this->selected_id){
            if (!$this->role->hasPermissionTo($permission))
            {                
                $this->role->givePermissionTo($permission);
            } else {
                $this->role->revokePermissionTo($permission);
            }
        } else {
            $this->dispatch('alert', ['type' => 'warning', 'message' => 'Selecciona un Role']);
        }
    }
}
