<div class="modal fade --dark --full" id="modal_search" tabindex="-1" role="dialog" aria-labelledby="modalSearch" aria-hidden="true">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <i class="__icon --lg --thin" data-feather="x-circle"></i>
  </button>
  <div class="__dialog" role="document">
    <div class="__content">
      <div class="__body">
        <form action="{{ home_url() }}" method="GET">
          <div class="__group --enclosed --search --dark +line">
            <label for="modalSearch" class="sr--only">Search</label>
            <input class="fs--d3 fw--300" name="s" type="search" id="modalSearch" aria-describedby="modalSearch" placeholder="Search by keyword">
            <button type="submit" class="btn">Go</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
