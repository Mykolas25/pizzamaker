<?php
/**
 * Created by PhpStorm.
 * User: Mykolas
 * Date: 5/17/2017
 * Time: 9:47 AM
 */

namespace App\Console\commands;

use App\models\DTUsers;
use Illuminate\Console\Command;
use Ramsey\Uuid\Uuid;

class CreateAdministrator extends Command
{

    protected $signature = "MyAdmin";

    protected  $description = "Create user with admin role";

    public function handle()
    {

        $this->comment("Creating admin user");

        $record = DTUsers::create([
            'id' => Uuid::uuid4(),
            'name' => $name = $this->ask("Please provide name"),
            'email' => $email = $this->ask("Please provide email"),
            'phone' => $phone = $this->ask("Please provide phone"),
            'password' => bcrypt($password = $this->secret("Please provide password"))
        ]);

        $record -> rolesSyncing() -> sync('super-admin');

        $this->info($email);
        $this->info($name);
        $this->info($phone);

    }

}