<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Shipment;

class ShipmentApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_shipment()
    {
        $shipment = Shipment::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/admin/shipments', $shipment
        );

        $this->assertApiResponse($shipment);
    }

    /**
     * @test
     */
    public function test_read_shipment()
    {
        $shipment = Shipment::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/admin/shipments/'.$shipment->id
        );

        $this->assertApiResponse($shipment->toArray());
    }

    /**
     * @test
     */
    public function test_update_shipment()
    {
        $shipment = Shipment::factory()->create();
        $editedShipment = Shipment::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/admin/shipments/'.$shipment->id,
            $editedShipment
        );

        $this->assertApiResponse($editedShipment);
    }

    /**
     * @test
     */
    public function test_delete_shipment()
    {
        $shipment = Shipment::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/admin/shipments/'.$shipment->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/admin/shipments/'.$shipment->id
        );

        $this->response->assertStatus(404);
    }
}
