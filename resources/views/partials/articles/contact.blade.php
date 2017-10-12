@if(get_sub_field('rel_contact'))
  <aside class="card --outline --extend" style="border-color: #d0d0d0;">
    <div class="__header fw--700 bg--gray-100">
      <div class="__column">Contact</div>
    </div>

    <div class="__body pb--1@xs">
      @foreach (get_sub_field('rel_contact') as $contact)
        <h4 class="__title">{{ $contact->post_title }}</h4>
        <div class="__excerpt fs--xs">
          <ul class="list--unstyled">
            @if(get_field('txt_email', $contact->ID))
              <li><a href="mailto:{{ get_field('txt_email', $contact->ID) }}">{{ get_field('txt_email', $contact->ID) }}</a></li>
            @endif
            @if(get_field('txt_phone', $contact->ID))
              <li><a href="tel:{{ get_field('txt_phone', $contact->ID) }}">{{ get_field('txt_phone', $contact->ID) }}</a></li>
            @endif
            @if(get_field('txt_fax', $contact->ID))
              <li><a href="tel:{{ get_field('txt_fax', $contact->ID) }}">{{ get_field('txt_fax', $contact->ID) }}</a></li>
            @endif
            @if(get_field('txt_address', $contact->ID))
              <li>
                <h6 class="fw--700 mb--0@xs">Mailing Address</h6>
                {!! get_field('txt_address', $contact->ID) !!}
              </li>
            @endif
            @if(get_field('txt_location', $contact->ID))
              <li>
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
