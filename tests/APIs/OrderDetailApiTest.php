<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\OrderDetail;

class OrderDetailApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_order_detail()
    {
        $orderDetail = OrderDetail::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/admin/order_details', $orderDetail
        );

        $this->assertApiResponse($orderDetail);
    }

    /**
     * @test
     */
    public function test_read_order_detail()
    {
        $orderDetail = OrderDetail::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/admin/order_details/'.$orderDetail->id
        );

        $this->assertApiResponse($orderDetail->toArray());
    }

    /**
     * @test
     */
    public function test_update_order_detail()
    {
        $orderDetail = OrderDetail::factory()->create();
        $editedOrderDetail = OrderDetail::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/admin/order_details/'.$orderDetail->id,
            $editedOrderDetail
        );

        $this->assertApiResponse($editedOrderDetail);
    }

    /**
     * @test
     */
    public function test_delete_order_detail()
    {
        $orderDetail = OrderDetail::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/admin/order_details/'.$orderDetail->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/admin/order_details/'.$orderDetail->id
        );

        $this->response->assertStatus(404);
    }
}
