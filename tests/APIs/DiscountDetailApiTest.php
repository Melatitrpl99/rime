<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\DiscountDetail;

class DiscountDetailApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_discount_detail()
    {
        $discountDetail = DiscountDetail::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/admin/discount_details', $discountDetail
        );

        $this->assertApiResponse($discountDetail);
    }

    /**
     * @test
     */
    public function test_read_discount_detail()
    {
        $discountDetail = DiscountDetail::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/admin/discount_details/'.$discountDetail->id
        );

        $this->assertApiResponse($discountDetail->toArray());
    }

    /**
     * @test
     */
    public function test_update_discount_detail()
    {
        $discountDetail = DiscountDetail::factory()->create();
        $editedDiscountDetail = DiscountDetail::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/admin/discount_details/'.$discountDetail->id,
            $editedDiscountDetail
        );

        $this->assertApiResponse($editedDiscountDetail);
    }

    /**
     * @test
     */
    public function test_delete_discount_detail()
    {
        $discountDetail = DiscountDetail::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/admin/discount_details/'.$discountDetail->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/admin/discount_details/'.$discountDetail->id
        );

        $this->response->assertStatus(404);
    }
}
