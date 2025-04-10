<div>
    <h1>Управление доменами</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif


    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Домен</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach($domains as $domain)
                <tr id="domain-{{ $domain->id }}">
                    <td>{{ $domain->id }}</td>
                    <td id="domain-td-{{ $domain->id }}">
                        <span id="domain-text-{{ $domain->id }}">{{ $domain->domain }}</span>
                        <form method="POST" action="{{ route('dashboard.update', $domain->id) }}" style="display:none;" id="domain-form-{{ $domain->id }}">
                            @csrf
                            @method('PUT')
                            <input type="url" class="form-control" name="domain" value="{{ $domain->domain }}" required>
                            <button type="submit" class="btn btn-success">Сохранить</button>
                        </form>
                    </td>
                    <td>
                        <div class="d-flex gap-3">
                            <div class="edit-block">
                                <button type="button" class="btn btn-primary" onclick="editDomain({{ $domain->id }})" id="edit-button-{{ $domain->id }}">Редактировать</button>
                            </div>
                            <form method="POST" action="{{ route('dashboard.delete', $domain->id) }}" style="display:inline;">
                                @csrf
                                @method('POST')
                                <button type="submit" class="btn btn-danger">Удалить</button>
                            </form>

                        </div>
                    </td>
                </tr>
            @endforeach

            <!-- Строка для добавления нового домена -->
            <tr id="newDomainRow">
                <td></td>
                <td>
                    <form method="POST" action="{{ route('dashboard.save') }}" id="domainForm">
                        @csrf
                        <input type="url" class="form-control" id="domain" name="domain" placeholder="Введите домен" required>
                    </form>
                </td>
                <td>
                    <button type="button" class="btn btn-primary" id="addDomainButton">Добавить</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<script>
    document.getElementById('addDomainButton').addEventListener('click', function() {
        // Сначала отправляем текущую форму
        document.getElementById('domainForm').submit();

        // После отправки добавляем новую строку с формой для следующего домена
        const tableBody = document.querySelector('table tbody');
        const newRow = document.createElement('tr');
        
        newRow.innerHTML = `
            <td></td>
            <td>
                <form method="POST" action="{{ route('dashboard.save') }}" class="new-domain-form">
                    @csrf
                    <input type="url" class="form-control" name="domain" placeholder="Введите домен" required>
                </form>
            </td>
            <td>
                <button type="button" class="btn btn-primary addDomainButton">Добавить</button>
            </td>
        `;
        tableBody.appendChild(newRow);

        // Привязываем новое событие на кнопку для добавления
        newRow.querySelector('.addDomainButton').addEventListener('click', function() {
            newRow.querySelector('.new-domain-form').submit();
        });
    });

    function editDomain(domainId) {
        // Находим элементы для редактирования
        const domainText = document.getElementById(`domain-text-${domainId}`);
        const domainForm = document.getElementById(`domain-form-${domainId}`);
        const editButton = document.getElementById(`edit-button-${domainId}`);
        
        // Проверяем, если форма для редактирования уже видна (редактирование активно)
        if (editButton.innerText !== 'Редактировать') {
            editButton.innerText = 'Редактировать';
            domainForm.style.display = 'none';
            domainText.style.display = 'block';
        } else {
            editButton.innerText = 'Отменить редактирование';
            domainForm.style.display = 'flex';
            domainText.style.display = 'none';
        }
    }

</script>
