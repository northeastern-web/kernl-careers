@if(get_sub_field('rel_contact'))
  <aside class="card +noshadow --extend">
    <div class="__header bg--blue-dark text--gray-100 tt--caps">
      <div class="__column">Contact Information</div>
    </div>

    <div class="__body pb--1@xs bg--gray-100">
      @foreach (get_sub_field('rel_contact') as $contact)
        <div class="__excerpt fs--sm">
          <ul class="list--unstyled">
            <li class="mb--1@xs">
              <h6 class="fw--700 mb--0@xs">{{ $contact->post_title }}</h6>
              <ul class="list--unstyled mx--0@xs">
                @if(get_field('txt_email', $contact->ID))
                  <li><a href="mailto:{{ get_field('txt_email', $contact->ID) }}">{{ get_field('txt_email', $contact->ID) }}</a></li>
                @endif
                @if(get_field('txt_phone', $contact->ID))
                  <li>tel: <a href="tel:{{ get_field('txt_phone', $contact->ID) }}">{{ get_field('txt_phone', $contact->ID) }}</a></li>
                @endif
                @if(get_field('txt_fax', $contact->ID))
                  <li>fax: <a href="tel:{{ get_field('txt_fax', $contact->ID) }}">{{ get_field('txt_fax', $contact->ID) }}</a></li>
                @endif
              </ul>
            </li>

            @if(get_field('txt_address', $contact->ID))
              <li class="mb--1@xs">
                <h6 class="fw--700 mb--0@xs">Mailing Address</h6>
                {!! get_field('txt_address', $contact->ID) !!}
              </li>
            @endif
            @if(get_field('txt_location', $contact->ID))
              <li class="mb--1@xs">
                <h6 class="fw--700 mb--0@xs">Location</h6>
                {!! get_field('txt_location', $contact->ID) !!}
              </li>
            @endif
            @if(get_field('txt_hours', $contact->ID))
              <li>
                <h6 class="fw--700 mb--0@xs">Office Hours</h6>
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
