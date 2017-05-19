<?php
/**
 * Created by PhpStorm.
 * User: Mykolas
 * Date: 5/18/2017
 * Time: 1:22 PM
 */

namespace App\Console\commands;
use App\models\DTIngredients;
use App\models\DTUsers;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Ramsey\Uuid\Uuid;


class PrintIngredient extends Command
{

    protected $signature = "MyIngredient";

    protected  $description = "Print ingredient id";

    public function handle()
    {

//        Modle::all()->random(1)->first()->id;

//        $this->comment("Print ingredient id");
//
//        $name = $this->ask("Please provide name");
//
//        $record = DTIngredients::where('name', '=', $name)->pluck('id')->toArray();


        $record = DTIngredients::all()->random(1)->first()->id;

        cache()->put('ingredient', $record, 120);

        $this->info($record);
    }

}