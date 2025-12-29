<?php

namespace Database\Seeders;

use App\Models\Vegetal;
use Illuminate\Database\Seeder;

class VegetaisSeeder extends Seeder
{
    public function run(): void
    {
        $vegetais = [
            // ===== VEGETAIS / FOLHOSAS =====
            ['nome' => 'Alface Americana', 'categoria' => 'vegetal', 'descricao' => 'Alface crocante e fresca'],
            ['nome' => 'Alface Crespa', 'categoria' => 'vegetal', 'descricao' => 'Alface de folhas onduladas'],
            ['nome' => 'Espinafre', 'categoria' => 'vegetal', 'descricao' => 'Folha rica em ferro'],
            ['nome' => 'Couve Manteiga', 'categoria' => 'vegetal', 'descricao' => 'Couve macia e saborosa'],
            ['nome' => 'Repolho Verde', 'categoria' => 'vegetal', 'descricao' => 'Repolho firme e compacto'],
            ['nome' => 'Repolho Roxo', 'categoria' => 'vegetal', 'descricao' => 'Repolho roxo nutritivo'],
            ['nome' => 'Rúcula', 'categoria' => 'vegetal', 'descricao' => 'Folha com sabor péperlado'],
            ['nome' => 'Acelga Suíça', 'categoria' => 'vegetal', 'descricao' => 'Folha com talo colorido'],
            ['nome' => 'Chicória', 'categoria' => 'vegetal', 'descricao' => 'Folha amarga e nutritiva'],
            ['nome' => 'Almeirão', 'categoria' => 'vegetal', 'descricao' => 'Folha amarga brasileira'],
            ['nome' => 'Mostarda', 'categoria' => 'vegetal', 'descricao' => 'Folha picante'],
            ['nome' => 'Agrião', 'categoria' => 'vegetal', 'descricao' => 'Folha aquática pimentada'],

            // ===== LEGUMES / VAGENS =====
            ['nome' => 'Feijão Preto', 'categoria' => 'legume', 'descricao' => 'Feijão tradicional brasileiro'],
            ['nome' => 'Feijão Carioca', 'categoria' => 'legume', 'descricao' => 'Feijão popular do Brasil'],
            ['nome' => 'Ervilha', 'categoria' => 'legume', 'descricao' => 'Legume doce e nutritivo'],
            ['nome' => 'Vagem Francesa', 'categoria' => 'legume', 'descricao' => 'Vagem fresca e macia'],
            ['nome' => 'Feijão Verde', 'categoria' => 'legume', 'descricao' => 'Vagem de feijão verde'],
            ['nome' => 'Tremoço', 'categoria' => 'legume', 'descricao' => 'Legume proteico'],
            ['nome' => 'Grão de Bico', 'categoria' => 'legume', 'descricao' => 'Legume nutritivo'],
            ['nome' => 'Lentilha', 'categoria' => 'legume', 'descricao' => 'Legume proteico e saudável'],

            // ===== RAÍZES =====
            ['nome' => 'Cenoura', 'categoria' => 'raiz', 'descricao' => 'Cenoura laranja doce'],
            ['nome' => 'Cenoura Roxa', 'categoria' => 'raiz', 'descricao' => 'Cenoura roxa antioxidante'],
            ['nome' => 'Batata Inglesa', 'categoria' => 'raiz', 'descricao' => 'Batata versátil e nutritiva'],
            ['nome' => 'Batata Doce', 'categoria' => 'raiz', 'descricao' => 'Batata doce rica em carboidratos'],
            ['nome' => 'Batata Roxa', 'categoria' => 'raiz', 'descricao' => 'Batata roxa antioxidante'],
            ['nome' => 'Beterraba', 'categoria' => 'raiz', 'descricao' => 'Beterraba vermelha doce'],
            ['nome' => 'Beterraba Roxa', 'categoria' => 'raiz', 'descricao' => 'Beterraba roxa nutritiva'],
            ['nome' => 'Nabo', 'categoria' => 'raiz', 'descricao' => 'Nabo branco e macio'],
            ['nome' => 'Rabanete', 'categoria' => 'raiz', 'descricao' => 'Rabanete pimentado'],
            ['nome' => 'Inhame', 'categoria' => 'raiz', 'descricao' => 'Inhame cremoso'],
            ['nome' => 'Cará', 'categoria' => 'raiz', 'descricao' => 'Cará nutritivo'],
            ['nome' => 'Mandioca', 'categoria' => 'raiz', 'descricao' => 'Mandioca para polvilho e farinha'],
            ['nome' => 'Aipim', 'categoria' => 'raiz', 'descricao' => 'Aipim fresco e macio'],
            ['nome' => 'Macaxeira', 'categoria' => 'raiz', 'descricao' => 'Macaxeira doce'],
            ['nome' => 'Taro', 'categoria' => 'raiz', 'descricao' => 'Taro tropical exótico'],
            ['nome' => 'Batata Baroa', 'categoria' => 'raiz', 'descricao' => 'Batata baroa cremosa'],

            // ===== BULBOS =====
            ['nome' => 'Cebola', 'categoria' => 'bulbo', 'descricao' => 'Cebola branca comum'],
            ['nome' => 'Cebola Roxa', 'categoria' => 'bulbo', 'descricao' => 'Cebola roxa doce'],
            ['nome' => 'Cebola Branca', 'categoria' => 'bulbo', 'descricao' => 'Cebola branca pungente'],
            ['nome' => 'Alho', 'categoria' => 'bulbo', 'descricao' => 'Alho aromático essencial'],
            ['nome' => 'Alho Poró', 'categoria' => 'bulbo', 'descricao' => 'Alho poró suave'],

            // ===== TOMATES =====
            ['nome' => 'Tomate Caqui', 'categoria' => 'fruta', 'descricao' => 'Tomate grande suculento'],
            ['nome' => 'Tomate Cereja', 'categoria' => 'fruta', 'descricao' => 'Tomate pequeno e doce'],
            ['nome' => 'Tomate Grape', 'categoria' => 'fruta', 'descricao' => 'Tomate alongado doce'],
            ['nome' => 'Tomate Italiano', 'categoria' => 'fruta', 'descricao' => 'Tomate para molhos'],
            ['nome' => 'Tomate Cherry', 'categoria' => 'fruta', 'descricao' => 'Tomate cereja premium'],

            // ===== PIMENTAS / PIMENTÕES =====
            ['nome' => 'Pimenta Biquinho', 'categoria' => 'fruta', 'descricao' => 'Pimenta doce e suave'],
            ['nome' => 'Pimenta Dedo de Moça', 'categoria' => 'fruta', 'descricao' => 'Pimenta vermelha picante'],
            ['nome' => 'Pimentão Verde', 'categoria' => 'fruta', 'descricao' => 'Pimentão crocante verde'],
            ['nome' => 'Pimentão Vermelho', 'categoria' => 'fruta', 'descricao' => 'Pimentão doce vermelho'],
            ['nome' => 'Pimentão Amarelo', 'categoria' => 'fruta', 'descricao' => 'Pimentão doce amarelo'],
            ['nome' => 'Pimenta de Cheiro', 'categoria' => 'fruta', 'descricao' => 'Pimenta aromática'],

            // ===== FRUTAS =====
            ['nome' => 'Melancia', 'categoria' => 'fruta', 'descricao' => 'Melancia doce refrescante'],
            ['nome' => 'Melancia Sem Sementes', 'categoria' => 'fruta', 'descricao' => 'Melancia prática'],
            ['nome' => 'Melancia Amarela', 'categoria' => 'fruta', 'descricao' => 'Melancia amarela exótica'],
            ['nome' => 'Melão Cantaloupe', 'categoria' => 'fruta', 'descricao' => 'Melão aromático'],
            ['nome' => 'Melão', 'categoria' => 'fruta', 'descricao' => 'Melão doce clássico'],
            ['nome' => 'Morango', 'categoria' => 'fruta', 'descricao' => 'Morango vermelho doce'],
            ['nome' => 'Morango Branco', 'categoria' => 'fruta', 'descricao' => 'Morango branco exótico'],
            ['nome' => 'Morango de Estufa', 'categoria' => 'fruta', 'descricao' => 'Morango de cultivo protegido'],
            ['nome' => 'Maçã Verde', 'categoria' => 'fruta', 'descricao' => 'Maçã verde azeda'],
            ['nome' => 'Maçã Vermelha', 'categoria' => 'fruta', 'descricao' => 'Maçã vermelha doce'],
            ['nome' => 'Maçã Fuji', 'categoria' => 'fruta', 'descricao' => 'Maçã Fuji doce e crocante'],
            ['nome' => 'Banana Prata', 'categoria' => 'fruta', 'descricao' => 'Banana prata clássica'],
            ['nome' => 'Banana Terra', 'categoria' => 'fruta', 'descricao' => 'Banana terra nutritiva'],
            ['nome' => 'Uva Verde', 'categoria' => 'fruta', 'descricao' => 'Uva verde refrescante'],
            ['nome' => 'Uva Roxa', 'categoria' => 'fruta', 'descricao' => 'Uva roxa doce'],
            ['nome' => 'Uva Itália', 'categoria' => 'fruta', 'descricao' => 'Uva Itália premium'],
            ['nome' => 'Laranja Pera', 'categoria' => 'fruta', 'descricao' => 'Laranja suculenta'],
            ['nome' => 'Laranja', 'categoria' => 'fruta', 'descricao' => 'Laranja clássica'],
            ['nome' => 'Limão Tahiti', 'categoria' => 'fruta', 'descricao' => 'Limão sem sementes'],
            ['nome' => 'Limão Siciliano', 'categoria' => 'fruta', 'descricao' => 'Limão perfumado'],
            ['nome' => 'Mamão Papaia', 'categoria' => 'fruta', 'descricao' => 'Mamão doce tropical'],
            ['nome' => 'Mamão', 'categoria' => 'fruta', 'descricao' => 'Mamão clássico'],
            ['nome' => 'Manga Palmer', 'categoria' => 'fruta', 'descricao' => 'Manga Palmer suculenta'],
            ['nome' => 'Manga Ubá', 'categoria' => 'fruta', 'descricao' => 'Manga Ubá doce'],
            ['nome' => 'Manga', 'categoria' => 'fruta', 'descricao' => 'Manga tropical deliciosa'],
            ['nome' => 'Abacaxi', 'categoria' => 'fruta', 'descricao' => 'Abacaxi doce tropical'],
            ['nome' => 'Goiaba', 'categoria' => 'fruta', 'descricao' => 'Goiaba vermelha doce'],
            ['nome' => 'Pêssego', 'categoria' => 'fruta', 'descricao' => 'Pêssego suculento'],
            ['nome' => 'Pera', 'categoria' => 'fruta', 'descricao' => 'Pera macia doce'],
            ['nome' => 'Amora', 'categoria' => 'fruta', 'descricao' => 'Amora preta nutritiva'],
            ['nome' => 'Framboesa', 'categoria' => 'fruta', 'descricao' => 'Framboesa delicada'],
            ['nome' => 'Mirtilo', 'categoria' => 'fruta', 'descricao' => 'Mirtilo azul antioxidante'],
            ['nome' => 'Mirtilo Azul', 'categoria' => 'fruta', 'descricao' => 'Mirtilo premium'],
            ['nome' => 'Graviola', 'categoria' => 'fruta', 'descricao' => 'Graviola cremosa tropical'],
            ['nome' => 'Jaca', 'categoria' => 'fruta', 'descricao' => 'Jaca grande tropical'],
            ['nome' => 'Pitanga', 'categoria' => 'fruta', 'descricao' => 'Pitanga pequena doce'],
            ['nome' => 'Carambola', 'categoria' => 'fruta', 'descricao' => 'Carambola em forma de estrela'],
            ['nome' => 'Kiwi', 'categoria' => 'fruta', 'descricao' => 'Kiwi verde ácido'],

            // ===== ABÓBORAS / CUCURBITÁCEAS =====
            ['nome' => 'Abóbora Japonesa', 'categoria' => 'vegetal', 'descricao' => 'Abóbora pequena japonesa'],
            ['nome' => 'Abóbora Menina', 'categoria' => 'vegetal', 'descricao' => 'Abóbora redonda compacta'],
            ['nome' => 'Abóbora', 'categoria' => 'vegetal', 'descricao' => 'Abóbora clássica grande'],
            ['nome' => 'Moranga Vermelha', 'categoria' => 'vegetal', 'descricao' => 'Moranga vermelha nutritiva'],
            ['nome' => 'Moranga', 'categoria' => 'vegetal', 'descricao' => 'Moranga clássica'],
            ['nome' => 'Abobrinha Verde', 'categoria' => 'vegetal', 'descricao' => 'Abobrinha fresca'],
            ['nome' => 'Abobrinha Italiana', 'categoria' => 'vegetal', 'descricao' => 'Abobrinha elongada'],
            ['nome' => 'Abobrinha', 'categoria' => 'vegetal', 'descricao' => 'Abobrinha macia'],
            ['nome' => 'Pepino', 'categoria' => 'vegetal', 'descricao' => 'Pepino crocante'],
            ['nome' => 'Pepino Japonês', 'categoria' => 'vegetal', 'descricao' => 'Pepino fino japonês'],

            // ===== BRASSICAS =====
            ['nome' => 'Brócolis', 'categoria' => 'vegetal', 'descricao' => 'Brócolis verde nutritivo'],
            ['nome' => 'Couve-Flor', 'categoria' => 'vegetal', 'descricao' => 'Couve-flor branca macia'],
            ['nome' => 'Couve-Flor Verde', 'categoria' => 'vegetal', 'descricao' => 'Couve-flor verde crocante'],
            ['nome' => 'Broto de Feijão', 'categoria' => 'vegetal', 'descricao' => 'Broto fresco crocante'],
            ['nome' => 'Broto de Soja', 'categoria' => 'vegetal', 'descricao' => 'Broto de soja nutritivo'],

            // ===== CEREAIS / GRÃOS =====
            ['nome' => 'Milho Doce', 'categoria' => 'fruta', 'descricao' => 'Milho doce suculento'],
            ['nome' => 'Milho Verde', 'categoria' => 'fruta', 'descricao' => 'Milho fresco verde'],
            ['nome' => 'Milho', 'categoria' => 'fruta', 'descricao' => 'Milho clássico'],
            ['nome' => 'Milho Pipoca', 'categoria' => 'fruta', 'descricao' => 'Milho para pipoca'],
            ['nome' => 'Arroz', 'categoria' => 'cereal', 'descricao' => 'Arroz branco básico'],
            ['nome' => 'Arroz Integral', 'categoria' => 'cereal', 'descricao' => 'Arroz integral nutritivo'],
            ['nome' => 'Trigo', 'categoria' => 'cereal', 'descricao' => 'Trigo branco'],
            ['nome' => 'Trigo Integral', 'categoria' => 'cereal', 'descricao' => 'Trigo integral saudável'],

            // ===== TEMPEROS / AROMÁTICAS =====
            ['nome' => 'Salsa', 'categoria' => 'tempero', 'descricao' => 'Salsa fresca aromática'],
            ['nome' => 'Cebolinha Verde', 'categoria' => 'tempero', 'descricao' => 'Cebolinha fresca'],
            ['nome' => 'Cebolinha', 'categoria' => 'tempero', 'descricao' => 'Cebolinha tradicional'],
            ['nome' => 'Manjericão', 'categoria' => 'tempero', 'descricao' => 'Manjericão aromático'],
            ['nome' => 'Orégão', 'categoria' => 'tempero', 'descricao' => 'Orégão seco aromático'],
            ['nome' => 'Tomilho', 'categoria' => 'tempero', 'descricao' => 'Tomilho fresco'],
            ['nome' => 'Gengibre', 'categoria' => 'raiz', 'descricao' => 'Gengibre aromático'],
            ['nome' => 'Alecrim', 'categoria' => 'tempero', 'descricao' => 'Alecrim aromático'],
            ['nome' => 'Hortelã', 'categoria' => 'tempero', 'descricao' => 'Hortelã refrescante'],
            ['nome' => 'Louro', 'categoria' => 'tempero', 'descricao' => 'Folha de louro'],
            ['nome' => 'Cilantro', 'categoria' => 'tempero', 'descricao' => 'Cilantro fresco'],
            ['nome' => 'Coentro', 'categoria' => 'tempero', 'descricao' => 'Coentro aromático'],
            ['nome' => 'Estragão', 'categoria' => 'tempero', 'descricao' => 'Estragão delicado'],
            ['nome' => 'Endro', 'categoria' => 'tempero', 'descricao' => 'Endro aromático'],
            ['nome' => 'Curry', 'categoria' => 'tempero', 'descricao' => 'Curry especiaria'],
            ['nome' => 'Capim-Cidreira', 'categoria' => 'tempero', 'descricao' => 'Capim-cidreira refrescante'],
            ['nome' => 'Camomila', 'categoria' => 'tempero', 'descricao' => 'Camomila para chás'],
            ['nome' => 'Calêndula', 'categoria' => 'tempero', 'descricao' => 'Calêndula medicinal'],

            // ===== COGUMELOS =====
            ['nome' => 'Cogumelo Champignon', 'categoria' => 'vegetal', 'descricao' => 'Champignon fresco'],
            ['nome' => 'Champignon', 'categoria' => 'vegetal', 'descricao' => 'Champignon clássico'],
            ['nome' => 'Cogumelo Oyster', 'categoria' => 'vegetal', 'descricao' => 'Cogumelo ostra macio'],
            ['nome' => 'Cogumelo Shitake', 'categoria' => 'vegetal', 'descricao' => 'Shitake umami'],

            // ===== OLEAGINOSAS =====
            ['nome' => 'Amendoim', 'categoria' => 'legume', 'descricao' => 'Amendoim nutritivo'],
            ['nome' => 'Girassol', 'categoria' => 'cereal', 'descricao' => 'Girassol para sementes'],

            // ===== DIVERSOS =====
            ['nome' => 'Melada', 'categoria' => 'raiz', 'descricao' => 'Melada doce cremosa'],
            ['nome' => 'Cará Doce', 'categoria' => 'raiz', 'descricao' => 'Cará doce nutritivo'],
            ['nome' => 'Yacon', 'categoria' => 'raiz', 'descricao' => 'Yacon adoçante natural'],
            ['nome' => 'Batata Doce Roxa', 'categoria' => 'raiz', 'descricao' => 'Batata doce roxa antioxidante'],
            ['nome' => 'Cana de Açúcar', 'categoria' => 'cereal', 'descricao' => 'Cana de açúcar fresca'],
        ];

        foreach ($vegetais as $vegetal) {
            Vegetal::firstOrCreate(
                ['nome' => $vegetal['nome']],
                [
                    'categoria' => $vegetal['categoria'],
                    'descricao' => $vegetal['descricao'],
                    // Default values for required fields
                    'clima' => 'Temperado / Genérico',
                    'tempo_plantio_dias' => 45,
                    'profundidade_plantio_cm' => 1.0,
                    'distancia_entre_plantas_cm' => 25.0,
                    'umidade_solo_percentual' => 50.0,
                ]
            );
        }
    }
}
