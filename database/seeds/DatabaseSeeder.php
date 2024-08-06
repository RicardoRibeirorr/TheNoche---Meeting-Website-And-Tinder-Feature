<?php

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
        $this->countries();
        $this->locations();
        // $this->defaultUsers();
        // $this->users();
        // $this->messages();
        // $this->posts();
    }

    // protected function defaultUsers(){
    //     DB::table('users')->insert([
    //         "id"=>1,'name' => "TheNoche",'email' => "support@thenoche.com","gender"=>"0","interest"=>"1", "terms_accepted"=>now(), "image"=>"https://picsum.photos/200","age"=>"41",'email_verified_at'=>now() ,'password' =>  bcrypt('123456789')]);
    //     }

    protected function users(){
        DB::table('users')->insert([
            "id"=>1,'name' => "Ricardo Ribeiro",'email' => "ricardoribeiro.rr@outlook.com","gender"=>"0","interest"=>"1", "terms_accepted"=>now(), "image"=>"https://picsum.photos/200","age"=>"41",'email_verified_at'=>now() ,'password' =>  bcrypt('123456789')]);
        DB::table('users')->insert([
            "id"=>2,'name' => "Rita Neves",'email' => "xivias2009.rr@gmail.com", "terms_accepted"=>now(),"gender"=>"1","interest"=>"2", "image"=>"https://picsum.photos/200","age"=>"22",'password' =>  bcrypt('123456789')]);
        DB::table('users')->insert([
            "id"=>3,'name' => "Joao Nobre",'email' => "ricardoribeiroaa.rr@outlook.com","gender"=>"0","interest"=>"1", "terms_accepted"=>now(), "image"=>"https://picsum.photos/200","age"=>"19",'password' =>  bcrypt('123456789')]);
        DB::table('users')->insert([
            "id"=>4,'name' => "Sandra Vaz",'email' => "xivias2009ssss.rr@gmail.com", "terms_accepted"=>now(),"gender"=>"1","interest"=>"2", "image"=>"https://picsum.photos/200","age"=>"33",'password' =>  bcrypt('123456789')]);
        DB::table('users')->insert([
            "id"=>5,'name' => "Jorge Santos",'email' => "ricardoribeiasdroaa.rr@outlook.com","gender"=>"0","interest"=>"1", "terms_accepted"=>now(), "image"=>"https://picsum.photos/200","age"=>"63",'password' =>  bcrypt('123456789')]);
        DB::table('users')->insert([
            "id"=>6,'name' => "Ines Feliz",'email' => "xivias2009ssasdss.rr@gmail.com", "terms_accepted"=>now(),"gender"=>"1","interest"=>"2", "image"=>"https://picsum.photos/200","age"=>"55",'password' =>  bcrypt('123456789')]);
        DB::table('users')->insert([
            "id"=>7,'name' => "Manuel Sergio",'email' => "ricardoribeiasssdroaa.rr@outlook.com","gender"=>"0","interest"=>"1", "terms_accepted"=>now(), "image"=>"https://picsum.photos/200","age"=>"23",'password' =>  bcrypt('123456789')]);
        DB::table('users')->insert([
            "id"=>8,'name' => "Catia Vaz",'email' => "xivias2009ssasdssss.rr@gmail.com", "terms_accepted"=>now(),"gender"=>"1","interest"=>"2", "image"=>"https://picsum.photos/200","age"=>"19",'password' =>  bcrypt('123456789')]);

        DB::table('stats')->insert([
            "id"=>1,'user_id' => 1,"country_id"=>1,"location_id"=>1]);
        DB::table('stats')->insert([
            "id"=>2,'user_id' => 2,"country_id"=>1,"location_id"=>7]);
        DB::table('stats')->insert([
            "id"=>3,'user_id' => 3,"country_id"=>2]);
        DB::table('stats')->insert([
            "id"=>4,'user_id' => 4,"country_id"=>2]);
        DB::table('stats')->insert([
            "id"=>5,'user_id' => 5,"country_id"=>2]);
        DB::table('stats')->insert([
            "id"=>6,'user_id' => 6,"country_id"=>1,"location_id"=>1]);
        DB::table('stats')->insert([
            "id"=>7,'user_id' => 7,"country_id"=>1,"location_id"=>2]);
        DB::table('stats')->insert([
            "id"=>8,'user_id' => 8,"country_id"=>1,"location_id"=>12]);
            

            DB::table('seekings')->insert([
                "user_id"=>1
            ]);
            DB::table('seekings')->insert([
                "user_id"=>2
            ]);
            DB::table('seekings')->insert([
                "user_id"=>3
            ]);
            DB::table('seekings')->insert([
                "user_id"=>4
            ]);
            DB::table('seekings')->insert([
                "user_id"=>5
            ]);
            DB::table('seekings')->insert([
                "user_id"=>6
            ]);
            DB::table('seekings')->insert([
                "user_id"=>7
            ]);
            DB::table('seekings')->insert([
                "user_id"=>8
            ]);
    }
    protected function messages(){
        DB::table('threads')->insert([
            "id"=>1,'user_id' => 1,"participant_id"=>2, "created_at"=>now()]);
        DB::table('messages')->insert([
            "id"=>1,'text' => "Ola tudo bem?", "user_id"=>1,"type"=>"text","thread_id"=>1]);
    }
    protected function countries(){
        DB::table('countries')->insert([
            "id"=>1,'name' => "Portugal","lang"=>"pt"]);
    }
    protected function locations(){
        DB::table('locations')->insert([
            "id"=>1,'name' => "Aveiro","country_id"=>"1"]);
        DB::table('locations')->insert([
            "id"=>2,'name' => "Beja","country_id"=>"1"]);
        DB::table('locations')->insert([
            "id"=>3,'name' => "Braga","country_id"=>"1"]);
        DB::table('locations')->insert([
            "id"=>4,'name' => "Bragança","country_id"=>"1"]);
        DB::table('locations')->insert([
            "id"=>5,'name' => "Castelo Branco","country_id"=>"1"]);
        DB::table('locations')->insert([
            "id"=>6,'name' => "Coimbra","country_id"=>"1"]);
        DB::table('locations')->insert([
            "id"=>7,'name' => "Évora","country_id"=>"1"]);
        DB::table('locations')->insert([
            "id"=>8,'name' => "Faro","country_id"=>"1"]);
        DB::table('locations')->insert([
            "id"=>9,'name' => "Guarda","country_id"=>"1"]);
        DB::table('locations')->insert([
            "id"=>10,'name' => "Leiria","country_id"=>"1"]);
        DB::table('locations')->insert([
            "id"=>11,'name' => "Portalegre","country_id"=>"1"]);
        DB::table('locations')->insert([
            "id"=>12,'name' => "Porto","country_id"=>"1"]);
        DB::table('locations')->insert([
            "id"=>13,'name' => "Santarém","country_id"=>"1"]);
        DB::table('locations')->insert([
            "id"=>14,'name' => "Setúbal","country_id"=>"1"]);
        DB::table('locations')->insert([
            "id"=>15,'name' => "Viana do Castelo","country_id"=>"1"]);
        DB::table('locations')->insert([
            "id"=>16,'name' => "Vila Real","country_id"=>"1"]);
        DB::table('locations')->insert([
            "id"=>17,'name' => "Viseu","country_id"=>"1"]);
        
    }
    protected function posts(){
        DB::table('posts')->insert([
            "id"=>1,'title' => "Festa da espuma",'content'=>"Queres organizar a melhor festa da espuma então conta com a Glow Moments. A Glow Moments apresenta todos os serviços para não te preocupares com ...","location_id"=>"1","type"=>1,"user_id"=>2,"created_at"=>now()]);
        DB::table('posts')->insert([
            "id"=>2,'title' => "Festa",'content'=>"Os melhores bolos de sempre!","location_id"=>"2","type"=>0,"user_id"=>1,"created_at"=>now()]);
        DB::table('posts')->insert([
            "id"=>3,'title' => "Festival",'content'=>"Os melhores bolos de sempre!","location_id"=>"1","type"=>1,"user_id"=>4,"created_at"=>now()]);
        DB::table('posts')->insert([
            "id"=>4,'title' => "Aniversarion",'content'=>"Os melhores bolos de sempre!","location_id"=>"2","type"=>0,"user_id"=>1,"created_at"=>now()]);
        DB::table('posts')->insert([
            "id"=>5,'title' => "Party",'content'=>"Os melhores bolos de sempre!","location_id"=>"1","type"=>1,"user_id"=>2,"created_at"=>now()]);
        DB::table('posts')->insert([
            "id"=>6,'title' => "Ladys night",'content'=>"Os melhores bolos de sempre!","location_id"=>"2","type"=>1,"user_id"=>3,"created_at"=>now()]);
        DB::table('posts')->insert([
            "id"=>7,'title' => "b2 Party",'content'=>"Os melhores bolos de sempre!","location_id"=>"2","type"=>1,"user_id"=>1,"created_at"=>now()]);
        DB::table('posts')->insert([
            "id"=>8,'title' => "Discoteca aberta",'content'=>"Os melhores bolos de sempre!","location_id"=>"1","type"=>1,"user_id"=>1,"created_at"=>now()]);
    }
}