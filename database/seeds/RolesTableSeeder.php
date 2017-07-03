<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = config('entrust.roles');

        Role::query()->delete();

        Role::insert($roles);

        $this->makeDefaultRoles();
    }

    /**
     * Make system default roles that can not be changed or deleted.
     *
     * @return void
     */
    private function makeDefaultRoles()
    {
        foreach (config('entrust.types') as $type) {
            $this->makeRoleByType($type);
        }
    }

    /**
     * Make role by type (categories, tags or posts)
     *
     * @return void
     */
    private function makeRoleByType($type)
    {
        $permissions = Permission::where('name', 'like', '%-'. $type)
            ->where('name', '<>', 'delete-'. $type)
            ->get()
            ->pluck('id')
            ->all();

        $role = Role::where('name', $type .'-manager')->first();

        $role->permissions()->attach($permissions);
    }
}
