@if (get_sub_field('lay_alert')['bool_alert'])
  <div class="alert --note">
    <div class="__body">
      <div class="__title">{{ get_sub_field('lay_alert')['txt_title'] }}</div>
      <div class="__excerpt">
        {!! get_sub_field('lay_alert')['txt_copy'] !!}
      </div>
    </div>
  </div>
@endif
