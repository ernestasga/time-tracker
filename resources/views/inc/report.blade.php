<form action="{{route('report.generate')}}" method="post">
    @csrf
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="report_type" id="pdf" value="pdf" required checked>
        <label class="form-check-label" for="pdf">PDF</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="report_type" id="csv" value="csv" required>
        <label class="form-check-label" for="csv">CSV</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="report_type" id="excel" value="excel" required>
        <label class="form-check-label" for="excel">Excel</label>
      </div>
      @if ($errors->has('report_type'))
      <div class="error">
          {{ $errors->first('report_type') }}
      </div>
      @endif
      <div class="form-row">
        <div class="col-3">
            <label for="date_from">Date From</label>
            <input type="date" class="form-control" name="date_from" placeholder="From">
            @if ($errors->has('date_from'))
            <div class="error">
                {{ $errors->first('date_from') }}
            </div>
            @endif
        </div>
        <div class="col-3">
            <label for="date_to">Date To</label>
            <input type="date" class="form-control" name="date_to" placeholder="To">
            @if ($errors->has('date_to'))
            <div class="error">
                {{ $errors->first('date_to') }}
            </div>
            @endif
        </div>
      </div>
      <div class="form-row mt-4">
          <div class="col">
            <button type="submit" class="btn btn-info">Generate report</button>
          </div>
      </div>
</form>
