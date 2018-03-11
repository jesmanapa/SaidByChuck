<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Text;

class ObtenerFrases extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'obtenerFrases {--mostradas=0}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Comando que devuelve las frases que han sido mostradas o no en la página. Por defecto el valor --mostradas=0.';

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
     * @return mixed
     */
    public function handle()
    {

        $frases = Text::where('show', $this->option('mostradas'))->get();

        echo $frases;
    }
}
