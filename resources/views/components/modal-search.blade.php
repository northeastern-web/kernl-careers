<div class="modal fade --dark --search" id="modal_search" tabindex="-1" role="dialog" aria-labelledby="modal_search_label" aria-hidden="true">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <div class="modal-dialog __dialog" role="document">
    <div class="__content">
      <div class="__body">
        <form action="{{ home_url() }}" method="GET">
          <div class="form__group">
            <label for="exampleText" class="sr--only">Search</label>
            <input name="s" type="search" class="form__control mt--2@xs" id="exampleText" aria-describedby="textHelp" placeholder="Search by keyword">
          </div>
          <div class="form__group">
            <div class="form__check form__check--inline">
              <label class="form__check__label">
                <input checked type="radio" name="opt" class="form__check__input">
                &nbsp;All content
              </label>
            </div>
            <div class="form__check form__check--inline">
              <label class="form__check__label">
                <input type="radio" name="opt" class="form__check__input">
                &nbsp;Current Academic Catalog
              </label>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
