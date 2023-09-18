<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CmsDataSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('cms_data')->insert([
            'title' => 'O desafio da vez é',
            'subtitle' => 'Terraplanagem sustentavel',
            'bg_image_path' => Storage::path('Vitrine.png'),
            'content' => 'Lorem ipsum dolor sit amet. Aut distinctio impedit id laboriosam molestiae ut aspernatur similique ea velit delectus. Et magni doloribus ut doloremque aliquam aut doloribus facere qui assumenda maiores sit itaque aliquid id sunt nihil At enim alias. Sed placeat nesciunt et aliquam exercitationem qui debitis laudantium est ullam modi eos voluptate distinctio et quasi adipisci. Ea odit nihil non suscipit voluptas eos magni dolores. Nam totam sint et quia harum id iste quam non excepturi perferendis 33 facere placeat ex reiciendis nisi. Sed optio alias est nemo enim vel quia reiciendis et consequatur cupiditate! Eum sint quidem At ipsam maxime qui neque error. At quidem voluptatem sed quisquam cupiditate non nulla laudantium et velit rerum ut assumenda dolorum quo repellendus placeat. Ut quis aliquid non aliquid internos sit autem reiciendis qui sunt soluta aut eligendi voluptates. Et mollitia repudiandae ut numquam officia et impedit ipsam et expedita repellat cum consectetur nobis. Sit porro ipsa ut distinctio maxime et tempore corporis. Ut ipsam praesentium sit voluptas dolorem cum aliquam necessitatibus et possimus tempore. Quo consequuntur delectus in voluptatem corporis eum ipsam nostrum sit temporibus praesentium est sint odio est sequi similique non voluptas veritatis. Qui incidunt nemo ex sequi provident et galisum nulla. </p><p>Qui necessitatibus fugit sed delectus molestiae hic voluptates tempore. Est iusto voluptas aut tempora beatae et sint iusto in quas voluptatem ut exercitationem suscipit est aliquam exercitationem non autem explicabo? Qui accusamus porro et necessitatibus temporibus eum nisi dolores. Nam quas dolor et nemo neque aut molestiae neque. Et nobis nisi a earum autem sit aliquid galisum eum magni labore qui molestias deleniti sit sunt sint et voluptas Quis. Et voluptas mollitia quo culpa quia non dolores tenetur. Eum voluptatem dolores ad voluptatum enim non quae dignissimos et autem culpa in eaque sunt et harum nesciunt? Vel ullam doloribus et officiis molestias hic nobis consequatur et inventore nemo ut aperiam impedit aut asperiores explicabo! Et beatae omnis et veritatis soluta hic error expedita ut asperiores natus. Et vero veniam aut quas dolorem est amet voluptatem ea dolore quos rem consequatur voluptatibus? Eum voluptatem illum rem placeat sunt qui culpa temporibus in cupiditate debitis. Quo enim minima vel culpa incidunt sed omnis consequatur. 33 quaerat veniam ut placeat eius nam harum enim nam fugit autem est quod illum. Ab cumque culpa et galisum cupiditate est omnis dolorem qui odio optio cum dolores omnis vel voluptatem consectetur? '
       ]);
    }
}
