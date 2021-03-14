<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\CartDetail;

class CartDetailApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_cart_detail()
    {
        $cartDetail = CartDetail::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/admin/cart_details', $cartDetail
        );

        $this->assertApiResponse($cartDetail);
    }

    /**
     * @test
     */
    public function test_read_cart_detail()
    {
        $cartDetail = CartDetail::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/admin/cart_details/'.$cartDetail->id
        );

        $this->assertApiResponse($cartDetail->toArray());
    }

    /**
     * @test
     */
    public function test_update_cart_detail()
    {
        $cartDetail = CartDetail::factory()->create();
        $editedCartDetail = CartDetail::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/admin/cart_details/'.$cartDetail->id,
            $editedCartDetail
        );

        $this->assertApiResponse($editedCartDetail);
    }

    /**
     * @test
     */
    public function test_delete_cart_detail()
    {
        $cartDetail = CartDetail::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/admin/cart_details/'.$cartDetail->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/admin/cart_details/'.$cartDetail->id
        );

        $this->response->assertStatus(404);
    }
}
