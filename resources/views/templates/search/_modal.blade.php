<div class="modal --lg" id="modal_search" tabindex="-1" role="dialog" aria-labelledby="modal_search_label" aria-hidden="true">
  <div class="__screen" data-dismiss="modal"></div>

  <button type="button" class="__close" data-dismiss="modal" aria-label="Close">
    <i data-feather="x"></i>
  </button>
  
  <div class="__content w--100@d">
    <div class="__body">
      <form action="{{ home_url() }}" method="GET">
        <div class="form__enclosed --search --dark --line">
          <label for="modalSearch" class="sr--only">Search</label>
          <input autocomplete="off" class="fs--d3 fw--300" name="s" type="search" id="modalSearch" aria-describedby="modalSearch" placeholder="Search by keyword">
          <button type="submit" class="btn">Go</button>
        </div>
      </form>
    </div>
  </div>
</div>
