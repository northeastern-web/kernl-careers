<div class="modal fade --dark --search" id="modal_search" tabindex="-1" role="dialog" aria-labelledby="modal_search_label" aria-hidden="true">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <div class="modal-dialog __dialog" role="document">
    <div class="__content">
      <div class="__body">
        <form action="{{ home_url() }}" method="GET">
          <div class="__group __search --dark +line mt--5@xs">
            <label for="modalSearch" class="sr--only">Search</label>
            <input name="s" type="search" id="modalSearch" class="__control" placeholder="Search by keyword" aria-describedby="modalSearch" autocomplete="off">
            <button type="submit" class="btn">Go</button>
          </div>
          <div class="__group">
            <div class="__check __check--inline">
              <label class="__check__label">
                <input checked type="radio" name="opt" class="__check__input">
                &nbsp;All content
              </label>
            </div>
            <div class="__check __check--inline">
              <label class="__check__label">
                <input type="radio" name="opt" class="__check__input">
                &nbsp;Current Academic Catalog
              </label>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
