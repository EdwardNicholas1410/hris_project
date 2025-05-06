<nobr>
    @isset($routes['show']) <!-- Check if 'show' route exists -->
        <a href="{{ route($routes['show'], $item->id) }}" class="btn btn-xs btn-info">
            <i class="fas fa-eye"></i> View
        </a>
    @endisset

    @isset($routes['edit']) <!-- Check if 'edit' route exists -->
        <a href="{{ route($routes['edit'], $item->id) }}" class="btn btn-xs btn-warning">
            <i class="fas fa-edit"></i> Edit
        </a>
    @endisset

    @isset($routes['destroy']) <!-- Check if 'destroy' route exists -->
        <form action="{{ route($routes['destroy'], $item->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button class="btn btn-xs btn-danger" onclick="return confirm('Are you sure?')">
                <i class="fas fa-trash"></i> Delete
            </button>
        </form>
    @endisset
</nobr>