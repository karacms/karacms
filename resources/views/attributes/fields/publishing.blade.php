<section id="publishing" class="bg-gray-200 p-5">
    <h2 class="text-xl">Publishing</h2>

    <fieldset class="mt-4">
        <label>Date Created</label>
        <select name="status" class="border border-gray-200 px-2 py-1 rounded-sm w-full h-8">
            <option value="draft">Draft</option>
            <option value="published">Published</option>
        </select>
    </fieldset>

    <fieldset class="mt-4">
        <label>Date Created</label>
        <input type="datetime-local" class="border border-gray-200 px-2 py-1 rounded-sm w-full"  />
    </fieldset>

    <fieldset class="mt-4">
        <label>Date Published</label>
        <input type="datetime-local" class="border border-gray-200 px-2 py-1 rounded-sm w-full"  />
    </fieldset>

    <fieldset class="mt-4">
        <label>Author</label>
        <input type="text" class="border border-gray-200 px-2 py-1 rounded-sm w-full"  />
    </fieldset>

    <fieldset class="mt-4">
        <button type="submit" class="bg-indigo-400 p-2 text-white rounded-sm">Save Changes</button>
    </fieldset>
</section>