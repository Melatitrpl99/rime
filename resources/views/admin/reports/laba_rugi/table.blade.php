<table class="table table-borderless" id="laba-rugi-table" style="min-width: 1024px">
    <thead>
        <tr>
            <td class="border-bottom">
                <span class="text-md">Tanggal: {{ now()->format('d F Y') }}</span>
            </td>
            <td width="200" class="border-bottom"></td>
            <td width="200" class="border-bottom"></td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td colspan="3">
                <b>Pendapatan</b>
            </td>
        </tr>
        <tr>
            <td>
                <span class="pl-5">Total pendapatan dari penjualan</span>
            </td>
            <td class="text-right">{{ rp($pemasukan) }}</td>
            <td></td>
        </tr>
        <tr>
            <td colspan="3">
                <b>Pengeluaran / Harga pokok penjualan</b>
            </td>
        </tr>
        <tr>
            <td>
                <span class="pl-5">Total Pengeluaran</span>
            </td>
            <td colspan="2" class="text-right">{{ rp($pengeluaran) }}</td>
        </tr>
        <tr>
            <td>
                <span class="pl-5">Laba Kotor</span>
            </td>
            <td colspan="2" class="text-right">{{ rp($pemasukan - $pengeluaran) }}</td>

        </tr>
        <tr>
            <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
            <td><b>Pendapatan Bersih</b></td>
            <td colspan="2" class="text-right">{{ rp($pemasukan - $pengeluaran) }}</td>
        </tr>
    </tbody>
</table>
