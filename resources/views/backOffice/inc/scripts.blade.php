<script src="{{ asset('plugins/select-chosen') }}/select-chosen.js" type="text/javascript"></script>
<script src="{{ asset('plugins') }}/echarts/echarts.min.js"></script>
<script src="{{ asset('plugins') }}/echarts/options.min.js"></script>
<script src="{{ asset('js/backOffice') }}/script.js"></script>

<script src="{{ asset('js/backOffice') }}/es5.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>