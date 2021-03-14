<?php namespace Tests\Repositories;

use App\Models\CartDetail;
use App\Repositories\CartDetailRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class CartDetailRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var CartDetailRepository
     */
    protected $cartDetailRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->cartDetailRepo = \App::make(CartDetailRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_cart_detail()
    {
        $cartDetail = CartDetail::factory()->make()->toArray();

        $createdCartDetail = $this->cartDetailRepo->create($cartDetail);

        $createdCartDetail = $createdCartDetail->toArray();
        $this->assertArrayHasKey('id', $createdCartDetail);
        $this->assertNotNull($createdCartDetail['id'], 'Created CartDetail must have id specified');
        $this->assertNotNull(CartDetail::find($createdCartDetail['id']), 'CartDetail with given id must be in DB');
        $this->assertModelData($cartDetail, $createdCartDetail);
    }

    /**
     * @test read
     */
    public function test_read_cart_detail()
    {
        $cartDetail = CartDetail::factory()->create();

        $dbCartDetail = $this->cartDetailRepo->find($cartDetail->id);

        $dbCartDetail = $dbCartDetail->toArray();
        $this->assertModelData($cartDetail->toArray(), $dbCartDetail);
    }

    /**
     * @test update
     */
    public function test_update_cart_detail()
    {
        $cartDetail = CartDetail::factory()->create();
        $fakeCartDetail = CartDetail::factory()->make()->toArray();

        $updatedCartDetail = $this->cartDetailRepo->update($fakeCartDetail, $cartDetail->id);

        $this->assertModelData($fakeCartDetail, $updatedCartDetail->toArray());
        $dbCartDetail = $this->cartDetailRepo->find($cartDetail->id);
        $this->assertModelData($fakeCartDetail, $dbCartDetail->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_cart_detail()
    {
        $cartDetail = CartDetail::factory()->create();

        $resp = $this->cartDetailRepo->delete($cartDetail->id);

        $this->assertTrue($resp);
        $this->assertNull(CartDetail::find($cartDetail->id), 'CartDetail should not exist in DB');
    }
}
