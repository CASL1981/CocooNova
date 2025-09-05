<?php

namespace App\Livewire;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Attributes\On;
use Livewire\WithPagination;

use Livewire\Component;

class Users extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    
    public $identification;
    
    public $name, $lastname, $area, $email, $status, $role_id, $destination, $password;

    public $show = false;

    public $selected_id = 0;

    // variables del TRAIT
    public $bulkDisabled = true;
    public $selectedModel = [];
    public $selectAll = false;
    public $model; //modelo de la tabla
    public $sortField = 'id', $sortDirection = 'desc'; //variables de ordenamiento
    public $keyWord;

    public function hydrate()
    {
        $this->model = 'App\Models\User';
    }

    public function updatedSelectAll($value)
    {
        $value ? $this->selectedModel = $this->model::pluck('id') : $this->selectedModel = [];
    }

    function method()
    {
        return $this->selected_id ? $this->update() : $this->store();
    }

    public function render()
    {
        $this->bulkDisabled = count($this->selectedModel) < 1;

        $users = new User();

        $users = $users->QueryTable($this->keyWord, $this->sortField, $this->sortDirection)->paginate(10);

        return view('livewire.users.index', compact('users'));
    }

    
    protected function rules()
    {
        return [
            'identification' => ['required', 'string','min:7', 'max:12',
                                'regex:/^\\d{7,12}$/',
                                Rule::unique('users', 'identification')->ignore($this->selected_id)],
            'name'           => 'required|min:3|max:100',
            'lastname'       => 'required|min:3|max:100',
            'email'          => ['required', 'max:100', 'email', Rule::unique('users')->ignore($this->selected_id)],
            'area'           => 'required|in:Administrativa,Comercial,Farmacia,Financiero',
            'status'         => 'nullable',
            'role_id'        => 'nullable',
            'destination'    => 'nullable',
        ];
    }


    public function showModal(bool $show = true)
    {
        $this->show = $show;
    }

    public function store()
    {     
        // can('user create');
        
        $validate = $this->validate(); 
        

        $fillable = [
            // 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'password' => Hash::make($this->password ?? 'password'),
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

        $this->identification = $record->identification;
        $this->name = $record->name;
        $this->lastname = $record->lastname;
        $this->area = $record->area;
        $this->email = $record->email;
        $this->status = $record->status;
        // $this->role_id = $record->role_id;
        $this->destination = $record->destination;

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

    public function cancel(): void
    {
        $this->resetInput();
    }

    public function closed(): void
    {
        $this->cancel();
        $this->show = false;
    }

    private function resetInput(): void
    {
        $this->resetErrorBag();
        $this->resetValidation();
        $this->resetExcept(['model', 'exportable', 'keyWord']);
    }

}
