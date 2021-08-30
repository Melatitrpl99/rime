<section class="content-header mt-2">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Detail order</h1>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <h4 id="order_title"></h4>
                        </div>
                        <div class="card-tools"></div>
                    </div>
                    <div class="card-body">
                        @include('admin.order_transactions.order_show_fields')
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-0 table-responsive">
                        @include('admin.order_transactions.order_table_details')
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
