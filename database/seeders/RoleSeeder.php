<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1=Role::create(['name' => 'Admin']);
        $role2=Role::create(['name' => 'Gerente']);
        $role3=Role::create(['name' => 'Jefe']);
        $role4=Role::create(['name' => 'Encargado']);

        Permission::create(['name' => 'index']);
        Permission::create(['name' => 'gerentes'])->syncRoles([$role1, $role2, $role3]);;
        Permission::create(['name' => 'encargados'])->syncRoles([$role4]);

        Permission::create(['name' => 'admin.rol.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.rol.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.rol.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.rol.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.permiso.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.permiso.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.permiso.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.permiso.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.user.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.user.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.user.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.user.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.categoria.index'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'admin.categoria.create'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'admin.categoria.edit'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'admin.categoria.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.producto.index'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'admin.producto.create'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'admin.producto.edit'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'admin.producto.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.distribuidor.index'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'admin.distribuidor.create'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'admin.distribuidor.edit'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'admin.distribuidor.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.despacho.index'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.despacho.create'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.despacho.edit'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.despacho.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.supermarket.index'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.supermarket.create'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.supermarket.edit'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.supermarket.show'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.supermarket.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.prueba.index'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.prueba.create'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.prueba.edit'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.prueba.show'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.prueba.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.inventario.index'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.inventario.create'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.inventario.edit'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.inventario.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.kardex.index'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.kardex.create'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.kardex.edit'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.kardex.show'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.kardex.destroy'])->syncRoles([$role1]);


    }
}
