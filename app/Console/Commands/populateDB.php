<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Cache;

use Illuminate\Support\Facades\Mail;
use App\Mail\populateEmpleos;


use function PHPUnit\Framework\isNull;

class populateDB extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'populate:empleos';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Llena de empleos la Base de Datos';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        global $tipoTodos, $tipoDiscapacidad, $tipoPracticas,$tipoTeletrabajo;
        $timeStart = Carbon::now();
        $logoFunte = array();
        // Comprueba si hay un nuevo fichero de empleos
        if (!file_exists(public_path("collection.json"))) {
            return 0;
        }
        // Activa el modo mantenimiento
        $inicio = now();
        Artisan::call('down', ['--redirect' => null, '--retry' => null, '--secret' => null, '--status' => '503']);
        //borra la Cache
        Cache::flush();
        // Lee el json de empleos
        $path = public_path() . "/collection.json";
        $json = File::get($path);
        $empleos = json_decode($json, true);



        // Vacia las tablas

        $this->vaciaTablas();



        // Crear tipos

        DB::table('tipotodos')->insert(['name' => "Todos los trabajos"]);
        $tipoTodos = DB::table('tipotodos')->where('id',1)->first();
        DB::table('tipodiscapacidads')->insert(['name' => "Discapacidad"]);
        $tipoDiscapacidad = DB::table('tipodiscapacidads')->where('id',1)->first();
        DB::table('tipoteletrabajos')->insert(['name' => "Teletrabajo"]);
        $tipoTeletrabajo = DB::table('tipoteletrabajos')->where('id',1)->first();
        DB::table('tipopracticas')->insert(['name' => "Prácticas"]);
        $tipoPracticas = DB::table('tipoteletrabajos')->where('id',1)->first();

        foreach ($empleos as $empleo) {
            $this->trata_empleo($empleo);
        }
        $timeEnd = Carbon::now();
        $diff = $timeStart->diff($timeEnd)->format('%H:%I:%S');

        // Enviar mail
        //$mail = new populateEmpleos($diff);
        //Mail::to('carlos@allll.com')->send($mail);
        // Desacctiva el modo mantenimiento

        Artisan::call('up');
        $fin = now();
        echo "acabe";
        //File::delete($path);
        return 0;
    }
    public function trata_empleo($empleo)
    {
       global $tipoTodos, $tipoDiscapacidad, $tipoPracticas,$tipoTeletrabajo;

        if (isset($empleo['remoto'])) {
            return;
        }



        $autonomia = DB::table('autonomiatodos')->where('name', $empleo['autonomia'])->first();
        if (!$autonomia) {
            $slug = Str::slug($empleo['autonomia'], '-');

            DB::table('autonomiatodos')->insert(
                [
               'name' => $empleo['autonomia'],
                'slug' => $slug,
                'tipotodo_id' => $tipoTodos->id,
                ]
            );
            $autonomia = DB::table('autonomiatodos')->where('name',$empleo['autonomia'])->first();
        }

        $provincia = DB::table('provinciatodos')->where('name',$empleo['provincia'])->first();
        if (!$provincia) {
            $slug = Str::slug($empleo['provincia'], '-');
            DB::table('provinciatodos')->insert(
                [
                'name' => $empleo['provincia'],
                'slug' => $slug,
                'autonomia_id' => $autonomia->id,
                ]
            );
            $provincia = DB::table('provinciatodos')->where('name',$empleo['provincia'])->first();
        }

        $localidad = DB::table('localidadtodos')->where('name',$empleo['localidad'])->first();
        if (!$localidad) {
            $slug = Str::slug($empleo['localidad'], '-');
            DB::table('localidadtodos')->insert(
                [
                'name' => $empleo['localidad'],
                'slug' => $slug,
                'provincia_id' => $provincia->id,
                ]
            );
            $localidad = DB::table('localidadtodos')->where('name',$empleo['localidad'])->first();
        }

        $listaTipos ="";

        if (isset($empleo['discapacidad'])) {
            $listaTipos = $listaTipos . 'Discapacidad|';
        }

        if (isset($empleo['practicas'])) {
            $listaTipos = $listaTipos . 'Practicas|';
        }

        if (isset($empleo['teletrabajo'])) {
            $listaTipos = $listaTipos . 'Teletrabajo|';
        }

        // DEBEN EXISTIR

        $date = Carbon::createFromFormat('d/m/Y', $empleo['datePosted']);
        $dateNow = Carbon::now();
        $cantidadDias = $date->diffInDays($dateNow);
        $llave = strval($cantidadDias);
        if (strlen($llave) == 1) {
            $llave = "0" . $llave;
        }
        $randon = rand(10, 100000);
        $llave = $llave . strval($randon);

        $excerpt = null;
        if (isset($empleo['excerpt'])) {
            $excerpt = $empleo['excerpt'];
        }

        $vacantes = null;
        if (isset($empleo['vacantes'])) {
            $vacantes = $empleo['vacantes'];
        }

        $salario = null;
        if (isset($empleo['salario'])) {
            $salario = $empleo['salario'];
        }
        $ett = null;
        if (isset($empleo['ett'])) {
            $ett = $empleo['ett'];
        }
        $contrato = null;
        if (isset($empleo['contrato'])) {
            $contrato = $empleo['contrato'];
        }

        $jornada = null;
        if (isset($empleo['jornada'])) {
            $jornada = $empleo['jornada'];
        }
        $experiencia = null;
        if (isset($empleo['experiencia'])) {
            $experiencia = $empleo['experiencia'];
        }

        if ($listaTipos) {
            $listaTipos = substr($listaTipos, 0, -1);
        } else {
            $listaTipos = null;
        }


        if (isset($empleo['discapacidad'])) {
            $this->create_discapacidad($empleo, $tipoDiscapacidad,$listaTipos );

        }

        if (isset($empleo['teletrabajo'])) {

            $this->create_teletrabajo($empleo, $tipoTeletrabajo,$listaTipos );


        }

        if (isset($empleo['practicas'])) {
            $this->create_practicas($empleo, $tipoPracticas,$listaTipos );
        }

        DB::table('jobs_todos')->insert([
            'orden' => $llave,
            'datePosted' => $date,
            'title' => $empleo['title'],
            'jobFuente' => $empleo['JobFuente'],
            'jobUrl' => $empleo['JobUrl'],
            'excerpt'=> $excerpt,
            'vacantes' => $vacantes,
            'salario' => $salario,
            'ett' => $ett,
            'contrato' => $contrato,
            'jornada' => $jornada,
            'experiencia' => $experiencia,
            'listaTipos' => $listaTipos,
            'autonomia' => $autonomia->name,
            'provincia' => $provincia->name,
            'localidad' => $localidad->name,
            'autonomia_id' => $autonomia->id,
            'provincia_id' => $provincia->id,
            'localidad_id' => $localidad->id,
            'tipotodo_id' => $tipoTodos->id
        ]);

    }

    public function create_discapacidad($empleo, $tipoDiscapacidad, $listaTipos) {

        $autonomia = DB::table('autonomiadiscapacidads')->where('name', $empleo['autonomia'])->first();
        if (!$autonomia) {
            $slug = Str::slug($empleo['autonomia'], '-');
            DB::table('autonomiadiscapacidads')->insert(
                [
                'name' => $empleo['autonomia'],
                'slug' => $slug,
                'tipodiscapacidad_id' => $tipoDiscapacidad->id,
                ]
            );
            $autonomia = DB::table('autonomiadiscapacidads')->where('name',$empleo['autonomia'])->first();
        }

        $provincia = DB::table('provinciadiscapacidads')->where('name',$empleo['provincia'])->first();
        if (!$provincia) {
            $slug = Str::slug($empleo['provincia'], '-');
            DB::table('provinciadiscapacidads')->insert(
                [
                'name' => $empleo['provincia'],
                'slug' => $slug,
                'autonomia_id' => $autonomia->id,
                ]
            );
            $provincia = DB::table('provinciadiscapacidads')->where('name',$empleo['provincia'])->first();
        }

        $localidad = DB::table('localidaddiscapacidads')->where('name',$empleo['localidad'])->first();
        if (!$localidad) {
            $slug = Str::slug($empleo['localidad'], '-');
            DB::table('localidaddiscapacidads')->insert(
                [
                'name' => $empleo['localidad'],
                'slug' => $slug,
                'provincia_id' => $provincia->id,
                ]
            );
            $localidad = DB::table('localidaddiscapacidads')->where('name',$empleo['localidad'])->first();
        }

        $date = Carbon::createFromFormat('d/m/Y', $empleo['datePosted']);
        $dateNow = Carbon::now();
        $cantidadDias = $date->diffInDays($dateNow);
        $llave = strval($cantidadDias);
        if (strlen($llave) == 1) {
            $llave = "0" . $llave;
        }
        $randon = rand(10, 100000);
        $llave = $llave . strval($randon);

        $excerpt = null;
        if (isset($empleo['excerpt'])) {
            $excerpt = $empleo['excerpt'];
        }

        $vacantes = null;
        if (isset($empleo['vacantes'])) {
            $vacantes = $empleo['vacantes'];
        }

        $salario = null;
        if (isset($empleo['salario'])) {
            $salario = $empleo['salario'];
        }
        $ett = null;
        if (isset($empleo['ett'])) {
            $ett = $empleo['ett'];
        }
        $contrato = null;
        if (isset($empleo['contrato'])) {
            $contrato = $empleo['contrato'];
        }

        $jornada = null;
        if (isset($empleo['jornada'])) {
            $jornada = $empleo['jornada'];
        }
        $experiencia = null;
        if (isset($empleo['experiencia'])) {
            $experiencia = $empleo['experiencia'];
        }

        DB::table('jobs_discapacidads')->insert([
            'orden' => $llave,
            'datePosted' => $date,
            'title' => $empleo['title'],
            'jobFuente' => $empleo['JobFuente'],
            'jobUrl' => $empleo['JobUrl'],
            'excerpt'=> $excerpt,
            'vacantes' => $vacantes,
            'salario' => $salario,
            'ett' => $ett,
            'contrato' => $contrato,
            'jornada' => $jornada,
            'experiencia' => $experiencia,
            'listaTipos' => $listaTipos,
            'autonomia' => $autonomia->name,
            'provincia' => $provincia->name,
            'localidad' => $localidad->name,
            'autonomia_id' => $autonomia->id,
            'provincia_id' => $provincia->id,
            'localidad_id' => $localidad->id,
            'tipodiscapacidad_id' => $tipoDiscapacidad->id
        ]);


    }
    public function create_teletrabajo($empleo, $tipoTeletrabajo, $listaTipos) {
        $autonomia = DB::table('autonomiateletrabajos')->where('name', $empleo['autonomia'])->first();
        if (!$autonomia) {
            $slug = Str::slug($empleo['autonomia'], '-');
            DB::table('autonomiateletrabajos')->insert(
                [
                'name' => $empleo['autonomia'],
                'slug' => $slug,
                'tipoteletrabajo_id' => $tipoTeletrabajo->id,
                ]
            );
            $autonomia = DB::table('autonomiateletrabajos')->where('name',$empleo['autonomia'])->first();
        }

        $provincia = DB::table('provinciateletrabajos')->where('name',$empleo['provincia'])->first();
        if (!$provincia) {
            $slug = Str::slug($empleo['provincia'], '-');
            DB::table('provinciateletrabajos')->insert(
                [
                'name' => $empleo['provincia'],
                'slug' => $slug,
                'autonomia_id' => $autonomia->id,
                ]
            );
            $provincia = DB::table('provinciateletrabajos')->where('name',$empleo['provincia'])->first();
        }

        $localidad = DB::table('localidadteletrabajos')->where('name',$empleo['localidad'])->first();
        if (!$localidad) {
            $slug = Str::slug($empleo['localidad'], '-');
            DB::table('localidadteletrabajos')->insert(
                [
                'name' => $empleo['localidad'],
                'slug' => $slug,
                'provincia_id' => $provincia->id,
                ]
            );
            $localidad = DB::table('localidadteletrabajos')->where('name',$empleo['localidad'])->first();
        }

        $date = Carbon::createFromFormat('d/m/Y', $empleo['datePosted']);
        $dateNow = Carbon::now();
        $cantidadDias = $date->diffInDays($dateNow);
        $llave = strval($cantidadDias);
        if (strlen($llave) == 1) {
            $llave = "0" . $llave;
        }
        $randon = rand(10, 100000);
        $llave = $llave . strval($randon);

        $excerpt = null;
        if (isset($empleo['excerpt'])) {
            $excerpt = $empleo['excerpt'];
        }

        $vacantes = null;
        if (isset($empleo['vacantes'])) {
            $vacantes = $empleo['vacantes'];
        }

        $salario = null;
        if (isset($empleo['salario'])) {
            $salario = $empleo['salario'];
        }
        $ett = null;
        if (isset($empleo['ett'])) {
            $ett = $empleo['ett'];
        }
        $contrato = null;
        if (isset($empleo['contrato'])) {
            $contrato = $empleo['contrato'];
        }

        $jornada = null;
        if (isset($empleo['jornada'])) {
            $jornada = $empleo['jornada'];
        }
        $experiencia = null;
        if (isset($empleo['experiencia'])) {
            $experiencia = $empleo['experiencia'];
        }

        DB::table('jobs_teletrabajos')->insert([
            'orden' => $llave,
            'datePosted' => $date,
            'title' => $empleo['title'],
            'jobFuente' => $empleo['JobFuente'],
            'jobUrl' => $empleo['JobUrl'],
            'excerpt'=> $excerpt,
            'vacantes' => $vacantes,
            'salario' => $salario,
            'ett' => $ett,
            'contrato' => $contrato,
            'jornada' => $jornada,
            'experiencia' => $experiencia,
            'listaTipos' => $listaTipos,
            'autonomia' => $autonomia->name,
            'provincia' => $provincia->name,
            'localidad' => $localidad->name,
            'autonomia_id' => $autonomia->id,
            'provincia_id' => $provincia->id,
            'localidad_id' => $localidad->id,
            'tipoteletrabajo_id' => $tipoTeletrabajo->id

        ]);


    }


    public function create_practicas($empleo, $tipoPracticas, $listaTipos) {
        $autonomia = DB::table('autonomiapracticas')->where('name', $empleo['autonomia'])->first();
        if (!$autonomia) {
            $slug = Str::slug($empleo['autonomia'], '-');
            DB::table('autonomiapracticas')->insert(
                [
                'name' => $empleo['autonomia'],
                'slug' => $slug,
                'tipopractica_id' => $tipoPracticas->id,
                ]
            );
            $autonomia = DB::table('autonomiapracticas')->where('name',$empleo['autonomia'])->first();
        }

        $provincia = DB::table('provinciapracticas')->where('name',$empleo['provincia'])->first();
        if (!$provincia) {
            $slug = Str::slug($empleo['provincia'], '-');
            DB::table('provinciapracticas')->insert(
                [
                'name' => $empleo['provincia'],
                'slug' => $slug,
                'autonomia_id' => $autonomia->id,
                ]
            );
            $provincia = DB::table('provinciapracticas')->where('name',$empleo['provincia'])->first();
        }

        $localidad = DB::table('localidadpracticas')->where('name',$empleo['localidad'])->first();
        if (!$localidad) {
            $slug = Str::slug($empleo['localidad'], '-');
            DB::table('localidadpracticas')->insert(
                [
                'name' => $empleo['localidad'],
                'slug' => $slug,
                'provincia_id' => $provincia->id,
                ]
            );
            $localidad = DB::table('localidadpracticas')->where('name',$empleo['localidad'])->first();
        }

        $date = Carbon::createFromFormat('d/m/Y', $empleo['datePosted']);
        $dateNow = Carbon::now();
        $cantidadDias = $date->diffInDays($dateNow);
        $llave = strval($cantidadDias);
        if (strlen($llave) == 1) {
            $llave = "0" . $llave;
        }
        $randon = rand(10, 100000);
        $llave = $llave . strval($randon);

        $excerpt = null;
        if (isset($empleo['excerpt'])) {
            $excerpt = $empleo['excerpt'];
        }

        $vacantes = null;
        if (isset($empleo['vacantes'])) {
            $vacantes = $empleo['vacantes'];
        }

        $salario = null;
        if (isset($empleo['salario'])) {
            $salario = $empleo['salario'];
        }
        $ett = null;
        if (isset($empleo['ett'])) {
            $ett = $empleo['ett'];
        }
        $contrato = null;
        if (isset($empleo['contrato'])) {
            $contrato = $empleo['contrato'];
        }

        $jornada = null;
        if (isset($empleo['jornada'])) {
            $jornada = $empleo['jornada'];
        }
        $experiencia = null;
        if (isset($empleo['experiencia'])) {
            $experiencia = $empleo['experiencia'];
        }

        DB::table('jobs_practicas')->insert([
            'orden' => $llave,
            'datePosted' => $date,
            'title' => $empleo['title'],
            'jobFuente' => $empleo['JobFuente'],
            'jobUrl' => $empleo['JobUrl'],
            'excerpt'=> $excerpt,
            'vacantes' => $vacantes,
            'salario' => $salario,
            'ett' => $ett,
            'contrato' => $contrato,
            'jornada' => $jornada,
            'experiencia' => $experiencia,
            'listaTipos' => $listaTipos,
            'autonomia' => $autonomia->name,
            'provincia' => $provincia->name,
            'localidad' => $localidad->name,
            'autonomia_id' => $autonomia->id,
            'provincia_id' => $provincia->id,
            'localidad_id' => $localidad->id,
            'tipopractica_id' => $tipoPracticas->id

        ]);
    }

    public function vaciaTablas()
    {
        DB::statement("SET foreign_key_checks=0");
        $databaseName = DB::getDatabaseName();
        $tables = DB::select("SELECT * FROM information_schema.tables WHERE table_schema = '$databaseName'");
        foreach ($tables as $table) {
            $name = $table->TABLE_NAME;
            //if you don't want to truncate migrations
            if ($name == 'migrations' || $name == 'failed_jobs' || $name == 'password_resets' || $name == 'personal_access_tokens' || $name == 'sessions' || $name == 'users') {
                continue;
            }
            DB::table($name)->truncate();
        }
        DB::statement("SET foreign_key_checks=1");
        $pathDirectory = storage_path("app/public/logo_images");
        if (File::exists($pathDirectory)) {
            File::deleteDirectory($pathDirectory);
            File::makeDirectory($pathDirectory);
        } else {
            File::makeDirectory($pathDirectory);
        }
    }
}
