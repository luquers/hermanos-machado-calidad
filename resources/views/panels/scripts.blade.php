{{-- Lang Messages --}}
<script src="{{ asset('messages.js') }}"></script>
<script>Lang.setLocale('{{ app()->getLocale() }}')</script>
{{-- Lang Messages --}}

{{-- Vendor Scripts --}}
<script src="{{ asset(mix('vendors/js/vendors.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/ui/prism.min.js')) }}"></script>

{{-- Global scripts --}}
<script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>
<script src="{{ asset(mix('assets/js/template/ajax.js')) }}"></script>
<script src="{{ asset(mix('assets/js/template/donetyping.js')) }}"></script>
{{-- Global scripts --}}

@yield('vendor-script')
{{-- Theme Scripts --}}
<script src="{{ asset(mix('js/core/app-menu.js')) }}"></script>
<script src="{{ asset(mix('js/core/app.js')) }}"></script>
@if($configData['blankPage'] === false)
<script src="{{ asset(mix('js/scripts/customizer.js')) }}"></script>
@endif
{{-- page script --}}
@yield('page-script')
{{-- page script --}}
