<div class="col --12@xs --6@sm --4@lg --2@xl">
  <article class="card --tile --outline --bottom">
    <a class="__link" href="{{ the_permalink() }}">
      <header class="__header">
          <div class="__column">
            <div class="badge --left text--white{{ get_field('select_status') ? ' bg--gray-700' : ' bg--red' }}">
              {{ get_field('select_status') ? the_field('select_status') : '!! Assign Status !!' }}
            </div>
          </div>
      </header>
      <div class="__body">
        <p class="fs--xs mb--0@xs{{ get_field('rel_owner') ? '' : ' text--red' }}">
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
        <h6 class="mb--0@xs">{{ the_title() }}</h6>
      </div>
    </a>
  </article>
</div>
