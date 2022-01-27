<script>
    window.laravelComponents = {
        'views-namespace': "{{ json_encode(config('laravel-components.views-namespace')) }}",
        'empty-value': "{{ json_encode(config('laravel-components.empty-value')) }}",
        'default-classes': "{{ json_encode(config('laravel-components.default-classes')) }}",
    }
</script>