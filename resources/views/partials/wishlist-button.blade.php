{{--
    Tombol hati wishlist.
    Parameter:
      $destination : model Destination
      $on          : true jika sudah ada di wishlist user
      $floating    : (opsional) true untuk menempel di pojok kanan atas kartu/foto
--}}
<form action="{{ route('destinations.wishlist.toggle', $destination->slug) }}"
      method="POST"
      class="wish-form {{ ($floating ?? false) ? 'is-floating' : '' }}">
    @csrf
    <button type="submit"
            class="wish-btn {{ ($on ?? false) ? 'is-on' : '' }}"
            aria-pressed="{{ ($on ?? false) ? 'true' : 'false' }}"
            aria-label="Simpan {{ $destination->name }} ke wishlist"
            title="Simpan ke wishlist">
        <svg viewBox="0 0 24 24" aria-hidden="true">
            <path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/>
        </svg>
    </button>
</form>