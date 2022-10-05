<?php

namespace Tests\Feature;

use App\Serie;
use App\Services\SerieService;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateSerieTest extends TestCase
{
    use RefreshDatabase;

    public function testCreate()
    {
        $createSerie = new SerieService();
        $newSerie = $createSerie->createSerie('Nome de teste', 1, 1);

        $this->assertInstanceOf(Serie::class, $newSerie);
        $this->assertDatabaseHas('series', ['name' => 'Nome de teste']);
        $this->assertDatabaseHas('seasons', ['serie_id' => $newSerie->id, 'number' => 1]);
        $this->assertDatabaseHas('episodes', ['number' => 1]);
    }
}
