<div class="resource">
    <img src="{{ asset('storage/' . $resource->image_path) }}" alt="Garden Cover Image">
    <div class="resource-info">
        <h4>{{ $resource->name }}</h4>
        <p class="faint" style="max-width: 100%; white-space: nowrap; overflow: hidden; text-overflow: ellipsis">{{ $resource->description }}</p>
    </div>

    <div class="floating-resource">
        <a href="{{ route('resource.view', $resource->id) }}" class="button small">View</a>
    </div>
</div>