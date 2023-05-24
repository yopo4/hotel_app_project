{{-- @extends('template.custom.master') --}}

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/country-select-js/2.0.1/css/countrySelect.min.css" />
<script src="https://code.jquery.com/jquery-3.6.4.slim.js"
    integrity="sha256-dWvV84T6BhzO4vG6gWhsWVKVoa4lVmLnpBOZh/CAHU4=" crossorigin="anonymous"></script>
<script src="{{ asset('js/country.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/country-select-js/2.1.1/js/countrySelect.min.js"></script>

{{-- @section('main') --}}
<div class="col d-flex align-items-center justify-content-center">
    <form>
        Region&raquo; <select onchange="set_country(this,country,city_state)" size="1" name="region">
            <option value="" selected="selected">SELECT REGION</option>
            <option value=""></option>
            <script type="text/javascript">
                setRegions(this);
            </script>
        </select>
        Country&raquo; <select name="country" size="1" disabled="disabled"
            onchange="set_city_state(this,city_state)"></select>
        City/State&raquo; <select name="city_state" disabled="disabled"
            onchange="print_city_state(country,this)"></select>
    </form>
    {{-- <div id="txtregion"></div>
    <div id="txtplacename"></div> --}}
</div>

{{-- @endsection --}}
