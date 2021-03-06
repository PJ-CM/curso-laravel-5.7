<?php

use App\Post;
use App\User;
use App\Curso;
use App\Profesor;
use App\Estudiante;
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
        factory(User::class, 15)->create();

        factory(Post::class, 15)->create();

        factory(Profesor::class, 50)->create();

        $cantidadEstudiantes = 500;
        $estudiantes = factory(Estudiante::class, $cantidadEstudiantes)->create();

        $cursos = factory(Curso::class, 40)->create()
            ->each(function ($curso) use ($estudiantes) {
                $curso->estudiantes()
                    ->attach($estudiantes->random(40)->pluck('id'));
            });

    }
}
