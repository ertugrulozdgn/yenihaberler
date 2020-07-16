<form action="{{ route('news.search') }}" method="get" class="form-inline mr-4">
    <input type="search" name="search" class="form-control form-control-sm search" placeholder="{{ session('error1') ? (session('error1')) : (session('error2') ? session('error2') : 'Ara..') }}">
    <i style="margin-left: -25px;" class="fa fa-search"></i>
</form>


                                {{--BÖYLEDE OLUR AYNISI--}}
{{--placeholder="{{ session('error1') ? : (session('error2') ?  : 'Ara..') }}--}}
