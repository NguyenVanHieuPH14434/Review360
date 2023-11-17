@props(['titlePage', 'action'])
<div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-12">
                <h4 class="fw-semibold mb-8">{{ $titlePage}}</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="/">Home</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            @php
                                $routeName = explode('.', Route::currentRouteName())[0] . '.list';
                            @endphp
                            <a class="text-muted text-decoration-none"  @if (! empty($action)) href="{{ route($routeName) }}" @endif >
                                {{ $titlePage}}
                            </a>
                        </li>
                        @if (! empty($action))
                            <li class="breadcrumb-item action-breadcrumb" aria-current="page">
                                <a class="text-muted text-decoration-none">
                                    {{ $action}}
                                </a>
                            </li>
                        @endif
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>