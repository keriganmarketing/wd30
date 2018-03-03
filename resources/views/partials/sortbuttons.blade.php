@foreach ($_GET as $key => $value)
    @if(isset($_GET[$key]))
        <input type="hidden" name="{{ $key }}" value="{{ $value }}">
    @endif
@endforeach
@if(isset($_GET['omni']))
    <input type="hidden" name="omniField" value="{{ $_GET['omni'] }}" >
@endif
@if(isset($_GET['maxPrice']))
    <input type="hidden" name="maxPrice" value="{{ $_GET['maxPrice'] }}" >
@endif
@if(isset($_GET['minPrice']))
    <input type="hidden" name="minPrice" value="{{ $_GET['minPrice'] }}" >
@endif
@if(isset($_GET['bedrooms']))
    <input type="hidden" name="bedrooms" value="{{ $_GET['bedrooms'] }}" >
@endif
@if(isset($_GET['bathrooms']))
    <input type="hidden" name="bathrooms" value="{{ $_GET['bathrooms'] }}" >
@endif
@if(isset($_GET['sq_ft']))
    <input type="hidden" name="sq_ft" value="{{ $_GET['sq_ft'] }}" >
@endif
@if(isset($_GET['acreage']))
    <input type="hidden" name="acreage" value="{{ $_GET['acreage'] }}" >
@endif
@if(isset($_GET['openHouses']))
    <input type="hidden" name="openHouses" value="{{ $_GET['openHouses'] }}" >
@endif
@if(isset($_GET['waterfront']))
    <input type="hidden" name="waterfront" value="{{ $_GET['waterfront'] }}" >
@endif
@if(isset($_GET['pool']))
    <input type="hidden" name="pool" value="{{ $_GET['pool'] }}" >
@endif
@if(isset($_GET['status']) && !empty($_GET['status']))
    @foreach($_GET['status'] as $status)
        <input type="hidden" name="status[]" value="{{ $status }}" >
    @endforeach
@endif