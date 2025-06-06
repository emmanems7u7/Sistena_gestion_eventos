<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RolesPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $permissionManageSecciones = Permission::create(['name' => 'manage secciones']);
        $permissionManageMenus = Permission::create(['name' => 'manage menus']);


        $roleAdmin = Role::create(['name' => 'admin']);
        $roleEditor = Role::create(['name' => 'Control Usuarios']);

        $role2 = Role::create(['name' => 'Mantenimiento Equipos']);
        $role2 = Role::create(['name' => 'camarofrafo']);
        $role3 = Role::create(['name' => 'Seguridad']);
        $role4 = Role::create(['name' => 'Limpieza']);
        $role5 = Role::create(['name' => 'Meseros']);



        $roleAdmin->givePermissionTo($permissionManageSecciones);
        $roleAdmin->givePermissionTo($permissionManageMenus);

        $roleEditor->givePermissionTo($permissionManageSecciones);


        $adminUser = \App\Models\User::find(1);
        $adminUser->assignRole('admin');
    }
}
