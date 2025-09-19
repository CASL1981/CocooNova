<?php


use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

if (!function_exists('canView')) {
    function canView(string $permission): bool
    {
        $user = Auth::user();
        if (!$user) {
            return false;
        }
        $permissions = $user->getPermissionsViaRoles();
        $permissions = $permissions->filter(function($p) use ($permission){
            return Str::contains($p->name, $permission);
        });
        return $permissions->count() > 0;
    }
}

if (!function_exists('can')) {
    function can(string $permission)
    {
        $user = Auth::user();
        if (!$user || !$user->can($permission)) {
            abort(403, 'Usuario no tiene permiso para visualizar esta pagina');
        }
    }
}