<label for="body"
       class="block mt-8 mb-2 @error('body') text-red-600 @enderror">Post
    Body</label>
@error('body')
<div class="text-red-600 my-2">{{ $message }}</div>
@enderror
<textarea name="body"
          id="body"
          rows="10"
          class=" @error('body')  is-invalid outline outline-red-600 outline-2 @enderror w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{old('body')}}</textarea>
