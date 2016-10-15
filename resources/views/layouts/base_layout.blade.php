<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

@section('htmlheader')
    @include('layouts.partials.htmlheader')
@show

<body class="skin-blue sidebar-mini">
    @include('layouts.partials.bodyHeader')
    @section('body_container')
    @show
    @include('layouts.partials.bodyFooter')
</body>
</html>