<?php namespace Tests\Repositories;

use App\Models\TransactionDetail;
use App\Repositories\TransactionDetailRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class TransactionDetailRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var TransactionDetailRepository
     */
    protected $transactionDetailRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->transactionDetailRepo = \App::make(TransactionDetailRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_transaction_detail()
    {
        $transactionDetail = TransactionDetail::factory()->make()->toArray();

        $createdTransactionDetail = $this->transactionDetailRepo->create($transactionDetail);

        $createdTransactionDetail = $createdTransactionDetail->toArray();
        $this->assertArrayHasKey('id', $createdTransactionDetail);
        $this->assertNotNull($createdTransactionDetail['id'], 'Created TransactionDetail must have id specified');
        $this->assertNotNull(TransactionDetail::find($createdTransactionDetail['id']), 'TransactionDetail with given id must be in DB');
        $this->assertModelData($transactionDetail, $createdTransactionDetail);
    }

    /**
     * @test read
     */
    public function test_read_transaction_detail()
    {
        $transactionDetail = TransactionDetail::factory()->create();

        $dbTransactionDetail = $this->transactionDetailRepo->find($transactionDetail->id);

        $dbTransactionDetail = $dbTransactionDetail->toArray();
        $this->assertModelData($transactionDetail->toArray(), $dbTransactionDetail);
    }

    /**
     * @test update
     */
    public function test_update_transaction_detail()
    {
        $transactionDetail = TransactionDetail::factory()->create();
        $fakeTransactionDetail = TransactionDetail::factory()->make()->toArray();

        $updatedTransactionDetail = $this->transactionDetailRepo->update($fakeTransactionDetail, $transactionDetail->id);

        $this->assertModelData($fakeTransactionDetail, $updatedTransactionDetail->toArray());
        $dbTransactionDetail = $this->transactionDetailRepo->find($transactionDetail->id);
        $this->assertModelData($fakeTransactionDetail, $dbTransactionDetail->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_transaction_detail()
    {
        $transactionDetail = TransactionDetail::factory()->create();

        $resp = $this->transactionDetailRepo->delete($transactionDetail->id);

        $this->assertTrue($resp);
        $this->assertNull(TransactionDetail::find($transactionDetail->id), 'TransactionDetail should not exist in DB');
    }
}
