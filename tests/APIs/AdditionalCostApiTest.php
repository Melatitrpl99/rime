<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\AdditionalCost;

class AdditionalCostApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_additional_cost()
    {
        $additionalCost = AdditionalCost::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/admin/additional_costs', $additionalCost
        );

        $this->assertApiResponse($additionalCost);
    }

    /**
     * @test
     */
    public function test_read_additional_cost()
    {
        $additionalCost = AdditionalCost::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/admin/additional_costs/'.$additionalCost->id
        );

        $this->assertApiResponse($additionalCost->toArray());
    }

    /**
     * @test
     */
    public function test_update_additional_cost()
    {
        $additionalCost = AdditionalCost::factory()->create();
        $editedAdditionalCost = AdditionalCost::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/admin/additional_costs/'.$additionalCost->id,
            $editedAdditionalCost
        );

        $this->assertApiResponse($editedAdditionalCost);
    }

    /**
     * @test
     */
    public function test_delete_additional_cost()
    {
        $additionalCost = AdditionalCost::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/admin/additional_costs/'.$additionalCost->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/admin/additional_costs/'.$additionalCost->id
        );

        $this->response->assertStatus(404);
    }
}
