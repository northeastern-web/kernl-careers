@if(get_sub_field('rel_contact'))
  <aside>
    <hr>
    <h6>Contact</h6>
    @foreach (get_sub_field('rel_contact') as $contact)
        <ul class="list--unstyled">
          <li class="fw--700">{{ $contact->post_title }}</li>
          @if(get_field('txt_email', $contact->ID))
            <li>{{ get_field('txt_email', $contact->ID) }}</li>
          @endif
          @if(get_field('txt_phone', $contact->ID))
            <li>{{ get_field('txt_phone', $contact->ID) }}</li>
          @endif
          @if(get_field('txt_fax', $contact->ID))
            <li>{{ get_field('txt_fax', $contact->ID) }}</li>
          @endif
          @if(get_field('txt_address', $contact->ID))
            <li>{!! get_field('txt_address', $contact->ID) !!}</li>
          @endif
          @if(get_field('txt_location', $contact->ID))
            <li>{!! get_field('txt_location', $contact->ID) !!}</li>
          @endif
          @if(get_field('txt_hours', $contact->ID))
            <li>{!! get_field('txt_hours', $contact->ID) !!}</li>
          @endif
        </ul>
      </li>
    @endforeach
    @php(wp_reset_postdata())
  </aside>
@endif
