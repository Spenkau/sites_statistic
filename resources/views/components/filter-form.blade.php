<div class="container">

    <button class="btn btn-primary" id="toggle-filters">Показать фильтры</button>

    <form method="GET" action="{{ route($route) }}" id="filters-form" class="hidden">
        @foreach($fields as $field)
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="{{ $field['name'] }}-checkbox">
                    <label class="form-check-label" for="{{ $field['name'] }}-checkbox">{{ $field['label'] }}</label>
                </div>
                <input
                    type="{{ $field['type'] }}"
                    class="form-control"
                    id="{{ $field['name'] }}"
                    name="{{ $field['name'] }}"
                    value="{{ request()->get($field['name']) }}"
                    style="display: none;">
            </div>
        @endforeach

        <button type="submit" class="btn btn-primary">Применить фильтры</button>
        <button class="btn btn-secondary" id="reset-filters">Сбросить фильтры</button>
    </form>
</div>

<script>
    document.getElementById('toggle-filters').addEventListener('click', () => {
        const form = document.getElementById('filters-form');
        form.classList.toggle('hidden')
    });

    document.getElementById('reset-filters').addEventListener('click', () => {
        const form = document.getElementById('filters-form');
        form.reset();
    });

    document.querySelectorAll('.form-check-input').forEach((checkbox) => {
        checkbox.addEventListener('change', function () {
            const input = this.parentElement.nextElementSibling;
            this.checked ? input.style.display = 'block' : input.style.display = 'none';
        });
    });
</script>
