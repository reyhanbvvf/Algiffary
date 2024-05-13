<!-- Filter Modal -->
<div class="modal fade" id="filterModal" tabindex="-1" role="dialog" aria-labelledby="filterModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="filterModalLabel">Cetak Pendapatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Date Range Filter -->
                <form method="POST" target="_blank" action="{{ route('superadmin.report.pendapatan') }}">
                    @csrf
                <div class="form-group">
                    <label for="start">Tanggal Mulai</label>
                    <input type="date" name="start" class="form-control" id="start">
                </div>
                <div class="form-group">
                    <label for="end">Tanggal Akhir</label>
                    <input type="date" name="end" class="form-control" id="end">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-outline-primary">Cetak</button>
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </form>
        </div>
    </div>
</div>
