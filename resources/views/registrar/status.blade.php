<aside class="card +noshadow --extend ">
  <div class="__header bg--gray-200 tt--caps">
    <div class="__column">Status</div>
  </div>
  <div class="__body bg--gray-100 pb--1@xs">
    <p><b>Status</b>: {{ get_field('select_status') ? the_field('select_status') : '!! Assign Status !!' }}</p>
    <p><b>Owned by</b> 
      @php($owners = get_field('rel_owner'))
      @if($owners)
        @foreach ($owners as $owner)
          @php($user[] = $owner['display_name'])
        @endforeach
        {{ implode(', ', $user) }}
      @else
        !! Assign Owner !!
      @endif
    </p>
  </div>
</aside>
