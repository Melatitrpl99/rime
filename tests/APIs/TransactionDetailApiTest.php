<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\TransactionDetail;

class TransactionDetailApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_transaction_detail()
    {
        $transactionDetail = TransactionDetail::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/admin/transaction_details', $transactionDetail
        );

        $this->assertApiResponse($transactionDetail);
    }

    /**
     * @test
     */
    public function test_read_transaction_detail()
    {
        $transactionDetail = TransactionDetail::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/admin/transaction_details/'.$transactionDetail->id
        );

        $this->assertApiResponse($transactionDetail->toArray());
    }

    /**
     * @test
     */
    public function test_update_transaction_detail()
    {
        $transactionDetail = TransactionDetail::factory()->create();
        $editedTransactionDetail = TransactionDetail::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/admin/transaction_details/'.$transactionDetail->id,
            $editedTransactionDetail
        );

        $this->assertApiResponse($editedTransactionDetail);
    }

    /**
     * @test
     */
    public function test_delete_transaction_detail()
    {
        $transactionDetail = TransactionDetail::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/admin/transaction_details/'.$transactionDetail->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/admin/transaction_details/'.$transactionDetail->id
        );

        $this->response->assertStatus(404);
    }
}
