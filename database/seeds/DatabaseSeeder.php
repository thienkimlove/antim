<?php

use App\Setting;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("SET foreign_key_checks=0");

        Model::unguard();

        $count = Setting::all()->count();

        if ($count == 0) {
            Setting::truncate();
            $settings = [
                [
                    'name' => 'META_INDEX_TITLE',
                    'value' => 'SamNhung'
                ],
                [
                    'name' => 'META_INDEX_DESC',
                    'value' => 'SamNhung'
                ],
                [
                    'name' => 'META_INDEX_KEYWORDS',
                    'value' => 'SamNhung'
                ],
                [
                    'name' => 'META_CATEGORY_DESC',
                    'value' => 'SamNhung'
                ],
                [
                    'name' => 'META_CATEGORY_KEYWORDS',
                    'value' => 'SamNhung'
                ],
                [
                    'name' => 'META_POST_KEYWORDS',
                    'value' => 'SamNhung'
                ],
                [
                    'name' => 'META_CONTACT_TITLE',
                    'value' => 'SamNhung'
                ],
                [
                    'name' => 'META_CONTACT_DESC',
                    'value' => 'SamNhung'
                ],
                [
                    'name' => 'META_CONTACT_KEYWORDS',
                    'value' => 'SamNhung'
                ],
                [
                    'name' => 'META_VIDEO_TITLE',
                    'value' => 'SamNhung'
                ],
                [
                    'name' => 'META_VIDEO_DESC',
                    'value' => 'SamNhung'
                ],
                [
                    'name' => 'META_VIDEO_KEYWORDS',
                    'value' => 'SamNhung'
                ],
                [
                    'name' => 'META_QUESTION_TITLE',
                    'value' => 'SamNhung'
                ],
                [
                    'name' => 'META_QUESTION_DESC',
                    'value' => 'SamNhung'
                ],
                [
                    'name' => 'META_QUESTION_KEYWORDS',
                    'value' => 'SamNhung'
                ],

                [
                    'name' => 'META_DELIVERY_TITLE',
                    'value' => 'SamNhung'
                ],
                [
                    'name' => 'META_DELIVERY_DESC',
                    'value' => 'SamNhung'
                ],
                [
                    'name' => 'META_DELIVERY_KEYWORDS',
                    'value' => 'SamNhung'
                ],
            ];
            Setting::insert($settings);
        } else {
            echo "Skip truncate settings table...";
        }

        User::truncate();

        factory(User::class)->create([
            'password' => bcrypt('232323'),
            'email' => 'tieumaster@yahoo.com'
        ]);

        Model::reguard();

        DB::statement("SET foreign_key_checks=1");

    }
}
