<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    @include('admin.layout.head')
</head>

<body>
@include('admin.layout.menu')
<div id="rightSide">
    @include('admin.layout.header')
    @yield('content')
    @foreach($khoa as $kh)
        {{$kh->name}}<br>
        @foreach($kh->phongtn as $ptn)
            {{$ptn->name}}<br>
        @endforeach
    @endforeach
    <div class="clear mt30"></div>
    @include('admin.layout.footer')
</div>
<div class="clear"></div>
    @yield('script')
</body>
</html>