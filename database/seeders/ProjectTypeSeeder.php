<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\ProjectType;

class ProjectTypeSeeder extends Seeder
{
    public function run(): void
    {
        ProjectType::create(["name" => "Requerimientos"]);
        ProjectType::create(["name" => "Diseño"]);
        ProjectType::create(["name" => "Código"]);
        ProjectType::create(["name" => "Pruebas"]);
        ProjectType::create(["name" => "Despliegue"]);
        ProjectType::create(["name" => "Mantenimiento"]);
        ProjectType::create(["name" => "Documentación"]);
    }
}
