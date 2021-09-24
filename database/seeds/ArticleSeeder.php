<?php
use App\Article;
use App\Author;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $authorList = [
            [
                'name'=>'Francesco',
                'surname'=>'Abate'
            ],
            [
                'name'=>'Elena',
                'surname'=>'Dusi'
            ],
            [
                'name'=>'Sharon',
                'surname'=>'Nizza'
            ],
            [
                'name'=>'Carlo',
                'surname'=>'Bonini'
            ],
            [
                'name'=>'Giovanna',
                'surname'=>'Vitale'
            ]
        ];


        $listOfAuthorID = [];

        foreach ($authorList as $author) {
            $authorObject = new Author();
            $authorObject->name = $author['name'];
            $authorObject->surname = $author['surname'];
            $authorObject->email = $faker->email();
            $authorObject->picture = $faker->imageUrl(640, 480, 'animal', true);
            $authorObject->save();
            $listOfAuthorID[] = $authorObject->id;
        }

        // for($x = 0; $x < 20; $x++) {
        //     $authorObject = new Author();
        //     $authorObject->name =  $faker->word(1);
        //     $authorObject->surname =  $faker->word(1);
        //     $authorObject->picture = $faker->imageUrl(640, 480, 'animal', true);
        //     $authorObject->email = $faker->email();
        //     $authorObject->save();
        //     $listOfAuthorID[] = $authorObject->id;
        // }




        for ($x = 0; $x < 50; $x++) {
            $articleObject = new Article();
            $articleObject->title = $faker->sentence(2);
            $articleObject->text = $faker->sentence(30);
            $articleObject->cover = $faker->imageUrl(640, 480, 'posts', true);
            $randAuthorKey = array_rand($listOfAuthorID, 1);
            $categoryID = $listOfAuthorID[$randAuthorKey];
            $articleObject->author_id = $categoryID;
            $articleObject->save();
        }
    }
}
