<?php namespace Tests\Repositories;

use App\Models\DiscountDetail;
use App\Repositories\DiscountDetailRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class DiscountDetailRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var DiscountDetailRepository
     */
    protected $discountDetailRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->discountDetailRepo = \App::make(DiscountDetailRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_discount_detail()
    {
        $discountDetail = DiscountDetail::factory()->make()->toArray();

        $createdDiscountDetail = $this->discountDetailRepo->create($discountDetail);

        $createdDiscountDetail = $createdDiscountDetail->toArray();
        $this->assertArrayHasKey('id', $createdDiscountDetail);
        $this->assertNotNull($createdDiscountDetail['id'], 'Created DiscountDetail must have id specified');
        $this->assertNotNull(DiscountDetail::find($createdDiscountDetail['id']), 'DiscountDetail with given id must be in DB');
        $this->assertModelData($discountDetail, $createdDiscountDetail);
    }

    /**
     * @test read
     */
    public function test_read_discount_detail()
    {
        $discountDetail = DiscountDetail::factory()->create();

        $dbDiscountDetail = $this->discountDetailRepo->find($discountDetail->id);

        $dbDiscountDetail = $dbDiscountDetail->toArray();
        $this->assertModelData($discountDetail->toArray(), $dbDiscountDetail);
    }

    /**
     * @test update
     */
    public function test_update_discount_detail()
    {
        $discountDetail = DiscountDetail::factory()->create();
        $fakeDiscountDetail = DiscountDetail::factory()->make()->toArray();

        $updatedDiscountDetail = $this->discountDetailRepo->update($fakeDiscountDetail, $discountDetail->id);

        $this->assertModelData($fakeDiscountDetail, $updatedDiscountDetail->toArray());
        $dbDiscountDetail = $this->discountDetailRepo->find($discountDetail->id);
        $this->assertModelData($fakeDiscountDetail, $dbDiscountDetail->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_discount_detail()
    {
        $discountDetail = DiscountDetail::factory()->create();

        $resp = $this->discountDetailRepo->delete($discountDetail->id);

        $this->assertTrue($resp);
        $this->assertNull(DiscountDetail::find($discountDetail->id), 'DiscountDetail should not exist in DB');
    }
}
