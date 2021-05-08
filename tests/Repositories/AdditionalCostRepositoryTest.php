<?php namespace Tests\Repositories;

use App\Models\AdditionalCost;
use App\Repositories\AdditionalCostRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class AdditionalCostRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var AdditionalCostRepository
     */
    protected $additionalCostRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->additionalCostRepo = \App::make(AdditionalCostRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_additional_cost()
    {
        $additionalCost = AdditionalCost::factory()->make()->toArray();

        $createdAdditionalCost = $this->additionalCostRepo->create($additionalCost);

        $createdAdditionalCost = $createdAdditionalCost->toArray();
        $this->assertArrayHasKey('id', $createdAdditionalCost);
        $this->assertNotNull($createdAdditionalCost['id'], 'Created AdditionalCost must have id specified');
        $this->assertNotNull(AdditionalCost::find($createdAdditionalCost['id']), 'AdditionalCost with given id must be in DB');
        $this->assertModelData($additionalCost, $createdAdditionalCost);
    }

    /**
     * @test read
     */
    public function test_read_additional_cost()
    {
        $additionalCost = AdditionalCost::factory()->create();

        $dbAdditionalCost = $this->additionalCostRepo->find($additionalCost->id);

        $dbAdditionalCost = $dbAdditionalCost->toArray();
        $this->assertModelData($additionalCost->toArray(), $dbAdditionalCost);
    }

    /**
     * @test update
     */
    public function test_update_additional_cost()
    {
        $additionalCost = AdditionalCost::factory()->create();
        $fakeAdditionalCost = AdditionalCost::factory()->make()->toArray();

        $updatedAdditionalCost = $this->additionalCostRepo->update($fakeAdditionalCost, $additionalCost->id);

        $this->assertModelData($fakeAdditionalCost, $updatedAdditionalCost->toArray());
        $dbAdditionalCost = $this->additionalCostRepo->find($additionalCost->id);
        $this->assertModelData($fakeAdditionalCost, $dbAdditionalCost->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_additional_cost()
    {
        $additionalCost = AdditionalCost::factory()->create();

        $resp = $this->additionalCostRepo->delete($additionalCost->id);

        $this->assertTrue($resp);
        $this->assertNull(AdditionalCost::find($additionalCost->id), 'AdditionalCost should not exist in DB');
    }
}
