<?php

namespace Tests\Feature;

use App\Models\Vegetal;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomePageTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function home_carrega_com_sucesso()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Cultive o Futuro');
    }

    /** @test */
    public function filtra_por_categoria_vegetal()
    {
        // Arrange: cria um vegetal e uma fruta
        $vegetal = Vegetal::factory()->create([
            'nome' => 'Alface Teste',
            'categoria' => 'vegetal',
        ]);

        $fruta = Vegetal::factory()->create([
            'nome' => 'Maçã Teste',
            'categoria' => 'fruta',
        ]);

        // Act: acessa a home filtrando por categoria=vegetal
        $response = $this->get('/?categoria=vegetal');

        // Assert: vê o vegetal e não vê a fruta
        $response->assertStatus(200);
        $response->assertSee('Alface Teste');
        $response->assertDontSee('Maçã Teste');
    }
}
