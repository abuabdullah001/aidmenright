
@if($expensecategory2 && $expensecategory2->count() > 0)
    <label for="sub_category_id">Sub Category</label>
    <select name="sub_category_id" id="sub_category_id" class="form-control">
        <option value="">Select Sub Category</option>
        @foreach ($expensecategory2 as $event)
            <option value="{{ $event->id }}">{{ $event->name }}</option>
        @endforeach
    </select>
@endif
