<?php

use App\models\DTRoles;
use Illuminate\Database\Seeder;

class UserRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run ()
    {
        // http://stackoverflow.com/q/1598411
        $list = [
            ["name" => "Super Admin", "id" => "super-admin"], // Manage everything
            ["name" => "Project Admin", "id" => "project-admin"], // Manage most aspects of the site
            ["name" => "Editor", "id" => "editor"], // Scheduling and managing content
            ["name" => "Author", "id" => "author"], // Write important content
            ["name" => "Contributor", "id" => "contributor"], // Authors with limited rights
            ["name" => "Moderator", "id" => "moderator"], // Moderate user content
            ["name" => "Member", "id" => "member"], // Special user access
            ["name" => "Subscriber", "id" => "subscriber"], // Paying Average Joe
            ["name" => "User", "id" => "user"], // Average Joe
        ];
        DB::beginTransaction ();
        try {
            foreach ($list as $roleData) {
                $role = DTRoles::where ('id', $roleData['id'])->first ();
                if (!$role)
                    DTRoles::create ($roleData);
            }
        } catch (\Exception $e) {
            DB::rollback ();
            throw new Exception($e->getMessage ());
        }
        DB::commit ();
    }
}
