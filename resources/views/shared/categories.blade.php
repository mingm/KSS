@if (count($category->children) > 0)
@foreach($category->children as $category)
<option value="{{ $category->id }}" {{ $category->id === $categoryId ? "selected" : "" }} >{{ str_pad($category->name, (strlen($category->name) + (3 * $category->level)), "---", STR_PAD_LEFT) }}</option>
@include('shared.categories', ['category' => $category, 'categoryId' => $categoryId])
@endforeach
@endif