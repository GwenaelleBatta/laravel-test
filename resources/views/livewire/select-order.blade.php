<div class="mb-3">
    <fieldset class="flex flex-col mb-4">
        <label class="mb-2" for="per-page">
            <span class="font-bold">Order by</span><br>
        </label>
        <select class="p-2 rounded-lg" id="per-page" wire:model="sortOrder">
            @foreach($options as $option)
                <option value="{{$option}}">{{$option}}</option>
            @endforeach
        </select>
    </fieldset>
</div>
