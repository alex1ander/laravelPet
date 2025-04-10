<div class="plans-container">
    @foreach($plans as $plan)
        <div class="plan-card p-3">
            <h3>{{ $plan->plan_name }}</h3>
            <p><strong>Цена:</strong> {{ $plan->price }} $</p>
            <ul>
                @foreach($plan->features as $feature => $value)
                    <li><strong>{{ $feature }}:</strong> {{ $value }}</li>
                @endforeach
            </ul>

            @if(Auth::check())
                @if (auth()->user()->planId === $plan->id)
                    <form>
                        <button class="btn btn-outline-primary" type="submit" disabled>Текущий План</button>
                    </form>
                @else
                <form action="{{ route('plans.buy', $plan->id) }}" method="POST">
                    @csrf
                    <button class="btn btn-primary" type="submit">Купить</button>
                </form>
                @endif
            @endif
        </div>
    @endforeach
</div>

