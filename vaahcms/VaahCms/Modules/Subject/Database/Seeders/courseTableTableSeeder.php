<?php  namespace VaahCms\Modules\Subject\Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use VaahCms\Modules\Subject\Models\Subject;


class courseTableTableSeeder extends Seeder {

    function seeds()
    {
        $this->seedBlogs();
    }

    function seedBlogs()
    {
        $faker = Faker::create();
        $num_blogs = 10;
        $subject_count = Subject::count();
        $list = [];
        for ( $i = 0; $i < $num_blogs; $i++ ) {
            $list[$i] = [
                'name'         => $faker->name,
                'class'       => $faker->numberBetween(1,12),
                'subject_id'  => $faker->numberBetween(1,$subject_count > 0 ? $subject_count : 2),
                'created_at'    => \Carbon::now()->format( 'Y-m-d H:i:s' ),
                'updated_at'    => \Carbon::now()->format( 'Y-m-d H:i:s' ),
            ];
            $exist = \DB::table( 'new_course' )
                ->where( 'name', $list[$i]['name'] )
                ->first();
            if($exist)
            {
                continue;
            }
        }

        if(count($list) > 0 )
        {
            \DB::table( 'new_course' )->insert( $list );
        }
    }

}
