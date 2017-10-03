<?php

use App\State;
use Illuminate\Database\Seeder;

class StatesTableSeeder extends Seeder
{
    private $fields = ['completed','uncompleted'];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->fields as $field)
        {
            $role = State::create([
                'status' => $field
            ]);
        }
    }
}
