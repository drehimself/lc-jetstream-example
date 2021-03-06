<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $userA = User::create([
            'name' => 'Andre',
            'email' => 'andre@andre.com',
            'password' => bcrypt('password'),
        ]);

        $userATeam = Team::create([
            'user_id' => $userA->id,
            'name' => 'Andre\'s Team',
            'personal_team' => 1,
        ]);

        $userB = User::create([
            'name' => 'Will',
            'email' => 'will@will.com',
            'password' => bcrypt('password'),
        ]);

        $userBTeam = Team::create([
            'user_id' => $userB->id,
            'name' => 'Will\'s Team',
            'personal_team' => 1,
        ]);

        $userATeam->users()->attach(
            $userB,
            ['role' => 'editor']
        );

        $userC = User::create([
            'name' => 'Sally',
            'email' => 'sally@sally.com',
            'password' => bcrypt('password'),
        ]);

        $userCTeam = Team::create([
            'user_id' => $userC->id,
            'name' => 'Sally\'s Team',
            'personal_team' => 1,
        ]);

        $userD = User::create([
            'name' => 'Jen',
            'email' => 'jen@jen.com',
            'password' => bcrypt('password'),
        ]);

        $userDTeam = Team::create([
            'user_id' => $userD->id,
            'name' => 'Jen\'s Team',
            'personal_team' => 1,
        ]);

        $userCTeam->users()->attach(
            $userD,
            ['role' => 'editor']
        );

        Post::create([
            'user_id' => $userA->id,
            'team_id' => $userA->currentTeam->id,
            'title' => 'Andre Post One',
            'body' => 'This is a post from Andre.'
        ]);

        Post::create([
            'user_id' => $userC->id,
            'team_id' => $userC->currentTeam->id,
            'title' => 'Sally Post One',
            'body' => 'This is a post from Sally.'
        ]);
    }
}
