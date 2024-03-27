<button class="btn btn-primary mb-3" id="toggle-filters">Показать фильтры</button>

<div class="container mt-5" id="filters-container" style="border: 1px solid #dee2e6; padding: 20px; border-radius: 5px;">
    <form method="GET"  id="filters-form">
        <p>Фильтровать по:</p>
        @foreach($fields as $field)
            <div class="form-group row align-items-center pb-3 mb-3" style="border-bottom: 1px solid #dee2e6">
                <div class="form-check col-sm-2">
                    <input class="form-check-input" type="checkbox" id="{{ $field['name'] }}-checkbox">

                    @if($field['type'] == 'number')

                    @endif

                    <label class="form-check-label" for="{{ $field['name'] }}-checkbox">{{ $field['label'] }}</label>
                </div>
                <div class="col-sm-10 input-group-sm">
                    <input
                        type="{{ $field['type'] }}"
                        class="form-control input-sm"
                        id="{{ $field['name'] }}"
                        name="{{ $field['name'] }}"
                        placeholder="Введите значение типа {{ $field['type'] }}"
                        style="display: none;">
                </div>
            </div>
        @endforeach

        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
            <button type="submit" class="btn btn-primary">Применить фильтры</button>
            <button class="btn btn-secondary" id="reset-filters">Сбросить фильтры</button>
        </div>
    </form>
</div>

@section('script')
    <script>
        const formContainer = document.getElementById('filters-container');
        const form = document.getElementById('filters-form');

        document.getElementById('toggle-filters').addEventListener('click', () => {
            formContainer.classList.toggle('hidden')
        });

        document.getElementById('reset-filters').addEventListener('click', () => {
            form.reset();
        });

        document.querySelectorAll('.form-check-input').forEach((checkbox) => {
            checkbox.addEventListener('change', function () {
                const input = this.parentElement.nextElementSibling.querySelector('input');
                this.checked ? input.style.display = 'block' : input.style.display = 'none';
            });
        });

        form.addEventListener('submit', (event) => {
            event.preventDefault();
            applyFilters();
        })

        function applyFilters() {
            const formData = new FormData(form);

            const params = {};

            for (let [key, value] of formData.entries()) {
                const checkbox = document.getElementById(key + '-checkbox');
                if (checkbox.checked && value) {
                    params[key] = value;
                }
            }

            window.location.search = Object.keys(params)
                .map(key => `${encodeURIComponent(key)}=${encodeURIComponent(params[key])}`)
                .join("&");
        }
    </script>
@endsection
