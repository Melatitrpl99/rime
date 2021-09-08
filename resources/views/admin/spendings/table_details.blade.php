<table class="table table-sm table-borderless table-striped">
    <thead>
        <tr>
            <th width="50" class="py-2 border-bottom">#</th>
            <th class="py-2 border-bottom">Nama</th>
            <th class="py-2 border-bottom">Keterangan</th>
            <th width="80" class="py-2 border-bottom text-right">Jumlah</th>
            <th width="180" class="py-2 border-bottom text-right">Subtotal</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($spending->products as $key => $spendingDetail)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $spendingDetail->pivot->nama }}</td>
                <td>{{ $spendingDetail->pivot->ket }}</td>
                <td class="text-right">{{ $spendingDetail->pivot->jumlah_item . ' ' . $spendingDetail->pivot->spendingUnit->name}}</td>
                <td class="text-right">{{ rp($spendingDetail->pivot->sub_total) }}</td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <th colspan="3" class="py-2 border-top"></th>
        <th class="text-right py-2 border-top">Total</th>
        <th class="text-right py-2 border-top">{{ rp($spending->products->sum('pivot.sub_total')) }}</th>
    </tfoot>
</table>
