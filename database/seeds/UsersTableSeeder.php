<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Profile;
use App\Address;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $this->createUser('slc11@mail.ru', 'Huber', 'Farnsworth', 'root', 'test123Q');
        $this->createUser('slc12@mail.ru', 'Leela', 'Turanga', 'admin', 'test123Q');
        $this->createUser('slc14@mail.ru', 'Philip', 'Fry', 'contentEditor', 'test123Q');
        $this->createUser('slc15@mail.ru', 'John', 'Zoidberg', 'user', 'test123Q');

    }


    /**
     * @param $email
     * @param $firstName
     * @param $lastName
     * @param $role
     * @param $password
     * @return \Illuminate\Database\Eloquent\Model|null|static
     * @throws \App\Exception
     */
    public function createUser($email, $firstName, $lastName, $role, $password) {
        $faker = Faker\Factory::create();
        $faker->addProvider(new Faker\Provider\en_US\Address($faker));

        $user = User::where('email', '=', $email)->first();
        if (empty($user->id)) {

            $address = Address::create([
                'street1' => $faker->address,
                'city' => $faker->city,
                'state' => $faker->stateAbbr,
                'zip' => $faker->randomNumber(5, true),
            ]);

            $profile = Profile::create([
                'first_name' => $firstName,
                'last_name' => $lastName,
                'email' => $email,
                'phone' => $faker->tollFreePhoneNumber,
                'web' => $faker->domainName,
                'address_id' => $address->id,
            ]);

            $user = User::create([
                'name' => $profile->first_name . " " . $profile->last_name,
                'email' => $profile->email,
                'password' => bcrypt($password),
                'profile_id' => $profile->id,
                'status' => 1,
                'role' => $role,
            ]);

        }

        return $user;
    }
}
