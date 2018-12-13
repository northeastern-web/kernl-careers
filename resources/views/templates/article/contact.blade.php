@if(get_sub_field('rel_contact'))
  <aside class="card bs--none">
    <div class="__header pa--1 bg--gray-900 tc--gray-100 tt--caps">
      <div class="__column">Contact Information</div>
    </div>

    <div class="__body pt--4 px--1 px--1h@w pb--1 bg--gray-100">
      @foreach (get_sub_field('rel_contact') as $contact)
        <div class="__excerpt fs--sm">
          <ul class="ls--none">
            <li class="mb--1">
              <h6 class="fw--700 mb--0">{{ get_field('txt_title', $contact->ID) }}</h6>
              <ul class="ls--none mx--0">
                @if(get_field('txt_email', $contact->ID))
                  <li><a href="mailto:{{ get_field('txt_email', $contact->ID) }}">{{ get_field('txt_email', $contact->ID) }}</a></li>
                @endif
                @if(get_field('txt_phone', $contact->ID))
                  <li><a href="tel:{{ get_field('txt_phone', $contact->ID) }}">{{ get_field('txt_phone', $contact->ID) }}</a></li>
                @endif
                @if(get_field('txt_fax', $contact->ID))
                  <li><a href="tel:{{ get_field('txt_fax', $contact->ID) }}">{{ get_field('txt_fax', $contact->ID) }}</a> (fax)</li>
                @endif
              </ul>
            </li>

            @if(get_field('txt_address', $contact->ID))
              <li class="mb--1">
                <h6 class="fw--700 mb--0">Mailing Address</h6>
                {!! get_field('txt_address', $contact->ID) !!}
              </li>
            @endif
            @if(get_field('txt_location', $contact->ID))
              <li class="mb--1">
                <h6 class="fw--700 mb--0">Location</h6>
                {!! get_field('txt_location', $contact->ID) !!}
              </li>
            @endif
            @if(get_field('txt_hours', $contact->ID))
              <li>
                <h6 class="fw--700 mb--0">Office Hours</h6>
                {!! get_field('txt_hours', $contact->ID) !!}
              </li>
            @endif
          </ul>
        </div>
      @endforeach
    </div>
    @php(wp_reset_postdata())
  </aside>
@endif
