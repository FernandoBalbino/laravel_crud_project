<div class="d-flex justify-content-between align-items-center mb-4">
    <span>
        <a href="{{ route('dashboard') }}">
            <strong>Crud Book</strong></span>
        </a>

    <div class="d-flex align-items-center gap-2">
      <span>Olá, <strong>{{Auth::user()->getFirstName() ??'Usuario' }}</strong></span>
      <button class="icon-btn"><a href="{{ route('user.index') }}" class="bi bi-person-circle"></a></button>
      <button class="icon-btn"><a href="{{ route('login.logout') }}" class="bi bi-box-arrow-right"></a></button>
    </div>
  </div>
