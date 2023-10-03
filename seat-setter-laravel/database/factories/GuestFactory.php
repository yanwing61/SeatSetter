<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use App\Models\Group;
use App\Models\Table;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Guest>
 */
class GuestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'guest_fname' => $this ->faker->firstName(),
            'guest_lname' => $this ->faker->lastName(),
            'guest_remarks' => $this ->faker->sentence,
            'group_id' => Group::all()->random(),
            'table_id' => Table::all()->random(),
        ];
    }
}
